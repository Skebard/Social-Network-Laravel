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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

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

/***/ "./resources/js/home/postComments.js":
/*!*******************************************!*\
  !*** ./resources/js/home/postComments.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var currentUsername = document.getElementById('current-username-id').value;
/** 
 * 
 * @param {Event} e 
 */

function postComment(e) {
  if (e.target.classList.contains('post-comment-btn')) {
    e.preventDefault();
    var commentForm = e.target.closest('.post-comment-form');
    var formData = new FormData();
    var postId = commentForm.querySelector('input[name=post_id]').value;
    var comment = commentForm.querySelector('input[name=comment]').value;
    formData.append('post_id', postId);
    formData.append('comment', comment);
    var token = commentForm.querySelector('input[name=_token]');
    fetch('/' + postId + '/comment', {
      method: 'post',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': token.value
      }
    }).then(function (resp) {
      return resp.json();
    }).then(function (data) {
      if (data.status === 1) {
        var comments = commentForm.parentElement.parentElement.querySelector('.post__comments');
        var newComment = document.createElement('li');
        var commentWords = comment.split(' ');
        commentWords = commentWords.map(function (word) {
          if (word.includes('@')) {
            var taggedUser = word.substr(1);
            return "<a class=\"username-tag\" href=\"/user/".concat(taggedUser, "\">").concat(word, "</a>");
          }

          return word;
        });
        comment = commentWords.join(' ');
        newComment.innerHTML = " <a href=\"/user/'.".concat(currentUsername, "\" class='post__comments--username'>\n                    ").concat(currentUsername, "</a>\n                    ").concat(comment);
        comments.querySelector('.post__comments--list').append(newComment);
        var numComments = comments.querySelector('.num-comments');

        if (numComments) {
          comments.querySelector('.num-comments').textContent = parseInt(numComments.textContent) + 1;
        }

        currentInput.value = '';
        toastr.success('Post commented');
      } else {}
    });
  }
}

var currentTagUser;
var taggingUser = false;
var regex = /^[ A-Za-z0-9()[\]+-/%]*$/;
var currentInput;
var displayedUsers;

function recommendUserTag(e) {
  if (e.target.tagName === 'INPUT' && e.target.name === 'comment') {
    currentInput = e.target;

    if (taggingUser) {
      if (e.key === '@') {
        currentTagUser = '';
        searchUser(currentTagUser);
      } else if (e.key === 'Enter' || e.key === ' ') {
        taggingUser = false;

        if (displayedUsers) {
          displayedUsers.remove();
          displayedUsers = undefined;
        }
      } else if (e.key.length === 1 && regex.test(e.key)) {
        currentTagUser += e.key; //search user

        searchUser(currentTagUser);
      } else if (e.key === 'Backspace') {
        if (currentTagUser.length === 0) {
          //we have deleted the @
          taggingUser = false;

          if (displayedUsers) {
            displayedUsers.remove();
            displayedUsers = undefined;
          }

          return false;
        }

        currentTagUser = currentTagUser.substr(0, currentTagUser.length - 1); //serach user 

        searchUser(currentTagUser);
      } else {
        taggingUser = false;
      }
    } else {
      if (e.key === '@') {
        currentTagUser = '';
        taggingUser = true;
      } else if (e.key === 'Backspace') {
        //check if we are back to a @adf...
        var currentText = currentInput.value; // we must exclude the deleted char by the backspace

        if (currentText.length > 0) {
          currentText = currentText.substr(0, currentText.length - 1);
        }

        var words = currentText.split(' ');
        var lastWord = words[words.length - 1];

        if (lastWord.includes('@')) {
          currentTagUser = lastWord.replace('@', '');
          searchUser(currentTagUser);
          taggingUser = true;
        }
      }
    }
  }
}

var SEARCH_USERS_URL = '/user/friends/search/';

