var UBT=function(t){function e(r){if(n[r])return n[r].exports;var o=n[r]={exports:{},id:r,loaded:!1};return t[r].call(o.exports,o,o.exports,e),o.loaded=!0,o.exports}var n={};return e.m=t,e.c=n,e.p="",e(0)}([function(t,e,n){t.exports=n(1),n(16),n(14),n(15),n(11),n(10),n(13),n(12);var r=n(2);null!=window.UBT_DEBUG_CONFIG?(n(3).startSendingLoop(window.UBT_DEBUG_CONFIG),n(8).sendPv()):n(17).loadConfig(function(t,e){null!=t?n(3).startSendingLoop(r.crayfish):n(3).startSendingLoop(e),n(8).sendPv()})},function(t,e,n){var r=n(9),o=n(4).createSsid,i=n(4).createCookie,a=n(3).trackEvent,u=function(t,e){this.type=t||"UNKNOWN",this.params=e||{}};u.prototype.bindData=function(){var t=function(){};t.prototype=this.params;for(var e=new t,n=0;n<arguments.length;n++){var r=arguments[n];for(var o in r)e[o]=r[o]}return new u(this.type,e)},u.prototype.bindType=function(t){return new u(t,this.params)},u.prototype.bind=function(){var t=Array.prototype.slice.call(arguments),e="string"==typeof t[0]?t.shift():this.type,n=this.bindData.apply(this,t).params;return new u(e,n)},u.prototype.send=function(){var t=this.bind.apply(this,arguments),e=t.params,n=e.type=t.type;"PV"===n&&(s.params.pvhash=r());for(var o in e){var i=e[o];"function"==typeof i?e[o]=i():e[o]=e[o]}null!=window.UBT_DEBUG?window.UBT_DEBUG(e):"debug"===document.cookie.match(/(?:; |^)UBT=([^;]*)|$/)[1]?console.log(e):a(e)};var c=new function(){var t=/(?:[\w-]+\.)?[\w-]+$|$/i.exec(document.domain||"")[0];if(t)this.ssid=document.cookie.match(/(?:^|; )ubt_ssid=(.*?)(?:; |$)|$/)[1];else try{this.ssid=localStorage.getItem("ubt_ssid")}catch(e){setTimeout(function(){throw e})}if(!this.ssid)if(this.ssid=o(),t)document.cookie=i(this.ssid,t);else try{localStorage.setItem("ubt_ssid",this.ssid)}catch(e){setTimeout(function(){throw e})}this.timestamp=function(){return(new Date).getTime().toString(36)}},s=new u("DEFAULT",c);t.exports=s},function(t,e){t.exports={trackerUrl:"https://web-ubt.ele.me/collect/log",dehydratedKey:"ubt-dehydrated-events",sortIdKey:"ubt-checking-sort-id",configUrl:"https://crayfish.elemecdn.com/ubt.js@json/config",version:"1.3.7",crayfish:{concurrency:3,interval:1e3,queueSize:100,timeout:3e3}}},function(t,e,n){var r,o=n(2),i=n(4).packEvents,a=n(20),u=new a(o.dehydratedKey),c=0,s=o.crayfish,d=function(t,e){if(null!=window.UBT_DEBUG_BATCH)return c+=1,window.UBT_DEBUG_BATCH(t),void setTimeout(function(){c-=1,e(null)},Math.random()*s.timeout);var n=new XMLHttpRequest;n.open("POST",o.trackerUrl),n.withCredentials=!0,n.setRequestHeader("Content-Type","application/json"),n.timeout=s.timeout;var r=!1,i=function(){r||(r=!0,c-=1,e(n))};n.onreadystatechange=function(){4===n.readyState&&i()},n.ontimeout=function(){i()},n.onerror=function(){i()},c+=1,n.send(JSON.stringify(t))},f=function(){var t=u.get();if(!(c>=s.concurrency)&&0!==t.length){if(t.length<s.queueSize)return void(null==r&&(r=setTimeout(function(){var t=u.get();t.length>0&&(d(i(t),function(t){f()}),u.set([])),r=void 0},s.interval)));null!=r&&(clearTimeout(r),r=void 0),d(i(t),function(t){f()}),u.set([])}},l=function(){var t=u.get();t.length>0&&(d(i(t),function(){}),u.set([]))};e.startSendingLoop=function(t){s=t,l()},e.trackEvent=function(t){u.append(t),f()}},function(t,e,n){var r=n(9),o=n(2);e.createSsid=function(){var t=new Date((new Date).getTime()+288e5),e=r()+"_"+[t.getUTCFullYear(),t.getUTCMonth()+1,t.getUTCDate()].join("-").replace(/\b\d\b/g,"0$&");return e},e.createCookie=function(t,e){return"ubt_ssid="+t+"; Expires=Wed, 31 Dec 2098 16:00:00 GMT; Domain="+e+"; Path=/"},e.packEvents=function(t){return{data:t,version:o.version}},e.assign=function(t,e){for(var n in e)t[n]=e[n];return t}},function(t,e){t.exports=function(t,e,n){var r=function(t){t=t||event;var e={target:t.target||t.srcElement};e.target.correspondingUseElement&&(e.target=e.target.correspondingUseElement),n.call(e.target,e)};t.addEventListener?t.addEventListener(e,r,!0):t.attachEvent&&t.attachEvent("on"+e,r)}},function(t,e,n){var r=n(19),o=n(18),i=n(4);t.exports=function(t){var e={value:r(t),message:o(t)},n=t.attributes,a={};if(n["ubt-data"])try{var u=JSON.parse(n["ubt-data"].value);u instanceof Object&&(u instanceof Array?console.warn("[UBT] ubt-data should be object, got array:",u):a=u)}catch(c){setTimeout(function(){throw c},0)}var s,d;for(d=0;d<n.length;d++)s=n[d],/^ubt-data-(\w+)/.test(s.name)&&(e[RegExp.$1]=s.value);return i.assign(a,e)}},function(t,e){t.exports=function(t,e){for(var n=t;n&&1===n.nodeType&&e(n)!==!1;n=n.parentNode);}},function(t,e,n){var r=document.documentElement,o=n(1);e.sendPv=function(){o.send("PV",{resolution:Math.max(r.clientWidth,window.innerWidth||0)+"x"+Math.max(r.clientHeight,window.innerHeight||0),location:location.href,referrer:document.referrer})}},function(t,e){t.exports=function(){for(var t="",e=0;e<4;e++)t+="0000000".concat(Math.floor(2821109907456*Math.random()).toString(36)).slice(-8);return t}},function(t,e,n){var r=n(1),o=n(5),i=n(7),a=n(6),u="ubt-change",c=u+"-installed",s=function(t,e){o(t,"change",function(t){r.send("EVENT",{id:t.target.getAttribute(u),params:a(t.target)})})},d=["input","textarea","select"],f=function(t){t[c]||(t[c]=!0,s(t,t.getAttribute(u)))},l=function(t){var e=t.target;if(!new RegExp(d.join("|"),"i").test(e.tagName)){var n="LABEL"===e.tagName&&e;if(n||i(e,function(t){if(n="LABEL"===t.tagName&&t)return!1}),n){var r=n.getAttribute("for");e=r?document.getElementById(r):n.querySelector(d)}}e&&1===e.nodeType&&e.hasAttribute(u)&&f(e)};o(document,"mousedown",l),o(document,"keydown",l)},function(t,e,n){var r=n(1),o=n(5),i=n(7),a=n(6),u="ubt-click",c=function(t){r.send("EVENT",{id:t.getAttribute(u),params:a(t)})};o(document,"click",function(t){var e=t.target;"LABEL"===e.tagName&&e.querySelector("input,textarea")||i(e,function(t){t.hasAttribute(u)&&c(t)})})},function(t,e,n){var r=n(1),o=n(5),i=200,a=null,u=function(){null!==a&&clearTimeout(a),a=setTimeout(function(){d(),a=null},i)},c=window.history&&"pushState"in window.history,s=document.referrer,d=function(){var t=document.documentElement,e=Math.max(t.clientWidth,window.innerWidth||0),n=Math.max(t.clientHeight,window.innerHeight||0);r.send("PV",{resolution:e+"x"+n,location:location.href,referrer:s}),s=location.href};if(c){var f=history.pushState;history.pushState=function(t){return u(),f.apply(history,arguments)}}o(window,"popstate",function(t){u()}),o(window,"hashchange",function(t){u()})},function(t,e,n){var r=n(1),o=n(6),i="ubt-visit",a="ubt-visit-key",u={},c=function(t,e){r.send("EVENT",{id:t,params:o(e)})},s=function(t){var e=t.getAttribute(i),n=t.getAttribute(a)||"",r=e+"/"+n;u[r]||(c(e,t),u[r]=!0),t.removeAttribute(i)},d=function(t){var e=t.getBoundingClientRect(),n=window.innerHeight||document.documentElement.clientHeight,r=n-e.top>0&&e.bottom>0;return t.offsetWidth+t.offsetHeight&&r},f=function(){for(var t=document.querySelectorAll("["+i+"]"),e=0;e<t.length;e++){var n=t[e];d(n)&&s(n)}setTimeout(f,400)};f()},function(t,e,n){var r=n(1),o={},i=10,a=function(t){!t||o[t]||i<=0||(r.send("JSERROR",{message:t}),o[t]=!0,i--)};window.addEventListener?addEventListener("error",function(t){a(t.error&&t.error.stack)}):window.attachEvent&&window.attachEvent("onerror",function(t,e,n){a([t,"url: "+e,"line: "+n].join("\r\n"))})},function(t,e,n){var r=n(1),o=n(2),i=1e6;r.params.sort_id=function(){var t=0;try{var e=localStorage.getItem(o.sortIdKey)||"0";t=parseInt(e,10),t<=i?t+=1:t=0,localStorage.setItem(o.sortIdKey,t.toString())}catch(n){}return t}},function(t,e,n){var r=n(1),o=n(5),i=function(){setTimeout(function(){for(var t=performance.timing,e=["fetchStart","connectEnd","connectStart","domComplete","domContentLoadedEventEnd","domContentLoadedEventStart","domInteractive","domLoading","domainLookupEnd","domainLookupStart","loadEventEnd","loadEventStart","requestStart","responseEnd","responseStart"],n={},o=0;o<e.length;o++)n[e[o]]=t[e[o]]-t.navigationStart;r.send("TIMING",n)})};window.performance&&window.performance.timing&&o(window,"load",i)},function(t,e,n){var r=n(2),o=function(t){setTimeout(function(){throw new Error(t)})};e.loadConfig=function(t){var e=new XMLHttpRequest;e.open("GET",r.configUrl),e.onreadystatechange=function(n){if(4===e.readyState)if(200===e.status)try{t(null,JSON.parse(e.responseText))}catch(r){t({req:e,msg:"Failed to parse",error:r},null),o("Failed to parse JSON: "+e.responseText)}else t({req:e,msg:"Failed to load"},null)},e.send()}},function(t,e,n){var r=n(7);t.exports=function(t){var e;"INPUT"===t.tagName&&(e=t.id&&document.querySelector('[for="'+t.id+'"]'),e||r(t,function(t){if("LABEL"===t.tagName||t.hasAttribute("ubt-label"))return e=t,!1}),e&&(t=e));var n;return/TEXTAREA|SELECT/.test(t.tagName)||(n=String(t.textContent||t.innerText||"").replace(/^\s+|\s+$/g,"")),n||t.title||t.alt||t.name||t.getAttribute("placeholder")}},function(t,e){var n=function(t){var e;switch(t.tagName){case"A":return t.getAttribute("href");case"INPUT":if(/checkbox|radio/.test(t.type))return t.checked;case"TEXTAREA":return t.value;case"SELECT":for(var r=t.getElementsByTagName("option"),o=0;o<r.length;o++)if(r[o].selected)return r[o].hasAttribute("value")?r[o].getAttribute("value"):r[o].innerHTML;return null;default:if("LABEL"===t.tagName||t.hasAttribute("ubt-label")){var i=t.getAttribute("for");return e=i?document.getElementById(i):t.querySelector("input,textarea"),e?n(e):null}}};t.exports=n},function(t,e){function n(t){this.key=t||"default-ubt-storage-key"}var r=!1;try{localStorage.setItem("ubt-storage-detect","[]"),localStorage.removeItem("ubt-storage-detect"),r=!0}catch(o){}var i={};n.prototype.get=function(){var t;if(r){var e=localStorage.getItem(this.key);try{t=JSON.parse(e)}catch(n){}}else t=i[this.key];return t instanceof Array?t:[]},n.prototype.set=function(t){r?localStorage.setItem(this.key,JSON.stringify(t)):i[this.key]=t},n.prototype.append=function(t){var e=this.get();e.push(t),this.set(e)},t.exports=n}]);