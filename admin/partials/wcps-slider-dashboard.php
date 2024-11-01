
<?php

$page = 'dashboard'; //Set page active backgound color
define('WCPS_SLIDER_PAGE_PATH',plugin_dir_path(__FILE__) );
include_once WCPS_SLIDER_PAGE_PATH . 'part/wcps-head.php';

?>




<div class="col-md-10 wcps-setting-body">
    <form method="post" action="options.php">
   
        <?php 
            settings_fields( 'wcps_slider_setting_category' );
            do_settings_sections( 'wcps_slider_setting_category' );
      
    ?>
    <div class="row">
      <div class="col-md-6 wcps-slider-feature">
        <h4>Features of WC Products Slider</h4>
        <ul>
          <li><i class="far fa-hand-point-right"></i> 4 Layouts with different Design <a href="https://demo.theinnovs.com/wcps/slider/" target="_blank">Preview</a></li>
          <li><i class="far fa-hand-point-right"></i> Responsive and mordern design</li>
          <li><i class="far fa-hand-point-right"></i> Customize color, font-size, hover effect</li>
          <li><i class="far fa-hand-point-right"></i> Show / Hide product title, Price of each slider</li>
          <li><i class="far fa-hand-point-right"></i> Show / Hide view more button of each slider</li>
          <li><i class="far fa-hand-point-right"></i> Show / Hide Add to cart button of each slider</li>
          <li><i class="far fa-hand-point-right"></i> Change add to cart button and view more button text</li>
        </ul>
        <!-- <hr> -->
      </div>
      <div class="col-md-6 wcps-slider-feature">
        <h4>Features of WC Products Category Slider</h4>
        <ul>
          <li><i class="far fa-hand-point-right"></i> 3 Layouts with different Design <a href="https://demo.theinnovs.com/wcps/slider/" target="_blank" >Preview</a></li>
          <li><i class="far fa-hand-point-right"></i> Responsive and mordern design</li>
          <li><i class="far fa-hand-point-right"></i> Auto slide with nav bar</li>
          <li><i class="far fa-hand-point-right"></i> Only nav bar</li>
          <li><i class="far fa-hand-point-right"></i> Auto slider without nav bar</li>
        </ul>
        <!-- <hr> -->
      </div>

      <!-- <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <div class="wcps-slider-view">
              <?php //echo do_shortcode("[wcps_product_1]"); ?>
            </div>
          </div>
          <div class="col-md-12 mt-2">
            <div class="wcps-slider-view">
              <?php //echo do_shortcode("[wcps_product_2]"); ?>
            </div>
          </div>
          <div class="col-md-12 mt-4">
            <div class="wcps-slider-view">
              <?php// echo do_shortcode("[wcps_product_3]"); ?>
            </div>
          </div>
          <div class="col-md-12 mt-2">
            <div class="wcps-slider-view">
              <?php //echo do_shortcode("[wcps_product_4]"); ?>
            </div>
          </div>
        </div>
      </div> -->

    </div> <!--End row -->

    <!-- <div class="wcps-submit-btn">
        <?php //submit_button('SAVE CHANGES'); ?>
    </div> -->
  </form>
</div>



<?php

include_once WCPS_SLIDER_PAGE_PATH . 'part/wcps-foot.php';

?>



