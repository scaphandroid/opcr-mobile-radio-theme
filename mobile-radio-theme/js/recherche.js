$(document).ready(function(){
   $('#lien-recherche').click(function(){
       $('#zone-recherche').toggle();
   })

    $('#submit-recherche').click(function(e){
        e.preventDefault();
        perform_ajax_request($('#form-recherche').attr('action') + '/?s=' + $('#text-recherche').val());
        $('#zone-recherche').toggle();
    })
});