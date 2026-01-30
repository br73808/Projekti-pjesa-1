<?php
    require_once 'header.php';
?>

    <section class="kontakt-section">
        <h2>Na Kontaktoni</h2>
        <p>Na shkruani dhe do t'ju përgjigjemi sa më shpejt</p>
    <div class="kontakt-container">
       <form id="contactForm" class="kontakt-form">
            <input type="text" id="name" placeholder="Emri dhe Mbiemri">
            <span id="nameError" class="error"></span>
            <input type="email" id="email" placeholder="Email">
            <span id="emailError" class="error"></span>
            <input type="text" id="subject" placeholder="Subjekti" >
            <span id="subjectError" class="error"></span>
            <textarea id="message" placeholder="Mesazhi juaj..." rows="5"></textarea>
            <span id="messageError" class="error"></span>
            <button type="submit">Dërgo Mesazhin</button>
            <p id="formSuccess" class="success"></p>
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