    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no" />
        <?php wp_head(); ?>
        <?php $assets = Config::get('application.assets'); $favicons_path = themosis_assets() . '/' . $assets['favicons']['path']; ?>

        <link rel="apple-touch-icon" sizes="57x57" href="{{ $favicons_path }}/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ $favicons_path }}/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ $favicons_path }}/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ $favicons_path }}/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ $favicons_path }}/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ $favicons_path }}/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ $favicons_path }}/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ $favicons_path }}/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ $favicons_path }}/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="{{ $favicons_path }}/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ $favicons_path }}/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="{{ $favicons_path }}/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ $favicons_path }}/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="{{ $favicons_path }}/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="{{ $favicons_path }}/manifest.json">
        <link rel="mask-icon" href="{{ $favicons_path }}/safari-pinned-tab.svg" color="#000000">
        <meta name="msapplication-TileColor" content="#ffe100">
        <meta name="msapplication-TileImage" content="{{ $favicons_path }}/mstile-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <script type="text/javascript">
            document.documentElement.className = document.documentElement.className.replace('feat--no-js', '');{{--
--}}@if (!isset($_browser_features) || $_browser_features !== true)
            /* Modernizr 2.8.3 (Custom Build) | MIT & BSD
             * Build: http://modernizr.com/download/#-flexbox-touch-cssclasses-teststyles-testprop-testallprops-prefixes-domprefixes-css_remunit-cssclassprefix:feat!!
             */
            ;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.flexbox=function(){return F("flexWrap")},q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" feat--"+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" feat--js feat--"+t.join(" feat--"):""),e}(this,this.document),Modernizr.addTest("cssremunit",function(){var a=document.createElement("div");try{a.style.fontSize="3rem"}catch(b){}return/rem/.test(a.style.fontSize)});
@endif
            !function(a,b){"use strict";var c=function(a){if("object"!=typeof a.document)throw new Error("Cookies.js requires a `window` with a `document` object");var c=function(a,b,d){return 1===arguments.length?c.get(a):c.set(a,b,d)};return c._document=a.document,c._cacheKeyPrefix="cookey.",c._maxExpireDate=new Date("Fri, 31 Dec 9999 23:59:59 UTC"),c.defaults={path:"/",secure:!1},c.get=function(a){c._cachedDocumentCookie!==c._document.cookie&&c._renewCache();var d=c._cache[c._cacheKeyPrefix+a];return d===b?b:decodeURIComponent(d)},c.set=function(a,d,e){return e=c._getExtendedOptions(e),e.expires=c._getExpiresDate(d===b?-1:e.expires),c._document.cookie=c._generateCookieString(a,d,e),c},c.expire=function(a,d){return c.set(a,b,d)},c._getExtendedOptions=function(a){return{path:a&&a.path||c.defaults.path,domain:a&&a.domain||c.defaults.domain,expires:a&&a.expires||c.defaults.expires,secure:a&&a.secure!==b?a.secure:c.defaults.secure}},c._isValidDate=function(a){return"[object Date]"===Object.prototype.toString.call(a)&&!isNaN(a.getTime())},c._getExpiresDate=function(a,b){if(b=b||new Date,"number"==typeof a?a=a===1/0?c._maxExpireDate:new Date(b.getTime()+1e3*a):"string"==typeof a&&(a=new Date(a)),a&&!c._isValidDate(a))throw new Error("`expires` parameter cannot be converted to a valid Date instance");return a},c._generateCookieString=function(a,b,c){a=a.replace(/[^#$&+\^`|]/g,encodeURIComponent),a=a.replace(/\(/g,"%28").replace(/\)/g,"%29"),b=(b+"").replace(/[^!#$&-+\--:<-\[\]-~]/g,encodeURIComponent),c=c||{};var d=a+"="+b;return d+=c.path?";path="+c.path:"",d+=c.domain?";domain="+c.domain:"",d+=c.expires?";expires="+c.expires.toUTCString():"",d+=c.secure?";secure":""},c._getCacheFromString=function(a){for(var d={},e=a?a.split("; "):[],f=0;f<e.length;f++){var g=c._getKeyValuePairFromCookieString(e[f]);d[c._cacheKeyPrefix+g.key]===b&&(d[c._cacheKeyPrefix+g.key]=g.value)}return d},c._getKeyValuePairFromCookieString=function(a){var b=a.indexOf("=");b=0>b?a.length:b;var d,c=a.substr(0,b);try{d=decodeURIComponent(c)}catch(e){console&&"function"==typeof console.error&&console.error('Could not decode cookie with key "'+c+'"',e)}return{key:d,value:a.substr(b+1)}},c._renewCache=function(){c._cache=c._getCacheFromString(c._document.cookie),c._cachedDocumentCookie=c._document.cookie},c._areEnabled=function(){var a="cookies.js",b="1"===c.set(a,1).get(a);return c.expire(a),b},c.enabled=c._areEnabled(),c},d="object"==typeof a.document?c(a):c;"function"==typeof define&&define.amd?define(function(){return d}):"object"==typeof exports?("object"==typeof module&&"object"==typeof module.exports&&(exports=module.exports=d),exports.Cookies=d):a.Cookies=d}("undefined"==typeof window?this:window);

            document.addEventListener('DOMContentLoaded', function() {
                if (Cookies.enabled) {
                    if (typeof Cookies.get('_language_detected') === 'undefined') {
                        Cookies.set('_language_detected', true, 10800);
                        var browserLanguage = navigator.language || navigator.browserLanguage;
                        if (document.documentElement.lang !== browserLanguage) {
                            var alternateLinks = document.head.querySelectorAll('link[rel="alternate"]');
                            for (var i = 0; i < alternateLinks.length; ++i) {
                                if (alternateLinks[i].hreflang.toLowerCase() === browserLanguage.toLowerCase()) {
                                    window.location = alternateLinks[i].href;
                                }
                            }
                        }
                    }

                    var typekitUrl = Cookies.get('_fonts_typekit_url')

                    if (typeof typekitUrl !== 'undefined') {
                        var sheet = document.createElement('link');
                        sheet.type  = 'text/css';
                        sheet.rel = 'stylesheet'
                        sheet.href = typekitUrl;
                        document.head.appendChild(sheet);
                        document.documentElement.className += ' type__body--available';
                    }

                    if (Cookies.get('_fonts_self_loaded') !== 'undefined') {
                        document.documentElement.className += ' type__heading--available';
                    }
                }
            }, false);
        </script>
    </head>
