/** @see https://gist.github.com/Kzumueller/54c43a87113f32877df3a50514f7ce5a */

// this is some vile monkey patching, think of it what you will, I find it useful

window.qs = document.querySelector.bind(document);
window.qsa = document.querySelectorAll.bind(document);

Element.prototype.qs = Element.prototype.querySelector;
Element.prototype.qsa = Element.prototype.querySelectorAll;

Element.prototype.on = Element.prototype.addEventListener;
document.on = document.addEventListener;
