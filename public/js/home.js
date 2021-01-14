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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/home.js":
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

//** MODULES */
var stories = __webpack_require__(/*! ./home/stories */ "./resources/js/home/stories.js");

var posts = __webpack_require__(/*! ./home/posts */ "./resources/js/home/posts.js");

var modal = __webpack_require__(/*! ./home/modal */ "./resources/js/home/modal.js");

var editPost = __webpack_require__(/*! ./home/editPost */ "./resources/js/home/editPost.js");

var postComments = __webpack_require__(/*! ./home/postComments */ "./resources/js/home/postComments.js");

var body = document.querySelector('body');
stories.slideStoriesEvents();
body.addEventListener('click', posts.postSlider);
body.addEventListener('click', posts.likeSaveEvent);
body.addEventListener('click', posts.viewAllComments);
body.addEventListener('click', posts.viewPostOptions);
body.addEventListener('click', editPost.showEditForm);
body.addEventListener('click', postComments.postComment);
modal.addEvents();
posts.loadPosts(); //Lazy load posts

var active = true;
$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() > $("#posts-list-id").height()) {
    if (active) {
      //timer to avoid calling the loadPosts function too many times.
      setTimeout(function () {
        active = true;
      }, 500);
      active = false;
      posts.loadPosts();
    }
  }
});

/***/ }),

/***/ "./resources/js/home/editPost.js":
/*!***************************************!*\
  !*** ./resources/js/home/editPost.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var inputContainerContent = "\n    <button class=\" last multi-images-form__btn delete-image-btn multi-images-form__btn\"><i class=\"fas fa-trash-alt\"></i></button>\n    <button class=\"  add-image-btn multi-images-form__btn\"><i class=\"fas fa-plus\"></i></button>\n    <button class=\" active edit-image-btn  multi-images-form__btn\"><i class=\"far fa-edit\"></i></button>\n    <img class=\"image-display\" src=\"https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png\" alt=\"\">\n    <input  type=\"file\" name='image[]' class=\"multi-images-form__image-input\">";
var imagesContainer = document.getElementById("edit-images-container-id");
var POST_URL = '/api/posts/';
var descriptionInput = document.getElementById('edit-content-id');
var editPostForm = document.getElementById('edit-post-form-id');
var firstInput = document.getElementById('edit-input-1-id');
var editModal = document.getElementById('edit-modal-id');
var optionsModal = document.getElementById('post-options-modal-id');
var currentPostId;

function showEditForm(e) {
  if (e.target.tagName =  true && e.target.classList.contains('edit-post-option')) {
    optionsModal.classList.add('hide');
    console.log(imagesContainer.children);
    var numImages = imagesContainer.children.length;
    Array.from(imagesContainer.children).forEach(function (div, index) {
      if (index < numImages - 1) {
        console.log('INDEX', index);
        div.remove();
      }
    });
    var postId = e.target.dataset.post_id;
    console.log(e.target.dataset.post_id);
    editModal.classList.remove('hide');
    populateModal(postId);
  }
}

function populateModal(postId) {
  currentPostId = postId;
  imagesContainer.addEventListener('click', deleteImageInput);
  firstInput.addEventListener('change', handleImageInputs);
  fetch(POST_URL + postId).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    //get description
    descriptionInput.value = data.content; //get post images

    data.images = data.images.sort(function (a, b) {
      return b.position - a.position;
    });
    data.images.forEach(function (image) {
      var imageContainer = createImageInput(image.image);
      console.log(imageContainer);
      imagesContainer.insertAdjacentElement('afterbegin', imageContainer.container);
      imageContainer.input.addEventListener('change', handleImageInputs);
    });
  });
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
  var url = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : undefined;
  var inputContainer = document.createElement('div');
  inputContainer.classList.add('input-container');
  inputContainer.innerHTML = inputContainerContent;

  if (url) {
    inputContainer.querySelector('.image-display').src = url;
    inputContainer.querySelector('.delete-image-btn.last').classList.remove('last');
  } else {
    //remove last class from the previous input
    imagesContainer.querySelector('.delete-image-btn.last').classList.remove('last');
  }

  var inputImage = inputContainer.querySelector('.multi-images-form__image-input');
  return {
    container: inputContainer,
    input: inputImage
  };
}

editPostForm.addEventListener('submit', editPost);

function editPost(e) {
  e.preventDefault();
  var formData = getFormData();
  var postId = currentPostId;
  token = editPostForm.querySelector('input[name=_token]');
  fetch('posts/' + postId + '/update', {
    method: 'post',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': token.value
    }
  }).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    if (data.status == 1) {
      //editModal.classList.add('hide');
      location.reload();
    }
  });
}
/**
 * Gets the data from the form and returns the images in the displayed order
 * @return {Object} Ordered array of objects where each object represe
 */


