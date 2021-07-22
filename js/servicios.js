function selectServicios(){
    //petición AJAX
    const obj= {
        accion: 'select_servicios'
    };
    $.post(
        "../../includes/_functions.php", 
        obj, 
        function(response){
            let html = ``;
            response.map(function(a,b){
                console.log(a,b);
                html += `
                <tr style="Color:#FFFFFF">
                    <td>${a.nombre}</td>
                    <td>${a.precio}</td>
                    <td>
                        <a href="#" style="color: yellow" data-id="${a.id}" class="editar">Editar</a> |
                        <a href="#" style="color: tomato" data-id="${a.id}" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                `
            })
            $("#table-servicios tbody").html(html);
        },
        'JSON');

}
//insertar
$(document).ready(function(){
    selectServicios();
    $("#btnSubmit").click(function(){
        let obj = {
            accion: "insertar_servicios"
        }
        let bandera = 0;
        $("#form").find('input').map(function(){ //se puede añadir select
            if($(this).val() == ''){
                $(this).adClass('error')
                bandera = 1;
                return false;
            }
            obj[$(this).prop('name')] = $(this).val()
        })
        if(bandera == 1){
            alert('Los campos están vacios')
            return false;
        }
        if($(this).data('editar')){
            obj['accion'] = 'editar_servicios';
            obj['id'] = $(this).data('editar');
        }
        $.post('../../includes/_functions.php', obj, function(response){
            if(response.type == 'success'){
                toggleForm($("#showForm"))
                selectServicios()
            }
            alert(`${response.title}, ${response.text}`)
        },'JSON')
        $("#form").find('input').keyup(function(){
            $(this).removeClass('error');
    })
   
    })
    //ELIMINAR
    $("#table-servicios").on('click','.eliminar', function(e){ // e = accion de hipervinculo || datos reales
        e.preventDefault()
        const id = $(this).data('id')
        
        const confirmacion = confirm('¿Desea eliminar el servicio?');
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'eliminar_servicios');
        formularioDatos.append('id', id);

        if(confirmacion){
            fetch('../../includes/_functions.php', {
                method: 'POST',
                body: formularioDatos,
            })
            .then(res => res.json())
            .then(response => {
                alert(`${response.title}: ${response.text}`)
            })
            selectServicios()
        }
    })
    //EDITAR
    $('#table-servicios').on('click','.editar',function(e){
        e.preventDefault()
        const id = $(this).data('id')
        console.log(id)
        $("#showForm").trigger('click')
        $('#btnSubmit').text('Editar').data('editar', id)
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'consultar_servicios');
        formularioDatos.append('id', id);

        fetch('../../includes/_functions.php', {
            method: 'POST',
            body: formularioDatos,
        })
        .then(res => res.json())
        .then(response => {
            console.log(response)
            $('#nombre').val(response.nombre)
            $('#precio').val(response.precio)
            
        
        })
        
    });
});