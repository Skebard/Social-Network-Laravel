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

var stories = __webpack_require__(/*! ./home/stories */ "./resources/js/home/stories.js");

stories.slideStoriesEvents();

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