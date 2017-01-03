/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("throw new Error(\"Module build failed: ReferenceError: Unknown plugin \\\"add-module-exports\\\" specified in \\\"base\\\" at 0, attempted to resolve relative to \\\"/home/html/own/laravel/resources/assets/js\\\"\\n    at /home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/file/options/option-manager.js:176:17\\n    at Array.map (native)\\n    at Function.normalisePlugins (/home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/file/options/option-manager.js:154:20)\\n    at OptionManager.mergeOptions (/home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/file/options/option-manager.js:229:36)\\n    at OptionManager.init (/home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/file/options/option-manager.js:374:12)\\n    at File.initOptions (/home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/file/index.js:216:65)\\n    at new File (/home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/file/index.js:139:24)\\n    at Pipeline.transform (/home/html/own/laravel/node_modules/.npminstall/babel-core/6.21.0/babel-core/lib/transformation/pipeline.js:46:16)\\n    at transpile (/home/html/own/laravel/node_modules/.npminstall/babel-loader/6.2.10/babel-loader/lib/index.js:38:20)\\n    at Object.module.exports (/home/html/own/laravel/node_modules/.npminstall/babel-loader/6.2.10/babel-loader/lib/index.js:133:12)\");//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOltdLCJtYXBwaW5ncyI6IiIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);