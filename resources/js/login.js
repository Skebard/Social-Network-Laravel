const SLIDING_PERIOD_MS = 3000;
const sliderContainer = document.getElementById('slider-container-id');
const sliderImages = sliderContainer.children;
const NUM_IMAGES = sliderImages.length;
let currentImage = 0;

setInterval(showNextImage,SLIDING_PERIOD_MS);

function showNextImage(){
    sliderImages[currentImage].classList.remove('active');
    currentImage = (currentImage+1)%NUM_IMAGES;
    sliderImages[currentImage].classList.add('active')
}