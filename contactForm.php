<?php
/*
Theme Name: Data Science Management
Template Name: Contact-form
Author: Rafał Sypień
Author URI:
Motyw wykonany na potrzeby koła naukowego Data Science Management.
*/
?>

<div class="container-fluid contactbg" id="contact">
  <div class="container contact">
    <h2><?php the_field('box_header'); ?></h2>
    <div class="col-sm-6 left">
      <div class="col-xs-12">
        <div class="row">
          <div class="smicons">
            <a href="https://facebook.com/bigdatasgh/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/fb-icon.png"></a>
            <a href="https://www.linkedin.com/company-beta/18024974/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/in-icon.png"></a>
            <a href="https://www.youtube.com/channel/UC21Ea5Z86aDbKIoL08Ngn9Q" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/yt-icon.png"></a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 text">
        <p>
          <h3><?php the_field('contact_header'); ?></h3>
          <?php if(have_rows('contact_bullets')): ?>
          <ul>
            <?php while (have_rows('contact_bullets')): the_row(); ?>
          <li><?php the_sub_field('single_bullet'); ?></li>
            <?php endwhile; ?>
          </ul>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <div class="col-sm-6 right">
      <form method="post" action="<?php echo get_template_directory_uri(); ?>/sendCf.php" data-parsley-validate>
        <label for="name"><?php the_field('form_name'); ?></label>
        <label for="surname"><?php the_field('form_surname'); ?></label>
        <input type="text" name="name" data-parsley-required data-parsley-errors-container="#name-error">
        <input type="text" name="surname" data-parsley-required data-parsley-errors-container="#name-error">
        <div id="name-error"></div>

        <label for="email"><?php the_field('form_email'); ?></label>
        <input type="text" name="email" data-parsley-required data-parsley-type="email">
      <!--  <label for="subject">Temat:</label>
        <input type="text" name="subject"> -->
        <label for="msg"><?php the_field('form_msg'); ?></label>
        <textarea col="20" name="msg" data-parsley-required data-parsley-pattern="[\s\dA-Za-z-_=.,!?@()':]+"></textarea>
        <input type="checkbox" name="zgoda" value="zgoda" data-parsley-mincheck="1" required data-parsley-errors-container="#check-error"><label class="zgoda"><?php the_field('form_confirm'); ?></label>
        <div id="check-error"></div>
        <button type="submit" name="submit" class="button" value="submit"><?php the_field('form_button'); ?></button>
      </form>
    </div>
  </div>
</div>
