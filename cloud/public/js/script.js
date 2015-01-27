$(document).ready(function(){
    setTimeout("$('.alert-success').slideToggle(500);",4000 );
});

if ($('#my-dropzone').length) {
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone");
    myDropzone.on("success", function(file) {
        file = JSON.parse(file.xhr.responseText);
        $('#totalSize').text(file.totalSize);
        console.log(file);
    });
}

function changeStatus(){
        window.open("http://localhost/Piscine_MVC_Cloud_Wac/cloud/public/share/1",'upload_image','menubar=no, scrollbars=no, top=100, left=100, width=700, height=200');
}

$(function(){
    $(".tab1").hide();
    $(".drop102").click(function() {
        $(".tab2").hide("slow");
        $(".tab1").slideToggle("slow");
    });

    $(".tab2").hide();
    $(".drop101").click(function() {
        $(".tab1").hide("slow");
        $(".tab2").slideToggle("slow");
    });
});