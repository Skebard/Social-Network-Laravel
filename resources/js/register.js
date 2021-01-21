const body = document.querySelector('body');


body.addEventListener('click',showHidePass);
function showHidePass(e)
{
    let passContainer =e.target.closest('.pass-container');
    if(passContainer){
        e.preventDefault();
        let inputPass = passContainer.querySelector('input');
        let btn = passContainer.querySelector('.input-container__show');
        if(inputPass.type==='password'){
            inputPass.type='text';
            btn.textContent = 'Hide';
        }else{
            inputPass.type = 'password';
            btn.textContent = 'Show';

        }
    }
}