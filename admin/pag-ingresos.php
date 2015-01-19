<?php

// Ingresos

add_action( 'admin_menu', 'ingresos_add_admin_menu' );
add_action( 'admin_init', 'ingresos_settings_init' );


function ingresos_add_admin_menu(  ) { 

    //add_options_page( 'Ingresos', 'Ingresos', 'publish_posts', 'ingresos', 'ingresos_options_page' );
    add_submenu_page('users.php', 'Ingresos', 'Ingresos', 'publish_posts', 'ingresos', 'ingresos_options_page');


}


function ingresos_settings_init(  ) { 

    register_setting( 'pluginPage', 'ingresos_settings' );

    add_settings_section(
        'ingresos_pluginPage_section', 
        __( 'Your section description', 'wordpress' ), 
        'ingresos_settings_section_callback', 
        'pluginPage'
    );

    add_settings_field( 
        'ingresos_text_field_0', 
        __( 'Settings field description', 'wordpress' ), 
        'ingresos_text_field_0_render', 
        'pluginPage', 
        'ingresos_pluginPage_section' 
    );


}


function ingresos_settings_section_callback(  ) { 

    echo __( 'This section description', 'wordpress' );

}


function ingresos_options_page(  ) { 

// Aranceles

$valor_noticia = 40;
$valor_multimedia = 20;
$valor_dossier = 150;
$valor_longform = 250;
$valor_publinota = 60;

$valor_pv_noticia = 20;
$valor_pv_multimedia = 20;
$valor_pv_dossier = 20;
$valor_pv_longform = 20;
$valor_pv_publinota = 0;    

    ?>
    <div class="wrap">
        <h2>Ingresos</h2>
        
        <?php 
        $id = get_current_user_id();
        $current_year = date('Y');
        $current_month = date('n');
        $noticia = 0;
        $multimedia = 0;
        $dossier = 0;
        $longform = 0;
        $publinota = 0;
        query_posts("post_type=post&post_status=publish&posts_per_page=-1&author=$id&monthnum=$current_month&year=$current_year"); while (have_posts()) : the_post(); // Excluir de acá las publinotas cuando las cree
            if( has_term( 'multimedia', 'formatos' ) ) { $multimedia = $multimedia + 1; }
            elseif( has_term( 'dossier', 'formatos' ) ) { $dossier = $dossier + 1; }
            elseif( has_term( 'longform', 'formatos' ) ) { $longform = $longform + 1; }
            elseif( has_term( 'publinota', 'formatos' ) ) { $publinota = $publinota + 1; }
            else {  $noticia = $noticia + 1; }

        endwhile; wp_reset_query();
        ?> 

        <table class="wp-list-table widefat fixed" style="margin: 20px 0;">
            <thead>
                <tr class="alternate">
                    <th>Tipo de publicaci&oacute;n</th>
                    <th>Cantidad</th>
                    <th>Ingresos</th>
                </tr>                
            </thead>
            <tr class="alternate">
                <th>Noticias</th>
                <th><?php echo $noticia; ?></th>
                <th>$<?php $ganancias_noticia = $noticia * $valor_noticia; echo $ganancias_noticia; ?></th>
            </tr>
            <tr>
                <th>Multimedia</th>
                <th><?php echo $multimedia; ?></th>
                <th>$<?php $ganancias_multimedia = $multimedia * $valor_multimedia; echo $ganancias_multimedia; ?></th>
            </tr>  
            <tr class="alternate">
                <th>Dossier</th>
                <th><?php echo $dossier; ?></th>
                <th>$<?php $ganancias_dossier = $dossier * $valor_dossier; echo $ganancias_dossier; ?></th>
            </tr>                      
            <tr>
                <th>Longform</th>
                <th><?php echo $longform; ?></th>
                <th>$<?php $ganancias_longform = $longform * $valor_longform; echo $ganancias_longform; ?></th>
            </tr>    
            <tr class="alternate">
                <th>Publinotas</th>
                <th><?php echo $publinota; ?></th>
                <th>$<?php $ganacias_publinota = $publinota * $valor_publinota; echo $ganacias_publinota; ?></th>
            </tr> 
            <tfoot>
                <tr>
                    <th><strong>Total</strong></th>
                    <th><strong><?php echo $noticia + $multimedia + $dossier + $longform + $publinota; ?></strong></th>
                    <th><strong>$<?php echo $ganancias_noticia + $ganancias_multimedia + $ganancias_dossier + $ganancias_longform + $ganacias_publinota; ?></strong></th>
                </tr>                              

        <?php 
        $id = get_current_user_id();
        if(date('n') == 1) {
            $current_year = date('Y') - 1;
        } else {
            $current_year = date('Y');
        }
        $current_month = date('n') - 1;
        $noticia = 0;
        $multimedia = 0;
        $dossier = 0;
        $longform = 0;
        $publinota = 0;
        query_posts("post_type=post&post_status=publish&posts_per_page=-1&author=$id&monthnum=$current_month&year=$current_year"); while (have_posts()) : the_post(); // Excluir de acá las publinotas cuando las cree
            if( has_term( 'multimedia', 'formatos' ) ) { $multimedia = $multimedia + 1; }
            elseif( has_term( 'dossier', 'formatos' ) ) { $dossier = $dossier + 1; }
            elseif( has_term( 'longform', 'formatos' ) ) { $longform = $longform + 1; }
            elseif( has_term( 'publinota', 'formatos' ) ) { $publinota = $publinota + 1; }
            else {  $noticia = $noticia + 1; }

        endwhile; wp_reset_query();
        ?> 
 
                <tr class="alternate">
                    <th><strong>Total mes pasado</strong></th>
                    <th><strong><?php echo $noticia + $multimedia + $dossier + $longform + $publinota; ?></strong></th>
                    <th><strong>$<?php echo $noticia * $valor_noticia + $multimedia * $valor_multimedia + $dossier * $valor_dossier + $longform * $valor_longform + $publinota * $valor_publinota; ?></strong></th>
                </tr>   
            </tfoot>
      
        </table> 

        <?php 
        /*
        $id = get_current_user_id();
        $pageviews = 0;
        query_posts("post_type=post&posts_per_page=-1&author=$id"); while (have_posts()) : the_post(); // Excluir de acá las publinotas cuando las cree
            $pageviews = $pageviews + gapp_get_post_pageviews();
        endwhile; wp_reset_query();
       */
        ?> 

       <table class="wp-list-table widefat fixed">
            <thead>
                <tr>
                    <th>Visitas por publicaci&oacute;n</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>    
            <tr class="alternate">
                <th>Pageviews</th>
                <th><?php echo $pageviews; ?></th>
                <th></th>
            </tr>       
            <tr>
                <th>Pagadas</th>
                <th><?php $pagadas = 0; echo $pagadas; ?></th>
                <th></th>
            </tr>   
            <tr class="alternate">
                <th>Por pagar</th>
                <th><?php $por_pagar = $pageviews - $pagadas; echo $por_pagar; ?></th>
                <th><strong>$<?php echo $por_pagar / 1000 * 20; ?></strong></th>
            </tr>             
        </table>        

    </div>    

<?php } ?>