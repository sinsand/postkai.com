/*
 GAJAX
 Javascript Libraly And Ajax Frame Work
 design by http://www.goragod.com (goragod wiriya)
 3-4-53
*/

GBrowser = {
IE: !!(window.attachEvent && !window.opera),
Opera: !!window.opera,
WebKit: navigator.userAgent.indexOf('AppleWebKit/') > -1,
Gecko: navigator.userAgent.indexOf('Gecko') > -1 && navigator.userAgent.indexOf('KHTML') == -1,
MobileSafari: !!navigator.userAgent.match(/Apple.*Mobile.*Safari/)
};

var domloaded = false;

var GClass = {
create: function() {
		return function() {
			this.initialize.apply(this, arguments);
		};
	}
};

Object.extend = function(destination, source) {
	for(var property in source) {
		destination[property] = source[property];
	};
	return destination;
};

Object.extend(Object,
	{
	isObject: function(object) {
			return typeof object == "object";
		},

	isFunction: function(object) {
			return typeof object == "function";
		},

	isString: function(object) {
			return typeof object == "string";
		},

	isNumber: function(object) {
			return typeof object == "number";
		},

	isNull: function(object) {
			return typeof object == "undefined";
		},

	isGElement: function(object) {
			return object != null && typeof object == "object" &&
			'getDimensions' in object && 'viewportOffset' in object;
		}
	}
);

GEvent = {
isButton: function(event, code) {
		var buttonMap = {0: 1, 1: 4, 2: 2};
		if (GBrowser.IE) {
			return event.button == buttonMap[code];
		} else if (GBrowser.WebKit) {
			switch (code) {
				case 0: return event.which == 1 && !event.metaKey;
				case 1: return event.which == 1 && event.metaKey;
				default: return false;
			}
		} else {
			return event.which? (event.which === code + 1): (event.button === code);
		}
	},

isLeftClick: function(event) {return GEvent.isButton(event, 0)},
isMiddleClick: function(event) {return GEvent.isButton(event, 1)},
isRightClick: function(event) {return GEvent.isButton(event, 2)},

element: function(event) {
		var node = event.target? event.target: event.srcElement;
		return event.nodeType == 3? node.parentNode: node;
	},

keyCode: function(event) {
		return event.which || event.keyCode;
	},

stop: function(event) {
		if(event.stopPropagation) {
			event.stopPropagation();
			event.preventDefault();
		} else {
			event.cancelBubble = true;
			event.returnValue = false;
		};
	},

pointer: function(event) {
		return {
		x: event.pageX || (event.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft)),
		y: event.pageY || (event.clientY + (document.documentElement.scrollTop || document.body.scrollTop))
		};
	},

pointerX: function(event) {return GEvent.pointer(event).x},
pointerY: function(event) {return GEvent.pointer(event).y}
};

function _Element(elem, src) {
	var property;
	if (Object.isString(elem)) {
		var obj = document.getElementById(elem);
		if(!obj) {
			src.elem = elem;
			return false;
		}else if(obj.nodeType == 1) {
			for(property in obj) {
				try {
					src[property] = obj[property];
				}catch(e) {};
			};
			src.elem = obj;
			return true;
		};
	}else if(elem != window) {
		for(property in elem) {
			try {
				src[property] = elem[property];
			}catch(e) {};
		};
	}
	src.elem = elem;
	return true;
};

GNative = GClass.create();
GNative.prototype = {
initialize: function(elem) {
		_Element(elem, this);
	}
};

