<?php
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

wp_footer(); ?>

    <footer>
        <div id="player-control">
            <img id="playImg" src="<?php bloginfo('template_url'); ?>/img/play.png">
            <img id="pauseImg" src="<?php bloginfo('template_url'); ?>/img/pause.png" style="display: none;">
        </div>

        <!-- personnalisez ici l'adresse de votre flux radio ! -->
        <audio id="audioplayer">
            <source src="http://radiovostok.ice.infomaniak.ch/radiovostok.aac.m3u" type="audio/x-mpegurl"/>
            <source src="http://radiovostok.ice.infomaniak.ch/radiovostok.aac" type="audio/mpeg"/>
            Votre navigateur ne supporte pas le MP3 streaming
        </audio>

    </footer>

    <!--  Placement des scripts -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Javascript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/moreArticles.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/ajaxLinks.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/audioControl.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/recherche.js"></script>
    <!-- Fin des scripts -->
</body>
</html>