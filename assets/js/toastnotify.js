/*!
 * Toastnotify.js  http://pixmawebdesign.com/library/toastnotify/
 * Version - 1.1.0
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 * Copyright (c) 2019 Leonardo Manuel Alvarez
 */
!function(e,a){try{"object"==typeof module&&module.exports?module.exports=a():e.Toastnotify=a()}catch(e){console.log("La compatibilidad isomórfica no es compatible en este momento.")}}(this,function(e){"complete"===document.readyState?t():window.addEventListener("DOMContentLoaded",t),Toastnotify={create:function(){console.error(["DOM no ha terminado de cargar.","\tInvocar el método de creación cuando DOMs readyState está completo"].join("\n"))}};var a=0;function t(){var e=document.createElement("div");e.id="toastnotify-container",document.body.appendChild(e),Toastnotify.create=function(e){var t=document.createElement("div");t.id=++a,t.id="toast-"+t.id,e.animationIn?t.className="toastnotify animated "+e.animationIn:t.className="toastnotify animated fadeInLeft";var n=document.createElement("div");if(n.className="vh",t.appendChild(n),e.image){var i=document.createElement("span");i.className="b4cimg",n.appendChild(i);var o=document.createElement("img");if(o.src=e.image,o.className="bAimg",i.appendChild(o),e.important){var c=document.createElement("i");c.className="important",i.appendChild(c)}}if(e.icon){var d=document.createElement("span");d.className="b4cicon",n.appendChild(d);var s=document.createElement("i");if(s.className=e.icon,d.appendChild(s),e.important){var m=document.createElement("i");m.className="important",d.appendChild(m)}}var l=document.createElement("span");l.className="bAq",e.text?l.innerHTML=e.text:l.innerHTML="¡Hola!",n.appendChild(l);var r=document.createElement("span");if(r.className="bAo",n.appendChild(r),"function"==typeof e.callbackOk){var p=document.createElement("span");e.buttonOk?p.innerHTML=e.buttonOk:p.innerHTML="OK",p.className="a8k",r.appendChild(p),p.addEventListener("click",function(a){a.stopPropagation(),e.callbackOk.call(L())})}if("function"==typeof e.callbackCancel){var u=document.createElement("span");e.buttonCancel?u.innerHTML=e.buttonCancel:u.innerHTML="No, gracias",u.className="a8k",r.appendChild(u),u.addEventListener("click",function(a){a.stopPropagation(),e.callbackCancel.call(L())})}var f=document.createElement("div");f.className="bBe",n.appendChild(f);var v=document.createElement("div");function L(){e.animationIn?t.classList.remove(e.animationIn):t.classList.remove("fadeInLeft"),e.animationOut?t.classList.add(e.animationOut):t.classList.add("fadeOutLeft"),window.setTimeout(function(){t.remove()}.bind(this),1e3)}return v.className="bBf",f.appendChild(v),f.addEventListener("click",function(e){e.stopPropagation(),L()}),t.hide=function(){e.animationIn?t.classList.remove(e.animationIn):t.classList.remove("fadeInLeft"),e.animationOut?t.classList.add(e.animationOut):t.classList.add("fadeOutLeft"),window.setTimeout(function(){t.remove()},2e3)},e.duration&&window.setTimeout(t.hide,e.duration),e.rounded&&(t.className+=" rounded"),e.type?t.className+=" toastnotify-"+e.type:t.className+=" toastnotify-default",e.classes&&(t.className+=" "+e.classes),document.getElementById("toastnotify-container").appendChild(t),t}}return Toastnotify});