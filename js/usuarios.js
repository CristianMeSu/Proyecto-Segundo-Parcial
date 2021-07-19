function selectData(adicional = ''){
    //petición AJAX
    const obj= {
        accion: 'select_usuarios'
    };
    if(adicional != ''){
        obj['type'] = adicional.type
        obj['valor'] = adicional.valor
        obj['campo'] = adicional.campo
    }
    $.post( 
        "../../includes/_functions.php", 
        obj, 
        function(response){
            let html = ``;
            response.map(function(a,b){
                
                html += `
                <tr style="Color:#FFFFFF">
                    <td>${a.nombre}</td>
                    <td>${a.telefono}</td>
                    <td>${a.correo}</td>
                    <td>${a.nombrepermiso}</td>
                    <td>
                        <a href="#" style="color: yellow" data-id="${a.id}" class="editar">Editar</a> |
                        <a href="#" style="color: tomato" data-id="${a.id}" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                `
            })
            $("#table-data tbody").html(html);
        },
        'JSON');
}
$(document).ready(function(){
    selectData();
    $("#btnSubmit").click(function(){
        let obj = {
            accion: "insertar_usuarios"
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
            obj['accion'] = 'editar_usuarios';
            obj['id'] = $(this).data('editar');
        }
        if($(this).on('#ordenar')){
            obj['accion'] = 'ordenar_usuarios_ASC';
            
        }
        $.post('../../includes/_functions.php', obj, function(response){
            if(response.type == 'success'){
                toggleForm($("#showForm"))
                selectData()
            }
            alert(`${response.title}, ${response.text}`)
        },'JSON')
    })
    
    //ELIMINAR
    $("#table-data").on('click','.eliminar', function(e){ // e = accion de hipervinculo || datos reales
        e.preventDefault()
        const id = $(this).data('id')
        
        const confirmacion = confirm('¿Desea eliminar el registro?');
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'eliminar_usuarios');
        formularioDatos.append('id', id);

        if(confirmacion){
            fetch('../../includes/_functions.php', {
                method: 'POST',
                body: formularioDatos,
            })
            .then(res => res.json())
            .then(response => {
                alert(`${response.title}: ${response.text}`)
                selectData()
            })   
        }
    }) 
    //EDITAR
    $('#table-data').on('click','.editar',function(e){
        e.preventDefault()
        const id = $(this).data('id')
        console.log(id)
        $("#showForm").trigger('click')
        $('#btnSubmit').text('Editar').data('editar', id)
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'consultar_usuario');
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
            $('#password').val(response.password)
        })
    });
    //ORDENAR
    $('#ordenar').change(function(){
        const valor = $(this).val()
        selectData({type: 'ordenamiento', valor})
        
    })
    //BUSCAR
    $('#btnBuscar').click(function(){
        const valor = $('#buscar').val()
        const campo = $('#campo').val()
        selectData({type: 'buscar', valor, campo: campo})
        $('#campo').val('')
        $('#buscar').val('')
        
    })
});