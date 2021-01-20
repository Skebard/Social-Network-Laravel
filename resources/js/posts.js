//** MODULES */
// const stories = require('./home/stories');
const posts = require('./home/posts');
// const createPost = require('./home/createPost');
const modal = require('./home/modal');
// const editPost = require('./home/editPost');
const postComments = require('./home/postComments');
const editPost = require('./home/editPost');

//* HTMLElements */

const body = document.querySelector('body');
body.addEventListener('click',posts.postSlider);
body.addEventListener('click',posts.likeSaveEvent);
body.addEventListener('click',posts.viewAllComments);
body.addEventListener('click',posts.viewPostOptions);
body.addEventListener('click',postComments.postComment);
body.addEventListener('keydown',postComments.recommendUserTag);
body.addEventListener('click',postComments.insertTagUser);
body.addEventListener('click',editPost.showEditForm);

modal.addEvents();
