
<?php

$page = 'category'; //Set page active backgound color
define('WCPS_SLIDER_PAGE_PATH',plugin_dir_path(__FILE__) );
include_once WCPS_SLIDER_PAGE_PATH . 'part/wcps-head.php';

?>




<div class="col-md-10 wcps-setting-body">
    <form method="post" action="options.php">
   
        <?php 
            settings_fields( 'wcps_slider_setting_category' );
            do_settings_sections( 'wcps_slider_setting_category' );
            
            $choose_slider_style = esc_attr(get_option('choose_slider'));
            $style_one = "";
            $style_two = "";
            $style_three = "";
            if($choose_slider_style == 1){
                $style_one = "checked";
            }elseif($choose_slider_style == 2){
                $style_two = "checked";
            }else{
                $style_three = "checked";
            }
    ?>
    <div class="row">

        <div class="col-md-12"> 
            <div class="row">
              <div class="col-md-5">
                <div class="wcps-copy-text">
                  <span>Use ShortCode : </span> <input readonly type="text" value=" [wcps_slider]"><span id="copy"><i class="far fa-copy"></i></span> <span class="copied"> </span>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                  <div class="wcps-demo-text">
                    <p class="">Style One : Auto slide show <input name="choose_slider" class="" <?php echo $style_one; ?> value="1" type="radio"></p>
                    <div class="wcps-demo-img" id="wcps_s_one">
                      <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_1.png');?>" data-lighter>
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_1.png');?>" alt="">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="wcps-demo-text">
                    <p class="">Style Two : Auto slide show with nav <input name="choose_slider" <?php echo $style_two; ?> value="2" type="radio" ></p>
                    <div class="wcps-demo-img" id="wcps_s_one">
                      <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_2.png');?>" data-lighter >
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_2.png');?>" alt="">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="wcps-demo-text">
                    <p class="">Style Three: Only nav <input name="choose_slider" <?php echo $style_three; ?> value="3" type="radio" ></p>
                    
                    <div class="wcps-demo-img" id="wcps_s_one">
                      <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_3.png');?>" data-lighter>
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_3.png');?>" alt="">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mt-4">
                  <div class="row">
                    <div class="col-md-5">
                      <p>Categories</p>
                    </div>
                    <div class="col-md-7">
                      <!-- <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple" >
                          <option value="AL">Alabama</option>
                          <option value="AL">Alabama</option>
                          <option value="AL">Alabama</option>
                          <option value="AL">Alabama</option>
                          <option value="WY">Wyoming</option>
                      </select> -->
                      <p><input type="number" class="form-control" name="number_category" value="<?php echo esc_attr(get_option('number_category'));?>"></p>
                    </div>
                  </div>
                </div>
            </div>
                      
        </div>
        
    </div> <!--End row -->

    <div class="wcps-submit-btn">
        <?php submit_button('SAVE CHANGES'); ?>
    </div>
  </form>
</div>




<!-- shortcode show in modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Theme One ShortCode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Add ShortCode: <span> [wcps_product_1]</span> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<?php

include_once WCPS_SLIDER_PAGE_PATH . 'part/wcps-foot.php';

?>



