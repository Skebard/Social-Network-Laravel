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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/components/relationships.js":
/*!**************************************************!*\
  !*** ./resources/js/components/relationships.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var utils = __webpack_require__(/*! ../utils */ "./resources/js/utils.js");

var body = document.querySelector('body');
var PROFILE_USER_ID = document.getElementById('profile-userId-id').value;

function handleFriendAction(e) {
  var friendBtn = e.target.closest('.friend-action');
  checkBlockUserBtn(e);

  if (friendBtn) {
    e.preventDefault();
    var container = e.target.parentElement;
    var classes = e.target.classList;
    var newHTMLlink;
    var notification; //send request
    //if request succeeds show new link

    var userId = PROFILE_USER_ID;
    utils.handleRequest(friendBtn.href, function (data) {
      if (data.status === 1) {
        if (classes.contains('add-friend')) {
          newHTMLlink = "<a class='remove-request friend-action edit-btn' href=\"/user/friend/remove/".concat(userId, "\" class='edit-btn'> Request sent</a>");
          notification = 'Friend request sent successfully';
        } else if (classes.contains('accept-request')) {
          newHTMLlink = "<a class='remove-friend friend-action edit-btn' href=\"/user/friend/remove/".concat(userId, "\" class='edit-btn'>Remove Friend</a>");
          notification = 'New friend added';
        } else if (classes.contains('decline-request')) {
          newHTMLlink = "<a class='add-friend-btn add-friend friend-action edit-btn' href=\"/user/friend/add/".concat(userId, "\" class='edit-btn'> Add Friend</a>");
          notification = 'Request declined';
        } else if (classes.contains('remove-friend')) {
          newHTMLlink = "<a class='add-friend-btn add-friend friend-action edit-btn' href=\"/user/friend/add/".concat(userId, "\" class='edit-btn'> Add Friend</a>");
          notification = 'Friend removed';
        } else if (classes.contains('unblock-user')) {
          e.target.closest('.icon-options').querySelector('.block-user-icon').classList.remove('hide');
          notification = 'User unblocked';
          newHTMLlink = "<a class='add-friend-btn add-friend friend-action edit-btn' href=\"/user/friend/add/".concat(userId, "\" class='edit-btn'> Add Friend</a>");
        } else if (classes.contains('remove-request')) {
          notification = 'Friend request removed';
          newHTMLlink = "<a class='add-friend-btn add-friend friend-action edit-btn' href=\"/user/friend/add/".concat(userId, "\" class='edit-btn'> Add Friend</a>");
        }

        e.target.insertAdjacentHTML('afterend', newHTMLlink);
        e.target.remove();
        toastr.success(notification);
      }
    });
  }
}

function checkBlockUserBtn(e) {
  var blockBtn = e.target.closest('.block-user-icon');

  if (blockBtn) {
    e.preventDefault();
    utils.handleRequest(blockBtn.href, function (data) {
      if (data.status === 1) {
        blockBtn.classList.add('hide');
        var oldLink = e.target.closest('.icon-options').querySelector('.friend-action');
        var newHTMLlink = "<a class='unblock-user friend-action edit-btn' href=\"/user/unblock/".concat(PROFILE_USER_ID, "\" class='edit-btn'>Unblock</a>");
        oldLink.insertAdjacentHTML('afterend', newHTMLlink);
        oldLink.remove();
        toastr.success('User blocked');
      } else {
        toastr.info('Error ocurred');
      }
    });
  }
}

exports.handleFriendAction = handleFriendAction;

/***/ }),

/***/ "./resources/js/friends.js":
/*!*********************************!*\
  !*** ./resources/js/friends.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var CURRENT_USER_ID = document.getElementById('current-userId-id').value;
var PROFILE_USER_ID = document.getElementById('profile-userId-id').value;
var body = document.querySelector('body');
var friendsModal = document.getElementById('friends-modal-id');
var friendsContainer = document.getElementById('friends-container-id');

var utils = __webpack_require__(/*! ./utils */ "./resources/js/utils.js");

var relationship = __webpack_require__(/*! ./components/relationships */ "./resources/js/components/relationships.js");

body.addEventListener("click", relationship.handleFriendAction);
body.addEventListener("click", showFriends);

function showFriends(e) {
  if (e.target.closest('#friends-btn-id')) {
    utils.handleRequest('/user/' + PROFILE_USER_ID + '/friends', populateFriends);
  }
}

function populateFriends(data) {
  var friends = data.profileFriends;
  var html = '';
  friends.forEach(function (friend) {
    html += "\n        <li>\n                        <a href=\"/user/".concat(friend.username, "\">\n                            <div class=\"profile-info\">\n                                <div class='round-profile-img'>\n                                    <div class='profile-image-container'>\n                                        <img src=\"").concat(friend.profile_photo_url, "\" alt=\"\">\n                                    </div>\n                                </div>\n                            </div>\n                            <span class='friends-modal__user-info'>\n                                <span class='search-username'>").concat(friend.username, "</span>\n                                <span class='search-name'>").concat(friend.name, "</span>\n                            </span>\n                        </a>\n                            ");
    var rel = data.loggedUserRelationships.filter(function (relationship) {
      if (friend.id == CURRENT_USER_ID) {
        return false;
      } else if (relationship.user_one_id === friend.id || relationship.user_two_id === friend.id) {
        return true;
      }

      return false;
    });

    if (rel[0]) {
      switch (rel[0].status) {
        case 0:
          if (rel[0].user_action_id === friend.id) {
            html += "<a href='/user/friend/accept/".concat(friend.id, "' class='edit-btn m-width'>Accept Request</a>");
          } else {
            html += "<a href='/user/friend/cancelRequest/".concat(friend.id, "' class='edit-btn m-width'>Request Sent</a>");
          }

          break;

        case 1:
          html += "<a href='/user/friend/remove/".concat(friend.id, "' class='edit-btn m-width'>Remove Friend</a>");
          break;

        case 2:
          html += "<a href='/user/friend/add/".concat(friend.id, "' class='edit-btn m-width'>Add Friend</a>");
          break;

        case 3:
          if (rel[0].user_action_id !== friend.id) {
            html += "<a href='/user/friend/unblock/".concat(friend.id, "' class='edit-btn m-width'>Unblock</a>");
          }

          break;
      }
    } else {
      // the friend it is the same user that is looking the profile
      html += " ";
    }

    html += "</li>";
  });
  friendsContainer.innerHTML = html;
  friendsModal.classList.remove('hide');
}

/***/ }),

/***/ "./resources/js/utils.js":
/*!*******************************!*\
  !*** ./resources/js/utils.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function defaultResult(data) {
  console.log('Result');
  console.log(data);
}

function defaultError(error) {
  console.log('Error');
  console.log(error);
}

function defaultFinal(data) {}

function handleRequest(url) {
  var result = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : defaultResult;
  var error = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : defaultError;

  var _final = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : defaultFinal;

  fetch(url).then(function (resp) {
    if (!resp.ok) {
      throw Error(resp.statusText);
    }

    return resp.json();
  }).then(result)["catch"](error)["finally"](_final);
}

exports.handleRequest = handleRequest;

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/friends.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/skebard/MyProjects/SocialNetworkLaravel/resources/js/friends.js */"./resources/js/friends.js");


/***/ })

/******/ });