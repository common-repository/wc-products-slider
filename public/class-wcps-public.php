<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://theinnovs.com/wcps
 * @since      1.0.0
 *
 * @package    Wcps
 * @subpackage Wcps/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wcps
 * @subpackage Wcps/public
 * @author     The Innovs <theinnovs@gmail.com>
 */
class Wcps_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcps_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcps_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name .'_wcps-bootstrap', plugin_dir_url( __FILE__ ) . 'css/wcps-bootstrap.min.css', array(), $this->version, '' );
		wp_enqueue_style( $this->plugin_name .'_wcps-owl.carousel.min', plugin_dir_url( __FILE__ ) . 'css/wcps-owl.carousel.min.css', array(), $this->version, '' );
		wp_enqueue_style( $this->plugin_name .'_wcps-font-awosome', plugin_dir_url( __FILE__ ) . 'css/wcps-font-awosome.css', array(), $this->version, '' );
		wp_enqueue_style( $this->plugin_name .'_wcps-owl.theme.default', plugin_dir_url( __FILE__ ) . 'css/wcps-owl.theme.default.min.css', array(), $this->version, '' );
		wp_enqueue_style( $this->plugin_name .'_wcps-slider-3d-gallery-demo', plugin_dir_url( __FILE__ ) . 'css/wcps-slider-3d-gallery-demo.css', array(), $this->version, '' );
		wp_enqueue_style( $this->plugin_name .'_wcps-slider-3d-gallery-style', plugin_dir_url( __FILE__ ) . 'css/wcps-slider-3d-gallery-style.css', array(), $this->version, '' );
		wp_enqueue_style( $this->plugin_name . '_wcps-public', plugin_dir_url( __FILE__ ) . 'css/wcps-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcps_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcps_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( $this->plugin_name . '_wcps-slider-3d-gallery-modernizr', plugin_dir_url( __FILE__ ) . 'js/wcps-slider-3d-gallery-modernizr.custom.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name . '_wcps-slider-3d-gallery-js', plugin_dir_url( __FILE__ ) . 'js/wcps-slider-3d-gallery.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name . '_wcps-owl.carousel.min', plugin_dir_url( __FILE__ ) . 'js/wcps-owl.carousel.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name .'_wcps-custom', plugin_dir_url( __FILE__ ) . 'js/wcps-public.js', array( 'jquery' ), $this->version, false);

	}

}

add_shortcode('wcps_slider', 'wcps_slider');

function wcps_slider($atts) {
	$slide = shortcode_atts( array(
		'style' => esc_attr( get_option('choose_slider') ),
		'limit' => esc_attr( get_option('number_category') ),
	), $atts );

	$cateories = wcpsGetCategory($slide['limit']);
	ob_start();
	if($slide['style'] == 1){
	    wcps_slider_1($cateories);
	}elseif($slide['style'] == 2){
		wcps_slider_2($cateories);
	}elseif($slide['style'] == 3){
		wcps_slider_3($cateories);
	}
	return ob_get_clean();
}
 
function wcps_slider_1($cateories){
	 ob_start();
	?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<section id="wcps_slider_1" class="dg-container">
						<div class="dg-wrapper">
							<?php foreach($cateories as $cateory){ ?>
								<a href="<?php echo esc_url( get_term_link(  $cateory['slug'],'product_cat' ) ); ?>">
									<img src="<?php echo esc_html($cateory['image']); ?>" alt="<?php echo esc_html($cateory['title']); ?>">
									<p class="wcps-cat-title"><?php echo esc_html($cateory['title']); ?></p>
								</a> 
							<?php } ?>
							
						</div>
					</section>
				</div>
			</div>
		</div>
	<?php
}
function wcps_slider_2($cateories){
 	?> 
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<section id="wcps_slider_2" class="dg-container">
						<div class="dg-wrapper">
						<?php foreach($cateories as $cateory){ ?>
							<a href="<?php echo esc_url( get_term_link(  $cateory['slug'],'product_cat' ) ); ?>">
								<img src="<?php echo esc_html($cateory['image']); ?>" alt="<?php echo esc_html($cateory['title']); ?>">
								<p class="wcps-cat-title"><?php echo esc_html($cateory['title']); ?></p>
							</a> 
							<?php } ?>
							
						</div>
						<nav>	
							<span class="dg-prev">&lt;</span>
							<span class="dg-next">&gt;</span>
						</nav>
					</section>
				</div>
			</div>
        </div>
	<?php
 } 
