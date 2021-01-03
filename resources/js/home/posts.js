function postSlider(e) {
    //Check which arrow has been pressed: right(next) or left(prev)

    //check if arrow has been pressed
    let parent = e.target.parentElement;
    if(parent.classList.contains('post__slider--arrow')){
        let postHtml = e.target.parentElement.parentElement.parentElement;
        let prevBtn = postHtml.querySelector('.left-arrow.post__slider--arrow');
        let nextBtn = postHtml.querySelector('.right-arrow.post__slider--arrow');
        let imagesSlider = postHtml.querySelector('.post__slider--images');
        let sliderIndicator = postHtml.querySelector(".post__actions .images-indicator");
        if(parent.classList.contains('right-arrow')){
            nextImage(imagesSlider,nextBtn,prevBtn,sliderIndicator);
        }else if(parent.classList.contains('left-arrow')){
            previousImage(imagesSlider,nextBtn,prevBtn,sliderIndicator);
        }
    }
}

/**
 * Displays the next image of the slider and hide/show the correspondent buttons
 * @param {HTMLElement} imagesSlider slider containing all the images
 * @param {HTMLElement} nextBtn 
 * @param {HTMLElement} prevBtn 
 * @param {HTMLElement} imagesIndicator points that indicate the visible image
 */
function previousImage(imagesSlider, nextBtn, prevBtn, sliderIndicator) {
    imagesSlider.scrollLeft -= imagesSlider.offsetWidth;
    let activeImageInd = sliderIndicator.querySelector('.active');
    activeImageInd.previousElementSibling.classList.add('active');
    activeImageInd.classList.remove('active');
    nextBtn.classList.remove('hide');
    if(imagesSlider.scrollLeft - imagesSlider.offsetWidth <=0){
        prevBtn.classList.add('hide');
    }
}

function nextImage(imagesSlider, nextBtn, prevBtn,sliderIndicator) {
    if (imagesSlider.scrollWidth - imagesSlider.scrollLeft > imagesSlider.offsetWidth) {
        imagesSlider.scrollLeft += imagesSlider.offsetWidth;
        let activeImageInd = sliderIndicator.querySelector('.active');
        console.log(activeImageInd.nextElementSibling)
        activeImageInd.nextElementSibling.classList.add('active');
        activeImageInd.classList.remove('active');
        console.log(imagesSlider.scrollLeft);
        if (imagesSlider.scrollWidth - imagesSlider.scrollLeft - imagesSlider.offsetWidth <= imagesSlider.offsetWidth) {
            nextBtn.classList.add('hide');
        }
        prevBtn.classList.remove('hide');
    }
}
exports.postSlider = postSlider;
