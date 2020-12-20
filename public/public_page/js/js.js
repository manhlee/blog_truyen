	// menu
		$(document).ready(function() {
			$('.sapxep-tab p').slideDown();
			$('.tieude-sapxep-tab').click(function() {
				$('.sapxep-tab-item').slideToggle();
				$('.sapxep-tab h3 ').toggleClass('add');
				$('.col-lg-3.sapxep-tab').toggleClass('add-tab');

			});
		});
		/*end menu*/
		$(document).ready(function() {
	      TweenMax.staggerFrom($('.item-truyen'),1,{top:100,opacity:0},0.2);
	      TweenMax.from($('.anh_bg'),1,{top:100,opacity:0});
	      TweenMax.staggerFrom($('.toptruyenhay-item'),1,{top:100,opacity:0},0.2);
	      TweenMax.staggerFrom($('.theloai-item p'),1,{top:100,opacity:0},0.2);
		});
		/*rút gọn*/
         $(document).ready(function() {
         	$('.truyen-phai_info p').hide();
         	$('.nut-rutgon_a').hide();
         	$('.nut-rutgon_a').click(function() {
         		$('.truyen-phai_info p').toggle(400);
         		$(this).hide();
         		// $(this).css('display', 'none');
         		$('.nut-xemthem_a').css('display', 'block');
         		return false;
         	});

         	$('.nut-xemthem_a').click(function() {
         		$('.truyen-phai_info p').toggle(400);
         		$(this).hide();
         		// $('.nut-rutgon_a').css('display', 'block');
         		$('.nut-rutgon_a').show();
         		return false;
         	});
         });
		/*end rút gọn*/