function wcps_slider_3($cateories){
 	?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<section id="wcps_slider_3" class="dg-container">
						<div class="dg-wrapper">
						<?php foreach($cateories as $cateory){ ?>
							<a href="<?php echo esc_url( get_term_link(  $cateory['slug'],'product_cat' ) ); ?>">
								<img src="<?php echo esc_html($cateory['image']); ?>" alt="<?php echo esc_html($cateory['title']); ?>">
								<p class="wcps-cat-title"><?php echo esc_html($cateory['title']); ?></p>
							</a>  
							<?php } ?>
						</div>
						<nav>	
							<span class="dg-prev">&lt;</span>
							<span class="dg-next">&gt;</span>
						</nav>
					</section>
				</div>
			</div>
        </div>
	<?php
 } 

function wcpsGetCategory(){
	$terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		) ); // Get Term 

	$wcpsarryCat = [];	
	foreach ($terms as $key => $value) 
	{
		$thumbnail_id = get_term_meta($value->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		if($value->name == 'Uncategorized'){
			continue;	
		}
		if($image != ''){
			$wcpsarryCat[] = [
				'title' => $value->name,
				'slug' => $value->slug, 
				'image' => $image
			];
		}
	}  

	return $wcpsarryCat;
}


function wcps_slider_shortcode_hook(){
	
	add_shortcode('wcps_product_1', 'wcps_product_slider_one');
	add_shortcode('wcps_product_2', 'wcps_product_slider_two');
	add_shortcode('wcps_product_3', 'wcps_product_slider_three');
	add_shortcode('wcps_product_4', 'wcps_product_slider_four');
	add_shortcode('wcps_product_5', 'wcps_product_slider_five');
	add_shortcode('wcps_product', 'wcps_product_slider_default');
	
}

add_action('init','wcps_slider_shortcode_hook');
// Start Product slide 

function wcps_content(){
	
	the_content();
}
add_action('init' , 'wcps_content');

function wcps_product_slider_default(){
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5 
		);
		$loop = new WP_Query( $args );

		$show_pt = esc_attr(get_option('wcps_show_pt')); // wcps_show_pt = show product title
		if($show_pt == 'on'){
		  $wcps_pt = "block";
		}else{
		  $wcps_pt = "none";
		}

		$show_pp = esc_attr(get_option('wcps_show_pp')); // wcps_show_pp = show Product price
		if($show_pp == 'on'){
		  $wcps_pp = "block";
		}else{
		  $wcps_pp = "none";
		}

		$show_vmb = esc_attr(get_option('wcps_show_vmb')); // wcps_show_vmb = show view more button
		if($show_vmb == 'on'){
		  $wcps_vmb = "block";
		}else{
		  $wcps_vmb = "none";
		}

		$show_atcb = esc_attr(get_option('wcps_show_atcb')); // wcps_show_atcb = show add to cart button
		if($show_atcb == 'on'){
		  $wcps_atcb = "block";
		}else{
		  $wcps_atcb = "none";
		}
		
		ob_start();
	?>
		<div class="container wcps-container">
			<div class="owl-carousel owl-theme wcps-product-slider-one">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="item wcps-ps-iteam">
					<div class="wcps-ps-image">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($loop->post->ID)?></a>
					</div>
					<div class="wcps-ps-content-area mt-4">
						<p class="wcps-ps-price" style="font-size:<?php echo esc_attr(get_option('wcps_pp_size'));?>px; color:<?php echo esc_attr(get_option('wcps_pp_color'));?>; display:<?php echo $wcps_pp; ?>">
							<?php 
							global $post;
							$product = new WC_Product($post->ID);
							echo wc_price($product->get_price());
							?>
						</p>
						<a class="wcps-ps-title" style="font-size:<?php echo esc_attr(get_option('wcps_pt_size'));?>px; color:<?php echo esc_attr(get_option('wcps_pt_color'));?>; display:<?php echo $wcps_pt; ?>" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>

						<a class="wcps-ps-info-btn" style="font-size:<?php echo esc_attr(get_option('wcps_vmb_size'));?>px; color:<?php echo esc_attr(get_option('wcps_vmb_color'));?>; display:<?php echo $wcps_vmb; ?>" href="<?php the_permalink(); ?>">More info</a>

						<a class="wcps-ps-cart-btn" style="font-size:<?php echo esc_attr(get_option('wcps_atcb_size'));?>px; color:<?php echo esc_attr(get_option('wcps_atcb_color'));?>; display:<?php echo $wcps_atcb; ?>" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" >Add to cart</a>
					</div>
				</div>

			<?php endwhile; ?>    
			
			</div>
		</div>
	<?php
