<?php



add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 400, 400, array( 'center', 'center')  );

add_action( 'phpmailer_init', 'email_send' );
function email_send( PHPMailer $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = '####';
    $phpmailer->Port = 465; // could be different
    $phpmailer->Username = 'no-reply@datasciencemanagement.pl'; // if required
    $phpmailer->Password = '####'; // if required
    $phpmailer->SMTPAuth = true;

    $phpmailer->SMTPSecure = "SSL"; // Choose SSL or TLS, if necessary for your server
    $phpmailer->Port = 465;
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->From = "no-reply@datasciencemanagement.pl";
    $phpmailer->FromName = "Data Science Management";
};

add_action( 'init', 'create_projects');

function create_projects() {
  register_post_type( 'project', array (
    'labels' => array (
      'name' => __('Projekty'),
      'singular_name' => __('Projekt'),
    ),
    'public' => true,
    'rewrite' => array('slug' => 'projekty'),
    'has_archive' => true,
    'hierarchical' => true,
    'supports' => array('title', 'editor', 'author', 'thumbnail')
    )
  );
}

add_action( 'init', 'create_jobs');

function create_jobs() {
  register_post_type( 'job', array (
    'labels' => array (
      'name' => __('Oferty Pracy'),
      'singular_name' => __('Oferta Pracy'),
    ),
    'public' => true,
    'rewrite' => array('slug' => 'praca', 'with_front' => true),
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => array('title', 'editor', 'author', 'thumbnail')
    )
  );
}


add_action( 'init', 'register_my_menu' );

function register_my_menu() {
  register_nav_menus( array(
	'header-menu' => 'Header Menu',
	'not_front_menu' => 'Not front page menu',
) );
}

?>