GElement = GClass.create();
GElement.prototype = Object.extend(new GNative(),
	{
	getDimensions: function() {
			var display = this.getStyle('display');
			if (display != 'none' && display != null) {
				var originalWidth = this.elem.offsetWidth;
				var originalHeight = this.elem.offsetHeight;
			} else {
				var els = this.elem.style;
				var originalVisibility = els.visibility;
				var originalPosition = els.position;
				var originalDisplay = els.display;
				els.visibility = 'hidden';
				els.position = 'absolute';
				els.display = 'block';
				var originalWidth = this.elem.clientWidth;
				var originalHeight = this.elem.clientHeight;
				els.display = originalDisplay;
				els.position = originalPosition;
				els.visibility = originalVisibility;
			};
			var result =[originalWidth, originalHeight];
			result.width = originalWidth;
			result.height = originalHeight;
			return result;
		},

	viewportOffset: function() {
			var valueT = this.elem.offsetTop;
			var valueL = this.elem.offsetLeft;
			var parentEl = this.elem.offsetParent;
			while(parentEl != null) {
				valueT += parentEl.offsetTop;
				valueL += parentEl.offsetLeft;
				if (parentEl.offsetParent == document.body && parentEl.style.position == 'absolute') break;
				parentEl = parentEl.offsetParent;
			};
			var result =[valueL, valueT];
			result.left = valueL;
			result.top = valueT;
			return result;
		},

	getOffsetParent: function() {
			if (this.elem.offsetParent) return GElement(this.elem.offsetParent);
			if (this.elem == document.body) return this.elem;
			while((element = this.elem.parentNode) && element != document.body) {
				if (element.style.position != 'static') return GElement(element);
			};
			return GElement(document.body);
		},

	getTop: function() {
			return this.viewportOffset().top;
		},

	getLeft: function() {
			return this.viewportOffset().left;
		},

	getWidth: function() {
			return this.getDimensions().width;
		},

	getHeight: function() {
			return this.getDimensions().height;
		},

	hide: function() {
			this.setStyle('visibility', 'hidden');
		},

	show: function() {
			this.setStyle('visibility', 'visible');
		},

	visible: function() {
			return this.style.visibility != 'hidden';
		},

	toggle: function() {
			if (this.visible) {
				this.hide();
			} else {
				this.show();
			};
		},

	center: function() {
			var size = this.getDimensions();
			this.style.top = (document.viewport.getscrollTop() + ((document.viewport.getHeight() - size.height) / 2)) + 'px';
			this.style.left = (document.viewport.getscrollLeft() + ((document.viewport.getWidth() - size.width) / 2)) + 'px';
		},

	getStyle: function(style) {
			style = (style == 'float' && this.elem.currentStyle)? 'styleFloat': style;
			style = (style == 'borderColor')? 'borderBottomColor': style;
			value = (this.elem.currentStyle)? this.elem.currentStyle[style]: null;
			value = (!value && window.getComputedStyle)
			? document.defaultView.getComputedStyle(this.elem, null).getPropertyValue(style.replace(/([A-Z])/g, "-$1").toLowerCase())
				:
				value;
			if (style == 'opacity') return value? parseFloat(value): 1.0;
			return value == 'auto'? null: value;
		},

	setStyle: function(property, value) {
			if (property == 'opacity') {
				if (window.ActiveXObject) this.elem.style.filter = "alpha(opacity=" + (value * 100) + ")";
				this.elem.style.opacity = value;
			} else if (property == 'float' || property == 'styleFloat' || property == 'cssFloat') {
				if (Object.isNull(this.elem.style.styleFloat)) {
					this.elem.style['cssFloat'] = value;
				} else {
					this.elem.style['styleFloat'] = value;
				};
			} else {
				this.elem.style[property] = value;
			}
		},

	addEvent: function(type, fn, useCapture) {
			var obj = this.elem;
			if (obj.addEventListener) {
				useCapture = !useCapture? false: useCapture;
				obj.addEventListener(type, fn, useCapture);
			}else if (obj.attachEvent) {
				obj["e"+type+fn] = fn;
				obj[type+fn] = function() {obj["e"+type+fn](window.event);};
				obj.attachEvent("on"+type, obj[type+fn]);
			};
		},

	removeEvent: function(type, fn) {
			if (this.elem.removeEventListener) this.elem.removeEventListener(((type == 'mousewheel' && window.gecko)? 'DOMMouseScroll': type), fn, false);
			else this.elem.detachEvent('on'+type, fn);
		},

	remove: function() {
			this.elem.parentNode.removeChild(this.elem);
		},

	copy: function() {
			return $G(this.elem.cloneNode(true));
		},

	insert: function(el) {
			this.elem.appendChild(Object.isGElement(el)? el.elem: el);
		},

	insertBefore: function(el) {
			this.elem.parentNode.insertBefore(Object.isGElement(el)? el.elem: el);
		},

	insertAfter: function(el) {
			var parent = this.elem.parentNode;
			var newElement = Object.isGElement(el)? el.elem: el;
			if(parent.lastchild == this.elem) {
				parent.appendChild(newElement);
			}else {
				parent.insertBefore(newElement, this.elem.nextSibling);
			}
		},

	replace: function(el) {
			this.elem.parentNode.replaceChild(Object.isGElement(el)? el.elem: el, this.elem);
		},

	get: function(prop) {
			return this.elem.getAttribute(prop);
		},

	set: function(prop, value) {
			this.elem.setAttribute(prop, value);
		},

	Ready: function(onload) {
			this.timeout = 0;
			var temp = this;
			var preload = function() {
				if(domloaded && _Element(temp.elem, temp)) {
					onload.call(temp);
				}else if(temp.timeout < 1000) {
					window.setTimeout(preload, 10);
					temp.timeout++;
				}
			};
			preload();
		}
	}
);

Function.prototype.bind = function(object) {
	var __method = this;
	return function() {
		return __method.apply(object, arguments);
	}
};

function functionReady(func, onload) {
	var preload = function() {
		if(domloaded && typeof func != "undefined") {
			onload.apply();
		} else {
			window.setTimeout(preload, 10);
		};
	};
	preload();
};

$G(window).addEvent('load', function()
	{
		domloaded = true;
	}
);

if (!Array.prototype.indexOf) Array.prototype.indexOf = function(item, i) {
		i || (i = 0);
		var length = this.length;
		if (i < 0) i = length + i;
		for (; i < length; i++) if (this[i] === item) return i;
		return -1;
	};

function forEach(items, func) {
	for (var i = 0; i < items.length; i++) {
		func.call(this, items[i], i);
	};
};

