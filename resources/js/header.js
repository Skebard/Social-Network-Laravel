const search = require('./components/search');
const modal = require('./home/modal');
const createPost = require('./home/createPost');

createPost.addEvents();
search.manageSearch();
modal.addEvents();
