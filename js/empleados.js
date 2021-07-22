function selectEmpleados(){
    //petición AJAX
    const obj= {
        accion: 'select_empleados'
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
                    <td>${a.id}</td>
                    <td>${a.nombre}</td>
                    <td>${a.email}</td>
                    <td>${a.password}</td>
                    <td>${a.tipo}</td>
                    <td>
                        <a href="#" style="color: yellow" data-id="${a.id}" class="editar">Editar</a> |
                        <a href="#" style="color: tomato" data-id="${a.id}" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                `
            })
            $("#table-empleados tbody").html(html);
        },
        'JSON');

}
//insertar
$(document).ready(function(){
    selectEmpleados();

    $("#btnSubmit").click(function(){
        let obj = {
            accion: "insertar_empleados"
        }
        let bandera = 0;
        $("#form").find('input, select').map(function(){ //se puede añadir select
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
            obj['accion'] = 'editar_empleados';
            obj['id'] = $(this).data('editar');
        }

    
        $.post('../../includes/_functions.php', obj, function(response){
            if(response.type == 'success'){
                toggleForm($("#showForm"))
                selectEmpleados()
            }
            alert(`${response.title}, ${response.text}`)
        },'JSON')
        $("#form").find('input').keyup(function(){
            $(this).removeClass('error');
    })


    
   
    

    })
    //ELIMINAR
    $("#table-empleados").on('click','.eliminar', function(e){ // e = accion de hipervinculo || datos reales
        e.preventDefault()
        const id = $(this).data('id')
        
        const confirmacion = confirm('¿Desea eliminar el empleados?');
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'eliminar_empleados');
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
            selectempleados()
        }
    })
    //EDITAR
    $('#table-empleados').on('click','.editar',function(e){
        e.preventDefault()
        const id = $(this).data('id')
        console.log(id)
        $("#showForm").trigger('click')
        $('#btnSubmit').text('Editar').data('editar', id)
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'consultar_empleados');
        formularioDatos.append('id', id);

        fetch('../../includes/_functions.php', {
            method: 'POST',
            body: formularioDatos,
        })
        .then(res => res.json())
        .then(response => {
            console.log(response)
            $('#id').val(response.id)
            $('#nombre').val(response.nombre)
            $('#email').val(response.email)
            $('#password').val(response.password)
            $('#tipo').val(response.tipo)
           
        
        })
        
    });
});