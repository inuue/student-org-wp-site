<?php
/*
Theme Name: Data Science Management
Template Name: projekty
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
         <h2>Dodatkowe informacje:</h2>
       <div class="col-sm-6">
       <ul>
         <li>Praktyczne projekty biznesowe</li>
         <li>Analiza żywych danych</li>
         <li>Zgłębianie wiedzy z obszaru data science</li>
         <li>Kontakt z biznesem</li>
         <li>Wsparcie merytoryczne specjalistów z branży</li>
       </ul>
       </div>
       <div class="col-sm-6">
         <p>Dłuższy oopis dlaczego zapisywać się na projekty</p>
         <p>Jesteśmy organizacją studencką ze Szkoły Głównej Handlowej mającą na celu stworzenie hubu zrzeszającego liderów nowej ekonomii opartej na Big Data. Łączymy ludzi z wielu środowisk i z uczelni o różnych profilach. Ważny dla nas jest rozwój na arenie międzynarodowej. Działamy wykorzystując project management oraz podejmujemy decyzje oparte na analizie danych.</p>
       </div>
     </div>
     <h2>Formularz zapisów:</h2>
     <div class="col-sm-6 col-sm-offset-3 formularz">
       <form method="post" action="<?php echo get_template_directory_uri(); ?>/sendProject.php" data-parsley-validate>
         <label for="name">Imię:</label>
         <label for="surname">Nazwisko:</label>
         <input type="text" name="name" data-parsley-required data-parsley-errors-container="#name-error">
         <input type="text" name="surname" data-parsley-required data-parsley-errors-container="#name-error">
         <div id="name-error"></div>

         <label for="email">E-mail:</label>
         <input type="text" name="email" data-parsley-required data-parsley-type="email">

         <label for="phone">Nr telefonu:</label>
         <input type="number" name="phone" data-parsley-required data-parsley-type="number">

         <label for="recommend">Twoja rola w projekcie:</label>
         <select name="recommend" data-parsley-required>
           <option value="wybierz" disabled="true" selected="true">wybierz</option>
           <option value="Kontakt z klientem">Kontakt z klientem</option>
           <option value="Zarządzanie projektem">Zarządzanie projektem</option>
           <option value="Analiza danych">Analiza danych</option>
           <option value="Eksploracja baz danych">Eksploracja baz danych</option>
           <option value="Automatyzacja procesów">Automatyzacja procesów</option>
           <option value="Tworzenie algorytmów">Tworzenie algorytmów</option>
           <option value="Od opiekuna koła"></option>
         </select>

         <label for="student">Czy posiadasz doświadczenie w wybranym obszarze?</label></br>
         <label for="tak" style="font-weight: 400;">Tak<input type="radio" name="student" value="tak" data-parsley-required data-parsley-errors-container="#student"></label>
         <label for="nie" style="margin-left: 25px; font-weight: 400;">Nie<input type="radio" name="student" value="nie" data-parsley-required data-parsley-errors-container="#student"></label>
         <div id="student"></div>

         <label for="areaDesc">Opisz krótko czym się zajmujesz</label>
         <textarea rows="20"></textarea>

         <label for="student">Czy jesteś studentem?</label></br>
         <label for="tak" style="font-weight: 400;">Tak<input type="radio" name="student" value="tak" data-parsley-required data-parsley-errors-container="#student"></label>
         <label for="nie" style="margin-left: 25px; font-weight: 400;">Nie<input type="radio" name="student" value="nie" data-parsley-required data-parsley-errors-container="#student"></label>
         <div id="student"></div>

         <label for="kierunek">Uczelnia:</label>
         <input type="text" name="kierunek" data-parsley-required>

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


         </br>


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
