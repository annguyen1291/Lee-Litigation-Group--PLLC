(function($) {

	$(document).ready(function() {

		$('#home-slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			nextArrow: '<button tabindex="-1" class="slick-next slick-arrow" aria-label="Next" type="button" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
			prevArrow:'<button tabindex="-1" class="slick-prev slick-arrow" aria-label="Previous" type="button" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
			dots: true,
		});

		$('.toggle-btn').click(function() {
			if ($(this).hasClass('open')) {
				$(this).removeClass('open');
				$('.header-mobile-nav').hide();
			} else {
				$(this).addClass('open');
				$('.header-mobile-nav').show();
			}
		});

		$('#contact-form').on('submit', function() {
			
			$.ajax({
                url : 'mail.php',
                type : 'POST',
                data : {
                     formdata : $('#contact-form').serializeArray(),
                },
                success : function (data){
                    if (data) {
                    	window.location.replace('http://360abogado.us-east-2.elasticbeanstalk.com/email.html');
                    } else {
                    	alert('Message could not be sent');
                    }
                }
            });

			return false;
		});

		$('.slideNav li').focus(function() {
			var data = $(this).attr('data');

			$('#home-slider').slick('slickGoTo', data);
		});

		$('.slideNav a').focus(function() {
			var data = $(this).attr('data');

			$('#home-slider').slick('slickGoTo', data);
		});

	});

})(jQuery);