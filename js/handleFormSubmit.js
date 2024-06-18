function handleFormSubmit(formElement, errorElement, processScript) {
    formElement.addEventListener('submit', (e) => {
        e.preventDefault();
    
        const formData = new FormData(formElement);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', processScript);
    
        xhr.onload = () => {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = 'homepage.php'
                } else {
                    errorElement.innerHTML = response.errors.join('<br>');
                }
            } else {
                errorElement.innerHTML = 'An error occurred. Please try again.';
            }
        };
    
        xhr.onerror = () => {
            errorElement.innerHTML = 'Network Error. Please check your connection.';
        };
    
    
        xhr.send(formData);
    });
}

const loginForm = document.getElementById('login-form'); 
const errorMsgLogin = document.getElementById('error-message-login');
const loginProcessScript =  '../php/login_process.php';
handleFormSubmit(loginForm, errorMsgLogin, loginProcessScript);

const registerForm = document.getElementById('register-form'); 
const errorMsgRegister = document.getElementById('error-message-register');
const registerProcessScript = '../php/register_process.php';
handleFormSubmit(registerForm, errorMsgRegister, registerProcessScript);