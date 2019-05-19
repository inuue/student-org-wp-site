<!-- newsletter -->
 <div class="container-fluid newsletter">
   <div class="container">
     <div class="col-xs-12">
        <h3><?php the_field('newsletter_head'); ?></h3>
        <div class="row newsbox">
          <form method="post" action="<?php echo get_template_directory_uri();?>/sendCf.php" data-parsley-validate>
          <div class="col-lg-7 col-lg-offset-1 col-sm-9">
            <input type="text" name="email" placeholder="Wpisz swój adres e-mail" data-parsley-type="email" data-parsley-required>
          </div>
          <div class="col-sm-3">
            <button class="button" name="submit" type="submit" value="submit"><?php the_field('newsletter_button'); ?></button>
        </div>
      </form>
      </div>
     </div>
   </div>
 </div>
