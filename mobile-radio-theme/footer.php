<?php wp_footer(); ?>

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