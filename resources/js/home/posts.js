const POSTS_LIMIT = 10;


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



/**
 * Handles the event for giving likes to a post and for saving posts
 * @param {*} e 
 */
function likeSaveEvent(e) {
    
    let element = e.target;
    let parentElement = element.parentElement;
    let anchor;
    if (element.tagName === 'path') {
        anchor = parentElement.parentElement;
    } else if (element.tagName === 'svg') {
        anchor = parentElement;
    }
    if (anchor) {
        e.preventDefault();
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
    }

}

/**
 * Makes a GET request to the anchor's link and upon success hides the given anchor and the sibling anchor with the given class
 * @param {HTMLElement} anchor anchor element that has the link to make an action
 * @param {string} classToShow name of the class that belongs to the sibling anchor to be shown when the action
 *                              is successfully performed (status = 1)
 */
function anchorGetAndToggle(anchor, classToShow)
{
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


let offset = 0;
/**
 * Fetches new posts and appends them at the end of the container.
 */
function loadPosts()
{
    fetch('/posts?offset='+offset+'&limit='+POSTS_LIMIT)
    .then(resp=>resp.json())
    .then(data=>{
        if(data.status===1){
            document.querySelector('.posts-container .posts').innerHTML += data.data;
        }
    });
    offset+=POSTS_LIMIT;
}

/**
 * Shows the hidden comments and hides the comments counter
 * @param {*} e event
 */
function viewAllComments(e){
    if(e.target.classList.contains('post__comments--show-all')){
        let hiddenComments = e.target.parentElement.querySelectorAll('.post__comments--list li.hide');
        hiddenComments.forEach(comment=>{
            comment.classList.remove('hide');
        })
        e.target.classList.add('hide');
    }
}


const postOptionsModal = document.querySelector('.modal-post-options');
function viewPostOptions(e){
    let options = e.target.closest('.post-options');
    if(options){
        postOptionsModal.classList.remove('hide');
        console.log(options.dataset.owner);
        console.log(options.dataset.post_id);

        let postId = options.dataset.post_id;
        if(options.dataset.owner){
            
            html = `
        <li>
            <a class='options-modal__alert' href="/posts/${postId}/delete">Delete Post</a>
        </li>
        <li>
            <a class='edit-post-option' data-post_id="${postId}" >Edit Post</a>
        </li>
        <li>
            <a href="/posts/${postId}/archive">Archive Post</a>
        </li>
        <li>
            <a href="">Cancel</a>
        </li>`;
        }else{
            html = ` <li>
            <a class='options-modal__alert' href="#">Report</a>
        </li>
        <li>
            <a class='options-modal__alert' href="#">Unfollow</a>
        </li>
        <li>
            <a href="">Cancel</a>
        </li>`;
        }
        postOptionsModal.querySelector('.options-modal').innerHTML = html;
    }
}


exports.postSlider = postSlider;
exports.likeSaveEvent = likeSaveEvent;
exports.loadPosts = loadPosts;
exports.viewAllComments= viewAllComments;
exports.viewPostOptions = viewPostOptions;
