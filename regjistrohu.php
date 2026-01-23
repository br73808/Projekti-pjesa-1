<?php
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistrohu</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="regjistrohu-container">
        <form id="registerForm" novalidate>
            <h2>Regjistrohu</h2>

            <label for="emri">Emri</label>
            <input type="text" id="emri" class="input">
            <div id="emriError" class="error"></div>

            <label for="mbiemri">Mbiemri</label>
            <input type="text" id="mbiemri" class="input">
            <div id="mbiemriError" class="error"></div>

            <label for="email">Email</label>
            <input type="email" id="email" class="input">
            <div id="emailError" class="error"></div>

            <label for="password">Password</label>
            <input type="password" id="password" class="input">
            <div id="passwordError" class="error"></div>

            <label for="date">Datëlindja</label>
            <input type="date" id="date" class="input">
            <div id="dateError" class="error"></div>

            <label>Gjinia</label>
            <div class="gjiniaa">
                <label class="radio">
                    <input type="radio" name="gjinia" value="M"> Mashkull
                </label>
                <label class="radio">
                    <input type="radio" name="gjinia" value="F"> Femër
                </label>
            </div>
            <div id="gjiniaError" class="error"></div>

            <input type="submit" value="Regjistrohu" class="input">
            <div id="formSuccess" class="success"></div>
        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>