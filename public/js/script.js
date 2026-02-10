/* ========================================
   FUNÇÃO: TOGGLE DE VISIBILIDADE DA SENHA
   ======================================== */
function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + "-icon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}

/* ========================================
   VALIDAÇÃO DE SENHA EM TEMPO REAL
   ======================================== */
if (document.getElementById("registerForm")) {
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm_password");
    const passwordStrength = document.getElementById("passwordStrength");
    const passwordMatch = document.getElementById("passwordMatch");

    /* ========================================
     VALIDAÇÃO DE FORÇA DA SENHA
     ======================================== */
    passwordField.addEventListener("input", function () {
        const password = this.value;

        const hasMinLength = password.length >= 8;
        const hasNumber = /\d/.test(password);
        const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        let strength = 0;
        if (hasMinLength) strength++;
        if (hasNumber) strength++;
        if (hasSpecial) strength++;

        if (password.length === 0) {
            passwordStrength.textContent = "";
            passwordStrength.style.color = "";
        } else if (strength === 3) {
            passwordStrength.textContent = "✓ Senha forte";
            passwordStrength.style.color = "#4caf50";
        } else {
            let missing = [];
            if (!hasMinLength) missing.push("8 caracteres");
            if (!hasNumber) missing.push("número");
            if (!hasSpecial) missing.push("caractere especial");

            passwordStrength.textContent = "⚠ Falta: " + missing.join(", ");
            passwordStrength.style.color = "#ff9800";
        }

        // CORREÇÃO: Verifica correspondência quando senha principal muda
        if (confirmPasswordField.value.length > 0) {
            checkPasswordMatch();
        }
    });

    /* ========================================
     VALIDAÇÃO DE CORRESPONDÊNCIA DE SENHAS
     ======================================== */
    confirmPasswordField.addEventListener("input", checkPasswordMatch);

    function checkPasswordMatch() {
        const password = passwordField.value;
        const confirmPassword = confirmPasswordField.value;

        if (confirmPassword.length === 0) {
            passwordMatch.textContent = "";
            passwordMatch.style.color = "";
        } else if (password === confirmPassword) {
            passwordMatch.textContent = "✓ As senhas correspondem";
            passwordMatch.style.color = "#4caf50";
        } else {
            passwordMatch.textContent = "✗ As senhas não correspondem";
            passwordMatch.style.color = "#f44336";
        }
    }

    /* ========================================
     VALIDAÇÃO FINAL ANTES DO ENVIO
     ======================================== */
    document
        .getElementById("registerForm")
        .addEventListener("submit", function (event) {
            const password = passwordField.value;
            const confirmPassword = confirmPasswordField.value;

            const hasMinLength = password.length >= 8;
            const hasNumber = /\d/.test(password);
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            const passwordsMatch = password === confirmPassword;

            if (!hasMinLength || !hasNumber || !hasSpecial) {
                event.preventDefault();
                alert(
                    "A senha deve ter no mínimo 8 caracteres, incluindo um número e um caractere especial.",
                );
                return false;
            }

            if (!passwordsMatch) {
                event.preventDefault();
                alert("As senhas não correspondem. Por favor, verifique.");
                return false;
            }

            return true;
        });
}
