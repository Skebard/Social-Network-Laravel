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

var body = document.querySelector('body');
stories.slideStoriesEvents();
body.addEventListener('click', posts.postSlider);
var imagesContainer = document.getElementById("images-container-id");
var inputContainerContent = "\n    <button class=\" last multi-images-form__btn delete-image-btn multi-images-form__btn\"><i class=\"fas fa-trash-alt\"></i></button>\n    <button class=\" active add-image-btn multi-images-form__btn\"><i class=\"fas fa-plus\"></i></button>\n    <button class=\" edit-image-btn  multi-images-form__btn\"><i class=\"far fa-edit\"></i></button>\n    <img class=\"image-display\" src=\"https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png\" alt=\"\">\n    <input  type=\"file\" name='image[]' class=\"multi-images-form__image-input\">";
var firstInput = document.getElementById('input-1-id');
firstInput.addEventListener('change', handleImageInputs);
imagesContainer.addEventListener('click', deleteImageInput);
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
  console.log(e.target);
  var input = e.currentTarget;
  console.log(imagesContainer.lastElementChild); //Check if a file has been selected

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
    console.log('NO');

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

/***/ }),

/***/ "./resources/js/home/posts.js":
/*!************************************!*\
  !*** ./resources/js/home/posts.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

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

exports.postSlider = postSlider;

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