const search = require('./components/search');
const modal = require('./home/modal');
const createPost = require('./home/createPost');
const profileDropdown = require('./components/profileDropdown');
const body = document.querySelector('body');
const dropDownBtn = document.getElementById("drop-down-btn-id");
const userActions = document.getElementById("user-actions-id");
const closeDropDownBtn = 


dropDownBtn.addEventListener('click',showHideDropDown);
body.addEventListener('click',profileDropdown.openCloseProfileMenu);
createPost.addEvents();
search.manageSearch();
modal.addEvents();

function showHideDropDown(e)
{
    userActions.classList.toggle("drop-down");
}

