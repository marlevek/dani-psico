<?php
/**
 * Terapeuta Dani Machado functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package TERAPEUTA DANI MACHADO
 */

 /*Carregando scripts - folhas de estilo, js, bootstrap,etc. filemtime = só na hora de desenvolver o tema, remover quando terminado e por no lugar só o nro da versão*/
function dani_terapeuta_scripts(){
wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/inc/bootstrap.bundle.min.js', array(), '5.0.2', false);
wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/inc/bootstrap.min.css', array(), '5.0.2', 'all');
//Theme main stylesheet
wp_enqueue_style('dani-style', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
}

add_action('wp_enqueue_scripts', 'dani_terapeuta_scripts');

//ONEPAGE CODE
// Adicionar suporte para seções de conteúdo na página inicial
add_action( 'twentytwentyone_before_content', 'add_home_sections' );
function add_home_sections() {
    if ( is_front_page() ) {
        get_template_part( 'home', 'sections' );
    }
}

 //FIM DA ONEPAGE CODE

function dani_terapeuta_config(){
  register_nav_menus(
    array(
      'dani-terapeuta-main-menu' => 'Dani Teraputa Main Menu'
  )
);

//Habilitar imagens de destaque
add_theme_support('post-thumbnails');

//Adicionar a tag Title
add_theme_support('title-tag');

}

add_action('after_setup_theme', 'dani_terapeuta_config', 0);

// Adicionar Logomarca customizada
function dani_custom_logo_setup()
{
  $logo_dani = array(
    'width'         => 250,
    'height'        => 85,
    'flex-height'   => true,
    'flex-width'    => true,

  );
  add_theme_support('custom-logo', $logo_dani);
}
add_action('after_setup_theme', 'dani_custom_logo_setup');

// Registro de Sidebars e Widgets
function dani_sidebars()
{
  register_sidebar(array(
    'name'  => ('Formulário de Contato'),
    'id'    => ('contato'), 
    'description' => ('Adicione o código do formulário de contato com campo de texto')
    
  )
);
}
add_action('widgets_init', 'dani_sidebars');


// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

/*Fim da inclusão do menu bootstrap 5*/