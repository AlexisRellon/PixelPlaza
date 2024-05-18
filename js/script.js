function acceptCookies() {
  document.cookie = "acceptCookies=true; expires=Fri, 31 Dec 9999 23:59:59 GMT"; // Set a cookie that expires in 9999

  // Hide the cookie banner
  document.getElementById("cookie-banner").style.display = "none";
}
