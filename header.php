<html>
<head>
  <meta charset="utf8">
  <title><?php the_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="Jesteśmy organizacją studencką SKN Data Science Management ze Szkoły Głównej Handlowej mającą na celu stworzenie hubu zrzeszającego liderów nowej ekonomii opartej na Big Data.">
  <meta name="author" content="Rafał Sypień">
  <meta name="keywords" content="Big Data, Data Science, Managemenet, Szkoła Główna Handlowa, Warszawa">
  <?php if ( is_404() ): ?>
    <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <?php endif; ?>


  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/main.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98230399-1', 'auto');
  ga('send', 'pageview');

  </script> -->
  <!-- Google Tag Manager -->
<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P2387KP');</script> -->
<!-- End Google Tag Manager -->
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2387KP"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
  <!-- End Google Tag Manager (noscript) -->
  <nav class="navbar-top">
    <div class="container">
      <ul class="nav">
        <li class="mail"><a href="mailto:info@datasciencemanagement.pl"><!--<img src="<?php echo get_template_directory_uri(); ?>/img/mail.png">-->info@datasciencemanagement.pl</a></li>
        <li><?php pll_the_languages(array('display_names_as'=>'slug'));?></li>
        <li></li>
      </ul>
    </div>
  </nav>

  <?php if( is_front_page()): ?>
  <nav class="navbar">
    <div class="container">
      <ul class="nav" id="menu">
        <li class="logo"><a><img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" href="#"></a></li>
        <li class="hamburger"><a>☰</a></li>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'menu-item', 'container' => false, 'items_wrap'    => '%3$s', ) ); ?>
        <!--<li class="menu-item"><a href="#about">O nas</a></li>
        <li class="menu-item"><a href="#events" >Projekty</a></li>
        <li class="menu-item"><a href="<?php echo get_home_url(); ?>/index.php?p=15">Dołącz do Nas!</a></li>
        <li class="menu-item"><a href="#contact">Kontakt</a></li> -->


      </ul>
    </div>
  </nav>
<?php elseif ( is_page(89)): ?>
  <nav class="navbar">
    <div class="container">
      <ul class="nav" id="menu">
        <li class="logo"><a><img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" href="#"></a></li>
        <li class="hamburger"><a>☰</a></li>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'menu-item', 'container' => false, 'items_wrap'    => '%3$s', ) ); ?>

      </ul>
    </div>
  </nav>
<?php elseif ( is_404() ): ?>
  <nav class="navbar">
    <div class="container">
      <ul class="nav" id="menu">
        <li class="logo"><a><img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" href="#"></a></li>
        <li class="hamburger"><a>☰</a></li>
        <?php wp_nav_menu( array( 'theme_location' => 'not_front_menu', 'container_class' => 'menu-item', 'container' => false, 'items_wrap'    => '%3$s', ) ); ?>
      </ul>
    </div>
  </nav>

<?php else: ?>
  <nav class="navbar">
    <div class="container">
      <ul class="nav" id="menu">
        <li class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg"></a></li>
        <li class="hamburger"><a>☰</a></li>
        <?php wp_nav_menu( array( 'theme_location' => 'not_front_menu', 'container_class' => 'menu-item', 'container' => false, 'items_wrap' => '%3$s', ) ); ?>

      </ul>
    </div>
  </nav>
<?php endif; ?>
