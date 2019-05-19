<?php
/*
Theme Name: Data Science Management
Template Name: Rekrutacja
Author: Rafał Sypień
Author URI:
Motyw wykonany na potrzeby koła naukowego Data Science Management.
*/


get_header();
 ?>
 <div class="main">





 <!-- Formularz rekrutacyjny -->
<div class="container-fluid rekrutacja_bg">
   <div class="container rekrutacja" id="contact">
     <div class="container nopadding informacje">
         <h2>Dla studenta:</h2>
       <div class="col-sm-6 col-sm-offset-3">
       <ul>
         <li>Zrozumienie istoty jaka tkwi w podejmowaniu decyzji opartych na analizie danych</li>
         <li>Nauka zarządzania obszarem data science w oparciu o narzędzia i platformy project managementowe</li>
         <li>Poznanie ciekawych, kreatywnych osób</li>
         <li>Współpraca z firmami</li>
         <li>Współpraca z organizacjami z innych uczelni i krajów</li>
         <li>Zagraniczni prelegenci</li>
         <li>Możliwość poprowadzenia swojego własnego projektu</li>
         <li>Szkolenia z zakresu data science</li>
         <li>Uczestniczenie w innowacyjnych ponaduczelnianych projektach</li>
       </ul>
       </div>
     </div>
     <h2>Formularz zgłoszeniowy:</h2>
     <div class="col-sm-6 col-sm-offset-3 formularz">
       <form method="post" action="<?php echo get_template_directory_uri(); ?>/sendCf.php" data-parsley-validate>
         <label for="name">Imię:</label>
         <label for="surname">Nazwisko:</label>
         <input type="text" name="name" data-parsley-required data-parsley-errors-container="#name-error">
         <input type="text" name="surname" data-parsley-required data-parsley-errors-container="#name-error">
         <div id="name-error"></div>

         <label for="email">E-mail:</label>
         <input type="text" name="email" data-parsley-required data-parsley-type="email">

         <label for="phone">Nr telefonu:</label>
         <input type="number" name="phone" data-parsley-required data-parsley-type="number">

         <label for="recommend">Skąd się o nas dowiedziałeś:</label>
         <select name="recommend" data-parsley-required>
           <option value="wybierz" disabled="true" selected="true">wybierz</option>
           <option value="Facebook">Facebook</option>
           <option value="Instagram">Instagram</option>
           <option value="Targi kół i organizacji">Targi kół i organizacji</option>
           <option value="Od znajomego">Od znajomego</option>
           <option value="Prezentacja na wykładzie">Prezentacja na wykładzie</option>
           <option value="Konferencja">Konferencja</option>
           <option value="Od opiekuna koła">Od opiekuna koła</option>
         </select>

         <label for="student">Czy jesteś studentem/studentką SGH?</label></br>
         <label for="tak" style="font-weight: 400;">Tak<input type="radio" name="student" value="tak" data-parsley-required data-parsley-errors-container="#student"></label>
         <label for="nie" style="margin-left: 25px; font-weight: 400;">Nie<input type="radio" name="student" value="nie" data-parsley-required data-parsley-errors-container="#student"></label>
         <div id="student"></div>
         </br>

         <label for="kierunek">Kierunek studiów:</label>
         <input type="text" name="kierunek" data-parsley-required>

         <label for="rok">Wybierz rok studiów:</label>
         <select name="rok" data-parsley-required>
           <option value="wybierz" disabled="true" selected="true">wybierz</option>
           <option value="1">1 rok</option>
           <option value="2">2 rok</option>
           <option value="3">3 rok</option>
           <option value="4">4 rok</option>
           <option value="5">5 rok</option>
         </select>

         <label for="why">Dlaczego wybrałeś/wybrałaś SKN Data Science Management? </label>
         <textarea col="20" name="why" data-parsley-required></textarea>

         <label for="msg">Dodatkowe informacje o Tobie:</label>
         <textarea col="20" name="msg"></textarea>
         <input type="checkbox" name="zgoda" value="zgoda" data-parsley-mincheck="1" required data-parsley-errors-container="#check-error"><label class="zgoda">Wyrażam zgodę na przetwarzanie danych osobowych.</label>
         <div id="check-error"></div>


         <button type="submitRekrutacja" name="submitRekrutacja" value="submitRekrutacja" class="button">Wyślij</button>
       </form>
     </div>
   </div>
</div>
   <!-- newsletter -->
 <?php get_template_part('newsletter'); ?>

   </div>

 <?php get_footer(); ?>
