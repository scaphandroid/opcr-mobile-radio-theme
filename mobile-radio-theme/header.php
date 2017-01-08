<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <script type="text/javascript">
        var titreSiteWordpress="<?php bloginfo('name');?>" ;
        var urlSiteWordpress="<?php echo home_url();?>"
    </script>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!--- Feuille de style -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" >

</head>

<body>

<header>
    <nav class="navbar navbar-default <?php if (is_admin_bar_showing()) : ?>nav-margin-admin<?php endif; ?>" >
        <div class="navbar-header">

            <a id="lien-recherche" href="#"><span id="loupe" class="glyphicon glyphicon-search"></span></a>

            <div id="logo-centre">
                <?php vost_the_custom_logo(); ?>
            </div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'Main menu',
            'container_class' => 'navbar-collapse collapse',
            'container_id' => 'navbar',
            'menu_class' => 'nav navbar-nav navbar-right',
            'walker' => new wp_bootstrap_navwalker(),
        ));
        ?>
    </nav>

    <div id="zone-recherche">
        <form id="form-recherche" method="get" action="<?php echo home_url();?>" name="searchform">
            <div>
                <input id="text-recherche" placeholder="votre recherche"  name="s" type="text"/>
                <input id="submit-recherche" type="submit" value="GO!" class="btn btn-default"/>
            </div>
        </form>
    </div>


    <?php wp_head();?>
</header>