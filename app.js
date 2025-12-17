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