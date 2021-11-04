var signout = document.getElementById('signout');
if(readCookie("admin") == 1){
	signout.style.display = 'block';
}else{
	signout.style.display = 'none';
}

function signOut(){
	CookiesDelete();
	signout = document.getElementById('signout');
	signout.style.display = 'none';
	location="/";
}