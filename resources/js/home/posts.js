function postSlider(e) {
    //Check which arrow has been pressed: right(next) or left(prev)

    //check if arrow has been pressed
    let parent = e.target.parentElement;
    if (parent.classList.contains('post__slider--arrow')) {
        let postHtml = e.target.parentElement.parentElement.parentElement;
        let prevBtn = postHtml.querySelector('.left-arrow.post__slider--arrow');
        let nextBtn = postHtml.querySelector('.right-arrow.post__slider--arrow');
        let imagesSlider = postHtml.querySelector('.post__slider--images');
        let sliderIndicator = postHtml.querySelector(".post__actions .images-indicator");
        if (parent.classList.contains('right-arrow')) {
            nextImage(imagesSlider, nextBtn, prevBtn, sliderIndicator);
        } else if (parent.classList.contains('left-arrow')) {
            previousImage(imagesSlider, nextBtn, prevBtn, sliderIndicator);
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
    if (imagesSlider.scrollLeft - imagesSlider.offsetWidth <= 0) {
        prevBtn.classList.add('hide');
    }
}

function nextImage(imagesSlider, nextBtn, prevBtn, sliderIndicator) {
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



function likeDislikeEvent(e) {
    e.preventDefault();
    let element = e.target;
    let parentElement = element.parentElement;
    let anchor;
    if (element.tagName === 'path') {
        anchor = parentElement.parentElement;
    } else if (element.tagName === 'svg') {
        anchor = parentElement;
    }
    if (anchor) {
        let anchorParent = anchor.parentElement;
        let classes = anchor.classList;

        if (classes.contains('like')) {

            anchorGetAndToggle(anchor, 'dislike')
                .then(
                    status => {
                        if(status){
                            let likes = anchor.parentElement.parentElement.parentElement.querySelector('.post__likes--number');
                            likes.textContent = parseInt(likes.textContent)+1;
                        }
                    }
            );
            console.log('like');
         
        } else if (classes.contains('dislike')) {
            anchorGetAndToggle(anchor,'like')
            .then(
                status => {
                    if(status){
                        let likes = anchor.parentElement.parentElement.parentElement.querySelector('.post__likes--number');
                        likes.textContent = parseInt(likes.textContent)-1;
                    }
                }
        );

        } else if (classes.contains('save')) {
            console.log('save');
            anchorGetAndToggle(anchor,'unsave');

        } else if (classes.contains('unsave')) {
            console.log('unsave');
            anchorGetAndToggle(anchor,'save');

        }
        if (parentElement.parentElement.classList.contains('') === 'A') {
            console.log('found');
            e.preventDefault();

        }
    }

    console.log(e.target);
    console.log(e.target.tagName);
}

function anchorGetAndToggle(anchor, classToShow) {

    console.log(anchor);
    return fetch(anchor.href)
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            if (data.status == 1) {
                anchor.classList.add('hide');
                anchor.parentElement.querySelector('.' + classToShow).classList.remove('hide');
                return true;
            }
            return false;
        });
}


exports.postSlider = postSlider;
exports.likeDislikeEvent = likeDislikeEvent;
