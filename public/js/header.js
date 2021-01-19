/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/components/profileDropdown.js":
/*!****************************************************!*\
  !*** ./resources/js/components/profileDropdown.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var profileMenu = document.querySelector('.user-pages-links');
var upArrow = document.getElementById('up-arrow-profile-menu-id');

function openCloseProfileMenu(e) {
  if (e.target.closest('.profile-icon')) {
    profileMenu.classList.remove('hide');
    upArrow.classList.remove('hide');
  } else {
    profileMenu.classList.add('hide');
    upArrow.classList.add('hide');
  }
}

exports.openCloseProfileMenu = openCloseProfileMenu;

/***/ }),

/***/ "./resources/js/components/search.js":
/*!*******************************************!*\
  !*** ./resources/js/components/search.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var DEBOUNCE_TIME_MS = 1000;
var searchInput = document.getElementById('search-input-id');
var upArrow = document.getElementById('up-arrow-id');
var resultsContainer = document.getElementById('search-results-id');

function manageSearch() {
  resultsContainer.classList.add('hide');
  upArrow.classList.add('hide');
  document.querySelector('body').addEventListener('click', function (e) {
    if (!e.target.closest('.search')) {
      upArrow.classList.add('hide');
      resultsContainer.classList.add('hide');
    }
  });
  var debounceTimeout;
  searchInput.addEventListener('focus', function () {
    if (resultsContainer.children.length > 0) {
      resultsContainer.classList.remove('hide');
      upArrow.classList.remove('hide');
    }
  });
  searchInput.addEventListener('keydown', function (e) {
    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(function () {
      searchUsers(searchInput.value);
    }, 1000);

    if (e.key === 'Enter') {
      clearTimeout(debounceTimeout);
      searchUsers(searchInput.value);
    }
  });
}

function searchUsers(text) {
  console.log(text); //send text to server and print

  fetch('/user/search/' + text).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    if (data.status == 1 && data.users.length > 0) {
      console.log(data.users);
      var html = '';
      data.users.forEach(function (user) {
        var profilePhoto = user.profile_photo_path ? user.profile_photo_path : user.profile_photo_url; //console.log(profilePhoto);

        html += "<a href=\"/user/".concat(user.username, "\">\n                <div class=\"profile-info\">\n                    <div class='round-profile-img'>\n                        <div class='profile-image-container'>\n                            <img src=\"").concat(profilePhoto, "\" alt=\"\">\n                        </div>\n                    </div>\n                </div>\n                <span class='search-results__user-info'>\n                    <span class='search-username'>").concat(user.username, "</span>\n                    <span class='search-name'>").concat(user.name + user.last_name, "</span>\n                </span>\n            </a>");
      });
      resultsContainer.innerHTML = html;
      resultsContainer.classList.remove('hide');
      upArrow.classList.remove('hide');
    }
  })["catch"](function (e) {});
}

exports.manageSearch = manageSearch;

/***/ }),

/***/ "./resources/js/header.js":
/*!********************************!*\
  !*** ./resources/js/header.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var search = __webpack_require__(/*! ./components/search */ "./resources/js/components/search.js");

var modal = __webpack_require__(/*! ./home/modal */ "./resources/js/home/modal.js");

var createPost = __webpack_require__(/*! ./home/createPost */ "./resources/js/home/createPost.js");

var profileDropdown = __webpack_require__(/*! ./components/profileDropdown */ "./resources/js/components/profileDropdown.js");

var body = document.querySelector('body');
var dropDownBtn = document.getElementById("drop-down-btn-id");
var userActions = document.getElementById("user-actions-id");
var closeDropDownBtn = dropDownBtn.addEventListener('click', showHideDropDown);
body.addEventListener('click', profileDropdown.openCloseProfileMenu);
createPost.addEvents();
search.manageSearch();
modal.addEvents();

function showHideDropDown(e) {
  userActions.classList.toggle("drop-down");
}

/***/ }),

/***/ "./resources/js/home/createPost.js":
/*!*****************************************!*\
  !*** ./resources/js/home/createPost.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//Container will al input containers
var imagesContainer = document.getElementById("images-container-id"); //template to create new inputs

var inputContainerContent = "\n    <button class=\" last multi-images-form__btn delete-image-btn multi-images-form__btn\"><i class=\"fas fa-trash-alt\"></i></button>\n    <button class=\" active add-image-btn multi-images-form__btn\"><i class=\"fas fa-plus\"></i></button>\n    <button class=\" edit-image-btn  multi-images-form__btn\"><i class=\"far fa-edit\"></i></button>\n    <img class=\"image-display\" src=\"https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png\" alt=\"\">\n    <input  type=\"file\" name='image[]' class=\"multi-images-form__image-input\">"; //Initial image input

var firstInput = document.getElementById('input-1-id');

function addEvents() {
  firstInput.addEventListener('change', handleImageInputs);
  imagesContainer.addEventListener('click', deleteImageInput);
}
/**
 * 
 * @param {} e 
 */


function deleteImageInput(e) {
  console.log(e.target);

  if (e.target.classList.contains('fa-trash-alt')) {
    e.target.parentElement.parentElement.remove();
  }
}

function handleImageInputs(e) {
  var input = e.currentTarget; //Check if a file has been selected

  var inputContainer = input.parentElement;

  if (input.files && input.files[0]) {
    console.log('YES');
    var imgDisplay = inputContainer.querySelector('.image-display');
    var reader = new FileReader();

    reader.onload = function (e) {
      imgDisplay.src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);

    if (inputContainer === imagesContainer.lastElementChild) {
      //show edit icon
      inputContainer.querySelector('.add-image-btn').classList.remove('active');
      inputContainer.querySelector('.edit-image-btn').classList.add('active');
      var newInput = createImageInput();
      imagesContainer.append(newInput.container);
      newInput.input.addEventListener('change', handleImageInputs);
    }
  } else {
    //if the user does not select an image remove the input unless is the last one
    if (inputContainer !== imagesContainer.lastElementChild) {
      inputContainer.remove();
    }
  }
}
/**
 * Creates a new imageInput HTMLElement and returns it.
 * @return {Object} Object whose properties are the html container of the input and the input itself
 */


function createImageInput() {
  //remove last class from the previous input
  imagesContainer.querySelector('.delete-image-btn.last').classList.remove('last');
  var inputContainer = document.createElement('div');
  inputContainer.classList.add('input-container');
  inputContainer.innerHTML = inputContainerContent;
  var inputImage = inputContainer.querySelector('.multi-images-form__image-input');
  return {
    container: inputContainer,
    input: inputImage
  };
}

exports.addEvents = addEvents;

/***/ }),

/***/ "./resources/js/home/modal.js":
/*!************************************!*\
  !*** ./resources/js/home/modal.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var newPostModal = document.querySelector('.modal.create-post');
var newPostBtn = document.getElementById('new-post-btn-id');

function addEvents() {
  document.querySelector('html').addEventListener('click', handleModal);
  newPostBtn.addEventListener('click', openModal);
}

function openModal() {
  newPostModal.classList.remove('hide');
}

function handleModal(e) {
  var modal = e.target.closest('.modal');

  if (modal && (e.target.classList.contains('close-modal') || !e.target.closest('.modal-content'))) {
    modal.classList.add('hide');
  }
}

exports.addEvents = addEvents;

/***/ }),

/***/ 4:
/*!**************************************!*\
  !*** multi ./resources/js/header.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/skebard/MyProjects/SocialNetworkLaravel/resources/js/header.js */"./resources/js/header.js");


/***/ })

/******/ });