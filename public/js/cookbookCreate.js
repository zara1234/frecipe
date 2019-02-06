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

/***/ "./resources/js/Classes/Search.js":
/*!****************************************!*\
  !*** ./resources/js/Classes/Search.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// import TimelineMax from "../gsap_minified/TweenMax.min"
var Search =
/*#__PURE__*/
function () {
  function Search(input, item_cnt, items) {
    _classCallCheck(this, Search);

    this.input = input;
    this.searched = [];
    this.item_cnt = item_cnt;
    this.items = items;
  }

  _createClass(Search, [{
    key: "search",
    value: function search(e) {
      var _this = this;

      if (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode == 8) {
        this.input = e.target.value.toLowerCase();

        if (e.target.value == "") {
          this.appendItems(this.item_cnt, this.items);
        } // this.animateChange(this.item_cnt)


        this.searched = this.items.filter(function (letter) {
          return letter.dataset.reference.toLowerCase().indexOf(_this.input) !== -1;
        });
        this.item_cnt.innerHTML = "";
        this.appendItems(this.item_cnt, this.searched);
      }
    }
  }, {
    key: "appendItems",
    value: function appendItems(cnt, elements) {
      elements.forEach(function (element) {
        cnt.appendChild(element);
      });
    }
  }, {
    key: "animateChange",
    value: function animateChange(item_cnt) {
      var gsap = new TimelineMax();
      gsap.fromTo(item_cnt, .6, {
        opacity: 0,
        y: 10
      }, {
        delay: .1,
        opacity: 1,
        y: 0
      });
    }
  }]);

  return Search;
}();

/* harmony default export */ __webpack_exports__["default"] = (Search);

/***/ }),

/***/ "./resources/js/cookbookCreate.js":
/*!****************************************!*\
  !*** ./resources/js/cookbookCreate.js ***!
  \****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Classes_Search_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Classes/Search.js */ "./resources/js/Classes/Search.js");

var input = document.querySelector("input#search");
var item_cnt = document.querySelector(".search-results .cnt--inner");
var items = Array.from(document.querySelectorAll(".search-results .cnt--inner .card"));
var searchLetter = new _Classes_Search_js__WEBPACK_IMPORTED_MODULE_0__["default"](input, item_cnt, items);
input.addEventListener("keyup", function (e) {
  searchLetter.search(e);
});
var ingredients = {};
items.forEach(function (e) {
  e.addEventListener("click", function (ev) {
    var clone = ev.target.cloneNode(true);
    var current = ev.target;
    current.style.display = "none";
    clone.className = "ingredient card";
    clone.style.display = "unset";
    clone.setAttribute("data-unit", current.dataset.unit);
    var unit = document.createElement("input");
    unit.setAttribute("type", "number");
    unit.setAttribute("class", "unit-input");
    unit.setAttribute("name", "unit-" + clone.dataset.reference);
    unit.setAttribute("placeholder", clone.dataset.unit);
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "id-" + clone.dataset.reference);
    input.setAttribute("value", clone.dataset.id);
    var close = document.createElement("div");
    close.classList.add("close");
    clone.append(close);
    clone.append(unit); // clone.append(input)

    ingredients[clone.dataset.id] = "";
    document.querySelector(".search-selected").append(clone);
    clone.addEventListener("click", function (ev) {
      console.log(ev.target);
    });
    clone.querySelector(".close").addEventListener("click", function (ev) {
      ev.target.parentElement.style.display = "block";
      ev.target.parentElement.remove();
      current.style.display = "block";
    });
  });
});
document.querySelector("#cookbookCreateForm").addEventListener("submit", function (e) {
  var units = document.querySelectorAll("input.unit-input");
  units.forEach(function (item) {
    ingredients[item.parentElement.dataset.id] = item.value;
    document.querySelector("input[name='ingredients']").value = JSON.stringify(ingredients);
  });
});

/***/ }),

/***/ 2:
/*!**********************************************!*\
  !*** multi ./resources/js/cookbookCreate.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/sarahmuhleder/Desktop/frecip2/resources/js/cookbookCreate.js */"./resources/js/cookbookCreate.js");


/***/ })

/******/ });