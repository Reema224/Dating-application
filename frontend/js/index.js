const LoginForm = document.querySelector("#login");
const SignupForm = document.querySelector("#signup");

LoginForm.style.display = "none";
document.querySelector("#linkLogin").addEventListener("click", e => {
    e.preventDefault();
    LoginForm.style.display = "flex";
    SignupForm.style.display = "none";
});
document.querySelector("#linkSignup").addEventListener("click", e => {
    e.preventDefault();
     SignupForm.style.display = "flex";
     LoginForm.style.display = "none";

});