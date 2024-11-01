<?php


class Wcps_Js{


    public function __construct(){
        add_action('wp_footer',array($this , 'wcps_product_slider_js'));

    }

    public function wcps_product_slider_js(){
        ob_start();
		?>
		<script>
			// (function( $ ) {
			// 	'use strict';
				// $(function(){

					$('.wcps-product-slider-two').owlCarousel({
						loop:true,
						margin:15,
						nav:true,
						autoplay:true,
						dots: false,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:2
							},
							1000:{
								items:3
							}
						}
					})
				// })
			// })
			// ( jQuery );

			// (function( $ ) {
			// 	'use strict';
				
			// 		$(".pro-ti-5").click(function(){
			// 			$(".pt-5-c").toggle(300);
			// 		});

			// 		$(".vmb-5").click(function(){
			// 			$(".vmb-5-c").toggle(300);
			// 		});

			// 		$(".pp-5").click(function(){
			// 			$(".pp-5-c").toggle(300);
			// 		});

			// 		$(".atcb-5").click(function(){
			// 			$(".atcb-5-c").toggle(300);
			// 		});
				
			// 	})( jQuery );
		</script>
		
		
        <?php
        
        ob_end_clean();
	}



}

new Wcps_Js();