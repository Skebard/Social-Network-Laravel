const SCROLL_STEP_PX = 200;
const leftArrow = document.getElementById('stories-left-arrow-id');
const rightArrow = document.getElementById('stories-right-arrow-id');
const storiesContent = document.getElementById('stories-content-id');

function slideStoriesEvents(e) {
    leftArrow.classList.add('hide'); //initially there is nothing to scroll to the left
    let totalHiddenPx = storiesContent.scrollWidth - storiesContent.offsetWidth;
    //if there is no hidden content hide the right arrow
    if(totalHiddenPx<=0){
        rightArrow.classList.add('hide');
    }
    rightArrow.addEventListener('click', scrollRight);
    leftArrow.addEventListener('click',scrollLeft);

    window.addEventListener('resize', checkArrows);
}

function checkArrows(){
    let totalHiddenPx = storiesContent.scrollWidth - storiesContent.offsetWidth;
    let rightHiddenPx = totalHiddenPx - storiesContent.scrollLeft;
    if(rightHiddenPx<=0){
        rightArrow.classList.add('hide');
    }
    let leftHiddenPx = storiesContent.scrollLeft;
    if(leftHiddenPx<=0){
        leftArrow.classList.add('hide');
    }
}


/**
 * Callback to display the right hidden stories
 */
function scrollRight() {
    let totalHiddenPx = storiesContent.scrollWidth - storiesContent.offsetWidth;
    let rightHiddenPx = totalHiddenPx - storiesContent.scrollLeft;
    if(rightHiddenPx >= SCROLL_STEP_PX){
        storiesContent.scrollLeft += SCROLL_STEP_PX;
    }else if( rightHiddenPx > 0){
        storiesContent.scrollLeft = totalHiddenPx;
        rightArrow.classList.add('hide');
    }
    leftArrow.classList.remove('hide');

}


/**
 * Callback to display the left hidden stories
 */
function scrollLeft() {
    let leftHiddenPx = storiesContent.scrollLeft;
    if(leftHiddenPx >= SCROLL_STEP_PX){
        storiesContent.scrollLeft -= SCROLL_STEP_PX;
        if(leftHiddenPx===SCROLL_STEP_PX){
            leftArrow.classList.add('hide');
        }
    }else if( leftHiddenPx > 0){
        storiesContent.scrollLeft = 0;
        leftArrow.classList.add('hide');
    }
    rightArrow.classList.remove('hide');

}
exports.slideStoriesEvents = slideStoriesEvents;
