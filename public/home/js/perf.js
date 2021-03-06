!
function(e, t) {
    "object" == typeof exports && "undefined" != typeof module ? t() : "function" == typeof define && define.amd ? define(t) : t()
} (this,
function() {
    "use strict";
    function e(e, t) {
        for (var n in t) e[n] = t[n];
        return e
    }
    function t(e) {
        return Object.prototype.toString.call(e).slice(8, -1)
    }
    function n(e, t) {
        return t = document || t,
        t.querySelectorAll(e)
    }
    function r() {
        function e() {
            return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1).toUpperCase()
        }
        return e() + e() + e() + e() + e() + e() + e() + e()
    }
    function o(e) {
        var t, n, r = e.replace(/^(https?:)?\/\//, ""),
        o = r.indexOf("/"),
        i = r.slice(0, o).replace(/:\d+$/, ""),
        a = r.slice(o);
        if (a.indexOf("?") >= 0) {
            var s = a.split("?"),
            u = X(s, 2);
            t = u[0],
            n = u[1]
        } else t = a,
        n = "";
        var c;
        return c = null != i.match(/:\d+/) ? i.match(/:(\d+)/)[1] : "80",
        {
            host: i,
            urlPath: t,
            port: c,
            search: n
        }
    }
    function i(e) {
        return Math.round(1e3 * e) / 1e3
    }
    function a(e) {
        return e.match(/^https?:/) ? e: "" + location.protocol + e
    }
    function s(e) {
        var t = e.match(/https?\:\/\/[\w\d\-_\:\.\/]+/g);
        if (null != t) {
            var n = t[t.length - 1];
            return {
                file: n.split(":").slice(0, -2).join(":"),
                line: n.split(":").slice( - 2).join(":")
            }
        }
        return {
            file: void 0,
            line: void 0
        }
    }
    function u() {
        var e, t = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
        return e = null != t ? t.type: "guessWifi"
    }
    function c(e) {
        var t = new XMLHttpRequest;
        t.open("GET", j.configsUrl),
        "function" == typeof e && (t.onreadystatechange = function(n) {
            4 === t.readyState && (200 === t.status ? e(null, JSON.parse(t.responseText || null)) : e({
                req: t,
                msg: "failed"
            },
            null))
        }),
        t.send()
    }
    function f(e, t) {
        var n = window.ElemePerfConfigs.sendingTypes;
        switch (e) {
        case "load":
            return n.load;
        case "error":
            return n.error;
        case "http-warning":
            return n.http;
        case "event":
            return n.event;
        case "network":
            return n.api;
        case "networkBatched":
            return n.asset;
        default:
            return console.warn("[PERF] Unknown event:", e),
            !1
        }
    }
    function l(e, t) {
        U ? F(e, t) : O.push([e, t])
    }
    function d(e) {
        U = !0,
        null != e && (window.ElemePerfConfigs.sendingTypes = e),
        O.forEach(function(e) {
            F.apply(null, e)
        }),
        O = []
    }
    function p(e) {
        switch (null == e.id && console.error("Custom event: `id` is required"), null == e.name && console.error("Custom event: `name` is required"), t(e.data)) {
        case "Undefined":
            break;
        case "Object":
        case "Array":
            for (var n in e.data) {
                var r = e.data[n];
                "String" !== t(r) && console.warn("Custom event: " + r + " is not a string at " + n)
            }
            break;
        default:
            console.warn("Custom event: `data` should be array or object")
        }
        l("event", e)
    }
    function h(e, t) {
        var n = {
            id: N.location.href,
            sdkVer: window.ElemePerfConfigs.sdkVer,
            appVer: window.ElemePerfConfigs.appVer,
            appName: window.ElemePerfConfigs.appName,
            pageName: window.ElemePerfConfigs.pageName,
            source: window.ElemePerfConfigs.source,
            ssid: window.ElemePerfConfigs.ssid,
            type: e,
            network: u(),
            d: t
        };
        if ("function" == typeof N.PERF_DEBUG) N.PERF_DEBUG(n);
        else {
            var r = window.ElemePerfConfigs.trackerDomain,
            o = new Image;
            o.src = r + "/_.gif?" + I(n) + "&time=" + Date.now()
        }
        return this
    }
    function v(e, t) {
        var n = {};
        if ("string" == typeof e) n = {
            line: "0:0",
            file: t.toString(),
            error: e,
            stack: null
        };
        else if ("object" === ("undefined" == typeof e ? "undefined": D(e))) if (e.sourceURL) n = {
            line: e.line + ":" + e.column,
            file: e.sourceURL,
            error: e.message
        };
        else if (e.stack) {
            for (var r = e.stack.split("\n"), o = e.toString(), i = /(https?:\/\/.*?):(\d*):(\d*)/, a = void 0, s = 0, u = r.length; s < u; ++s) {
                var c = r[s];
                if (i.test(c)) {
                    a = i.exec(c);
                    break
                }
            }
            n = a && a.length > 3 ? {
                line: a[2] + ":" + a[3],
                file: a[1],
                error: o,
                stack: e.stack
            }: {
                line: "0:0",
                file: r.toString(),
                error: o,
                stack: e.stack
            }
        }
        return n
    }
    function w(e, t) {
        try {
            "function" != typeof e && (e = new Function(e)),
            e.apply(null, t)
        } catch(t) {
            var n = v(t, e),
            r = JSON.stringify(n);
            if (B[r]) return;
            throw B[r] = !0,
            l("error", n),
            t
        }
    }
    function m() {
        G.addEventListener("error",
        function(e) {
            var t = e.filename + e.lineno + e.colno + G.location.href;
            B[t] || (B[t] = !0, l("error", {
                line: e.lineno + ":" + e.colno,
                file: e.filename,
                error: e.message,
                stack: e.error ? e.error.stack: null
            }))
        }),
        G.addEventListener("unhandledrejection",
        function(e) {
            var t = "Unhandled promise rejection: " + e.reason;
            if (e.reason && e.reason.stack) {
                var n = s(e.reason.stack);
                l("error", {
                    file: n.file,
                    line: n.line,
                    error: t,
                    stack: e.reason.stack
                })
            } else l("error", {
                error: t,
                stack: e.reason ? e.reason.stack: null
            })
        });
        var e = G.setTimeout;
        G.setTimeout = function(t, n) {
            var r = [].slice.call(arguments, 2);
            return e(function() {
                w(t, r)
            },
            n)
        };
        var t = G.setInterval;
        G.setInterval = function(e, n) {
            var r = [].slice.call(arguments, 2);
            return t(function() {
                w(e, r)
            },
            n)
        }
    }
    function g() {
        function e() {
            var e = [["lookup", ["domainLookupEnd", "domainLookupStart"]], ["connect", ["connectEnd", "connectStart"]], ["waiting", ["responseStart", "requestStart"]], ["receiving", ["responseEnd", "responseStart"]], ["parsing", ["domComplete", "domLoading"]], ["contentLoaded", ["domContentLoadedEventStart", "navigationStart"]], ["pageLoaded", ["loadEventStart", "navigationStart"]]],
            t = {};
            return e.forEach(function(e) {
                var n = X(e[1], 2),
                o = n[0],
                i = n[1];
                t[e[0]] = r.performance.timing[o] - r.performance.timing[i]
            }),
            t
        }
        function t() {
            o || (o = 1, l("load", e()))
        }
        function n() {
            o || (o = 1, l("unload", e()))
        }
        var r = window,
        o = 0;
        r.performance && (r.addEventListener("beforeunload", n), r.addEventListener("load", t))
    }
    function y(e) {
        var t = e.type,
        n = {},
        r = {
            id: this.getAttribute("perf-id"),
            name: this.getAttribute("perf-" + t),
            event: t
        };
        if (!r.id) {
            if (V.PERF_DEBUG) throw new Error(A.id(t));
            return console.log(A.id(t))
        }
        this.getAttribute("perf-route") && (r.route = this.getAttribute("perf-route"));
        var o = null;
        if (this.getAttribute("perf-data")) {
            n = this.getAttribute("perf-data");
            try {
                n = JSON.parse(n)
            } catch(e) {
                if (o = 1, V.PERF_DEBUG) throw new Error(A.data);
                console.log(o)
            }
        }
        o || (r.data = n, l("event", r))
    }
    function E() { ["click", "contextmenu", "dblclick", "mousedown", "mouseenter", "mouseleave", "mousemove", "mouseover", "mouseout", "mouseup", "keydown", "keypress", "keyup", "abort", "beforeunload", "error", "hashchange", "load", "pageshow", "pagehide", "resize", "scroll", "unload", "blur", "change", "focus", "focusin", "focusout", "input", "invalid", "reset", "search", "select", "submit", "drag", "dragend", "dragenter", "dragleave", "dragover", "dragstart", "drop", "copy", "cut", "paste", "afterprint", "beforeprint", "abort", "canplay", "canplaythrough", "durationchange", "ended", "error", "loadeddata", "loadedmetadata", "loadstart", "pause", "play", "playing", "progress", "ratechange", "seeked", "seeking", "stalled", "suspend", "timeupdate", "volumechange", "waiting", "animationend", "animationiteration", "animationstart", "transitionend"].forEach(function(e) {
            var t = n("[perf-" + e + "]");
            t.length && [].slice.call(t).forEach(function(t) {
                return t.addEventListener(e, y)
            })
        })
    }
    function b() {
        V.addEventListener("load", E)
    }
    function T(e, t) {
        return t = {
            exports: {}
        },
        e(t, t.exports),
        t.exports
    }
    function k() {
        window.addEventListener("load",
        function() {
            null != window.performance && null != performance.getEntries && W()
        })
    }
    function C() {
        var e = window.ElemePerfConfigs.etraceApiFilter;
        if ($.when(/^/, e, K, ne), null != window.fetch) {
            var t = "function Headers() { [native code] }";
            window.Headers.toString() === t && z.when(/^/, e, Z, re)
        }
    }
    function _() {
        window.addEventListener("load",
        function() {
            if (null != window.performance && null != performance.getEntries) {
                var e = performance.getEntries();
                e.forEach(function(e) {
                    ue(e.name, "asset")
                })
            }
        })
    }
    function S() {
        if ($.when(/^/, /^/, ce), null != window.fetch) {
            var e = "function Headers() { [native code] }";
            window.Headers.toString() === e && z.when(/^/, /^/, fe)
        }
    }
    function L(e) {
        H.parentNode.removeChild(H)
    }
    function q(e) {
        l("event", {
            id: 2,
            name: "undefined-variables",
            data: [e]
        })
    }
    function x() {
        H.innerHTML = pe,
        setTimeout(L, 2e3)
    }
    function P(e) {
        var t = document.createElement("div");
        t.className = "perf-feedback-tip",
        t.innerHTML = de;
        var n = t.getElementsByClassName("perf-feedback-close")[0],
        r = t.getElementsByClassName("perf-feedback-report")[0];
        r.onclick = function(t) {
            q(e),
            x()
        },
        n.onclick = L,
        document.body.appendChild(t),
        H = t
    }
    function R(e) {
        if (0 !== e.length) {
            var t = e.filter(function(e) {
                return null == window[e]
            });
            if (t.length > 0) {
                try {
                    var n = "perf-undefined-variables";
                    if ("1" === sessionStorage.getItem(n)) return;
                    sessionStorage.setItem(n, "1")
                } catch(e) {}
                P(t)
            }
        }
    }
    function M() {
        var e, t = /(?:[\w-]+\.)?[\w-]+$|$/i.exec(document.domain || "")[0];
        if (t) e = document.cookie.match(/(?:^|; )perf_ssid=(.*?)(?:; |$)|$/)[1];
        else try {
            e = localStorage.getItem("perf_ssid")
        } catch(e) {
            setTimeout(function() {
                throw e
            })
        }
        if (!e) if (e = ve(), t) document.cookie = we(e, t);
        else try {
            localStorage.setItem("perf_ssid", e)
        } catch(e) {
            setTimeout(function() {
                throw e
            })
        }
        return e
    }
    var H, D = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?
    function(e) {
        return typeof e
    }: function(e) {
        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
    },
    X = (function() {
        function e(e) {
            this.value = e
        }
        function t(t) {
            function n(e, t) {
                return new Promise(function(n, o) {
                    var s = {
                        key: e,
                        arg: t,
                        resolve: n,
                        reject: o,
                        next: null
                    };
                    a ? a = a.next = s: (i = a = s, r(e, t))
                })
            }
            function r(n, i) {
                try {
                    var a = t[n](i),
                    s = a.value;
                    s instanceof e ? Promise.resolve(s.value).then(function(e) {
                        r("next", e)
                    },
                    function(e) {
                        r("throw", e)
                    }) : o(a.done ? "return": "normal", a.value)
                } catch(e) {
                    o("throw", e)
                }
            }
            function o(e, t) {
                switch (e) {
                case "return":
                    i.resolve({
                        value:
                        t,
                        done: !0
                    });
                    break;
                case "throw":
                    i.reject(t);
                    break;
                default:
                    i.resolve({
                        value:
                        t,
                        done: !1
                    })
                }
                i = i.next,
                i ? r(i.key, i.arg) : a = null
            }
            var i, a;
            this._invoke = n,
            "function" != typeof t.
            return && (this.
            return = void 0)
        }
        return "function" == typeof Symbol && Symbol.asyncIterator && (t.prototype[Symbol.asyncIterator] = function() {
            return this
        }),
        t.prototype.next = function(e) {
            return this._invoke("next", e)
        },
        t.prototype.
        throw = function(e) {
            return this._invoke("throw", e)
        },
        t.prototype.
        return = function(e) {
            return this._invoke("return", e)
        },
        {
            wrap: function(e) {
                return function() {
                    return new t(e.apply(this, arguments))
                }
            },
            await: function(t) {
                return new e(t)
            }
        }
    } (),
    function() {
        function e(e, t) {
            var n = [],
            r = !0,
            o = !1,
            i = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); ! (r = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); r = !0);
            } catch(e) {
                o = !0,
                i = e
            } finally {
                try { ! r && s.
                    return && s.
                    return ()
                } finally {
                    if (o) throw i
                }
            }
            return n
        }
        return function(t, n) {
            if (Array.isArray(t)) return t;
            if (Symbol.iterator in Object(t)) return e(t, n);
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }
    } ()),
    I = function e(t, n) {
        var r, o = [];
        for (r in t) {
            var i = t[r];
            if (t.hasOwnProperty(r) && null != i) {
                var a = n ? n + "[" + r + "]": r;
                o.push(null !== i && "object" === ("undefined" == typeof i ? "undefined": D(i)) ? e(i, a) : encodeURIComponent(a) + "=" + encodeURIComponent(i))
            }
        }
        return o.join("&")
    },
    A = {
        id: function(e) {
            return 'You need a "project/id", like perf-' + e + '="project/id"'
        },
        data: "`perf-data` show be a json string"
    },
    j = {
        trackerDomain: "https://perf.ele.me",
        sdkVer: "1.2.1-rc0",
        appVer: "0.0.0",
        appName: location.hostname,
        pageName: void 0,
        source: "web",
        sendingTypes: {
            load: !0,
            error: !0,
            event: !0,
            asset: !1,
            http: !0,
            api: !1
        },
        ensureVariables: [],
        etraceApiFilter: /(^\/[^\/])|^(https?:)?\/\/([^\/]+\.)?(ele(net)?\.me)/,
        configsUrl: "https://crayfish.elemecdn.com/perf.js@json/sdk-config/" + location.hostname,
        ssid: null
    },
    N = window,
    U = !1,
    O = [],
    F = function(e, t) {
        if (f(e, t)) {
            var n = {
                id: N.location.href,
                sdkVer: window.ElemePerfConfigs.sdkVer,
                appVer: window.ElemePerfConfigs.appVer,
                appName: window.ElemePerfConfigs.appName,
                pageName: window.ElemePerfConfigs.pageName,
                source: window.ElemePerfConfigs.source,
                ssid: window.ElemePerfConfigs.ssid,
                type: e,
                network: u(),
                d: t
            };
            if ("function" == typeof N.PERF_DEBUG) N.PERF_DEBUG(n);
            else {
                var r = window.ElemePerfConfigs.trackerDomain,
                o = new Image;
                o.src = r + "/_.gif?" + I(n) + "&time=" + Date.now()
            }
            return this
        }
    },
    B = {},
    G = window,
    V = window,
    $ = T(function(e) {
        void
        function(t) {
            return "object" == typeof e && e.exports ? t(function(t, n, r) {
                "string" != typeof t && (r = n, n = t, t = null),
                n instanceof Array || (r = n, n = []);
                var o;
                o = [],
                e.exports = r.apply(e.exports, o) || e.exports
            }) : "function" === String(typeof define) && define.amd ? t(define) : void t(function(e, t, n) {
                "string" != typeof e && (n = t, t = e, e = null),
                t instanceof Array || (n = t, t = []);
                for (var r = {},
                o = [], i = 0; i < t.length; i++) o[i] = window[t[i]];
                if (r = n.apply(r, o) || r, e) {
                    try {
                        "object" == typeof execScript && execScript("var " + e)
                    } catch(e) {}
                    window[e] = r
                }
            })
        } (function(e) {
            e("XCeptor",
            function() {
                if (XMLHttpRequest.XCeptor) return XMLHttpRequest.XCeptor;
                var e = XMLHttpRequest,
                t = function() {};
                t.check = function(e, t) {
                    return null === e || e === t || ("function" == typeof e.test ? e.test(t) : "function" == typeof e ? e(t) : void 0)
                },
                t.prototype = [],
                t.prototype.solve = function(e, t, n) {
                    var r = this,
                    o = function(i) {
                        var a = function(e) {
                            switch (!0) {
                            case e === !0 : return t && t();
                            case e === !1 : return n && n();
                            case e && "function" == typeof e.then: return e.then(a,
                                function(e) {
                                    throw e
                                });
                            default:
                                o(i + 1)
                            }
                        };
                        i < r.length ? a(r[i].apply(null, e)) : t && t()
                    };
                    o(0)
                },
                t.prototype.add = function(e, n, r) {
                    "function" == typeof e && this.push(function(o, i) {
                        if (t.check(n, o.method) && t.check(r, o.url)) return e(o, i)
                    })
                };
                var n, r = new t,
                o = new t;
                void
                function() {
                    var e = ["readyState", "timeout", "upload", "withCredentials", "status", "statusText", "responseURL", "responseType", "response", "responseText", "responseXML"];
                    n = function(t, n, r) {
                        for (var o, i = 0; o = e[i]; i++) if (!r || r.test(o)) {
                            try {
                                void n[o],
                                void t[o]
                            } catch(e) {
                                continue
                            }
                            n[o] = t[o]
                        }
                    }
                } ();
                var i = function(e, t) {
                    this.type = e,
                    this.target = t
                },
                a = function(e) {
                    var t = "__events__",
                    n = function(e, n) {
                        var r = t in e ? e[t] : e[t] = {};
                        return n in r ? r[n] : r[n] = []
                    },
                    r = function(e, t) {
                        n(this, e).push(t)
                    },
                    o = function(e, t) {
                        for (var r = n(this, e), o = 0; o < r.length; o++) r[o] === t && (r.splice(o, 1), o = NaN)
                    },
                    i = function(e) {
                        for (var t = n(this, e.type), r = 0; r < t.length; r++) t[r](e);
                        var o = "on" + e.type;
                        "function" == typeof this[o] && this[o](e)
                    },
                    a = function() {
                        e.apply(this, arguments),
                        this.addEventListener = r,
                        this.removeEventListener = o,
                        this.dispatchEvent = i
                    };
                    return a.prototype = e.prototype,
                    a
                };
                return window.XMLHttpRequest = function() {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Failed to construct 'XMLHttpRequest': Please use the 'new' operator, this DOM object constructor cannot be called as a function.");
                    var t = this,
                    r = t.__originalXHR = new e;
                    n(r, t);
                    var a = (t.__request = {
                        method: null,
                        url: null,
                        isAsync: !0,
                        username: void 0,
                        password: void 0,
                        headers: [],
                        overridedMimeType: void 0,
                        timeout: t.timeout,
                        withCredentials: t.withCredentials,
                        responseType: ""
                    },
                    t.__response = {
                        status: t.status,
                        statusText: t.statusText,
                        headers: []
                    }),
                    s = t.__trigger = function(e) {
                        t.dispatchEvent(new i(e, t))
                    },
                    u = t.__complete = function() {
                        o.solve([t.__request, t.__response],
                        function() {
                            n(t.__response, t)
                        })
                    },
                    c = function() {
                        c.disabled || (c.disabled = !0, a.headers.splice(0, a.headers.length), a.status = r.status, a.statusText = r.statusText, r.getAllResponseHeaders().replace(/.+/g,
                        function(e) {
                            var t = e.match(/(^.*?): (.*$)/);
                            t && a.headers.push({
                                header: t[1],
                                value: t[2]
                            })
                        }))
                    };
                    n(r, a, /^response/),
                    void
                    function() {
                        r.onreadystatechange = function() {
                            n(r, t),
                            n(r, a),
                            3 === r.readyState && c(),
                            4 === r.readyState && (c(), u(), setTimeout(function() {
                                s("load")
                            })),
                            s("readystatechange")
                        };
                        for (var e = ["error", "timeout", "abort"], o = function(e) {
                            r["on" + e] = function() {
                                t.readyState = r.readyState,
                                s(e)
                            }
                        },
                        i = 0; i < e.length; i++) o(e[i])
                    } ()
                },
                XMLHttpRequest.prototype = {
                    DONE: 4,
                    HEADERS_RECEIVED: 2,
                    LOADING: 3,
                    OPENED: 1,
                    UNSENT: 0
                },
                XMLHttpRequest.prototype.open = function(e, t, n, r, o) {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    var i = this.__request;
                    i.method = (e + "").toUpperCase(),
                    i.url = t + "",
                    void 0 !== n && (i.isAsync = !!(1 * n)),
                    void 0 !== r && (i.username = r + ""),
                    void 0 !== o && (i.password = o + "")
                },
                XMLHttpRequest.prototype.setRequestHeader = function(e, t) {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    this.__request.headers.push({
                        header: e + "",
                        value: t
                    })
                },
                XMLHttpRequest.prototype.overrideMimeType = function(e) {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    this.__request.overridedMimeType = e
                },
                XMLHttpRequest.prototype.getResponseHeader = function(e) {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    var t = this.__response.headers;
                    e = String(e).toLowerCase();
                    for (var n = 0; n < t.length; n++) if (t[n].header.toLowerCase() === e) return t[n].value;
                    return null
                },
                XMLHttpRequest.prototype.getAllResponseHeaders = function() {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    for (var e = this.__response,
                    t = e.headers,
                    n = [], r = 0; r < e.headers.length; r++) n.push(t[r].header + ": " + t[r].value);
                    return n.join("\r\n")
                },
                XMLHttpRequest.prototype.send = function(e) {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    var t = this.__request,
                    o = this.__response;
                    t.data = e,
                    t.withCredentials = this.withCredentials,
                    t.timeout = this.timeout,
                    t.responseType = this.responseType;
                    var i = this;
                    r.solve([t, o],
                    function() {
                        var e = i.__originalXHR;
                        e.open(t.method, t.url, t.isAsync, t.username, t.password);
                        for (var n = 0; n < t.headers.length; n++) e.setRequestHeader(t.headers[n].header, t.headers[n].value);
                        void 0 !== t.overridedMimeType && e.overrideMimeType(t.overridedMimeType),
                        e.withCredentials !== t.withCredentials && (e.withCredentials = t.withCredentials),
                        e.timeout !== t.timeout && (e.timeout = t.timeout),
                        e.responseType !== t.responseType && (e.responseType = t.responseType),
                        e.send(t.data)
                    },
                    function() {
                        var e = function() {
                            o.readyState = 3,
                            n(o, i),
                            i.__trigger("readystatechange"),
                            o.readyState = 4,
                            n(o, i),
                            i.__complete(),
                            i.__trigger("readystatechange"),
                            i.__trigger("load")
                        };
                        t.isAsync ? setTimeout(e) : e()
                    })
                },
                XMLHttpRequest.prototype.abort = function() {
                    if (! (this instanceof XMLHttpRequest)) throw new TypeError("Illegal invocation");
                    this.__originalXHR.abort()
                },
                window.XMLHttpRequest = a(XMLHttpRequest),
                XMLHttpRequest.XCeptor = new
                function() {
                    var e = this;
                    this.when = function(e, t, n, i) {
                        r.add(n, e, t),
                        o.add(i, e, t)
                    },
                    void
                    function() {
                        for (var t = ["GET", "POST", "PUT", "DELETE", "PATCH", "HEADER", "OPTIONS"], n = 0; n < t.length; n++) void
                        function(t) {
                            e[t.toLowerCase()] = function() {
                                var n = Array.prototype.slice.call(arguments);
                                return e.when.apply(e, [t].concat(n))
                            }
                        } (t[n])
                    } ()
                }
            })
        })
    }),
    z = T(function(e) {
        void
        function(t) {
            return "object" == typeof e && e.exports ? t(function(t, n, r) {
                void 0 === r && (r = n, n = []);
                var o;
                o = [],
                e.exports = r.apply(e.exports, o) || e.exports
            }) : "function" === String(typeof define) && define.amd ? t(define) : void t(function(e, t, n) {
                void 0 === n && (n = t, t = []);
                try {
                    "object" == typeof execScript && execScript("var " + e)
                } catch(e) {}
                window[e] = {};
                for (var r = [], o = 0; o < t.length; o++) r[o] = window[t[o]];
                window[e] = n.apply(window[e], r) || window[e]
            })
        } (function(e) {
            e("FCeptor",
            function() {
                var e = window.fetch ||
                function() {};
                if (e.FCeptor) return e.FCeptor;
                var t = function() {};
                t.check = function(e, t) {
                    return null == e || e === t || ("function" == typeof e.test ? e.test(t) : "function" == typeof e ? e(t) : void 0)
                },
                t.prototype = [],
                t.prototype.solve = function(e) {
                    var t = this;
                    return new Promise(function(n, r) {
                        var o = function(i) {
                            var a = function(e) {
                                switch (!0) {
                                case e === !0 : return n();
                                case e === !1 : return r();
                                case e && "function" == typeof e.then: return e.then(a,
                                    function(e) {
                                        throw e
                                    });
                                default:
                                    o(i + 1)
                                }
                            };
                            i < t.length ? a(t[i](e)) : n()
                        };
                        o(0)
                    })
                },
                t.prototype.add = function(e, n, r) {
                    "function" == typeof e && this.push(function(o) {
                        if (t.check(n, o.request.method) && t.check(r, o.request.url)) return e(o)
                    })
                };
                var n = new t,
                r = new t,
                o = e;
                e = function(e, t) {
                    var i = new Request(e, t),
                    a = {
                        request: i,
                        response: null
                    };
                    return n.solve(a).then(function() {
                        return o(a.request).then(function(e) {
                            a.response = e
                        },
                        function(e) {
                            a.error = e
                        })
                    },
                    function() {
                        a.response || (a.response = new Response)
                    }).then(function() {
                        return r.solve(a)
                    }).then(function() {
                        if (a.response) return a.response;
                        throw a.error
                    },
                    function() {
                        return new Promise(function() {})
                    })
                },
                window.fetch && (window.fetch = e);
                var i = new
                function() {
                    var e = this;
                    this.when = function(e, t, o, i) {
                        n.add(o, e, t),
                        r.add(i, e, t)
                    },
                    void
                    function() {
                        for (var t = ["GET", "POST", "PUT", "DELETE", "PATCH", "HEAD"], n = 0; n < t.length; n++) void
                        function(t) {
                            e[t.toLowerCase()] = function() {
                                var n = Array.prototype.slice.call(arguments);
                                return e.when.apply(e, [t].concat(n))
                            }
                        } (t[n])
                    } ()
                };
                return e.FCeptor = i
            })
        })
    }),
    Y = function(e) {
        return {
            startTime: i(e.startTime),
            duration: i(e.duration),
            navigationStart: performance.timing.navigationStart,
            dnsTime: i(e.domainLookupEnd - e.domainLookupStart),
            tcpTime: i(e.connectEnd - e.connectStart),
            reqTime: i(e.responseStart - e.requestStart),
            resTime: i(e.responseEnd - e.responseStart)
        }
    },
    J = function(t) {
        var n = {
            solution: "ajax",
            network: u()
        };
        e(n, {
            solution: "timing"
        });
        var r = o(t.name),
        i = r.port,
        a = r.host,
        s = r.urlPath,
        c = {
            statusCode: 200,
            reqLength: void 0,
            respLength: void 0,
            httpMethod: "GET",
            url: t.name,
            host: a,
            port: i,
            urlPath: s,
            error: !1,
            errorDomain: void 0,
            errorDescription: void 0,
            elapsedTime: void 0
        };
        return e(n, c),
        n
    },
    W = function() {
        var t = performance.getEntries().filter(function(e) {
            return "script" === e.initiatorType || "css" === e.initiatorType
        }).map(function(t) {
            return e(J(t), Y(t))
        });
        l("networkBatched", t)
    },
    Q = function() {
        return null != window.performance && null != performance.now ? performance.now() : (new Date).valueOf()
    },
    K = function(e) {
        e._startedTime = Q();
        var t = r() + "|" + (new Date).valueOf();
        e._requestId = t;
        try {
            e.headers.push({
                header: "X-Eleme-RequestID",
                value: t
            })
        } catch(e) {}
    },
    Z = function(e) {
        var t = e.request;
        t._startedTime = Q();
        var n = r() + "|" + (new Date).valueOf();
        t._requestId = n;
        try {
            t.headers.append("X-Eleme-RequestID", n)
        } catch(e) {}
    },
    ee = function(t) {
        var n = {
            solution: "ajax",
            network: u()
        };
        if (e(n, t), null != window.performance && null != performance.getEntriesByName) {
            var r = performance.getEntriesByName(a(t.url)),
            o = r[r.length - 1];
            null != o && (e(n, Y(o)), e(n, {
                solution: "ajax timing"
            }))
        }
        l("network", n)
    },
    te = function(e) {
        if ("text" !== e.responseType && "" !== e.responseType) return "blob" === e.responseType ? e.response.size: -1;
        var t = e.responseText;
        try {
            var n = new Blob([t], {
                type: "plain/text"
            });
            return n.size
        } catch(e) {
            return "string" == typeof t ? t.length: 0
        }
    },
    ne = function(e, t) {
        var n = e.url,
        r = a(n),
        s = o(r),
        u = s.host,
        c = s.urlPath,
        f = s.port,
        l = t.status,
        d = !1; (0 === l || l >= 400) && (d = !0);
        var p;
        p = null != e._startedTime ? i(Q() - e._startedTime) : -1;
        var h = {
            statusCode: l,
            reqLength: n.length,
            respLength: te(t),
            httpMethod: e.method,
            url: r,
            host: u,
            port: f,
            urlPath: c,
            error: d,
            errorDomain: void 0,
            errorDescription: d ? t.responseText: void 0,
            requestId: e._requestId,
            elapsedTime: p
        };
        ee(h)
    },
    re = function(e) {
        var t, n = e.request,
        r = e.response,
        s = n.url,
        u = a(s),
        c = o(u),
        f = c.host,
        l = c.urlPath,
        d = c.port;
        if (t = n._startedTime ? i(Q() - n._startedTime) : -1, null == r) {
            var p = {
                statusCode: -1,
                reqLength: -1,
                respLength: -1,
                httpMethod: -1,
                url: u,
                host: f,
                port: d,
                urlPath: l,
                error: !0,
                errorDomain: void 0,
                errorDescription: "Fetch API failed with no response",
                requestId: n._requestId,
                elapsedTime: t
            };
            return void ee(p)
        }
        var h = r.status,
        v = !1; (0 === h || h >= 400) && (v = !0),
        r.clone().blob().then(function(e) {
            var o = {
                statusCode: h,
                reqLength: s.length,
                respLength: e.size,
                httpMethod: n.method,
                url: u,
                host: f,
                port: d,
                urlPath: l,
                error: v,
                errorDomain: void 0,
                errorDescription: v ? r.statusText: void 0,
                requestId: n._requestId,
                elapsedTime: t
            };
            ee(o)
        })
    },
    oe = {},
    ie = function(e) {
        return oe[e]
    },
    ae = function(e) {
        oe[e] = !0
    },
    se = function(e) {
        return !! e.match(/^http:/) || !(!e.match(/^\//) || "http:" !== location.protocol)
    },
    ue = function(e, t) {
        se(e) && (ie(e) || (l("http-warning", {
            method: t,
            url: e
        }), ae(e)))
    },
    ce = function(e) {
        ue(e.url, "xhr")
    },
    fe = function(e) {
        ue(e.request.url, "fetch")
    },
    le = "\n.perf-feedback-tip {\n  color: #324057;\n  position: fixed;\n  bottom: 16px;\n  left: 16px;\n  background-color: white;\n  border: 1px solid #dedede;\n  font-size: 12px;\n  padding: 8px 16px;\n  font-family: PingFang SC,Lantinghei SC,Helvetica Neue,Microsoft Yahei,Hiragino Sans GB,Microsoft Sans Serif,WenQuanYi Micro Hei,sans;\n  border-radius: 4px;\n  box-shadow: 1px 1px 2px rgba(0,0,0,0.1);\n  max-width: 200px;\n  min-width: 20px;\n  width: auto;\n  transition-duration: 400ms;\n}",
    de = "\n  <style>\n    " + le + '\n    .perf-feedback-guide {}\n    .perf-feedback-report {\n      text-decoration: none;\n      color: #1D8CE0;\n    }\n    .perf-feedback-close {\n      text-decoration: none;\n      color: #1D8CE0;\n    }\n  </style>\n  <span class="perf-feedback-guide">页面显示不正常?</span>\n  <a class="perf-feedback-report" href="#">反馈问题</a>\n  <a class="perf-feedback-close" href="#">关闭提示</a>\n',
    pe = "\n  <style>\n    " + le + '\n    .perf-feedback-success {\n      color: #8492A6;\n    }\n  </style>\n  <span class="perf-feedback-success">反馈已提交</span>\n',
    he = function() {
        for (var e = "",
        t = 0; t < 4; t++) e += "0000000".concat(Math.floor(2821109907456 * Math.random()).toString(36)).slice( - 8);
        return e
    },
    ve = function() {
        var e = new Date((new Date).getTime() + 288e5),
        t = he() + "_" + [e.getUTCFullYear(), e.getUTCMonth() + 1, e.getUTCDate()].join("-").replace(/\b\d\b/g, "0$&");
        return t
    },
    we = function(e, t) {
        return "perf_ssid=" + e + "; Expires=Wed, 31 Dec 2098 16:00:00 GMT; Domain=" + t + "; Path=/"
    };
    window.ElemePerfConfigs || (window.ElemePerfConfigs = {});
    var me = function() {
        for (var e in j) window.ElemePerfConfigs[e] || (window.ElemePerfConfigs[e] = j[e]);
        "web" !== window.ElemePerfConfigs.source && "web-sw" !== window.ElemePerfConfigs.source && (console.warn("[PERF] `source` field should be `web` or `web-sw`"), window.ElemePerfConfigs.source = "web")
    };
    if (null != document.addEventListener) {
        var ge = null != window.ElemePerfConfigs.sendingTypes;
        me(),
        window.perf = {
            send: l,
            sendEvent: p,
            sendRawEvent: h
        };
        var ye = window.ElemePerfConfigs.sendingTypes;
        ye.error && m(),
        ye.load && g(),
        ye.event && b(),
        ye.asset && k(),
        ye.http && _(),
        ye.http && S(),
        setTimeout(function() {
            R(window.ElemePerfConfigs.ensureVariables)
        },
        1e3),
        ge ? (ye.api && C(), d(ye)) : c(function(e, t) {
            var n = null == e ? t: ye;
            n.api && C(),
            d(n)
        }),
        window.ElemePerfConfigs.ssid = M()
    }
});