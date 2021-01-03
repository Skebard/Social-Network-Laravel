//** MODULES */
const stories = require('./home/stories');
const posts = require('./home/posts');

const body = document.querySelector('body');

stories.slideStoriesEvents();
body.addEventListener('click',posts.postSlider);