Object.extend(String.prototype,
	{
	hexToRgb: function(array) {
			var hex = this.match(new RegExp('^[#]{0,1}([\\w]{1,2})([\\w]{1,2})([\\w]{1,2})$'));
			var rgb =[];
			for (var i = 1; i < hex.length; i++) {
				if (hex[i].length == 1) hex[i] += hex[i];
				rgb.push(parseInt(hex[i], 16));
			};
			var rgbText = 'rgb(' + rgb.join(',') + ')';
			if (array) return[parseFloat(rgb[0]), parseFloat(rgb[1]), parseFloat(rgb[2])];
			else return rgbText;
		},

	ToRgb: function() {
			if (this.match(/^#[0-9a-f]{3,6}$/i)) return this.hexToRgb(true);
			return ((value = this.match(/(\d+),\s*(\d+),\s*(\d+)/)))?[parseFloat(value[1]), parseFloat(value[2]), parseFloat(value[3])]: false;
		},

	entityify: function() {
			return this.
			replace(/&/g, '&amp;').
			replace(/</g, '&lt;').
			replace(/>/g, '&gt;');
		},

	unentityify: function() {
			return this.
			replace(/&amp;/g, '&').
			replace(/&lt;/g, '<').
			replace(/&gt;/g, '>');
		},

	toJSON: function() {
			try {
				if (this.length > 4) return eval('(' + this + ')');
			} catch (e) {};
			return null;
		},

	escapeRegExp: function() {
			return this.replace(/([-.*+?^${}()|[\]\/\\])/g, '\\$1');
		},

	capitalize: function() {
			return this.replace(/\b[a-z]/g, function(match)
				{
					return match.toUpperCase();
				}
			);
		},

	evalScript: function() {
			var regex = /<script type="text\/javascript">(.*?)<\/script>/g;
			text = this.replace(/[\r\n]/g, '');
			text = text.replace(/\/\/<\!\[CDATA\[/g, '');
			text = text.replace(/\/\/\]\]>/g, '');
			match = regex.exec(text);
			while(match != null) {
				try {eval(match[1]);}catch(e) {};
				match = regex.exec(text);
			};
		},

	leftPad: function(count, fill) {
			var ret = '';
			for(var i = 0; i < (count - this.length); i++) {
				ret = ret + fill;
			};
			return ret + this;
		},

	rightPad: function(count, fill) {
			fill = fill? fill[0]: ' ';
			return this + fill.repeat(count - this.length);
		}
	}
);

Date.prototype.dateFormat = function(format) {
	var result = "";
	for (var i = 0; i < format.length; i++) {
		result += this.dateToString(format.charAt(i));
	};
	return result;
};

Date.prototype.dateToString = function(character) {
	switch (character) {
		case "d":
			return this.getDate();
		case "D":
			return Date.dayNames[this.getDay()];
		case "y":
			return this.getFullYear().substring(2, 4);
		case "Y":
			return (this.getFullYear() + Date.yearOffset).toString().substring(2, 4);
		case "yy":
			return this.getFullYear();
		case "YY":
			return this.getFullYear() + Date.yearOffset;
		case "m":
			return this.getMonth();
		case "M":
			return Date.monthNames[this.getMonth()];
		case "H":
			return this.getHours().toString().leftPad(2, '0');
		case "h":
			return this.getHours();
		case "A":
			return this.getHours() < 12? 'AM': 'PM';
		case "a":
			return this.getHours() < 12? 'am': 'pm';
		case "I":
			return this.getMinutes().toString().leftPad(2, '0');
		case "i":
			return this.getMinutes();
		case "S":
			return this.getSeconds().toString().leftPad(2, '0');
		case "s":
			return this.getSeconds();
		default:
			return character;
	}
};

Date.monthNames =["??????.", "?????.", "?????????.", "??€??????.", "??????.", "?????????.", "?????.", "??????.", "?????.", "??•???.", "??????.", "??????."];
Date.dayNames =["??????.", "???.", "???.", "???.", "??????.", "???.", "???."];
Date.yearOffset = 543;

function $G(el) {
	return new GElement(el);
};

function $E(el) {
	return Object.isString(el)
	? document.getElementById(el)
		:
		(Object.isGElement(el)? el.elem: el);
};

document.viewport = {
getWidth: function() {
		return document.documentElement.clientWidth || document.body.clientWidth || self.innerWidth;
	},

getHeight: function() {
		return document.documentElement.clientHeight || document.body.clientHeight || self.innerHeight;
	},

getscrollTop: function() {
		return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
	},

getscrollLeft: function() {
		return window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft;
	}
};

document.getWidth = function() {
	return Math.max(
		Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
		Math.max(document.body.offsetWidth, document.documentElement.offsetWidth),
		Math.max(document.body.clientWidth, document.documentElement.clientWidth)
	);
};

document.getHeight = function() {
	return Math.max(
		Math.max(document.body.scrollHeight, document.documentElement.scrollHeight),
		Math.max(document.body.offsetHeight, document.documentElement.offsetHeight),
		Math.max(document.body.clientHeight, document.documentElement.clientHeight)
	);
};

Cookie = {
get: function(key) {
		var value = document.cookie.match('(?:^|;)\\s*' + key.escapeRegExp() + '=([^;]*)');
		return (value)? decodeURIComponent(value[1]): null;
	},

set: function(key, value, options) {
		_options = {
		path: false,
		domain: false,
		duration: false,
		secure: false
		};
		for(var property in options) {
			_options[property] = options[property];
		};
		value = encodeURIComponent(value);
		if (_options.domain) value += '; domain=' + _options.domain;
		if (_options.path) value += '; path=' + _options.path;
		if (_options.duration) {
			var date = new Date();
			date.setTime(date.getTime() + _options.duration * 24 * 60 * 60 * 1000);
			value += '; expires=' + date.toGMTString();
		};
		if (_options.secure) value += '; secure';
		document.cookie = key + '=' + value;
	},

remove: function(key) {
		Cookie.set(key, '', {duration: -1});
	}
};

GAjax = GClass.create();
GAjax.prototype = {
initialize: function(options) {
		this.options = {
		method: 'post',
		cache: false,
		asynchronous: true,
		contentType: 'application/x-www-form-urlencoded',
		encoding: 'UTF-8',
		onTimeout: function() {},
		timeout: 4000
		};
		for(var property in options) {
			this.options[property] = options[property];
		};
		this.options.method = this.options.method.toLowerCase();
	},

xhr: function() {
		var xmlHttp = null;
		try {
			xmlHttp = new XMLHttpRequest();
		}catch(e) {
			try {
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}catch(e) {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			};
		};
		return xmlHttp;
	},

send: function(url, parameters, callback) {
		var self = this;
		this._xhr = this.xhr();
		this._abort = false;
		if(!Object.isNull(this._xhr)) {
			self.showLoading();
			option = this.options;
			if(option.method == 'get') {
				url += '?' + parameters;
				parameters = null;
			}else {
				parameters = parameters == null? '': parameters;
			};
			if(option.cache == false) {
				var match = /\?/;
				if(match.test(url)) {
					url = url + '&timestamp=' + new Date().getTime();
				}else {
					url = url + '?timestamp=' + new Date().getTime();
				};
			};
			var onreadystatechange = function() {
				if (this._xhr.readyState == 4) {
					window.clearTimeout(self.calltimeout);
					self.hideLoading();
					if(this._xhr.status == 200 && this._abort == false && Object.isFunction(callback)) {
						self.responseText = this._xhr.responseText;
						self.responseXML = this._xhr.responseXML;
						callback(self);
					};
				};
			};
			this._xhr.open(option.method, url, option.asynchronous);
			this._xhr.onreadystatechange = onreadystatechange.bind(this);
			if(option.method == 'post') {
				this._xhr.setRequestHeader('Content-Type', option.contentType + '; charset=' + option.encoding);
				this._xhr.setRequestHeader('Content-Length', (parameters == null? 0: parameters.length));
			};
			var _calltimeout = function() {
				window.clearTimeout(self.calltimeout);
				option.onTimeout.bind(self);
			};
			this.calltimeout = window.setTimeout(_calltimeout, option.timeout);
			this._xhr.send(parameters);
			if(option.asynchronous == false) {
				window.clearTimeout(this.calltimeout);
				this.responseText = this._xhr.responseText;
				this.responseXML = this._xhr.responseXML;
			};
		};
	},

autoupdate: function(url, interval, getrequest, callback) {
		this._xhr = this.xhr();
		this.interval = interval * 1000;
		if(!Object.isNull(this._xhr)) {
			this.url = url;
			this.getrequest = getrequest;
			this.callback = callback;
			this._abort = false;
			this._getupdate();
		};
	},

_getupdate: function() {
		if(this._abort == false) {
			var parameters = null;
			var url = this.url;
			var option = this.options;
			if(Object.isFunction(this.getrequest)) {
				if(option.method == 'get') {
					url += '?' + this.getrequest();
				}else {
					parameters = this.getrequest();
				};
			};
			parameters = (option.method == 'post' && parameters == null)? '': parameters;
			if(option.cache == false) {
				var match = /\?/;
				if(match.test(url)) {
					url = url + '&timestamp=' + new Date().getTime();
				}else {
					url = url + '?timestamp=' + new Date().getTime();
				};
			};
			var xhr = this._xhr;
			var temp = this;
			xhr.open(option.method, url, true);
			xhr.onreadystatechange = function() {
				if(xhr.readyState == 4 && xhr.status == 200) {
					temp.callback(xhr);
					window.clearTimeout(temp.calltimeout);
					temp.timeinterval = window.setTimeout(temp._getupdate.bind(temp), temp.interval);
				};
			};
			if(option.method == 'post') {
				xhr.setRequestHeader('Content-Type', option.contentType + '; charset=' + option.encoding);
				xhr.setRequestHeader('Content-Length', (parameters == null? 0: parameters.length));
			};
			var _calltimeout = function() {
				window.clearTimeout(temp.calltimeout);
				temp.timeinterval = window.setTimeout(temp._getupdate.bind(temp), temp.interval);
			};
			this.calltimeout = window.setTimeout(_calltimeout, option.timeout);
			xhr.send(parameters);
		};
	},

getRequestBody: function(pForm) {
		pForm = $E(pForm);
		var nParams = new Array();
		for(var n = 0; n < pForm.elements.length; n++) {
			if ((pForm.elements[n].checked == true && pForm.elements[n].type == "radio")
				|| (pForm.elements[n].checked == true && pForm.elements[n].type == "checkbox")
				|| (pForm.elements[n].type != "radio" && pForm.elements[n].type != "checkbox")) {
				var pParam = pForm.elements[n].name;
				pParam += "=";
				pParam += encodeURIComponent(pForm.elements[n].value);
				nParams.push(pParam);
			};
		};
		return nParams.join("&");
	},

showLoading: function() {
		if(this.loading) {
			this.wait = $G(this.loading);
			if(this.wait) {
				if(this.center) {
					this.wait.setStyle('display', 'block');
					this.wait.center();
				}else {
					this.wait.setStyle('visibility', 'visible');
				};
			};
		};
	},

hideLoading: function() {
		if(this.wait) {
			if(this.center) {
				this.wait.setStyle('display', 'none');
			}else {
				this.wait.setStyle('visibility', 'hidden');
			};
		};
	},

inintLoading: function(loading, center) {
		this.loading = loading;
		this.center = center;
	},

abort: function() {
		clearTimeout(this.timeinterval);
		this._abort = true;
	}
};

var gform_id = 0;
GForm = GClass.create();
GForm.prototype = {
initialize: function(frm, loading, center, onsubmit) {
		this.form = $E(frm);
		this.loading = loading;
		this.center = center;
		this._onsubmit = Object.isFunction(onsubmit)? onsubmit: function() {return true};
	},

onsubmit: function(callback) {
		var operaHack = true;
		var temp = this;
		this.form.onsubmit = function() {
			if(temp._onsubmit(temp.form) == false) {
				return false;
			}else {
				temp.showLoading();
				var uploadCallback = function() {
					var doc = io.contentWindow? io.contentWindow.document: io.contentDocument? io.contentDocument: io.document;
					temp.responseText = doc.body? doc.body.innerHTML: null;
					temp.responseXML = doc.XMLDocument? doc.XMLDocument: doc;
					if(temp.responseText == '' && operaHack && GBrowser.Opera) {
						operaHack = false;
						setTimeout(function() {uploadCallback.bind(this)}, 100);
						return;
					};
					operaHack = true;
					temp.hideLoading();
					io.removeEvent('load', uploadCallback);
					window.setTimeout(function() {io.remove()}, 1);
					temp.form.method = old_method;
					temp.form.target = old_target;
					if (temp.form.encoding) temp.form.encoding = old_enctype;
					else temp.form.enctype = old_enctype;
					callback(temp);
				}.bind(temp.form);
				var io = temp.createIframe();
				var old_target = this.target || '';
				var old_method = this.method || "post";
				var old_enctype = this.encoding? this.encoding: this.enctype;
				if (this.encoding) this.encoding = 'multipart/form-data';
				else this.enctype = 'multipart/form-data';
				io.addEvent('load', uploadCallback);
				this.target = io.id;
				this.method = 'post';
				return true;
			};
		};
	},

submit: function(callback) {
		var temp = this;
		this.showLoading();
		var uploadCallback = function() {
			temp.hideLoading();
			var xhr = {};
			try {
				xhr.responseText = io.contentWindow.document.body? io.contentWindow.document.body.innerHTML: null;
				xhr.responseXML = io.contentWindow.document.XMLDocument? io.contentWindow.document.XMLDocument: io.contentWindow.document;
			}catch(e) {};
			io.removeEvent('load', uploadCallback);
			window.setTimeout(function() {io.remove()}, 1);
			temp.form.method = old_method;
			temp.form.target = old_target;
			callback(xhr);
		}.bind(this);
		if (this.form.encoding) this.form.encoding = 'multipart/form-data';
		else this.form.enctype = 'multipart/form-data';
		var io = this.createIframe();
		var old_target = this.form.target || '';
		var old_method = this.form.method || "post";
		io.addEvent('load', uploadCallback);
		this.form.target = io.id;
		this.form.method = "post";
		this.form.submit();
	},

createIframe: function() {
		var frameId = 'GForm_Submit_' + gform_id + '_' + (this.form.id || this.form.name);
		gform_id++;
		if(window.ActiveXObject) {
			io = document.createElement('<iframe id="' + frameId + '" name="' + frameId + '" />');
			io.src = 'javascript:false';
		}else {
			io = document.createElement('iframe');
			io.setAttribute('id', frameId);
			io.setAttribute('name', frameId);
		};
		io.style.position = 'absolute';
		io.style.top = '-1000px';
		io.style.left = '-1000px';
		document.body.appendChild(io);
		return $G(io);
	},

showLoading: function() {
		if (this.loading) {
			this.wait = $G(this.loading);
			if (this.wait) {
				if (this.center) {
					this.wait.setStyle('display', 'block');
					this.wait.center();
				}else {
					this.wait.setStyle('visibility', 'visible');
				};
			};
		};
	},

hideLoading: function() {
		if (this.wait) {
			if (this.center) {
				this.wait.setStyle('display', 'none');
			} else {
				this.wait.setStyle('visibility', 'hidden');
			};
		};
	},

inintLoading: function(loading, center) {
		this.loading = loading;
		this.center = center;
	}
};

GLoader = GClass.create();
GLoader.prototype = {
initialize: function(geturl, callback) {
		this.id = 'GLoader_iframe';
		var loading = true;
		this.encode = true;
		this.geturl = geturl;
		var io = this.createIframe();
		var uploadCallback = function() {
			this.hideLoading();
			var xhr = {};
			try {
				if(io.contentWindow.document.body) {
					var data = io.contentWindow.document.body.innerHTML;
					xhr.responseText = (this.encode? decodeURIComponent(data): data);
				}else xhr.responseText = 'Document Not Support !!';
			}catch(e) {
				xhr.responseText = 'Invalid Charactor !!'
			};
			if(!loading) callback(xhr);
			loading = false;
		}.bind(this);
		io.addEvent('load', uploadCallback);
	},

createIframe: function() {
		var io = null;
		if(!$E(this.id)) {
			if(window.ActiveXObject) {
				io = document.createElement('<iframe id="' + this.id + '" name="' + this.id + '" />');
			}else {
				io = document.createElement('iframe');
				io.setAttribute('id', this.id);
				io.setAttribute('name', this.id);
			};
			io.style.position = 'absolute';
			io.style.top = '-1000px';
			io.style.left = '-1000px';
			io.style.display = 'none';
			document.body.appendChild(io);
		};
		return $G(this.id);
	},

inint: function(obj) {
		var links = obj.getElementsByTagName('a');
		var temp = this;
		var patt1 = new RegExp('^.*?' + location.hostname + '/(.*?)$');
		var patt2 = new RegExp('.*?#.*?');
		for(var i = 0; i < links.length; i++) {
			link = links[i];
			try {
				href = link.href;
				if(link.target == '' && link.onclick == null && patt1.exec(href) && !patt2.exec(href)) {
					ret = this.geturl.call(this, href);
					if(ret) {
						link.tag = ret;
						link.onclick = function() {
							temp.showLoading();
							$E(temp.id).src = this.tag;
							return false;
						};
					};
				};
			}catch(e) {};
		};
	},

showLoading: function() {
		if(this.loading) {
			this.wait = $G(this.loading);
			if(this.wait) {
				if(this.center) {
					this.wait.setStyle('display', 'block');
					this.wait.center();
				}else {
					this.wait.setStyle('visibility', 'visible');
				};
			};
		};
	},

hideLoading: function() {
		if(this.wait) {
			if(this.center) {
				this.wait.setStyle('display', 'none');
			}else {
				this.wait.setStyle('visibility', 'hidden');
			};
		};
	},

inintLoading: function(loading, center) {
		this.loading = loading;
		this.center = center;
	},

submit: function(pForm) {
		var old_target = pForm.target;
		var old_action = pForm.action;
		pForm.target = this.id;
		pForm.action = this.geturl(old_action);
		this.showLoading();
		pForm.submit();
		window.setTimeout(function()
			{
				pForm.target = old_target;
				pForm.action = old_action;
			}, 1
		);
		return false;
	},

location: function(url) {
		this.showLoading();
		$E(this.id).contentWindow.document.location = this.geturl(url);
	}
};

GModal = GClass.create();
GModal.prototype = {
initialize: function(onHide) {
		this.onhide = onHide || function() {};
		var self = this;
		var checkESCkey = function(event) {
			var keycode = event.which || event.keyCode;
			if(keycode==27) {
				self.hide();
				GEvent.stop(event);
				return false;
			};
		};
		var container_div = 'GModal_div';
		if (!$E(container_div)) {
			$G(document).addEvent('keypress', checkESCkey);
			$G(document).addEvent('keydown', checkESCkey);
			var div = document.createElement('div');
			div.setAttribute('id', container_div);
			div.style.left = '-1000px';
			div.style.position = 'absolute';
			document.body.appendChild(div);
		};
		this.div = $G(container_div);
		this.div.setStyle('opacity', 0);
	},

show: function(value) {
		this.div.elem.innerHTML = value;
		this.div.elem.style.display = '';
		this.div.center();
		this.overlay();
		new GFade(this.div).play({'from': 0, 'to': 100, 'speed': 1, 'duration': 20});
		this.div.elem.style.zIndex = 9999;
	},

hide: function() {
		new GFade(this.div).play({'from': 100, 'to': 0, 'speed': 1, 'duration': 20, 'onComplete': this._hide.bind(this)});
	},

overlay: function() {
		var frameId = 'GModal_iframe';
		if (!$E(frameId)) {
			var io = null;
			if(window.ActiveXObject) {
				io = document.createElement('<iframe id="' + frameId + '" height="100%" />');
			}else {
				io = document.createElement('iframe');
				io.setAttribute('id', frameId);
			};
			io.setAttribute('frameBorder', '0');
			io.style.position = 'absolute';
			document.body.appendChild(io);
			if (document.all) document.frames(frameId).document.bgColor = '#000000';
			else io.style.backgroundColor = '#000000';
			io.style.zIndex = 8888;
		};
		this.iframe = $G(frameId);
		this.iframe.style.left = '0px';
		this.iframe.style.top = '0px';
		this.iframe.setStyle('opacity', 0.7);
		this.iframe.style.display = 'block';
		this.iframe.style.height = document.getHeight() + 'px';
		this.iframe.style.width = document.getWidth() + 'px';
	},

_hide: function() {
		this.iframe.style.display = 'none';
		this.div.style.display = 'none';
		this.onhide.call(this);
	}
};

GFx = function() {};
GFx.prototype = {
_run: function() {
		this.playing = true;
		this.step();
	},

stop: function() {
		this.playing = false;
		this.options.onComplete.call(this, this);
	}
};

GFade = GClass.create();
GFade.prototype = Object.extend(new GFx(),
	{
	initialize: function(el) {
			this.options = {
			from: 0,
			to: 100,
			speed: 50,
			duration: 5,
			unit: '',
			onComplete: function() {}
			};
			this.Element = $G(el);
			this.playing = false;
			this.timer = 0;
		},

	play: function(options) {
			for(var property in options) {
				this.options[property] = options[property];
			};
			if (this.options.to > this.options.from) {
				this.name = 'fadeIn';
				this.to = (this.options.to > 100)? 100: this.options.to;
				this.from = (this.options.from < 0)? 0: this.options.from;
			} else {
				this.name = 'fadeOut';
				this.to = (this.options.to < 0)? 0: this.options.to;
				this.from = (this.options.from > 100)? 100: this.options.from;
			};
			if (!this.playing) {
				this.now = this.from;
				this._run();
			};
		},

	step: function() {
			if (this.playing) this.Element.setStyle('opacity', this.now/100);
			now = (this.name == 'fadeIn')? this.now + this.options.duration: this.now - this.options.duration;
			if (this.playing && ((this.name == 'fadeOut' && now >= this.to) || (this.name == 'fadeIn' && now <= this.to))) {
				this.now = now;
				var temp = this;
				this.timer = window.setTimeout(temp.step.bind(temp), temp.options.speed);
			} else this.stop();
		}
	}
);

GHighlight = GClass.create();
GHighlight.prototype = Object.extend(new GFx(),
	{
	initialize: function(el) {
			this.options = {
			from: 'red',
			to: 'auto',
			speed: 10,
			time: 20,
			unit: '',
			onComplete: function() {}
			};
			this.Element = $G(el);
			this.playing = false;
			this.timer = 0;
		},

	play: function(options) {
			for(var property in options) {
				this.options[property] = options[property];
			};
			if (this.options.from == 'red') {
				this.options.from = {'borderColor': '#FF0000', 'backgroundColor': '#FFBFBF'};
			} else if (this.options.from == 'green') {
				this.options.from = {'borderColor': '#00FF00', 'backgroundColor': '#E3F4E3'};
			};
			source = this.options.from;
			if (Object.isObject(source)) {
				destination = {};
				for(var property in source) destination[property] = source[property].ToRgb();
				this.from = destination;
			};
			source = this.options.to;
			destination = {};
			if (Object.isObject(source)) {
				for(var property in source) destination[property] = source[property].ToRgb();
				this.to = destination;
			} else if (source == 'auto') {
				source = this.options.from;
				for(var property in source) destination[property] = this.Element.getStyle(property).ToRgb();
				this.to = destination;
			};
			source = this.options.from;
			if (source == 'auto') {
				source = this.options.to;
				for(var property in source) destination[property] = this.Element.getStyle(property).ToRgb();
				this.from = destination;
			};
			this.delta =[];
			for(var property in this.from) {
				to = this.to[property];
				from = this.from[property];
				this.delta[property] =[
					(to[0] - from[0]) / this.options.time,
					(to[1] - from[1]) / this.options.time,
					(to[2] - from[2]) / this.options.time
				];
			}
			if (!this.playing) {
				this.now = 0;
				this._run();
			};
		},

	step: function() {
			if (this.playing) {
				for(var property in this.from) {
					colors = this.from[property];
					this.Element.setStyle(property, 'rgb(' +
						parseInt(colors[0] + (this.delta[property][0] * this.now)) + ',' +
						parseInt(colors[1] + (this.delta[property][1] * this.now)) + ',' +
						parseInt(colors[2] + (this.delta[property][2] * this.now)) + ')'
					);
				};
			};
			this.now++;
			if (this.now > this.options.time) this.stop();
			else this.timer = window.setTimeout(this.step.bind(this), this.options.speed);
		}
	}
);

GScroll = GClass.create();
GScroll.prototype = Object.extend(new GFx(),
	{
	initialize: function(container, scroller) {
			this.options = {
			speed: 30,
			duration: 1,
			pauseit: 1,
			scrollto: 'top'
			};
			this.container = $G(container);
			this.scroller = $G(scroller);
			this.container.addEvent('mouseover', function() {this.rel = 'pause'});
			this.container.addEvent('mouseout', function() {this.rel = 'play'});
			this.container.elem.rel = 'play';
			this.playing = false;
			var size = this.container.getDimensions();
			this.containerHeight = size.height;
			this.containerWidth = size.width;
		},

	play: function(options) {
			for(var property in options) {
				this.options[property] = options[property];
			};
			this.scrollerTop = 0;
			this.scrollerLeft = 0;
			this._run();
		},

	step: function() {
			if (this.container.elem.rel=='play'||this.options.pauseit!=1) {
				if (this.options.scrollto=='bottom') {
					this.scrollerTop = this.scrollerTop>this.containerHeight? 0-this.scroller.getHeight(): this.scrollerTop+this.options.duration;
					this.scroller.elem.style.top = this.scrollerTop+'px';
				} else if (this.options.scrollto=='left') {
					this.scrollerLeft = this.scrollerLeft+this.scroller.getWidth()<0? this.containerWidth: this.scrollerLeft-this.options.duration;
					this.scroller.elem.style.left = this.scrollerLeft+'px';
				} else if (this.options.scrollto=='right') {
					this.scrollerLeft = this.scrollerLeft>this.containerWidth? 0-this.scrollerWidth: this.scrollerLeft+this.options.duration;
					this.scroller.elem.style.left = this.scrollerLeft+'px';
				} else {
					this.scrollerTop = this.scrollerTop+this.scroller.getHeight()<0? this.containerHeight: this.scrollerTop-this.options.duration;
					this.scroller.elem.style.top = this.scrollerTop+'px';
				};
			};
			this.timer = window.setTimeout(this.step.bind(this), this.options.speed);
		}
	}
);

HScroll = GClass.create();
HScroll.prototype = Object.extend(new GFx(),
	{
	initialize: function(container, scroller) {
			this.options = {
			speed: 30,
			duration: 5,
			arrowTop: 'arrowTop',
			arrowBottom: 'arrowBottom'
			};
			var temp = this;
			this.scroller = $G(scroller);
			this.containerHeight = $G(container).getDimensions().height;
		},

	play: function(options) {
			for(var property in options) {
				this.options[property] = options[property];
			};
			var arrowTop = $G(this.options.arrowTop);
			arrowTop.addEvent('mouseover', function() {temp.rel = 'play'; temp.pos = 'up'});
			arrowTop.addEvent('mouseout', function() {temp.rel = 'pause'});
			var arrowBottom = $G(this.options.arrowBottom);
			arrowBottom.addEvent('mouseover', function() {temp.rel = 'play'; temp.pos = 'down'});
			arrowBottom.addEvent('mouseout', function() {temp.rel = 'pause'});
			this.scrollerTop = 0;
			this._run();
		},

	step: function() {
			if (this.rel == 'play') {
				if (this.pos == 'up' && this.scrollerTop < 0) {
					this.scrollerTop = this.scrollerTop + this.options.duration;
					this.scroller.elem.style.top = this.scrollerTop + 'px';
				} else if(this.pos == 'down' && this.scroller.getHeight()+ this.scrollerTop > this.containerHeight) {
					this.scrollerTop = this.scrollerTop - this.options.duration;
					this.scroller.elem.style.top = this.scrollerTop + 'px';
				}
			}
			this.timer = window.setTimeout(this.step.bind(this), this.options.speed);
		}
	}
);

VScroll = GClass.create();
VScroll.prototype = Object.extend(new GFx(),
	{
	initialize: function(container, scroller, options) {
			this.options = {
			speed: 30,
			duration: 5,
			arrowLeft: 'arrowLeft',
			arrowRight: 'arrowRight'
			};
			for(var property in options) {
				this.options[property] = options[property];
			};
			var temp = this;
			var arrowLeft = $G(this.options.arrowLeft);
			arrowLeft.addEvent('mouseover', function() {temp.rel = 'play'; temp.pos = 'left'});
			arrowLeft.addEvent('mouseout', function() {temp.rel = 'pause'});
			var arrowRight = $G(this.options.arrowRight);
			arrowRight.addEvent('mouseover', function() {temp.rel = 'play'; temp.pos = 'right'});
			arrowRight.addEvent('mouseout', function() {temp.rel = 'pause'});
			this.scroller = $G(scroller);
			this.container = $G(container);
			this.containerWidth = this.container.getWidth();
			this.rel == 'pause';
		},

	play: function() {
			this.scrollerWidth = this.scroller.getWidth();
			this.scrollerLeft = 0;
			this._run();
		},

	step: function() {
			if (this.rel == 'play') {
				if(this.pos == 'left' && this.scrollerLeft < 0) {
					this.scrollerLeft = this.scrollerLeft + this.options.duration;
					this.scrollerLeft = this.scrollerLeft > 0? 0: this.scrollerLeft;
					$E(this.scroller).style.left = this.scrollerLeft + 'px';
				}else if(this.pos == 'right'&& (this.scrollerLeft + this.scrollerWidth) >= this.containerWidth) {
					this.scrollerLeft = this.scrollerLeft - this.options.duration;
					this.scrollerLeft = this.scrollerLeft < 0 - this.containerWidth? 0 - this.containerWidth: this.scrollerLeft;
					$E(this.scroller).style.left = this.scrollerLeft + 'px';
				}
			} else if (this.rel == 'move') {
				if (this.scrollTo < this.scrollerLeft && this.scrollerWidth+ this.scrollerLeft > this.containerWidth) {
					this.scrollerLeft = this.scrollerLeft - this.options.duration;
					this.scrollerLeft = this.scrollerLeft < this.scrollTo? this.scrollTo: this.scrollerLeft;
					$E(this.scroller).style.left = this.scrollerLeft + 'px';
				} else if (this.scrollTo > this.scrollerLeft && this.scrollerLeft < 0) {
					this.scrollerLeft = this.scrollerLeft + this.options.duration;
					this.scrollerLeft = this.scrollerLeft > this.scrollTo? this.scrollTo: this.scrollerLeft;
					$E(this.scroller).style.left = this.scrollerLeft + 'px';
				} else {
					this.rel == 'pause';
				};
			};
			this.timer = window.setTimeout(this.step.bind(this), this.options.speed);
		},

	MoveTo: function(elem) {
			if ($E(elem)) {
				var elem = $G(elem);
				this.scrollTo = this.scroller.getLeft() - ((elem.getLeft() + elem.getWidth()) - this.containerWidth + 5);
			} else {
				this.scrollTo = 0;
			}
			this.rel = 'move';
		}
	}
);

GSlide = GClass.create();
GSlide.prototype = Object.extend(new GFx(),
	{
	initialize: function() {
			this.options = {
			speed: 30,
			duration: 1,
			from: 0,
			to: 0,
			onSlide: function() {}
			};
		},

	play: function(options) {
			for(var property in options) {
				this.options[property] = options[property];
			};
			this.Pos = this.options.from;
			this._run();
		},

	step: function() {
			var option = this.options;
			if (option.to > option.from && this.Pos < option.to) {
				this.Pos = this.Pos + option.duration;
				this.Pos = this.Pos > option.to? option.to: this.Pos;
				option.onSlide.call(this);
				this.timer = window.setTimeout(this.step.bind(this), option.speed);
			}else if (option.to < option.from && this.Pos > option.to) {
				this.Pos = this.Pos - option.duration;
				this.Pos = this.Pos < option.to? option.to: this.Pos;
				option.onSlide.call(this);
				this.timer = window.setTimeout(this.step.bind(this), option.speed);
			};
		}
	}
);

GCrossFade = GClass.create();
GCrossFade.prototype = Object.extend(new GFx(),
	{
	initialize: function(elem, options) {
			this.options = {
			speed: 10,
			loop: true,
			auto: true,
			onChanged: function() {}
			};
			for(var property in options) {
				this.options[property] = options[property];
			};
			this.Slide = $G(elem);
			size = this.Slide.getDimensions();
			this.width = size.width;
			this.height = size.height;

			var img = document.createElement('img');
			img.src = 'blank.gif';
			img.style.position = 'absolute';
			img.style.left = '-10000px';
			this.Slide.insert(img);
			this.img1 = img;
			var img = document.createElement('img');
			img.src = 'blank.gif';
			img.style.position = 'absolute';
			img.style.left = '-10000px';
			this.Slide.insert(img);
			this.img2 = img;
			this.currImg = this.img2;
			this.fader = 0;

			this.action = 'stop';
		},

	next: function(val) {
			window.clearTimeout(this.fader);
			var pos = this.Pos + val;
			pos = pos >= this.pictures.length? this.pictures.length - 1: pos;
			pos = pos < 0? 0: pos;
			if (pos != this.Pos) {
				this.show(pos);
			};
		},

	play: function() {
			this.nextPos = this.Pos + 1;
			this._run();
		},

	step: function() {
			if (this.options.loop) {
				this.nextPos = this.nextPos >= this.pictures.length? 0: this.nextPos;
			} else if (this.nextPos >= this.pictures.length) {
				return;
			}
			var temp = this;
			new preload(this.pictures[this.nextPos], function()
				{
					temp.currImg = temp.currImg == temp.img2? temp.img1: temp.img2;
					var old = temp.currImg == temp.img2? temp.img1: temp.img2;
					temp._resizeImage(temp.currImg, this);
					new GFade(temp.currImg).play(
						{'onComplete': function()
							{
								temp.fader = window.setTimeout(temp.step.bind(temp), temp.options.speed * 1000);
								temp.Pos = temp.nextPos;
								temp.options.onChanged.call(temp);
								temp.nextPos++;
							}
						}
					);
					new GFade(old).play({'from': 100, 'to': 0});
					temp.currImg.style.zIndex = 1;
					old.style.zIndex = 0;
				}
			);
		},

	show: function(id) {
			var temp = this;
			new preload(this.pictures[id], function()
				{
					temp.currImg = temp.currImg == temp.img2? temp.img1: temp.img2;
					var old = temp.currImg == temp.img2? temp.img1: temp.img2;
					temp._resizeImage(temp.currImg, this);
					new GFade(temp.currImg).play(
						{'onComplete': function()
							{
								temp.Pos = id;
								temp.options.onChanged.call(temp);
							}
						}
					);
					new GFade(old).play({'from': 100, 'to': 0});
					temp.currImg.style.zIndex = 1;
					old.style.zIndex = 0;
				}
			);
		},

	pictures: function(files) {
			this.pictures = files.split(',');
			this.picturesWidth = new Array();
			this.picturesHeight = new Array();
			if (this.options.auto) {
				this.Pos = 0;
				this.play();
			} else {
				this.show(0);
			};
		},

	_resizeImage: function(img, obj) {
			img.src = obj.src;
			var w = obj.width;
			var h = obj.height;
			if (w >= h) {
				if(w > this.width) {
					var nw = this.width;
					var nh = (this.width * h) / w;
				}else if (h > this.height) {
					var nh = this.height;
					var nw = (this.height * w) / h;
				}else {
					var nh = h;
					var nw = w;
				};
			}else {
				if (h > this.height) {
					var nh = this.height;
					var nw = (this.height * w) / h;
				}else if(w > this.width) {
					var nw = this.width;
					var nh = (this.width * h) / w;
				}else {
					var nh = h;
					var nw = w;
				};
			};
			img.style.width = nw + 'px';
			img.style.height = nh + 'px';
			img.style.top = ((this.height - nh) / 2) + 'px';
			img.style.left = ((this.width - nw) / 2) + 'px';
		}
	}
);

preload = GClass.create();
preload.prototype = {
initialize: function(img, onComplete) {
		if (Object.isString(img)) {
			this.img = new Image();
			this.img.src = img;
		} else {
			this.img = img;
		};
		this.onComplete = onComplete;
		setTimeout(this.preload.bind(this), 30);
	},

preload: function() {
		if (this.img.complete) {
			this.onComplete.call(this.img);
		} else {
			setTimeout(this.preload.bind(this), 30);
		};
	}
};