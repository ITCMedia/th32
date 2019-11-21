var jshover = function()
{
	var menuDiv = document.getElementById("horizontal-multilevel-menu")
	if (!menuDiv)
		return;

	var sfEls = menuDiv.getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) 
	{
		sfEls[i].onmouseover=function()
		{
			this.className+=" jshover";
		}
		sfEls[i].onmouseout=function() 
		{
			this.className=this.className.replace(new RegExp(" jshover\\b"), "");
		}
	}
}

if (window.attachEvent) 
	window.attachEvent("onload", jshover);

$(".show_hide_all").on("click", function(){
if ($('#hide_menu_top') !== undefined && $('#hide_menu_top') !== null) 
	{ 
		console.log($(this));
		$(this)[0].parentElement.style.height = $(this)[0].parentElement.clientHeight+"px";
		($(this)[0].parentNode.style.overflow !== "auto") ? $(this)[0].parentNode.style.overflow = "auto" : $(this)[0].parentNode.style.overflow = "hidden";
		$('#hide_menu_top').css('display') == 'none' ? $('#hide_menu_top').css('display', 'block') : $('#hide_menu_top').css('display', 'none'); 
		if($(this)!== undefined && $(this)!==null) 
		{
			$(this)[0].firstChild.innerHTML == 'Cкрыть' ? $(this)[0].firstChild.innerHTML="Показать все" : $(this)[0].firstChild.innerHTML="Cкрыть";
		}
	}
});