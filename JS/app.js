const loginForm = document.getElementById("loginForm");
if(loginForm){
    const emailLogin = document.getElementById("email");
    const passwordLogin = document.getElementById("password");
    const emailErrorLogin = document.getElementById("emailError");
    const passwordErrorLogin = document.getElementById("passwordError");
    const formSuccessLogin = document.getElementById("formSuccess");

    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    const passwordRe = /^.{6,}$/;

    loginForm.addEventListener("submit", function(e){
        e.preventDefault();
        emailErrorLogin.textContent = "";
        passwordErrorLogin.textContent = "";
        formSuccessLogin.textContent = "";

        let valid = true;
        if(!emailRe.test(emailLogin.value.trim())){
            emailErrorLogin.textContent = "Email i pavlefshëm!";
            valid = false;
        }
        if(!passwordRe.test(passwordLogin.value)){
            passwordErrorLogin.textContent = "Password duhet të ketë të paktën 6 karaktere!";
            valid = false;
        }
        if(valid){
            formSuccessLogin.textContent = "Login i suksesshëm (demo)";
            loginForm.reset();
        }
    });
}

const registerForm = document.getElementById("registerForm");
if(registerForm){
    const emri = document.getElementById("emri");
    const mbiemri = document.getElementById("mbiemri");
    const emailReg = document.getElementById("email");
    const passwordReg = document.getElementById("password");
    const date = document.getElementById("date");
    const emriError = document.getElementById("emriError");
    const mbiemriError = document.getElementById("mbiemriError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const dateError = document.getElementById("dateError");
    const gjiniaError = document.getElementById("gjiniaError");
    const formSuccess = document.getElementById("formSuccess");

    const nameRe = /^[A-Za-zÇçËë\s]{4,}$/;
    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{4,}$/;
    const passwordRe = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    registerForm.addEventListener("submit", function(e){
        e.preventDefault();
        emriError.textContent = "";
        mbiemriError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";
        dateError.textContent = "";
        gjiniaError.textContent = "";
        formSuccess.textContent = "";

        let valid = true;
        if(!nameRe.test(emri.value.trim())){
            emriError.textContent = "Emri i pavlefshëm (min 2 shkronja)";
            valid = false;
        }
        if(!nameRe.test(mbiemri.value.trim())){
            mbiemriError.textContent = "Mbiemri i pavlefshëm (min 2 shkronja)";
            valid = false;
        }
        if(!emailRe.test(emailReg.value.trim())){
            emailError.textContent = "Email i pavlefshëm";
            valid = false;
        }
        if(!passwordRe.test(passwordReg.value)){
            passwordError.textContent = "Password: min 8 karaktere, 1 shkronjë e madhe dhe 1 numër";
            valid = false;
        }
        if(!date.value){
            dateError.textContent = "Zgjidh datëlindjen";
            valid = false;
        }
        const genderChecked = document.querySelector('input[name="gjinia"]:checked');
        if(!genderChecked){
            gjiniaError.textContent = "Zgjidh gjininë";
            valid = false;
        }

        if(valid){
            formSuccess.textContent = "Regjistrimi u krye me sukses! (Demo front-end)";
            registerForm.reset();
        }
    });
}



