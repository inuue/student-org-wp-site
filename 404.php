<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */

get_header(); ?>

	<div class="main">
    <div class="container-fluid whobg">
      <div class="bgimage-color">
      <div class="container who" >
          <h2>Ooops page not found!</h2>
          <p>Please contact us on <a href="mailto:info@datasciencemanagement.pl"> info@datasciencemanagement.pl</a> or go back to the home site.</p>
          <a href="<?php echo get_home_url(); ?>">
            <div class="button">
            Take me home!
            </div>
          </a>
      </div>
    </div>
  </div>
  <div class="container-fluid err404-bg" >
  <div class="container project-carousel" >
  <?php  $events_args = array(
      'post_type' => 'project',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DSC',
      'posts_per_page' => -1,
    );
    $events_query = new WP_Query($events_args); ?>
    <h2>Zobacz nasze najnowsze projekty</h2>

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
	</div><!-- .content-area -->

<?php get_footer(); ?>
