<?php
/*
Theme Name: Data Science Management
Template Name: Single Job Page
Author: Rafał Sypień
Author URI:
Motyw wykonany na potrzeby koła naukowego Data Science Management.
*/

get_header();
?>

<div class="main">


 <div class="container-fluid slider slider-jobs">
   <div class="row">
     <div id="topSlider" class="carousel slide" data-ride="carousel">
       <!-- content slidera -->
       <div class="carousel-inner" role="listbox">
         <div class="item active">
           <?php $img = get_field('topPhoto'); ?>
           <img src="<?php echo $img['url']; ?>" width="100%;">
           <!-- <div class="slidetxt"><h2><?php the_title(); ?></h2>
           </div> -->
         </div>


       </div>

       <!-- buttony na boki -->
     </div>
   </div>
 </div>

<div class="container-fluid jobs-bg">
 <div class="container jobs">

   <div class="row">

     <div class="col-sm-8 col-sm-offset-2">

       <div class="jobs-body">
         <h1 class="jobs-sub-title"><?php the_title(); ?></h1>

         <!--<p class="project-date">28 Kwietnia, 2017 by <a href="#">Admin</a></p> -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <p><?php the_content(); ?></p>
        <?php endwhile;
      else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif;?>

      <div class="button bottom" id="apply" data-toggle="modal" data-target="#apply">
        Aplikuj teraz
      </div>
       </div>

     </div>


   </div><!-- /.row -->

 </div><!-- /.container -->
</div>


<!-- Modal -->
<div id="apply" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content jobs-modal">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Krok 1 - Uzupełnij informacje o sobie.</h4>
</div>
<div class="modal-body container-fluid">
  <div id="thankyou" class="col-xs-12"></div>
  <div class="col-sm-6 col-sm-offset-3 jobForm">
    <form id="applyForm" method="post" action="/send-application.php" enctype="multipart/form-data" data-parsley-validate="">
      <label for="name">Imię: </br><input type="text" name="name" id="name" autocomplete="given-name" data-parsley-required autofocus></label>

      <label for="surname">Nazwisko: </br><input type="surname" name="surname" id="surname" autocomplete="family-name" data-parsley-required></label>

      <label for="tel">Numer telefonu: </br><input type="tel" name="tel" id="phone" autocomplete="tel-national" data-parsley-required data-parsley-type="number"></label>

      <label for="email">Adres email: </br><input type="email" name="email" id="email" autocomplete="email" data-parsley-required data-parsley-type="email"></label>

      <label for="file">CV (pdf, doc, docx): </br><input class="fileInput" type="file" name="file" id="file" autocomplete="off" data-parsley-required data-parsley-max-file-size="5000" data-parsley-fileextension="doc,docx,pdf"></label>


      <label for="zgoda" class="zgoda"><input type="checkbox" name="zgoda" value="zgoda" id="agree" data-parsley-required>Wyrażam zgodę na przetwarzanie danych osobowych.</label>



      <button type="submit" id="submit" class="button">Wyślij aplikację</button>
      <div id="message"></div>
    </form>

  </div>
</div>
</div>

</div>
</div>


</div>
<script>
window.Parsley.addValidator('maxFileSize', {
  validateString: function(_value, maxSize, parsleyInstance) {
    if (!window.FormData) {
      alert('You are making all developpers in the world cringe. Upgrade your browser!');
      return true;
    }
    var files = parsleyInstance.$element[0].files;
    return files.length != 1  || files[0].size <= maxSize * 1024;
  },
  requirementType: 'integer',
  messages: {
    pl: 'Plik nie może być większy niz 5 mb',
  }
});
window.Parsley.addValidator('fileextension', function (value, requirement) {
        		var tagslistarr = requirement.split(',');
            var fileExtension = value.split('.').pop();
						var arr=[];
						$.each(tagslistarr,function(i,val){
   						 arr.push(val);
						});
            if(jQuery.inArray(fileExtension, arr)!='-1') {
              return true;
            } else {
              return false;
            }
        }, 32)
    .addMessage('pl', 'fileextension', 'Zły format pliku. (pdf, doc, docx)');
</script>
<?php get_footer(); ?>