function getFormData() {
  var formData = new FormData();
  var imagesData = [];
  Array.from(imagesContainer.children).forEach(function (image, pos) {
    var input = image.querySelector('input'); //the last input is always empty so it is not saved

    if (!image.querySelector('.last')) {
      //if there is no file (length 0)
      if (input.files.length > 0) {
        formData.append('imagesFiles[]', input.files[0]);
        imagesData.push({
          type: 'file'
        });
      } else {
        imagesData.push({
          type: 'src',
          image: image.querySelector('.image-display').src
        });
      }
    }
  });
  formData.append('images', JSON.stringify(imagesData));
  formData.append('content', descriptionInput.value);
  return formData;
}

exports.showEditForm = showEditForm;

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
  console.log(modal);

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

function postComment(e) {
  console.log('COMMENT');

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
      console.log(data);

      if (data.status === 1) {
        var comments = commentForm.parentElement.parentElement.querySelector('.post__comments');
        var newComment = document.createElement('li');
        newComment.innerHTML = " <a href=\"/user/'.".concat(currentUsername, "\" class='post__comments--username'>\n                    ").concat(currentUsername, "</a>\n                    ").concat(comment);
        comments.querySelector('.post__comments--list').append(newComment);
        var numComments = comments.querySelector('.num-comments').textContent;

        if (numComments) {
          comments.querySelector('.num-comments').textContent = parseInt(numComments) + 1;
        }
      } else {}
    });
  }
}

exports.postComment = postComment;

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
    console.log(activeImageInd.nextElementSibling);
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
      console.log('like');
    } else if (classes.contains('dislike')) {
      anchorGetAndToggle(anchor, 'like').then(function (status) {
        if (status) {
          var likes = anchor.parentElement.parentElement.parentElement.querySelector('.post__likes--number');
          likes.textContent = parseInt(likes.textContent) - 1;
        }
      });
    } else if (classes.contains('save')) {
      console.log('save');
      anchorGetAndToggle(anchor, 'unsave');
    } else if (classes.contains('unsave')) {
      console.log('unsave');
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
    console.log(data);

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
    console.log(options.dataset.owner);
    console.log(options.dataset.post_id);
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

/***/ "./resources/js/home/stories.js":
/*!**************************************!*\
  !*** ./resources/js/home/stories.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var SCROLL_STEP_PX = 200;
var leftArrow = document.getElementById('stories-left-arrow-id');
var rightArrow = document.getElementById('stories-right-arrow-id');
var storiesContent = document.getElementById('stories-content-id');

function slideStoriesEvents(e) {
  leftArrow.classList.add('hide'); //initially there is nothing to scroll to the left

  var totalHiddenPx = storiesContent.scrollWidth - storiesContent.offsetWidth; //if there is no hidden content hide the right arrow

  if (totalHiddenPx <= 0) {
    rightArrow.classList.add('hide');
  }

  rightArrow.addEventListener('click', scrollRight);
  leftArrow.addEventListener('click', scrollLeft);
  window.addEventListener('resize', checkArrows);
}

function checkArrows() {
  var totalHiddenPx = storiesContent.scrollWidth - storiesContent.offsetWidth;
  var rightHiddenPx = totalHiddenPx - storiesContent.scrollLeft;

  if (rightHiddenPx <= 0) {
    rightArrow.classList.add('hide');
  }

  var leftHiddenPx = storiesContent.scrollLeft;

  if (leftHiddenPx <= 0) {
    leftArrow.classList.add('hide');
  }
}
/**
 * Callback to display the right hidden stories
 */


function scrollRight() {
  var totalHiddenPx = storiesContent.scrollWidth - storiesContent.offsetWidth;
  var rightHiddenPx = totalHiddenPx - storiesContent.scrollLeft;

  if (rightHiddenPx >= SCROLL_STEP_PX) {
    storiesContent.scrollLeft += SCROLL_STEP_PX;
  } else if (rightHiddenPx > 0) {
    storiesContent.scrollLeft = totalHiddenPx;
    rightArrow.classList.add('hide');
  }

  leftArrow.classList.remove('hide');
}
/**
 * Callback to display the left hidden stories
 */


function scrollLeft() {
  var leftHiddenPx = storiesContent.scrollLeft;

  if (leftHiddenPx >= SCROLL_STEP_PX) {
    storiesContent.scrollLeft -= SCROLL_STEP_PX;

    if (leftHiddenPx === SCROLL_STEP_PX) {
      leftArrow.classList.add('hide');
    }
  } else if (leftHiddenPx > 0) {
    storiesContent.scrollLeft = 0;
    leftArrow.classList.add('hide');
  }

  rightArrow.classList.remove('hide');
}

exports.slideStoriesEvents = slideStoriesEvents;

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/js/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/skebard/MyProjects/SocialNetworkLaravel/resources/js/home.js */"./resources/js/home.js");


/***/ })

/******/ });