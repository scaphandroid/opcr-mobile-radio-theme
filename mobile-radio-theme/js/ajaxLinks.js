/*Ce sript s'inspire du tutoriel suivant : http://boiteaweb.fr/la-navigation-avec-ajax-7743.html */

/***** EN CAS DE SOUCIS OU D'USAGE PARTICULIER VOUS POUVEZ PERSONNALISER CES DEUX VALEURS *****/
urlSite = urlSiteWordpress;
nomSite = titreSiteWordpress;


// j'écoute les clic de tous les liens, sauf de l'admin bar
$( document ).on( 'click', 'a[href^="'+urlSite+'"]:not(.ab-item)', do_ajax_request );

// lors d'un clic, j'exécute une fonction qui prend le lien en paramètre
function do_ajax_request( e ) {
    e.preventDefault();
    var url = $( this ).attr( 'href' );
    var titre = ($(this).context.textContent);

    //on modifie ici l'état de l'historique
    history.pushState(null, titre, url);
    if(titre !== ''){
        document.title = titre+ ' | ' + titreSiteWordpress ;
    }else{
        document.title = titreSiteWordpress ;
    }

    perform_ajax_request( url );
}

// je fais une requête ajax vers le lien,
// en poussant VOSTOKAJAXREQUEST dans les headers pour adapter le chargement côté wordpress
function perform_ajax_request( url ) {

    //lors du clic sur les liens de la barre de navigation, on veut qu'elle se replie
    if($('.collapse').hasClass('in')){
        $('.collapse').collapse("hide");
    }

    $.ajax({
        url    : url,
        type   : 'POST',
        headers: {
            'X-Requested-With':'VOSTOKAJAXREQUEST'
        }
    }).done( function( data ) {
        remplaceContent(data);
    }).error( function() {
        console.log('contenu non trouvé');
    });
}

//remplacement du contenu
function remplaceContent(data){
        $('.body').remove();
        window.scrollTo(0,0);
        $('header').after(data);
}

//action pour la navigation via précédent et suivant
window.addEventListener( 'popstate', function(e) {
    perform_ajax_request(e.currentTarget.location.href);
} );