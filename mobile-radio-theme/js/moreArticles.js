//pour charger 10 articles de plus lors du clic sur "charger plus d'article"

/***** EN CAS DE SOUCIS OU D'USAGE PARTICULIER VOUS POUVEZ PERSONNALISER CES DEUX VALEURS  *****/
var urlBase = urlSiteWordpress;
var sequenceDArticles = 1;


$("#plusdarticles").click(function(e){
    e.preventDefault();

    $.ajax({
        url: urlBase + '/wp-admin/admin-ajax.php',
        data: {
            'action': 'get_more',
            'fn': 'get_latest_posts',
            'sequenceDArticles': sequenceDArticles,
            'category': $("#plusdarticles").attr('data-category')
        },
        dataType: 'HTML'
    }).success(function(data){
        console.log(data.length);
        $('#plusdarticles').before(data.substring(0, data.length-1));
        sequenceDArticles++;
    });
});
