<?php
/*
Theme Name: Data Science Management
Template Name: Single Project Page
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
           <?php $img = get_field('topPhoto'); ?>
           <img src="<?php echo $img['url']; ?>" width="100%;">
           <?php if(get_field('banner_txt')) {?>
           <div class="slidetxt">
             <h2><?php the_title(); ?></h2>
           </div>
         <?php };?>
         </div>

       </div>

       <!-- buttony na boki -->
     </div>
   </div>
 </div>


 <div class="container project">

   <div class="row">

     <div class="col-sm-8 col-sm-offset-2">

       <div class="project-body">
         <h1 class="project-sub-title"><?php the_title(); ?></h1>
         <!--<p class="project-date">28 Kwietnia, 2017 by <a href="#">Admin</a></p> -->
         <p class="title"><?php the_field('short_intro'); ?></p>
           <p><?php the_field('text_i_media'); ?></p>
       </div>

     </div>


   </div><!-- /.row -->

 </div><!-- /.container -->

 <div class="container-fluid project-bg" >
 <div class="container project-carousel" >
 <?php
 $currentID = get_the_ID();
 $events_args = array(
     'post_type' => 'project',
     'post_status' => 'publish',
     'orderby' => 'date',
     'order' => 'DSC',
     'posts_per_page' => -1,
     'post__not_in' => array($currentID)
   );
   $events_query = new WP_Query($events_args); ?>
   <h2>Zobacz nasze pozostałe Aktualności</h2>

   <?php if ( $events_query->have_posts() ) : ?>

        <div class="owl-carousel owl-theme">

    <!-- the loop -->
      <?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
         <div class="col-sm-12">
           <a href="<?php the_permalink(); ?>">
             <div class="col-xs-12 box">
               <div class="row image">
                 <img src="<?php the_post_thumbnail_url(); ?>" >
               </div>
               <div class="description title">
                 <h3><?php the_title(); ?></h3>
               </div>
               <div class="description">
                 <p><?php the_excerpt(); ?></p>
               </div>
             </div>
           </a>
         </div>
      <?php endwhile; ?>
      <!-- end of the loop -->

      </div>

  <?php wp_reset_postdata(); ?>

   <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
   <?php endif; ?>

 <!--<div class="col-xs-12 center">
   <div class="button"><span><a href="#">Wszystie wydarzenia</a></span></div>
 </div> -->
</div>
</div>

<!-- Kontakt -->
<div class="container-fluid contactbg" id="contact">
<div class="container contact" id="contact">
 <h2>Kontakt</h2>
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
     <p><h3>Skontaktuj się z nami jeśli:</h3>
       <ul>
       <li>jesteś firmą i chciałbyś nawiązać z nami współpracę</li>
       <li>jesteś członkiem organizacji studenckiej z innej uczelni i chciałbyś wspólnie z nami zrobić projekt</li>
       <li>jesteś przedstawicielem mediów</li>
       <li>chciałbyś się nas o coś zapytać lub podzielić się z nami jakimiś ciekawymi przemyśleniami</li>
       </ul>
     </p>
   </div>
 </div>
 <div class="col-sm-6 right">
   <form method="post" action="<?php echo get_template_directory_uri(); ?>/send.php" data-parsley-validate>
     <label for="name">Imię:</label>
     <label for="surname">Nazwisko:</label>
     <input type="text" name="name" data-parsley-required data-parsley-errors-container="#name-error">
     <input type="text" name="surname" data-parsley-required data-parsley-errors-container="#name-error">
     <div id="name-error"></div>

     <label for="email">E-mail:</label>
     <input type="text" name="email" data-parsley-required data-parsley-type="email">
   <!--  <label for="subject">Temat:</label>
     <input type="text" name="subject"> -->
     <label for="msg">Wiadomość:</label>
     <textarea col="20" name="msg" data-parsley-required></textarea>
     <input type="checkbox" name="zgoda" value="zgoda" data-parsley-mincheck="1" required data-parsley-errors-container="#check-error"><label class="zgoda">Wyrażam zgodę na przetwarzanie danych osobowych.</label>
     <div id="check-error"></div>
     <button type="submit" name="submit" class="button" value="submit">Wyślij</button>
   </form>
 </div>
</div>
</div>

<!-- newsletter -->
<div class="container-fluid newsletter">
  <div class="container">
    <div class="col-xs-12">
       <h3>Chcesz byc na bieżąco? Zapisz się na nasz Newsletter!</h3>
       <div class="row newsbox">
         <form method="post" action="send.php" data-parsley-validate>
         <div class="col-lg-7 col-lg-offset-1 col-sm-9">
           <input type="text" name="email" placeholder="Wpisz swój adres e-mail" data-parsley-type="email" data-parsley-required>
         </div>
         <div class="col-sm-3">
           <button class="button" name="submit" type="submit" value="submit">Zapisz się!</button>
       </div>
     </form>
     </div>
    </div>
  </div>
</div>


</div>



</div>

<?php get_footer(); ?>