function searchUser(text) {
  if (text.length === 0) {
    return false;
  }

  fetch(SEARCH_USERS_URL + text).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    showPossibleTagUsers(data.users);
  });
}

function showPossibleTagUsers(users) {
  var form = currentInput.closest('.post-comment-form');
  var existentContainer = form.querySelector('.container-tag-users');

  if (existentContainer) {
    existentContainer.remove();
  }

  if (users.length === 0) {
    return false;
  }

  var container = document.createElement('ul');
  container.classList.add('container-tag-users');
  container.classList.add('box');
  users.forEach(function (user) {
    container.innerHTML += "<div class=\"round-profile-img user-to-tag\" >\n                    <div class=\"profile-image-container\">\n                        <img src=\"/".concat(user.profile_photo_path, "\" alt=\"\">\n    \n                    </div>\n                    <a href=\"http://localhost:8000/user/Tija\" class=\"post__username\">\n                        ").concat(user.username, "\n                    </a>\n                </div>");
  });
  displayedUsers = container;
  form.append(container);
}

function insertTagUser(e) {
  var tagContainer = e.target.closest('.user-to-tag');

  if (tagContainer) {
    e.preventDefault();
    var username = tagContainer.querySelector('.post__username').innerText;
    var words = currentInput.value.split(' ');
    words[words.length - 1] = '@' + username;
    currentInput.value = words.join(' ');
    displayedUsers.remove();
    displayedUsers = undefined;
    currentInput.focus();
  }
}

exports.postComment = postComment;
exports.recommendUserTag = recommendUserTag;
exports.insertTagUser = insertTagUser;

/***/ }),

/***/ "./resources/js/home/posts.js":
/*!************************************!*\
  !*** ./resources/js/home/posts.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var POSTS_LIMIT = 10;

function postSlider(e) {
  //Check which arrow has been pressed: right(next) or left(prev)
  //check if arrow has been pressed
  var parent = e.target.parentElement;

  if (parent.classList.contains('post__slider--arrow')) {
    var postHtml = e.target.parentElement.parentElement.parentElement;
    var prevBtn = postHtml.querySelector('.left-arrow.post__slider--arrow');
    var nextBtn = postHtml.querySelector('.right-arrow.post__slider--arrow');
    var imagesSlider = postHtml.querySelector('.post__slider--images');
    var sliderIndicator = postHtml.querySelector(".post__actions .images-indicator");

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
  var activeImageInd = sliderIndicator.querySelector('.active');
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
    var activeImageInd = sliderIndicator.querySelector('.active');
    activeImageInd.nextElementSibling.classList.add('active');
    activeImageInd.classList.remove('active');

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
  var element = e.target;
  var parentElement = element.parentElement;
  var anchor;

  if (element.tagName === 'path') {
    anchor = parentElement.parentElement;
  } else if (element.tagName === 'svg') {
    anchor = parentElement;
  }

  if (anchor && !anchor.classList.contains('post-link')) {
    e.preventDefault();
    var classes = anchor.classList;

    if (classes.contains('like')) {
      anchorGetAndToggle(anchor, 'dislike').then(function (status) {
        if (status) {
          var likes = anchor.parentElement.parentElement.parentElement.querySelector('.post__likes--number');
          likes.textContent = parseInt(likes.textContent) + 1;
        }
      });
    } else if (classes.contains('dislike')) {
      anchorGetAndToggle(anchor, 'like').then(function (status) {
        if (status) {
          var likes = anchor.parentElement.parentElement.parentElement.querySelector('.post__likes--number');
          likes.textContent = parseInt(likes.textContent) - 1;
        }
      });
    } else if (classes.contains('save')) {
      anchorGetAndToggle(anchor, 'unsave');
    } else if (classes.contains('unsave')) {
      anchorGetAndToggle(anchor, 'save');
    }
  }
}
/**
 * Makes a GET request to the anchor's link and upon success hides the given anchor and the sibling anchor with the given class
 * @param {HTMLElement} anchor anchor element that has the link to make an action
 * @param {string} classToShow name of the class that belongs to the sibling anchor to be shown when the action
 *                              is successfully performed (status = 1)
 */


