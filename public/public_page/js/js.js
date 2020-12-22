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
         	$('.nut-rutgon_a').hide();
         	$('.nut-xemthem_a').click(function() {
         		$('.truyen-phai_info').toggleClass('add-h');
         		$(this).hide();
         		$('.nut-rutgon_a').show();
         		return false;
         	});

         	$('.nut-rutgon_a').click(function(){
         		$('.truyen-phai_info').toggleClass('add-h');
         		$(this).hide();
         		$('.nut-xemthem_a').show();
         		return false;
         	});
         });
		/*end rút gọn*/
