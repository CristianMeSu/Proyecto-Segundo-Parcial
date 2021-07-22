function selectClientes(){
    //petición AJAX
    const obj= {
        accion: 'select_clientes'
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
                    <td>${a.telefono}</td>
                    <td>${a.correo}</td>
                    <td>${a.direccion}</td>
                    <td>${a.registro}</td>
                    <td>${a.status}</td>
                    <td>
                        <a href="#" style="color: yellow" data-id="${a.id}" class="editar">Editar</a> |
                        <a href="#" style="color: tomato" data-id="${a.id}" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                `
            })
            $("#table-clientes tbody").html(html);
        },
        'JSON');
}
$(document).ready(function(){
    selectClientes();
    $("#btnSubmit").click(function(){
        let obj = {
            accion: "insertar_clientes"
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
            obj['accion'] = 'editar_clientes';
            obj['id'] = $(this).data('editar');
        }
        $.post('../../includes/_functions.php', obj, function(response){
            if(response.type == 'success'){
                toggleForm($("#showForm"))
                selectClientes()
            }
            alert(`${response.title}, ${response.text}`)
        },'JSON')
        $("#form").find('input').keyup(function(){
            $(this).removeClass('error');
    })
})
    //ELIMINAR
    $("#table-clientes").on('click','.eliminar', function(e){ // e = accion de hipervinculo || datos reales
        e.preventDefault()
        const id = $(this).data('id')
        
        const confirmacion = confirm('¿Desea eliminar el cliente?');
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'eliminar_clientes');
        formularioDatos.append('id', id);

        if(confirmacion){
            fetch('../../includes/_functions.php', {
                method: 'POST',
                body: formularioDatos,
            })
            .then(res => res.json())
            .then(response => {
                alert(`${response.title}: ${response.text}`)
                selectClientes()
            })   
            selectClientes()
        }
    }) 
    //EDITAR
    $('#table-clientes').on('click','.editar',function(e){
        e.preventDefault()
        const id = $(this).data('id')
        console.log(id)
        $("#showForm").trigger('click')
        $('#btnSubmit').text('Editar').data('editar', id)
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'consultar_clientes');
        formularioDatos.append('id', id);

        fetch('../../includes/_functions.php', {
            method: 'POST',
            body: formularioDatos,
        })
        .then(res => res.json())
        .then(response => {
            console.log(response)
            $('#nombre').val(response.nombre)
            $('#correo').val(response.correo)
            $('#telefono').val(response.telefono)
            $('#direccion').val(response.direccion)
            $('#registro').val(response.registro)
            $('#status').val(response.status)
        })
    });
  
});