//** MODULES */
const stories = require('./home/stories');
const posts = require('./home/posts');
const createPost = require('./home/createPost');
const modal = require('./home/modal');
const editPost = require('./home/editPost');




const body = document.querySelector('body');

stories.slideStoriesEvents();
createPost.addEvents();
body.addEventListener('click', posts.postSlider);
body.addEventListener('click',posts.likeSaveEvent);
body.addEventListener('click',posts.viewAllComments);
body.addEventListener('click',posts.viewPostOptions);
body.addEventListener('click',editPost.showEditForm);
modal.addEvents();

posts.loadPosts();


//Lazy load posts
let active = true;
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#posts-list-id").height())
    {
        if(active){
            //timer to avoid calling the loadPosts function too many times.
            setTimeout(()=>{
                active = true;
            },500)
        active =false;
        posts.loadPosts();
        }
    }
});

