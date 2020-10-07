(function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)
// TAB
$(document).ready(function () {
// $ab content
	$(".b-tab").hide();
	$(".b-tab:first").show();

// if in tab mode
$(".b-nav-tab").click(function(e) {
		$(".b-tab").hide();
		e.preventDefault();
		var activeTab = $(this).attr("href"); 
		$(activeTab).fadeIn();

		$(".b-nav-tab").removeClass("active");
		$(this).addClass("active");
	});
});