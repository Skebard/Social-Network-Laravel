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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/config.js":
/*!********************************!*\
  !*** ./resources/js/config.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = {
  BASE_URL: '' //set the root of the project

};

/***/ }),

/***/ "./resources/js/editProfile.js":
/*!*************************************!*\
  !*** ./resources/js/editProfile.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var privacyCheckbox = document.getElementById('privacy-checkbox-id');
var URL_UPDATE_ACCOUNT_PRIVACY = '/accounts/privacy/update';
var tokenValue = document.querySelector('.account-privacy-form input[name=_token]').value;
var ALLOWED_TYPES = ['jpeg', 'gif', 'png'];
var profileImgDisplay = document.getElementById('profile-image-display-id');
var changeImgInput = document.getElementById('change-image-input-id');
var changeImgInputImage = document.getElementById('change-image-input-image-id');

var _require = __webpack_require__(/*! ./config */ "./resources/js/config.js"),
    BASE_URL = _require.BASE_URL;

privacyCheckbox.addEventListener('change', updateAccountPrivacy);
changeImgInput.addEventListener('change', handleProfilePhoto);
changeImgInputImage.addEventListener('change', handleProfilePhoto);

function updateAccountPrivacy(e) {
  var formData = new FormData();
  var privateVal = privacyCheckbox.checked ? 1 : 0;
  formData.append('private', privateVal);
  formData.append('_method', 'PUT'); // x-www-form-urlencoded

  fetch(BASE_URL + URL_UPDATE_ACCOUNT_PRIVACY, {
    method: 'POST',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': tokenValue
    }
  }).then(function (resp) {
    return resp.json();
  }).then(function (data) {
    if (data.status === 0) {
      privacyCheckbox.checked = !privacyCheckbox.checked;
      toastr.warning('Something went wrong. Please try again');
    }
  });
}

function handleProfilePhoto(e) {
  var input = e.target;

  if (input.files && input.files[0]) {
    updateProfilePhoto(input.files[0]);
    showPhoto(input.files[0]);
  }
}

function showPhoto(file) {
  var reader = new FileReader();

  reader.onload = function (e) {
    profileImgDisplay.src = e.target.result;
  };

  reader.readAsDataURL(file);
}

function updateProfilePhoto(file) {
  var formData = new FormData();
  formData.append('_method', 'PUT');
  formData.append('profile_photo', file);
  fetch(BASE_URL + '/accounts/photo/update', {
    method: 'POST',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': tokenValue
    }
  });
}

/***/ }),

/***/ 6:
/*!*******************************************!*\
  !*** multi ./resources/js/editProfile.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/skebard/MyProjects/SocialNetworkLaravel/resources/js/editProfile.js */"./resources/js/editProfile.js");


/***/ })

/******/ });