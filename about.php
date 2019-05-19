<?php
/*
Theme Name: Data Science Management
Template Name: About
Author: Rafał Sypień
Author URI:
Motyw wykonany na potrzeby koła naukowego Data Science Management.
*/


get_header();
 ?>

 <div class="main">


  <div class="container-fluid slider">
    <div class="row">
      <div id="topSlider" class="carousel slide" data-ride="carousel">
        <!-- content slidera -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <?php $image = get_field('zdjecie'); ?>
            <img src="<?php echo $image['url']; ?>" width="100%;">
            <?php if (get_field('slider_txt')): ?>
              <div class="slidetxt">
                <h2><?php the_field('slider_txt'); ?></h2>
              </div>
            <?php endif; ?>
            <?php if (get_field('button_txt')): ?>
              <div class="buttonCenter"><a href="<?php the_field('btn_link'); ?>"><div class="button"><?php the_sub_field('button_txt'); ?></div></a></div>
            <?php endif; ?>
          </div>


        </div>

        <!-- buttony na boki -->
      </div>
    </div>
  </div>


  <!-- nasze wartości -->
  <!-- <div class="container info" id="info">
    <div class="row">
      <h2>Nasze Wartości</h2>
      <div class="col-sm-3 col-xs-6">
        <div class="icon">
          <img src="<?php echo get_template_directory_uri(); ?>/img/icon1.png">
        </div>
        <div class="desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu aliquet ligula. Cras facilisis augue id augue lobortis, quis efficitur sapien rutrum. Lorem ipsum dolor sit amet,
        </div>
      </div>

      <div class="col-sm-3 col-xs-6">
        <div class="icon">
          <img src="<?php echo get_template_directory_uri(); ?>/img/icon1.png">
        </div>
        <div class="desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu aliquet ligula. Cras facilisis augue id augue lobortis, quis efficitur sapien rutrum. Lorem ipsum dolor sit amet,
        </div>
      </div>

      <div class="col-sm-3 col-xs-6">
        <div class="icon">
          <img src="<?php echo get_template_directory_uri(); ?>/img/icon1.png">
        </div>
        <div class="desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu aliquet ligula. Cras facilisis augue id augue lobortis, quis efficitur sapien rutrum. Lorem ipsum dolor sit amet,
        </div>
      </div>

      <div class="col-sm-3 col-xs-6">
        <div class="icon">
          <img src="<?php echo get_template_directory_uri(); ?>/img/icon1.png">
        </div>
        <div class="desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu aliquet ligula. Cras facilisis augue id augue lobortis, quis efficitur sapien rutrum. Lorem ipsum dolor sit amet,
        </div>
      </div>
  </div>
</div>-->

<div class="container-fluid whobg" id="about">
  <div class="bgimage-color">
  <div class="container who" >
      <h2><?php the_field('about'); ?></h2>
      <div class="grabAbout container-fluid">
        <div class="col-lg-8 col-lg-push-2"><p><?php the_field('about_desc'); ?></p></div>
        <div class="cytat col-xs-12">
          <q><?php the_field('cytat');?></q></br>
          <span><?php the_field('author_quote'); ?></span>
        </div>
      </div>
  </div>
</div>
</div>
<!-- zarząd koła -->
<div class="container-fluid zarzad">
  <div class="container">
    <h2><?php the_field('zarzad'); ?></h2>

    <div class="col-sm-4 col-sm-offset-4 prezes">
      <div class="pic">
        <?php
        $prezes = get_field('president_img');
        $vice1 = get_field('vice1_img');
        $vice2 = get_field('vice2_img');
        $opiekun = get_field('opiekun_img');
          ?>
        <img src="<?php echo $prezes['url']; ?>">
      </div>
      <div class="contact-info">
        <h3><span><?php the_field('president_funckja'); ?></span></br><?php the_field('president_name'); ?></h3>
        <a href="https://www.linkedin.com/in/adrianna-wo%C5%82owiec-5a1270142/">Linked In</a>
      </div>
    </div>

    <div class="col-sm-4 col-sm-offset-2">
      <div class="pic">
        <img src="<?php echo $vice1['url']; ?>">
      </div>
      <div class="contact-info">
        <h3><span><?php the_field('vice1_funckja'); ?></span></br><?php the_field('vice1_name'); ?></h3>
        <a href="https://www.linkedin.com/in/barbara-sekudewicz-444a61139/">Linked In</a>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="pic">
        <img src="<?php echo $vice2['url']; ?>">
      </div>
      <div class="contact-info">
        <h3><span><?php the_field('vice2_funckja'); ?></span></br><?php the_field('vice2_name'); ?></h3>
        <a href="https://www.linkedin.com/in/barbara-sekudewicz-444a61139/">Linked In</a>
      </div>
    </div>

    <div class="col-sm-4 col-sm-offset-4">
      <div class="pic">
        <img src="<?php echo $opiekun['url']; ?>">
      </div>
      <div class="contact-info">
        <h3><span><?php the_field('opiekun_funckja'); ?></span></br><?php the_field('opiekun_name'); ?></h3>
        <a href="http://wojciechkurowski.blogspot.com">Zobacz Blog</a>
      </div>
    </div>


  </div>
</div>

<!-- Dołącz do nas -->

<!-- Kontakt -->
<?php get_template_part('contactForm'); ?>


<!-- newsletter -->
<?php get_template_part('newsletter'); ?>


</div>
<?php get_footer(); ?>
