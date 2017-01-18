<?php
$ajaxRequest = false;
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH']== 'VOSTOKAJAXREQUEST' ){
    $ajaxRequest = true;
}
?>

<?php if (!$ajaxRequest) : get_header(); endif ;?>

<div class="body container-fluid">

    <div class="row">
        <h4 style="text-align: center; margin-top: 20px">Désolé, aucun contenu trouvé !</h4>
        <div style="text-align: center; margin-top: 20px">
            <a href="<?php echo home_url()?>">Retour à l'accueil</a>
        </div>
    </div>

</div>
<?php if (!$ajaxRequest) : get_footer(); endif ;?>
