function selectVisitas(){
    //petición AJAX
    const obj= {
        accion: 'select_visitas'
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
                    <td>${a.cliente}</td>
                    <td>${a.servicio}</td>
                    <td>${a.empleado}</td>
                    <td>${a.registro}</td>
                    <?php 
                    if(${a.date}<=15){?>
                    <td style="color:#C76C00">${a.cita}</td>
                    <?php
                    } elseif(${a.date}<=5){?>
                    <td style="color:#C70000">${a.cita}</td>
                    <?php
                    }else{?>
                        <td>${a.cita}</td>
                    <?php
                    }
                    ?>
                    
                    <td>
                        <a href="#" style="color: yellow" data-id="${a.id}" class="editar">Editar</a> |
                        <a href="#" style="color: tomato" data-id="${a.id}" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                `
            })
            $("#table-visitas tbody").html(html);
        },
        'JSON');

}
//insertar
$(document).ready(function(){
    selectVisitas();
    $("#btnSubmit").click(function(){
        let obj = {
            accion: "insertar_visitas"
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
            obj['accion'] = 'editar_visitas';
            obj['id'] = $(this).data('editar');
        }
        $.post('../../includes/_functions.php', obj, function(response){
            if(response.type == 'success'){
                toggleForm($("#showForm"))
                selectVisitas()
            }
            alert(`${response.title}, ${response.text}`)
        },'JSON')
        $("#form").find('input').keyup(function(){
            $(this).removeClass('error');
    })
   
    })
    //ELIMINAR
    $("#table-visitas").on('click','.eliminar', function(e){ // e = accion de hipervinculo || datos reales
        e.preventDefault()
        const id = $(this).data('id')
        
        const confirmacion = confirm('¿Desea eliminar la visita?');
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'eliminar_visitas');
        formularioDatos.append('id', id);

        if(confirmacion){
            fetch('../../includes/_functions.php', {
                method: 'POST',
                body: formularioDatos,
            })
            .then(res => res.json())
            .then(response => {
                alert(`${response.title}: ${response.text}`)
                selectVisitas()
            })
            selectVisitas()
        }
        
    })
    //EDITAR
    $('#table-visitas').on('click','.editar',function(e){
        e.preventDefault()
        const id = $(this).data('id')
        console.log(id)
        $("#showForm").trigger('click')
        $('#btnSubmit').text('Editar').data('editar', id)
        
        let formularioDatos = new FormData();
        formularioDatos.append('accion', 'consultar_visitas');
        formularioDatos.append('id', id);

        fetch('../../includes/_functions.php', {
            method: 'POST',
            body: formularioDatos,
        })
        .then(res => res.json())
        .then(response => {
            console.log(response)
            $('#cliente').val(response.cliente)
            $('#servicio').val(response.servicio)
            $('#empleado').val(response.empleado)
            $('#registro').val(response.registro)
            $('#cita').val(response.cita)
        
        })
        
    });
});