							var open = false;

							function onClickMenu() {
								//if (parseInt(jQuery('.body').css('left')) >= 80) {
								if (open == true) {
									closeMenu();
								} else {
									openMenu();
								}
								open = !open;
								//console.log("open="+open);
							}

							function onClickCover() {
								closeMenu();
							}

							var scrollPos;

							function openMenu() {
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
							}

							function closeMenu() {
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
							}





