<?php
/*
Theme Name: Data Science Management
Template Name: JobResultlist
Author: Rafał Sypień
Author URI:
Motyw wykonany na potrzeby koła naukowego Data Science Management.
*/


get_header();
 ?>
 <div class="main">





 <!-- Formularz rekrutacyjny -->
 <?php
   $jobs_args = array(
       'post_type' => 'job',
       'post_status' => 'publish',
       'orderby' => 'date',
       'order' => 'DSC',
       'posts_per_page' => -1,
     );
   $jobs_query = new WP_Query($jobs_args);
   $jobsHome = 0;?>
 <div class="container-fluid jobs-main" id="jobFeed">
 <div class="bgimage-jobs">
 <div class="container jobs" >
 <?php if ( $jobs_query->have_posts() ) : ?>
   <h2>Oferty pracy</h2>

   <?php  while ( $jobs_query->have_posts() ) : $jobs_query->the_post();
   $jobsHome++;?>
   <div class="bg-color container-fluid">


       <div class="col-xs-12 offer">
         <div class="col-xs-2 job-photo">
           <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
         </div>
         <div class="col-xs-10 job-description">
           <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
             <p>
                 <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               	 width="20px" height="20px" viewBox="0 0 438.536 438.536" style="enable-background:new 0 0 438.536 438.536;"
               	 xml:space="preserve">
                   <g>
                 	<path d="M322.621,42.825C294.073,14.272,259.619,0,219.268,0c-40.353,0-74.803,14.275-103.353,42.825
                 		c-28.549,28.549-42.825,63-42.825,103.353c0,20.749,3.14,37.782,9.419,51.106l104.21,220.986
                 		c2.856,6.276,7.283,11.225,13.278,14.838c5.996,3.617,12.419,5.428,19.273,5.428c6.852,0,13.278-1.811,19.273-5.428
                 		c5.996-3.613,10.513-8.562,13.559-14.838l103.918-220.986c6.282-13.324,9.424-30.358,9.424-51.106
                 		C365.449,105.825,351.176,71.378,322.621,42.825z M270.942,197.855c-14.273,14.272-31.497,21.411-51.674,21.411
                 		s-37.401-7.139-51.678-21.411c-14.275-14.277-21.414-31.501-21.414-51.678c0-20.175,7.139-37.402,21.414-51.675
                 		c14.277-14.275,31.504-21.414,51.678-21.414c20.177,0,37.401,7.139,51.674,21.414c14.274,14.272,21.413,31.5,21.413,51.675
                 		C292.355,166.352,285.217,183.575,270.942,197.855z"/>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                     <g>
                     </g>
                 </svg> <?php the_field('location'); ?>
           </p>
           <p><?php the_field('resultlist_description'); ?> </p>
         </div>
     </div>



   </div>
 <?php endwhile;
  wp_reset_postdata();
  else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
     <!-- <div class="col-sm-6">
       <a href="#">
         <div class="button">
           ścieżka techniczna
         </div>
       </a>
     </div> -->

 <!--<div class="col-xs-12 center">
   <div class="button"><span><a href="#">Wszystie wydarzenia</a></span></div>
 </div> -->
 </div>
 </div>
 </div>
   <!-- newsletter -->
 <?php get_template_part('newsletter'); ?>

   </div>

 <?php get_footer(); ?>
