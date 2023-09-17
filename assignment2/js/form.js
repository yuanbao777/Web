document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s--signup');
  });

  document.addEventListener("DOMContentLoaded", function() {
    var action = new URLSearchParams(window.location.search).get('action');
    var container = document.querySelector('.cont');

    if (action === 'signup') {
        container.classList.add('s--signup');
    } else {
        container.classList.remove('s--signup');
    }
});

document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("signup-form");

    form.addEventListener("submit", function(event) {
        clearErrors();

        let email = form.elements["email"].value;
        let name = form.elements["name"].value;
        let password = form.elements["password"].value;
        let confirmPassword = form.elements["pass2"].value;

        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        let isValid = true;

        if (!name || !email || !password) {
            setError(form.elements["name"], "Please enter your name.");
            isValid = false;
        }

        if (!emailRegex.test(email)) {
            setError(form.elements["email"], "Please enter a valid email address.");
            isValid = false;
        }

        

        if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password)) {
            setError(form.elements["password"], "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.");
            isValid = false;
        }
        if (confirmPassword !== password || confirmPassword == "") {
            setError(form.elements["pass2"], "Passwords do not match!");
            isValid = false;
        }
        if (!isValid) {
            event.preventDefault();
        }
    });

    function setError(field, message) {
        let errorDiv = document.createElement("div");
        errorDiv.className = "dynamic-error"; 
        errorDiv.textContent = message;
        field.parentNode.insertBefore(errorDiv, field.nextSibling);
        field.style.border = "1px solid red";
    }

    function clearErrors() {
        let dynamicallyInsertedErrors = form.querySelectorAll(".dynamic-error");
        dynamicallyInsertedErrors.forEach(errorDiv => {
            errorDiv.parentNode.removeChild(errorDiv);
        });
        
        let fields = [form.elements["name"], form.elements["email"], form.elements["password"], form.elements["pass2"]];
        fields.forEach(field => {
            field.style.border = "1px solid black";
        });
    }
});

