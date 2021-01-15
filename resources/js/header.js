const search = require('./components/search');
const modal = require('./home/modal');
const createPost = require('./home/createPost');
const profileDropdown = require('./components/profileDropdown');
const body = document.querySelector('body');

body.addEventListener('click',profileDropdown.openCloseProfileMenu);
createPost.addEvents();
search.manageSearch();
modal.addEvents();
