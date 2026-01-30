<?php
    require_once 'header.php';
?>

    <section class="kontakt-section">
        <h2>Na Kontaktoni</h2>
        <p>Na shkruani dhe do t'ju përgjigjemi sa më shpejt</p>
    <div class="kontakt-container">
        <form class="kontakt-form">
            <input type="text" id="name" placeholder="Emri dhe Mbiemri">
            <span id="nameError" class="error"></span>
            <input type="email" id="email" placeholder="Email">
            <span id="emailError" class="error"></span>
            <input type="text" id="subjekti" placeholder="Subjekti">
            <span id="subjektiError" class="error"></span>
            <textarea id="mesazhiError" placeholder="Mesazhi juaj..." rows="5"></textarea>
            <button type="submit">Dërgo Mesazhin</button>
            <p id="formS" class="sukses"></p>
        </form>

        <div class="kontakt-info">
            <h3>Informacionet tona</h3>
            <p><i class="fa-solid fa-envelope"></i> info@elektrahome.com</p>
            <p><i class="fa-solid fa-phonee"></i> +383 44 000 800</p>
            <p><i class="fa-solid fa-location-dot"></i>Str.Adem Jashari, Ferizaj, Kosovë</p>
        </div>
    </div>
 </section>

<?php
    require_once 'footer.php';
?>