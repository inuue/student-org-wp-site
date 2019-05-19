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
           <div class="slidetxt">
             <h2><?php the_title(); ?></h2>
           </div>
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
   <h2>Zobacz nasze pozostałe projekty</h2>

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


<?php
if ( is_single(151) ) { ?>
<!-- Modal -->
<div id="register" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content register-modal">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Zapisy na warsztaty - REKOMENDACJE 101</h4>
</div>
<div class="modal-body container-fluid">
  <div id="thankyou" class="col-xs-12"></div>
  <div class="col-sm-10 col-sm-offset-1 registerOnwelo">
    <form method="post" id="formValid" action="<?php echo get_template_directory_uri(); ?>/rekomendacje-101.php" data-parsley-validate>
      <label for="name">Imię:
        <input type="text" name="name" id="name" data-parsley-required autocomplete="given-name"></label>

      <label for="surname">Nazwisko:
        <input type="text" name="surname" id="surname" data-parsley-required autocomplete="family-name"></label>

      <label for="email">E-mail:
        <input type="email" name="email" id="email" data-parsley-required data-parsley-type="email" autocomplete="email"></label>

      <label for="phone">Nr telefonu:
        <input type="tel" name="phone" id="tel" data-parsley-required data-parsley-type="number" autocomplete="tel-national"></label>


      <label for="university">Uczelnia:
      <input list="university" name="university" id="univer" data-parsley-required/></label>
      <datalist id="university">
        <option value="SGH">
        <option value="Politechnika Warszawska">
        <option value="Uniwersytet Warszawski">
      </datalist>

      <label for="rok">Wybierz rok studiów:</label>
      <select name="rok" id="rok" data-parsley-required>
        <option value="wybierz" disabled="true"  selected="true">wybierz</option>
        <option value="1 lic">1 lic</option>
        <option value="2 lic">2 lic</option>
        <option value="3 lic">3 lic</option>
        <option value="1 mgr">1 mgr</option>
        <option value="2 mgr">2 mgr</option>
      </select>

      <label for="kierunek">Kierunek studiów:
      <input list="kierunek" id="kierunekStudiow" name="kierunek" data-parsley-required/></label>
      <datalist id="kierunek">
        <option value="Ogólny">
        <option value="FiR">
        <option value="MIESI">
        <option value="Big Data">
        <option value="Informatyka">
      </datalist>



      <label for="recommend">Skąd dowiedziałeś się o warsztatach:</label>
      <select name="recommend" id="recommend" data-parsley-required>
        <option value="wybierz" disabled="true" selected="true">wybierz</option>
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="Targi kół i organizacji">Targi kół i organizacji</option>
        <option value="Od znajomego">Od znajomego</option>
        <option value="Prezentacja na wykładzie">Prezentacja na wykładzie</option>
        <option value="Konferencja">Konferencja</option>
        <option value="Od opiekuna koła">Od opiekuna koła</option>
      </select>

      <label for="number101">Co Twoim zdaniem oznacza symbol 101 w nazwie wydarzenia?</label>
      <textarea col="20" name="number101" id="number101" data-parsley-required></textarea>

      <label for="casestudy" >Jakie rozwiązanie Twoim zdaniem najlepiej sprawdziłoby się w ramach case study przedstawionego na wykładzie i dlaczego?</label>
      <textarea col="20" name="casestudy" id="casestudy" data-parsley-required></textarea>

      <label for="netflix">Czy wiesz co to Netflix Prize? Jaki był efekt tego przedsięwzięcia?</label>
      <textarea col="20" name="netflix"  id="netflix" data-parsley-required></textarea>

      <label class="zgoda"><input type="checkbox" id="agree" name="zgoda" value="zgoda" data-parsley-mincheck="1" required data-parsley-required>Wyrażam zgodę na przetwarzanie danych osobowych.</label>
      <div id="check-error"></div>


      <button type="submit" name="submit" value="submit" class="button" id="submitOnwelo">Wyślij</button>
      <div id="message" style="margin-top: 15px;"></div>
    </form>

  </div>
</div>
</div>

</div>
</div>
<?php }; ?>
<?php
if ( is_single(151) ) { ?>
<script>
  $("#submitOnwelo").click(function(){

    var $form = $('#formValid');
    $form.parsley().validate();
    var name = $("#name").val();
    var surname = $("#surname").val();
    var email = $("#email").val();
    var phone = $("#tel").val();
    var university = $("#univer").val();
    var rok = $("#rok").val();
    var kierunekStudiow = $("#kierunekStudiow").val();
    var recommend = $("#recommend").val();
    var number101 = $("#number101").val();
    var casestudy = $("#casestudy").val();
    var netflix = $("#netflix").val();
    var agree = $('#agree').prop('checked');
    var thankYou =  "<h3>Dziekujemy, Twoje zgłoszenie zostało przesłane.</h3></br><h4>Do 19.10 do godziny 20:00 będziemy odpowiadać na wszystkie zgłoszenia.</h4>";
    if((email == '') || (name == '') || (agree == false)) {
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Uzupełnij wszystkie pola</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "<?php echo get_template_directory_uri(); ?>/rekomendacje-101.php",
        data: "name="+name+"&surname="+surname+"&email="+email+"&phone="+phone+"&university="+university+"&rok="+rok+"&kierunekStudiow="+kierunekStudiow+"&recommend="+recommend+"&number101="+number101+"&casestudy="+casestudy+"&netflix="+netflix,
        success: function(html){

      var text = $(html).text();
      //Pulls hidden div that includes "true" in the success response
      var response = text.substr(text.length - 4);

          if(response == "true"){
            $("button[type=submit]").attr("disabled", false);
            $("button[type=submit]").css('opacity','1');
          $("#message").html(html);
          setTimeout(function(){
            $('#formValid').text('');
            $('#thankyou').html(thankYou);

          },1000);
      }
    else {
      $("#message").html(html);
      $("button[type=submit]").attr("disabled", false);
      $("button[type=submit]").css('opacity','1');
      }
        },
        beforeSend: function()
        {
          $("button[type=submit]").attr("disabled", true);
          $("button[type=submit]").css('opacity','0.5');
          $("#message").html("<p class='text-center'><img src='<?php echo get_template_directory_uri(); ?>/img/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
  </script>

<?php }; ?>
</div>

<?php get_footer(); ?>
