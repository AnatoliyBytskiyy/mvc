function readCookie(name) {
	var name_cook = name+"=";
	var spl = document.cookie.split(";");
		
	for(var i=0; i<spl.length; i++) {
		var c = spl[i];
		while(c.charAt(0) == " ") {
			c = c.substring(1, c.length);
		}
		
		if(c.indexOf(name_cook) == 0) {
			return c.substring(name_cook.length, c.length);
		}
	}
	return null;
}

function CookiesDelete() {
	var cookies = document.cookie.split(";");
	for (var i = 0; i < cookies.length; i++) {
		var cookie = cookies[i];
		var eqPos = cookie.indexOf("=");
		var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
		document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;";
		document.cookie = name + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
}