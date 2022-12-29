document.addEventListener('DOMContentLoaded', function (e) {
    const showAuthBtn = document.getElementById('alecadd-show-auth-form'),
        authContainer = document.getElementById('alecadd-auth-container'),
        close = document.getElementById('alecadd-auth-close');
    
    showAuthBtn.addEventListener('click', () => {
        authContainer.classList.add('show');        
        showAuthBtn.parentElement.classList.add('hide');
    });

    close.addEventListener('click', () => {
        authContainer.classList.remove('show');
        showAuthBtn.parentElement.classList.remove('hide');
    });
});