function anchorGetAndToggle(anchor, classToShow) {
  return fetch(anchor.href).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    if (data.status == 1) {
      anchor.classList.add('hide');
      anchor.parentElement.querySelector('.' + classToShow).classList.remove('hide');
      return true;
    }

    return false;
  });
}

var offset = 0;
/**
 * Fetches new posts and appends them at the end of the container.
 */

function loadPosts() {
  fetch('/posts?offset=' + offset + '&limit=' + POSTS_LIMIT).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    if (data.status === 1) {
      document.querySelector('.posts-container .posts').innerHTML += data.data;
    }
  });
  offset += POSTS_LIMIT;
}
/**
 * Shows the hidden comments and hides the comments counter
 * @param {*} e event
 */


function viewAllComments(e) {
  if (e.target.classList.contains('post__comments--show-all')) {
    var hiddenComments = e.target.parentElement.querySelectorAll('.post__comments--list li.hide');
    hiddenComments.forEach(function (comment) {
      comment.classList.remove('hide');
    });
    e.target.classList.add('hide');
  }
}

var postOptionsModal = document.querySelector('.modal-post-options');

function viewPostOptions(e) {
  var options = e.target.closest('.post-options');

  if (options) {
    postOptionsModal.classList.remove('hide');
    var postId = options.dataset.post_id;

    if (options.dataset.owner == 1) {
      html = "\n        <li>\n            <a class='options-modal__alert' href=\"/posts/".concat(postId, "/delete\">Delete Post</a>\n        </li>\n        <li>\n            <a class='edit-post-option' data-post_id=\"").concat(postId, "\" >Edit Post</a>\n        </li>\n        <li>\n            <a href=\"/posts/").concat(postId, "/archive\">Archive Post</a>\n        </li>\n        <li>\n            <a class=\"close-modal\">Cancel</a>\n        </li>");
    } else {
      html = " <li>\n            <a class='options-modal__alert' href=\"#\">Report</a>\n        </li>\n        <li>\n            <a class=\"close-modal\">Cancel</a>\n        </li>";
    }

    postOptionsModal.querySelector('.options-modal').innerHTML = html;
  }
}

exports.postSlider = postSlider;
exports.likeSaveEvent = likeSaveEvent;
exports.loadPosts = loadPosts;
exports.viewAllComments = viewAllComments;
exports.viewPostOptions = viewPostOptions;

/***/ }),

/***/ "./resources/js/posts.js":
/*!*******************************!*\
  !*** ./resources/js/posts.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

//** MODULES */
// const stories = require('./home/stories');
var posts = __webpack_require__(/*! ./home/posts */ "./resources/js/home/posts.js"); // const createPost = require('./home/createPost');


var modal = __webpack_require__(/*! ./home/modal */ "./resources/js/home/modal.js"); // const editPost = require('./home/editPost');


var postComments = __webpack_require__(/*! ./home/postComments */ "./resources/js/home/postComments.js"); //* HTMLElements */


var body = document.querySelector('body');
body.addEventListener('click', posts.postSlider);
body.addEventListener('click', posts.likeSaveEvent);
body.addEventListener('click', posts.viewAllComments);
body.addEventListener('click', posts.viewPostOptions);
body.addEventListener('click', postComments.postComment);
body.addEventListener('keydown', postComments.recommendUserTag);
body.addEventListener('click', postComments.insertTagUser);
modal.addEvents();

/***/ }),

/***/ 3:
/*!*************************************!*\
  !*** multi ./resources/js/posts.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/skebard/MyProjects/SocialNetworkLaravel/resources/js/posts.js */"./resources/js/posts.js");


/***/ })

/******/ });