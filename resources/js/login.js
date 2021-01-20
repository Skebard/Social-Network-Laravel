const SLIDING_PERIOD_MS = 3000;
const sliderContainer = document.getElementById('slider-container-id');
const sliderImages = sliderContainer.children;
const NUM_IMAGES = sliderImages.length;
const showPassBtn = document.getElementById('show-password-btn');
const inputPass = document.getElementById('input-password-id');
let currentImage = 0;

//Set interval to change de image of the phone slider periodically
setInterval(showNextImage,SLIDING_PERIOD_MS);
showPassBtn.addEventListener('click',showHidePassword);


/**
 * Remove class active to an image and set it to the next in the HTMLCollection
 */
function showNextImage(){
    sliderImages[currentImage].classList.remove('active');
    currentImage = (currentImage+1)%NUM_IMAGES;
    sliderImages[currentImage].classList.add('active')
}


function showHidePassword(){
    if(inputPass.type==='password'){
        inputPass.type='text';
        showPassBtn.textContent = 'Hide';
    }else{
        inputPass.type='password';
        showPassBtn.textContent = 'Show';
    }


}