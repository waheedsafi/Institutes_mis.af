$(document).ready(function () {
    

$('#slider .main-content').hide();
$('#slider .main-content.carousel-content').show();


$('ul #login').on('click',function(){
    var a=$(this);
    var id=a.attr('id');
    $('#slider .main-content').hide();
$('#slider .login-content').show();



});
$('li #home').on('click',function(){
    var a=$(this);
    var id=a.attr('id');
    $('#slider .main-content').hide();
    $('#slider .main-content.carousel-content').show();




});




});