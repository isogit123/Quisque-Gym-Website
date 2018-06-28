
$(document).ready(function(){
$('.def').fadeIn(500);
$(document).scroll(function()
{
var top = $(this).scrollTop();

if(top > 10)
{
$('.def').hide();
document.getElementById("TopDiv").className="top";
$('.top').fadeIn();
}
else
{
$('.top').hide();
document.getElementById("TopDiv").className="def";
$('.def').fadeIn();
}
});
});
function signout()
{
document.cookie="userkey"+'=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