return ob_get_clean();
}


// Start Slider one ================

function wcps_product_slider_one(){

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5 
		);
		$loop = new WP_Query( $args );

		$show_pt = esc_attr(get_option('wcps_show_pt_1')); // wcps_show_pt = show product title
		if($show_pt == 'on'){
		  $wcps_pt = "block";
		}else{
		  $wcps_pt = "none";
		}

		$show_pp = esc_attr(get_option('wcps_show_pp_1')); // wcps_show_pp = show Product price
		if($show_pp == 'on'){
		  $wcps_pp = "block";
		}else{
		  $wcps_pp = "none";
		}

		$show_vmb = esc_attr(get_option('wcps_show_vmb_1')); // wcps_show_vmb = show view more button
		if($show_vmb == 'on'){
		  $wcps_vmb = "block";
		}else{
		  $wcps_vmb = "none";
		}

		$show_atcb = esc_attr(get_option('wcps_show_atcb_1')); // wcps_show_atcb = show add to cart button
		if($show_atcb == 'on'){
		  $wcps_atcb = "block";
		}else{
		  $wcps_atcb = "none";
		}

		ob_start();
	?>
		<div class="container wcps-container">
			<div class="owl-carousel owl-theme wcps-product-slider-one one">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="item wcps-ps-iteam">
					<div class="wcps-ps-image">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($loop->post->ID)?></a>
					</div>
						<style>
							.one .wcps-ps-price:hover{color: <?php echo esc_attr(get_option('wcps_pp_hover_1')); ?>;}
							.one .wcps-ps-title:hover{color: <?php echo esc_attr(get_option('wcps_pt_hover_1')); ?>!important;}
							.one .wcps-ps-info-btn:hover{color: <?php echo esc_attr(get_option('wcps_vmb_hover_1')); ?>;}
							.one .wcps-ps-cart-btn:hover{color: <?php echo esc_attr(get_option('wcps_atcb_hover_1')); ?>!important; background: <?php echo esc_attr(get_option('wcps_atcb_bg_hover_1'));?> !important;}
						</style>
					<div class="wcps-ps-content-area mt-4">
						<p class="wcps-ps-price pp-1-c" style="font-size:<?php echo esc_attr(get_option('wcps_pp_size_1'));?>px; color:<?php echo esc_attr(get_option('wcps_pp_color_1'));?>; display:<?php echo $wcps_pp; ?>">
							<?php 
							global $post;
							$product = new WC_Product($post->ID);
							echo wc_price($product->get_price());
							?>
						</p>

						<a class="wcps-ps-title pt-1-c" style="font-size:<?php echo esc_attr(get_option('wcps_pt_size_1'));?>px; color:<?php echo esc_attr(get_option('wcps_pt_color_1'));?>; display:<?php echo $wcps_pt; ?>;" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>

						<a class="wcps-ps-info-btn vmb-1-c" style="font-size:<?php echo esc_attr(get_option('wcps_vmb_size_1'));?>px; color:<?php echo esc_attr(get_option('wcps_vmb_color_1'));?>; display:<?php echo $wcps_vmb; ?>" href="<?php the_permalink(); ?>"> <?php echo esc_attr(get_option('wcps_vb_text_1'));?> </a>

						<a class="wcps-ps-cart-btn atcb-1-c" style="font-size:<?php echo esc_attr(get_option('wcps_atcb_size_1'));?>px; color:<?php echo esc_attr(get_option('wcps_atcb_color_1'));?>; background: <?php echo esc_attr(get_option('wcps_atcb_bg_1'));?>; display:<?php echo $wcps_atcb; ?>" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" > <?php echo esc_attr(get_option('wcps_cb_text_1'));?> </a>
					</div>
				</div>

			<?php endwhile; ?>    
			
			</div>
		</div>

	<script>
        (function( $ ) {
			$(document).ready(function(){

				$('.wcps-product-slider-one').owlCarousel({
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
			})
		})
    	( jQuery );
	</script>
	<?php


return ob_get_clean();

}
// End Slider one ================

/**
 * Start slider two ================
 */

function wcps_product_slider_two(){

	
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5 
		);
		$loop = new WP_Query( $args );

		$show_pt = esc_attr(get_option('wcps_show_pt_2')); // wcps_show_pt = show product title
		if($show_pt == 'on'){
		  $wcps_pt = "block";
		}else{
		  $wcps_pt = "none";
		}

		$show_pp = esc_attr(get_option('wcps_show_pp_2')); // wcps_show_pp = show Product price
		if($show_pp == 'on'){
		  $wcps_pp = "block";
		}else{
		  $wcps_pp = "none";
		}

		$show_vmb = esc_attr(get_option('wcps_show_vmb_2')); // wcps_show_vmb = show view more button
		if($show_vmb == 'on'){
		  $wcps_vmb = "block";
		}else{
		  $wcps_vmb = "none";
		}

		$show_atcb = esc_attr(get_option('wcps_show_atcb_2')); // wcps_show_atcb = show add to cart button
		if($show_atcb == 'on'){
		  $wcps_atcb = "block";
		}else{
		  $wcps_atcb = "none";
		}

		ob_start();
	?>
		<div class="container wcps-container">
			<div class="owl-carousel owl-theme wcps-product-slider-two two">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="item wcps-ps-iteam">
					<div class="wcps-ps-image">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($loop->post->ID)?></a>
					</div>
						<style>
							.two .wcps-ps-price:hover{color: <?php echo esc_attr(get_option('wcps_pp_hover_2')); ?>;}
							.two .wcps-ps-title:hover{color: <?php echo esc_attr(get_option('wcps_pt_hover_2')); ?>!important;}
							.two .wcps-ps-info-btn:hover{color: <?php echo esc_attr(get_option('wcps_vmb_hover_2')); ?>;}
							.two .wcps-ps-cart-btn:hover{color: <?php echo esc_attr(get_option('wcps_atcb_hover_2')); ?>!important; background: <?php echo esc_attr(get_option('wcps_atcb_bg_hover_2'));?>!important;}
						</style>
					<div class="wcps-ps-content-area mt-4">
						<p class="wcps-ps-price pp-2-c" style="font-size:<?php echo esc_attr(get_option('wcps_pp_size_2'));?>px; color:<?php echo esc_attr(get_option('wcps_pp_color_2'));?>; display:<?php echo $wcps_pp; ?>">
							<?php 
							global $post;
							$product = new WC_Product($post->ID);
							echo wc_price($product->get_price());
							?>
						</p>
						<a class="wcps-ps-title pt-2-c" style="font-size:<?php echo esc_attr(get_option('wcps_pt_size_2'));?>px; color:<?php echo esc_attr(get_option('wcps_pt_color_2'));?>; display:<?php echo $wcps_pt; ?>" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>

						<a class="wcps-ps-info-btn vmb-2-c" style="font-size:<?php echo esc_attr(get_option('wcps_vmb_size_2'));?>px; color:<?php echo esc_attr(get_option('wcps_vmb_color_2'));?>; display:<?php echo $wcps_vmb; ?>" href="<?php the_permalink(); ?>"> <?php echo esc_attr(get_option('wcps_vb_text_2'));?> </a>

						<a class="wcps-ps-cart-btn atcb-2-c" style="font-size:<?php echo esc_attr(get_option('wcps_atcb_size_2'));?>px; color:<?php echo esc_attr(get_option('wcps_atcb_color_2'));?>; background:<?php echo esc_attr(get_option('wcps_atcb_bg_2'));?>; display:<?php echo $wcps_atcb; ?>" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" > <?php echo esc_attr(get_option('wcps_cb_text_2'));?> </a>
					</div>
				</div>

			<?php endwhile; ?> 
			
			</div>
		</div>
		<script>
			(function( $ ) {
				//'use strict';
				$(document).ready(function(){

					$('.wcps-product-slider-two').owlCarousel({
						loop:true,
						margin:15,
						nav:true,
						autoplay:true,
						dots: true,
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
				})
			})
			( jQuery );
		</script>
	<?php

return ob_get_clean();
}
/**
 * End slider two =================
 */


 /**
 * Start slider three ================
 */

function wcps_product_slider_three(){

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5 
		);
		$loop = new WP_Query( $args );

		$show_pt = esc_attr(get_option('wcps_show_pt_3')); // wcps_show_pt = show product title
		if($show_pt == 'on'){
		  $wcps_pt = "block";
		}else{
		  $wcps_pt = "none";
		}

		$show_pp = esc_attr(get_option('wcps_show_pp_3')); // wcps_show_pp = show Product price
		if($show_pp == 'on'){
		  $wcps_pp = "block";
		}else{
		  $wcps_pp = "none";
		}

		$show_vmb = esc_attr(get_option('wcps_show_vmb_3')); // wcps_show_vmb = show view more button
		if($show_vmb == 'on'){
		  $wcps_vmb = "block";
		}else{
		  $wcps_vmb = "none";
		}

		$show_atcb = esc_attr(get_option('wcps_show_atcb_3')); // wcps_show_atcb = show add to cart button
		if($show_atcb == 'on'){
		  $wcps_atcb = "block";
		}else{
		  $wcps_atcb = "none";
		}

		ob_start();
	?>
		<div class="container wcps-container">
			<div class="owl-carousel owl-theme wcps-product-slider-three three">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="item wcps-ps-iteam">
					<div class="wcps-ps-image">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($loop->post->ID)?></a>
					</div>
						<style>
							.three .wcps-ps-price:hover{color: <?php echo esc_attr(get_option('wcps_pp_hover_3')); ?>;}
							.three .wcps-ps-title:hover{color: <?php echo esc_attr(get_option('wcps_pt_hover_3')); ?>!important;}
							.three .wcps-ps-info-btn:hover{color: <?php echo esc_attr(get_option('wcps_vmb_hover_3')); ?>;}
							.three .wcps-ps-cart-btn:hover{color: <?php echo esc_attr(get_option('wcps_atcb_hover_3')); ?>!important; background: <?php echo esc_attr(get_option('wcps_atcb_bg_hover_3'));?> !important;}
						</style>
					<div class="wcps-ps-content-area mt-4">
						<p class="wcps-ps-price pp-3-c" style="font-size:<?php echo esc_attr(get_option('wcps_pp_size_3'));?>px; color:<?php echo esc_attr(get_option('wcps_pp_color_3'));?>; display:<?php echo $wcps_pp; ?>">
							<?php 
							global $post;
							$product = new WC_Product($post->ID);
							echo wc_price($product->get_price());
							
							
							?>
						</p>
						<a class="wcps-ps-title pt-3-c" style="font-size:<?php echo esc_attr(get_option('wcps_pt_size_3'));?>px; color:<?php echo esc_attr(get_option('wcps_pt_color_3'));?>; display:<?php echo $wcps_pt; ?>" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>

						<a class="wcps-ps-info-btn vmb-3-c" style="font-size:<?php echo esc_attr(get_option('wcps_vmb_size_3'));?>px; color:<?php echo esc_attr(get_option('wcps_vmb_color_3'));?>; display:<?php echo $wcps_vmb; ?>" href="<?php the_permalink(); ?>"> <?php echo esc_attr(get_option('wcps_vb_text_3'));?> </a>

						<a class="wcps-ps-cart-btn atcb-3-c" style="font-size:<?php echo esc_attr(get_option('wcps_atcb_size_3'));?>px; color:<?php echo esc_attr(get_option('wcps_atcb_color_3'));?>; background: <?php echo esc_attr(get_option('wcps_atcb_bg_3'));?>;  display:<?php echo $wcps_atcb; ?>" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" > <?php echo esc_attr(get_option('wcps_cb_text_3'));?> </a>
					</div>
				</div>

			<?php endwhile; ?>   
			
			</div>
		</div>

	<script>
        (function( $ ) {
           // 'use strict';
			$(document).ready(function(){

				$('.wcps-product-slider-three').owlCarousel({
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
			})
		})
    	( jQuery );
	</script>
	<?php

return ob_get_clean();
}
/**
 * End slider three ==================
 */


 /**
 * Start slider four ==================
 */

function wcps_product_slider_four(){

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5 
		);
		$loop = new WP_Query( $args );

		$show_pt = esc_attr(get_option('wcps_show_pt_4')); // wcps_show_pt = show product title
		if($show_pt == 'on'){
		  $wcps_pt = "block";
		}else{
		  $wcps_pt = "none";
		}

		$show_pp = esc_attr(get_option('wcps_show_pp_4')); // wcps_show_pp = show Product price
		if($show_pp == 'on'){
		  $wcps_pp = "block";
		}else{
		  $wcps_pp = "none";
		}

		$show_vmb = esc_attr(get_option('wcps_show_vmb_4')); // wcps_show_vmb = show view more button
		if($show_vmb == 'on'){
		  $wcps_vmb = "block";
		}else{
		  $wcps_vmb = "none";
		}

		$show_atcb = esc_attr(get_option('wcps_show_atcb_4')); // wcps_show_atcb = show add to cart button
		if($show_atcb == 'on'){
		  $wcps_atcb = "block";
		}else{
		  $wcps_atcb = "none";
		}

		ob_start();
	?>
		<div class="container wcps-container">
			<div class="owl-carousel owl-theme wcps-product-slider-four four">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="item wcps-ps-iteam">
					<div class="wcps-ps-image">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($loop->post->ID)?></a>
					</div>
						<style>
							.four .wcps-ps-price:hover{color: <?php echo esc_attr(get_option('wcps_pp_hover_4')); ?>;}
							.four .wcps-ps-title:hover{color: <?php echo esc_attr(get_option('wcps_pt_hover_4')); ?>!important;}
							.four .wcps-ps-info-btn:hover{color: <?php echo esc_attr(get_option('wcps_vmb_hover_4')); ?>;}
							.four .wcps-ps-cart-btn:hover{color: <?php echo esc_attr(get_option('wcps_atcb_hover_4')); ?>!important; background: <?php echo esc_attr(get_option('wcps_atcb_bg_hover_4'));?>!important;}
						</style>
					<div class="wcps-ps-content-area mt-4">
						<p class="wcps-ps-price pp-4-c" style="font-size:<?php echo esc_attr(get_option('wcps_pp_size_4'));?>px; color:<?php echo esc_attr(get_option('wcps_pp_color_4'));?>; display:<?php echo $wcps_pp; ?>">
							<?php 
							global $post;
							$product = new WC_Product($post->ID);
							echo wc_price($product->get_price());
							?>
						</p>
						



						<a class="wcps-ps-title pt-4-c" style="font-size:<?php echo esc_attr(get_option('wcps_pt_size_4'));?>px; color:<?php echo esc_attr(get_option('wcps_pt_color_4'));?>; display:<?php echo $wcps_pt; ?>" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>

						<a class="wcps-ps-info-btn vmb-4-c" style="font-size:<?php echo esc_attr(get_option('wcps_vmb_size_4'));?>px; color:<?php echo esc_attr(get_option('wcps_vmb_color_4'));?>; display:<?php echo $wcps_vmb; ?>" href="<?php the_permalink(); ?>"> <?php echo esc_attr(get_option('wcps_vb_text_4'));?> </a>

						<a class="wcps-ps-cart-btn atcb-4-c" style="font-size:<?php echo esc_attr(get_option('wcps_atcb_size_4'));?>px; color:<?php echo esc_attr(get_option('wcps_atcb_color_4'));?>; background: <?php echo esc_attr(get_option('wcps_atcb_bg_4'));?>; display:<?php echo $wcps_atcb; ?>" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" > <?php echo esc_attr(get_option('wcps_cb_text_4'));?> </a>
					</div>
				</div>

			<?php endwhile; ?>     
			
			</div>
		</div>
	<script>
        (function( $ ) {
            //'use strict';
			$(document).ready(function(){
				$('.wcps-product-slider-four').owlCarousel({
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
			})
		})
    	( jQuery );
	</script>
	<?php

return ob_get_clean();
}

/**
 * End slider four
 */


  /**
 * Start slider five ==================
 */

  
function wcps_product_slider_five(){
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 5 
		);
		$loop = new WP_Query( $args );

		$show_pt = esc_attr(get_option('wcps_show_pt_5')); // wcps_show_pt = show product title
		if($show_pt == 'on'){
		  $wcps_pt = "block";
		}else{
		  $wcps_pt = "none";
		}

		$show_pp = esc_attr(get_option('wcps_show_pp_5')); // wcps_show_pp = show Product price
		if($show_pp == 'on'){
		  $wcps_pp = "block";
		}else{
		  $wcps_pp = "none";
		}

		$show_vmb = esc_attr(get_option('wcps_show_vmb_5')); // wcps_show_vmb = show view more button
		if($show_vmb == 'on'){
		  $wcps_vmb = "block";
		}else{
		  $wcps_vmb = "none";
		}

		$show_atcb = esc_attr(get_option('wcps_show_atcb_5')); // wcps_show_atcb = show add to cart button
		if($show_atcb == 'on'){
		  $wcps_atcb = "block";
		}else{
		  $wcps_atcb = "none";
		}

		ob_start();
		
	?>
	
		<div class="container wcps-container">
			<div class="owl-carousel owl-theme wcps-product-slider-five five">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="item wcps-ps-iteam">
					<div class="wcps-ps-image">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($loop->post->ID)?></a>
					</div>
						<style>
							.five .wcps-ps-price:hover{color: <?php echo esc_attr(get_option('wcps_pp_hover_5')); ?>;}
							.five .wcps-ps-title:hover{color: <?php echo esc_attr(get_option('wcps_pt_hover_5')); ?>!important;}
							.five .wcps-ps-info-btn:hover{color: <?php echo esc_attr(get_option('wcps_vmb_hover_5')); ?>;}
							.five .wcps-ps-cart-btn:hover{color: <?php echo esc_attr(get_option('wcps_atcb_hover_5')); ?>!important; background: <?php echo esc_attr(get_option('wcps_atcb_bg_hover_5'));?>!important;}
						</style>
					<div class="wcps-ps-content-area mt-4">
						<p class="wcps-ps-price pp-5-c" style="font-size:<?php echo esc_attr(get_option('wcps_pp_size_5'));?>px; color:<?php echo esc_attr(get_option('wcps_pp_color_5'));?>; display:<?php echo $wcps_pp; ?>">
							<?php 
							global $post;
							$product = new WC_Product($post->ID);
							echo wc_price($product->get_price());
							?>
						</p>
						
						<a class="wcps-ps-title pt-5-c" style="font-size:<?php echo esc_attr(get_option('wcps_pt_size_5'));?>px; color:<?php echo esc_attr(get_option('wcps_pt_color_5'));?>; display:<?php echo $wcps_pt; ?>" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>

						<a class="wcps-ps-info-btn vmb-5-c" style="font-size:<?php echo esc_attr(get_option('wcps_vmb_size_5'));?>px; color:<?php echo esc_attr(get_option('wcps_vmb_color_5'));?>; display:<?php echo $wcps_vmb; ?>" href="<?php the_permalink(); ?>"> <?php echo esc_attr(get_option('wcps_vb_text_5'));?> </a>

						<a class="wcps-ps-cart-btn atcb-5-c" style="font-size:<?php echo esc_attr(get_option('wcps_atcb_size_5'));?>px; color:<?php echo esc_attr(get_option('wcps_atcb_color_5'));?>; background: <?php echo esc_attr(get_option('wcps_atcb_bg_5'));?>; display:<?php echo $wcps_atcb; ?>" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" > <?php echo esc_attr(get_option('wcps_cb_text_5'));?> </a>
					</div>
				</div>

			<?php endwhile; ?>     
			
			</div>
		</div>
	<script>
        (function( $ ) {
            //'use strict';
			$(document).ready(function(){
				$('.wcps-product-slider-five').owlCarousel({
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
							items:4
						}
					}
				})
			})
		})
    	( jQuery );
	</script>
	<?php

return ob_get_clean();
}

/**
 * End slider five
 */








