document.addEventListener("DOMContentLoaded",(function(){document.querySelector("body").addEventListener("click",(function(e){if("js-load-map"!==e.target.id)return!1;e.preventDefault(),fetch("/").then((function(e){return e.json()})).then((function(e){})).catch((function(e){return console.error(e)}))})),document.querySelector("body").addEventListener("click",(function(e){if("js-save-map"!==e.target.id)return!1;e.preventDefault(),fetch("/").then((function(e){return e.json()})).then((function(e){})).catch((function(e){return console.error(e)}))})),document.querySelector("body").addEventListener("click",(function(e){if("js-load-preview"!==e.target.id)return!1;e.preventDefault(),fetch("/").then((function(e){return e.json()})).then((function(e){})).catch((function(e){return console.error(e)}))})),document.querySelector("body").addEventListener("click",(function(e){if("js-load-file"!==e.target.id)return!1;e.preventDefault(),fetch("/").then((function(e){return e.json()})).then((function(e){})).catch((function(e){return console.error(e)}))}))}));
//# sourceMappingURL=main.js.map