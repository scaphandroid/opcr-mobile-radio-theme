/**
 *(c) Alexis Raphaeloff 2017 (alexis@raphaeloff.net)
 *
 *This file is part of mobile-radio-theme.
 *
 *mobile-radio-theme is free software: you can redistribute it and/or modify
 *it under the terms of the GNU General Public License as published by
 *the Free Software Foundation, either version 3 of the License, or
 *(at your option) any later version.
 *
 *mobile-radio-theme is distributed in the hope that it will be useful,
 *but WITHOUT ANY WARRANTY; without even the implied warranty of
 *MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *GNU General Public License for more details.
 *
 *You should have received a copy of the GNU General Public License
 *along with mobile-radio-theme.  If not, see http://www.gnu.org/licenses/
 */

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
