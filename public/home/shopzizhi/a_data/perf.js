!function(){"use strict";var e=function(e,t,n,r){var o,i=0;return"boolean"!=typeof t&&(r=n,n=t,t=void 0),function(){var a=this,s=Number(new Date)-i,u=arguments;function c(){i=Number(new Date),n.apply(a,u)}r&&!o&&c(),o&&clearTimeout(o),void 0===r&&s>e?c():!0!==t&&(o=setTimeout(r?function(){o=void 0}:c,void 0===r?e-s:e))}};var t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n=function(){return function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],r=!0,o=!1,i=void 0;try{for(var a,s=e[Symbol.iterator]();!(r=(a=s.next()).done)&&(n.push(a.value),!t||n.length!==t);r=!0);}catch(e){o=!0,i=e}finally{try{!r&&s.return&&s.return()}finally{if(o)throw i}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),r={id:function(e){return'You need to set a "project/id", like perf-'+e+'="project/id"'},data:"`perf-data` should be a JSON string."};function o(e){return Object.prototype.toString.call(e).slice(8,-1)}function i(e){return Math.round(1e3*e)/1e3}function a(e,t){for(var n in t)e[n]=t[n];return e}function s(){var e=window;return e.performance&&"function"==typeof e.performance.now?e.performance.now():Date.now()}function u(){function e(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1).toUpperCase()}return e()+e()+e()+e()+e()+e()+e()+e()}function c(e){var t=e.replace(/^(https?:)?\/\//,""),r=t.indexOf("/"),o=t.slice(0,r).replace(/:\d+$/,""),i=t.slice(r),a=void 0,s=void 0;if(i.indexOf("?")>=0){var u=i.split("?"),c=n(u,2);a=c[0],s=c[1]}else a=i,s="";return{host:o,urlPath:a,port:null!==o.match(/:\d+/)?o.match(/:(\d+)/)[1]:"80",search:s}}function p(e){return null!==e.match(/^https?:/)?e:""+location.protocol+e}function d(){var e=navigator.connection||navigator.mozConnection||navigator.webkitConnection;return e?e.type:"guessWifi"}var f,l,h,v={appName:"WEB://unknown-site",pageName:void 0,serviceWorker:!1,xhrSend:!1,dev:!1,etraceApiFilter:/(^\/[^/])|^(https?:)?\/\/([^/]+\.)?(ele(net)?\.me)/},m={trackerDomain:"perf.ele.me",sendingTypes:{global:!0,device:!0,load:!0,event:!0,asset:!0,http:!0,api:!1}},g=window,y=!1,w=[],E=[],T=(f=2e3,l=function(){var e="https://"+m.trackerDomain+"/log?time="+Date.now(),t=new XMLHttpRequest;t.open("POST",e),t.setRequestHeader("Content-Type","application/json;charset=UTF-8"),t.send(JSON.stringify(E)),E=[]},void 0===h?e(f,l,!1):e(f,h,!1!==l));function b(e){g.ElemePerfConfigs.xhrSend?(E.push(e),T()):(new Image).src="https://"+m.trackerDomain+"/_.gif?"+function e(n,r){var o=[];for(var i in n){var a=n[i];if(n.hasOwnProperty(i)&&null!==a&&void 0!==a){var s=r?r+"["+i+"]":i;o.push("object"===(void 0===a?"undefined":t(a))?e(a,s):encodeURIComponent(s)+"="+encodeURIComponent(a))}}return o.join("&")}(e)+"&time="+Date.now()}function q(e,t){if(function(e,t){switch(e){case"load":return t.load;case"error":return t.error;case"http-warning":return t.http;case"event":return t.event;case"network":return t.api;case"device":return t.device;case"network-batched":return t.asset;default:return console.warn("[PERF] Unknown event:",e),!1}}(e,g.ElemePerfConfigs.sendingTypes))return b({id:g.location.href,sdkVer:"2.0.0-beta.14",appName:g.ElemePerfConfigs.appName,pageName:g.ElemePerfConfigs.pageName,source:g.ElemePerfConfigs.serviceWorker?"web-sw":"web",ssid:g.ElemePerfConfigs.ssid,network:d(),type:e,d:t}),this}function C(e,t){y?q(e,t):w.push([e,t])}var _="track-count",L="track-timing";function S(e){var t=e.id,n=e.value,r=e.type,o=void 0===r?_:r,i=e.env,s=void 0===i?"prod":i,u=e.extra,c=void 0===u?{}:u;"count"===o&&(o=_),"timing"===o&&(o=L);var p={id:g.location.href,sdkVer:"2.0.0-beta.14",appName:g.ElemePerfConfigs.appName,pageName:g.ElemePerfConfigs.pageName,source:g.ElemePerfConfigs.serviceWorker?"web-sw":"web",ssid:g.ElemePerfConfigs.ssid,network:d(),type:o,env:s,data:{id:t,value:n}};a(p,c),b(p)}var k=window;function P(){k.addEventListener("load",function(){var e,t,n,r,o,i,a,s,u,c;C("device",(e=k.screen||{},t=e.orientation&&e.orientation.type||"unknown",n=e.height,r=void 0===n?-1:n,o=e.width,i=void 0===o?-1:o,a=e.colorDepth,s=void 0===a?-1:a,u=e.pixelDepth,c=void 0===u?-1:u,{userAgent:navigator.userAgent,screen:{height:r,width:i,colorDepth:s,pixelDepth:c,orientationType:t}}))})}var R=window;function H(e){var t=e.type,n={},o={id:this.getAttribute("perf-id"),name:this.getAttribute("perf-"+t),event:t};if(o.id){this.getAttribute("perf-route")&&(o.route=this.getAttribute("perf-route"));var i=null;if(this.getAttribute("perf-data")){n=this.getAttribute("perf-data");try{n=JSON.parse(n)}catch(e){i=e,console.log(i)}}i||(o.data=n,C("event",o))}else console.log(r.id(t))}function x(){["click","contextmenu","dblclick","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseout","mouseup","keydown","keypress","keyup","abort","beforeunload","error","hashchange","load","pageshow","pagehide","resize","scroll","unload","blur","change","focus","focusin","focusout","input","invalid","reset","search","select","submit","drag","dragend","dragenter","dragleave","dragover","dragstart","drop","copy","cut","paste","afterprint","beforeprint","abort","canplay","canplaythrough","durationchange","ended","error","loadeddata","loadedmetadata","loadstart","pause","play","playing","progress","ratechange","seeked","seeking","stalled","suspend","timeupdate","volumechange","waiting","animationend","animationiteration","animationstart","transitionend"].forEach(function(e){(function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:document;return[].slice.call(t.querySelectorAll(e))})("[perf-"+e+"]").forEach(function(t){t.addEventListener(e,H,!1)})})}function M(e,t){return e(t={exports:{}},t.exports),t.exports}var D=M(function(e){var t;t=function(e){e("FCeptor",function(){var e=window.fetch||function(){};if(e.FCeptor)return e.FCeptor;var t=function(){};t.check=function(e,t){return null==e||e===t||("function"==typeof e.test?e.test(t):"function"==typeof e?e(t):void 0)},(t.prototype=[]).solve=function(e){var t=this;return new Promise(function(n,r){var o=function(i){var a=function(e){switch(!0){case!0===e:return n();case!1===e:return r();case e&&"function"==typeof e.then:return e.then(a,function(e){throw e});default:o(i+1)}};i<t.length?a(t[i](e)):n()};o(0)})},t.prototype.add=function(e,n,r){"function"==typeof e&&this.push(function(o){if(t.check(n,o.request.method)&&t.check(r,o.request.url))return e(o)})};var n=new t,r=new t,o=e;e=function(e,t){var i={request:new Request(e,t),response:null};return n.solve(i).then(function(){return o(i.request).then(function(e){i.response=e},function(e){i.error=e})},function(){i.response||(i.response=new Response)}).then(function(){return r.solve(i)}).then(function(){if(i.response)return i.response;throw i.error},function(){return new Promise(function(){})})},window.fetch&&(window.fetch=e);var i=new function(){var e=this;this.when=function(e,t,o,i){n.add(o,e,t),r.add(i,e,t)},function(){for(var t=["GET","POST","PUT","DELETE","PATCH","HEAD"],n=0;n<t.length;n++)!function(t){e[t.toLowerCase()]=function(){var n=Array.prototype.slice.call(arguments);return e.when.apply(e,[t].concat(n))}}(t[n])}()};return e.FCeptor=i})},e.exports?t(function(t,n,r){var o;void 0===r&&(r=n,n=[]),o=[],e.exports=r.apply(e.exports,o)||e.exports}):"function"===String("undefined")&&(void 0).amd?t(void 0):t(function(e,t,n){void 0===n&&(n=t,t=[]);try{"object"==typeof execScript&&execScript("var "+e)}catch(e){}window[e]={};for(var r=[],o=0;o<t.length;o++)r[o]=window[t[o]];window[e]=n.apply(window[e],r)||window[e]})}),X=M(function(e){var t;t=function(e){e("XCeptor",function(){if(XMLHttpRequest.XCeptor)return XMLHttpRequest.XCeptor;var e=XMLHttpRequest,t=function(){};t.check=function(e,t){return null===e||e===t||("function"==typeof e.test?e.test(t):"function"==typeof e?e(t):void 0)},(t.prototype=[]).solve=function(e,t,n){var r=this,o=function(i){var a=function(e){switch(!0){case!0===e:return t&&t();case!1===e:return n&&n();case e&&"function"==typeof e.then:return e.then(a,function(e){throw e});default:o(i+1)}};i<r.length?a(r[i].apply(null,e)):t&&t()};o(0)},t.prototype.add=function(e,n,r){"function"==typeof e&&this.push(function(o,i){if(t.check(n,o.method)&&t.check(r,o.url))return e(o,i)})};var n,r,o=new t,i=new t;r=["readyState","timeout","upload","withCredentials","status","statusText","responseURL","responseType","response","responseText","responseXML"],n=function(e,t,n){for(var o,i=0;o=r[i];i++)if(!n||n.test(o)){try{t[o],e[o]}catch(e){continue}t[o]=e[o]}};var a,s,u,c,p,d,f;return window.XMLHttpRequest=function(){if(!(this instanceof XMLHttpRequest))throw new TypeError("Failed to construct 'XMLHttpRequest': Please use the 'new' operator, this DOM object constructor cannot be called as a function.");var t=this,r=t.__originalXHR=new e;n(r,t);var o=t.__request={method:null,url:null,isAsync:!0,username:void 0,password:void 0,headers:[],overridedMimeType:void 0,timeout:t.timeout,withCredentials:t.withCredentials,responseType:""},a=t.__response={status:t.status,statusText:t.statusText,headers:[]},s=t.__trigger=function(e){t.dispatchEvent(new function(e,t){this.type=e,this.target=t}(e,t))},u=t.__complete=function(){i.solve([t.__request,t.__response],function(){n(t.__response,t)})},c=function(){c.disabled||(c.disabled=!0,a.headers.splice(0,a.headers.length),a.status=r.status,a.statusText=r.statusText,r.getAllResponseHeaders().replace(/.+/g,function(e){var t=e.match(/(^.*?): (.*$)/);t&&a.headers.push({header:t[1],value:t[2]})}))};n(r,a,/^response/),function(){r.onreadystatechange=function(){n(r,t),n(r,a),3===r.readyState&&c(),4===r.readyState&&(c(),u(),o.isAsync?setTimeout(function(){s("load")}):s("load")),s("readystatechange")};for(var e=["error","timeout","abort"],i=function(e){r["on"+e]=function(){t.readyState=r.readyState,s(e)}},p=0;p<e.length;p++)i(e[p])}()},XMLHttpRequest.prototype={DONE:4,HEADERS_RECEIVED:2,LOADING:3,OPENED:1,UNSENT:0},XMLHttpRequest.prototype.open=function(e,t,n,r,o){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");var i=this.__request;i.method=(e+"").toUpperCase(),i.url=t+"",void 0!==n&&(i.isAsync=!!(1*n)),void 0!==r&&(i.username=r+""),void 0!==o&&(i.password=o+"")},XMLHttpRequest.prototype.setRequestHeader=function(e,t){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");this.__request.headers.push({header:e+"",value:t})},XMLHttpRequest.prototype.overrideMimeType=function(e){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");this.__request.overridedMimeType=e},XMLHttpRequest.prototype.getResponseHeader=function(e){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");var t=this.__response.headers;e=String(e).toLowerCase();for(var n=0;n<t.length;n++)if(t[n].header.toLowerCase()===e)return t[n].value;return null},XMLHttpRequest.prototype.getAllResponseHeaders=function(){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");for(var e=this.__response,t=e.headers,n=[],r=0;r<e.headers.length;r++)n.push(t[r].header+": "+t[r].value);return n.join("\r\n")},XMLHttpRequest.prototype.send=function(e){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");var t=this.__request,r=this.__response;t.data=e,t.withCredentials=this.withCredentials,t.timeout=this.timeout,t.responseType=this.responseType;var i=this;o.solve([t,r],function(){var e=i.__originalXHR;e.open(t.method,t.url,t.isAsync,t.username,t.password);for(var n=0;n<t.headers.length;n++)e.setRequestHeader(t.headers[n].header,t.headers[n].value);void 0!==t.overridedMimeType&&e.overrideMimeType(t.overridedMimeType),e.withCredentials!==t.withCredentials&&(e.withCredentials=t.withCredentials),e.timeout!==t.timeout&&(e.timeout=t.timeout),e.responseType!==t.responseType&&(e.responseType=t.responseType),e.send(t.data)},function(){var e=function(){r.readyState=3,n(r,i),i.__trigger("readystatechange"),r.readyState=4,n(r,i),i.__complete(),i.__trigger("readystatechange"),i.__trigger("load")};t.isAsync?setTimeout(e):e()})},XMLHttpRequest.prototype.abort=function(){if(!(this instanceof XMLHttpRequest))throw new TypeError("Illegal invocation");this.__originalXHR.abort()},window.XMLHttpRequest=(a=XMLHttpRequest,s="__events__",u=function(e,t){var n=s in e?e[s]:e[s]={};return t in n?n[t]:n[t]=[]},c=function(e,t){u(this,e).push(t)},p=function(e,t){for(var n=u(this,e),r=0;r<n.length;r++)n[r]===t&&(n.splice(r,1),r=NaN)},d=function(e){for(var t=u(this,e.type),n=0;n<t.length;n++)t[n](e);var r="on"+e.type;"function"==typeof this[r]&&this[r](e)},(f=function(){a.apply(this,arguments),this.addEventListener=c,this.removeEventListener=p,this.dispatchEvent=d}).prototype=a.prototype,f),XMLHttpRequest.XCeptor=new function(){var e=this;this.when=function(e,t,n,r){o.add(n,e,t),i.add(r,e,t)},function(){for(var t=["GET","POST","PUT","DELETE","PATCH","HEADER","OPTIONS"],n=0;n<t.length;n++)!function(t){e[t.toLowerCase()]=function(){var n=Array.prototype.slice.call(arguments);return e.when.apply(e,[t].concat(n))}}(t[n])}()}})},e.exports?t(function(t,n,r){var o;"string"!=typeof t&&(r=n,n=t,t=null),n instanceof Array||(r=n,n=[]),o=[],e.exports=r.apply(e.exports,o)||e.exports}):"function"===String("undefined")&&(void 0).amd?t(void 0):t(function(e,t,n){"string"!=typeof e&&(n=t,t=e,e=null),t instanceof Array||(n=t,t=[]);for(var r={},o=[],i=0;i<t.length;i++)o[i]=window[t[i]];if(r=n.apply(r,o)||r,e){try{"object"==typeof execScript&&execScript("var "+e)}catch(e){}window[e]=r}})});function A(e){return{navigationStart:window.performance.timing.navigationStart,startTime:i(e.startTime),duration:i(e.duration),dnsTime:i(e.domainLookupEnd-e.domainLookupStart),tcpTime:i(e.connectEnd-e.connectStart),reqTime:i(e.responseStart-e.requestStart),resTime:i(e.responseEnd-e.responseStart)}}var N=window;function I(){C("network-batched",N.performance.getEntries().filter(function(e){return"script"===e.initiatorType||"css"===e.initiatorType}).map(function(e){return a((n=c((t=e).name),r=n.port,o=n.host,i=n.urlPath,{network:d(),httpMethod:"GET",solution:"timing",statusCode:200,url:t.name,reqLength:void 0,respLength:void 0,errorDomain:void 0,errorDescription:void 0,elapsedTime:void 0,error:!1,host:o,port:r,urlPath:i}),A(e));var t,n,r,o,i}))}function O(e){if(!(e.url.indexOf(m.trackerDomain)>-1)){e._startedTime=s();var t=u()+"|"+Date.now();e._requestId=t;try{e.headers.push({header:"X-Eleme-RequestID",value:t})}catch(e){}}}function j(e){var t=e.request;if(!(t.url.indexOf(m.trackerDomain)>-1)){t._startedTime=s();var n=u()+"|"+Date.now();t._requestId=n;try{t.headers.append("X-Eleme-RequestID",n)}catch(e){}}}function U(e){var t={solution:"ajax",network:d()};if(a(t,e),N.performance&&"function"==typeof N.performance.getEntriesByName){var n=N.performance.getEntriesByName(p(e.url)),r=n[n.length-1];r&&(a(t,A(r)),a(t,{solution:"ajax-timing"}))}C("network",t)}function F(e,t){var n=e.url;if(!(n.indexOf(m.trackerDomain)>-1)){var r=p(n),o=c(r),a=o.host,u=o.urlPath,d=o.port,f=t.status,l=!1;(0===f||f>=400)&&(l=!0);var h=void 0;h=e._startedTime?i(s()-e._startedTime):-1,U({statusCode:f,reqLength:n.length,respLength:function(e){if("text"!==e.responseType&&""!==e.responseType)return"blob"===e.responseType?e.response.size:-1;var t=e.responseText;try{return new Blob([t],{type:"plain/text"}).size}catch(e){return"string"==typeof t?t.length:0}}(t),httpMethod:e.method,url:r,host:a,port:d,urlPath:u,error:l,errorDomain:void 0,errorDescription:l?t.responseText:void 0,requestId:e._requestId,elapsedTime:h})}}function W(e){var t=e.request,n=e.response,r=t.url,o=p(r),a=c(o),u=a.host,d=a.urlPath,f=a.port,l=void 0;if(l=t._startedTime?i(s()-t._startedTime):-1,n){var h=n.status,v=!1;(0===h||h>=400)&&(v=!0),n.clone().blob().then(function(e){U({statusCode:h,reqLength:r.length,respLength:e.size,httpMethod:t.method,url:o,host:u,port:f,urlPath:d,error:v,errorDomain:void 0,errorDescription:v?n.statusText:void 0,requestId:t._requestId,elapsedTime:l})})}else{U({statusCode:-1,reqLength:-1,respLength:-1,httpMethod:-1,url:o,host:u,port:f,urlPath:d,error:!0,errorDomain:void 0,errorDescription:"Fetch API failed with no response",requestId:t._requestId,elapsedTime:l})}}var G=window,z={};function B(e,t){(function(e){return!!e.match(/^http:/)||!(!e.match(/^\//)||"http:"!==location.protocol)})(e)&&(function(e){return z[e]}(e)||e.indexOf(m.trackerDomain)>-1||(C("http-warning",{method:t,url:e}),function(e){z[e]=!0}(e)))}function J(e){B(e.url,"xhr")}function V(e){B(e.request.url,"fetch")}function $(){var e=new Date(Date.now()+288e5).toISOString().slice(0,10);return function(){for(var e="",t=0;t<4;t++)e+=("0000000"+Math.floor(2821109907456*Math.random()).toString(36)).slice(-8);return e}()+"_"+e}var Y=window;if(Y.ElemePerfConfigs||(Y.ElemePerfConfigs={}),"function"==typeof document.addEventListener&&(Y.Perf={name:"perf-js",version:"2.0.0-beta.14",send:C,sendEvent:function(e){switch(e.id&&console.error("Custom event: `id` is required"),e.name&&console.error("Custom event: `name` is required"),o(e.data)){case"Undefined":break;case"Object":case"Array":for(var t in e.data){var n=e.data[t];"String"!==o(n)&&console.warn("Custom event: "+n+" is not a string at "+t)}break;default:console.warn("Custom event: `data` should be array or object")}C("event",e)},sendRawEvent:function(e,t){return b({id:g.location.href,sdkVer:"2.0.0-beta.14",appName:g.ElemePerfConfigs.appName,pageName:g.ElemePerfConfigs.pageName,source:g.ElemePerfConfigs.serviceWorker?"web-sw":"web",ssid:g.ElemePerfConfigs.ssid,network:d(),type:e,d:t}),this},count:function(e){S(a(e,{type:_}))},timing:function(e){S(a(e,{type:L}))}},function(){for(var e in v)e in Y.ElemePerfConfigs||(Y.ElemePerfConfigs[e]=v[e])}(),!Y.ElemePerfConfigs.dev)){Y.ElemePerfConfigs.ssid=function(){var e=void 0,t=location&&location.hostname;if(t)e=document.cookie.match(/(?:^|; )perf_ssid=(.*?)(?:; |$)|$/)[1];else try{e=localStorage.getItem("perf_ssid")}catch(e){setTimeout(function(){throw e})}if(!e)if(e=$(),t)document.cookie=function(e,t){return"perf_ssid="+e+"; Expires=Wed, 31 Dec 2098 16:00:00 GMT; Domain="+t+"; Path=/"}(e,t);else try{localStorage.setItem("perf_ssid",e)}catch(e){setTimeout(function(){throw e})}return e}();var K=Y.ElemePerfConfigs.appName;!function(e,t){var n=new XMLHttpRequest;n.open("GET",e),"function"==typeof t&&(n.onreadystatechange=function(){4===n.readyState&&(200===n.status?t(null,JSON.parse(n.responseText||null)):t({req:n,msg:"failed"},null))}),n.send()}("https://crayfish.elemecdn.com/perf.js@json/sdk-config/"+encodeURI(K),function(e,t){var r,o,i=a(m.sendingTypes,e?{}:t);i.global&&(i.device&&P(),i.load&&function(){var e=window,t=!1;function r(){var t={};return[["lookup",["domainLookupEnd","domainLookupStart"]],["connect",["connectEnd","connectStart"]],["waiting",["responseStart","requestStart"]],["receiving",["responseEnd","responseStart"]],["parsing",["domComplete","domLoading"]],["contentLoaded",["domContentLoadedEventStart","navigationStart"]],["pageLoaded",["loadEventStart","navigationStart"]]].forEach(function(r){var o=n(r[1],2),i=o[0],a=o[1];t[r[0]]=e.performance.timing[i]-e.performance.timing[a]}),t}e.performance&&(e.addEventListener("beforeunload",function(){t||(t=!0,C("unload",r()))}),e.addEventListener("load",function(){t||(t=!0,C("load",r()))}))}(),i.event&&R.addEventListener("load",x),i.asset&&N.addEventListener("load",function(){N.performance&&"function"==typeof N.performance.getEntries&&I()}),i.http&&G.addEventListener("load",function(){G.performance&&"function"==typeof G.performance.getEntries&&G.performance.getEntries().forEach(function(e){B(e.name,"asset")})}),i.http&&(X.when(/^/,/^/,J),"function"==typeof G.fetch&&G.Headers&&"function Headers() { [native code] }"===G.Headers.toString()&&D.when(/^/,/^/,V)),i.api&&(o=N.ElemePerfConfigs.etraceApiFilter,X.when(/^/,o,O,F),"function"==typeof N.fetch&&"function Headers() { [native code] }"===N.Headers.toString()&&D.when(/^/,o,j,W)),y=!0,(r=i)&&(g.ElemePerfConfigs.sendingTypes=r),w.forEach(function(e){q.apply(null,e)}),w=[])})}}();