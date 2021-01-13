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
  var debounceTimeout;
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
    if (data.status == 1) {
      console.log(data.users);
      var html = '';
      data.users.forEach(function (user) {
        var profilePhoto = user.profile_photo_path ? user.profile_photo_path : user.profile_photo_url; //console.log(profilePhoto);

        html += "<a href=\"/user/".concat(user.username, "\">\n                <div class=\"profile-info\">\n                    <div class='round-profile-img'>\n                        <div class='profile-image-container'>\n                            <img src=\"").concat(profilePhoto, "\" alt=\"\">\n                        </div>\n                    </div>\n                </div>\n                <span class='search-results__user-info'>\n                    <span class='search-username'>").concat(user.username, "</span>\n                    <span class='search-name'>").concat(user.name + user.last_name, "</span>\n                </span>\n            </a>");
      });
      resultsContainer.innerHTML = html;
    }
  });
  resultsContainer.classList.remove('hide');
  upArrow.classList.remove('hide');
}

function showResults(data) {}

exports.manageSearch = manageSearch;

/***/ }),

/***/ "./resources/js/header.js":
/*!********************************!*\
  !*** ./resources/js/header.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var search = __webpack_require__(/*! ./components/search */ "./resources/js/components/search.js");

search.manageSearch();

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