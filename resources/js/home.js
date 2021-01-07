//** MODULES */
const stories = require('./home/stories');
const posts = require('./home/posts');
const createPost = require('./home/createPost');
const modal = require('./home/modal');


const body = document.querySelector('body');

stories.slideStoriesEvents();
createPost.addEvents();
body.addEventListener('click', posts.postSlider);
body.addEventListener('click',posts.likeDislikeEvent);
modal.addEvents();

