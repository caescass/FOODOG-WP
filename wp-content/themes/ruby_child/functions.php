<?php
// lien vers le css

function fonctionAppelCss(){
    wp_enqueue_style('style_de_mon_parent', get_template_directory_uri() . '/style.css'  );
}
add_action('wp_enqueue_scripts', 'fonctionAppelCss');

?>