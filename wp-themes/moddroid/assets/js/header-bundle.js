"use strict";
var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
	return typeof e
} : function(e) {
	return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
};
! function(e) {
	"function" == typeof define && define.amd ? define(["jquery"], e) : "object" === ("undefined" == typeof module ? "undefined" : _typeof(module)) && module.exports ? module.exports = function(t, i) {
		return void 0 === i && (i = "undefined" != typeof window ? require("jquery") : require("jquery")(t)), e(i), i
	} : e(jQuery)
}(function(e) {
	return e.fn.tilt = function(t) {
		var i = function() {
				this.ticking || (requestAnimationFrame(h.bind(this)), this.ticking = !0)
			},
			s = function() {
				var t = this;
				e(this).on("mousemove", o), e(this).on("mouseenter", a), this.settings.reset && e(this).on("mouseleave", l), this.settings.glare && e(window).on("resize", c.bind(t))
			},
			n = function() {
				var t = this;
				void 0 !== this.timeout && clearTimeout(this.timeout), e(this).css({
					transition: this.settings.speed + "ms " + this.settings.easing
				}), this.settings.glare && this.glareElement.css({
					transition: "opacity " + this.settings.speed + "ms " + this.settings.easing
				}), this.timeout = setTimeout(function() {
					e(t).css({
						transition: ""
					}), t.settings.glare && t.glareElement.css({
						transition: ""
					})
				}, this.settings.speed)
			},
			a = function(t) {
				this.ticking = !1, e(this).css({
					"will-change": "transform"
				}), n.call(this), e(this).trigger("tilt.mouseEnter")
			},
			r = function(t) {
				return "undefined" == typeof t && (t = {
					pageX: e(this).offset().left + e(this).outerWidth() / 2,
					pageY: e(this).offset().top + e(this).outerHeight() / 2
				}), {
					x: t.pageX,
					y: t.pageY
				}
			},
			o = function(e) {
				this.mousePositions = r(e), i.call(this)
			},
			l = function() {
				n.call(this), this.reset = !0, i.call(this), e(this).trigger("tilt.mouseLeave")
			},
			d = function() {
				var t = e(this).outerWidth(),
					i = e(this).outerHeight(),
					s = e(this).offset().left,
					n = e(this).offset().top,
					a = (this.mousePositions.x - s) / t,
					r = (this.mousePositions.y - n) / i,
					o = (this.settings.maxTilt / 2 - a * this.settings.maxTilt).toFixed(2),
					l = (r * this.settings.maxTilt - this.settings.maxTilt / 2).toFixed(2),
					d = Math.atan2(this.mousePositions.x - (s + t / 2), -(this.mousePositions.y - (n + i / 2))) * (180 / Math.PI);
				return {
					tiltX: o,
					tiltY: l,
					percentageX: 100 * a,
					percentageY: 100 * r,
					angle: d
				}
			},
			h = function() {
				return this.transforms = d.call(this), this.reset ? (this.reset = !1, e(this).css("transform", "perspective(" + this.settings.perspective + "px) rotateX(0deg) rotateY(0deg)"), void(this.settings.glare && (this.glareElement.css("transform", "rotate(180deg) translate(-50%, -50%)"), this.glareElement.css("opacity", "0")))) : (e(this).css("transform", "perspective(" + this.settings.perspective + "px) rotateX(" + ("x" === this.settings.disableAxis ? 0 : this.transforms.tiltY) + "deg) rotateY(" + ("y" === this.settings.disableAxis ? 0 : this.transforms.tiltX) + "deg) scale3d(" + this.settings.scale + "," + this.settings.scale + "," + this.settings.scale + ")"), this.settings.glare && (this.glareElement.css("transform", "rotate(" + this.transforms.angle + "deg) translate(-50%, -50%)"), this.glareElement.css("opacity", "" + this.transforms.percentageY * this.settings.maxGlare / 100)), e(this).trigger("change", [this.transforms]), void(this.ticking = !1))
			},
			u = function() {
				var t = this.settings.glarePrerender;
				if(t || e(this).append('<div class="js-tilt-glare"><div class="js-tilt-glare-inner"></div></div>'), this.glareElementWrapper = e(this).find(".js-tilt-glare"), this.glareElement = e(this).find(".js-tilt-glare-inner"), !t) {
					var i = {
						position: "absolute",
						top: "0",
						left: "0",
						width: "100%",
						height: "100%"
					};
					this.glareElementWrapper.css(i).css({
						overflow: "hidden",
						"pointer-events": "none"
					}), this.glareElement.css({
						position: "absolute",
						top: "50%",
						left: "50%",
						"background-image": "linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)",
						width: "" + 2 * e(this).outerWidth(),
						height: "" + 2 * e(this).outerWidth(),
						transform: "rotate(180deg) translate(-50%, -50%)",
						"transform-origin": "0% 0%",
						opacity: "0"
					})
				}
			},
			c = function() {
				this.glareElement.css({
					width: "" + 2 * e(this).outerWidth(),
					height: "" + 2 * e(this).outerWidth()
				})
			};
		return e.fn.tilt.destroy = function() {
			e(this).each(function() {
				e(this).find(".js-tilt-glare").remove(), e(this).css({
					"will-change": "",
					transform: ""
				}), e(this).off("mousemove mouseenter mouseleave")
			})
		}, e.fn.tilt.getValues = function() {
			var t = [];
			return e(this).each(function() {
				this.mousePositions = r.call(this), t.push(d.call(this))
			}), t
		}, e.fn.tilt.reset = function() {
			e(this).each(function() {
				var t = this;
				this.mousePositions = r.call(this), this.settings = e(this).data("settings"), l.call(this), setTimeout(function() {
					t.reset = !1
				}, this.settings.transition)
			})
		}, this.each(function() {
			var i = this;
			this.settings = e.extend({
				maxTilt: e(this).is("[data-tilt-max]") ? e(this).data("tilt-max") : 20,
				perspective: e(this).is("[data-tilt-perspective]") ? e(this).data("tilt-perspective") : 300,
				easing: e(this).is("[data-tilt-easing]") ? e(this).data("tilt-easing") : "cubic-bezier(.03,.98,.52,.99)",
				scale: e(this).is("[data-tilt-scale]") ? e(this).data("tilt-scale") : "1",
				speed: e(this).is("[data-tilt-speed]") ? e(this).data("tilt-speed") : "400",
				transition: !e(this).is("[data-tilt-transition]") || e(this).data("tilt-transition"),
				disableAxis: e(this).is("[data-tilt-disable-axis]") ? e(this).data("tilt-disable-axis") : null,
				axis: e(this).is("[data-tilt-axis]") ? e(this).data("tilt-axis") : null,
				reset: !e(this).is("[data-tilt-reset]") || e(this).data("tilt-reset"),
				glare: !!e(this).is("[data-tilt-glare]") && e(this).data("tilt-glare"),
				maxGlare: e(this).is("[data-tilt-maxglare]") ? e(this).data("tilt-maxglare") : 1
			}, t), null !== this.settings.axis && (console.warn("Tilt.js: the axis setting has been renamed to disableAxis. See https://github.com/gijsroge/tilt.js/pull/26 for more information"), this.settings.disableAxis = this.settings.axis), this.init = function() {
				e(i).data("settings", i.settings), i.settings.glare && u.call(i), s.call(i)
			}, this.init()
		})
	}, e("[data-tilt]").tilt(), !0
}), ! function(e, t) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self).Swiper = t()
}(this, function() {
	function e(e, t) {
		for(var i = 0; i < t.length; i++) {
			var s = t[i];
			s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
		}
	}

	function t() {
		return(t = Object.assign || function(e) {
			for(var t = 1; t < arguments.length; t++) {
				var i = arguments[t];
				for(var s in i) Object.prototype.hasOwnProperty.call(i, s) && (e[s] = i[s])
			}
			return e
		}).apply(this, arguments)
	}

	function i(e) {
		return null !== e && "object" == typeof e && "constructor" in e && e.constructor === Object
	}

	function s(e, t) {
		void 0 === e && (e = {}), void 0 === t && (t = {}), Object.keys(t).forEach(function(n) {
			void 0 === e[n] ? e[n] = t[n] : i(t[n]) && i(e[n]) && Object.keys(t[n]).length > 0 && s(e[n], t[n])
		})
	}

	function n() {
		var e = "undefined" != typeof document ? document : {};
		return s(e, I), e
	}

	function a() {
		var e = "undefined" != typeof window ? window : {};
		return s(e, A), e
	}

	function r(e) {
		return(r = Object.setPrototypeOf ? Object.getPrototypeOf : function(e) {
			return e.__proto__ || Object.getPrototypeOf(e)
		})(e)
	}

	function o(e, t) {
		return(o = Object.setPrototypeOf || function(e, t) {
			return e.__proto__ = t, e
		})(e, t)
	}

	function l() {
		if("undefined" == typeof Reflect || !Reflect.construct) return !1;
		if(Reflect.construct.sham) return !1;
		if("function" == typeof Proxy) return !0;
		try {
			return Date.prototype.toString.call(Reflect.construct(Date, [], function() {})), !0
		} catch(e) {
			return !1
		}
	}

	function d(e, t, i) {
		return(d = l() ? Reflect.construct : function(e, t, i) {
			var s = [null];
			s.push.apply(s, t);
			var n = new(Function.bind.apply(e, s));
			return i && o(n, i.prototype), n
		}).apply(null, arguments)
	}

	function h(e) {
		var t = "function" == typeof Map ? new Map : void 0;
		return(h = function(e) {
			function i() {
				return d(e, arguments, r(this).constructor)
			}
			if(null === e || (s = e, -1 === Function.toString.call(s).indexOf("[native code]"))) return e;
			var s;
			if("function" != typeof e) throw new TypeError("Super expression must either be null or a function");
			if(void 0 !== t) {
				if(t.has(e)) return t.get(e);
				t.set(e, i)
			}
			return i.prototype = Object.create(e.prototype, {
				constructor: {
					value: i,
					enumerable: !1,
					writable: !0,
					configurable: !0
				}
			}), o(i, e)
		})(e)
	}

	function u(e) {
		void 0 === e && (e = []);
		var t = [];
		return e.forEach(function(e) {
			Array.isArray(e) ? t.push.apply(t, u(e)) : t.push(e)
		}), t
	}

	function c(e, t) {
		return Array.prototype.filter.call(e, t)
	}

	function p(e, t) {
		var i = a(),
			s = n(),
			r = [];
		if(!t && e instanceof L) return e;
		if(!e) return new L(r);
		if("string" == typeof e) {
			var o = e.trim();
			if(o.indexOf("<") >= 0 && o.indexOf(">") >= 0) {
				var l = "div";
				0 === o.indexOf("<li") && (l = "ul"), 0 === o.indexOf("<tr") && (l = "tbody"), 0 !== o.indexOf("<td") && 0 !== o.indexOf("<th") || (l = "tr"), 0 === o.indexOf("<tbody") && (l = "table"), 0 === o.indexOf("<option") && (l = "select");
				var d = s.createElement(l);
				d.innerHTML = o;
				for(var h = 0; h < d.childNodes.length; h += 1) r.push(d.childNodes[h])
			} else r = function(e, t) {
				if("string" != typeof e) return [e];
				for(var i = [], s = t.querySelectorAll(e), n = 0; n < s.length; n += 1) i.push(s[n]);
				return i
			}(e.trim(), t || s)
		} else if(e.nodeType || e === i || e === s) r.push(e);
		else if(Array.isArray(e)) {
			if(e instanceof L) return e;
			r = e
		}
		return new L(function(e) {
			for(var t = [], i = 0; i < e.length; i += 1) - 1 === t.indexOf(e[i]) && t.push(e[i]);
			return t
		}(r))
	}

	function f(e, t) {
		return void 0 === t && (t = 0), setTimeout(e, t)
	}

	function m() {
		return Date.now()
	}

	function v(e, t) {
		void 0 === t && (t = "x");
		var i, s, n, r = a(),
			o = r.getComputedStyle(e, null);
		return r.WebKitCSSMatrix ? ((s = o.transform || o.webkitTransform).split(",").length > 6 && (s = s.split(", ").map(function(e) {
			return e.replace(",", ".")
		}).join(", ")), n = new r.WebKitCSSMatrix("none" === s ? "" : s)) : i = (n = o.MozTransform || o.OTransform || o.MsTransform || o.msTransform || o.transform || o.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,")).toString().split(","), "x" === t && (s = r.WebKitCSSMatrix ? n.m41 : 16 === i.length ? parseFloat(i[12]) : parseFloat(i[4])), "y" === t && (s = r.WebKitCSSMatrix ? n.m42 : 16 === i.length ? parseFloat(i[13]) : parseFloat(i[5])), s || 0
	}

	function g(e) {
		return "object" == typeof e && null !== e && e.constructor && e.constructor === Object
	}

	function b() {
		for(var e = Object(arguments.length <= 0 ? void 0 : arguments[0]), t = 1; t < arguments.length; t += 1) {
			var i = 0 > t || arguments.length <= t ? void 0 : arguments[t];
			if(null != i)
				for(var s = Object.keys(Object(i)), n = 0, a = s.length; a > n; n += 1) {
					var r = s[n],
						o = Object.getOwnPropertyDescriptor(i, r);
					void 0 !== o && o.enumerable && (g(e[r]) && g(i[r]) ? b(e[r], i[r]) : !g(e[r]) && g(i[r]) ? (e[r] = {}, b(e[r], i[r])) : e[r] = i[r])
				}
		}
		return e
	}

	function y(e, t) {
		Object.keys(t).forEach(function(i) {
			g(t[i]) && Object.keys(t[i]).forEach(function(s) {
				"function" == typeof t[i][s] && (t[i][s] = t[i][s].bind(e))
			}), e[i] = t[i]
		})
	}

	function w() {
		return O || (O = function() {
			var e = a(),
				t = n();
			return {
				touch: !!("ontouchstart" in e || e.DocumentTouch && t instanceof e.DocumentTouch),
				pointerEvents: !!e.PointerEvent && "maxTouchPoints" in e.navigator && e.navigator.maxTouchPoints >= 0,
				observer: "MutationObserver" in e || "WebkitMutationObserver" in e,
				passiveListener: function() {
					var e = !1;
					try {
						var t = Object.defineProperty({}, "passive", {
							get: function() {
								e = !0
							}
						});
						i.addEventListener("testPassiveListener", null, t)
					} catch(i) {}
					return e
				}(),
				gestures: "ongesturestart" in e
			}
		}()), O
	}

	function x(e) {
		return void 0 === e && (e = {}), $ || ($ = function(e) {
			var t = (void 0 === e ? {} : e).userAgent,
				i = w(),
				s = a(),
				n = s.navigator.platform,
				r = t || s.navigator.userAgent,
				o = {
					ios: !1,
					android: !1
				},
				l = s.screen.width,
				d = s.screen.height,
				h = r.match(/(Android);?[\s\/]+([\d.]+)?/),
				u = r.match(/(iPad).*OS\s([\d_]+)/),
				c = r.match(/(iPod)(.*OS\s([\d_]+))?/),
				p = !u && r.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
				f = "Win32" === n,
				m = "MacIntel" === n;
			return !u && m && i.touch && ["1024x1366", "1366x1024", "834x1194", "1194x834", "834x1112", "1112x834", "768x1024", "1024x768"].indexOf(l + "x" + d) >= 0 && ((u = r.match(/(Version)\/([\d.]+)/)) || (u = [0, 1, "13_0_0"]), m = !1), h && !f && (o.os = "android", o.android = !0), (u || p || c) && (o.os = "ios", o.ios = !0), o
		}(e)), $
	}

	function C() {
		return D || (D = function() {
			var e, t = a();
			return {
				isEdge: !!t.navigator.userAgent.match(/Edge/g),
				isSafari: (e = t.navigator.userAgent.toLowerCase(), e.indexOf("safari") >= 0 && e.indexOf("chrome") < 0 && e.indexOf("android") < 0),
				isWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(t.navigator.userAgent)
			}
		}()), D
	}

	function E(e) {
		var t = n(),
			i = a(),
			s = this.touchEventsData,
			r = this.params,
			o = this.touches;
		if(!this.animating || !r.preventInteractionOnTransition) {
			var l = e;
			l.originalEvent && (l = l.originalEvent);
			var d = p(l.target);
			if(("wrapper" !== r.touchEventsTarget || d.closest(this.wrapperEl).length) && (s.isTouchEvent = "touchstart" === l.type, (s.isTouchEvent || !("which" in l) || 3 !== l.which) && !(!s.isTouchEvent && "button" in l && l.button > 0 || s.isTouched && s.isMoved)))
				if(r.noSwiping && d.closest(r.noSwipingSelector ? r.noSwipingSelector : "." + r.noSwipingClass)[0]) this.allowClick = !0;
				else if(!r.swipeHandler || d.closest(r.swipeHandler)[0]) {
				o.currentX = "touchstart" === l.type ? l.targetTouches[0].pageX : l.pageX, o.currentY = "touchstart" === l.type ? l.targetTouches[0].pageY : l.pageY;
				var h = o.currentX,
					u = o.currentY,
					c = r.edgeSwipeDetection || r.iOSEdgeSwipeDetection,
					f = r.edgeSwipeThreshold || r.iOSEdgeSwipeThreshold;
				if(!c || !(f >= h || h >= i.screen.width - f)) {
					if(b(s, {
							isTouched: !0,
							isMoved: !1,
							allowTouchCallbacks: !0,
							isScrolling: void 0,
							startMoving: void 0
						}), o.startX = h, o.startY = u, s.touchStartTime = m(), this.allowClick = !0, this.updateSize(), this.swipeDirection = void 0, r.threshold > 0 && (s.allowThresholdMove = !1), "touchstart" !== l.type) {
						var v = !0;
						d.is(s.formElements) && (v = !1), t.activeElement && p(t.activeElement).is(s.formElements) && t.activeElement !== d[0] && t.activeElement.blur();
						var g = v && this.allowTouchMove && r.touchStartPreventDefault;
						(r.touchStartForcePreventDefault || g) && l.preventDefault()
					}
					this.emit("touchStart", l)
				}
			}
		}
	}

	function T(e) {
		var t = n(),
			i = this.touchEventsData,
			s = this.params,
			a = this.touches,
			r = this.rtlTranslate,
			o = e;
		if(o.originalEvent && (o = o.originalEvent), i.isTouched) {
			if(!i.isTouchEvent || "touchmove" === o.type) {
				var l = "touchmove" === o.type && o.targetTouches && (o.targetTouches[0] || o.changedTouches[0]),
					d = "touchmove" === o.type ? l.pageX : o.pageX,
					h = "touchmove" === o.type ? l.pageY : o.pageY;
				if(o.preventedByNestedSwiper) return a.startX = d, void(a.startY = h);
				if(!this.allowTouchMove) return this.allowClick = !1, void(i.isTouched && (b(a, {
					startX: d,
					startY: h,
					currentX: d,
					currentY: h
				}), i.touchStartTime = m()));
				if(i.isTouchEvent && s.touchReleaseOnEdges && !s.loop)
					if(this.isVertical()) {
						if(h < a.startY && this.translate <= this.maxTranslate() || h > a.startY && this.translate >= this.minTranslate()) return i.isTouched = !1, void(i.isMoved = !1)
					} else if(d < a.startX && this.translate <= this.maxTranslate() || d > a.startX && this.translate >= this.minTranslate()) return;
				if(i.isTouchEvent && t.activeElement && o.target === t.activeElement && p(o.target).is(i.formElements)) return i.isMoved = !0, void(this.allowClick = !1);
				if(i.allowTouchCallbacks && this.emit("touchMove", o), !(o.targetTouches && o.targetTouches.length > 1)) {
					a.currentX = d, a.currentY = h;
					var u = a.currentX - a.startX,
						c = a.currentY - a.startY;
					if(!(this.params.threshold && Math.sqrt(Math.pow(u, 2) + Math.pow(c, 2)) < this.params.threshold)) {
						var f;
						if(void 0 === i.isScrolling && (this.isHorizontal() && a.currentY === a.startY || this.isVertical() && a.currentX === a.startX ? i.isScrolling = !1 : u * u + c * c >= 25 && (f = 180 * Math.atan2(Math.abs(c), Math.abs(u)) / Math.PI, i.isScrolling = this.isHorizontal() ? f > s.touchAngle : 90 - f > s.touchAngle)), i.isScrolling && this.emit("touchMoveOpposite", o), void 0 === i.startMoving && (a.currentX === a.startX && a.currentY === a.startY || (i.startMoving = !0)), i.isScrolling) i.isTouched = !1;
						else if(i.startMoving) {
							this.allowClick = !1, !s.cssMode && o.cancelable && o.preventDefault(), s.touchMoveStopPropagation && !s.nested && o.stopPropagation(), i.isMoved || (s.loop && this.loopFix(), i.startTranslate = this.getTranslate(), this.setTransition(0), this.animating && this.$wrapperEl.trigger("webkitTransitionEnd transitionend"), i.allowMomentumBounce = !1, !s.grabCursor || !0 !== this.allowSlideNext && !0 !== this.allowSlidePrev || this.setGrabCursor(!0), this.emit("sliderFirstMove", o)), this.emit("sliderMove", o), i.isMoved = !0;
							var v = this.isHorizontal() ? u : c;
							a.diff = v, v *= s.touchRatio, r && (v = -v), this.swipeDirection = v > 0 ? "prev" : "next", i.currentTranslate = v + i.startTranslate;
							var g = !0,
								y = s.resistanceRatio;
							if(s.touchReleaseOnEdges && (y = 0), v > 0 && i.currentTranslate > this.minTranslate() ? (g = !1, s.resistance && (i.currentTranslate = this.minTranslate() - 1 + Math.pow(-this.minTranslate() + i.startTranslate + v, y))) : 0 > v && i.currentTranslate < this.maxTranslate() && (g = !1, s.resistance && (i.currentTranslate = this.maxTranslate() + 1 - Math.pow(this.maxTranslate() - i.startTranslate - v, y))), g && (o.preventedByNestedSwiper = !0), !this.allowSlideNext && "next" === this.swipeDirection && i.currentTranslate < i.startTranslate && (i.currentTranslate = i.startTranslate), !this.allowSlidePrev && "prev" === this.swipeDirection && i.currentTranslate > i.startTranslate && (i.currentTranslate = i.startTranslate), s.threshold > 0) {
								if(!(Math.abs(v) > s.threshold || i.allowThresholdMove)) return void(i.currentTranslate = i.startTranslate);
								if(!i.allowThresholdMove) return i.allowThresholdMove = !0, a.startX = a.currentX, a.startY = a.currentY, i.currentTranslate = i.startTranslate, void(a.diff = this.isHorizontal() ? a.currentX - a.startX : a.currentY - a.startY)
							}
							s.followFinger && !s.cssMode && ((s.freeMode || s.watchSlidesProgress || s.watchSlidesVisibility) && (this.updateActiveIndex(), this.updateSlidesClasses()), s.freeMode && (0 === i.velocities.length && i.velocities.push({
								position: a[this.isHorizontal() ? "startX" : "startY"],
								time: i.touchStartTime
							}), i.velocities.push({
								position: a[this.isHorizontal() ? "currentX" : "currentY"],
								time: m()
							})), this.updateProgress(i.currentTranslate), this.setTranslate(i.currentTranslate))
						}
					}
				}
			}
		} else i.startMoving && i.isScrolling && this.emit("touchMoveOpposite", o)
	}

	function S(e) {
		var t = this,
			i = t.touchEventsData,
			s = t.params,
			n = t.touches,
			a = t.rtlTranslate,
			r = t.$wrapperEl,
			o = t.slidesGrid,
			l = t.snapGrid,
			d = e;
		if(d.originalEvent && (d = d.originalEvent), i.allowTouchCallbacks && t.emit("touchEnd", d), i.allowTouchCallbacks = !1, !i.isTouched) return i.isMoved && s.grabCursor && t.setGrabCursor(!1), i.isMoved = !1, void(i.startMoving = !1);
		s.grabCursor && i.isMoved && i.isTouched && (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) && t.setGrabCursor(!1);
		var h, u = m(),
			c = u - i.touchStartTime;
		if(t.allowClick && (t.updateClickedSlide(d), t.emit("tap click", d), 300 > c && u - i.lastClickTime < 300 && t.emit("doubleTap doubleClick", d)), i.lastClickTime = m(), f(function() {
				t.destroyed || (t.allowClick = !0)
			}), !i.isTouched || !i.isMoved || !t.swipeDirection || 0 === n.diff || i.currentTranslate === i.startTranslate) return i.isTouched = !1, i.isMoved = !1, void(i.startMoving = !1);
		if(i.isTouched = !1, i.isMoved = !1, i.startMoving = !1, h = s.followFinger ? a ? t.translate : -t.translate : -i.currentTranslate, !s.cssMode)
			if(s.freeMode) {
				if(h < -t.minTranslate()) return void t.slideTo(t.activeIndex);
				if(h > -t.maxTranslate()) return void(t.slides.length < l.length ? t.slideTo(l.length - 1) : t.slideTo(t.slides.length - 1));
				if(s.freeModeMomentum) {
					if(i.velocities.length > 1) {
						var p = i.velocities.pop(),
							v = i.velocities.pop(),
							g = p.position - v.position,
							b = p.time - v.time;
						t.velocity = g / b, t.velocity /= 2, Math.abs(t.velocity) < s.freeModeMinimumVelocity && (t.velocity = 0), (b > 150 || m() - p.time > 300) && (t.velocity = 0)
					} else t.velocity = 0;
					t.velocity *= s.freeModeMomentumVelocityRatio, i.velocities.length = 0;
					var y = 1e3 * s.freeModeMomentumRatio,
						w = t.velocity * y,
						x = t.translate + w;
					a && (x = -x);
					var C, E, T = !1,
						S = 20 * Math.abs(t.velocity) * s.freeModeMomentumBounceRatio;
					if(x < t.maxTranslate()) s.freeModeMomentumBounce ? (x + t.maxTranslate() < -S && (x = t.maxTranslate() - S), C = t.maxTranslate(), T = !0, i.allowMomentumBounce = !0) : x = t.maxTranslate(), s.loop && s.centeredSlides && (E = !0);
					else if(x > t.minTranslate()) s.freeModeMomentumBounce ? (x - t.minTranslate() > S && (x = t.minTranslate() + S), C = t.minTranslate(), T = !0, i.allowMomentumBounce = !0) : x = t.minTranslate(), s.loop && s.centeredSlides && (E = !0);
					else if(s.freeModeSticky) {
						for(var k, M = 0; M < l.length; M += 1)
							if(l[M] > -x) {
								k = M;
								break
							}
						x = -(x = Math.abs(l[k] - x) < Math.abs(l[k - 1] - x) || "next" === t.swipeDirection ? l[k] : l[k - 1])
					}
					if(E && t.once("transitionEnd", function() {
							t.loopFix()
						}), 0 !== t.velocity) {
						if(y = a ? Math.abs((-x - t.translate) / t.velocity) : Math.abs((x - t.translate) / t.velocity), s.freeModeSticky) {
							var P = Math.abs((a ? -x : x) - t.translate),
								z = t.slidesSizesGrid[t.activeIndex];
							y = z > P ? s.speed : 2 * z > P ? 1.5 * s.speed : 2.5 * s.speed
						}
					} else if(s.freeModeSticky) return void t.slideToClosest();
					s.freeModeMomentumBounce && T ? (t.updateProgress(C), t.setTransition(y), t.setTranslate(x), t.transitionStart(!0, t.swipeDirection), t.animating = !0, r.transitionEnd(function() {
						t && !t.destroyed && i.allowMomentumBounce && (t.emit("momentumBounce"), t.setTransition(s.speed), setTimeout(function() {
							t.setTranslate(C), r.transitionEnd(function() {
								t && !t.destroyed && t.transitionEnd()
							})
						}, 0))
					})) : t.velocity ? (t.updateProgress(x), t.setTransition(y), t.setTranslate(x), t.transitionStart(!0, t.swipeDirection), t.animating || (t.animating = !0, r.transitionEnd(function() {
						t && !t.destroyed && t.transitionEnd()
					}))) : t.updateProgress(x), t.updateActiveIndex(), t.updateSlidesClasses()
				} else if(s.freeModeSticky) return void t.slideToClosest();
				(!s.freeModeMomentum || c >= s.longSwipesMs) && (t.updateProgress(), t.updateActiveIndex(), t.updateSlidesClasses())
			} else {
				for(var I = 0, A = t.slidesSizesGrid[0], L = 0; L < o.length; L += L < s.slidesPerGroupSkip ? 1 : s.slidesPerGroup) {
					var O = L < s.slidesPerGroupSkip - 1 ? 1 : s.slidesPerGroup;
					void 0 !== o[L + O] ? h >= o[L] && h < o[L + O] && (I = L, A = o[L + O] - o[L]) : h >= o[L] && (I = L, A = o[o.length - 1] - o[o.length - 2])
				}
				var $ = (h - o[I]) / A,
					D = I < s.slidesPerGroupSkip - 1 ? 1 : s.slidesPerGroup;
				if(c > s.longSwipesMs) {
					if(!s.longSwipes) return void t.slideTo(t.activeIndex);
					"next" === t.swipeDirection && ($ >= s.longSwipesRatio ? t.slideTo(I + D) : t.slideTo(I)), "prev" === t.swipeDirection && ($ > 1 - s.longSwipesRatio ? t.slideTo(I + D) : t.slideTo(I))
				} else {
					if(!s.shortSwipes) return void t.slideTo(t.activeIndex);
					!t.navigation || d.target !== t.navigation.nextEl && d.target !== t.navigation.prevEl ? ("next" === t.swipeDirection && t.slideTo(I + D), "prev" === t.swipeDirection && t.slideTo(I)) : d.target === t.navigation.nextEl ? t.slideTo(I + D) : t.slideTo(I)
				}
			}
	}

	function k() {
		var e = this.params,
			t = this.el;
		if(!t || 0 !== t.offsetWidth) {
			e.breakpoints && this.setBreakpoint();
			var i = this.allowSlideNext,
				s = this.allowSlidePrev,
				n = this.snapGrid;
			this.allowSlideNext = !0, this.allowSlidePrev = !0, this.updateSize(), this.updateSlides(), this.updateSlidesClasses(), ("auto" === e.slidesPerView || e.slidesPerView > 1) && this.isEnd && !this.isBeginning && !this.params.centeredSlides ? this.slideTo(this.slides.length - 1, 0, !1, !0) : this.slideTo(this.activeIndex, 0, !1, !0), this.autoplay && this.autoplay.running && this.autoplay.paused && this.autoplay.run(), this.allowSlidePrev = s, this.allowSlideNext = i, this.params.watchOverflow && n !== this.snapGrid && this.checkOverflow()
		}
	}

	function M(e) {
		this.allowClick || (this.params.preventClicks && e.preventDefault(), this.params.preventClicksPropagation && this.animating && (e.stopPropagation(), e.stopImmediatePropagation()))
	}

	function P() {
		var e = this.wrapperEl,
			t = this.rtlTranslate;
		this.previousTranslate = this.translate, this.isHorizontal() ? this.translate = t ? e.scrollWidth - e.offsetWidth - e.scrollLeft : -e.scrollLeft : this.translate = -e.scrollTop, -0 === this.translate && (this.translate = 0), this.updateActiveIndex(), this.updateSlidesClasses();
		var i = this.maxTranslate() - this.minTranslate();
		(0 === i ? 0 : (this.translate - this.minTranslate()) / i) !== this.progress && this.updateProgress(t ? -this.translate : this.translate), this.emit("setTranslate", this.translate, !1)
	}

	function z() {}
	var I = {
			body: {},
			addEventListener: function() {},
			removeEventListener: function() {},
			activeElement: {
				blur: function() {},
				nodeName: ""
			},
			querySelector: function() {
				return null
			},
			querySelectorAll: function() {
				return []
			},
			getElementById: function() {
				return null
			},
			createEvent: function() {
				return {
					initEvent: function() {}
				}
			},
			createElement: function() {
				return {
					children: [],
					childNodes: [],
					style: {},
					setAttribute: function() {},
					getElementsByTagName: function() {
						return []
					}
				}
			},
			createElementNS: function() {
				return {}
			},
			importNode: function() {
				return null
			},
			location: {
				hash: "",
				host: "",
				hostname: "",
				href: "",
				origin: "",
				pathname: "",
				protocol: "",
				search: ""
			}
		},
		A = {
			document: I,
			navigator: {
				userAgent: ""
			},
			location: {
				hash: "",
				host: "",
				hostname: "",
				href: "",
				origin: "",
				pathname: "",
				protocol: "",
				search: ""
			},
			history: {
				replaceState: function() {},
				pushState: function() {},
				go: function() {},
				back: function() {}
			},
			CustomEvent: function() {
				return this
			},
			addEventListener: function() {},
			removeEventListener: function() {},
			getComputedStyle: function() {
				return {
					getPropertyValue: function() {
						return ""
					}
				}
			},
			Image: function() {},
			Date: function() {},
			screen: {},
			setTimeout: function() {},
			clearTimeout: function() {},
			matchMedia: function() {
				return {}
			},
			requestAnimationFrame: function(e) {
				return "undefined" == typeof setTimeout ? (e(), null) : setTimeout(e, 0)
			},
			cancelAnimationFrame: function(e) {
				"undefined" != typeof setTimeout && clearTimeout(e)
			}
		},
		L = function(e) {
			function t(t) {
				var i, s, n;
				return i = e.call.apply(e, [this].concat(t)) || this, s = function(e) {
					if(void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
					return e
				}(i), n = s.__proto__, Object.defineProperty(s, "__proto__", {
					get: function() {
						return n
					},
					set: function(e) {
						n.__proto__ = e
					}
				}), i
			}
			var i, s;
			return s = e, (i = t).prototype = Object.create(s.prototype), i.prototype.constructor = i, i.__proto__ = s, t
		}(h(Array));
	p.fn = L.prototype;
	var O, $, D, B = {
		addClass: function() {
			for(var e = arguments.length, t = new Array(e), i = 0; e > i; i++) t[i] = arguments[i];
			var s = u(t.map(function(e) {
				return e.split(" ")
			}));
			return this.forEach(function(e) {
				var t;
				(t = e.classList).add.apply(t, s)
			}), this
		},
		removeClass: function() {
			for(var e = arguments.length, t = new Array(e), i = 0; e > i; i++) t[i] = arguments[i];
			var s = u(t.map(function(e) {
				return e.split(" ")
			}));
			return this.forEach(function(e) {
				var t;
				(t = e.classList).remove.apply(t, s)
			}), this
		},
		hasClass: function() {
			for(var e = arguments.length, t = new Array(e), i = 0; e > i; i++) t[i] = arguments[i];
			var s = u(t.map(function(e) {
				return e.split(" ")
			}));
			return c(this, function(e) {
				return s.filter(function(t) {
					return e.classList.contains(t)
				}).length > 0
			}).length > 0
		},
		toggleClass: function() {
			for(var e = arguments.length, t = new Array(e), i = 0; e > i; i++) t[i] = arguments[i];
			var s = u(t.map(function(e) {
				return e.split(" ")
			}));
			this.forEach(function(e) {
				s.forEach(function(t) {
					e.classList.toggle(t)
				})
			})
		},
		attr: function(e, t) {
			if(1 === arguments.length && "string" == typeof e) return this[0] ? this[0].getAttribute(e) : void 0;
			for(var i = 0; i < this.length; i += 1)
				if(2 === arguments.length) this[i].setAttribute(e, t);
				else
					for(var s in e) this[i][s] = e[s], this[i].setAttribute(s, e[s]);
			return this
		},
		removeAttr: function(e) {
			for(var t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
			return this
		},
		transform: function(e) {
			for(var t = 0; t < this.length; t += 1) this[t].style.transform = e;
			return this
		},
		transition: function(e) {
			for(var t = 0; t < this.length; t += 1) this[t].style.transition = "string" != typeof e ? e + "ms" : e;
			return this
		},
		on: function() {
			function e(e) {
				var t = e.target;
				if(t) {
					var i = e.target.dom7EventData || [];
					if(i.indexOf(e) < 0 && i.unshift(e), p(t).is(r)) o.apply(t, i);
					else
						for(var s = p(t).parents(), n = 0; n < s.length; n += 1) p(s[n]).is(r) && o.apply(s[n], i)
				}
			}

			function t(e) {
				var t = e && e.target && e.target.dom7EventData || [];
				t.indexOf(e) < 0 && t.unshift(e), o.apply(this, t)
			}
			for(var i = arguments.length, s = new Array(i), n = 0; i > n; n++) s[n] = arguments[n];
			var a = s[0],
				r = s[1],
				o = s[2],
				l = s[3];
			"function" == typeof s[1] && (a = s[0], o = s[1], l = s[2], r = void 0), l || (l = !1);
			for(var d, h = a.split(" "), u = 0; u < this.length; u += 1) {
				var c = this[u];
				if(r)
					for(d = 0; d < h.length; d += 1) {
						var f = h[d];
						c.dom7LiveListeners || (c.dom7LiveListeners = {}), c.dom7LiveListeners[f] || (c.dom7LiveListeners[f] = []), c.dom7LiveListeners[f].push({
							listener: o,
							proxyListener: e
						}), c.addEventListener(f, e, l)
					} else
						for(d = 0; d < h.length; d += 1) {
							var m = h[d];
							c.dom7Listeners || (c.dom7Listeners = {}), c.dom7Listeners[m] || (c.dom7Listeners[m] = []), c.dom7Listeners[m].push({
								listener: o,
								proxyListener: t
							}), c.addEventListener(m, t, l)
						}
			}
			return this
		},
		off: function() {
			for(var e = arguments.length, t = new Array(e), i = 0; e > i; i++) t[i] = arguments[i];
			var s = t[0],
				n = t[1],
				a = t[2],
				r = t[3];
			"function" == typeof t[1] && (s = t[0], a = t[1], r = t[2], n = void 0), r || (r = !1);
			for(var o = s.split(" "), l = 0; l < o.length; l += 1)
				for(var d = o[l], h = 0; h < this.length; h += 1) {
					var u = this[h],
						c = void 0;
					if(!n && u.dom7Listeners ? c = u.dom7Listeners[d] : n && u.dom7LiveListeners && (c = u.dom7LiveListeners[d]), c && c.length)
						for(var p = c.length - 1; p >= 0; p -= 1) {
							var f = c[p];
							a && f.listener === a || a && f.listener && f.listener.dom7proxy && f.listener.dom7proxy === a ? (u.removeEventListener(d, f.proxyListener, r), c.splice(p, 1)) : a || (u.removeEventListener(d, f.proxyListener, r), c.splice(p, 1))
						}
				}
			return this
		},
		trigger: function() {
			for(var e = a(), t = arguments.length, i = new Array(t), s = 0; t > s; s++) i[s] = arguments[s];
			for(var n = i[0].split(" "), r = i[1], o = 0; o < n.length; o += 1)
				for(var l = n[o], d = 0; d < this.length; d += 1) {
					var h = this[d];
					if(e.CustomEvent) {
						var u = new e.CustomEvent(l, {
							detail: r,
							bubbles: !0,
							cancelable: !0
						});
						h.dom7EventData = i.filter(function(e, t) {
							return t > 0
						}), h.dispatchEvent(u), h.dom7EventData = [], delete h.dom7EventData
					}
				}
			return this
		},
		transitionEnd: function(e) {
			var t = this;
			return e && t.on("transitionend", function i(s) {
				s.target === this && (e.call(this, s), t.off("transitionend", i))
			}), this
		},
		outerWidth: function(e) {
			if(this.length > 0) {
				if(e) {
					var t = this.styles();
					return this[0].offsetWidth + parseFloat(t.getPropertyValue("margin-right")) + parseFloat(t.getPropertyValue("margin-left"))
				}
				return this[0].offsetWidth
			}
			return null
		},
		outerHeight: function(e) {
			if(this.length > 0) {
				if(e) {
					var t = this.styles();
					return this[0].offsetHeight + parseFloat(t.getPropertyValue("margin-top")) + parseFloat(t.getPropertyValue("margin-bottom"))
				}
				return this[0].offsetHeight
			}
			return null
		},
		styles: function() {
			var e = a();
			return this[0] ? e.getComputedStyle(this[0], null) : {}
		},
		offset: function() {
			if(this.length > 0) {
				var e = a(),
					t = n(),
					i = this[0],
					s = i.getBoundingClientRect(),
					r = t.body,
					o = i.clientTop || r.clientTop || 0,
					l = i.clientLeft || r.clientLeft || 0,
					d = i === e ? e.scrollY : i.scrollTop,
					h = i === e ? e.scrollX : i.scrollLeft;
				return {
					top: s.top + d - o,
					left: s.left + h - l
				}
			}
			return null
		},
		css: function(e, t) {
			var i, s = a();
			if(1 === arguments.length) {
				if("string" != typeof e) {
					for(i = 0; i < this.length; i += 1)
						for(var n in e) this[i].style[n] = e[n];
					return this
				}
				if(this[0]) return s.getComputedStyle(this[0], null).getPropertyValue(e)
			}
			if(2 === arguments.length && "string" == typeof e) {
				for(i = 0; i < this.length; i += 1) this[i].style[e] = t;
				return this
			}
			return this
		},
		each: function(e) {
			return e ? (this.forEach(function(t, i) {
				e.apply(t, [t, i])
			}), this) : this
		},
		html: function(e) {
			if(void 0 === e) return this[0] ? this[0].innerHTML : null;
			for(var t = 0; t < this.length; t += 1) this[t].innerHTML = e;
			return this
		},
		text: function(e) {
			if(void 0 === e) return this[0] ? this[0].textContent.trim() : null;
			for(var t = 0; t < this.length; t += 1) this[t].textContent = e;
			return this
		},
		is: function(e) {
			var t, i, s = a(),
				r = n(),
				o = this[0];
			if(!o || void 0 === e) return !1;
			if("string" == typeof e) {
				if(o.matches) return o.matches(e);
				if(o.webkitMatchesSelector) return o.webkitMatchesSelector(e);
				if(o.msMatchesSelector) return o.msMatchesSelector(e);
				for(t = p(e), i = 0; i < t.length; i += 1)
					if(t[i] === o) return !0;
				return !1
			}
			if(e === r) return o === r;
			if(e === s) return o === s;
			if(e.nodeType || e instanceof L) {
				for(t = e.nodeType ? [e] : e, i = 0; i < t.length; i += 1)
					if(t[i] === o) return !0;
				return !1
			}
			return !1
		},
		index: function() {
			var e, t = this[0];
			if(t) {
				for(e = 0; null !== (t = t.previousSibling);) 1 === t.nodeType && (e += 1);
				return e
			}
		},
		eq: function(e) {
			if(void 0 === e) return this;
			var t = this.length;
			if(e > t - 1) return p([]);
			if(0 > e) {
				var i = t + e;
				return p(0 > i ? [] : [this[i]])
			}
			return p([this[e]])
		},
		append: function() {
			for(var e, t = n(), i = 0; i < arguments.length; i += 1) {
				e = 0 > i || arguments.length <= i ? void 0 : arguments[i];
				for(var s = 0; s < this.length; s += 1)
					if("string" == typeof e) {
						var a = t.createElement("div");
						for(a.innerHTML = e; a.firstChild;) this[s].appendChild(a.firstChild)
					} else if(e instanceof L)
					for(var r = 0; r < e.length; r += 1) this[s].appendChild(e[r]);
				else this[s].appendChild(e)
			}
			return this
		},
		prepend: function(e) {
			var t, i, s = n();
			for(t = 0; t < this.length; t += 1)
				if("string" == typeof e) {
					var a = s.createElement("div");
					for(a.innerHTML = e, i = a.childNodes.length - 1; i >= 0; i -= 1) this[t].insertBefore(a.childNodes[i], this[t].childNodes[0])
				} else if(e instanceof L)
				for(i = 0; i < e.length; i += 1) this[t].insertBefore(e[i], this[t].childNodes[0]);
			else this[t].insertBefore(e, this[t].childNodes[0]);
			return this
		},
		next: function(e) {
			return p(this.length > 0 ? e ? this[0].nextElementSibling && p(this[0].nextElementSibling).is(e) ? [this[0].nextElementSibling] : [] : this[0].nextElementSibling ? [this[0].nextElementSibling] : [] : [])
		},
		nextAll: function(e) {
			var t = [],
				i = this[0];
			if(!i) return p([]);
			for(; i.nextElementSibling;) {
				var s = i.nextElementSibling;
				e ? p(s).is(e) && t.push(s) : t.push(s), i = s
			}
			return p(t)
		},
		prev: function(e) {
			if(this.length > 0) {
				var t = this[0];
				return p(e ? t.previousElementSibling && p(t.previousElementSibling).is(e) ? [t.previousElementSibling] : [] : t.previousElementSibling ? [t.previousElementSibling] : [])
			}
			return p([])
		},
		prevAll: function(e) {
			var t = [],
				i = this[0];
			if(!i) return p([]);
			for(; i.previousElementSibling;) {
				var s = i.previousElementSibling;
				e ? p(s).is(e) && t.push(s) : t.push(s), i = s
			}
			return p(t)
		},
		parent: function(e) {
			for(var t = [], i = 0; i < this.length; i += 1) null !== this[i].parentNode && (e ? p(this[i].parentNode).is(e) && t.push(this[i].parentNode) : t.push(this[i].parentNode));
			return p(t)
		},
		parents: function(e) {
			for(var t = [], i = 0; i < this.length; i += 1)
				for(var s = this[i].parentNode; s;) e ? p(s).is(e) && t.push(s) : t.push(s), s = s.parentNode;
			return p(t)
		},
		closest: function(e) {
			var t = this;
			return void 0 === e ? p([]) : (t.is(e) || (t = t.parents(e).eq(0)), t)
		},
		find: function(e) {
			for(var t = [], i = 0; i < this.length; i += 1)
				for(var s = this[i].querySelectorAll(e), n = 0; n < s.length; n += 1) t.push(s[n]);
			return p(t)
		},
		children: function(e) {
			for(var t = [], i = 0; i < this.length; i += 1)
				for(var s = this[i].children, n = 0; n < s.length; n += 1) e && !p(s[n]).is(e) || t.push(s[n]);
			return p(t)
		},
		filter: function(e) {
			return p(c(this, e))
		},
		remove: function() {
			for(var e = 0; e < this.length; e += 1) this[e].parentNode && this[e].parentNode.removeChild(this[e]);
			return this
		}
	};
	Object.keys(B).forEach(function(e) {
		p.fn[e] = B[e]
	});
	var Y = {
			name: "resize",
			create: function() {
				var e = this;
				b(e, {
					resize: {
						resizeHandler: function() {
							e && !e.destroyed && e.initialized && (e.emit("beforeResize"), e.emit("resize"))
						},
						orientationChangeHandler: function() {
							e && !e.destroyed && e.initialized && e.emit("orientationchange")
						}
					}
				})
			},
			on: {
				init: function(e) {
					var t = a();
					t.addEventListener("resize", e.resize.resizeHandler), t.addEventListener("orientationchange", e.resize.orientationChangeHandler)
				},
				destroy: function(e) {
					var t = a();
					t.removeEventListener("resize", e.resize.resizeHandler), t.removeEventListener("orientationchange", e.resize.orientationChangeHandler)
				}
			}
		},
		X = {
			attach: function(e, t) {
				void 0 === t && (t = {});
				var i = a(),
					s = this,
					n = new(i.MutationObserver || i.WebkitMutationObserver)(function(e) {
						if(1 !== e.length) {
							var t = function() {
								s.emit("observerUpdate", e[0])
							};
							i.requestAnimationFrame ? i.requestAnimationFrame(t) : i.setTimeout(t, 0)
						} else s.emit("observerUpdate", e[0])
					});
				n.observe(e, {
					attributes: void 0 === t.attributes || t.attributes,
					childList: void 0 === t.childList || t.childList,
					characterData: void 0 === t.characterData || t.characterData
				}), s.observer.observers.push(n)
			},
			init: function() {
				if(this.support.observer && this.params.observer) {
					if(this.params.observeParents)
						for(var e = this.$el.parents(), t = 0; t < e.length; t += 1) this.observer.attach(e[t]);
					this.observer.attach(this.$el[0], {
						childList: this.params.observeSlideChildren
					}), this.observer.attach(this.$wrapperEl[0], {
						attributes: !1
					})
				}
			},
			destroy: function() {
				this.observer.observers.forEach(function(e) {
					e.disconnect()
				}), this.observer.observers = []
			}
		},
		N = {
			name: "observer",
			params: {
				observer: !1,
				observeParents: !1,
				observeSlideChildren: !1
			},
			create: function() {
				y(this, {
					observer: t(t({}, X), {}, {
						observers: []
					})
				})
			},
			on: {
				init: function(e) {
					e.observer.init()
				},
				destroy: function(e) {
					e.observer.destroy()
				}
			}
		},
		H = !1,
		R = {
			init: !0,
			direction: "horizontal",
			touchEventsTarget: "container",
			initialSlide: 0,
			speed: 300,
			cssMode: !1,
			updateOnWindowResize: !0,
			width: null,
			height: null,
			preventInteractionOnTransition: !1,
			userAgent: null,
			url: null,
			edgeSwipeDetection: !1,
			edgeSwipeThreshold: 20,
			freeMode: !1,
			freeModeMomentum: !0,
			freeModeMomentumRatio: 1,
			freeModeMomentumBounce: !0,
			freeModeMomentumBounceRatio: 1,
			freeModeMomentumVelocityRatio: 1,
			freeModeSticky: !1,
			freeModeMinimumVelocity: .02,
			autoHeight: !1,
			setWrapperSize: !1,
			virtualTranslate: !1,
			effect: "slide",
			breakpoints: void 0,
			spaceBetween: 0,
			slidesPerView: 1,
			slidesPerColumn: 1,
			slidesPerColumnFill: "column",
			slidesPerGroup: 1,
			slidesPerGroupSkip: 0,
			centeredSlides: !1,
			centeredSlidesBounds: !1,
			slidesOffsetBefore: 0,
			slidesOffsetAfter: 0,
			normalizeSlideIndex: !0,
			centerInsufficientSlides: !1,
			watchOverflow: !1,
			roundLengths: !1,
			touchRatio: 1,
			touchAngle: 45,
			simulateTouch: !0,
			shortSwipes: !0,
			longSwipes: !0,
			longSwipesRatio: .5,
			longSwipesMs: 300,
			followFinger: !0,
			allowTouchMove: !0,
			threshold: 0,
			touchMoveStopPropagation: !1,
			touchStartPreventDefault: !0,
			touchStartForcePreventDefault: !1,
			touchReleaseOnEdges: !1,
			uniqueNavElements: !0,
			resistance: !0,
			resistanceRatio: .85,
			watchSlidesProgress: !1,
			watchSlidesVisibility: !1,
			grabCursor: !1,
			preventClicks: !0,
			preventClicksPropagation: !0,
			slideToClickedSlide: !1,
			preloadImages: !0,
			updateOnImagesReady: !0,
			loop: !1,
			loopAdditionalSlides: 0,
			loopedSlides: null,
			loopFillGroupWithBlank: !1,
			loopPreventsSlide: !0,
			allowSlidePrev: !0,
			allowSlideNext: !0,
			swipeHandler: null,
			noSwiping: !0,
			noSwipingClass: "swiper-no-swiping",
			noSwipingSelector: null,
			passiveListeners: !0,
			containerModifierClass: "swiper-container-",
			slideClass: "swiper-slide",
			slideBlankClass: "swiper-slide-invisible-blank",
			slideActiveClass: "swiper-slide-active",
			slideDuplicateActiveClass: "swiper-slide-duplicate-active",
			slideVisibleClass: "swiper-slide-visible",
			slideDuplicateClass: "swiper-slide-duplicate",
			slideNextClass: "swiper-slide-next",
			slideDuplicateNextClass: "swiper-slide-duplicate-next",
			slidePrevClass: "swiper-slide-prev",
			slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
			wrapperClass: "swiper-wrapper",
			runCallbacksOnInit: !0,
			_emitClasses: !1
		},
		G = {
			modular: {
				useParams: function(e) {
					var t = this;
					t.modules && Object.keys(t.modules).forEach(function(i) {
						var s = t.modules[i];
						s.params && b(e, s.params)
					})
				},
				useModules: function(e) {
					void 0 === e && (e = {});
					var t = this;
					t.modules && Object.keys(t.modules).forEach(function(i) {
						var s = t.modules[i],
							n = e[i] || {};
						s.on && t.on && Object.keys(s.on).forEach(function(e) {
							t.on(e, s.on[e])
						}), s.create && s.create.bind(t)(n)
					})
				}
			},
			eventsEmitter: {
				on: function(e, t, i) {
					var s = this;
					if("function" != typeof t) return s;
					var n = i ? "unshift" : "push";
					return e.split(" ").forEach(function(e) {
						s.eventsListeners[e] || (s.eventsListeners[e] = []), s.eventsListeners[e][n](t)
					}), s
				},
				once: function(e, t, i) {
					function s() {
						n.off(e, s), s.__emitterProxy && delete s.__emitterProxy;
						for(var i = arguments.length, a = new Array(i), r = 0; i > r; r++) a[r] = arguments[r];
						t.apply(n, a)
					}
					var n = this;
					return "function" != typeof t ? n : (s.__emitterProxy = t, n.on(e, s, i))
				},
				onAny: function(e, t) {
					if("function" != typeof e) return this;
					var i = t ? "unshift" : "push";
					return this.eventsAnyListeners.indexOf(e) < 0 && this.eventsAnyListeners[i](e), this
				},
				offAny: function(e) {
					if(!this.eventsAnyListeners) return this;
					var t = this.eventsAnyListeners.indexOf(e);
					return t >= 0 && this.eventsAnyListeners.splice(t, 1), this
				},
				off: function(e, t) {
					var i = this;
					return i.eventsListeners ? (e.split(" ").forEach(function(e) {
						void 0 === t ? i.eventsListeners[e] = [] : i.eventsListeners[e] && i.eventsListeners[e].forEach(function(s, n) {
							(s === t || s.__emitterProxy && s.__emitterProxy === t) && i.eventsListeners[e].splice(n, 1)
						})
					}), i) : i
				},
				emit: function() {
					var e, t, i, s = this;
					if(!s.eventsListeners) return s;
					for(var n = arguments.length, a = new Array(n), r = 0; n > r; r++) a[r] = arguments[r];
					"string" == typeof a[0] || Array.isArray(a[0]) ? (e = a[0], t = a.slice(1, a.length), i = s) : (e = a[0].events, t = a[0].data, i = a[0].context || s), t.unshift(i);
					var o = Array.isArray(e) ? e : e.split(" ");
					return o.forEach(function(e) {
						if(s.eventsListeners && s.eventsListeners[e]) {
							var n = [];
							s.eventsListeners[e].forEach(function(e) {
								n.push(e)
							}), n.forEach(function(e) {
								e.apply(i, t)
							})
						}
					}), s
				}
			},
			update: {
				updateSize: function() {
					var e, t, i = this.$el;
					e = void 0 !== this.params.width && null !== this.params.width ? this.params.width : i[0].clientWidth, t = void 0 !== this.params.height && null !== this.params.width ? this.params.height : i[0].clientHeight, 0 === e && this.isHorizontal() || 0 === t && this.isVertical() || (e = e - parseInt(i.css("padding-left") || 0, 10) - parseInt(i.css("padding-right") || 0, 10), t = t - parseInt(i.css("padding-top") || 0, 10) - parseInt(i.css("padding-bottom") || 0, 10), Number.isNaN(e) && (e = 0), Number.isNaN(t) && (t = 0), b(this, {
						width: e,
						height: t,
						size: this.isHorizontal() ? e : t
					}))
				},
				updateSlides: function() {
					function e(e, t) {
						return !i.cssMode || t !== h.length - 1
					}
					var t = a(),
						i = this.params,
						s = this.$wrapperEl,
						n = this.size,
						r = this.rtlTranslate,
						o = this.wrongRTL,
						l = this.virtual && i.virtual.enabled,
						d = l ? this.virtual.slides.length : this.slides.length,
						h = s.children("." + this.params.slideClass),
						u = l ? this.virtual.slides.length : h.length,
						c = [],
						p = [],
						f = [],
						m = i.slidesOffsetBefore;
					"function" == typeof m && (m = i.slidesOffsetBefore.call(this));
					var v = i.slidesOffsetAfter;
					"function" == typeof v && (v = i.slidesOffsetAfter.call(this));
					var g = this.snapGrid.length,
						y = this.snapGrid.length,
						w = i.spaceBetween,
						x = -m,
						C = 0,
						E = 0;
					if(void 0 !== n) {
						var T, S;
						"string" == typeof w && w.indexOf("%") >= 0 && (w = parseFloat(w.replace("%", "")) / 100 * n), this.virtualSize = -w, r ? h.css({
							marginLeft: "",
							marginTop: ""
						}) : h.css({
							marginRight: "",
							marginBottom: ""
						}), i.slidesPerColumn > 1 && (T = Math.floor(u / i.slidesPerColumn) === u / this.params.slidesPerColumn ? u : Math.ceil(u / i.slidesPerColumn) * i.slidesPerColumn, "auto" !== i.slidesPerView && "row" === i.slidesPerColumnFill && (T = Math.max(T, i.slidesPerView * i.slidesPerColumn)));
						for(var k, M = i.slidesPerColumn, P = T / M, z = Math.floor(u / i.slidesPerColumn), I = 0; u > I; I += 1) {
							S = 0;
							var A = h.eq(I);
							if(i.slidesPerColumn > 1) {
								var L = void 0,
									O = void 0,
									$ = void 0;
								if("row" === i.slidesPerColumnFill && i.slidesPerGroup > 1) {
									var D = Math.floor(I / (i.slidesPerGroup * i.slidesPerColumn)),
										B = I - i.slidesPerColumn * i.slidesPerGroup * D,
										Y = 0 === D ? i.slidesPerGroup : Math.min(Math.ceil((u - D * M * i.slidesPerGroup) / M), i.slidesPerGroup);
									L = (O = B - ($ = Math.floor(B / Y)) * Y + D * i.slidesPerGroup) + $ * T / M, A.css({
										"-webkit-box-ordinal-group": L,
										"-moz-box-ordinal-group": L,
										"-ms-flex-order": L,
										"-webkit-order": L,
										order: L
									})
								} else "column" === i.slidesPerColumnFill ? ($ = I - (O = Math.floor(I / M)) * M, (O > z || O === z && $ === M - 1) && ($ += 1) >= M && ($ = 0, O += 1)) : O = I - ($ = Math.floor(I / P)) * P;
								A.css("margin-" + (this.isHorizontal() ? "top" : "left"), 0 !== $ && i.spaceBetween && i.spaceBetween + "px")
							}
							if("none" !== A.css("display")) {
								if("auto" === i.slidesPerView) {
									var X = t.getComputedStyle(A[0], null),
										N = A[0].style.transform,
										H = A[0].style.webkitTransform;
									if(N && (A[0].style.transform = "none"), H && (A[0].style.webkitTransform = "none"), i.roundLengths) S = this.isHorizontal() ? A.outerWidth(!0) : A.outerHeight(!0);
									else if(this.isHorizontal()) {
										var R = parseFloat(X.getPropertyValue("width") || 0),
											G = parseFloat(X.getPropertyValue("padding-left") || 0),
											V = parseFloat(X.getPropertyValue("padding-right") || 0),
											F = parseFloat(X.getPropertyValue("margin-left") || 0),
											j = parseFloat(X.getPropertyValue("margin-right") || 0),
											q = X.getPropertyValue("box-sizing");
										S = q && "border-box" === q ? R + F + j : R + G + V + F + j
									} else {
										var W = parseFloat(X.getPropertyValue("height") || 0),
											_ = parseFloat(X.getPropertyValue("padding-top") || 0),
											U = parseFloat(X.getPropertyValue("padding-bottom") || 0),
											K = parseFloat(X.getPropertyValue("margin-top") || 0),
											Z = parseFloat(X.getPropertyValue("margin-bottom") || 0),
											Q = X.getPropertyValue("box-sizing");
										S = Q && "border-box" === Q ? W + K + Z : W + _ + U + K + Z
									}
									N && (A[0].style.transform = N), H && (A[0].style.webkitTransform = H), i.roundLengths && (S = Math.floor(S))
								} else S = (n - (i.slidesPerView - 1) * w) / i.slidesPerView, i.roundLengths && (S = Math.floor(S)), h[I] && (this.isHorizontal() ? h[I].style.width = S + "px" : h[I].style.height = S + "px");
								h[I] && (h[I].swiperSlideSize = S), f.push(S), i.centeredSlides ? (x = x + S / 2 + C / 2 + w, 0 === C && 0 !== I && (x = x - n / 2 - w), 0 === I && (x = x - n / 2 - w), Math.abs(x) < .001 && (x = 0), i.roundLengths && (x = Math.floor(x)), E % i.slidesPerGroup == 0 && c.push(x), p.push(x)) : (i.roundLengths && (x = Math.floor(x)), (E - Math.min(this.params.slidesPerGroupSkip, E)) % this.params.slidesPerGroup == 0 && c.push(x), p.push(x), x = x + S + w), this.virtualSize += S + w, C = S, E += 1
							}
						}
						if(this.virtualSize = Math.max(this.virtualSize, n) + v, r && o && ("slide" === i.effect || "coverflow" === i.effect) && s.css({
								width: this.virtualSize + i.spaceBetween + "px"
							}), i.setWrapperSize && (this.isHorizontal() ? s.css({
								width: this.virtualSize + i.spaceBetween + "px"
							}) : s.css({
								height: this.virtualSize + i.spaceBetween + "px"
							})), i.slidesPerColumn > 1 && (this.virtualSize = (S + i.spaceBetween) * T, this.virtualSize = Math.ceil(this.virtualSize / i.slidesPerColumn) - i.spaceBetween, this.isHorizontal() ? s.css({
								width: this.virtualSize + i.spaceBetween + "px"
							}) : s.css({
								height: this.virtualSize + i.spaceBetween + "px"
							}), i.centeredSlides)) {
							k = [];
							for(var J = 0; J < c.length; J += 1) {
								var ee = c[J];
								i.roundLengths && (ee = Math.floor(ee)), c[J] < this.virtualSize + c[0] && k.push(ee)
							}
							c = k
						}
						if(!i.centeredSlides) {
							k = [];
							for(var te = 0; te < c.length; te += 1) {
								var ie = c[te];
								i.roundLengths && (ie = Math.floor(ie)), c[te] <= this.virtualSize - n && k.push(ie)
							}
							c = k, Math.floor(this.virtualSize - n) - Math.floor(c[c.length - 1]) > 1 && c.push(this.virtualSize - n)
						}
						if(0 === c.length && (c = [0]), 0 !== i.spaceBetween && (this.isHorizontal() ? r ? h.filter(e).css({
								marginLeft: w + "px"
							}) : h.filter(e).css({
								marginRight: w + "px"
							}) : h.filter(e).css({
								marginBottom: w + "px"
							})), i.centeredSlides && i.centeredSlidesBounds) {
							var se = 0;
							f.forEach(function(e) {
								se += e + (i.spaceBetween ? i.spaceBetween : 0)
							});
							var ne = (se -= i.spaceBetween) - n;
							c = c.map(function(e) {
								return 0 > e ? -m : e > ne ? ne + v : e
							})
						}
						if(i.centerInsufficientSlides) {
							var ae = 0;
							if(f.forEach(function(e) {
									ae += e + (i.spaceBetween ? i.spaceBetween : 0)
								}), (ae -= i.spaceBetween) < n) {
								var re = (n - ae) / 2;
								c.forEach(function(e, t) {
									c[t] = e - re
								}), p.forEach(function(e, t) {
									p[t] = e + re
								})
							}
						}
						b(this, {
							slides: h,
							snapGrid: c,
							slidesGrid: p,
							slidesSizesGrid: f
						}), u !== d && this.emit("slidesLengthChange"), c.length !== g && (this.params.watchOverflow && this.checkOverflow(), this.emit("snapGridLengthChange")), p.length !== y && this.emit("slidesGridLengthChange"), (i.watchSlidesProgress || i.watchSlidesVisibility) && this.updateSlidesOffset()
					}
				},
				updateAutoHeight: function(e) {
					var t, i = [],
						s = 0;
					if("number" == typeof e ? this.setTransition(e) : !0 === e && this.setTransition(this.params.speed), "auto" !== this.params.slidesPerView && this.params.slidesPerView > 1)
						if(this.params.centeredSlides) this.visibleSlides.each(function(e) {
							i.push(e)
						});
						else
							for(t = 0; t < Math.ceil(this.params.slidesPerView); t += 1) {
								var n = this.activeIndex + t;
								if(n > this.slides.length) break;
								i.push(this.slides.eq(n)[0])
							} else i.push(this.slides.eq(this.activeIndex)[0]);
					for(t = 0; t < i.length; t += 1)
						if(void 0 !== i[t]) {
							var a = i[t].offsetHeight;
							s = a > s ? a : s
						}
					s && this.$wrapperEl.css("height", s + "px")
				},
				updateSlidesOffset: function() {
					for(var e = this.slides, t = 0; t < e.length; t += 1) e[t].swiperSlideOffset = this.isHorizontal() ? e[t].offsetLeft : e[t].offsetTop
				},
				updateSlidesProgress: function(e) {
					void 0 === e && (e = this && this.translate || 0);
					var t = this.params,
						i = this.slides,
						s = this.rtlTranslate;
					if(0 !== i.length) {
						void 0 === i[0].swiperSlideOffset && this.updateSlidesOffset();
						var n = -e;
						s && (n = e), i.removeClass(t.slideVisibleClass), this.visibleSlidesIndexes = [], this.visibleSlides = [];
						for(var a = 0; a < i.length; a += 1) {
							var r = i[a],
								o = (n + (t.centeredSlides ? this.minTranslate() : 0) - r.swiperSlideOffset) / (r.swiperSlideSize + t.spaceBetween);
							if(t.watchSlidesVisibility || t.centeredSlides && t.autoHeight) {
								var l = -(n - r.swiperSlideOffset),
									d = l + this.slidesSizesGrid[a];
								(l >= 0 && l < this.size - 1 || d > 1 && d <= this.size || 0 >= l && d >= this.size) && (this.visibleSlides.push(r), this.visibleSlidesIndexes.push(a), i.eq(a).addClass(t.slideVisibleClass))
							}
							r.progress = s ? -o : o
						}
						this.visibleSlides = p(this.visibleSlides)
					}
				},
				updateProgress: function(e) {
					if(void 0 === e) {
						var t = this.rtlTranslate ? -1 : 1;
						e = this && this.translate && this.translate * t || 0
					}
					var i = this.params,
						s = this.maxTranslate() - this.minTranslate(),
						n = this.progress,
						a = this.isBeginning,
						r = this.isEnd,
						o = a,
						l = r;
					0 === s ? (n = 0, a = !0, r = !0) : (a = (n = (e - this.minTranslate()) / s) <= 0, r = n >= 1), b(this, {
						progress: n,
						isBeginning: a,
						isEnd: r
					}), (i.watchSlidesProgress || i.watchSlidesVisibility || i.centeredSlides && i.autoHeight) && this.updateSlidesProgress(e), a && !o && this.emit("reachBeginning toEdge"), r && !l && this.emit("reachEnd toEdge"), (o && !a || l && !r) && this.emit("fromEdge"), this.emit("progress", n)
				},
				updateSlidesClasses: function() {
					var e, t = this.slides,
						i = this.params,
						s = this.$wrapperEl,
						n = this.activeIndex,
						a = this.realIndex,
						r = this.virtual && i.virtual.enabled;
					t.removeClass(i.slideActiveClass + " " + i.slideNextClass + " " + i.slidePrevClass + " " + i.slideDuplicateActiveClass + " " + i.slideDuplicateNextClass + " " + i.slideDuplicatePrevClass), (e = r ? this.$wrapperEl.find("." + i.slideClass + '[data-swiper-slide-index="' + n + '"]') : t.eq(n)).addClass(i.slideActiveClass), i.loop && (e.hasClass(i.slideDuplicateClass) ? s.children("." + i.slideClass + ":not(." + i.slideDuplicateClass + ')[data-swiper-slide-index="' + a + '"]').addClass(i.slideDuplicateActiveClass) : s.children("." + i.slideClass + "." + i.slideDuplicateClass + '[data-swiper-slide-index="' + a + '"]').addClass(i.slideDuplicateActiveClass));
					var o = e.nextAll("." + i.slideClass).eq(0).addClass(i.slideNextClass);
					i.loop && 0 === o.length && (o = t.eq(0)).addClass(i.slideNextClass);
					var l = e.prevAll("." + i.slideClass).eq(0).addClass(i.slidePrevClass);
					i.loop && 0 === l.length && (l = t.eq(-1)).addClass(i.slidePrevClass), i.loop && (o.hasClass(i.slideDuplicateClass) ? s.children("." + i.slideClass + ":not(." + i.slideDuplicateClass + ')[data-swiper-slide-index="' + o.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicateNextClass) : s.children("." + i.slideClass + "." + i.slideDuplicateClass + '[data-swiper-slide-index="' + o.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicateNextClass), l.hasClass(i.slideDuplicateClass) ? s.children("." + i.slideClass + ":not(." + i.slideDuplicateClass + ')[data-swiper-slide-index="' + l.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicatePrevClass) : s.children("." + i.slideClass + "." + i.slideDuplicateClass + '[data-swiper-slide-index="' + l.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicatePrevClass)), this.emitSlidesClasses()
				},
				updateActiveIndex: function(e) {
					var t, i = this.rtlTranslate ? this.translate : -this.translate,
						s = this.slidesGrid,
						n = this.snapGrid,
						a = this.params,
						r = this.activeIndex,
						o = this.realIndex,
						l = this.snapIndex,
						d = e;
					if(void 0 === d) {
						for(var h = 0; h < s.length; h += 1) void 0 !== s[h + 1] ? i >= s[h] && i < s[h + 1] - (s[h + 1] - s[h]) / 2 ? d = h : i >= s[h] && i < s[h + 1] && (d = h + 1) : i >= s[h] && (d = h);
						a.normalizeSlideIndex && (0 > d || void 0 === d) && (d = 0)
					}
					if(n.indexOf(i) >= 0) t = n.indexOf(i);
					else {
						var u = Math.min(a.slidesPerGroupSkip, d);
						t = u + Math.floor((d - u) / a.slidesPerGroup)
					}
					if(t >= n.length && (t = n.length - 1), d !== r) {
						var c = parseInt(this.slides.eq(d).attr("data-swiper-slide-index") || d, 10);
						b(this, {
							snapIndex: t,
							realIndex: c,
							previousIndex: r,
							activeIndex: d
						}), this.emit("activeIndexChange"), this.emit("snapIndexChange"), o !== c && this.emit("realIndexChange"), (this.initialized || this.params.runCallbacksOnInit) && this.emit("slideChange")
					} else t !== l && (this.snapIndex = t, this.emit("snapIndexChange"))
				},
				updateClickedSlide: function(e) {
					var t = this.params,
						i = p(e.target).closest("." + t.slideClass)[0],
						s = !1;
					if(i)
						for(var n = 0; n < this.slides.length; n += 1) this.slides[n] === i && (s = !0);
					return i && s ? (this.clickedSlide = i, this.virtual && this.params.virtual.enabled ? this.clickedIndex = parseInt(p(i).attr("data-swiper-slide-index"), 10) : this.clickedIndex = p(i).index(), void(t.slideToClickedSlide && void 0 !== this.clickedIndex && this.clickedIndex !== this.activeIndex && this.slideToClickedSlide())) : (this.clickedSlide = void 0, void(this.clickedIndex = void 0))
				}
			},
			translate: {
				getTranslate: function(e) {
					void 0 === e && (e = this.isHorizontal() ? "x" : "y");
					var t = this.params,
						i = this.rtlTranslate,
						s = this.translate,
						n = this.$wrapperEl;
					if(t.virtualTranslate) return i ? -s : s;
					if(t.cssMode) return s;
					var a = v(n[0], e);
					return i && (a = -a), a || 0
				},
				setTranslate: function(e, t) {
					var i = this.rtlTranslate,
						s = this.params,
						n = this.$wrapperEl,
						a = this.wrapperEl,
						r = this.progress,
						o = 0,
						l = 0;
					this.isHorizontal() ? o = i ? -e : e : l = e, s.roundLengths && (o = Math.floor(o), l = Math.floor(l)), s.cssMode ? a[this.isHorizontal() ? "scrollLeft" : "scrollTop"] = this.isHorizontal() ? -o : -l : s.virtualTranslate || n.transform("translate3d(" + o + "px, " + l + "px, 0px)"), this.previousTranslate = this.translate, this.translate = this.isHorizontal() ? o : l;
					var d = this.maxTranslate() - this.minTranslate();
					(0 === d ? 0 : (e - this.minTranslate()) / d) !== r && this.updateProgress(e), this.emit("setTranslate", this.translate, t)
				},
				minTranslate: function() {
					return -this.snapGrid[0]
				},
				maxTranslate: function() {
					return -this.snapGrid[this.snapGrid.length - 1]
				},
				translateTo: function(e, t, i, s, n) {
					void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0), void 0 === s && (s = !0);
					var a = this,
						r = a.params,
						o = a.wrapperEl;
					if(a.animating && r.preventInteractionOnTransition) return !1;
					var l, d = a.minTranslate(),
						h = a.maxTranslate();
					if(l = s && e > d ? d : s && h > e ? h : e, a.updateProgress(l), r.cssMode) {
						var u, c = a.isHorizontal();
						return 0 === t ? o[c ? "scrollLeft" : "scrollTop"] = -l : o.scrollTo ? o.scrollTo(((u = {})[c ? "left" : "top"] = -l, u.behavior = "smooth", u)) : o[c ? "scrollLeft" : "scrollTop"] = -l, !0
					}
					return 0 === t ? (a.setTransition(0), a.setTranslate(l), i && (a.emit("beforeTransitionStart", t, n), a.emit("transitionEnd"))) : (a.setTransition(t), a.setTranslate(l), i && (a.emit("beforeTransitionStart", t, n), a.emit("transitionStart")), a.animating || (a.animating = !0, a.onTranslateToWrapperTransitionEnd || (a.onTranslateToWrapperTransitionEnd = function(e) {
						a && !a.destroyed && e.target === this && (a.$wrapperEl[0].removeEventListener("transitionend", a.onTranslateToWrapperTransitionEnd), a.$wrapperEl[0].removeEventListener("webkitTransitionEnd", a.onTranslateToWrapperTransitionEnd), a.onTranslateToWrapperTransitionEnd = null, delete a.onTranslateToWrapperTransitionEnd, i && a.emit("transitionEnd"))
					}), a.$wrapperEl[0].addEventListener("transitionend", a.onTranslateToWrapperTransitionEnd), a.$wrapperEl[0].addEventListener("webkitTransitionEnd", a.onTranslateToWrapperTransitionEnd))), !0
				}
			},
			transition: {
				setTransition: function(e, t) {
					this.params.cssMode || this.$wrapperEl.transition(e), this.emit("setTransition", e, t)
				},
				transitionStart: function(e, t) {
					void 0 === e && (e = !0);
					var i = this.activeIndex,
						s = this.params,
						n = this.previousIndex;
					if(!s.cssMode) {
						s.autoHeight && this.updateAutoHeight();
						var a = t;
						if(a || (a = i > n ? "next" : n > i ? "prev" : "reset"), this.emit("transitionStart"), e && i !== n) {
							if("reset" === a) return void this.emit("slideResetTransitionStart");
							this.emit("slideChangeTransitionStart"), "next" === a ? this.emit("slideNextTransitionStart") : this.emit("slidePrevTransitionStart")
						}
					}
				},
				transitionEnd: function(e, t) {
					void 0 === e && (e = !0);
					var i = this.activeIndex,
						s = this.previousIndex,
						n = this.params;
					if(this.animating = !1, !n.cssMode) {
						this.setTransition(0);
						var a = t;
						if(a || (a = i > s ? "next" : s > i ? "prev" : "reset"), this.emit("transitionEnd"), e && i !== s) {
							if("reset" === a) return void this.emit("slideResetTransitionEnd");
							this.emit("slideChangeTransitionEnd"), "next" === a ? this.emit("slideNextTransitionEnd") : this.emit("slidePrevTransitionEnd")
						}
					}
				}
			},
			slide: {
				slideTo: function(e, t, i, s) {
					void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0);
					var n = this,
						a = e;
					0 > a && (a = 0);
					var r = n.params,
						o = n.snapGrid,
						l = n.slidesGrid,
						d = n.previousIndex,
						h = n.activeIndex,
						u = n.rtlTranslate,
						c = n.wrapperEl;
					if(n.animating && r.preventInteractionOnTransition) return !1;
					var p = Math.min(n.params.slidesPerGroupSkip, a),
						f = p + Math.floor((a - p) / n.params.slidesPerGroup);
					f >= o.length && (f = o.length - 1), (h || r.initialSlide || 0) === (d || 0) && i && n.emit("beforeSlideChangeStart");
					var m, v = -o[f];
					if(n.updateProgress(v), r.normalizeSlideIndex)
						for(var g = 0; g < l.length; g += 1) - Math.floor(100 * v) >= Math.floor(100 * l[g]) && (a = g);
					if(n.initialized && a !== h) {
						if(!n.allowSlideNext && v < n.translate && v < n.minTranslate()) return !1;
						if(!n.allowSlidePrev && v > n.translate && v > n.maxTranslate() && (h || 0) !== a) return !1
					}
					if(m = a > h ? "next" : h > a ? "prev" : "reset", u && -v === n.translate || !u && v === n.translate) return n.updateActiveIndex(a), r.autoHeight && n.updateAutoHeight(), n.updateSlidesClasses(), "slide" !== r.effect && n.setTranslate(v), "reset" !== m && (n.transitionStart(i, m), n.transitionEnd(i, m)), !1;
					if(r.cssMode) {
						var b, y = n.isHorizontal(),
							w = -v;
						return u && (w = c.scrollWidth - c.offsetWidth - w), 0 === t ? c[y ? "scrollLeft" : "scrollTop"] = w : c.scrollTo ? c.scrollTo(((b = {})[y ? "left" : "top"] = w, b.behavior = "smooth", b)) : c[y ? "scrollLeft" : "scrollTop"] = w, !0
					}
					return 0 === t ? (n.setTransition(0), n.setTranslate(v), n.updateActiveIndex(a), n.updateSlidesClasses(), n.emit("beforeTransitionStart", t, s), n.transitionStart(i, m), n.transitionEnd(i, m)) : (n.setTransition(t), n.setTranslate(v), n.updateActiveIndex(a), n.updateSlidesClasses(), n.emit("beforeTransitionStart", t, s), n.transitionStart(i, m), n.animating || (n.animating = !0, n.onSlideToWrapperTransitionEnd || (n.onSlideToWrapperTransitionEnd = function(e) {
						n && !n.destroyed && e.target === this && (n.$wrapperEl[0].removeEventListener("transitionend", n.onSlideToWrapperTransitionEnd), n.$wrapperEl[0].removeEventListener("webkitTransitionEnd", n.onSlideToWrapperTransitionEnd), n.onSlideToWrapperTransitionEnd = null, delete n.onSlideToWrapperTransitionEnd, n.transitionEnd(i, m))
					}), n.$wrapperEl[0].addEventListener("transitionend", n.onSlideToWrapperTransitionEnd), n.$wrapperEl[0].addEventListener("webkitTransitionEnd", n.onSlideToWrapperTransitionEnd))), !0
				},
				slideToLoop: function(e, t, i, s) {
					void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0);
					var n = e;
					return this.params.loop && (n += this.loopedSlides), this.slideTo(n, t, i, s)
				},
				slideNext: function(e, t, i) {
					void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
					var s = this.params,
						n = this.animating,
						a = this.activeIndex < s.slidesPerGroupSkip ? 1 : s.slidesPerGroup;
					if(s.loop) {
						if(n && s.loopPreventsSlide) return !1;
						this.loopFix(), this._clientLeft = this.$wrapperEl[0].clientLeft
					}
					return this.slideTo(this.activeIndex + a, e, t, i)
				},
				slidePrev: function(e, t, i) {
					function s(e) {
						return 0 > e ? -Math.floor(Math.abs(e)) : Math.floor(e)
					}
					void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
					var n = this.params,
						a = this.animating,
						r = this.snapGrid,
						o = this.slidesGrid,
						l = this.rtlTranslate;
					if(n.loop) {
						if(a && n.loopPreventsSlide) return !1;
						this.loopFix(), this._clientLeft = this.$wrapperEl[0].clientLeft
					}
					var d, h = s(l ? this.translate : -this.translate),
						u = r.map(function(e) {
							return s(e)
						}),
						c = (r[u.indexOf(h)], r[u.indexOf(h) - 1]);
					return void 0 === c && n.cssMode && r.forEach(function(e) {
						!c && h >= e && (c = e)
					}), void 0 !== c && (d = o.indexOf(c)) < 0 && (d = this.activeIndex - 1), this.slideTo(d, e, t, i)
				},
				slideReset: function(e, t, i) {
					return void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), this.slideTo(this.activeIndex, e, t, i)
				},
				slideToClosest: function(e, t, i, s) {
					void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), void 0 === s && (s = .5);
					var n = this.activeIndex,
						a = Math.min(this.params.slidesPerGroupSkip, n),
						r = a + Math.floor((n - a) / this.params.slidesPerGroup),
						o = this.rtlTranslate ? this.translate : -this.translate;
					if(o >= this.snapGrid[r]) {
						var l = this.snapGrid[r];
						o - l > (this.snapGrid[r + 1] - l) * s && (n += this.params.slidesPerGroup)
					} else {
						var d = this.snapGrid[r - 1];
						o - d <= (this.snapGrid[r] - d) * s && (n -= this.params.slidesPerGroup)
					}
					return n = Math.max(n, 0), n = Math.min(n, this.slidesGrid.length - 1), this.slideTo(n, e, t, i)
				},
				slideToClickedSlide: function() {
					var e, t = this,
						i = t.params,
						s = t.$wrapperEl,
						n = "auto" === i.slidesPerView ? t.slidesPerViewDynamic() : i.slidesPerView,
						a = t.clickedIndex;
					if(i.loop) {
						if(t.animating) return;
						e = parseInt(p(t.clickedSlide).attr("data-swiper-slide-index"), 10), i.centeredSlides ? a < t.loopedSlides - n / 2 || a > t.slides.length - t.loopedSlides + n / 2 ? (t.loopFix(), a = s.children("." + i.slideClass + '[data-swiper-slide-index="' + e + '"]:not(.' + i.slideDuplicateClass + ")").eq(0).index(), f(function() {
							t.slideTo(a)
						})) : t.slideTo(a) : a > t.slides.length - n ? (t.loopFix(), a = s.children("." + i.slideClass + '[data-swiper-slide-index="' + e + '"]:not(.' + i.slideDuplicateClass + ")").eq(0).index(), f(function() {
							t.slideTo(a)
						})) : t.slideTo(a)
					} else t.slideTo(a)
				}
			},
			loop: {
				loopCreate: function() {
					var e = this,
						t = n(),
						i = e.params,
						s = e.$wrapperEl;
					s.children("." + i.slideClass + "." + i.slideDuplicateClass).remove();
					var a = s.children("." + i.slideClass);
					if(i.loopFillGroupWithBlank) {
						var r = i.slidesPerGroup - a.length % i.slidesPerGroup;
						if(r !== i.slidesPerGroup) {
							for(var o = 0; r > o; o += 1) {
								var l = p(t.createElement("div")).addClass(i.slideClass + " " + i.slideBlankClass);
								s.append(l)
							}
							a = s.children("." + i.slideClass)
						}
					}
					"auto" !== i.slidesPerView || i.loopedSlides || (i.loopedSlides = a.length), e.loopedSlides = Math.ceil(parseFloat(i.loopedSlides || i.slidesPerView, 10)), e.loopedSlides += i.loopAdditionalSlides, e.loopedSlides > a.length && (e.loopedSlides = a.length);
					var d = [],
						h = [];
					a.each(function(t, i) {
						var s = p(t);
						i < e.loopedSlides && h.push(t), i < a.length && i >= a.length - e.loopedSlides && d.push(t), s.attr("data-swiper-slide-index", i)
					});
					for(var u = 0; u < h.length; u += 1) s.append(p(h[u].cloneNode(!0)).addClass(i.slideDuplicateClass));
					for(var c = d.length - 1; c >= 0; c -= 1) s.prepend(p(d[c].cloneNode(!0)).addClass(i.slideDuplicateClass))
				},
				loopFix: function() {
					this.emit("beforeLoopFix");
					var e, t = this.activeIndex,
						i = this.slides,
						s = this.loopedSlides,
						n = this.allowSlidePrev,
						a = this.allowSlideNext,
						r = this.snapGrid,
						o = this.rtlTranslate;
					this.allowSlidePrev = !0, this.allowSlideNext = !0;
					var l = -r[t] - this.getTranslate();
					s > t ? (e = i.length - 3 * s + t, e += s, this.slideTo(e, 0, !1, !0) && 0 !== l && this.setTranslate((o ? -this.translate : this.translate) - l)) : t >= i.length - s && (e = -i.length + t + s, e += s, this.slideTo(e, 0, !1, !0) && 0 !== l && this.setTranslate((o ? -this.translate : this.translate) - l)), this.allowSlidePrev = n, this.allowSlideNext = a, this.emit("loopFix")
				},
				loopDestroy: function() {
					var e = this.$wrapperEl,
						t = this.params,
						i = this.slides;
					e.children("." + t.slideClass + "." + t.slideDuplicateClass + ",." + t.slideClass + "." + t.slideBlankClass).remove(), i.removeAttr("data-swiper-slide-index")
				}
			},
			grabCursor: {
				setGrabCursor: function(e) {
					if(!(this.support.touch || !this.params.simulateTouch || this.params.watchOverflow && this.isLocked || this.params.cssMode)) {
						var t = this.el;
						t.style.cursor = "move", t.style.cursor = e ? "-webkit-grabbing" : "-webkit-grab", t.style.cursor = e ? "-moz-grabbin" : "-moz-grab", t.style.cursor = e ? "grabbing" : "grab"
					}
				},
				unsetGrabCursor: function() {
					this.support.touch || this.params.watchOverflow && this.isLocked || this.params.cssMode || (this.el.style.cursor = "")
				}
			},
			manipulation: {
				appendSlide: function(e) {
					var t = this.$wrapperEl,
						i = this.params;
					if(i.loop && this.loopDestroy(), "object" == typeof e && "length" in e)
						for(var s = 0; s < e.length; s += 1) e[s] && t.append(e[s]);
					else t.append(e);
					i.loop && this.loopCreate(), i.observer && this.support.observer || this.update()
				},
				prependSlide: function(e) {
					var t = this.params,
						i = this.$wrapperEl,
						s = this.activeIndex;
					t.loop && this.loopDestroy();
					var n = s + 1;
					if("object" == typeof e && "length" in e) {
						for(var a = 0; a < e.length; a += 1) e[a] && i.prepend(e[a]);
						n = s + e.length
					} else i.prepend(e);
					t.loop && this.loopCreate(), t.observer && this.support.observer || this.update(), this.slideTo(n, 0, !1)
				},
				addSlide: function(e, t) {
					var i = this.$wrapperEl,
						s = this.params,
						n = this.activeIndex;
					s.loop && (n -= this.loopedSlides, this.loopDestroy(), this.slides = i.children("." + s.slideClass));
					var a = this.slides.length;
					if(0 >= e) this.prependSlide(t);
					else if(e >= a) this.appendSlide(t);
					else {
						for(var r = n > e ? n + 1 : n, o = [], l = a - 1; l >= e; l -= 1) {
							var d = this.slides.eq(l);
							d.remove(), o.unshift(d)
						}
						if("object" == typeof t && "length" in t) {
							for(var h = 0; h < t.length; h += 1) t[h] && i.append(t[h]);
							r = n > e ? n + t.length : n
						} else i.append(t);
						for(var u = 0; u < o.length; u += 1) i.append(o[u]);
						s.loop && this.loopCreate(), s.observer && this.support.observer || this.update(), s.loop ? this.slideTo(r + this.loopedSlides, 0, !1) : this.slideTo(r, 0, !1)
					}
				},
				removeSlide: function(e) {
					var t = this.params,
						i = this.$wrapperEl,
						s = this.activeIndex;
					t.loop && (s -= this.loopedSlides, this.loopDestroy(), this.slides = i.children("." + t.slideClass));
					var n, a = s;
					if("object" == typeof e && "length" in e) {
						for(var r = 0; r < e.length; r += 1) n = e[r], this.slides[n] && this.slides.eq(n).remove(), a > n && (a -= 1);
						a = Math.max(a, 0)
					} else n = e, this.slides[n] && this.slides.eq(n).remove(), a > n && (a -= 1), a = Math.max(a, 0);
					t.loop && this.loopCreate(), t.observer && this.support.observer || this.update(), t.loop ? this.slideTo(a + this.loopedSlides, 0, !1) : this.slideTo(a, 0, !1)
				},
				removeAllSlides: function() {
					for(var e = [], t = 0; t < this.slides.length; t += 1) e.push(t);
					this.removeSlide(e)
				}
			},
			events: {
				attachEvents: function() {
					var e = n(),
						t = this.params,
						i = this.touchEvents,
						s = this.el,
						a = this.wrapperEl,
						r = this.device,
						o = this.support;
					this.onTouchStart = E.bind(this), this.onTouchMove = T.bind(this), this.onTouchEnd = S.bind(this), t.cssMode && (this.onScroll = P.bind(this)), this.onClick = M.bind(this);
					var l = !!t.nested;
					if(!o.touch && o.pointerEvents) s.addEventListener(i.start, this.onTouchStart, !1), e.addEventListener(i.move, this.onTouchMove, l), e.addEventListener(i.end, this.onTouchEnd, !1);
					else {
						if(o.touch) {
							var d = !("touchstart" !== i.start || !o.passiveListener || !t.passiveListeners) && {
								passive: !0,
								capture: !1
							};
							s.addEventListener(i.start, this.onTouchStart, d), s.addEventListener(i.move, this.onTouchMove, o.passiveListener ? {
								passive: !1,
								capture: l
							} : l), s.addEventListener(i.end, this.onTouchEnd, d), i.cancel && s.addEventListener(i.cancel, this.onTouchEnd, d), H || (e.addEventListener("touchstart", z), H = !0)
						}(t.simulateTouch && !r.ios && !r.android || t.simulateTouch && !o.touch && r.ios) && (s.addEventListener("mousedown", this.onTouchStart, !1), e.addEventListener("mousemove", this.onTouchMove, l), e.addEventListener("mouseup", this.onTouchEnd, !1))
					}(t.preventClicks || t.preventClicksPropagation) && s.addEventListener("click", this.onClick, !0), t.cssMode && a.addEventListener("scroll", this.onScroll), t.updateOnWindowResize ? this.on(r.ios || r.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", k, !0) : this.on("observerUpdate", k, !0)
				},
				detachEvents: function() {
					var e = n(),
						t = this.params,
						i = this.touchEvents,
						s = this.el,
						a = this.wrapperEl,
						r = this.device,
						o = this.support,
						l = !!t.nested;
					if(!o.touch && o.pointerEvents) s.removeEventListener(i.start, this.onTouchStart, !1), e.removeEventListener(i.move, this.onTouchMove, l), e.removeEventListener(i.end, this.onTouchEnd, !1);
					else {
						if(o.touch) {
							var d = !("onTouchStart" !== i.start || !o.passiveListener || !t.passiveListeners) && {
								passive: !0,
								capture: !1
							};
							s.removeEventListener(i.start, this.onTouchStart, d), s.removeEventListener(i.move, this.onTouchMove, l), s.removeEventListener(i.end, this.onTouchEnd, d), i.cancel && s.removeEventListener(i.cancel, this.onTouchEnd, d)
						}(t.simulateTouch && !r.ios && !r.android || t.simulateTouch && !o.touch && r.ios) && (s.removeEventListener("mousedown", this.onTouchStart, !1), e.removeEventListener("mousemove", this.onTouchMove, l), e.removeEventListener("mouseup", this.onTouchEnd, !1))
					}(t.preventClicks || t.preventClicksPropagation) && s.removeEventListener("click", this.onClick, !0),
						t.cssMode && a.removeEventListener("scroll", this.onScroll), this.off(r.ios || r.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", k)
				}
			},
			breakpoints: {
				setBreakpoint: function() {
					var e = this.activeIndex,
						t = this.initialized,
						i = this.loopedSlides,
						s = void 0 === i ? 0 : i,
						n = this.params,
						a = this.$el,
						r = n.breakpoints;
					if(r && (!r || 0 !== Object.keys(r).length)) {
						var o = this.getBreakpoint(r);
						if(o && this.currentBreakpoint !== o) {
							var l = o in r ? r[o] : void 0;
							l && ["slidesPerView", "spaceBetween", "slidesPerGroup", "slidesPerGroupSkip", "slidesPerColumn"].forEach(function(e) {
								var t = l[e];
								void 0 !== t && (l[e] = "slidesPerView" !== e || "AUTO" !== t && "auto" !== t ? "slidesPerView" === e ? parseFloat(t) : parseInt(t, 10) : "auto")
							});
							var d = l || this.originalParams,
								h = n.slidesPerColumn > 1,
								u = d.slidesPerColumn > 1;
							h && !u ? (a.removeClass(n.containerModifierClass + "multirow " + n.containerModifierClass + "multirow-column"), this.emitContainerClasses()) : !h && u && (a.addClass(n.containerModifierClass + "multirow"), "column" === d.slidesPerColumnFill && a.addClass(n.containerModifierClass + "multirow-column"), this.emitContainerClasses());
							var c = d.direction && d.direction !== n.direction,
								p = n.loop && (d.slidesPerView !== n.slidesPerView || c);
							c && t && this.changeDirection(), b(this.params, d), b(this, {
								allowTouchMove: this.params.allowTouchMove,
								allowSlideNext: this.params.allowSlideNext,
								allowSlidePrev: this.params.allowSlidePrev
							}), this.currentBreakpoint = o, p && t && (this.loopDestroy(), this.loopCreate(), this.updateSlides(), this.slideTo(e - s + this.loopedSlides, 0, !1)), this.emit("breakpoint", d)
						}
					}
				},
				getBreakpoint: function(e) {
					var t = a();
					if(e) {
						var i = !1,
							s = Object.keys(e).map(function(e) {
								if("string" == typeof e && 0 === e.indexOf("@")) {
									var i = parseFloat(e.substr(1));
									return {
										value: t.innerHeight * i,
										point: e
									}
								}
								return {
									value: e,
									point: e
								}
							});
						s.sort(function(e, t) {
							return parseInt(e.value, 10) - parseInt(t.value, 10)
						});
						for(var n = 0; n < s.length; n += 1) {
							var r = s[n],
								o = r.point;
							r.value <= t.innerWidth && (i = o)
						}
						return i || "max"
					}
				}
			},
			checkOverflow: {
				checkOverflow: function() {
					var e = this.params,
						t = this.isLocked,
						i = this.slides.length > 0 && e.slidesOffsetBefore + e.spaceBetween * (this.slides.length - 1) + this.slides[0].offsetWidth * this.slides.length;
					e.slidesOffsetBefore && e.slidesOffsetAfter && i ? this.isLocked = i <= this.size : this.isLocked = 1 === this.snapGrid.length, this.allowSlideNext = !this.isLocked, this.allowSlidePrev = !this.isLocked, t !== this.isLocked && this.emit(this.isLocked ? "lock" : "unlock"), t && t !== this.isLocked && (this.isEnd = !1, this.navigation && this.navigation.update())
				}
			},
			classes: {
				addClasses: function() {
					var e = this.classNames,
						t = this.params,
						i = this.rtl,
						s = this.$el,
						n = this.device,
						a = [];
					a.push("initialized"), a.push(t.direction), t.freeMode && a.push("free-mode"), t.autoHeight && a.push("autoheight"), i && a.push("rtl"), t.slidesPerColumn > 1 && (a.push("multirow"), "column" === t.slidesPerColumnFill && a.push("multirow-column")), n.android && a.push("android"), n.ios && a.push("ios"), t.cssMode && a.push("css-mode"), a.forEach(function(i) {
						e.push(t.containerModifierClass + i)
					}), s.addClass(e.join(" ")), this.emitContainerClasses()
				},
				removeClasses: function() {
					var e = this.$el,
						t = this.classNames;
					e.removeClass(t.join(" ")), this.emitContainerClasses()
				}
			},
			images: {
				loadImage: function(e, t, i, s, n, r) {
					function o() {
						r && r()
					}
					var l, d = a();
					p(e).parent("picture")[0] || e.complete && n ? o() : t ? ((l = new d.Image).onload = o, l.onerror = o, s && (l.sizes = s), i && (l.srcset = i), t && (l.src = t)) : o()
				},
				preloadImages: function() {
					function e() {
						null != t && t && !t.destroyed && (void 0 !== t.imagesLoaded && (t.imagesLoaded += 1), t.imagesLoaded === t.imagesToLoad.length && (t.params.updateOnImagesReady && t.update(), t.emit("imagesReady")))
					}
					var t = this;
					t.imagesToLoad = t.$el.find("img");
					for(var i = 0; i < t.imagesToLoad.length; i += 1) {
						var s = t.imagesToLoad[i];
						t.loadImage(s, s.currentSrc || s.getAttribute("src"), s.srcset || s.getAttribute("srcset"), s.sizes || s.getAttribute("sizes"), !0, e)
					}
				}
			}
		},
		V = {},
		F = function() {
			function t() {
				for(var e, i, s = arguments.length, n = new Array(s), a = 0; s > a; a++) n[a] = arguments[a];
				1 === n.length && n[0].constructor && n[0].constructor === Object ? i = n[0] : (e = n[0], i = n[1]), i || (i = {}), i = b({}, i), e && !i.el && (i.el = e);
				var r = this;
				r.support = w(), r.device = x({
					userAgent: i.userAgent
				}), r.browser = C(), r.eventsListeners = {}, r.eventsAnyListeners = [], Object.keys(G).forEach(function(e) {
					Object.keys(G[e]).forEach(function(i) {
						t.prototype[i] || (t.prototype[i] = G[e][i])
					})
				}), void 0 === r.modules && (r.modules = {}), Object.keys(r.modules).forEach(function(e) {
					var t = r.modules[e];
					if(t.params) {
						var s = Object.keys(t.params)[0],
							n = t.params[s];
						if("object" != typeof n || null === n) return;
						if(!(s in i && "enabled" in n)) return;
						!0 === i[s] && (i[s] = {
							enabled: !0
						}), "object" != typeof i[s] || "enabled" in i[s] || (i[s].enabled = !0), i[s] || (i[s] = {
							enabled: !1
						})
					}
				});
				var o = b({}, R);
				r.useParams(o), r.params = b({}, o, V, i), r.originalParams = b({}, r.params), r.passedParams = b({}, i), r.params && r.params.on && Object.keys(r.params.on).forEach(function(e) {
					r.on(e, r.params.on[e])
				}), r.$ = p;
				var l = p(r.params.el);
				if(e = l[0]) {
					if(l.length > 1) {
						var d = [];
						return l.each(function(e) {
							var s = b({}, i, {
								el: e
							});
							d.push(new t(s))
						}), d
					}
					var h, u, c;
					return e.swiper = r, e && e.shadowRoot && e.shadowRoot.querySelector ? (h = p(e.shadowRoot.querySelector("." + r.params.wrapperClass))).children = function(e) {
						return l.children(e)
					} : h = l.children("." + r.params.wrapperClass), b(r, {
						$el: l,
						el: e,
						$wrapperEl: h,
						wrapperEl: h[0],
						classNames: [],
						slides: p(),
						slidesGrid: [],
						snapGrid: [],
						slidesSizesGrid: [],
						isHorizontal: function() {
							return "horizontal" === r.params.direction
						},
						isVertical: function() {
							return "vertical" === r.params.direction
						},
						rtl: "rtl" === e.dir.toLowerCase() || "rtl" === l.css("direction"),
						rtlTranslate: "horizontal" === r.params.direction && ("rtl" === e.dir.toLowerCase() || "rtl" === l.css("direction")),
						wrongRTL: "-webkit-box" === h.css("display"),
						activeIndex: 0,
						realIndex: 0,
						isBeginning: !0,
						isEnd: !1,
						translate: 0,
						previousTranslate: 0,
						progress: 0,
						velocity: 0,
						animating: !1,
						allowSlideNext: r.params.allowSlideNext,
						allowSlidePrev: r.params.allowSlidePrev,
						touchEvents: (u = ["touchstart", "touchmove", "touchend", "touchcancel"], c = ["mousedown", "mousemove", "mouseup"], r.support.pointerEvents && (c = ["pointerdown", "pointermove", "pointerup"]), r.touchEventsTouch = {
							start: u[0],
							move: u[1],
							end: u[2],
							cancel: u[3]
						}, r.touchEventsDesktop = {
							start: c[0],
							move: c[1],
							end: c[2]
						}, r.support.touch || !r.params.simulateTouch ? r.touchEventsTouch : r.touchEventsDesktop),
						touchEventsData: {
							isTouched: void 0,
							isMoved: void 0,
							allowTouchCallbacks: void 0,
							touchStartTime: void 0,
							isScrolling: void 0,
							currentTranslate: void 0,
							startTranslate: void 0,
							allowThresholdMove: void 0,
							formElements: "input, select, option, textarea, button, video, label",
							lastClickTime: m(),
							clickTimeout: void 0,
							velocities: [],
							allowMomentumBounce: void 0,
							isTouchEvent: void 0,
							startMoving: void 0
						},
						allowClick: !0,
						allowTouchMove: r.params.allowTouchMove,
						touches: {
							startX: 0,
							startY: 0,
							currentX: 0,
							currentY: 0,
							diff: 0
						},
						imagesToLoad: [],
						imagesLoaded: 0
					}), r.useModules(), r.emit("_swiper"), r.params.init && r.init(), r
				}
			}
			var i, s, n, a = t.prototype;
			return a.emitContainerClasses = function() {
				var e = this;
				if(e.params._emitClasses && e.el) {
					var t = e.el.className.split(" ").filter(function(t) {
						return 0 === t.indexOf("swiper-container") || 0 === t.indexOf(e.params.containerModifierClass)
					});
					e.emit("_containerClasses", t.join(" "))
				}
			}, a.emitSlidesClasses = function() {
				var e = this;
				e.params._emitClasses && e.el && e.slides.each(function(t) {
					var i = t.className.split(" ").filter(function(t) {
						return 0 === t.indexOf("swiper-slide") || 0 === t.indexOf(e.params.slideClass)
					});
					e.emit("_slideClass", t, i.join(" "))
				})
			}, a.slidesPerViewDynamic = function() {
				var e = this.params,
					t = this.slides,
					i = this.slidesGrid,
					s = this.size,
					n = this.activeIndex,
					a = 1;
				if(e.centeredSlides) {
					for(var r, o = t[n].swiperSlideSize, l = n + 1; l < t.length; l += 1) t[l] && !r && (a += 1, (o += t[l].swiperSlideSize) > s && (r = !0));
					for(var d = n - 1; d >= 0; d -= 1) t[d] && !r && (a += 1, (o += t[d].swiperSlideSize) > s && (r = !0))
				} else
					for(var h = n + 1; h < t.length; h += 1) i[h] - i[n] < s && (a += 1);
				return a
			}, a.update = function() {
				function e() {
					var e = t.rtlTranslate ? -1 * t.translate : t.translate,
						i = Math.min(Math.max(e, t.maxTranslate()), t.minTranslate());
					t.setTranslate(i), t.updateActiveIndex(), t.updateSlidesClasses()
				}
				var t = this;
				if(t && !t.destroyed) {
					var i = t.snapGrid,
						s = t.params;
					s.breakpoints && t.setBreakpoint(), t.updateSize(), t.updateSlides(), t.updateProgress(), t.updateSlidesClasses(), t.params.freeMode ? (e(), t.params.autoHeight && t.updateAutoHeight()) : (("auto" === t.params.slidesPerView || t.params.slidesPerView > 1) && t.isEnd && !t.params.centeredSlides ? t.slideTo(t.slides.length - 1, 0, !1, !0) : t.slideTo(t.activeIndex, 0, !1, !0)) || e(), s.watchOverflow && i !== t.snapGrid && t.checkOverflow(), t.emit("update")
				}
			}, a.changeDirection = function(e, t) {
				void 0 === t && (t = !0);
				var i = this.params.direction;
				return e || (e = "horizontal" === i ? "vertical" : "horizontal"), e === i || "horizontal" !== e && "vertical" !== e || (this.$el.removeClass("" + this.params.containerModifierClass + i).addClass("" + this.params.containerModifierClass + e), this.emitContainerClasses(), this.params.direction = e, this.slides.each(function(t) {
					"vertical" === e ? t.style.width = "" : t.style.height = ""
				}), this.emit("changeDirection"), t && this.update()), this
			}, a.init = function() {
				this.initialized || (this.emit("beforeInit"), this.params.breakpoints && this.setBreakpoint(), this.addClasses(), this.params.loop && this.loopCreate(), this.updateSize(), this.updateSlides(), this.params.watchOverflow && this.checkOverflow(), this.params.grabCursor && this.setGrabCursor(), this.params.preloadImages && this.preloadImages(), this.params.loop ? this.slideTo(this.params.initialSlide + this.loopedSlides, 0, this.params.runCallbacksOnInit) : this.slideTo(this.params.initialSlide, 0, this.params.runCallbacksOnInit), this.attachEvents(), this.initialized = !0, this.emit("init"))
			}, a.destroy = function(e, t) {
				void 0 === e && (e = !0), void 0 === t && (t = !0);
				var i, s = this,
					n = s.params,
					a = s.$el,
					r = s.$wrapperEl,
					o = s.slides;
				return void 0 === s.params || s.destroyed || (s.emit("beforeDestroy"), s.initialized = !1, s.detachEvents(), n.loop && s.loopDestroy(), t && (s.removeClasses(), a.removeAttr("style"), r.removeAttr("style"), o && o.length && o.removeClass([n.slideVisibleClass, n.slideActiveClass, n.slideNextClass, n.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-slide-index")), s.emit("destroy"), Object.keys(s.eventsListeners).forEach(function(e) {
					s.off(e)
				}), !1 !== e && (s.$el[0].swiper = null, i = s, Object.keys(i).forEach(function(e) {
					try {
						i[e] = null
					} catch(e) {}
					try {
						delete i[e]
					} catch(e) {}
				})), s.destroyed = !0), null
			}, t.extendDefaults = function(e) {
				b(V, e)
			}, t.installModule = function(e) {
				t.prototype.modules || (t.prototype.modules = {});
				var i = e.name || Object.keys(t.prototype.modules).length + "_" + m();
				t.prototype.modules[i] = e
			}, t.use = function(e) {
				return Array.isArray(e) ? (e.forEach(function(e) {
					return t.installModule(e)
				}), t) : (t.installModule(e), t)
			}, i = t, n = [{
				key: "extendedDefaults",
				get: function() {
					return V
				}
			}, {
				key: "defaults",
				get: function() {
					return R
				}
			}], (s = null) && e(i.prototype, s), n && e(i, n), t
		}();
	F.use([Y, N]);
	var j = {
			update: function(e) {
				function t() {
					i.updateSlides(), i.updateProgress(), i.updateSlidesClasses(), i.lazy && i.params.lazy.enabled && i.lazy.load()
				}
				var i = this,
					s = i.params,
					n = s.slidesPerView,
					a = s.slidesPerGroup,
					r = s.centeredSlides,
					o = i.params.virtual,
					l = o.addSlidesBefore,
					d = o.addSlidesAfter,
					h = i.virtual,
					u = h.from,
					c = h.to,
					p = h.slides,
					f = h.slidesGrid,
					m = h.renderSlide,
					v = h.offset;
				i.updateActiveIndex();
				var g, y, w, x = i.activeIndex || 0;
				g = i.rtlTranslate ? "right" : i.isHorizontal() ? "left" : "top", r ? (y = Math.floor(n / 2) + a + d, w = Math.floor(n / 2) + a + l) : (y = n + (a - 1) + d, w = a + l);
				var C = Math.max((x || 0) - w, 0),
					E = Math.min((x || 0) + y, p.length - 1),
					T = (i.slidesGrid[C] || 0) - (i.slidesGrid[0] || 0);
				if(b(i.virtual, {
						from: C,
						to: E,
						offset: T,
						slidesGrid: i.slidesGrid
					}), u === C && c === E && !e) return i.slidesGrid !== f && T !== v && i.slides.css(g, T + "px"), void i.updateProgress();
				if(i.params.virtual.renderExternal) return i.params.virtual.renderExternal.call(i, {
					offset: T,
					from: C,
					to: E,
					slides: function() {
						for(var e = [], t = C; E >= t; t += 1) e.push(p[t]);
						return e
					}()
				}), void(i.params.virtual.renderExternalUpdate && t());
				var S = [],
					k = [];
				if(e) i.$wrapperEl.find("." + i.params.slideClass).remove();
				else
					for(var M = u; c >= M; M += 1)(C > M || M > E) && i.$wrapperEl.find("." + i.params.slideClass + '[data-swiper-slide-index="' + M + '"]').remove();
				for(var P = 0; P < p.length; P += 1) P >= C && E >= P && (void 0 === c || e ? k.push(P) : (P > c && k.push(P), u > P && S.push(P)));
				k.forEach(function(e) {
					i.$wrapperEl.append(m(p[e], e))
				}), S.sort(function(e, t) {
					return t - e
				}).forEach(function(e) {
					i.$wrapperEl.prepend(m(p[e], e))
				}), i.$wrapperEl.children(".swiper-slide").css(g, T + "px"), t()
			},
			renderSlide: function(e, t) {
				var i = this.params.virtual;
				if(i.cache && this.virtual.cache[t]) return this.virtual.cache[t];
				var s = p(i.renderSlide ? i.renderSlide.call(this, e, t) : '<div class="' + this.params.slideClass + '" data-swiper-slide-index="' + t + '">' + e + "</div>");
				return s.attr("data-swiper-slide-index") || s.attr("data-swiper-slide-index", t), i.cache && (this.virtual.cache[t] = s), s
			},
			appendSlide: function(e) {
				if("object" == typeof e && "length" in e)
					for(var t = 0; t < e.length; t += 1) e[t] && this.virtual.slides.push(e[t]);
				else this.virtual.slides.push(e);
				this.virtual.update(!0)
			},
			prependSlide: function(e) {
				var t = this.activeIndex,
					i = t + 1,
					s = 1;
				if(Array.isArray(e)) {
					for(var n = 0; n < e.length; n += 1) e[n] && this.virtual.slides.unshift(e[n]);
					i = t + e.length, s = e.length
				} else this.virtual.slides.unshift(e);
				if(this.params.virtual.cache) {
					var a = this.virtual.cache,
						r = {};
					Object.keys(a).forEach(function(e) {
						var t = a[e],
							i = t.attr("data-swiper-slide-index");
						i && t.attr("data-swiper-slide-index", parseInt(i, 10) + 1), r[parseInt(e, 10) + s] = t
					}), this.virtual.cache = r
				}
				this.virtual.update(!0), this.slideTo(i, 0)
			},
			removeSlide: function(e) {
				if(null != e) {
					var t = this.activeIndex;
					if(Array.isArray(e))
						for(var i = e.length - 1; i >= 0; i -= 1) this.virtual.slides.splice(e[i], 1), this.params.virtual.cache && delete this.virtual.cache[e[i]], e[i] < t && (t -= 1), t = Math.max(t, 0);
					else this.virtual.slides.splice(e, 1), this.params.virtual.cache && delete this.virtual.cache[e], t > e && (t -= 1), t = Math.max(t, 0);
					this.virtual.update(!0), this.slideTo(t, 0)
				}
			},
			removeAllSlides: function() {
				this.virtual.slides = [], this.params.virtual.cache && (this.virtual.cache = {}), this.virtual.update(!0), this.slideTo(0, 0)
			}
		},
		q = {
			name: "virtual",
			params: {
				virtual: {
					enabled: !1,
					slides: [],
					cache: !0,
					renderSlide: null,
					renderExternal: null,
					renderExternalUpdate: !0,
					addSlidesBefore: 0,
					addSlidesAfter: 0
				}
			},
			create: function() {
				y(this, {
					virtual: t(t({}, j), {}, {
						slides: this.params.virtual.slides,
						cache: {}
					})
				})
			},
			on: {
				beforeInit: function(e) {
					if(e.params.virtual.enabled) {
						e.classNames.push(e.params.containerModifierClass + "virtual");
						var t = {
							watchSlidesProgress: !0
						};
						b(e.params, t), b(e.originalParams, t), e.params.initialSlide || e.virtual.update()
					}
				},
				setTranslate: function(e) {
					e.params.virtual.enabled && e.virtual.update()
				}
			}
		},
		W = {
			handle: function(e) {
				var t = a(),
					i = n(),
					s = this.rtlTranslate,
					r = e;
				r.originalEvent && (r = r.originalEvent);
				var o = r.keyCode || r.charCode,
					l = this.params.keyboard.pageUpDown,
					d = l && 33 === o,
					h = l && 34 === o,
					u = 37 === o,
					c = 39 === o,
					p = 38 === o,
					f = 40 === o;
				if(!this.allowSlideNext && (this.isHorizontal() && c || this.isVertical() && f || h)) return !1;
				if(!this.allowSlidePrev && (this.isHorizontal() && u || this.isVertical() && p || d)) return !1;
				if(!(r.shiftKey || r.altKey || r.ctrlKey || r.metaKey || i.activeElement && i.activeElement.nodeName && ("input" === i.activeElement.nodeName.toLowerCase() || "textarea" === i.activeElement.nodeName.toLowerCase()))) {
					if(this.params.keyboard.onlyInViewport && (d || h || u || c || p || f)) {
						var m = !1;
						if(this.$el.parents("." + this.params.slideClass).length > 0 && 0 === this.$el.parents("." + this.params.slideActiveClass).length) return;
						var v = t.innerWidth,
							g = t.innerHeight,
							b = this.$el.offset();
						s && (b.left -= this.$el[0].scrollLeft);
						for(var y = [
								[b.left, b.top],
								[b.left + this.width, b.top],
								[b.left, b.top + this.height],
								[b.left + this.width, b.top + this.height]
							], w = 0; w < y.length; w += 1) {
							var x = y[w];
							x[0] >= 0 && x[0] <= v && x[1] >= 0 && x[1] <= g && (m = !0)
						}
						if(!m) return
					}
					this.isHorizontal() ? ((d || h || u || c) && (r.preventDefault ? r.preventDefault() : r.returnValue = !1), ((h || c) && !s || (d || u) && s) && this.slideNext(), ((d || u) && !s || (h || c) && s) && this.slidePrev()) : ((d || h || p || f) && (r.preventDefault ? r.preventDefault() : r.returnValue = !1), (h || f) && this.slideNext(), (d || p) && this.slidePrev()), this.emit("keyPress", o)
				}
			},
			enable: function() {
				var e = n();
				this.keyboard.enabled || (p(e).on("keydown", this.keyboard.handle), this.keyboard.enabled = !0)
			},
			disable: function() {
				var e = n();
				this.keyboard.enabled && (p(e).off("keydown", this.keyboard.handle), this.keyboard.enabled = !1)
			}
		},
		_ = {
			name: "keyboard",
			params: {
				keyboard: {
					enabled: !1,
					onlyInViewport: !0,
					pageUpDown: !0
				}
			},
			create: function() {
				y(this, {
					keyboard: t({
						enabled: !1
					}, W)
				})
			},
			on: {
				init: function(e) {
					e.params.keyboard.enabled && e.keyboard.enable()
				},
				destroy: function(e) {
					e.keyboard.enabled && e.keyboard.disable()
				}
			}
		},
		U = {
			lastScrollTime: m(),
			lastEventBeforeSnap: void 0,
			recentWheelEvents: [],
			event: function() {
				return a().navigator.userAgent.indexOf("firefox") > -1 ? "DOMMouseScroll" : function() {
					var e = n(),
						t = "onwheel" in e;
					if(!t) {
						var i = e.createElement("div");
						i.setAttribute("onwheel", "return;"), t = "function" == typeof i.onwheel
					}
					return !t && e.implementation && e.implementation.hasFeature && !0 !== e.implementation.hasFeature("", "") && (t = e.implementation.hasFeature("Events.wheel", "3.0")), t
				}() ? "wheel" : "mousewheel"
			},
			normalize: function(e) {
				var t = 0,
					i = 0,
					s = 0,
					n = 0;
				return "detail" in e && (i = e.detail), "wheelDelta" in e && (i = -e.wheelDelta / 120), "wheelDeltaY" in e && (i = -e.wheelDeltaY / 120), "wheelDeltaX" in e && (t = -e.wheelDeltaX / 120), "axis" in e && e.axis === e.HORIZONTAL_AXIS && (t = i, i = 0), s = 10 * t, n = 10 * i, "deltaY" in e && (n = e.deltaY), "deltaX" in e && (s = e.deltaX), e.shiftKey && !s && (s = n, n = 0), (s || n) && e.deltaMode && (1 === e.deltaMode ? (s *= 40, n *= 40) : (s *= 800, n *= 800)), s && !t && (t = 1 > s ? -1 : 1), n && !i && (i = 1 > n ? -1 : 1), {
					spinX: t,
					spinY: i,
					pixelX: s,
					pixelY: n
				}
			},
			handleMouseEnter: function() {
				this.mouseEntered = !0
			},
			handleMouseLeave: function() {
				this.mouseEntered = !1
			},
			handle: function(e) {
				var t = e,
					i = this,
					s = i.params.mousewheel;
				i.params.cssMode && t.preventDefault();
				var n = i.$el;
				if("container" !== i.params.mousewheel.eventsTarget && (n = p(i.params.mousewheel.eventsTarget)), !i.mouseEntered && !n[0].contains(t.target) && !s.releaseOnEdges) return !0;
				t.originalEvent && (t = t.originalEvent);
				var a = 0,
					r = i.rtlTranslate ? -1 : 1,
					o = U.normalize(t);
				if(s.forceToAxis)
					if(i.isHorizontal()) {
						if(!(Math.abs(o.pixelX) > Math.abs(o.pixelY))) return !0;
						a = -o.pixelX * r
					} else {
						if(!(Math.abs(o.pixelY) > Math.abs(o.pixelX))) return !0;
						a = -o.pixelY
					} else a = Math.abs(o.pixelX) > Math.abs(o.pixelY) ? -o.pixelX * r : -o.pixelY;
				if(0 === a) return !0;
				if(s.invert && (a = -a), i.params.freeMode) {
					var l = {
							time: m(),
							delta: Math.abs(a),
							direction: Math.sign(a)
						},
						d = i.mousewheel.lastEventBeforeSnap,
						h = d && l.time < d.time + 500 && l.delta <= d.delta && l.direction === d.direction;
					if(!h) {
						i.mousewheel.lastEventBeforeSnap = void 0, i.params.loop && i.loopFix();
						var u = i.getTranslate() + a * s.sensitivity,
							c = i.isBeginning,
							v = i.isEnd;
						if(u >= i.minTranslate() && (u = i.minTranslate()), u <= i.maxTranslate() && (u = i.maxTranslate()), i.setTransition(0), i.setTranslate(u), i.updateProgress(), i.updateActiveIndex(), i.updateSlidesClasses(), (!c && i.isBeginning || !v && i.isEnd) && i.updateSlidesClasses(), i.params.freeModeSticky) {
							clearTimeout(i.mousewheel.timeout), i.mousewheel.timeout = void 0;
							var g = i.mousewheel.recentWheelEvents;
							g.length >= 15 && g.shift();
							var b = g.length ? g[g.length - 1] : void 0,
								y = g[0];
							if(g.push(l), b && (l.delta > b.delta || l.direction !== b.direction)) g.splice(0);
							else if(g.length >= 15 && l.time - y.time < 500 && y.delta - l.delta >= 1 && l.delta <= 6) {
								var w = a > 0 ? .8 : .2;
								i.mousewheel.lastEventBeforeSnap = l, g.splice(0), i.mousewheel.timeout = f(function() {
									i.slideToClosest(i.params.speed, !0, void 0, w)
								}, 0)
							}
							i.mousewheel.timeout || (i.mousewheel.timeout = f(function() {
								i.mousewheel.lastEventBeforeSnap = l, g.splice(0), i.slideToClosest(i.params.speed, !0, void 0, .5)
							}, 500))
						}
						if(h || i.emit("scroll", t), i.params.autoplay && i.params.autoplayDisableOnInteraction && i.autoplay.stop(), u === i.minTranslate() || u === i.maxTranslate()) return !0
					}
				} else {
					var x = {
							time: m(),
							delta: Math.abs(a),
							direction: Math.sign(a),
							raw: e
						},
						C = i.mousewheel.recentWheelEvents;
					C.length >= 2 && C.shift();
					var E = C.length ? C[C.length - 1] : void 0;
					if(C.push(x), E ? (x.direction !== E.direction || x.delta > E.delta || x.time > E.time + 150) && i.mousewheel.animateSlider(x) : i.mousewheel.animateSlider(x), i.mousewheel.releaseScroll(x)) return !0
				}
				return t.preventDefault ? t.preventDefault() : t.returnValue = !1, !1
			},
			animateSlider: function(e) {
				var t = a();
				return !(this.params.mousewheel.thresholdDelta && e.delta < this.params.mousewheel.thresholdDelta || this.params.mousewheel.thresholdTime && m() - this.mousewheel.lastScrollTime < this.params.mousewheel.thresholdTime || !(e.delta >= 6 && m() - this.mousewheel.lastScrollTime < 60) && (e.direction < 0 ? this.isEnd && !this.params.loop || this.animating || (this.slideNext(), this.emit("scroll", e.raw)) : this.isBeginning && !this.params.loop || this.animating || (this.slidePrev(), this.emit("scroll", e.raw)), this.mousewheel.lastScrollTime = (new t.Date).getTime(), 1))
			},
			releaseScroll: function(e) {
				var t = this.params.mousewheel;
				if(e.direction < 0) {
					if(this.isEnd && !this.params.loop && t.releaseOnEdges) return !0
				} else if(this.isBeginning && !this.params.loop && t.releaseOnEdges) return !0;
				return !1
			},
			enable: function() {
				var e = U.event();
				if(this.params.cssMode) return this.wrapperEl.removeEventListener(e, this.mousewheel.handle), !0;
				if(!e) return !1;
				if(this.mousewheel.enabled) return !1;
				var t = this.$el;
				return "container" !== this.params.mousewheel.eventsTarget && (t = p(this.params.mousewheel.eventsTarget)), t.on("mouseenter", this.mousewheel.handleMouseEnter), t.on("mouseleave", this.mousewheel.handleMouseLeave), t.on(e, this.mousewheel.handle), this.mousewheel.enabled = !0, !0
			},
			disable: function() {
				var e = U.event();
				if(this.params.cssMode) return this.wrapperEl.addEventListener(e, this.mousewheel.handle), !0;
				if(!e) return !1;
				if(!this.mousewheel.enabled) return !1;
				var t = this.$el;
				return "container" !== this.params.mousewheel.eventsTarget && (t = p(this.params.mousewheel.eventsTarget)), t.off(e, this.mousewheel.handle), this.mousewheel.enabled = !1, !0
			}
		},
		K = {
			update: function() {
				var e = this.params.navigation;
				if(!this.params.loop) {
					var t = this.navigation,
						i = t.$nextEl,
						s = t.$prevEl;
					s && s.length > 0 && (this.isBeginning ? s.addClass(e.disabledClass) : s.removeClass(e.disabledClass), s[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](e.lockClass)), i && i.length > 0 && (this.isEnd ? i.addClass(e.disabledClass) : i.removeClass(e.disabledClass), i[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](e.lockClass))
				}
			},
			onPrevClick: function(e) {
				e.preventDefault(), this.isBeginning && !this.params.loop || this.slidePrev()
			},
			onNextClick: function(e) {
				e.preventDefault(), this.isEnd && !this.params.loop || this.slideNext()
			},
			init: function() {
				var e, t, i = this.params.navigation;
				(i.nextEl || i.prevEl) && (i.nextEl && (e = p(i.nextEl), this.params.uniqueNavElements && "string" == typeof i.nextEl && e.length > 1 && 1 === this.$el.find(i.nextEl).length && (e = this.$el.find(i.nextEl))), i.prevEl && (t = p(i.prevEl), this.params.uniqueNavElements && "string" == typeof i.prevEl && t.length > 1 && 1 === this.$el.find(i.prevEl).length && (t = this.$el.find(i.prevEl))), e && e.length > 0 && e.on("click", this.navigation.onNextClick), t && t.length > 0 && t.on("click", this.navigation.onPrevClick), b(this.navigation, {
					$nextEl: e,
					nextEl: e && e[0],
					$prevEl: t,
					prevEl: t && t[0]
				}))
			},
			destroy: function() {
				var e = this.navigation,
					t = e.$nextEl,
					i = e.$prevEl;
				t && t.length && (t.off("click", this.navigation.onNextClick), t.removeClass(this.params.navigation.disabledClass)), i && i.length && (i.off("click", this.navigation.onPrevClick), i.removeClass(this.params.navigation.disabledClass))
			}
		},
		Z = {
			update: function() {
				var e = this.rtl,
					t = this.params.pagination;
				if(t.el && this.pagination.el && this.pagination.$el && 0 !== this.pagination.$el.length) {
					var i, s = this.virtual && this.params.virtual.enabled ? this.virtual.slides.length : this.slides.length,
						n = this.pagination.$el,
						a = this.params.loop ? Math.ceil((s - 2 * this.loopedSlides) / this.params.slidesPerGroup) : this.snapGrid.length;
					if(this.params.loop ? ((i = Math.ceil((this.activeIndex - this.loopedSlides) / this.params.slidesPerGroup)) > s - 1 - 2 * this.loopedSlides && (i -= s - 2 * this.loopedSlides), i > a - 1 && (i -= a), 0 > i && "bullets" !== this.params.paginationType && (i = a + i)) : i = void 0 !== this.snapIndex ? this.snapIndex : this.activeIndex || 0, "bullets" === t.type && this.pagination.bullets && this.pagination.bullets.length > 0) {
						var r, o, l, d = this.pagination.bullets;
						if(t.dynamicBullets && (this.pagination.bulletSize = d.eq(0)[this.isHorizontal() ? "outerWidth" : "outerHeight"](!0), n.css(this.isHorizontal() ? "width" : "height", this.pagination.bulletSize * (t.dynamicMainBullets + 4) + "px"), t.dynamicMainBullets > 1 && void 0 !== this.previousIndex && (this.pagination.dynamicBulletIndex += i - this.previousIndex, this.pagination.dynamicBulletIndex > t.dynamicMainBullets - 1 ? this.pagination.dynamicBulletIndex = t.dynamicMainBullets - 1 : this.pagination.dynamicBulletIndex < 0 && (this.pagination.dynamicBulletIndex = 0)), r = i - this.pagination.dynamicBulletIndex, l = ((o = r + (Math.min(d.length, t.dynamicMainBullets) - 1)) + r) / 2), d.removeClass(t.bulletActiveClass + " " + t.bulletActiveClass + "-next " + t.bulletActiveClass + "-next-next " + t.bulletActiveClass + "-prev " + t.bulletActiveClass + "-prev-prev " + t.bulletActiveClass + "-main"), n.length > 1) d.each(function(e) {
							var s = p(e),
								n = s.index();
							n === i && s.addClass(t.bulletActiveClass), t.dynamicBullets && (n >= r && o >= n && s.addClass(t.bulletActiveClass + "-main"), n === r && s.prev().addClass(t.bulletActiveClass + "-prev").prev().addClass(t.bulletActiveClass + "-prev-prev"), n === o && s.next().addClass(t.bulletActiveClass + "-next").next().addClass(t.bulletActiveClass + "-next-next"))
						});
						else {
							var h = d.eq(i),
								u = h.index();
							if(h.addClass(t.bulletActiveClass), t.dynamicBullets) {
								for(var c = d.eq(r), f = d.eq(o), m = r; o >= m; m += 1) d.eq(m).addClass(t.bulletActiveClass + "-main");
								if(this.params.loop)
									if(u >= d.length - t.dynamicMainBullets) {
										for(var v = t.dynamicMainBullets; v >= 0; v -= 1) d.eq(d.length - v).addClass(t.bulletActiveClass + "-main");
										d.eq(d.length - t.dynamicMainBullets - 1).addClass(t.bulletActiveClass + "-prev")
									} else c.prev().addClass(t.bulletActiveClass + "-prev").prev().addClass(t.bulletActiveClass + "-prev-prev"), f.next().addClass(t.bulletActiveClass + "-next").next().addClass(t.bulletActiveClass + "-next-next");
								else c.prev().addClass(t.bulletActiveClass + "-prev").prev().addClass(t.bulletActiveClass + "-prev-prev"), f.next().addClass(t.bulletActiveClass + "-next").next().addClass(t.bulletActiveClass + "-next-next")
							}
						}
						if(t.dynamicBullets) {
							var g = Math.min(d.length, t.dynamicMainBullets + 4),
								b = (this.pagination.bulletSize * g - this.pagination.bulletSize) / 2 - l * this.pagination.bulletSize,
								y = e ? "right" : "left";
							d.css(this.isHorizontal() ? y : "top", b + "px")
						}
					}
					if("fraction" === t.type && (n.find("." + t.currentClass).text(t.formatFractionCurrent(i + 1)), n.find("." + t.totalClass).text(t.formatFractionTotal(a))), "progressbar" === t.type) {
						var w;
						w = t.progressbarOpposite ? this.isHorizontal() ? "vertical" : "horizontal" : this.isHorizontal() ? "horizontal" : "vertical";
						var x = (i + 1) / a,
							C = 1,
							E = 1;
						"horizontal" === w ? C = x : E = x, n.find("." + t.progressbarFillClass).transform("translate3d(0,0,0) scaleX(" + C + ") scaleY(" + E + ")").transition(this.params.speed)
					}
					"custom" === t.type && t.renderCustom ? (n.html(t.renderCustom(this, i + 1, a)), this.emit("paginationRender", n[0])) : this.emit("paginationUpdate", n[0]), n[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](t.lockClass)
				}
			},
			render: function() {
				var e = this.params.pagination;
				if(e.el && this.pagination.el && this.pagination.$el && 0 !== this.pagination.$el.length) {
					var t = this.virtual && this.params.virtual.enabled ? this.virtual.slides.length : this.slides.length,
						i = this.pagination.$el,
						s = "";
					if("bullets" === e.type) {
						for(var n = this.params.loop ? Math.ceil((t - 2 * this.loopedSlides) / this.params.slidesPerGroup) : this.snapGrid.length, a = 0; n > a; a += 1) s += e.renderBullet ? e.renderBullet.call(this, a, e.bulletClass) : "<" + e.bulletElement + ' class="' + e.bulletClass + '"></' + e.bulletElement + ">";
						i.html(s), this.pagination.bullets = i.find("." + e.bulletClass)
					}
					"fraction" === e.type && (s = e.renderFraction ? e.renderFraction.call(this, e.currentClass, e.totalClass) : '<span class="' + e.currentClass + '"></span> / <span class="' + e.totalClass + '"></span>', i.html(s)), "progressbar" === e.type && (s = e.renderProgressbar ? e.renderProgressbar.call(this, e.progressbarFillClass) : '<span class="' + e.progressbarFillClass + '"></span>', i.html(s)), "custom" !== e.type && this.emit("paginationRender", this.pagination.$el[0])
				}
			},
			init: function() {
				var e = this,
					t = e.params.pagination;
				if(t.el) {
					var i = p(t.el);
					0 !== i.length && (e.params.uniqueNavElements && "string" == typeof t.el && i.length > 1 && (i = e.$el.find(t.el)), "bullets" === t.type && t.clickable && i.addClass(t.clickableClass), i.addClass(t.modifierClass + t.type), "bullets" === t.type && t.dynamicBullets && (i.addClass("" + t.modifierClass + t.type + "-dynamic"), e.pagination.dynamicBulletIndex = 0, t.dynamicMainBullets < 1 && (t.dynamicMainBullets = 1)), "progressbar" === t.type && t.progressbarOpposite && i.addClass(t.progressbarOppositeClass), t.clickable && i.on("click", "." + t.bulletClass, function(t) {
						t.preventDefault();
						var i = p(this).index() * e.params.slidesPerGroup;
						e.params.loop && (i += e.loopedSlides), e.slideTo(i)
					}), b(e.pagination, {
						$el: i,
						el: i[0]
					}))
				}
			},
			destroy: function() {
				var e = this.params.pagination;
				if(e.el && this.pagination.el && this.pagination.$el && 0 !== this.pagination.$el.length) {
					var t = this.pagination.$el;
					t.removeClass(e.hiddenClass), t.removeClass(e.modifierClass + e.type), this.pagination.bullets && this.pagination.bullets.removeClass(e.bulletActiveClass), e.clickable && t.off("click", "." + e.bulletClass)
				}
			}
		},
		Q = {
			setTranslate: function() {
				if(this.params.scrollbar.el && this.scrollbar.el) {
					var e = this.scrollbar,
						t = this.rtlTranslate,
						i = this.progress,
						s = e.dragSize,
						n = e.trackSize,
						a = e.$dragEl,
						r = e.$el,
						o = this.params.scrollbar,
						l = s,
						d = (n - s) * i;
					t ? (d = -d) > 0 ? (l = s - d, d = 0) : -d + s > n && (l = n + d) : 0 > d ? (l = s + d, d = 0) : d + s > n && (l = n - d), this.isHorizontal() ? (a.transform("translate3d(" + d + "px, 0, 0)"), a[0].style.width = l + "px") : (a.transform("translate3d(0px, " + d + "px, 0)"), a[0].style.height = l + "px"), o.hide && (clearTimeout(this.scrollbar.timeout), r[0].style.opacity = 1, this.scrollbar.timeout = setTimeout(function() {
						r[0].style.opacity = 0, r.transition(400)
					}, 1e3))
				}
			},
			setTransition: function(e) {
				this.params.scrollbar.el && this.scrollbar.el && this.scrollbar.$dragEl.transition(e)
			},
			updateSize: function() {
				if(this.params.scrollbar.el && this.scrollbar.el) {
					var e = this.scrollbar,
						t = e.$dragEl,
						i = e.$el;
					t[0].style.width = "", t[0].style.height = "";
					var s, n = this.isHorizontal() ? i[0].offsetWidth : i[0].offsetHeight,
						a = this.size / this.virtualSize,
						r = a * (n / this.size);
					s = "auto" === this.params.scrollbar.dragSize ? n * a : parseInt(this.params.scrollbar.dragSize, 10), this.isHorizontal() ? t[0].style.width = s + "px" : t[0].style.height = s + "px", i[0].style.display = a >= 1 ? "none" : "", this.params.scrollbar.hide && (i[0].style.opacity = 0), b(e, {
						trackSize: n,
						divider: a,
						moveDivider: r,
						dragSize: s
					}), e.$el[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](this.params.scrollbar.lockClass)
				}
			},
			getPointerPosition: function(e) {
				return this.isHorizontal() ? "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].clientX : e.clientX : "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].clientY : e.clientY
			},
			setDragPosition: function(e) {
				var t, i = this.scrollbar,
					s = this.rtlTranslate,
					n = i.$el,
					a = i.dragSize,
					r = i.trackSize,
					o = i.dragStartPos;
				t = (i.getPointerPosition(e) - n.offset()[this.isHorizontal() ? "left" : "top"] - (null !== o ? o : a / 2)) / (r - a), t = Math.max(Math.min(t, 1), 0), s && (t = 1 - t);
				var l = this.minTranslate() + (this.maxTranslate() - this.minTranslate()) * t;
				this.updateProgress(l), this.setTranslate(l), this.updateActiveIndex(), this.updateSlidesClasses()
			},
			onDragStart: function(e) {
				var t = this.params.scrollbar,
					i = this.scrollbar,
					s = this.$wrapperEl,
					n = i.$el,
					a = i.$dragEl;
				this.scrollbar.isTouched = !0, this.scrollbar.dragStartPos = e.target === a[0] || e.target === a ? i.getPointerPosition(e) - e.target.getBoundingClientRect()[this.isHorizontal() ? "left" : "top"] : null, e.preventDefault(), e.stopPropagation(), s.transition(100), a.transition(100), i.setDragPosition(e), clearTimeout(this.scrollbar.dragTimeout), n.transition(0), t.hide && n.css("opacity", 1), this.params.cssMode && this.$wrapperEl.css("scroll-snap-type", "none"), this.emit("scrollbarDragStart", e)
			},
			onDragMove: function(e) {
				var t = this.scrollbar,
					i = this.$wrapperEl,
					s = t.$el,
					n = t.$dragEl;
				this.scrollbar.isTouched && (e.preventDefault ? e.preventDefault() : e.returnValue = !1, t.setDragPosition(e), i.transition(0), s.transition(0), n.transition(0), this.emit("scrollbarDragMove", e))
			},
			onDragEnd: function(e) {
				var t = this.params.scrollbar,
					i = this.scrollbar,
					s = this.$wrapperEl,
					n = i.$el;
				this.scrollbar.isTouched && (this.scrollbar.isTouched = !1, this.params.cssMode && (this.$wrapperEl.css("scroll-snap-type", ""), s.transition("")), t.hide && (clearTimeout(this.scrollbar.dragTimeout), this.scrollbar.dragTimeout = f(function() {
					n.css("opacity", 0), n.transition(400)
				}, 1e3)), this.emit("scrollbarDragEnd", e), t.snapOnRelease && this.slideToClosest())
			},
			enableDraggable: function() {
				if(this.params.scrollbar.el) {
					var e = n(),
						t = this.scrollbar,
						i = this.touchEventsTouch,
						s = this.touchEventsDesktop,
						a = this.params,
						r = this.support,
						o = t.$el[0],
						l = !(!r.passiveListener || !a.passiveListeners) && {
							passive: !1,
							capture: !1
						},
						d = !(!r.passiveListener || !a.passiveListeners) && {
							passive: !0,
							capture: !1
						};
					r.touch ? (o.addEventListener(i.start, this.scrollbar.onDragStart, l), o.addEventListener(i.move, this.scrollbar.onDragMove, l), o.addEventListener(i.end, this.scrollbar.onDragEnd, d)) : (o.addEventListener(s.start, this.scrollbar.onDragStart, l), e.addEventListener(s.move, this.scrollbar.onDragMove, l), e.addEventListener(s.end, this.scrollbar.onDragEnd, d))
				}
			},
			disableDraggable: function() {
				if(this.params.scrollbar.el) {
					var e = n(),
						t = this.scrollbar,
						i = this.touchEventsTouch,
						s = this.touchEventsDesktop,
						a = this.params,
						r = this.support,
						o = t.$el[0],
						l = !(!r.passiveListener || !a.passiveListeners) && {
							passive: !1,
							capture: !1
						},
						d = !(!r.passiveListener || !a.passiveListeners) && {
							passive: !0,
							capture: !1
						};
					r.touch ? (o.removeEventListener(i.start, this.scrollbar.onDragStart, l), o.removeEventListener(i.move, this.scrollbar.onDragMove, l), o.removeEventListener(i.end, this.scrollbar.onDragEnd, d)) : (o.removeEventListener(s.start, this.scrollbar.onDragStart, l), e.removeEventListener(s.move, this.scrollbar.onDragMove, l), e.removeEventListener(s.end, this.scrollbar.onDragEnd, d))
				}
			},
			init: function() {
				if(this.params.scrollbar.el) {
					var e = this.scrollbar,
						t = this.$el,
						i = this.params.scrollbar,
						s = p(i.el);
					this.params.uniqueNavElements && "string" == typeof i.el && s.length > 1 && 1 === t.find(i.el).length && (s = t.find(i.el));
					var n = s.find("." + this.params.scrollbar.dragClass);
					0 === n.length && (n = p('<div class="' + this.params.scrollbar.dragClass + '"></div>'), s.append(n)), b(e, {
						$el: s,
						el: s[0],
						$dragEl: n,
						dragEl: n[0]
					}), i.draggable && e.enableDraggable()
				}
			},
			destroy: function() {
				this.scrollbar.disableDraggable()
			}
		},
		J = {
			setTransform: function(e, t) {
				var i = this.rtl,
					s = p(e),
					n = i ? -1 : 1,
					a = s.attr("data-swiper-parallax") || "0",
					r = s.attr("data-swiper-parallax-x"),
					o = s.attr("data-swiper-parallax-y"),
					l = s.attr("data-swiper-parallax-scale"),
					d = s.attr("data-swiper-parallax-opacity");
				if(r || o ? (r = r || "0", o = o || "0") : this.isHorizontal() ? (r = a, o = "0") : (o = a, r = "0"), r = r.indexOf("%") >= 0 ? parseInt(r, 10) * t * n + "%" : r * t * n + "px", o = o.indexOf("%") >= 0 ? parseInt(o, 10) * t + "%" : o * t + "px", null != d) {
					var h = d - (d - 1) * (1 - Math.abs(t));
					s[0].style.opacity = h
				}
				if(null == l) s.transform("translate3d(" + r + ", " + o + ", 0px)");
				else {
					var u = l - (l - 1) * (1 - Math.abs(t));
					s.transform("translate3d(" + r + ", " + o + ", 0px) scale(" + u + ")")
				}
			},
			setTranslate: function() {
				var e = this,
					t = e.$el,
					i = e.slides,
					s = e.progress,
					n = e.snapGrid;
				t.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each(function(t) {
					e.parallax.setTransform(t, s)
				}), i.each(function(t, i) {
					var a = t.progress;
					e.params.slidesPerGroup > 1 && "auto" !== e.params.slidesPerView && (a += Math.ceil(i / 2) - s * (n.length - 1)), a = Math.min(Math.max(a, -1), 1), p(t).find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each(function(t) {
						e.parallax.setTransform(t, a)
					})
				})
			},
			setTransition: function(e) {
				void 0 === e && (e = this.params.speed), this.$el.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each(function(t) {
					var i = p(t),
						s = parseInt(i.attr("data-swiper-parallax-duration"), 10) || e;
					0 === e && (s = 0), i.transition(s)
				})
			}
		},
		ee = {
			getDistanceBetweenTouches: function(e) {
				if(e.targetTouches.length < 2) return 1;
				var t = e.targetTouches[0].pageX,
					i = e.targetTouches[0].pageY,
					s = e.targetTouches[1].pageX,
					n = e.targetTouches[1].pageY;
				return Math.sqrt(Math.pow(s - t, 2) + Math.pow(n - i, 2))
			},
			onGestureStart: function(e) {
				var t = this.support,
					i = this.params.zoom,
					s = this.zoom,
					n = s.gesture;
				if(s.fakeGestureTouched = !1, s.fakeGestureMoved = !1, !t.gestures) {
					if("touchstart" !== e.type || "touchstart" === e.type && e.targetTouches.length < 2) return;
					s.fakeGestureTouched = !0, n.scaleStart = ee.getDistanceBetweenTouches(e)
				}
				n.$slideEl && n.$slideEl.length || (n.$slideEl = p(e.target).closest("." + this.params.slideClass), 0 === n.$slideEl.length && (n.$slideEl = this.slides.eq(this.activeIndex)), n.$imageEl = n.$slideEl.find("img, svg, canvas, picture, .swiper-zoom-target"), n.$imageWrapEl = n.$imageEl.parent("." + i.containerClass), n.maxRatio = n.$imageWrapEl.attr("data-swiper-zoom") || i.maxRatio, 0 !== n.$imageWrapEl.length) ? (n.$imageEl && n.$imageEl.transition(0), this.zoom.isScaling = !0) : n.$imageEl = void 0
			},
			onGestureChange: function(e) {
				var t = this.support,
					i = this.params.zoom,
					s = this.zoom,
					n = s.gesture;
				if(!t.gestures) {
					if("touchmove" !== e.type || "touchmove" === e.type && e.targetTouches.length < 2) return;
					s.fakeGestureMoved = !0, n.scaleMove = ee.getDistanceBetweenTouches(e)
				}
				n.$imageEl && 0 !== n.$imageEl.length ? (t.gestures ? s.scale = e.scale * s.currentScale : s.scale = n.scaleMove / n.scaleStart * s.currentScale, s.scale > n.maxRatio && (s.scale = n.maxRatio - 1 + Math.pow(s.scale - n.maxRatio + 1, .5)), s.scale < i.minRatio && (s.scale = i.minRatio + 1 - Math.pow(i.minRatio - s.scale + 1, .5)), n.$imageEl.transform("translate3d(0,0,0) scale(" + s.scale + ")")) : "gesturechange" === e.type && s.onGestureStart(e)
			},
			onGestureEnd: function(e) {
				var t = this.device,
					i = this.support,
					s = this.params.zoom,
					n = this.zoom,
					a = n.gesture;
				if(!i.gestures) {
					if(!n.fakeGestureTouched || !n.fakeGestureMoved) return;
					if("touchend" !== e.type || "touchend" === e.type && e.changedTouches.length < 2 && !t.android) return;
					n.fakeGestureTouched = !1, n.fakeGestureMoved = !1
				}
				a.$imageEl && 0 !== a.$imageEl.length && (n.scale = Math.max(Math.min(n.scale, a.maxRatio), s.minRatio), a.$imageEl.transition(this.params.speed).transform("translate3d(0,0,0) scale(" + n.scale + ")"), n.currentScale = n.scale, n.isScaling = !1, 1 === n.scale && (a.$slideEl = void 0))
			},
			onTouchStart: function(e) {
				var t = this.device,
					i = this.zoom,
					s = i.gesture,
					n = i.image;
				s.$imageEl && 0 !== s.$imageEl.length && (n.isTouched || (t.android && e.cancelable && e.preventDefault(), n.isTouched = !0, n.touchesStart.x = "touchstart" === e.type ? e.targetTouches[0].pageX : e.pageX, n.touchesStart.y = "touchstart" === e.type ? e.targetTouches[0].pageY : e.pageY))
			},
			onTouchMove: function(e) {
				var t = this.zoom,
					i = t.gesture,
					s = t.image,
					n = t.velocity;
				if(i.$imageEl && 0 !== i.$imageEl.length && (this.allowClick = !1, s.isTouched && i.$slideEl)) {
					s.isMoved || (s.width = i.$imageEl[0].offsetWidth, s.height = i.$imageEl[0].offsetHeight, s.startX = v(i.$imageWrapEl[0], "x") || 0, s.startY = v(i.$imageWrapEl[0], "y") || 0, i.slideWidth = i.$slideEl[0].offsetWidth, i.slideHeight = i.$slideEl[0].offsetHeight, i.$imageWrapEl.transition(0), this.rtl && (s.startX = -s.startX, s.startY = -s.startY));
					var a = s.width * t.scale,
						r = s.height * t.scale;
					if(!(a < i.slideWidth && r < i.slideHeight)) {
						if(s.minX = Math.min(i.slideWidth / 2 - a / 2, 0), s.maxX = -s.minX, s.minY = Math.min(i.slideHeight / 2 - r / 2, 0), s.maxY = -s.minY, s.touchesCurrent.x = "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX, s.touchesCurrent.y = "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY, !s.isMoved && !t.isScaling) {
							if(this.isHorizontal() && (Math.floor(s.minX) === Math.floor(s.startX) && s.touchesCurrent.x < s.touchesStart.x || Math.floor(s.maxX) === Math.floor(s.startX) && s.touchesCurrent.x > s.touchesStart.x)) return void(s.isTouched = !1);
							if(!this.isHorizontal() && (Math.floor(s.minY) === Math.floor(s.startY) && s.touchesCurrent.y < s.touchesStart.y || Math.floor(s.maxY) === Math.floor(s.startY) && s.touchesCurrent.y > s.touchesStart.y)) return void(s.isTouched = !1)
						}
						e.cancelable && e.preventDefault(), e.stopPropagation(), s.isMoved = !0, s.currentX = s.touchesCurrent.x - s.touchesStart.x + s.startX, s.currentY = s.touchesCurrent.y - s.touchesStart.y + s.startY, s.currentX < s.minX && (s.currentX = s.minX + 1 - Math.pow(s.minX - s.currentX + 1, .8)), s.currentX > s.maxX && (s.currentX = s.maxX - 1 + Math.pow(s.currentX - s.maxX + 1, .8)), s.currentY < s.minY && (s.currentY = s.minY + 1 - Math.pow(s.minY - s.currentY + 1, .8)), s.currentY > s.maxY && (s.currentY = s.maxY - 1 + Math.pow(s.currentY - s.maxY + 1, .8)), n.prevPositionX || (n.prevPositionX = s.touchesCurrent.x), n.prevPositionY || (n.prevPositionY = s.touchesCurrent.y), n.prevTime || (n.prevTime = Date.now()), n.x = (s.touchesCurrent.x - n.prevPositionX) / (Date.now() - n.prevTime) / 2, n.y = (s.touchesCurrent.y - n.prevPositionY) / (Date.now() - n.prevTime) / 2, Math.abs(s.touchesCurrent.x - n.prevPositionX) < 2 && (n.x = 0), Math.abs(s.touchesCurrent.y - n.prevPositionY) < 2 && (n.y = 0), n.prevPositionX = s.touchesCurrent.x, n.prevPositionY = s.touchesCurrent.y, n.prevTime = Date.now(), i.$imageWrapEl.transform("translate3d(" + s.currentX + "px, " + s.currentY + "px,0)")
					}
				}
			},
			onTouchEnd: function() {
				var e = this.zoom,
					t = e.gesture,
					i = e.image,
					s = e.velocity;
				if(t.$imageEl && 0 !== t.$imageEl.length) {
					if(!i.isTouched || !i.isMoved) return i.isTouched = !1, void(i.isMoved = !1);
					i.isTouched = !1, i.isMoved = !1;
					var n = 300,
						a = 300,
						r = s.x * n,
						o = i.currentX + r,
						l = s.y * a,
						d = i.currentY + l;
					0 !== s.x && (n = Math.abs((o - i.currentX) / s.x)), 0 !== s.y && (a = Math.abs((d - i.currentY) / s.y));
					var h = Math.max(n, a);
					i.currentX = o, i.currentY = d;
					var u = i.width * e.scale,
						c = i.height * e.scale;
					i.minX = Math.min(t.slideWidth / 2 - u / 2, 0), i.maxX = -i.minX, i.minY = Math.min(t.slideHeight / 2 - c / 2, 0), i.maxY = -i.minY, i.currentX = Math.max(Math.min(i.currentX, i.maxX), i.minX), i.currentY = Math.max(Math.min(i.currentY, i.maxY), i.minY), t.$imageWrapEl.transition(h).transform("translate3d(" + i.currentX + "px, " + i.currentY + "px,0)")
				}
			},
			onTransitionEnd: function() {
				var e = this.zoom,
					t = e.gesture;
				t.$slideEl && this.previousIndex !== this.activeIndex && (t.$imageEl && t.$imageEl.transform("translate3d(0,0,0) scale(1)"), t.$imageWrapEl && t.$imageWrapEl.transform("translate3d(0,0,0)"), e.scale = 1, e.currentScale = 1, t.$slideEl = void 0, t.$imageEl = void 0, t.$imageWrapEl = void 0)
			},
			toggle: function(e) {
				var t = this.zoom;
				t.scale && 1 !== t.scale ? t.out() : t["in"](e)
			},
			"in": function(e) {
				var t, i, s, n, a, r, o, l, d, h, u, c, p, f, m, v, g = this.zoom,
					b = this.params.zoom,
					y = g.gesture,
					w = g.image;
				y.$slideEl || (this.params.virtual && this.params.virtual.enabled && this.virtual ? y.$slideEl = this.$wrapperEl.children("." + this.params.slideActiveClass) : y.$slideEl = this.slides.eq(this.activeIndex), y.$imageEl = y.$slideEl.find("img, svg, canvas, picture, .swiper-zoom-target"), y.$imageWrapEl = y.$imageEl.parent("." + b.containerClass)), y.$imageEl && 0 !== y.$imageEl.length && (y.$slideEl.addClass("" + b.zoomedSlideClass), void 0 === w.touchesStart.x && e ? (t = "touchend" === e.type ? e.changedTouches[0].pageX : e.pageX, i = "touchend" === e.type ? e.changedTouches[0].pageY : e.pageY) : (t = w.touchesStart.x, i = w.touchesStart.y), g.scale = y.$imageWrapEl.attr("data-swiper-zoom") || b.maxRatio, g.currentScale = y.$imageWrapEl.attr("data-swiper-zoom") || b.maxRatio, e ? (m = y.$slideEl[0].offsetWidth, v = y.$slideEl[0].offsetHeight, s = y.$slideEl.offset().left + m / 2 - t, n = y.$slideEl.offset().top + v / 2 - i, o = y.$imageEl[0].offsetWidth, l = y.$imageEl[0].offsetHeight, d = o * g.scale, h = l * g.scale, p = -(u = Math.min(m / 2 - d / 2, 0)), f = -(c = Math.min(v / 2 - h / 2, 0)), (a = s * g.scale) < u && (a = u), a > p && (a = p), (r = n * g.scale) < c && (r = c), r > f && (r = f)) : (a = 0, r = 0), y.$imageWrapEl.transition(300).transform("translate3d(" + a + "px, " + r + "px,0)"), y.$imageEl.transition(300).transform("translate3d(0,0,0) scale(" + g.scale + ")"))
			},
			out: function() {
				var e = this.zoom,
					t = this.params.zoom,
					i = e.gesture;
				i.$slideEl || (this.params.virtual && this.params.virtual.enabled && this.virtual ? i.$slideEl = this.$wrapperEl.children("." + this.params.slideActiveClass) : i.$slideEl = this.slides.eq(this.activeIndex), i.$imageEl = i.$slideEl.find("img, svg, canvas, picture, .swiper-zoom-target"), i.$imageWrapEl = i.$imageEl.parent("." + t.containerClass)), i.$imageEl && 0 !== i.$imageEl.length && (e.scale = 1, e.currentScale = 1, i.$imageWrapEl.transition(300).transform("translate3d(0,0,0)"), i.$imageEl.transition(300).transform("translate3d(0,0,0) scale(1)"), i.$slideEl.removeClass("" + t.zoomedSlideClass), i.$slideEl = void 0)
			},
			toggleGestures: function(e) {
				var t = this.zoom,
					i = t.slideSelector,
					s = t.passiveListener;
				this.$wrapperEl[e]("gesturestart", i, t.onGestureStart, s), this.$wrapperEl[e]("gesturechange", i, t.onGestureChange, s), this.$wrapperEl[e]("gestureend", i, t.onGestureEnd, s)
			},
			enableGestures: function() {
				this.zoom.gesturesEnabled || (this.zoom.gesturesEnabled = !0, this.zoom.toggleGestures("on"))
			},
			disableGestures: function() {
				this.zoom.gesturesEnabled && (this.zoom.gesturesEnabled = !1, this.zoom.toggleGestures("off"))
			},
			enable: function() {
				var e = this.support,
					t = this.zoom;
				if(!t.enabled) {
					t.enabled = !0;
					var i = !("touchstart" !== this.touchEvents.start || !e.passiveListener || !this.params.passiveListeners) && {
							passive: !0,
							capture: !1
						},
						s = !e.passiveListener || {
							passive: !1,
							capture: !0
						},
						n = "." + this.params.slideClass;
					this.zoom.passiveListener = i, this.zoom.slideSelector = n, e.gestures ? (this.$wrapperEl.on(this.touchEvents.start, this.zoom.enableGestures, i), this.$wrapperEl.on(this.touchEvents.end, this.zoom.disableGestures, i)) : "touchstart" === this.touchEvents.start && (this.$wrapperEl.on(this.touchEvents.start, n, t.onGestureStart, i), this.$wrapperEl.on(this.touchEvents.move, n, t.onGestureChange, s), this.$wrapperEl.on(this.touchEvents.end, n, t.onGestureEnd, i), this.touchEvents.cancel && this.$wrapperEl.on(this.touchEvents.cancel, n, t.onGestureEnd, i)), this.$wrapperEl.on(this.touchEvents.move, "." + this.params.zoom.containerClass, t.onTouchMove, s)
				}
			},
			disable: function() {
				var e = this.zoom;
				if(e.enabled) {
					var t = this.support;
					this.zoom.enabled = !1;
					var i = !("touchstart" !== this.touchEvents.start || !t.passiveListener || !this.params.passiveListeners) && {
							passive: !0,
							capture: !1
						},
						s = !t.passiveListener || {
							passive: !1,
							capture: !0
						},
						n = "." + this.params.slideClass;
					t.gestures ? (this.$wrapperEl.off(this.touchEvents.start, this.zoom.enableGestures, i), this.$wrapperEl.off(this.touchEvents.end, this.zoom.disableGestures, i)) : "touchstart" === this.touchEvents.start && (this.$wrapperEl.off(this.touchEvents.start, n, e.onGestureStart, i), this.$wrapperEl.off(this.touchEvents.move, n, e.onGestureChange, s), this.$wrapperEl.off(this.touchEvents.end, n, e.onGestureEnd, i), this.touchEvents.cancel && this.$wrapperEl.off(this.touchEvents.cancel, n, e.onGestureEnd, i)), this.$wrapperEl.off(this.touchEvents.move, "." + this.params.zoom.containerClass, e.onTouchMove, s)
				}
			}
		},
		te = {
			loadInSlide: function(e, t) {
				void 0 === t && (t = !0);
				var i = this,
					s = i.params.lazy;
				if(void 0 !== e && 0 !== i.slides.length) {
					var n = i.virtual && i.params.virtual.enabled ? i.$wrapperEl.children("." + i.params.slideClass + '[data-swiper-slide-index="' + e + '"]') : i.slides.eq(e),
						a = n.find("." + s.elementClass + ":not(." + s.loadedClass + "):not(." + s.loadingClass + ")");
					!n.hasClass(s.elementClass) || n.hasClass(s.loadedClass) || n.hasClass(s.loadingClass) || a.push(n[0]), 0 !== a.length && a.each(function(e) {
						var a = p(e);
						a.addClass(s.loadingClass);
						var r = a.attr("data-background"),
							o = a.attr("data-src"),
							l = a.attr("data-srcset"),
							d = a.attr("data-sizes"),
							h = a.parent("picture");
						i.loadImage(a[0], o || r, l, d, !1, function() {
							if(null != i && i && (!i || i.params) && !i.destroyed) {
								if(r ? (a.css("background-image", 'url("' + r + '")'), a.removeAttr("data-background")) : (l && (a.attr("srcset", l), a.removeAttr("data-srcset")), d && (a.attr("sizes", d), a.removeAttr("data-sizes")), h.length && h.children("source").each(function(e) {
										var t = p(e);
										t.attr("data-srcset") && (t.attr("srcset", t.attr("data-srcset")), t.removeAttr("data-srcset"))
									}), o && (a.attr("src", o), a.removeAttr("data-src"))), a.addClass(s.loadedClass).removeClass(s.loadingClass), n.find("." + s.preloaderClass).remove(), i.params.loop && t) {
									var e = n.attr("data-swiper-slide-index");
									if(n.hasClass(i.params.slideDuplicateClass)) {
										var u = i.$wrapperEl.children('[data-swiper-slide-index="' + e + '"]:not(.' + i.params.slideDuplicateClass + ")");
										i.lazy.loadInSlide(u.index(), !1)
									} else {
										var c = i.$wrapperEl.children("." + i.params.slideDuplicateClass + '[data-swiper-slide-index="' + e + '"]');
										i.lazy.loadInSlide(c.index(), !1)
									}
								}
								i.emit("lazyImageReady", n[0], a[0]), i.params.autoHeight && i.updateAutoHeight()
							}
						}), i.emit("lazyImageLoad", n[0], a[0])
					})
				}
			},
			load: function() {
				function e(e) {
					if(o) {
						if(s.children("." + n.slideClass + '[data-swiper-slide-index="' + e + '"]').length) return !0
					} else if(a[e]) return !0;
					return !1
				}

				function t(e) {
					return o ? p(e).attr("data-swiper-slide-index") : p(e).index()
				}
				var i = this,
					s = i.$wrapperEl,
					n = i.params,
					a = i.slides,
					r = i.activeIndex,
					o = i.virtual && n.virtual.enabled,
					l = n.lazy,
					d = n.slidesPerView;
				if("auto" === d && (d = 0), i.lazy.initialImageLoaded || (i.lazy.initialImageLoaded = !0), i.params.watchSlidesVisibility) s.children("." + n.slideVisibleClass).each(function(e) {
					var t = o ? p(e).attr("data-swiper-slide-index") : p(e).index();
					i.lazy.loadInSlide(t)
				});
				else if(d > 1)
					for(var h = r; r + d > h; h += 1) e(h) && i.lazy.loadInSlide(h);
				else i.lazy.loadInSlide(r);
				if(l.loadPrevNext)
					if(d > 1 || l.loadPrevNextAmount && l.loadPrevNextAmount > 1) {
						for(var u = l.loadPrevNextAmount, c = d, f = Math.min(r + c + Math.max(u, c), a.length), m = Math.max(r - Math.max(c, u), 0), v = r + d; f > v; v += 1) e(v) && i.lazy.loadInSlide(v);
						for(var g = m; r > g; g += 1) e(g) && i.lazy.loadInSlide(g)
					} else {
						var b = s.children("." + n.slideNextClass);
						b.length > 0 && i.lazy.loadInSlide(t(b));
						var y = s.children("." + n.slidePrevClass);
						y.length > 0 && i.lazy.loadInSlide(t(y))
					}
			}
		},
		ie = {
			LinearSpline: function(e, t) {
				var i, s, n, a, r, o = function(e, t) {
					for(s = -1, i = e.length; i - s > 1;) e[n = i + s >> 1] <= t ? s = n : i = n;
					return i
				};
				return this.x = e, this.y = t, this.lastIndex = e.length - 1, this.interpolate = function(e) {
					return e ? (r = o(this.x, e), a = r - 1, (e - this.x[a]) * (this.y[r] - this.y[a]) / (this.x[r] - this.x[a]) + this.y[a]) : 0
				}, this
			},
			getInterpolateFunction: function(e) {
				this.controller.spline || (this.controller.spline = this.params.loop ? new ie.LinearSpline(this.slidesGrid, e.slidesGrid) : new ie.LinearSpline(this.snapGrid, e.snapGrid))
			},
			setTranslate: function(e, t) {
				function i(e) {
					var t = a.rtlTranslate ? -a.translate : a.translate;
					"slide" === a.params.controller.by && (a.controller.getInterpolateFunction(e), n = -a.controller.spline.interpolate(-t)), n && "container" !== a.params.controller.by || (s = (e.maxTranslate() - e.minTranslate()) / (a.maxTranslate() - a.minTranslate()), n = (t - a.minTranslate()) * s + e.minTranslate()), a.params.controller.inverse && (n = e.maxTranslate() - n), e.updateProgress(n), e.setTranslate(n, a), e.updateActiveIndex(), e.updateSlidesClasses()
				}
				var s, n, a = this,
					r = a.controller.control,
					o = a.constructor;
				if(Array.isArray(r))
					for(var l = 0; l < r.length; l += 1) r[l] !== t && r[l] instanceof o && i(r[l]);
				else r instanceof o && t !== r && i(r)
			},
			setTransition: function(e, t) {
				function i(t) {
					t.setTransition(e, n), 0 !== e && (t.transitionStart(), t.params.autoHeight && f(function() {
						t.updateAutoHeight()
					}), t.$wrapperEl.transitionEnd(function() {
						r && (t.params.loop && "slide" === n.params.controller.by && t.loopFix(), t.transitionEnd())
					}))
				}
				var s, n = this,
					a = n.constructor,
					r = n.controller.control;
				if(Array.isArray(r))
					for(s = 0; s < r.length; s += 1) r[s] !== t && r[s] instanceof a && i(r[s]);
				else r instanceof a && t !== r && i(r)
			}
		},
		se = {
			makeElFocusable: function(e) {
				return e.attr("tabIndex", "0"), e
			},
			makeElNotFocusable: function(e) {
				return e.attr("tabIndex", "-1"), e
			},
			addElRole: function(e, t) {
				return e.attr("role", t), e
			},
			addElLabel: function(e, t) {
				return e.attr("aria-label", t), e
			},
			disableEl: function(e) {
				return e.attr("aria-disabled", !0), e
			},
			enableEl: function(e) {
				return e.attr("aria-disabled", !1), e
			},
			onEnterKey: function(e) {
				var t = this.params.a11y;
				if(13 === e.keyCode) {
					var i = p(e.target);
					this.navigation && this.navigation.$nextEl && i.is(this.navigation.$nextEl) && (this.isEnd && !this.params.loop || this.slideNext(), this.isEnd ? this.a11y.notify(t.lastSlideMessage) : this.a11y.notify(t.nextSlideMessage)), this.navigation && this.navigation.$prevEl && i.is(this.navigation.$prevEl) && (this.isBeginning && !this.params.loop || this.slidePrev(), this.isBeginning ? this.a11y.notify(t.firstSlideMessage) : this.a11y.notify(t.prevSlideMessage)), this.pagination && i.is("." + this.params.pagination.bulletClass) && i[0].click()
				}
			},
			notify: function(e) {
				var t = this.a11y.liveRegion;
				0 !== t.length && (t.html(""), t.html(e))
			},
			updateNavigation: function() {
				if(!this.params.loop && this.navigation) {
					var e = this.navigation,
						t = e.$nextEl,
						i = e.$prevEl;
					i && i.length > 0 && (this.isBeginning ? (this.a11y.disableEl(i), this.a11y.makeElNotFocusable(i)) : (this.a11y.enableEl(i), this.a11y.makeElFocusable(i))), t && t.length > 0 && (this.isEnd ? (this.a11y.disableEl(t), this.a11y.makeElNotFocusable(t)) : (this.a11y.enableEl(t), this.a11y.makeElFocusable(t)))
				}
			},
			updatePagination: function() {
				var e = this,
					t = e.params.a11y;
				e.pagination && e.params.pagination.clickable && e.pagination.bullets && e.pagination.bullets.length && e.pagination.bullets.each(function(i) {
					var s = p(i);
					e.a11y.makeElFocusable(s), e.a11y.addElRole(s, "button"), e.a11y.addElLabel(s, t.paginationBulletMessage.replace(/\{\{index\}\}/, s.index() + 1))
				})
			},
			init: function() {
				this.$el.append(this.a11y.liveRegion);
				var e, t, i = this.params.a11y;
				this.navigation && this.navigation.$nextEl && (e = this.navigation.$nextEl), this.navigation && this.navigation.$prevEl && (t = this.navigation.$prevEl), e && (this.a11y.makeElFocusable(e), this.a11y.addElRole(e, "button"), this.a11y.addElLabel(e, i.nextSlideMessage), e.on("keydown", this.a11y.onEnterKey)), t && (this.a11y.makeElFocusable(t), this.a11y.addElRole(t, "button"), this.a11y.addElLabel(t, i.prevSlideMessage), t.on("keydown", this.a11y.onEnterKey)), this.pagination && this.params.pagination.clickable && this.pagination.bullets && this.pagination.bullets.length && this.pagination.$el.on("keydown", "." + this.params.pagination.bulletClass, this.a11y.onEnterKey)
			},
			destroy: function() {
				var e, t;
				this.a11y.liveRegion && this.a11y.liveRegion.length > 0 && this.a11y.liveRegion.remove(), this.navigation && this.navigation.$nextEl && (e = this.navigation.$nextEl), this.navigation && this.navigation.$prevEl && (t = this.navigation.$prevEl), e && e.off("keydown", this.a11y.onEnterKey), t && t.off("keydown", this.a11y.onEnterKey), this.pagination && this.params.pagination.clickable && this.pagination.bullets && this.pagination.bullets.length && this.pagination.$el.off("keydown", "." + this.params.pagination.bulletClass, this.a11y.onEnterKey)
			}
		},
		ne = {
			init: function() {
				var e = a();
				if(this.params.history) {
					if(!e.history || !e.history.pushState) return this.params.history.enabled = !1, void(this.params.hashNavigation.enabled = !0);
					var t = this.history;
					t.initialized = !0, t.paths = ne.getPathValues(this.params.url), (t.paths.key || t.paths.value) && (t.scrollToSlide(0, t.paths.value, this.params.runCallbacksOnInit), this.params.history.replaceState || e.addEventListener("popstate", this.history.setHistoryPopState))
				}
			},
			destroy: function() {
				var e = a();
				this.params.history.replaceState || e.removeEventListener("popstate", this.history.setHistoryPopState)
			},
			setHistoryPopState: function() {
				this.history.paths = ne.getPathValues(this.params.url), this.history.scrollToSlide(this.params.speed, this.history.paths.value, !1)
			},
			getPathValues: function(e) {
				var t = a(),
					i = (e ? new URL(e) : t.location).pathname.slice(1).split("/").filter(function(e) {
						return "" !== e
					}),
					s = i.length;
				return {
					key: i[s - 2],
					value: i[s - 1]
				}
			},
			setHistory: function(e, t) {
				var i = a();
				if(this.history.initialized && this.params.history.enabled) {
					var s;
					s = this.params.url ? new URL(this.params.url) : i.location;
					var n = this.slides.eq(t),
						r = ne.slugify(n.attr("data-history"));
					s.pathname.includes(e) || (r = e + "/" + r);
					var o = i.history.state;
					o && o.value === r || (this.params.history.replaceState ? i.history.replaceState({
						value: r
					}, null, r) : i.history.pushState({
						value: r
					}, null, r))
				}
			},
			slugify: function(e) {
				return e.toString().replace(/\s+/g, "-").replace(/[^\w-]+/g, "").replace(/--+/g, "-").replace(/^-+/, "").replace(/-+$/, "")
			},
			scrollToSlide: function(e, t, i) {
				if(t)
					for(var s = 0, n = this.slides.length; n > s; s += 1) {
						var a = this.slides.eq(s);
						if(ne.slugify(a.attr("data-history")) === t && !a.hasClass(this.params.slideDuplicateClass)) {
							var r = a.index();
							this.slideTo(r, e, i)
						}
					} else this.slideTo(0, e, i)
			}
		},
		ae = {
			onHashCange: function() {
				var e = n();
				this.emit("hashChange");
				var t = e.location.hash.replace("#", "");
				if(t !== this.slides.eq(this.activeIndex).attr("data-hash")) {
					var i = this.$wrapperEl.children("." + this.params.slideClass + '[data-hash="' + t + '"]').index();
					if(void 0 === i) return;
					this.slideTo(i)
				}
			},
			setHash: function() {
				var e = a(),
					t = n();
				if(this.hashNavigation.initialized && this.params.hashNavigation.enabled)
					if(this.params.hashNavigation.replaceState && e.history && e.history.replaceState) e.history.replaceState(null, null, "#" + this.slides.eq(this.activeIndex).attr("data-hash") || ""), this.emit("hashSet");
					else {
						var i = this.slides.eq(this.activeIndex),
							s = i.attr("data-hash") || i.attr("data-history");
						t.location.hash = s || "", this.emit("hashSet")
					}
			},
			init: function() {
				var e = n(),
					t = a();
				if(!(!this.params.hashNavigation.enabled || this.params.history && this.params.history.enabled)) {
					this.hashNavigation.initialized = !0;
					var i = e.location.hash.replace("#", "");
					if(i)
						for(var s = 0, r = this.slides.length; r > s; s += 1) {
							var o = this.slides.eq(s);
							if((o.attr("data-hash") || o.attr("data-history")) === i && !o.hasClass(this.params.slideDuplicateClass)) {
								var l = o.index();
								this.slideTo(l, 0, this.params.runCallbacksOnInit, !0)
							}
						}
					this.params.hashNavigation.watchState && p(t).on("hashchange", this.hashNavigation.onHashCange)
				}
			},
			destroy: function() {
				var e = a();
				this.params.hashNavigation.watchState && p(e).off("hashchange", this.hashNavigation.onHashCange)
			}
		},
		re = {
			run: function() {
				var e = this,
					t = e.slides.eq(e.activeIndex),
					i = e.params.autoplay.delay;
				t.attr("data-swiper-autoplay") && (i = t.attr("data-swiper-autoplay") || e.params.autoplay.delay), clearTimeout(e.autoplay.timeout), e.autoplay.timeout = f(function() {
					e.params.autoplay.reverseDirection ? e.params.loop ? (e.loopFix(), e.slidePrev(e.params.speed, !0, !0), e.emit("autoplay")) : e.isBeginning ? e.params.autoplay.stopOnLastSlide ? e.autoplay.stop() : (e.slideTo(e.slides.length - 1, e.params.speed, !0, !0), e.emit("autoplay")) : (e.slidePrev(e.params.speed, !0, !0), e.emit("autoplay")) : e.params.loop ? (e.loopFix(), e.slideNext(e.params.speed, !0, !0), e.emit("autoplay")) : e.isEnd ? e.params.autoplay.stopOnLastSlide ? e.autoplay.stop() : (e.slideTo(0, e.params.speed, !0, !0), e.emit("autoplay")) : (e.slideNext(e.params.speed, !0, !0), e.emit("autoplay")), e.params.cssMode && e.autoplay.running && e.autoplay.run()
				}, i)
			},
			start: function() {
				return void 0 === this.autoplay.timeout && !this.autoplay.running && (this.autoplay.running = !0, this.emit("autoplayStart"), this.autoplay.run(), !0)
			},
			stop: function() {
				return !!this.autoplay.running && void 0 !== this.autoplay.timeout && (this.autoplay.timeout && (clearTimeout(this.autoplay.timeout), this.autoplay.timeout = void 0), this.autoplay.running = !1, this.emit("autoplayStop"), !0)
			},
			pause: function(e) {
				this.autoplay.running && (this.autoplay.paused || (this.autoplay.timeout && clearTimeout(this.autoplay.timeout), this.autoplay.paused = !0, 0 !== e && this.params.autoplay.waitForTransition ? (this.$wrapperEl[0].addEventListener("transitionend", this.autoplay.onTransitionEnd), this.$wrapperEl[0].addEventListener("webkitTransitionEnd", this.autoplay.onTransitionEnd)) : (this.autoplay.paused = !1, this.autoplay.run())))
			},
			onVisibilityChange: function() {
				var e = n();
				"hidden" === e.visibilityState && this.autoplay.running && this.autoplay.pause(), "visible" === e.visibilityState && this.autoplay.paused && (this.autoplay.run(), this.autoplay.paused = !1)
			},
			onTransitionEnd: function(e) {
				this && !this.destroyed && this.$wrapperEl && e.target === this.$wrapperEl[0] && (this.$wrapperEl[0].removeEventListener("transitionend", this.autoplay.onTransitionEnd), this.$wrapperEl[0].removeEventListener("webkitTransitionEnd", this.autoplay.onTransitionEnd), this.autoplay.paused = !1, this.autoplay.running ? this.autoplay.run() : this.autoplay.stop())
			}
		},
		oe = {
			setTranslate: function() {
				for(var e = this.slides, t = 0; t < e.length; t += 1) {
					var i = this.slides.eq(t),
						s = -i[0].swiperSlideOffset;
					this.params.virtualTranslate || (s -= this.translate);
					var n = 0;
					this.isHorizontal() || (n = s, s = 0);
					var a = this.params.fadeEffect.crossFade ? Math.max(1 - Math.abs(i[0].progress), 0) : 1 + Math.min(Math.max(i[0].progress, -1), 0);
					i.css({
						opacity: a
					}).transform("translate3d(" + s + "px, " + n + "px, 0px)")
				}
			},
			setTransition: function(e) {
				var t = this,
					i = t.slides,
					s = t.$wrapperEl;
				if(i.transition(e), t.params.virtualTranslate && 0 !== e) {
					var n = !1;
					i.transitionEnd(function() {
						if(!n && t && !t.destroyed) {
							n = !0, t.animating = !1;
							for(var e = ["webkitTransitionEnd", "transitionend"], i = 0; i < e.length; i += 1) s.trigger(e[i])
						}
					})
				}
			}
		},
		le = {
			setTranslate: function() {
				var e, t = this.$el,
					i = this.$wrapperEl,
					s = this.slides,
					n = this.width,
					a = this.height,
					r = this.rtlTranslate,
					o = this.size,
					l = this.browser,
					d = this.params.cubeEffect,
					h = this.isHorizontal(),
					u = this.virtual && this.params.virtual.enabled,
					c = 0;
				d.shadow && (h ? (0 === (e = i.find(".swiper-cube-shadow")).length && (e = p('<div class="swiper-cube-shadow"></div>'), i.append(e)), e.css({
					height: n + "px"
				})) : 0 === (e = t.find(".swiper-cube-shadow")).length && (e = p('<div class="swiper-cube-shadow"></div>'), t.append(e)));
				for(var f = 0; f < s.length; f += 1) {
					var m = s.eq(f),
						v = f;
					u && (v = parseInt(m.attr("data-swiper-slide-index"), 10));
					var g = 90 * v,
						b = Math.floor(g / 360);
					r && (g = -g, b = Math.floor(-g / 360));
					var y = Math.max(Math.min(m[0].progress, 1), -1),
						w = 0,
						x = 0,
						C = 0;
					v % 4 == 0 ? (w = 4 * -b * o, C = 0) : (v - 1) % 4 == 0 ? (w = 0, C = 4 * -b * o) : (v - 2) % 4 == 0 ? (w = o + 4 * b * o, C = o) : (v - 3) % 4 == 0 && (w = -o, C = 3 * o + 4 * o * b), r && (w = -w), h || (x = w, w = 0);
					var E = "rotateX(" + (h ? 0 : -g) + "deg) rotateY(" + (h ? g : 0) + "deg) translate3d(" + w + "px, " + x + "px, " + C + "px)";
					if(1 >= y && y > -1 && (c = 90 * v + 90 * y, r && (c = 90 * -v - 90 * y)), m.transform(E), d.slideShadows) {
						var T = h ? m.find(".swiper-slide-shadow-left") : m.find(".swiper-slide-shadow-top"),
							S = h ? m.find(".swiper-slide-shadow-right") : m.find(".swiper-slide-shadow-bottom");
						0 === T.length && (T = p('<div class="swiper-slide-shadow-' + (h ? "left" : "top") + '"></div>'), m.append(T)), 0 === S.length && (S = p('<div class="swiper-slide-shadow-' + (h ? "right" : "bottom") + '"></div>'), m.append(S)), T.length && (T[0].style.opacity = Math.max(-y, 0)), S.length && (S[0].style.opacity = Math.max(y, 0))
					}
				}
				if(i.css({
						"-webkit-transform-origin": "50% 50% -" + o / 2 + "px",
						"-moz-transform-origin": "50% 50% -" + o / 2 + "px",
						"-ms-transform-origin": "50% 50% -" + o / 2 + "px",
						"transform-origin": "50% 50% -" + o / 2 + "px"
					}), d.shadow)
					if(h) e.transform("translate3d(0px, " + (n / 2 + d.shadowOffset) + "px, " + -n / 2 + "px) rotateX(90deg) rotateZ(0deg) scale(" + d.shadowScale + ")");
					else {
						var k = Math.abs(c) - 90 * Math.floor(Math.abs(c) / 90),
							M = 1.5 - (Math.sin(2 * k * Math.PI / 360) / 2 + Math.cos(2 * k * Math.PI / 360) / 2),
							P = d.shadowScale,
							z = d.shadowScale / M,
							I = d.shadowOffset;
						e.transform("scale3d(" + P + ", 1, " + z + ") translate3d(0px, " + (a / 2 + I) + "px, " + -a / 2 / z + "px) rotateX(-90deg)")
					}
				var A = l.isSafari || l.isWebView ? -o / 2 : 0;
				i.transform("translate3d(0px,0," + A + "px) rotateX(" + (this.isHorizontal() ? 0 : c) + "deg) rotateY(" + (this.isHorizontal() ? -c : 0) + "deg)")
			},
			setTransition: function(e) {
				var t = this.$el;
				this.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), this.params.cubeEffect.shadow && !this.isHorizontal() && t.find(".swiper-cube-shadow").transition(e)
			}
		},
		de = {
			setTranslate: function() {
				for(var e = this.slides, t = this.rtlTranslate, i = 0; i < e.length; i += 1) {
					var s = e.eq(i),
						n = s[0].progress;
					this.params.flipEffect.limitRotation && (n = Math.max(Math.min(s[0].progress, 1), -1));
					var a = -180 * n,
						r = 0,
						o = -s[0].swiperSlideOffset,
						l = 0;
					if(this.isHorizontal() ? t && (a = -a) : (l = o, o = 0, r = -a, a = 0), s[0].style.zIndex = -Math.abs(Math.round(n)) + e.length, this.params.flipEffect.slideShadows) {
						var d = this.isHorizontal() ? s.find(".swiper-slide-shadow-left") : s.find(".swiper-slide-shadow-top"),
							h = this.isHorizontal() ? s.find(".swiper-slide-shadow-right") : s.find(".swiper-slide-shadow-bottom");
						0 === d.length && (d = p('<div class="swiper-slide-shadow-' + (this.isHorizontal() ? "left" : "top") + '"></div>'), s.append(d)), 0 === h.length && (h = p('<div class="swiper-slide-shadow-' + (this.isHorizontal() ? "right" : "bottom") + '"></div>'), s.append(h)), d.length && (d[0].style.opacity = Math.max(-n, 0)), h.length && (h[0].style.opacity = Math.max(n, 0))
					}
					s.transform("translate3d(" + o + "px, " + l + "px, 0px) rotateX(" + r + "deg) rotateY(" + a + "deg)")
				}
			},
			setTransition: function(e) {
				var t = this,
					i = t.slides,
					s = t.activeIndex,
					n = t.$wrapperEl;
				if(i.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), t.params.virtualTranslate && 0 !== e) {
					var a = !1;
					i.eq(s).transitionEnd(function() {
						if(!a && t && !t.destroyed) {
							a = !0, t.animating = !1;
							for(var e = ["webkitTransitionEnd", "transitionend"], i = 0; i < e.length; i += 1) n.trigger(e[i])
						}
					})
				}
			}
		},
		he = {
			setTranslate: function() {
				for(var e = this.width, t = this.height, i = this.slides, s = this.slidesSizesGrid, n = this.params.coverflowEffect, a = this.isHorizontal(), r = this.translate, o = a ? e / 2 - r : t / 2 - r, l = a ? n.rotate : -n.rotate, d = n.depth, h = 0, u = i.length; u > h; h += 1) {
					var c = i.eq(h),
						f = s[h],
						m = (o - c[0].swiperSlideOffset - f / 2) / f * n.modifier,
						v = a ? l * m : 0,
						g = a ? 0 : l * m,
						b = -d * Math.abs(m),
						y = n.stretch;
					"string" == typeof y && -1 !== y.indexOf("%") && (y = parseFloat(n.stretch) / 100 * f);
					var w = a ? 0 : y * m,
						x = a ? y * m : 0,
						C = 1 - (1 - n.scale) * Math.abs(m);
					Math.abs(x) < .001 && (x = 0), Math.abs(w) < .001 && (w = 0), Math.abs(b) < .001 && (b = 0), Math.abs(v) < .001 && (v = 0), Math.abs(g) < .001 && (g = 0), Math.abs(C) < .001 && (C = 0);
					var E = "translate3d(" + x + "px," + w + "px," + b + "px)  rotateX(" + g + "deg) rotateY(" + v + "deg) scale(" + C + ")";
					if(c.transform(E), c[0].style.zIndex = 1 - Math.abs(Math.round(m)), n.slideShadows) {
						var T = a ? c.find(".swiper-slide-shadow-left") : c.find(".swiper-slide-shadow-top"),
							S = a ? c.find(".swiper-slide-shadow-right") : c.find(".swiper-slide-shadow-bottom");
						0 === T.length && (T = p('<div class="swiper-slide-shadow-' + (a ? "left" : "top") + '"></div>'), c.append(T)), 0 === S.length && (S = p('<div class="swiper-slide-shadow-' + (a ? "right" : "bottom") + '"></div>'), c.append(S)), T.length && (T[0].style.opacity = m > 0 ? m : 0), S.length && (S[0].style.opacity = -m > 0 ? -m : 0)
					}
				}
			},
			setTransition: function(e) {
				this.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)
			}
		},
		ue = {
			init: function() {
				var e = this.params.thumbs;
				if(this.thumbs.initialized) return !1;
				this.thumbs.initialized = !0;
				var t = this.constructor;
				return e.swiper instanceof t ? (this.thumbs.swiper = e.swiper, b(this.thumbs.swiper.originalParams, {
					watchSlidesProgress: !0,
					slideToClickedSlide: !1
				}), b(this.thumbs.swiper.params, {
					watchSlidesProgress: !0,
					slideToClickedSlide: !1
				})) : g(e.swiper) && (this.thumbs.swiper = new t(b({}, e.swiper, {
					watchSlidesVisibility: !0,
					watchSlidesProgress: !0,
					slideToClickedSlide: !1
				})), this.thumbs.swiperCreated = !0), this.thumbs.swiper.$el.addClass(this.params.thumbs.thumbsContainerClass), this.thumbs.swiper.on("tap", this.thumbs.onThumbClick), !0
			},
			onThumbClick: function() {
				var e = this.thumbs.swiper;
				if(e) {
					var t = e.clickedIndex,
						i = e.clickedSlide;
					if(!(i && p(i).hasClass(this.params.thumbs.slideThumbActiveClass) || null == t)) {
						var s;
						if(s = e.params.loop ? parseInt(p(e.clickedSlide).attr("data-swiper-slide-index"), 10) : t, this.params.loop) {
							var n = this.activeIndex;
							this.slides.eq(n).hasClass(this.params.slideDuplicateClass) && (this.loopFix(), this._clientLeft = this.$wrapperEl[0].clientLeft, n = this.activeIndex);
							var a = this.slides.eq(n).prevAll('[data-swiper-slide-index="' + s + '"]').eq(0).index(),
								r = this.slides.eq(n).nextAll('[data-swiper-slide-index="' + s + '"]').eq(0).index();
							s = void 0 === a ? r : void 0 === r ? a : n - a > r - n ? r : a
						}
						this.slideTo(s)
					}
				}
			},
			update: function(e) {
				var t = this.thumbs.swiper;
				if(t) {
					var i = "auto" === t.params.slidesPerView ? t.slidesPerViewDynamic() : t.params.slidesPerView,
						s = this.params.thumbs.autoScrollOffset,
						n = s && !t.params.loop;
					if(this.realIndex !== t.realIndex || n) {
						var a, r, o = t.activeIndex;
						if(t.params.loop) {
							t.slides.eq(o).hasClass(t.params.slideDuplicateClass) && (t.loopFix(), t._clientLeft = t.$wrapperEl[0].clientLeft, o = t.activeIndex);
							var l = t.slides.eq(o).prevAll('[data-swiper-slide-index="' + this.realIndex + '"]').eq(0).index(),
								d = t.slides.eq(o).nextAll('[data-swiper-slide-index="' + this.realIndex + '"]').eq(0).index();
							a = void 0 === l ? d : void 0 === d ? l : d - o == o - l ? o : o - l > d - o ? d : l, r = this.activeIndex > this.previousIndex ? "next" : "prev"
						} else r = (a = this.realIndex) > this.previousIndex ? "next" : "prev";
						n && (a += "next" === r ? s : -1 * s), t.visibleSlidesIndexes && t.visibleSlidesIndexes.indexOf(a) < 0 && (t.params.centeredSlides ? a = a > o ? a - Math.floor(i / 2) + 1 : a + Math.floor(i / 2) - 1 : a > o && (a = a - i + 1), t.slideTo(a, e ? 0 : void 0))
					}
					var h = 1,
						u = this.params.thumbs.slideThumbActiveClass;
					if(this.params.slidesPerView > 1 && !this.params.centeredSlides && (h = this.params.slidesPerView), this.params.thumbs.multipleActiveThumbs || (h = 1), h = Math.floor(h), t.slides.removeClass(u), t.params.loop || t.params.virtual && t.params.virtual.enabled)
						for(var c = 0; h > c; c += 1) t.$wrapperEl.children('[data-swiper-slide-index="' + (this.realIndex + c) + '"]').addClass(u);
					else
						for(var p = 0; h > p; p += 1) t.slides.eq(this.realIndex + p).addClass(u)
				}
			}
		},
		ce = [q, _, {
			name: "mousewheel",
			params: {
				mousewheel: {
					enabled: !1,
					releaseOnEdges: !1,
					invert: !1,
					forceToAxis: !1,
					sensitivity: 1,
					eventsTarget: "container",
					thresholdDelta: null,
					thresholdTime: null
				}
			},
			create: function() {
				y(this, {
					mousewheel: {
						enabled: !1,
						lastScrollTime: m(),
						lastEventBeforeSnap: void 0,
						recentWheelEvents: [],
						enable: U.enable,
						disable: U.disable,
						handle: U.handle,
						handleMouseEnter: U.handleMouseEnter,
						handleMouseLeave: U.handleMouseLeave,
						animateSlider: U.animateSlider,
						releaseScroll: U.releaseScroll
					}
				})
			},
			on: {
				init: function(e) {
					!e.params.mousewheel.enabled && e.params.cssMode && e.mousewheel.disable(), e.params.mousewheel.enabled && e.mousewheel.enable()
				},
				destroy: function(e) {
					e.params.cssMode && e.mousewheel.enable(), e.mousewheel.enabled && e.mousewheel.disable()
				}
			}
		}, {
			name: "navigation",
			params: {
				navigation: {
					nextEl: null,
					prevEl: null,
					hideOnClick: !1,
					disabledClass: "swiper-button-disabled",
					hiddenClass: "swiper-button-hidden",
					lockClass: "swiper-button-lock"
				}
			},
			create: function() {
				y(this, {
					navigation: t({}, K)
				})
			},
			on: {
				init: function(e) {
					e.navigation.init(), e.navigation.update()
				},
				toEdge: function(e) {
					e.navigation.update()
				},
				fromEdge: function(e) {
					e.navigation.update()
				},
				destroy: function(e) {
					e.navigation.destroy()
				},
				click: function(e, t) {
					var i, s = e.navigation,
						n = s.$nextEl,
						a = s.$prevEl;
					!e.params.navigation.hideOnClick || p(t.target).is(a) || p(t.target).is(n) || (n ? i = n.hasClass(e.params.navigation.hiddenClass) : a && (i = a.hasClass(e.params.navigation.hiddenClass)), !0 === i ? e.emit("navigationShow") : e.emit("navigationHide"), n && n.toggleClass(e.params.navigation.hiddenClass), a && a.toggleClass(e.params.navigation.hiddenClass))
				}
			}
		}, {
			name: "pagination",
			params: {
				pagination: {
					el: null,
					bulletElement: "span",
					clickable: !1,
					hideOnClick: !1,
					renderBullet: null,
					renderProgressbar: null,
					renderFraction: null,
					renderCustom: null,
					progressbarOpposite: !1,
					type: "bullets",
					dynamicBullets: !1,
					dynamicMainBullets: 1,
					formatFractionCurrent: function(e) {
						return e
					},
					formatFractionTotal: function(e) {
						return e
					},
					bulletClass: "swiper-pagination-bullet",
					bulletActiveClass: "swiper-pagination-bullet-active",
					modifierClass: "swiper-pagination-",
					currentClass: "swiper-pagination-current",
					totalClass: "swiper-pagination-total",
					hiddenClass: "swiper-pagination-hidden",
					progressbarFillClass: "swiper-pagination-progressbar-fill",
					progressbarOppositeClass: "swiper-pagination-progressbar-opposite",
					clickableClass: "swiper-pagination-clickable",
					lockClass: "swiper-pagination-lock"
				}
			},
			create: function() {
				y(this, {
					pagination: t({
						dynamicBulletIndex: 0
					}, Z)
				})
			},
			on: {
				init: function(e) {
					e.pagination.init(), e.pagination.render(), e.pagination.update()
				},
				activeIndexChange: function(e) {
					(e.params.loop || void 0 === e.snapIndex) && e.pagination.update()
				},
				snapIndexChange: function(e) {
					e.params.loop || e.pagination.update()
				},
				slidesLengthChange: function(e) {
					e.params.loop && (e.pagination.render(), e.pagination.update())
				},
				snapGridLengthChange: function(e) {
					e.params.loop || (e.pagination.render(), e.pagination.update())
				},
				destroy: function(e) {
					e.pagination.destroy()
				},
				click: function(e, t) {
					e.params.pagination.el && e.params.pagination.hideOnClick && e.pagination.$el.length > 0 && !p(t.target).hasClass(e.params.pagination.bulletClass) && (!0 === e.pagination.$el.hasClass(e.params.pagination.hiddenClass) ? e.emit("paginationShow") : e.emit("paginationHide"), e.pagination.$el.toggleClass(e.params.pagination.hiddenClass))
				}
			}
		}, {
			name: "scrollbar",
			params: {
				scrollbar: {
					el: null,
					dragSize: "auto",
					hide: !1,
					draggable: !1,
					snapOnRelease: !0,
					lockClass: "swiper-scrollbar-lock",
					dragClass: "swiper-scrollbar-drag"
				}
			},
			create: function() {
				y(this, {
					scrollbar: t({
						isTouched: !1,
						timeout: null,
						dragTimeout: null
					}, Q)
				})
			},
			on: {
				init: function(e) {
					e.scrollbar.init(), e.scrollbar.updateSize(), e.scrollbar.setTranslate()
				},
				update: function(e) {
					e.scrollbar.updateSize()
				},
				resize: function(e) {
					e.scrollbar.updateSize()
				},
				observerUpdate: function(e) {
					e.scrollbar.updateSize()
				},
				setTranslate: function(e) {
					e.scrollbar.setTranslate()
				},
				setTransition: function(e, t) {
					e.scrollbar.setTransition(t)
				},
				destroy: function(e) {
					e.scrollbar.destroy()
				}
			}
		}, {
			name: "parallax",
			params: {
				parallax: {
					enabled: !1
				}
			},
			create: function() {
				y(this, {
					parallax: t({}, J)
				})
			},
			on: {
				beforeInit: function(e) {
					e.params.parallax.enabled && (e.params.watchSlidesProgress = !0, e.originalParams.watchSlidesProgress = !0)
				},
				init: function(e) {
					e.params.parallax.enabled && e.parallax.setTranslate()
				},
				setTranslate: function(e) {
					e.params.parallax.enabled && e.parallax.setTranslate()
				},
				setTransition: function(e, t) {
					e.params.parallax.enabled && e.parallax.setTransition(t)
				}
			}
		}, {
			name: "zoom",
			params: {
				zoom: {
					enabled: !1,
					maxRatio: 3,
					minRatio: 1,
					toggle: !0,
					containerClass: "swiper-zoom-container",
					zoomedSlideClass: "swiper-slide-zoomed"
				}
			},
			create: function() {
				var e = this;
				y(e, {
					zoom: t({
						enabled: !1,
						scale: 1,
						currentScale: 1,
						isScaling: !1,
						gesture: {
							$slideEl: void 0,
							slideWidth: void 0,
							slideHeight: void 0,
							$imageEl: void 0,
							$imageWrapEl: void 0,
							maxRatio: 3
						},
						image: {
							isTouched: void 0,
							isMoved: void 0,
							currentX: void 0,
							currentY: void 0,
							minX: void 0,
							minY: void 0,
							maxX: void 0,
							maxY: void 0,
							width: void 0,
							height: void 0,
							startX: void 0,
							startY: void 0,
							touchesStart: {},
							touchesCurrent: {}
						},
						velocity: {
							x: void 0,
							y: void 0,
							prevPositionX: void 0,
							prevPositionY: void 0,
							prevTime: void 0
						}
					}, ee)
				});
				var i = 1;
				Object.defineProperty(e.zoom, "scale", {
					get: function() {
						return i
					},
					set: function(t) {
						if(i !== t) {
							var s = e.zoom.gesture.$imageEl ? e.zoom.gesture.$imageEl[0] : void 0,
								n = e.zoom.gesture.$slideEl ? e.zoom.gesture.$slideEl[0] : void 0;
							e.emit("zoomChange", t, s, n)
						}
						i = t
					}
				})
			},
			on: {
				init: function(e) {
					e.params.zoom.enabled && e.zoom.enable()
				},
				destroy: function(e) {
					e.zoom.disable()
				},
				touchStart: function(e, t) {
					e.zoom.enabled && e.zoom.onTouchStart(t)
				},
				touchEnd: function(e, t) {
					e.zoom.enabled && e.zoom.onTouchEnd(t)
				},
				doubleTap: function(e, t) {
					e.params.zoom.enabled && e.zoom.enabled && e.params.zoom.toggle && e.zoom.toggle(t)
				},
				transitionEnd: function(e) {
					e.zoom.enabled && e.params.zoom.enabled && e.zoom.onTransitionEnd()
				},
				slideChange: function(e) {
					e.zoom.enabled && e.params.zoom.enabled && e.params.cssMode && e.zoom.onTransitionEnd()
				}
			}
		}, {
			name: "lazy",
			params: {
				lazy: {
					enabled: !1,
					loadPrevNext: !1,
					loadPrevNextAmount: 1,
					loadOnTransitionStart: !1,
					elementClass: "swiper-lazy",
					loadingClass: "swiper-lazy-loading",
					loadedClass: "swiper-lazy-loaded",
					preloaderClass: "swiper-lazy-preloader"
				}
			},
			create: function() {
				y(this, {
					lazy: t({
						initialImageLoaded: !1
					}, te)
				})
			},
			on: {
				beforeInit: function(e) {
					e.params.lazy.enabled && e.params.preloadImages && (e.params.preloadImages = !1)
				},
				init: function(e) {
					e.params.lazy.enabled && !e.params.loop && 0 === e.params.initialSlide && e.lazy.load()
				},
				scroll: function(e) {
					e.params.freeMode && !e.params.freeModeSticky && e.lazy.load()
				},
				resize: function(e) {
					e.params.lazy.enabled && e.lazy.load()
				},
				scrollbarDragMove: function(e) {
					e.params.lazy.enabled && e.lazy.load()
				},
				transitionStart: function(e) {
					e.params.lazy.enabled && (e.params.lazy.loadOnTransitionStart || !e.params.lazy.loadOnTransitionStart && !e.lazy.initialImageLoaded) && e.lazy.load()
				},
				transitionEnd: function(e) {
					e.params.lazy.enabled && !e.params.lazy.loadOnTransitionStart && e.lazy.load()
				},
				slideChange: function(e) {
					e.params.lazy.enabled && e.params.cssMode && e.lazy.load()
				}
			}
		}, {
			name: "controller",
			params: {
				controller: {
					control: void 0,
					inverse: !1,
					by: "slide"
				}
			},
			create: function() {
				y(this, {
					controller: t({
						control: this.params.controller.control
					}, ie)
				})
			},
			on: {
				update: function(e) {
					e.controller.control && e.controller.spline && (e.controller.spline = void 0, delete e.controller.spline)
				},
				resize: function(e) {
					e.controller.control && e.controller.spline && (e.controller.spline = void 0, delete e.controller.spline)
				},
				observerUpdate: function(e) {
					e.controller.control && e.controller.spline && (e.controller.spline = void 0, delete e.controller.spline)
				},
				setTranslate: function(e, t, i) {
					e.controller.control && e.controller.setTranslate(t, i)
				},
				setTransition: function(e, t, i) {
					e.controller.control && e.controller.setTransition(t, i)
				}
			}
		}, {
			name: "a11y",
			params: {
				a11y: {
					enabled: !0,
					notificationClass: "swiper-notification",
					prevSlideMessage: "Previous slide",
					nextSlideMessage: "Next slide",
					firstSlideMessage: "This is the first slide",
					lastSlideMessage: "This is the last slide",
					paginationBulletMessage: "Go to slide {{index}}"
				}
			},
			create: function() {
				y(this, {
					a11y: t(t({}, se), {}, {
						liveRegion: p('<span class="' + this.params.a11y.notificationClass + '" aria-live="assertive" aria-atomic="true"></span>')
					})
				})
			},
			on: {
				init: function(e) {
					e.params.a11y.enabled && (e.a11y.init(), e.a11y.updateNavigation())
				},
				toEdge: function(e) {
					e.params.a11y.enabled && e.a11y.updateNavigation()
				},
				fromEdge: function(e) {
					e.params.a11y.enabled && e.a11y.updateNavigation()
				},
				paginationUpdate: function(e) {
					e.params.a11y.enabled && e.a11y.updatePagination()
				},
				destroy: function(e) {
					e.params.a11y.enabled && e.a11y.destroy()
				}
			}
		}, {
			name: "history",
			params: {
				history: {
					enabled: !1,
					replaceState: !1,
					key: "slides"
				}
			},
			create: function() {
				y(this, {
					history: t({}, ne)
				})
			},
			on: {
				init: function(e) {
					e.params.history.enabled && e.history.init()
				},
				destroy: function(e) {
					e.params.history.enabled && e.history.destroy()
				},
				transitionEnd: function(e) {
					e.history.initialized && e.history.setHistory(e.params.history.key, e.activeIndex)
				},
				slideChange: function(e) {
					e.history.initialized && e.params.cssMode && e.history.setHistory(e.params.history.key, e.activeIndex)
				}
			}
		}, {
			name: "hash-navigation",
			params: {
				hashNavigation: {
					enabled: !1,
					replaceState: !1,
					watchState: !1
				}
			},
			create: function() {
				y(this, {
					hashNavigation: t({
						initialized: !1
					}, ae)
				})
			},
			on: {
				init: function(e) {
					e.params.hashNavigation.enabled && e.hashNavigation.init()
				},
				destroy: function(e) {
					e.params.hashNavigation.enabled && e.hashNavigation.destroy()
				},
				transitionEnd: function(e) {
					e.hashNavigation.initialized && e.hashNavigation.setHash()
				},
				slideChange: function(e) {
					e.hashNavigation.initialized && e.params.cssMode && e.hashNavigation.setHash()
				}
			}
		}, {
			name: "autoplay",
			params: {
				autoplay: {
					enabled: !1,
					delay: 3e3,
					waitForTransition: !0,
					disableOnInteraction: !0,
					stopOnLastSlide: !1,
					reverseDirection: !1
				}
			},
			create: function() {
				y(this, {
					autoplay: t(t({}, re), {}, {
						running: !1,
						paused: !1
					})
				})
			},
			on: {
				init: function(e) {
					e.params.autoplay.enabled && (e.autoplay.start(), n().addEventListener("visibilitychange", e.autoplay.onVisibilityChange))
				},
				beforeTransitionStart: function(e, t, i) {
					e.autoplay.running && (i || !e.params.autoplay.disableOnInteraction ? e.autoplay.pause(t) : e.autoplay.stop())
				},
				sliderFirstMove: function(e) {
					e.autoplay.running && (e.params.autoplay.disableOnInteraction ? e.autoplay.stop() : e.autoplay.pause())
				},
				touchEnd: function(e) {
					e.params.cssMode && e.autoplay.paused && !e.params.autoplay.disableOnInteraction && e.autoplay.run()
				},
				destroy: function(e) {
					e.autoplay.running && e.autoplay.stop(), n().removeEventListener("visibilitychange", e.autoplay.onVisibilityChange)
				}
			}
		}, {
			name: "effect-fade",
			params: {
				fadeEffect: {
					crossFade: !1
				}
			},
			create: function() {
				y(this, {
					fadeEffect: t({}, oe)
				})
			},
			on: {
				beforeInit: function(e) {
					if("fade" === e.params.effect) {
						e.classNames.push(e.params.containerModifierClass + "fade");
						var t = {
							slidesPerView: 1,
							slidesPerColumn: 1,
							slidesPerGroup: 1,
							watchSlidesProgress: !0,
							spaceBetween: 0,
							virtualTranslate: !0
						};
						b(e.params, t), b(e.originalParams, t)
					}
				},
				setTranslate: function(e) {
					"fade" === e.params.effect && e.fadeEffect.setTranslate()
				},
				setTransition: function(e, t) {
					"fade" === e.params.effect && e.fadeEffect.setTransition(t)
				}
			}
		}, {
			name: "effect-cube",
			params: {
				cubeEffect: {
					slideShadows: !0,
					shadow: !0,
					shadowOffset: 20,
					shadowScale: .94
				}
			},
			create: function() {
				y(this, {
					cubeEffect: t({}, le)
				})
			},
			on: {
				beforeInit: function(e) {
					if("cube" === e.params.effect) {
						e.classNames.push(e.params.containerModifierClass + "cube"), e.classNames.push(e.params.containerModifierClass + "3d");
						var t = {
							slidesPerView: 1,
							slidesPerColumn: 1,
							slidesPerGroup: 1,
							watchSlidesProgress: !0,
							resistanceRatio: 0,
							spaceBetween: 0,
							centeredSlides: !1,
							virtualTranslate: !0
						};
						b(e.params, t), b(e.originalParams, t)
					}
				},
				setTranslate: function(e) {
					"cube" === e.params.effect && e.cubeEffect.setTranslate()
				},
				setTransition: function(e, t) {
					"cube" === e.params.effect && e.cubeEffect.setTransition(t)
				}
			}
		}, {
			name: "effect-flip",
			params: {
				flipEffect: {
					slideShadows: !0,
					limitRotation: !0
				}
			},
			create: function() {
				y(this, {
					flipEffect: t({}, de)
				})
			},
			on: {
				beforeInit: function(e) {
					if("flip" === e.params.effect) {
						e.classNames.push(e.params.containerModifierClass + "flip"), e.classNames.push(e.params.containerModifierClass + "3d");
						var t = {
							slidesPerView: 1,
							slidesPerColumn: 1,
							slidesPerGroup: 1,
							watchSlidesProgress: !0,
							spaceBetween: 0,
							virtualTranslate: !0
						};
						b(e.params, t), b(e.originalParams, t)
					}
				},
				setTranslate: function(e) {
					"flip" === e.params.effect && e.flipEffect.setTranslate()
				},
				setTransition: function(e, t) {
					"flip" === e.params.effect && e.flipEffect.setTransition(t)
				}
			}
		}, {
			name: "effect-coverflow",
			params: {
				coverflowEffect: {
					rotate: 50,
					stretch: 0,
					depth: 100,
					scale: 1,
					modifier: 1,
					slideShadows: !0
				}
			},
			create: function() {
				y(this, {
					coverflowEffect: t({}, he)
				})
			},
			on: {
				beforeInit: function(e) {
					"coverflow" === e.params.effect && (e.classNames.push(e.params.containerModifierClass + "coverflow"), e.classNames.push(e.params.containerModifierClass + "3d"), e.params.watchSlidesProgress = !0, e.originalParams.watchSlidesProgress = !0)
				},
				setTranslate: function(e) {
					"coverflow" === e.params.effect && e.coverflowEffect.setTranslate()
				},
				setTransition: function(e, t) {
					"coverflow" === e.params.effect && e.coverflowEffect.setTransition(t)
				}
			}
		}, {
			name: "thumbs",
			params: {
				thumbs: {
					swiper: null,
					multipleActiveThumbs: !0,
					autoScrollOffset: 0,
					slideThumbActiveClass: "swiper-slide-thumb-active",
					thumbsContainerClass: "swiper-container-thumbs"
				}
			},
			create: function() {
				y(this, {
					thumbs: t({
						swiper: null,
						initialized: !1
					}, ue)
				})
			},
			on: {
				beforeInit: function(e) {
					var t = e.params.thumbs;
					t && t.swiper && (e.thumbs.init(), e.thumbs.update(!0))
				},
				slideChange: function(e) {
					e.thumbs.swiper && e.thumbs.update()
				},
				update: function(e) {
					e.thumbs.swiper && e.thumbs.update()
				},
				resize: function(e) {
					e.thumbs.swiper && e.thumbs.update()
				},
				observerUpdate: function(e) {
					e.thumbs.swiper && e.thumbs.update()
				},
				setTransition: function(e, t) {
					var i = e.thumbs.swiper;
					i && i.setTransition(t)
				},
				beforeDestroy: function(e) {
					var t = e.thumbs.swiper;
					t && e.thumbs.swiperCreated && t && t.destroy()
				}
			}
		}];
	return F.use(ce), F
}), ! function(e) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).Parallax = e()
}(function() {
	return function e(t, i, s) {
		function n(r, o) {
			if(!i[r]) {
				if(!t[r]) {
					var l = "function" == typeof require && require;
					if(!o && l) return l(r, !0);
					if(a) return a(r, !0);
					var d = new Error("Cannot find module '" + r + "'");
					throw d.code = "MODULE_NOT_FOUND", d
				}
				var h = i[r] = {
					exports: {}
				};
				t[r][0].call(h.exports, function(e) {
					var i = t[r][1][e];
					return n(i || e)
				}, h, h.exports, e, t, i, s)
			}
			return i[r].exports
		}
		for(var a = "function" == typeof require && require, r = 0; r < s.length; r++) n(s[r]);
		return n
	}({
		1: [function(e, t, i) {
			function s(e) {
				if(null === e || void 0 === e) throw new TypeError("Object.assign cannot be called with null or undefined");
				return Object(e)
			}
			var n = Object.getOwnPropertySymbols,
				a = Object.prototype.hasOwnProperty,
				r = Object.prototype.propertyIsEnumerable;
			t.exports = function() {
				try {
					if(!Object.assign) return !1;
					var e = new String("abc");
					if(e[5] = "de", "5" === Object.getOwnPropertyNames(e)[0]) return !1;
					for(var t = {}, i = 0; 10 > i; i++) t["_" + String.fromCharCode(i)] = i;
					if("0123456789" !== Object.getOwnPropertyNames(t).map(function(e) {
							return t[e]
						}).join("")) return !1;
					var s = {};
					return "abcdefghijklmnopqrst".split("").forEach(function(e) {
						s[e] = e
					}), "abcdefghijklmnopqrst" === Object.keys(Object.assign({}, s)).join("")
				} catch(e) {
					return !1
				}
			}() ? Object.assign : function(e, t) {
				for(var i, o, l = s(e), d = 1; d < arguments.length; d++) {
					i = Object(arguments[d]);
					for(var h in i) a.call(i, h) && (l[h] = i[h]);
					if(n) {
						o = n(i);
						for(var u = 0; u < o.length; u++) r.call(i, o[u]) && (l[o[u]] = i[o[u]])
					}
				}
				return l
			}
		}, {}],
		2: [function(e, t, i) {
			(function(e) {
				(function() {
					var i, s, n, a, r, o;
					"undefined" != typeof performance && null !== performance && performance.now ? t.exports = function() {
						return performance.now()
					} : void 0 !== e && null !== e && e.hrtime ? (t.exports = function() {
						return(i() - r) / 1e6
					}, s = e.hrtime, a = (i = function() {
						var e;
						return 1e9 * (e = s())[0] + e[1]
					})(), o = 1e9 * e.uptime(), r = a - o) : Date.now ? (t.exports = function() {
						return Date.now() - n
					}, n = Date.now()) : (t.exports = function() {
						return(new Date).getTime() - n
					}, n = (new Date).getTime())
				}).call(this)
			}).call(this, e("_process"))
		}, {
			_process: 3
		}],
		3: [function(e, t, i) {
			function s() {
				throw new Error("setTimeout has not been defined")
			}

			function n() {
				throw new Error("clearTimeout has not been defined")
			}

			function a(e) {
				if(u === setTimeout) return setTimeout(e, 0);
				if((u === s || !u) && setTimeout) return u = setTimeout, setTimeout(e, 0);
				try {
					return u(e, 0)
				} catch(t) {
					try {
						return u.call(null, e, 0)
					} catch(t) {
						return u.call(this, e, 0)
					}
				}
			}

			function r(e) {
				if(c === clearTimeout) return clearTimeout(e);
				if((c === n || !c) && clearTimeout) return c = clearTimeout, clearTimeout(e);
				try {
					return c(e)
				} catch(t) {
					try {
						return c.call(null, e)
					} catch(t) {
						return c.call(this, e)
					}
				}
			}

			function o() {
				v && f && (v = !1, f.length ? m = f.concat(m) : g = -1, m.length && l())
			}

			function l() {
				if(!v) {
					var e = a(o);
					v = !0;
					for(var t = m.length; t;) {
						for(f = m, m = []; ++g < t;) f && f[g].run();
						g = -1, t = m.length
					}
					f = null, v = !1, r(e)
				}
			}

			function d(e, t) {
				this.fun = e, this.array = t
			}

			function h() {}
			var u, c, p = t.exports = {};
			! function() {
				try {
					u = "function" == typeof setTimeout ? setTimeout : s
				} catch(e) {
					u = s
				}
				try {
					c = "function" == typeof clearTimeout ? clearTimeout : n
				} catch(e) {
					c = n
				}
			}();
			var f, m = [],
				v = !1,
				g = -1;
			p.nextTick = function(e) {
				var t = new Array(arguments.length - 1);
				if(arguments.length > 1)
					for(var i = 1; i < arguments.length; i++) t[i - 1] = arguments[i];
				m.push(new d(e, t)), 1 !== m.length || v || a(l)
			}, d.prototype.run = function() {
				this.fun.apply(null, this.array)
			}, p.title = "browser", p.browser = !0, p.env = {}, p.argv = [], p.version = "", p.versions = {}, p.on = h, p.addListener = h, p.once = h, p.off = h, p.removeListener = h, p.removeAllListeners = h, p.emit = h, p.prependListener = h, p.prependOnceListener = h, p.listeners = function(e) {
				return []
			}, p.binding = function(e) {
				throw new Error("process.binding is not supported")
			}, p.cwd = function() {
				return "/"
			}, p.chdir = function(e) {
				throw new Error("process.chdir is not supported")
			}, p.umask = function() {
				return 0
			}
		}, {}],
		4: [function(e, t, i) {
			(function(i) {
				for(var s = e("performance-now"), n = "undefined" == typeof window ? i : window, a = ["moz", "webkit"], r = "AnimationFrame", o = n["request" + r], l = n["cancel" + r] || n["cancelRequest" + r], d = 0; !o && d < a.length; d++) o = n[a[d] + "Request" + r], l = n[a[d] + "Cancel" + r] || n[a[d] + "CancelRequest" + r];
				if(!o || !l) {
					var h = 0,
						u = 0,
						c = [];
					o = function(e) {
						if(0 === c.length) {
							var t = s(),
								i = Math.max(0, 1e3 / 60 - (t - h));
							h = i + t, setTimeout(function() {
								var e = c.slice(0);
								c.length = 0;
								for(var t = 0; t < e.length; t++)
									if(!e[t].cancelled) try {
										e[t].callback(h)
									} catch(e) {
										setTimeout(function() {
											throw e
										}, 0)
									}
							}, Math.round(i))
						}
						return c.push({
							handle: ++u,
							callback: e,
							cancelled: !1
						}), u
					}, l = function(e) {
						for(var t = 0; t < c.length; t++) c[t].handle === e && (c[t].cancelled = !0)
					}
				}
				t.exports = function(e) {
					return o.call(n, e)
				}, t.exports.cancel = function() {
					l.apply(n, arguments)
				}, t.exports.polyfill = function() {
					n.requestAnimationFrame = o, n.cancelAnimationFrame = l
				}
			}).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
		}, {
			"performance-now": 2
		}],
		5: [function(e, t, i) {
			function s(e, t) {
				if(!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
			}
			var n = function() {
					function e(e, t) {
						for(var i = 0; i < t.length; i++) {
							var s = t[i];
							s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
						}
					}
					return function(t, i, s) {
						return i && e(t.prototype, i), s && e(t, s), t
					}
				}(),
				a = e("raf"),
				r = e("object-assign"),
				o = {
					propertyCache: {},
					vendors: [null, ["-webkit-", "webkit"],
						["-moz-", "Moz"],
						["-o-", "O"],
						["-ms-", "ms"]
					],
					clamp: function(e, t, i) {
						return i > t ? t > e ? t : e > i ? i : e : i > e ? i : e > t ? t : e
					},
					data: function(e, t) {
						return o.deserialize(e.getAttribute("data-" + t))
					},
					deserialize: function(e) {
						return "true" === e || "false" !== e && ("null" === e ? null : !isNaN(parseFloat(e)) && isFinite(e) ? parseFloat(e) : e)
					},
					camelCase: function(e) {
						return e.replace(/-+(.)?/g, function(e, t) {
							return t ? t.toUpperCase() : ""
						})
					},
					accelerate: function(e) {
						o.css(e, "transform", "translate3d(0,0,0) rotate(0.0001deg)"), o.css(e, "transform-style", "preserve-3d"), o.css(e, "backface-visibility", "hidden")
					},
					transformSupport: function(e) {
						for(var t = document.createElement("div"), i = !1, s = null, n = !1, a = null, r = null, l = 0, d = o.vendors.length; d > l; l++)
							if(null !== o.vendors[l] ? (a = o.vendors[l][0] + "transform", r = o.vendors[l][1] + "Transform") : (a = "transform", r = "transform"), void 0 !== t.style[r]) {
								i = !0;
								break
							}
						switch(e) {
							case "2D":
								n = i;
								break;
							case "3D":
								if(i) {
									var h = document.body || document.createElement("body"),
										u = document.documentElement,
										c = u.style.overflow,
										p = !1;
									document.body || (p = !0, u.style.overflow = "hidden", u.appendChild(h), h.style.overflow = "hidden", h.style.background = ""), h.appendChild(t), t.style[r] = "translate3d(1px,1px,1px)", n = void 0 !== (s = window.getComputedStyle(t).getPropertyValue(a)) && s.length > 0 && "none" !== s, u.style.overflow = c, h.removeChild(t), p && (h.removeAttribute("style"), h.parentNode.removeChild(h))
								}
						}
						return n
					},
					css: function(e, t, i) {
						var s = o.propertyCache[t];
						if(!s)
							for(var n = 0, a = o.vendors.length; a > n; n++)
								if(s = null !== o.vendors[n] ? o.camelCase(o.vendors[n][1] + "-" + t) : t, void 0 !== e.style[s]) {
									o.propertyCache[t] = s;
									break
								}
						e.style[s] = i
					}
				},
				l = {
					relativeInput: !1,
					clipRelativeInput: !1,
					inputElement: null,
					hoverOnly: !1,
					calibrationThreshold: 100,
					calibrationDelay: 500,
					supportDelay: 500,
					calibrateX: !1,
					calibrateY: !0,
					invertX: !0,
					invertY: !0,
					limitX: !1,
					limitY: !1,
					scalarX: 10,
					scalarY: 10,
					frictionX: .1,
					frictionY: .1,
					originX: .5,
					originY: .5,
					pointerEvents: !1,
					precision: 1,
					onReady: null,
					selector: null
				},
				d = function() {
					function e(t, i) {
						s(this, e), this.element = t;
						var n = {
							calibrateX: o.data(this.element, "calibrate-x"),
							calibrateY: o.data(this.element, "calibrate-y"),
							invertX: o.data(this.element, "invert-x"),
							invertY: o.data(this.element, "invert-y"),
							limitX: o.data(this.element, "limit-x"),
							limitY: o.data(this.element, "limit-y"),
							scalarX: o.data(this.element, "scalar-x"),
							scalarY: o.data(this.element, "scalar-y"),
							frictionX: o.data(this.element, "friction-x"),
							frictionY: o.data(this.element, "friction-y"),
							originX: o.data(this.element, "origin-x"),
							originY: o.data(this.element, "origin-y"),
							pointerEvents: o.data(this.element, "pointer-events"),
							precision: o.data(this.element, "precision"),
							relativeInput: o.data(this.element, "relative-input"),
							clipRelativeInput: o.data(this.element, "clip-relative-input"),
							hoverOnly: o.data(this.element, "hover-only"),
							inputElement: document.querySelector(o.data(this.element, "input-element")),
							selector: o.data(this.element, "selector")
						};
						for(var a in n) null === n[a] && delete n[a];
						r(this, l, n, i), this.inputElement || (this.inputElement = this.element), this.calibrationTimer = null, this.calibrationFlag = !0, this.enabled = !1, this.depthsX = [], this.depthsY = [], this.raf = null, this.bounds = null, this.elementPositionX = 0, this.elementPositionY = 0, this.elementWidth = 0, this.elementHeight = 0, this.elementCenterX = 0, this.elementCenterY = 0, this.elementRangeX = 0, this.elementRangeY = 0, this.calibrationX = 0, this.calibrationY = 0, this.inputX = 0, this.inputY = 0, this.motionX = 0, this.motionY = 0, this.velocityX = 0, this.velocityY = 0, this.onMouseMove = this.onMouseMove.bind(this), this.onDeviceOrientation = this.onDeviceOrientation.bind(this), this.onDeviceMotion = this.onDeviceMotion.bind(this), this.onOrientationTimer = this.onOrientationTimer.bind(this), this.onMotionTimer = this.onMotionTimer.bind(this), this.onCalibrationTimer = this.onCalibrationTimer.bind(this), this.onAnimationFrame = this.onAnimationFrame.bind(this), this.onWindowResize = this.onWindowResize.bind(this), this.windowWidth = null, this.windowHeight = null, this.windowCenterX = null, this.windowCenterY = null, this.windowRadiusX = null, this.windowRadiusY = null, this.portrait = !1, this.desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i), this.motionSupport = !!window.DeviceMotionEvent && !this.desktop, this.orientationSupport = !!window.DeviceOrientationEvent && !this.desktop, this.orientationStatus = 0, this.motionStatus = 0, this.initialise()
					}
					return n(e, [{
						key: "initialise",
						value: function() {
							void 0 === this.transform2DSupport && (this.transform2DSupport = o.transformSupport("2D"), this.transform3DSupport = o.transformSupport("3D")), this.transform3DSupport && o.accelerate(this.element), "static" === window.getComputedStyle(this.element).getPropertyValue("position") && (this.element.style.position = "relative"), this.pointerEvents || (this.element.style.pointerEvents = "none"), this.updateLayers(), this.updateDimensions(), this.enable(), this.queueCalibration(this.calibrationDelay)
						}
					}, {
						key: "doReadyCallback",
						value: function() {
							this.onReady && this.onReady()
						}
					}, {
						key: "updateLayers",
						value: function() {
							this.selector ? this.layers = this.element.querySelectorAll(this.selector) : this.layers = this.element.children, this.layers.length || console.warn("ParallaxJS: Your scene does not have any layers."), this.depthsX = [], this.depthsY = [];
							for(var e = 0; e < this.layers.length; e++) {
								var t = this.layers[e];
								this.transform3DSupport && o.accelerate(t), t.style.position = e ? "absolute" : "relative", t.style.display = "block", t.style.left = 0, t.style.top = 0;
								var i = o.data(t, "depth") || 0;
								this.depthsX.push(o.data(t, "depth-x") || i), this.depthsY.push(o.data(t, "depth-y") || i)
							}
						}
					}, {
						key: "updateDimensions",
						value: function() {
							this.windowWidth = window.innerWidth, this.windowHeight = window.innerHeight, this.windowCenterX = this.windowWidth * this.originX, this.windowCenterY = this.windowHeight * this.originY, this.windowRadiusX = Math.max(this.windowCenterX, this.windowWidth - this.windowCenterX), this.windowRadiusY = Math.max(this.windowCenterY, this.windowHeight - this.windowCenterY)
						}
					}, {
						key: "updateBounds",
						value: function() {
							this.bounds = this.inputElement.getBoundingClientRect(), this.elementPositionX = this.bounds.left, this.elementPositionY = this.bounds.top, this.elementWidth = this.bounds.width, this.elementHeight = this.bounds.height, this.elementCenterX = this.elementWidth * this.originX, this.elementCenterY = this.elementHeight * this.originY, this.elementRangeX = Math.max(this.elementCenterX, this.elementWidth - this.elementCenterX), this.elementRangeY = Math.max(this.elementCenterY, this.elementHeight - this.elementCenterY)
						}
					}, {
						key: "queueCalibration",
						value: function(e) {
							clearTimeout(this.calibrationTimer), this.calibrationTimer = setTimeout(this.onCalibrationTimer, e)
						}
					}, {
						key: "enable",
						value: function() {
							this.enabled || (this.enabled = !0, this.orientationSupport ? (this.portrait = !1, window.addEventListener("deviceorientation", this.onDeviceOrientation), this.detectionTimer = setTimeout(this.onOrientationTimer, this.supportDelay)) : this.motionSupport ? (this.portrait = !1, window.addEventListener("devicemotion", this.onDeviceMotion), this.detectionTimer = setTimeout(this.onMotionTimer, this.supportDelay)) : (this.calibrationX = 0, this.calibrationY = 0, this.portrait = !1, window.addEventListener("mousemove", this.onMouseMove), this.doReadyCallback()), window.addEventListener("resize", this.onWindowResize), this.raf = a(this.onAnimationFrame))
						}
					}, {
						key: "disable",
						value: function() {
							this.enabled && (this.enabled = !1, this.orientationSupport ? window.removeEventListener("deviceorientation", this.onDeviceOrientation) : this.motionSupport ? window.removeEventListener("devicemotion", this.onDeviceMotion) : window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("resize", this.onWindowResize), a.cancel(this.raf))
						}
					}, {
						key: "calibrate",
						value: function(e, t) {
							this.calibrateX = void 0 === e ? this.calibrateX : e, this.calibrateY = void 0 === t ? this.calibrateY : t
						}
					}, {
						key: "invert",
						value: function(e, t) {
							this.invertX = void 0 === e ? this.invertX : e, this.invertY = void 0 === t ? this.invertY : t
						}
					}, {
						key: "friction",
						value: function(e, t) {
							this.frictionX = void 0 === e ? this.frictionX : e, this.frictionY = void 0 === t ? this.frictionY : t
						}
					}, {
						key: "scalar",
						value: function(e, t) {
							this.scalarX = void 0 === e ? this.scalarX : e, this.scalarY = void 0 === t ? this.scalarY : t
						}
					}, {
						key: "limit",
						value: function(e, t) {
							this.limitX = void 0 === e ? this.limitX : e, this.limitY = void 0 === t ? this.limitY : t
						}
					}, {
						key: "origin",
						value: function(e, t) {
							this.originX = void 0 === e ? this.originX : e, this.originY = void 0 === t ? this.originY : t
						}
					}, {
						key: "setInputElement",
						value: function(e) {
							this.inputElement = e, this.updateDimensions()
						}
					}, {
						key: "setPosition",
						value: function(e, t, i) {
							t = t.toFixed(this.precision) + "px", i = i.toFixed(this.precision) + "px", this.transform3DSupport ? o.css(e, "transform", "translate3d(" + t + "," + i + ",0)") : this.transform2DSupport ? o.css(e, "transform", "translate(" + t + "," + i + ")") : (e.style.left = t, e.style.top = i)
						}
					}, {
						key: "onOrientationTimer",
						value: function() {
							this.orientationSupport && 0 === this.orientationStatus ? (this.disable(), this.orientationSupport = !1, this.enable()) : this.doReadyCallback()
						}
					}, {
						key: "onMotionTimer",
						value: function() {
							this.motionSupport && 0 === this.motionStatus ? (this.disable(), this.motionSupport = !1, this.enable()) : this.doReadyCallback()
						}
					}, {
						key: "onCalibrationTimer",
						value: function() {
							this.calibrationFlag = !0
						}
					}, {
						key: "onWindowResize",
						value: function() {
							this.updateDimensions()
						}
					}, {
						key: "onAnimationFrame",
						value: function() {
							this.updateBounds();
							var e = this.inputX - this.calibrationX,
								t = this.inputY - this.calibrationY;
							(Math.abs(e) > this.calibrationThreshold || Math.abs(t) > this.calibrationThreshold) && this.queueCalibration(0), this.portrait ? (this.motionX = this.calibrateX ? t : this.inputY, this.motionY = this.calibrateY ? e : this.inputX) : (this.motionX = this.calibrateX ? e : this.inputX, this.motionY = this.calibrateY ? t : this.inputY), this.motionX *= this.elementWidth * (this.scalarX / 100), this.motionY *= this.elementHeight * (this.scalarY / 100), isNaN(parseFloat(this.limitX)) || (this.motionX = o.clamp(this.motionX, -this.limitX, this.limitX)), isNaN(parseFloat(this.limitY)) || (this.motionY = o.clamp(this.motionY, -this.limitY, this.limitY)), this.velocityX += (this.motionX - this.velocityX) * this.frictionX, this.velocityY += (this.motionY - this.velocityY) * this.frictionY;
							for(var i = 0; i < this.layers.length; i++) {
								var s = this.layers[i],
									n = this.depthsX[i],
									r = this.depthsY[i],
									l = this.velocityX * (n * (this.invertX ? -1 : 1)),
									d = this.velocityY * (r * (this.invertY ? -1 : 1));
								this.setPosition(s, l, d)
							}
							this.raf = a(this.onAnimationFrame)
						}
					}, {
						key: "rotate",
						value: function(e, t) {
							var i = (e || 0) / 30,
								s = (t || 0) / 30,
								n = this.windowHeight > this.windowWidth;
							this.portrait !== n && (this.portrait = n, this.calibrationFlag = !0), this.calibrationFlag && (this.calibrationFlag = !1, this.calibrationX = i, this.calibrationY = s),
								this.inputX = i, this.inputY = s
						}
					}, {
						key: "onDeviceOrientation",
						value: function(e) {
							var t = e.beta,
								i = e.gamma;
							null !== t && null !== i && (this.orientationStatus = 1, this.rotate(t, i))
						}
					}, {
						key: "onDeviceMotion",
						value: function(e) {
							var t = e.rotationRate.beta,
								i = e.rotationRate.gamma;
							null !== t && null !== i && (this.motionStatus = 1, this.rotate(t, i))
						}
					}, {
						key: "onMouseMove",
						value: function(e) {
							var t = e.clientX,
								i = e.clientY;
							return this.hoverOnly && (t < this.elementPositionX || t > this.elementPositionX + this.elementWidth || i < this.elementPositionY || i > this.elementPositionY + this.elementHeight) ? (this.inputX = 0, void(this.inputY = 0)) : void(this.relativeInput ? (this.clipRelativeInput && (t = Math.max(t, this.elementPositionX), t = Math.min(t, this.elementPositionX + this.elementWidth), i = Math.max(i, this.elementPositionY), i = Math.min(i, this.elementPositionY + this.elementHeight)), this.elementRangeX && this.elementRangeY && (this.inputX = (t - this.elementPositionX - this.elementCenterX) / this.elementRangeX, this.inputY = (i - this.elementPositionY - this.elementCenterY) / this.elementRangeY)) : this.windowRadiusX && this.windowRadiusY && (this.inputX = (t - this.windowCenterX) / this.windowRadiusX, this.inputY = (i - this.windowCenterY) / this.windowRadiusY))
						}
					}, {
						key: "destroy",
						value: function() {
							this.disable(), clearTimeout(this.calibrationTimer), clearTimeout(this.detectionTimer), this.element.removeAttribute("style");
							for(var e = 0; e < this.layers.length; e++) this.layers[e].removeAttribute("style");
							delete this.element, delete this.layers
						}
					}, {
						key: "version",
						value: function() {
							return "3.1.0"
						}
					}]), e
				}();
			t.exports = d
		}, {
			"object-assign": 1,
			raf: 4
		}]
	}, {}, [5])(5)
}),
function(e, t) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self, e.Sweetalert2 = t())
}(this, function() {
	function e(t) {
		"@babel/helpers - typeof";
		return(e = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
			return typeof e
		} : function(e) {
			return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
		})(t)
	}

	function t(e, t) {
		if(!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
	}

	function i(e, t) {
		for(var i = 0; i < t.length; i++) {
			var s = t[i];
			s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
		}
	}

	function s(e, t, s) {
		return t && i(e.prototype, t), s && i(e, s), e
	}

	function n() {
		return n = Object.assign || function(e) {
			for(var t = 1; t < arguments.length; t++) {
				var i = arguments[t];
				for(var s in i) Object.prototype.hasOwnProperty.call(i, s) && (e[s] = i[s])
			}
			return e
		}, n.apply(this, arguments)
	}

	function a(e, t) {
		if("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function");
		e.prototype = Object.create(t && t.prototype, {
			constructor: {
				value: e,
				writable: !0,
				configurable: !0
			}
		}), t && o(e, t)
	}

	function r(e) {
		return(r = Object.setPrototypeOf ? Object.getPrototypeOf : function(e) {
			return e.__proto__ || Object.getPrototypeOf(e)
		})(e)
	}

	function o(e, t) {
		return(o = Object.setPrototypeOf || function(e, t) {
			return e.__proto__ = t, e
		})(e, t)
	}

	function l() {
		if("undefined" == typeof Reflect || !Reflect.construct) return !1;
		if(Reflect.construct.sham) return !1;
		if("function" == typeof Proxy) return !0;
		try {
			return Date.prototype.toString.call(Reflect.construct(Date, [], function() {})), !0
		} catch(e) {
			return !1
		}
	}

	function d(e, t, i) {
		return d = l() ? Reflect.construct : function(e, t, i) {
			var s = [null];
			s.push.apply(s, t);
			var n = Function.bind.apply(e, s),
				a = new n;
			return i && o(a, i.prototype), a
		}, d.apply(null, arguments)
	}

	function h(e) {
		if(void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
		return e
	}

	function u(e, t) {
		return !t || "object" != typeof t && "function" != typeof t ? h(e) : t
	}

	function c(e) {
		var t = l();
		return function() {
			var i, s = r(e);
			if(t) {
				var n = r(this).constructor;
				i = Reflect.construct(s, arguments, n)
			} else i = s.apply(this, arguments);
			return u(this, i)
		}
	}

	function p(e, t) {
		for(; !Object.prototype.hasOwnProperty.call(e, t) && (e = r(e), null !== e););
		return e
	}

	function f(e, t, i) {
		return(f = "undefined" != typeof Reflect && Reflect.get ? Reflect.get : function(e, t, i) {
			var s = p(e, t);
			if(s) {
				var n = Object.getOwnPropertyDescriptor(s, t);
				return n.get ? n.get.call(i) : n.value
			}
		})(e, t, i || e)
	}

	function m(e, t) {
		if(!t) return null;
		switch(t) {
			case "select":
			case "textarea":
			case "file":
				return qe(e, ue[t]);
			case "checkbox":
				return e.querySelector(".".concat(ue.checkbox, " input"));
			case "radio":
				return e.querySelector(".".concat(ue.radio, " input:checked")) || e.querySelector(".".concat(ue.radio, " input:first-child"));
			case "range":
				return e.querySelector(".".concat(ue.range, " input"));
			default:
				return qe(e, ue.input)
		}
	}

	function v(e, t, i) {
		if(Fe([e, t], ue.styled), i.confirmButtonColor && (e.style.backgroundColor = i.confirmButtonColor), i.cancelButtonColor && (t.style.backgroundColor = i.cancelButtonColor), !Be()) {
			var s = window.getComputedStyle(e).getPropertyValue("background-color");
			e.style.borderLeftColor = s, e.style.borderRightColor = s
		}
	}

	function g(e, t, i) {
		Ke(e, i["show".concat(W(t), "Button")], "inline-block"), Xe(e, i["".concat(t, "ButtonText")]), e.setAttribute("aria-label", i["".concat(t, "ButtonAriaLabel")]), e.className = ue[t], Re(e, i, "".concat(t, "Button")), Fe(e, i["".concat(t, "ButtonClass")])
	}

	function b(e, t) {
		"string" == typeof t ? e.style.background = t : t || Fe([document.documentElement, document.body], ue["no-backdrop"])
	}

	function y(e, t) {
		t in ue ? Fe(e, ue[t]) : (K('The "position" parameter is not valid, defaulting to "center"'), Fe(e, ue.center))
	}

	function w(e, t) {
		if(t && "string" == typeof t) {
			var i = "grow-".concat(t);
			i in ue && Fe(e, ue[i])
		}
	}

	function x() {
		for(var e = this, t = arguments.length, i = new Array(t), s = 0; t > s; s++) i[s] = arguments[s];
		return d(e, i)
	}

	function C(e) {
		var i = function(i) {
			function o() {
				return t(this, o), l.apply(this, arguments)
			}
			a(o, i);
			var l = c(o);
			return s(o, [{
				key: "_main",
				value: function(t) {
					return f(r(o.prototype), "_main", this).call(this, n({}, e, t))
				}
			}]), o
		}(this);
		return i
	}

	function E() {
		var e = yt.innerParams.get(this);
		if(e) {
			var t = yt.domCache.get(this);
			e.showConfirmButton || (Ue(t.confirmButton), e.showCancelButton || Ue(t.actions)), je([t.popup, t.actions], ue.loading), t.popup.removeAttribute("aria-busy"), t.popup.removeAttribute("data-loading"), t.confirmButton.disabled = !1, t.cancelButton.disabled = !1
		}
	}

	function T(e) {
		var t = yt.innerParams.get(e || this),
			i = yt.domCache.get(e || this);
		return i ? m(i.content, t.input) : null
	}

	function S(e, t, i, s) {
		i ? Hi(e, s) : (ai().then(function() {
			return Hi(e, s)
		}), si.keydownTarget.removeEventListener("keydown", si.keydownHandler, {
			capture: si.keydownListenerCapture
		}), si.keydownHandlerAdded = !1), t.parentNode && !document.body.getAttribute("data-swal2-queue-step") && t.parentNode.removeChild(t), $e() && (Si(), Ii(), $i(), Bi()), k()
	}

	function k() {
		je([document.documentElement, document.body], [ue.shown, ue["height-auto"], ue["no-backdrop"], ue["toast-shown"], ue["toast-column"]])
	}

	function M(e) {
		var t = ve();
		if(t) {
			var i = yt.innerParams.get(this);
			if(i && !Ne(t, i.hideClass.popup)) {
				var s = Yi.swalPromiseResolve.get(this);
				je(t, i.showClass.popup), Fe(t, i.hideClass.popup);
				var n = pe();
				je(n, i.showClass.backdrop), Fe(n, i.hideClass.backdrop), Xi(this, t, i), "undefined" != typeof e ? (e.isDismissed = "undefined" != typeof e.dismiss, e.isConfirmed = "undefined" == typeof e.dismiss) : e = {
					isDismissed: !0,
					isConfirmed: !1
				}, s(e || {})
			}
		}
	}

	function P(e, t, i) {
		var s = yt.domCache.get(e);
		t.forEach(function(e) {
			s[e].disabled = i
		})
	}

	function z(e, t) {
		if(!e) return !1;
		if("radio" === e.type)
			for(var i = e.parentNode.parentNode, s = i.querySelectorAll("input"), n = 0; n < s.length; n++) s[n].disabled = t;
		else e.disabled = t
	}

	function I() {
		P(this, ["confirmButton", "cancelButton"], !1)
	}

	function A() {
		P(this, ["confirmButton", "cancelButton"], !0)
	}

	function L() {
		return z(this.getInput(), !1)
	}

	function O() {
		return z(this.getInput(), !0)
	}

	function $(e) {
		var t = yt.domCache.get(this);
		Xe(t.validationMessage, e);
		var i = window.getComputedStyle(t.popup);
		t.validationMessage.style.marginLeft = "-".concat(i.getPropertyValue("padding-left")), t.validationMessage.style.marginRight = "-".concat(i.getPropertyValue("padding-right")), _e(t.validationMessage);
		var s = this.getInput();
		s && (s.setAttribute("aria-invalid", !0), s.setAttribute("aria-describedBy", ue["validation-message"]), Ge(s), Fe(s, ue.inputerror))
	}

	function D() {
		var e = yt.domCache.get(this);
		e.validationMessage && Ue(e.validationMessage);
		var t = this.getInput();
		t && (t.removeAttribute("aria-invalid"), t.removeAttribute("aria-describedBy"), je(t, ue.inputerror))
	}

	function B() {
		var e = yt.domCache.get(this);
		return e.progressSteps
	}

	function Y(e) {
		e.inputValidator || Object.keys(Gi).forEach(function(t) {
			e.input === t && (e.inputValidator = Gi[t])
		})
	}

	function X(e) {
		(!e.target || "string" == typeof e.target && !document.querySelector(e.target) || "string" != typeof e.target && !e.target.appendChild) && (K('Target parameter is not valid, defaulting to "body"'), e.target = "body")
	}

	function N(e) {
		Y(e), e.showLoaderOnConfirm && !e.preConfirm && K("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"), e.animation = te(e.animation), X(e), "string" == typeof e.title && (e.title = e.title.split("\n").join("<br />")), ut(e)
	}

	function H(e) {
		var t = ve();
		if(e.target === t) {
			var i = pe();
			t.removeEventListener(mt, H), i.style.overflowY = "auto"
		}
	}

	function R(e) {
		Ci(e), si.currentInstance && si.currentInstance._destroy(), si.currentInstance = this;
		var t = Cs(e);
		N(t), Object.freeze(t), si.timeout && (si.timeout.stop(), delete si.timeout), clearTimeout(si.restoreFocusTimeout);
		var i = Ts(this);
		return Zt(this, t), yt.innerParams.set(this, t), Es(this, i, t)
	}

	function G(e) {
		var t = ve(),
			i = yt.innerParams.get(this);
		if(!t || Ne(t, i.hideClass.popup)) return K("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
		var s = {};
		Object.keys(e).forEach(function(t) {
			Ls.isUpdatableParameter(t) ? s[t] = e[t] : K('Invalid parameter to update: "'.concat(t, '". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js'))
		});
		var a = n({}, i, s);
		Zt(this, a), yt.innerParams.set(this, a), Object.defineProperties(this, {
			params: {
				value: n({}, this.params, e),
				writable: !1,
				enumerable: !0
			}
		})
	}

	function V() {
		var e = yt.domCache.get(this),
			t = yt.innerParams.get(this);
		t && (e.popup && si.swalCloseEventFinishedCallback && (si.swalCloseEventFinishedCallback(), delete si.swalCloseEventFinishedCallback), si.deferDisposalTimer && (clearTimeout(si.deferDisposalTimer), delete si.deferDisposalTimer), "function" == typeof t.onDestroy && t.onDestroy(), Ps(this))
	}
	var F, j = "SweetAlert2:",
		q = function(e) {
			for(var t = [], i = 0; i < e.length; i++) - 1 === t.indexOf(e[i]) && t.push(e[i]);
			return t
		},
		W = function(e) {
			return e.charAt(0).toUpperCase() + e.slice(1)
		},
		_ = function(e) {
			return Object.keys(e).map(function(t) {
				return e[t]
			})
		},
		U = function(e) {
			return Array.prototype.slice.call(e)
		},
		K = function(e) {
			console.warn("".concat(j, " ").concat(e))
		},
		Z = function(e) {
			console.error("".concat(j, " ").concat(e))
		},
		Q = [],
		J = function(e) {
			-1 === Q.indexOf(e) && (Q.push(e), K(e))
		},
		ee = function(e, t) {
			J('"'.concat(e, '" is deprecated and will be removed in the next major release. Please use "').concat(t, '" instead.'))
		},
		te = function(e) {
			return "function" == typeof e ? e() : e
		},
		ie = function(e) {
			return e && "function" == typeof e.toPromise
		},
		se = function(e) {
			return ie(e) ? e.toPromise() : Promise.resolve(e)
		},
		ne = function(e) {
			return e && Promise.resolve(e) === e
		},
		ae = Object.freeze({
			cancel: "cancel",
			backdrop: "backdrop",
			close: "close",
			esc: "esc",
			timer: "timer"
		}),
		re = function(t) {
			return "object" === e(t) && t.jquery
		},
		oe = function(e) {
			return e instanceof Element || re(e)
		},
		le = function(t) {
			var i = {};
			return "object" !== e(t[0]) || oe(t[0]) ? ["title", "html", "icon"].forEach(function(s, n) {
				var a = t[n];
				"string" == typeof a || oe(a) ? i[s] = a : void 0 !== a && Z("Unexpected type of ".concat(s, '! Expected "string" or "Element", got ').concat(e(a)))
			}) : n(i, t[0]), i
		},
		de = "swal2-",
		he = function(e) {
			var t = {};
			for(var i in e) t[e[i]] = de + e[i];
			return t
		},
		ue = he(["container", "shown", "height-auto", "iosfix", "popup", "modal", "no-backdrop", "no-transition", "toast", "toast-shown", "toast-column", "show", "hide", "close", "title", "header", "content", "html-container", "actions", "confirm", "cancel", "footer", "icon", "icon-content", "image", "input", "file", "range", "select", "radio", "checkbox", "label", "textarea", "inputerror", "validation-message", "progress-steps", "active-progress-step", "progress-step", "progress-step-line", "loading", "styled", "top", "top-start", "top-end", "top-left", "top-right", "center", "center-start", "center-end", "center-left", "center-right", "bottom", "bottom-start", "bottom-end", "bottom-left", "bottom-right", "grow-row", "grow-column", "grow-fullscreen", "rtl", "timer-progress-bar", "timer-progress-bar-container", "scrollbar-measure", "icon-success", "icon-warning", "icon-info", "icon-question", "icon-error"]),
		ce = he(["success", "warning", "info", "question", "error"]),
		pe = function() {
			return document.body.querySelector(".".concat(ue.container))
		},
		fe = function(e) {
			var t = pe();
			return t ? t.querySelector(e) : null
		},
		me = function(e) {
			return fe(".".concat(e))
		},
		ve = function() {
			return me(ue.popup)
		},
		ge = function() {
			var e = ve();
			return U(e.querySelectorAll(".".concat(ue.icon)))
		},
		be = function() {
			var e = ge().filter(function(e) {
				return Ze(e)
			});
			return e.length ? e[0] : null
		},
		ye = function() {
			return me(ue.title)
		},
		we = function() {
			return me(ue.content)
		},
		xe = function() {
			return me(ue["html-container"])
		},
		Ce = function() {
			return me(ue.image)
		},
		Ee = function() {
			return me(ue["progress-steps"])
		},
		Te = function() {
			return me(ue["validation-message"])
		},
		Se = function() {
			return fe(".".concat(ue.actions, " .").concat(ue.confirm))
		},
		ke = function() {
			return fe(".".concat(ue.actions, " .").concat(ue.cancel))
		},
		Me = function() {
			return me(ue.actions)
		},
		Pe = function() {
			return me(ue.header)
		},
		ze = function() {
			return me(ue.footer)
		},
		Ie = function() {
			return me(ue["timer-progress-bar"])
		},
		Ae = function() {
			return me(ue.close)
		},
		Le = '\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n',
		Oe = function() {
			var e = U(ve().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort(function(e, t) {
					return e = parseInt(e.getAttribute("tabindex")), t = parseInt(t.getAttribute("tabindex")), e > t ? 1 : t > e ? -1 : 0
				}),
				t = U(ve().querySelectorAll(Le)).filter(function(e) {
					return "-1" !== e.getAttribute("tabindex")
				});
			return q(e.concat(t)).filter(function(e) {
				return Ze(e)
			})
		},
		$e = function() {
			return !De() && !document.body.classList.contains(ue["no-backdrop"])
		},
		De = function() {
			return document.body.classList.contains(ue["toast-shown"])
		},
		Be = function() {
			return ve().hasAttribute("data-loading")
		},
		Ye = {
			previousBodyPadding: null
		},
		Xe = function(e, t) {
			if(e.textContent = "", t) {
				var i = new DOMParser,
					s = i.parseFromString(t, "text/html");
				U(s.querySelector("head").childNodes).forEach(function(t) {
					e.appendChild(t)
				}), U(s.querySelector("body").childNodes).forEach(function(t) {
					e.appendChild(t)
				})
			}
		},
		Ne = function(e, t) {
			if(!t) return !1;
			for(var i = t.split(/\s+/), s = 0; s < i.length; s++)
				if(!e.classList.contains(i[s])) return !1;
			return !0
		},
		He = function(e, t) {
			U(e.classList).forEach(function(i) {
				-1 === _(ue).indexOf(i) && -1 === _(ce).indexOf(i) && -1 === _(t.showClass).indexOf(i) && e.classList.remove(i)
			})
		},
		Re = function(t, i, s) {
			if(He(t, i), i.customClass && i.customClass[s]) {
				if("string" != typeof i.customClass[s] && !i.customClass[s].forEach) return K("Invalid type of customClass.".concat(s, '! Expected string or iterable object, got "').concat(e(i.customClass[s]), '"'));
				Fe(t, i.customClass[s])
			}
		},
		Ge = function(e) {
			if(e.focus(), "file" !== e.type) {
				var t = e.value;
				e.value = "", e.value = t
			}
		},
		Ve = function(e, t, i) {
			e && t && ("string" == typeof t && (t = t.split(/\s+/).filter(Boolean)), t.forEach(function(t) {
				e.forEach ? e.forEach(function(e) {
					i ? e.classList.add(t) : e.classList.remove(t)
				}) : i ? e.classList.add(t) : e.classList.remove(t)
			}))
		},
		Fe = function(e, t) {
			Ve(e, t, !0)
		},
		je = function(e, t) {
			Ve(e, t, !1)
		},
		qe = function(e, t) {
			for(var i = 0; i < e.childNodes.length; i++)
				if(Ne(e.childNodes[i], t)) return e.childNodes[i]
		},
		We = function(e, t, i) {
			i || 0 === parseInt(i) ? e.style[t] = "number" == typeof i ? "".concat(i, "px") : i : e.style.removeProperty(t)
		},
		_e = function(e) {
			var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "flex";
			e.style.opacity = "", e.style.display = t
		},
		Ue = function(e) {
			e.style.opacity = "", e.style.display = "none"
		},
		Ke = function(e, t, i) {
			t ? _e(e, i) : Ue(e)
		},
		Ze = function(e) {
			return !(!e || !(e.offsetWidth || e.offsetHeight || e.getClientRects().length))
		},
		Qe = function(e) {
			return !!(e.scrollHeight > e.clientHeight)
		},
		Je = function(e) {
			var t = window.getComputedStyle(e),
				i = parseFloat(t.getPropertyValue("animation-duration") || "0"),
				s = parseFloat(t.getPropertyValue("transition-duration") || "0");
			return i > 0 || s > 0
		},
		et = function(e, t) {
			return "function" == typeof e.contains ? e.contains(t) : void 0
		},
		tt = function(e) {
			var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : !1,
				i = Ie();
			Ze(i) && (t && (i.style.transition = "none", i.style.width = "100%"), setTimeout(function() {
				i.style.transition = "width ".concat(e / 1e3, "s linear"), i.style.width = "0%"
			}, 10))
		},
		it = function() {
			var e = Ie(),
				t = parseInt(window.getComputedStyle(e).width);
			e.style.removeProperty("transition"), e.style.width = "100%";
			var i = parseInt(window.getComputedStyle(e).width),
				s = parseInt(t / i * 100);
			e.style.removeProperty("transition"), e.style.width = "".concat(s, "%")
		},
		st = function() {
			return "undefined" == typeof window || "undefined" == typeof document
		},
		nt = '\n <div aria-labelledby="'.concat(ue.title, '" aria-describedby="').concat(ue.content, '" class="').concat(ue.popup, '" tabindex="-1">\n   <div class="').concat(ue.header, '">\n     <ul class="').concat(ue["progress-steps"], '"></ul>\n     <div class="').concat(ue.icon, " ").concat(ce.error, '"></div>\n     <div class="').concat(ue.icon, " ").concat(ce.question, '"></div>\n     <div class="').concat(ue.icon, " ").concat(ce.warning, '"></div>\n     <div class="').concat(ue.icon, " ").concat(ce.info, '"></div>\n     <div class="').concat(ue.icon, " ").concat(ce.success, '"></div>\n     <img class="').concat(ue.image, '" />\n     <h2 class="').concat(ue.title, '" id="').concat(ue.title, '"></h2>\n     <button type="button" class="').concat(ue.close, '"></button>\n   </div>\n   <div class="').concat(ue.content, '">\n     <div id="').concat(ue.content, '" class="').concat(ue["html-container"], '"></div>\n     <input class="').concat(ue.input, '" />\n     <input type="file" class="').concat(ue.file, '" />\n     <div class="').concat(ue.range, '">\n       <input type="range" />\n       <output></output>\n     </div>\n     <select class="').concat(ue.select, '"></select>\n     <div class="').concat(ue.radio, '"></div>\n     <label for="').concat(ue.checkbox, '" class="').concat(ue.checkbox, '">\n       <input type="checkbox" />\n       <span class="').concat(ue.label, '"></span>\n     </label>\n     <textarea class="').concat(ue.textarea, '"></textarea>\n     <div class="').concat(ue["validation-message"], '" id="').concat(ue["validation-message"], '"></div>\n   </div>\n   <div class="').concat(ue.actions, '">\n     <button type="button" class="').concat(ue.confirm, '">OK</button>\n     <button type="button" class="').concat(ue.cancel, '">Cancel</button>\n   </div>\n   <div class="').concat(ue.footer, '"></div>\n   <div class="').concat(ue["timer-progress-bar-container"], '">\n     <div class="').concat(ue["timer-progress-bar"], '"></div>\n   </div>\n </div>\n').replace(/(^|\n)\s*/g, ""),
		at = function() {
			var e = pe();
			return e ? (e.parentNode.removeChild(e), je([document.documentElement, document.body], [ue["no-backdrop"], ue["toast-shown"], ue["has-column"]]), !0) : !1
		},
		rt = function(e) {
			Ls.isVisible() && F !== e.target.value && Ls.resetValidationMessage(), F = e.target.value
		},
		ot = function() {
			var e = we(),
				t = qe(e, ue.input),
				i = qe(e, ue.file),
				s = e.querySelector(".".concat(ue.range, " input")),
				n = e.querySelector(".".concat(ue.range, " output")),
				a = qe(e, ue.select),
				r = e.querySelector(".".concat(ue.checkbox, " input")),
				o = qe(e, ue.textarea);
			t.oninput = rt, i.onchange = rt, a.onchange = rt, r.onchange = rt, o.oninput = rt, s.oninput = function(e) {
				rt(e), n.value = s.value
			}, s.onchange = function(e) {
				rt(e), s.nextSibling.value = s.value
			}
		},
		lt = function(e) {
			return "string" == typeof e ? document.querySelector(e) : e
		},
		dt = function(e) {
			var t = ve();
			t.setAttribute("role", e.toast ? "alert" : "dialog"), t.setAttribute("aria-live", e.toast ? "polite" : "assertive"), e.toast || t.setAttribute("aria-modal", "true")
		},
		ht = function(e) {
			"rtl" === window.getComputedStyle(e).direction && Fe(pe(), ue.rtl)
		},
		ut = function(e) {
			var t = at();
			if(st()) return void Z("SweetAlert2 requires document to initialize");
			var i = document.createElement("div");
			i.className = ue.container, t && Fe(i, ue["no-transition"]), Xe(i, nt);
			var s = lt(e.target);
			s.appendChild(i), dt(e), ht(s), ot()
		},
		ct = function(t, i) {
			t instanceof HTMLElement ? i.appendChild(t) : "object" === e(t) ? pt(t, i) : t && Xe(i, t)
		},
		pt = function(e, t) {
			e.jquery ? ft(t, e) : Xe(t, e.toString())
		},
		ft = function(e, t) {
			if(e.textContent = "", 0 in t)
				for(var i = 0; i in t; i++) e.appendChild(t[i].cloneNode(!0));
			else e.appendChild(t.cloneNode(!0))
		},
		mt = function() {
			if(st()) return !1;
			var e = document.createElement("div"),
				t = {
					WebkitAnimation: "webkitAnimationEnd",
					OAnimation: "oAnimationEnd oanimationend",
					animation: "animationend"
				};
			for(var i in t)
				if(Object.prototype.hasOwnProperty.call(t, i) && "undefined" != typeof e.style[i]) return t[i];
			return !1
		}(),
		vt = function() {
			var e = document.createElement("div");
			e.className = ue["scrollbar-measure"], document.body.appendChild(e);
			var t = e.getBoundingClientRect().width - e.clientWidth;
			return document.body.removeChild(e), t
		},
		gt = function(e, t) {
			var i = Me(),
				s = Se(),
				n = ke();
			t.showConfirmButton || t.showCancelButton || Ue(i), Re(i, t, "actions"), g(s, "confirm", t), g(n, "cancel", t), t.buttonsStyling ? v(s, n, t) : (je([s, n], ue.styled), s.style.backgroundColor = s.style.borderLeftColor = s.style.borderRightColor = "", n.style.backgroundColor = n.style.borderLeftColor = n.style.borderRightColor = ""), t.reverseButtons && s.parentNode.insertBefore(n, s)
		},
		bt = function(e, t) {
			var i = pe();
			if(i) {
				b(i, t.backdrop), !t.backdrop && t.allowOutsideClick && K('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'), y(i, t.position), w(i, t.grow), Re(i, t, "container");
				var s = document.body.getAttribute("data-swal2-queue-step");
				s && (i.setAttribute("data-queue-step", s), document.body.removeAttribute("data-swal2-queue-step"))
			}
		},
		yt = {
			promise: new WeakMap,
			innerParams: new WeakMap,
			domCache: new WeakMap
		},
		wt = ["input", "file", "range", "select", "radio", "checkbox", "textarea"],
		xt = function(e, t) {
			var i = we(),
				s = yt.innerParams.get(e),
				n = !s || t.input !== s.input;
			wt.forEach(function(e) {
				var s = ue[e],
					a = qe(i, s);
				Tt(e, t.inputAttributes), a.className = s, n && Ue(a)
			}), t.input && (n && Ct(t), St(t))
		},
		Ct = function(e) {
			if(!Pt[e.input]) return Z('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(e.input, '"'));
			var t = Mt(e.input),
				i = Pt[e.input](t, e);
			_e(i), setTimeout(function() {
				Ge(i)
			})
		},
		Et = function(e) {
			for(var t = 0; t < e.attributes.length; t++) {
				var i = e.attributes[t].name; - 1 === ["type", "value", "style"].indexOf(i) && e.removeAttribute(i)
			}
		},
		Tt = function(e, t) {
			var i = m(we(), e);
			if(i) {
				Et(i);
				for(var s in t)("range" !== e || "placeholder" !== s) && i.setAttribute(s, t[s])
			}
		},
		St = function(e) {
			var t = Mt(e.input);
			e.customClass && Fe(t, e.customClass.input)
		},
		kt = function(e, t) {
			(!e.placeholder || t.inputPlaceholder) && (e.placeholder = t.inputPlaceholder)
		},
		Mt = function(e) {
			var t = ue[e] ? ue[e] : ue.input;
			return qe(we(), t)
		},
		Pt = {};
	Pt.text = Pt.email = Pt.password = Pt.number = Pt.tel = Pt.url = function(t, i) {
		return "string" == typeof i.inputValue || "number" == typeof i.inputValue ? t.value = i.inputValue : ne(i.inputValue) || K('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(e(i.inputValue), '"')), kt(t, i), t.type = i.input, t
	}, Pt.file = function(e, t) {
		return kt(e, t), e
	}, Pt.range = function(e, t) {
		var i = e.querySelector("input"),
			s = e.querySelector("output");
		return i.value = t.inputValue, i.type = t.input, s.value = t.inputValue, e
	}, Pt.select = function(e, t) {
		if(e.textContent = "", t.inputPlaceholder) {
			var i = document.createElement("option");
			Xe(i, t.inputPlaceholder), i.value = "", i.disabled = !0, i.selected = !0, e.appendChild(i)
		}
		return e
	}, Pt.radio = function(e) {
		return e.textContent = "", e
	}, Pt.checkbox = function(e, t) {
		var i = m(we(), "checkbox");
		i.value = 1, i.id = ue.checkbox, i.checked = Boolean(t.inputValue);
		var s = e.querySelector("span");
		return Xe(s, t.inputPlaceholder), e
	}, Pt.textarea = function(e, t) {
		if(e.value = t.inputValue, kt(e, t), "MutationObserver" in window) {
			var i = parseInt(window.getComputedStyle(ve()).width),
				s = parseInt(window.getComputedStyle(ve()).paddingLeft) + parseInt(window.getComputedStyle(ve()).paddingRight),
				n = function() {
					var t = e.offsetWidth + s;
					t > i ? ve().style.width = "".concat(t, "px") : ve().style.width = null
				};
			new MutationObserver(n).observe(e, {
				attributes: !0,
				attributeFilter: ["style"]
			})
		}
		return e
	};
	var zt, It = function(e, t) {
			var i = we().querySelector("#".concat(ue.content));
			t.html ? (ct(t.html, i), _e(i, "block")) : t.text ? (i.textContent = t.text, _e(i, "block")) : Ue(i), xt(e, t), Re(we(), t, "content")
		},
		At = function(e, t) {
			var i = ze();
			Ke(i, t.footer), t.footer && ct(t.footer, i), Re(i, t, "footer")
		},
		Lt = function(e, t) {
			var i = Ae();
			Xe(i, t.closeButtonHtml), Re(i, t, "closeButton"), Ke(i, t.showCloseButton), i.setAttribute("aria-label", t.closeButtonAriaLabel)
		},
		Ot = function(e, t) {
			var i = yt.innerParams.get(e);
			if(i && t.icon === i.icon && be()) return void Re(be(), t, "icon");
			if($t(), t.icon)
				if(-1 !== Object.keys(ce).indexOf(t.icon)) {
					var s = fe(".".concat(ue.icon, ".").concat(ce[t.icon]));
					_e(s), Bt(s, t), Dt(), Re(s, t, "icon"), Fe(s, t.showClass.icon)
				} else Z('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(t.icon, '"'))
		},
		$t = function() {
			for(var e = ge(), t = 0; t < e.length; t++) Ue(e[t])
		},
		Dt = function() {
			for(var e = ve(), t = window.getComputedStyle(e).getPropertyValue("background-color"), i = e.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix"), s = 0; s < i.length; s++) i[s].style.backgroundColor = t
		},
		Bt = function(e, t) {
			if(e.textContent = "", t.iconHtml) Xe(e, Yt(t.iconHtml));
			else if("success" === t.icon) Xe(e, '\n      <div class="swal2-success-circular-line-left"></div>\n      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n      <div class="swal2-success-circular-line-right"></div>\n    ');
			else if("error" === t.icon) Xe(e, '\n      <span class="swal2-x-mark">\n        <span class="swal2-x-mark-line-left"></span>\n        <span class="swal2-x-mark-line-right"></span>\n      </span>\n    ');
			else {
				var i = {
					question: "?",
					warning: "!",
					info: "i"
				};
				Xe(e, Yt(i[t.icon]))
			}
		},
		Yt = function(e) {
			return '<div class="'.concat(ue["icon-content"], '">').concat(e, "</div>")
		},
		Xt = function(e, t) {
			var i = Ce();
			return t.imageUrl ? (_e(i, ""), i.setAttribute("src", t.imageUrl), i.setAttribute("alt", t.imageAlt), We(i, "width", t.imageWidth), We(i, "height", t.imageHeight), i.className = ue.image, void Re(i, t, "image")) : Ue(i)
		},
		Nt = [],
		Ht = function(e) {
			var t = this;
			Nt = e;
			var i = function(e, t) {
					Nt = [], e(t)
				},
				s = [];
			return new Promise(function(e) {
				! function n(a, r) {
					a < Nt.length ? (document.body.setAttribute("data-swal2-queue-step", a), t.fire(Nt[a]).then(function(t) {
						"undefined" != typeof t.value ? (s.push(t.value), n(a + 1, r)) : i(e, {
							dismiss: t.dismiss
						})
					})) : i(e, {
						value: s
					})
				}(0)
			})
		},
		Rt = function() {
			return pe() && pe().getAttribute("data-queue-step")
		},
		Gt = function(e, t) {
			return t && t < Nt.length ? Nt.splice(t, 0, e) : Nt.push(e)
		},
		Vt = function(e) {
			"undefined" != typeof Nt[e] && Nt.splice(e, 1)
		},
		Ft = function(e) {
			var t = document.createElement("li");
			return Fe(t, ue["progress-step"]), Xe(t, e), t
		},
		jt = function(e) {
			var t = document.createElement("li");
			return Fe(t, ue["progress-step-line"]), e.progressStepsDistance && (t.style.width = e.progressStepsDistance), t
		},
		qt = function(e, t) {
			var i = Ee();
			if(!t.progressSteps || 0 === t.progressSteps.length) return Ue(i);
			_e(i), i.textContent = "";
			var s = parseInt(void 0 === t.currentProgressStep ? Rt() : t.currentProgressStep);
			s >= t.progressSteps.length && K("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"), t.progressSteps.forEach(function(e, n) {
				var a = Ft(e);
				if(i.appendChild(a), n === s && Fe(a, ue["active-progress-step"]), n !== t.progressSteps.length - 1) {
					var r = jt(t);
					i.appendChild(r)
				}
			})
		},
		Wt = function(e, t) {
			var i = ye();
			Ke(i, t.title || t.titleText), t.title && ct(t.title, i), t.titleText && (i.innerText = t.titleText), Re(i, t, "title")
		},
		_t = function(e, t) {
			var i = Pe();
			Re(i, t, "header"), qt(e, t), Ot(e, t), Xt(e, t), Wt(e, t), Lt(e, t)
		},
		Ut = function(e, t) {
			var i = ve();
			We(i, "width", t.width), We(i, "padding", t.padding), t.background && (i.style.background = t.background), Kt(i, t)
		},
		Kt = function(e, t) {
			e.className = "".concat(ue.popup, " ").concat(Ze(e) ? t.showClass.popup : ""), t.toast ? (Fe([document.documentElement, document.body], ue["toast-shown"]), Fe(e, ue.toast)) : Fe(e, ue.modal), Re(e, t, "popup"), "string" == typeof t.customClass && Fe(e, t.customClass), t.icon && Fe(e, ue["icon-".concat(t.icon)])
		},
		Zt = function(e, t) {
			Ut(e, t), bt(e, t), _t(e, t), It(e, t), gt(e, t), At(e, t), "function" == typeof t.onRender && t.onRender(ve())
		},
		Qt = function() {
			return Ze(ve())
		},
		Jt = function() {
			return Se() && Se().click()
		},
		ei = function() {
			return ke() && ke().click()
		},
		ti = function() {
			var e = ve();
			e || Ls.fire(), e = ve();
			var t = Me(),
				i = Se();
			_e(t), _e(i, "inline-block"), Fe([e, t], ue.loading), i.disabled = !0, e.setAttribute("data-loading", !0), e.setAttribute("aria-busy", !0), e.focus()
		},
		ii = 100,
		si = {},
		ni = function() {
			si.previousActiveElement && si.previousActiveElement.focus ? (si.previousActiveElement.focus(), si.previousActiveElement = null) : document.body && document.body.focus()
		},
		ai = function() {
			return new Promise(function(e) {
				var t = window.scrollX,
					i = window.scrollY;
				si.restoreFocusTimeout = setTimeout(function() {
					ni(), e()
				}, ii), "undefined" != typeof t && "undefined" != typeof i && window.scrollTo(t, i)
			})
		},
		ri = function() {
			return si.timeout && si.timeout.getTimerLeft()
		},
		oi = function() {
			return si.timeout ? (it(), si.timeout.stop()) : void 0
		},
		li = function() {
			if(si.timeout) {
				var e = si.timeout.start();
				return tt(e), e
			}
		},
		di = function() {
			var e = si.timeout;
			return e && (e.running ? oi() : li())
		},
		hi = function(e) {
			if(si.timeout) {
				var t = si.timeout.increase(e);
				return tt(t, !0), t
			}
		},
		ui = function() {
			return si.timeout && si.timeout.isRunning()
		},
		ci = {
			title: "",
			titleText: "",
			text: "",
			html: "",
			footer: "",
			icon: void 0,
			iconHtml: void 0,
			toast: !1,
			animation: !0,
			showClass: {
				popup: "swal2-show",
				backdrop: "swal2-backdrop-show",
				icon: "swal2-icon-show"
			},
			hideClass: {
				popup: "swal2-hide",
				backdrop: "swal2-backdrop-hide",
				icon: "swal2-icon-hide"
			},
			customClass: void 0,
			target: "body",
			backdrop: !0,
			heightAuto: !0,
			allowOutsideClick: !0,
			allowEscapeKey: !0,
			allowEnterKey: !0,
			stopKeydownPropagation: !0,
			keydownListenerCapture: !1,
			showConfirmButton: !0,
			showCancelButton: !1,
			preConfirm: void 0,
			confirmButtonText: "OK",
			confirmButtonAriaLabel: "",
			confirmButtonColor: void 0,
			cancelButtonText: "Cancel",
			cancelButtonAriaLabel: "",
			cancelButtonColor: void 0,
			buttonsStyling: !0,
			reverseButtons: !1,
			focusConfirm: !0,
			focusCancel: !1,
			showCloseButton: !1,
			closeButtonHtml: "&times;",
			closeButtonAriaLabel: "Close this dialog",
			showLoaderOnConfirm: !1,
			imageUrl: void 0,
			imageWidth: void 0,
			imageHeight: void 0,
			imageAlt: "",
			timer: void 0,
			timerProgressBar: !1,
			width: void 0,
			padding: void 0,
			background: void 0,
			input: void 0,
			inputPlaceholder: "",
			inputValue: "",
			inputOptions: {},
			inputAutoTrim: !0,
			inputAttributes: {},
			inputValidator: void 0,
			validationMessage: void 0,
			grow: !1,
			position: "center",
			progressSteps: [],
			currentProgressStep: void 0,
			progressStepsDistance: void 0,
			onBeforeOpen: void 0,
			onOpen: void 0,
			onRender: void 0,
			onClose: void 0,
			onAfterClose: void 0,
			onDestroy: void 0,
			scrollbarPadding: !0
		},
		pi = ["allowEscapeKey", "allowOutsideClick", "buttonsStyling", "cancelButtonAriaLabel", "cancelButtonColor", "cancelButtonText", "closeButtonAriaLabel", "closeButtonHtml", "confirmButtonAriaLabel", "confirmButtonColor", "confirmButtonText", "currentProgressStep", "customClass", "footer", "hideClass", "html", "icon", "imageAlt", "imageHeight", "imageUrl", "imageWidth", "onAfterClose", "onClose", "onDestroy", "progressSteps", "reverseButtons", "showCancelButton", "showCloseButton", "showConfirmButton", "text", "title", "titleText"],
		fi = {
			animation: 'showClass" and "hideClass'
		},
		mi = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusCancel", "heightAuto", "keydownListenerCapture"],
		vi = function(e) {
			return Object.prototype.hasOwnProperty.call(ci, e)
		},
		gi = function(e) {
			return -1 !== pi.indexOf(e)
		},
		bi = function(e) {
			return fi[e]
		},
		yi = function(e) {
			vi(e) || K('Unknown parameter "'.concat(e, '"'))
		},
		wi = function(e) {
			-1 !== mi.indexOf(e) && K('The parameter "'.concat(e, '" is incompatible with toasts'))
		},
		xi = function(e) {
			bi(e) && ee(e, bi(e))
		},
		Ci = function(e) {
			for(var t in e) yi(t), e.toast && wi(t), xi(t)
		},
		Ei = Object.freeze({
			isValidParameter: vi,
			isUpdatableParameter: gi,
			isDeprecatedParameter: bi,
			argsToParams: le,
			isVisible: Qt,
			clickConfirm: Jt,
			clickCancel: ei,
			getContainer: pe,
			getPopup: ve,
			getTitle: ye,
			getContent: we,
			getHtmlContainer: xe,
			getImage: Ce,
			getIcon: be,
			getIcons: ge,
			getCloseButton: Ae,
			getActions: Me,
			getConfirmButton: Se,
			getCancelButton: ke,
			getHeader: Pe,
			getFooter: ze,
			getTimerProgressBar: Ie,
			getFocusableElements: Oe,
			getValidationMessage: Te,
			isLoading: Be,
			fire: x,
			mixin: C,
			queue: Ht,
			getQueueStep: Rt,
			insertQueueStep: Gt,
			deleteQueueStep: Vt,
			showLoading: ti,
			enableLoading: ti,
			getTimerLeft: ri,
			stopTimer: oi,
			resumeTimer: li,
			toggleTimer: di,
			increaseTimer: hi,
			isTimerRunning: ui
		}),
		Ti = function() {
			null === Ye.previousBodyPadding && document.body.scrollHeight > window.innerHeight && (Ye.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")), document.body.style.paddingRight = "".concat(Ye.previousBodyPadding + vt(), "px"))
		},
		Si = function() {
			null !== Ye.previousBodyPadding && (document.body.style.paddingRight = "".concat(Ye.previousBodyPadding, "px"), Ye.previousBodyPadding = null)
		},
		ki = function() {
			var e = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || "MacIntel" === navigator.platform && navigator.maxTouchPoints > 1;
			if(e && !Ne(document.body, ue.iosfix)) {
				var t = document.body.scrollTop;
				document.body.style.top = "".concat(-1 * t, "px"), Fe(document.body, ue.iosfix), Pi(), Mi()
			}
		},
		Mi = function() {
			var e = !navigator.userAgent.match(/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i);
			if(e) {
				var t = 44;
				ve().scrollHeight > window.innerHeight - t && (pe().style.paddingBottom = "".concat(t, "px"))
			}
		},
		Pi = function() {
			var e, t = pe();
			t.ontouchstart = function(t) {
				e = zi(t.target)
			}, t.ontouchmove = function(t) {
				e && (t.preventDefault(), t.stopPropagation())
			}
		},
		zi = function(e) {
			var t = pe();
			return e === t ? !0 : Qe(t) || "INPUT" === e.tagName || Qe(we()) && we().contains(e) ? !1 : !0
		},
		Ii = function() {
			if(Ne(document.body, ue.iosfix)) {
				var e = parseInt(document.body.style.top, 10);
				je(document.body, ue.iosfix), document.body.style.top = "", document.body.scrollTop = -1 * e
			}
		},
		Ai = function() {
			return !!window.MSInputMethodContext && !!document.documentMode
		},
		Li = function() {
			var e = pe(),
				t = ve();
			e.style.removeProperty("align-items"), t.offsetTop < 0 && (e.style.alignItems = "flex-start")
		},
		Oi = function() {
			"undefined" != typeof window && Ai() && (Li(), window.addEventListener("resize", Li))
		},
		$i = function() {
			"undefined" != typeof window && Ai() && window.removeEventListener("resize", Li)
		},
		Di = function() {
			var e = U(document.body.children);
			e.forEach(function(e) {
				e === pe() || et(e, pe()) || (e.hasAttribute("aria-hidden") && e.setAttribute("data-previous-aria-hidden", e.getAttribute("aria-hidden")), e.setAttribute("aria-hidden", "true"))
			})
		},
		Bi = function() {
			var e = U(document.body.children);
			e.forEach(function(e) {
				e.hasAttribute("data-previous-aria-hidden") ? (e.setAttribute("aria-hidden", e.getAttribute("data-previous-aria-hidden")), e.removeAttribute("data-previous-aria-hidden")) : e.removeAttribute("aria-hidden")
			})
		},
		Yi = {
			swalPromiseResolve: new WeakMap
		},
		Xi = function(e, t, i) {
			var s = pe(),
				n = mt && Je(t),
				a = i.onClose,
				r = i.onAfterClose;
			null !== a && "function" == typeof a && a(t), n ? Ni(e, t, s, r) : S(e, s, De(), r)
		},
		Ni = function(e, t, i, s) {
			si.swalCloseEventFinishedCallback = S.bind(null, e, i, De(), s), t.addEventListener(mt, function(e) {
				e.target === t && (si.swalCloseEventFinishedCallback(), delete si.swalCloseEventFinishedCallback)
			})
		},
		Hi = function(e, t) {
			setTimeout(function() {
				"function" == typeof t && t(), e._destroy()
			})
		},
		Ri = function() {
			function e(i, s) {
				t(this, e), this.callback = i, this.remaining = s, this.running = !1, this.start()
			}
			return s(e, [{
				key: "start",
				value: function() {
					return this.running || (this.running = !0, this.started = new Date, this.id = setTimeout(this.callback, this.remaining)), this.remaining
				}
			}, {
				key: "stop",
				value: function() {
					return this.running && (this.running = !1, clearTimeout(this.id), this.remaining -= new Date - this.started), this.remaining
				}
			}, {
				key: "increase",
				value: function(e) {
					var t = this.running;
					return t && this.stop(), this.remaining += e, t && this.start(), this.remaining
				}
			}, {
				key: "getTimerLeft",
				value: function() {
					return this.running && (this.stop(), this.start()), this.remaining
				}
			}, {
				key: "isRunning",
				value: function() {
					return this.running
				}
			}]), e
		}(),
		Gi = {
			email: function(e, t) {
				return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(e) ? Promise.resolve() : Promise.resolve(t || "Invalid email address")
			},
			url: function(e, t) {
				return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(e) ? Promise.resolve() : Promise.resolve(t || "Invalid URL")
			}
		},
		Vi = function(e) {
			var t = pe(),
				i = ve();
			"function" == typeof e.onBeforeOpen && e.onBeforeOpen(i);
			var s = window.getComputedStyle(document.body),
				n = s.overflowY;
			qi(t, i, e), Fi(t, i), $e() && (ji(t, e.scrollbarPadding, n), Di()), De() || si.previousActiveElement || (si.previousActiveElement = document.activeElement), "function" == typeof e.onOpen && setTimeout(function() {
				return e.onOpen(i)
			}), je(t, ue["no-transition"])
		},
		Fi = function(e, t) {
			mt && Je(t) ? (e.style.overflowY = "hidden", t.addEventListener(mt, H)) : e.style.overflowY = "auto"
		},
		ji = function(e, t, i) {
			ki(), Oi(), t && "hidden" !== i && Ti(), setTimeout(function() {
				e.scrollTop = 0
			})
		},
		qi = function(e, t, i) {
			Fe(e, i.showClass.backdrop), _e(t), Fe(t, i.showClass.popup), Fe([document.documentElement, document.body], ue.shown), i.heightAuto && i.backdrop && !i.toast && Fe([document.documentElement, document.body], ue["height-auto"])
		},
		Wi = function(e, t) {
			"select" === t.input || "radio" === t.input ? Qi(e, t) : -1 !== ["text", "email", "number", "tel", "textarea"].indexOf(t.input) && (ie(t.inputValue) || ne(t.inputValue)) && Ji(e, t)
		},
		_i = function(e, t) {
			var i = e.getInput();
			if(!i) return null;
			switch(t.input) {
				case "checkbox":
					return Ui(i);
				case "radio":
					return Ki(i);
				case "file":
					return Zi(i);
				default:
					return t.inputAutoTrim ? i.value.trim() : i.value
			}
		},
		Ui = function(e) {
			return e.checked ? 1 : 0
		},
		Ki = function(e) {
			return e.checked ? e.value : null
		},
		Zi = function(e) {
			return e.files.length ? null !== e.getAttribute("multiple") ? e.files : e.files[0] : null
		},
		Qi = function(t, i) {
			var s = we(),
				n = function(e) {
					return es[i.input](s, ts(e), i)
				};
			ie(i.inputOptions) || ne(i.inputOptions) ? (ti(), se(i.inputOptions).then(function(e) {
				t.hideLoading(), n(e)
			})) : "object" === e(i.inputOptions) ? n(i.inputOptions) : Z("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(e(i.inputOptions)))
		},
		Ji = function(e, t) {
			var i = e.getInput();
			Ue(i), se(t.inputValue).then(function(s) {
				i.value = "number" === t.input ? parseFloat(s) || 0 : "".concat(s), _e(i), i.focus(), e.hideLoading()
			})["catch"](function(t) {
				Z("Error in inputValue promise: ".concat(t)), i.value = "", _e(i), i.focus(), e.hideLoading()
			})
		},
		es = {
			select: function Os(e, t, i) {
				var Os = qe(e, ue.select),
					s = function(e, t, s) {
						var n = document.createElement("option");
						n.value = s, Xe(n, t), i.inputValue.toString() === s.toString() && (n.selected = !0), e.appendChild(n)
					};
				t.forEach(function(e) {
					var t = e[0],
						i = e[1];
					if(Array.isArray(i)) {
						var n = document.createElement("optgroup");
						n.label = t, n.disabled = !1, Os.appendChild(n), i.forEach(function(e) {
							return s(n, e[1], e[0])
						})
					} else s(Os, i, t)
				}), Os.focus()
			},
			radio: function $s(e, t, i) {
				var $s = qe(e, ue.radio);
				t.forEach(function(e) {
					var t = e[0],
						s = e[1],
						n = document.createElement("input"),
						a = document.createElement("label");
					n.type = "radio", n.name = ue.radio, n.value = t, i.inputValue.toString() === t.toString() && (n.checked = !0);
					var r = document.createElement("span");
					Xe(r, s), r.className = ue.label, a.appendChild(n), a.appendChild(r), $s.appendChild(a)
				});
				var s = $s.querySelectorAll("input");
				s.length && s[0].focus()
			}
		},
		ts = function Ds(t) {
			var i = [];
			return "undefined" != typeof Map && t instanceof Map ? t.forEach(function(t, s) {
				var n = t;
				"object" === e(n) && (n = Ds(n)), i.push([s, n])
			}) : Object.keys(t).forEach(function(s) {
				var n = t[s];
				"object" === e(n) && (n = Ds(n)), i.push([s, n])
			}), i
		},
		is = function(e, t) {
			e.disableButtons(), t.input ? ns(e, t) : rs(e, t, !0)
		},
		ss = function(e, t) {
			e.disableButtons(), t(ae.cancel)
		},
		ns = function(e, t) {
			var i = _i(e, t);
			if(t.inputValidator) {
				e.disableInput();
				var s = Promise.resolve().then(function() {
					return se(t.inputValidator(i, t.validationMessage))
				});
				s.then(function(s) {
					e.enableButtons(), e.enableInput(), s ? e.showValidationMessage(s) : rs(e, t, i)
				})
			} else e.getInput().checkValidity() ? rs(e, t, i) : (e.enableButtons(), e.showValidationMessage(t.validationMessage))
		},
		as = function(e, t) {
			e.closePopup({
				value: t
			})
		},
		rs = function(e, t, i) {
			if(t.showLoaderOnConfirm && ti(), t.preConfirm) {
				e.resetValidationMessage();
				var s = Promise.resolve().then(function() {
					return se(t.preConfirm(i, t.validationMessage))
				});
				s.then(function(t) {
					Ze(Te()) || t === !1 ? e.hideLoading() : as(e, "undefined" == typeof t ? i : t)
				})
			} else as(e, i)
		},
		os = function(e, t, i, s) {
			t.keydownTarget && t.keydownHandlerAdded && (t.keydownTarget.removeEventListener("keydown", t.keydownHandler, {
				capture: t.keydownListenerCapture
			}), t.keydownHandlerAdded = !1), i.toast || (t.keydownHandler = function(t) {
				return us(e, t, s)
			}, t.keydownTarget = i.keydownListenerCapture ? window : ve(), t.keydownListenerCapture = i.keydownListenerCapture, t.keydownTarget.addEventListener("keydown", t.keydownHandler, {
				capture: t.keydownListenerCapture
			}), t.keydownHandlerAdded = !0)
		},
		ls = function(e, t, i) {
			for(var s = Oe(), n = 0; n < s.length; n++) return t += i, t === s.length ? t = 0 : -1 === t && (t = s.length - 1), s[t].focus();
			ve().focus()
		},
		ds = ["ArrowLeft", "ArrowRight", "ArrowUp", "ArrowDown", "Left", "Right", "Up", "Down"],
		hs = ["Escape", "Esc"],
		us = function(e, t, i) {
			var s = yt.innerParams.get(e);
			s.stopKeydownPropagation && t.stopPropagation(), "Enter" === t.key ? cs(e, t, s) : "Tab" === t.key ? ps(t, s) : -1 !== ds.indexOf(t.key) ? fs() : -1 !== hs.indexOf(t.key) && ms(t, s, i)
		},
		cs = function(e, t, i) {
			if(!t.isComposing && t.target && e.getInput() && t.target.outerHTML === e.getInput().outerHTML) {
				if(-1 !== ["textarea", "file"].indexOf(i.input)) return;
				Jt(), t.preventDefault()
			}
		},
		ps = function(e, t) {
			for(var i = e.target, s = Oe(), n = -1, a = 0; a < s.length; a++)
				if(i === s[a]) {
					n = a;
					break
				}
			e.shiftKey ? ls(t, n, -1) : ls(t, n, 1), e.stopPropagation(), e.preventDefault()
		},
		fs = function() {
			var e = Se(),
				t = ke();
			document.activeElement === e && Ze(t) ? t.focus() : document.activeElement === t && Ze(e) && e.focus()
		},
		ms = function(e, t, i) {
			te(t.allowEscapeKey) && (e.preventDefault(), i(ae.esc))
		},
		vs = function(e, t, i) {
			var s = yt.innerParams.get(e);
			s.toast ? gs(e, t, i) : (ys(t), ws(t), xs(e, t, i))
		},
		gs = function(e, t, i) {
			t.popup.onclick = function() {
				var t = yt.innerParams.get(e);
				t.showConfirmButton || t.showCancelButton || t.showCloseButton || t.input || i(ae.close)
			}
		},
		bs = !1,
		ys = function(e) {
			e.popup.onmousedown = function() {
				e.container.onmouseup = function(t) {
					e.container.onmouseup = void 0, t.target === e.container && (bs = !0)
				}
			}
		},
		ws = function(e) {
			e.container.onmousedown = function() {
				e.popup.onmouseup = function(t) {
					e.popup.onmouseup = void 0, (t.target === e.popup || e.popup.contains(t.target)) && (bs = !0)
				}
			}
		},
		xs = function(e, t, i) {
			t.container.onclick = function(s) {
				var n = yt.innerParams.get(e);
				return bs ? void(bs = !1) : void(s.target === t.container && te(n.allowOutsideClick) && i(ae.backdrop))
			}
		},
		Cs = function(e) {
			var t = n({}, ci.showClass, e.showClass),
				i = n({}, ci.hideClass, e.hideClass),
				s = n({}, ci, e);
			return s.showClass = t, s.hideClass = i, e.animation === !1 && (s.showClass = {
				popup: "swal2-noanimation",
				backdrop: "swal2-noanimation"
			}, s.hideClass = {}), s
		},
		Es = function(e, t, i) {
			return new Promise(function(s) {
				var n = function(t) {
					e.closePopup({
						dismiss: t
					})
				};
				Yi.swalPromiseResolve.set(e, s), t.confirmButton.onclick = function() {
					return is(e, i)
				}, t.cancelButton.onclick = function() {
					return ss(e, n)
				}, t.closeButton.onclick = function() {
					return n(ae.close)
				}, vs(e, t, n), os(e, si, i, n), i.toast && (i.input || i.footer || i.showCloseButton) ? Fe(document.body, ue["toast-column"]) : je(document.body, ue["toast-column"]), Wi(e, i), Vi(i), Ss(si, i, n), ks(t, i), setTimeout(function() {
					t.container.scrollTop = 0
				})
			})
		},
		Ts = function(e) {
			var t = {
				popup: ve(),
				container: pe(),
				content: we(),
				actions: Me(),
				confirmButton: Se(),
				cancelButton: ke(),
				closeButton: Ae(),
				validationMessage: Te(),
				progressSteps: Ee()
			};
			return yt.domCache.set(e, t), t
		},
		Ss = function(e, t, i) {
			var s = Ie();
			Ue(s), t.timer && (e.timeout = new Ri(function() {
				i("timer"), delete e.timeout
			}, t.timer), t.timerProgressBar && (_e(s), setTimeout(function() {
				e.timeout.running && tt(t.timer)
			})))
		},
		ks = function(e, t) {
			return t.toast ? void 0 : te(t.allowEnterKey) ? t.focusCancel && Ze(e.cancelButton) ? e.cancelButton.focus() : t.focusConfirm && Ze(e.confirmButton) ? e.confirmButton.focus() : void ls(t, -1, 1) : Ms()
		},
		Ms = function() {
			document.activeElement && "function" == typeof document.activeElement.blur && document.activeElement.blur()
		},
		Ps = function(e) {
			delete e.params, delete si.keydownHandler, delete si.keydownTarget, zs(yt), zs(Yi)
		},
		zs = function(e) {
			for(var t in e) e[t] = new WeakMap
		},
		Is = Object.freeze({
			hideLoading: E,
			disableLoading: E,
			getInput: T,
			close: M,
			closePopup: M,
			closeModal: M,
			closeToast: M,
			enableButtons: I,
			disableButtons: A,
			enableInput: L,
			disableInput: O,
			showValidationMessage: $,
			resetValidationMessage: D,
			getProgressSteps: B,
			_main: R,
			update: G,
			_destroy: V
		}),
		As = function() {
			function e() {
				if(t(this, e), "undefined" != typeof window) {
					"undefined" == typeof Promise && Z("This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)"), zt = this;
					for(var i = arguments.length, s = new Array(i), n = 0; i > n; n++) s[n] = arguments[n];
					var a = Object.freeze(this.constructor.argsToParams(s));
					Object.defineProperties(this, {
						params: {
							value: a,
							writable: !1,
							enumerable: !0,
							configurable: !0
						}
					});
					var r = this._main(this.params);
					yt.promise.set(this, r)
				}
			}
			return s(e, [{
				key: "then",
				value: function(e) {
					var t = yt.promise.get(this);
					return t.then(e)
				}
			}, {
				key: "finally",
				value: function(e) {
					var t = yt.promise.get(this);
					return t["finally"](e)
				}
			}]), e
		}();
	n(As.prototype, Is), n(As, Ei), Object.keys(Is).forEach(function(e) {
		As[e] = function() {
			if(zt) {
				var t;
				return(t = zt)[e].apply(t, arguments)
			}
		}
	}), As.DismissReason = ae, As.version = "9.17.2";
	var Ls = As;
	return Ls["default"] = Ls, Ls
}), "undefined" != typeof this && this.Sweetalert2 && (this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2), ! function(e, t) {
	"function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : e.lightbox = t(e.jQuery)
}(this, function(e) {
	function t(t) {
		this.album = [], this.currentImageIndex = void 0, this.init(), this.options = e.extend({}, this.constructor.defaults), this.option(t)
	}
	return t.defaults = {
		albumLabel: "Image %1 of %2",
		alwaysShowNavOnTouchDevices: !1,
		fadeDuration: 600,
		fitImagesInViewport: !0,
		imageFadeDuration: 600,
		positionFromTop: 50,
		resizeDuration: 700,
		showImageNumberLabel: !0,
		wrapAround: !1,
		disableScrolling: !1,
		sanitizeTitle: !1
	}, t.prototype.option = function(t) {
		e.extend(this.options, t)
	}, t.prototype.imageCountLabel = function(e, t) {
		return this.options.albumLabel.replace(/%1/g, e).replace(/%2/g, t)
	}, t.prototype.init = function() {
		var t = this;
		e(document).ready(function() {
			t.enable(), t.build()
		})
	}, t.prototype.enable = function() {
		var t = this;
		e("body").on("click", "a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]", function(i) {
			return t.start(e(i.currentTarget)), !1
		})
	}, t.prototype.build = function() {
		if(!(e("#lightbox").length > 0)) {
			var t = this;
			e('<div id="lightboxOverlay" tabindex="-1" class="lightboxOverlay"></div><div id="lightbox" tabindex="-1" class="lightbox"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt=""/><div class="lb-nav"><a class="lb-prev" aria-label="Previous image" href="" ></a><a class="lb-next" aria-label="Next image" href="" ></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>').appendTo(e("body")), this.$lightbox = e("#lightbox"), this.$overlay = e("#lightboxOverlay"), this.$outerContainer = this.$lightbox.find(".lb-outerContainer"), this.$container = this.$lightbox.find(".lb-container"), this.$image = this.$lightbox.find(".lb-image"), this.$nav = this.$lightbox.find(".lb-nav"), this.containerPadding = {
				top: parseInt(this.$container.css("padding-top"), 10),
				right: parseInt(this.$container.css("padding-right"), 10),
				bottom: parseInt(this.$container.css("padding-bottom"), 10),
				left: parseInt(this.$container.css("padding-left"), 10)
			}, this.imageBorderWidth = {
				top: parseInt(this.$image.css("border-top-width"), 10),
				right: parseInt(this.$image.css("border-right-width"), 10),
				bottom: parseInt(this.$image.css("border-bottom-width"), 10),
				left: parseInt(this.$image.css("border-left-width"), 10)
			}, this.$overlay.hide().on("click", function() {
				return t.end(), !1
			}), this.$lightbox.hide().on("click", function(i) {
				"lightbox" === e(i.target).attr("id") && t.end()
			}), this.$outerContainer.on("click", function(i) {
				return "lightbox" === e(i.target).attr("id") && t.end(), !1
			}), this.$lightbox.find(".lb-prev").on("click", function() {
				return 0 === t.currentImageIndex ? t.changeImage(t.album.length - 1) : t.changeImage(t.currentImageIndex - 1), !1
			}), this.$lightbox.find(".lb-next").on("click", function() {
				return t.currentImageIndex === t.album.length - 1 ? t.changeImage(0) : t.changeImage(t.currentImageIndex + 1), !1
			}), this.$nav.on("mousedown", function(e) {
				3 === e.which && (t.$nav.css("pointer-events", "none"), t.$lightbox.one("contextmenu", function() {
					setTimeout(function() {
						this.$nav.css("pointer-events", "auto")
					}.bind(t), 0)
				}))
			}), this.$lightbox.find(".lb-loader, .lb-close").on("click", function() {
				return t.end(), !1
			})
		}
	}, t.prototype.start = function(t) {
		function i(e) {
			s.album.push({
				alt: e.attr("data-alt"),
				link: e.attr("href"),
				title: e.attr("data-title") || e.attr("title")
			})
		}
		var s = this,
			n = e(window);
		n.on("resize", e.proxy(this.sizeOverlay, this)), this.sizeOverlay(), this.album = [];
		var a, r = 0,
			o = t.attr("data-lightbox");
		if(o) {
			a = e(t.prop("tagName") + '[data-lightbox="' + o + '"]');
			for(var l = 0; l < a.length; l = ++l) i(e(a[l])), a[l] === t[0] && (r = l)
		} else if("lightbox" === t.attr("rel")) i(t);
		else {
			a = e(t.prop("tagName") + '[rel="' + t.attr("rel") + '"]');
			for(var d = 0; d < a.length; d = ++d) i(e(a[d])), a[d] === t[0] && (r = d)
		}
		var h = n.scrollTop() + this.options.positionFromTop,
			u = n.scrollLeft();
		this.$lightbox.css({
			top: h + "px",
			left: u + "px"
		}).fadeIn(this.options.fadeDuration), this.options.disableScrolling && e("body").addClass("lb-disable-scrolling"), this.changeImage(r)
	}, t.prototype.changeImage = function(t) {
		var i = this,
			s = this.album[t].link,
			n = s.split(".").slice(-1)[0],
			a = this.$lightbox.find(".lb-image");
		this.disableKeyboardNav(), this.$overlay.fadeIn(this.options.fadeDuration), e(".lb-loader").fadeIn("slow"), this.$lightbox.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide(), this.$outerContainer.addClass("animating");
		var r = new Image;
		r.onload = function() {
			var o, l, d, h, u, c;
			a.attr({
				alt: i.album[t].alt,
				src: s
			}), e(r), a.width(r.width), a.height(r.height), c = e(window).width(), u = e(window).height(), h = c - i.containerPadding.left - i.containerPadding.right - i.imageBorderWidth.left - i.imageBorderWidth.right - 20, d = u - i.containerPadding.top - i.containerPadding.bottom - i.imageBorderWidth.top - i.imageBorderWidth.bottom - i.options.positionFromTop - 70, "svg" === n && (a.width(h), a.height(d)), i.options.fitImagesInViewport ? (i.options.maxWidth && i.options.maxWidth < h && (h = i.options.maxWidth), i.options.maxHeight && i.options.maxHeight < d && (d = i.options.maxHeight)) : (h = i.options.maxWidth || r.width || h, d = i.options.maxHeight || r.height || d), (r.width > h || r.height > d) && (r.width / h > r.height / d ? (l = h, o = parseInt(r.height / (r.width / l), 10), a.width(l), a.height(o)) : (o = d, l = parseInt(r.width / (r.height / o), 10), a.width(l), a.height(o))), i.sizeContainer(a.width(), a.height())
		}, r.src = this.album[t].link, this.currentImageIndex = t
	}, t.prototype.sizeOverlay = function() {
		var t = this;
		setTimeout(function() {
			t.$overlay.width(e(document).width()).height(e(document).height())
		}, 0)
	}, t.prototype.sizeContainer = function(e, t) {
		function i() {
			s.$lightbox.find(".lb-dataContainer").width(r), s.$lightbox.find(".lb-prevLink").height(o), s.$lightbox.find(".lb-nextLink").height(o), s.$overlay.focus(), s.showImage()
		}
		var s = this,
			n = this.$outerContainer.outerWidth(),
			a = this.$outerContainer.outerHeight(),
			r = e + this.containerPadding.left + this.containerPadding.right + this.imageBorderWidth.left + this.imageBorderWidth.right,
			o = t + this.containerPadding.top + this.containerPadding.bottom + this.imageBorderWidth.top + this.imageBorderWidth.bottom;
		n !== r || a !== o ? this.$outerContainer.animate({
			width: r,
			height: o
		}, this.options.resizeDuration, "swing", function() {
			i()
		}) : i()
	}, t.prototype.showImage = function() {
		this.$lightbox.find(".lb-loader").stop(!0).hide(), this.$lightbox.find(".lb-image").fadeIn(this.options.imageFadeDuration), this.updateNav(), this.updateDetails(), this.preloadNeighboringImages(), this.enableKeyboardNav()
	}, t.prototype.updateNav = function() {
		var e = !1;
		try {
			document.createEvent("TouchEvent"), e = !!this.options.alwaysShowNavOnTouchDevices
		} catch(e) {}
		this.$lightbox.find(".lb-nav").show(), this.album.length > 1 && (this.options.wrapAround ? (e && this.$lightbox.find(".lb-prev, .lb-next").css("opacity", "1"), this.$lightbox.find(".lb-prev, .lb-next").show()) : (this.currentImageIndex > 0 && (this.$lightbox.find(".lb-prev").show(), e && this.$lightbox.find(".lb-prev").css("opacity", "1")), this.currentImageIndex < this.album.length - 1 && (this.$lightbox.find(".lb-next").show(), e && this.$lightbox.find(".lb-next").css("opacity", "1"))))
	}, t.prototype.updateDetails = function() {
		var e = this;
		if(void 0 !== this.album[this.currentImageIndex].title && "" !== this.album[this.currentImageIndex].title) {
			var t = this.$lightbox.find(".lb-caption");
			this.options.sanitizeTitle ? t.text(this.album[this.currentImageIndex].title) : t.html(this.album[this.currentImageIndex].title), t.fadeIn("fast")
		}
		if(this.album.length > 1 && this.options.showImageNumberLabel) {
			var i = this.imageCountLabel(this.currentImageIndex + 1, this.album.length);
			this.$lightbox.find(".lb-number").text(i).fadeIn("fast")
		} else this.$lightbox.find(".lb-number").hide();
		this.$outerContainer.removeClass("animating"), this.$lightbox.find(".lb-dataContainer").fadeIn(this.options.resizeDuration, function() {
			return e.sizeOverlay()
		})
	}, t.prototype.preloadNeighboringImages = function() {
		this.album.length > this.currentImageIndex + 1 && ((new Image).src = this.album[this.currentImageIndex + 1].link), this.currentImageIndex > 0 && ((new Image).src = this.album[this.currentImageIndex - 1].link)
	}, t.prototype.enableKeyboardNav = function() {
		this.$lightbox.on("keyup.keyboard", e.proxy(this.keyboardAction, this)), this.$overlay.on("keyup.keyboard", e.proxy(this.keyboardAction, this))
	}, t.prototype.disableKeyboardNav = function() {
		this.$lightbox.off(".keyboard"), this.$overlay.off(".keyboard")
	}, t.prototype.keyboardAction = function(e) {
		var t = e.keyCode;
		27 === t ? (e.stopPropagation(), this.end()) : 37 === t ? 0 !== this.currentImageIndex ? this.changeImage(this.currentImageIndex - 1) : this.options.wrapAround && this.album.length > 1 && this.changeImage(this.album.length - 1) : 39 === t && (this.currentImageIndex !== this.album.length - 1 ? this.changeImage(this.currentImageIndex + 1) : this.options.wrapAround && this.album.length > 1 && this.changeImage(0))
	}, t.prototype.end = function() {
		this.disableKeyboardNav(), e(window).off("resize", this.sizeOverlay), this.$lightbox.fadeOut(this.options.fadeDuration), this.$overlay.fadeOut(this.options.fadeDuration), this.options.disableScrolling && e("body").removeClass("lb-disable-scrolling")
	}, new t
});