webpackJsonp([90],{0:function(t,e,n){"use strict";e.a=function(t,e,n,s,o,a,i,r){var c=typeof(t=t||{}).default;"object"!==c&&"function"!==c||(t=t.default);var u,l="function"==typeof t?t.options:t;e&&(l.render=e,l.staticRenderFns=n,l._compiled=!0);s&&(l.functional=!0);a&&(l._scopeId=a);i?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(i)},l._ssrRegister=u):o&&(u=r?function(){o.call(this,this.$root.$options.shadowRoot)}:o);if(u)if(l.functional){l._injectStyles=u;var f=l.render;l.render=function(t,e){return u.call(e),f(t,e)}}else{var d=l.beforeCreate;l.beforeCreate=d?[].concat(d,u):[u]}return{exports:t,options:l}}},1046:function(t,e,n){"use strict";e.a={data:()=>({cooperation:window.crayfish.data})}},3307:function(t,e,n){t.exports=n(3308)},3308:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=n(3309);new Vue({el:"#app",render:t=>t(s.a)})},3309:function(t,e,n){"use strict";var s=n(1046),o=n(3311),a=n(0);var i=function(t){n(3310)},r=Object(a.a)(s.a,o.a,o.b,!1,i,null,null);e.a=r.exports},3310:function(t,e){},3311:function(t,e,n){"use strict";n.d(e,"a",function(){return s}),n.d(e,"b",function(){return o});var s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("ul",{staticClass:"app"},t._l(t.cooperation,function(e){return n("li",[n("img",{staticClass:"img",attrs:{src:e.image}}),n("div",{staticClass:"content"},[n("h1",{staticClass:"content-title"},[t._v(t._s(e.title))]),n("p",{staticClass:"content-desc"},[t._v(t._s(e.content))])]),e.buttonText&&!e.buttonDisabled?n("a",{staticClass:"button",attrs:{href:e.href}},[t._v("\n      "+t._s(e.buttonText)+"\n    ")]):t._e(),e.buttonText&&e.buttonDisabled?n("span",{staticClass:"button",attrs:{disabled:""}},[t._v("\n      "+t._s(e.buttonText)+"\n    ")]):t._e()])}))},o=[]}},[3307]);