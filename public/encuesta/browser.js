!function(a,b){"undefined"!=typeof module&&module.exports?module.exports=b():"function"==typeof define&&define.amd?define(b):this[a]=b()}("bowser",function(){function b(b){function c(a){var c=b.match(a);return c&&c.length>1&&c[1]||""}function d(a){var c=b.match(a);return c&&c.length>1&&c[2]||""}var x,e=c(/(ipod|iphone|ipad)/i).toLowerCase(),f=/like android/i.test(b),g=!f&&/android/i.test(b),h=/nexus\s*[0-6]\s*/i.test(b),i=!h&&/nexus\s*[0-9]+/i.test(b),j=/CrOS/.test(b),k=/silk/i.test(b),l=/sailfish/i.test(b),m=/tizen/i.test(b),n=/(web|hpw)os/i.test(b),o=/windows phone/i.test(b),p=!o&&/windows/i.test(b),q=!e&&!k&&/macintosh/i.test(b),r=!g&&!l&&!m&&!n&&/linux/i.test(b),s=c(/edge\/(\d+(\.\d+)?)/i),t=c(/version\/(\d+(\.\d+)?)/i),u=/tablet/i.test(b),v=!u&&/[^-]mobi/i.test(b),w=/xbox/i.test(b);/opera|opr|opios/i.test(b)?x={name:"Opera",opera:a,version:t||c(/(?:opera|opr|opios)[\s\/](\d+(\.\d+)?)/i)}:/coast/i.test(b)?x={name:"Opera Coast",coast:a,version:t||c(/(?:coast)[\s\/](\d+(\.\d+)?)/i)}:/yabrowser/i.test(b)?x={name:"Yandex Browser",yandexbrowser:a,version:t||c(/(?:yabrowser)[\s\/](\d+(\.\d+)?)/i)}:/ucbrowser/i.test(b)?x={name:"UC Browser",ucbrowser:a,version:c(/(?:ucbrowser)[\s\/](\d+(?:\.\d+)+)/i)}:/mxios/i.test(b)?x={name:"Maxthon",maxthon:a,version:c(/(?:mxios)[\s\/](\d+(?:\.\d+)+)/i)}:/epiphany/i.test(b)?x={name:"Epiphany",epiphany:a,version:c(/(?:epiphany)[\s\/](\d+(?:\.\d+)+)/i)}:/puffin/i.test(b)?x={name:"Puffin",puffin:a,version:c(/(?:puffin)[\s\/](\d+(?:\.\d+)?)/i)}:/sleipnir/i.test(b)?x={name:"Sleipnir",sleipnir:a,version:c(/(?:sleipnir)[\s\/](\d+(?:\.\d+)+)/i)}:/k-meleon/i.test(b)?x={name:"K-Meleon",kMeleon:a,version:c(/(?:k-meleon)[\s\/](\d+(?:\.\d+)+)/i)}:o?(x={name:"Windows Phone",windowsphone:a},s?(x.msedge=a,x.version=s):(x.msie=a,x.version=c(/iemobile\/(\d+(\.\d+)?)/i))):/msie|trident/i.test(b)?x={name:"Internet Explorer",msie:a,version:c(/(?:msie |rv:)(\d+(\.\d+)?)/i)}:j?x={name:"Chrome",chromeos:a,chromeBook:a,chrome:a,version:c(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}:/chrome.+? edge/i.test(b)?x={name:"Microsoft Edge",msedge:a,version:s}:/vivaldi/i.test(b)?x={name:"Vivaldi",vivaldi:a,version:c(/vivaldi\/(\d+(\.\d+)?)/i)||t}:l?x={name:"Sailfish",sailfish:a,version:c(/sailfish\s?browser\/(\d+(\.\d+)?)/i)}:/seamonkey\//i.test(b)?x={name:"SeaMonkey",seamonkey:a,version:c(/seamonkey\/(\d+(\.\d+)?)/i)}:/firefox|iceweasel|fxios/i.test(b)?(x={name:"Firefox",firefox:a,version:c(/(?:firefox|iceweasel|fxios)[ \/](\d+(\.\d+)?)/i)},/\((mobile|tablet);[^\)]*rv:[\d\.]+\)/i.test(b)&&(x.firefoxos=a)):k?x={name:"Amazon Silk",silk:a,version:c(/silk\/(\d+(\.\d+)?)/i)}:/phantom/i.test(b)?x={name:"PhantomJS",phantom:a,version:c(/phantomjs\/(\d+(\.\d+)?)/i)}:/slimerjs/i.test(b)?x={name:"SlimerJS",slimer:a,version:c(/slimerjs\/(\d+(\.\d+)?)/i)}:/blackberry|\bbb\d+/i.test(b)||/rim\stablet/i.test(b)?x={name:"BlackBerry",blackberry:a,version:t||c(/blackberry[\d]+\/(\d+(\.\d+)?)/i)}:n?(x={name:"WebOS",webos:a,version:t||c(/w(?:eb)?osbrowser\/(\d+(\.\d+)?)/i)},/touchpad\//i.test(b)&&(x.touchpad=a)):/bada/i.test(b)?x={name:"Bada",bada:a,version:c(/dolfin\/(\d+(\.\d+)?)/i)}:m?x={name:"Tizen",tizen:a,version:c(/(?:tizen\s?)?browser\/(\d+(\.\d+)?)/i)||t}:/qupzilla/i.test(b)?x={name:"QupZilla",qupzilla:a,version:c(/(?:qupzilla)[\s\/](\d+(?:\.\d+)+)/i)||t}:/chromium/i.test(b)?x={name:"Chromium",chromium:a,version:c(/(?:chromium)[\s\/](\d+(?:\.\d+)?)/i)||t}:/chrome|crios|crmo/i.test(b)?x={name:"Chrome",chrome:a,version:c(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}:g?x={name:"Android",version:t}:/safari|applewebkit/i.test(b)?(x={name:"Safari",safari:a},t&&(x.version=t)):e?(x={name:"iphone"==e?"iPhone":"ipad"==e?"iPad":"iPod"},t&&(x.version=t)):x=/googlebot/i.test(b)?{name:"Googlebot",googlebot:a,version:c(/googlebot\/(\d+(\.\d+))/i)||t}:{name:c(/^(.*)\/(.*) /),version:d(/^(.*)\/(.*) /)},!x.msedge&&/(apple)?webkit/i.test(b)?(/(apple)?webkit\/537\.36/i.test(b)?(x.name=x.name||"Blink",x.blink=a):(x.name=x.name||"Webkit",x.webkit=a),!x.version&&t&&(x.version=t)):!x.opera&&/gecko\//i.test(b)&&(x.name=x.name||"Gecko",x.gecko=a,x.version=x.version||c(/gecko\/(\d+(\.\d+)?)/i)),x.msedge||!g&&!x.silk?e?(x[e]=a,x.ios=a):q?x.mac=a:w?x.xbox=a:p?x.windows=a:r&&(x.linux=a):x.android=a;var y="";x.windowsphone?y=c(/windows phone (?:os)?\s?(\d+(\.\d+)*)/i):e?(y=c(/os (\d+([_\s]\d+)*) like mac os x/i),y=y.replace(/[_\s]/g,".")):g?y=c(/android[ \/-](\d+(\.\d+)*)/i):x.webos?y=c(/(?:web|hpw)os\/(\d+(\.\d+)*)/i):x.blackberry?y=c(/rim\stablet\sos\s(\d+(\.\d+)*)/i):x.bada?y=c(/bada\/(\d+(\.\d+)*)/i):x.tizen&&(y=c(/tizen[\/\s](\d+(\.\d+)*)/i)),y&&(x.osversion=y);var z=y.split(".")[0];return u||i||"ipad"==e||g&&(3==z||z>=4&&!v)||x.silk?x.tablet=a:(v||"iphone"==e||"ipod"==e||g||h||x.blackberry||x.webos||x.bada)&&(x.mobile=a),x.msedge||x.msie&&x.version>=10||x.yandexbrowser&&x.version>=15||x.vivaldi&&x.version>=1||x.chrome&&x.version>=20||x.firefox&&x.version>=20||x.safari&&x.version>=6||x.opera&&x.version>=10||x.ios&&x.osversion&&x.osversion.split(".")[0]>=6||x.blackberry&&x.version>=10.1?x.a=a:x.msie&&x.version<10||x.chrome&&x.version<20||x.firefox&&x.version<20||x.safari&&x.version<6||x.opera&&x.version<10||x.ios&&x.osversion&&x.osversion.split(".")[0]<6?x.c=a:x.x=a,x}var a=!0,c=b("undefined"!=typeof navigator?navigator.userAgent:"");return c.test=function(a){for(var b=0;b<a.length;++b){var d=a[b];if("string"==typeof d&&d in c)return!0}return!1},c._detect=b,c});