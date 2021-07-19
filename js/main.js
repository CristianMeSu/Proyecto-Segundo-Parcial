function toggleForm(button){
    $('.vista').slideUp()
    if (button.hasClass('closeForm')){
        button.text('Insertar').removeClass('closeForm').removeClass('btn-dark')
        $('.vista:first').slideDown()
    } else {
       button.text('Cerrar').addClass('closeForm').addClass('btn-dark')
        $('.vista:last').slideDown()
        $('#form')[0].reset()
        $('#btnSubmit').removeData('Editar').text('Guardar')
    }
} 

$(document).ready(function(){
    $('#showForm').click(function(e){
        e.preventDefault()
        toggleForm($(this));
    });
})