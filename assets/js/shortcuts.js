/** @see https://gist.github.com/Kzumueller/54c43a87113f32877df3a50514f7ce5a */

// this is some vile monkey patching, think of it what you will, I find it useful

if('undefined' === typeof window.qs) {
    window.qs = document.querySelector.bind(document);
}

if('undefined' === typeof window.qsa) {
    window.qsa = document.querySelectorAll.bind(document);
}

if('undefined' === typeof Element.prototype.qs) {
    Element.prototype.qs = Element.prototype.querySelector;
}

if('undefined' === typeof Element.prototype.qsa) {
    Element.prototype.qsa = Element.prototype.querySelectorAll;
}

if('undefined' === typeof Element.prototype.on) {
    Element.prototype.on = Element.prototype.addEventListener;
}

if('undefined' === typeof document.on) {
    document.on = document.addEventListener;
}
