// Séléctionner les champs du formulaire
const emailInputlogin = document.getElementById("email");
const passwordInput = document.getElementById("password");
const btnSubmitlogin = document.getElementById("btnSubmitlogin");

// Désactiver le bouton de soumission par defaut
btnSubmitlogin.disabled = true;

//Permet d'afficher ou masquer les message d'erreur
function showError(input, message)
{
    const baliseP = input.nextElementSibling;
    if (message) {
        baliseP.textContent = message;
        input.classList.add("is-invalid");
    }
    else
    {
        baliseP.textContent = "";
        input.classList.remove("is-invalid");
    }
}

// Validation de l'email à la saisie
emailInputlogin.addEventListener("input", () => {
    const email = emailInputlogin.value.trim();
    const emailValidator = Validator.emailValidator("L'email", email);

    if (emailValidator) {
        showError(emailInputlogin, emailValidator.message);
        checkFormValidaty();
    }
    else
    {
        showError(emailInputlogin, "");
        checkFormValidaty();
    }
});

// Validation du password à la saisie
passwordInput.addEventListener("input", () => {
    const password = passwordInput.value.trim();
    const passwordValidator = Validator.passwordValidator("Le mot de passe", password, 8);
    if (passwordValidator) {
        showError(passwordInput, passwordValidator.message);
        checkFormValidaty();
    }
    else
    {
        showError(passwordInput, "");
        checkFormValidaty();
    }
});

//Active le bouton de connexion si les deux champs sont valides
function checkFormValidaty()
{
    const email = emailInputlogin.value.trim();
    const password = passwordInput.value.trim();

    const emailValidator = Validator.emailValidator("L'email", email);
    const passwordValidator = Validator.passwordValidator("Le mot de passe", password, 8);

    if (!emailValidator && !passwordValidator) {
        btnSubmitlogin.disabled = false;
    }
    else
    {
        btnSubmitlogin.disabled = true;
    }
}
