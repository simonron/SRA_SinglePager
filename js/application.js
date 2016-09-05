					jQuery(document).ready(function($) {

				$(function() {
					console.log("THING called");
					$('a[href*="#"]:not([href="#"])').click(function() {
						//hijacks the anchor click action and does this >---
						move_this = this.hash;
						console.log("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   link " + move_this + " clicked");
						sra_menu(move_this);
						closeMenu(); // closes mobile menu - even if already closed
					});
				});

				function sra_menu(move_this) {
					displayed_content = move_this;
					var offset = 0;
					display_here_top = $(top_of_site).offset().top;
					displayed_content_top = $(displayed_content).offset().top;
					console.log(displayed_content + " top is " + displayed_content_top);
					move_here_y = (displayed_content_top - display_here_top);
					console.log("move_here_y= " + move_here_y);


					//resets last moved section if it has been moved
					if (typeof last_content != 'undefined') {
						console.log("last_content = " + last_content);
						if (displayed_content != last_content) {
							console.log(" -------------  transform state of last_content" + last_content + " = " + $(last_content).css("transform"));
							$(last_content).css("transform", "none");
							$(mask).css("opacity","0");
							console.log("RESETTING");
							console.log(" #############  RESETTING transform state of last_content" + last_content + " = " + $(last_content).css("transform"));
							last_content = displayed_content;
							console.log(" after last_content = displayed_content = " + last_content);
						}
					} else {
						console.log("last_content NOT SET")
					};


					console.log(" #############  transform state of " + displayed_content + " = " + $(displayed_content).css("transform"));


					if ($(displayed_content).css("transform") == 'none') {
						$(displayed_content).css("transform", "translate(0px,-" + move_here_y + "px)"); // moves current piece up from original place to just under menu at the top

						$(displayed_content).css("z-index", "10");
						$(mask).css("opacity","0.5");
						$(wrapper).css("overflow-y", "scroll");

							$("body").css("overflow-y", "hidden");

						} else {
							$("body").css("overflow-y", "scroll");
							$(wrapper).css("overflow-y", "auto");
							$(displayed_content).css("transform", "none");
							$(mask).css("opacity","0");
							console.log("reset?");
							$(displayed_content).css("z-index", "1");
						}
						last_content = displayed_content;
					}
});
var open = false;

function onClickMenu() {
	console.log("onClickMenu called");
	console.log("open = "+open);

	if (open == true) {
		closeMenu();
	} else {
		openMenu();
	}
	//open = !open;
	//console.log("open="+open);
}

function onClickCover() {
	console.log("onClickCover called");
	console.log("open = "+open);
	closeMenu();
}

var scrollPos;

function openMenu() {
	console.log("openMenu called");

	scrollPos = jQuery('body').scrollTop();
	jQuery('.cover').animate({
		left: '80%'
	});
	jQuery('.mobile-menu-bar').animate({
		left: '80%'
	});
	//jQuery('.off-screen-left').css('display', 'block');
	jQuery('.off-screen-left').animate({
		left: '0%'
	});
	jQuery('.outer').css({
		position: 'fixed',
		top: -(document.body.scrollTop)
	});
	jQuery(".body").on("touchmove", false);
	jQuery('.cover').fadeIn();
	jQuery('.fadeout').fadeOut();
	open=true;
}

function closeMenu() {

	console.log("closeMenu called");
	jQuery('.cover').animate({
		left: '0%'
	});
	jQuery('.mobile-menu-bar').animate({
		left: '0%'
	});
	jQuery('.off-screen-left').animate({
		left: '-80%'
	});
	jQuery('.outer').css({
		position: 'relative'
	});
	jQuery('body').scrollTop(scrollPos);
	jQuery(".body").off("touchmove", false);
	jQuery('.cover').fadeOut();
	jQuery('.fadeout').fadeIn();
	open=false;
}