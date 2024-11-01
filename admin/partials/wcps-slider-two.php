<?php

$page = 'theme_two'; //Set page active backgound color
define('WCPS_SLIDER_PAGE_PATH',plugin_dir_path(__FILE__) );
include_once WCPS_SLIDER_PAGE_PATH . 'part/wcps-head.php';

?>




    <div class="col-md-10 wcps-setting-body">
        <form method="post" action="options.php">
        <!-- <div class="wcps-save-btn">
            <?php //submit_button('SAVE CHANGES'); ?>
        </div> -->
            <?php 
                settings_fields( 'wcps_slider_setting_two' );
                do_settings_sections( 'wcps_slider_setting_two' );
                

                $show_pt = esc_attr(get_option('wcps_show_pt_2')); // wcps_show_pt = show product title
                if($show_pt == 'on'){
                    $wcps_pt = "checked";
                }else{
                    $wcps_pt = " ";
                    $wcps_pt_none = "none";
                }

                $show_pp = esc_attr(get_option('wcps_show_pp_2')); // wcps_show_pp = show Product price
                if($show_pp == 'on'){
                    $wcps_pp = "checked";
                }else{
                    $wcps_pp = " ";
                    $wcps_pp_none = "none";
                }

                $show_vmb = esc_attr(get_option('wcps_show_vmb_2')); // wcps_show_vmb = show view more button
                if($show_vmb == 'on'){
                    $wcps_vmb = "checked";
                }else{
                    $wcps_vmb = " ";
                    $wcps_vmb_none = "none";
                }

                $show_atcb = esc_attr(get_option('wcps_show_atcb_2')); // wcps_show_atcb = show add to cart button
                if($show_atcb == 'on'){
                    $wcps_atcb = "checked";
                }else{
                    $wcps_atcb = " ";
                    $wcps_atcb_none= "none";
                }
        ?>
        <div class="row">

            <div class="col-md-5 wcps-admin-slide">
                <div class="wcps-copy-text">
                    <span>Use ShortCode : </span> <input readonly type="text" value=" [wcps_product_2]"><span id="copy"><i class="far fa-copy"></i></span> <span class="copied"> </span>
                </div>
                <div class="wcps-slider-show-area">
                    <?php echo do_shortcode("[wcps_product_2]"); ?>
                </div>

                <div class="row mt-4">
                    <hr>
                    <div class="col-md-6">
                        <label for="">Change Cart button text</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="wcps_cb_text_2" value="<?php echo esc_attr(get_option('wcps_cb_text_2'));?>" class="form-control">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="">Change view button text</label>
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" name="wcps_vb_text_2" value="<?php echo esc_attr(get_option('wcps_vb_text_2'));?>" class="form-control">
                    </div>
                </div>
            </div> <!-- End col 5 -->

            <div class="col-md-7">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-9">
                                <p class="wcps-p-title">Show Product Title</p>
                            </div>
                            <div class="col-md-3 text-right pro-ti-2">
                                <input type="checkbox" class="wcps-switch-btn" <?php echo $wcps_pt; ?> data-toggle="toggle" name="wcps_show_pt_2" data-onstyle="success" data-offstyle="danger">
                            </div>

                            <div class="col-md-12 wcps-pt-panel pt-2-c" style="display: <?php echo $wcps_pt_none; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Title Color</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="wcps_pt_color_2" value="<?php echo esc_attr(get_option('wcps_pt_color_2'));?>" class="wcps-color">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">hover Color</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" name="wcps_pt_hover_2" value="<?php echo esc_attr(get_option('wcps_pt_hover_2'));?>" class="wcps-color">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Font Size</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="number" name="wcps_pt_size_2" value="<?php echo esc_attr(get_option('wcps_pt_size_2'));?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-9">
                                <p class="wcps-p-title">View More Button</p>
                            </div>
                            <div class="col-md-3 text-right vmb-2">
                                <input type="checkbox" <?php echo $wcps_vmb; ?> data-toggle="toggle" name="wcps_show_vmb_2" data-onstyle="success" data-offstyle="danger">
                            </div>
                            <div class="col-md-12 wcps-vmb-panel vmb-2-c" style="display: <?php echo $wcps_vmb_none; ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Title Color</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="wcps_vmb_color_2" value="<?php echo esc_attr(get_option('wcps_vmb_color_2'));?>" class="wcps-color">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Hover Color</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" name="wcps_vmb_hover_2" value="<?php echo esc_attr(get_option('wcps_vmb_hover_2'));?>" class="wcps-color">
                                    </div>
                                
                                    <div class="col-md-6 mt-2">
                                        <label for="">Font Size</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="number" name="wcps_vmb_size_2" value="<?php echo esc_attr(get_option('wcps_vmb_size_2'));?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">

                        
                        <div class="row ">
                            <div class="col-md-9">
                                <p class="wcps-p-title">Show Product Price</p>
                            </div>
                            <div class="col-md-3 text-right pp-2">
                                <input type="checkbox" <?php echo $wcps_pp; ?> data-toggle="toggle" name="wcps_show_pp_2" data-onstyle="success" data-offstyle="danger">
                            </div>

                            <div class="col-md-12 wcps-pt-panel pp-2-c" style="display: <?php echo $wcps_pp_none; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Price Color</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="wcps_pp_color_2" value="<?php echo esc_attr(get_option('wcps_pp_color_2'));?>" class="wcps-color">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Hover Color</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" name="wcps_pp_hover_2" value="<?php echo esc_attr(get_option('wcps_pp_hover_2'));?>" class="wcps-color">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Font Size</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="number" name="wcps_pp_size_2" value="<?php echo esc_attr(get_option('wcps_pp_size_2'));?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-9">
                                <p class="wcps-p-title">Add to Cart Button</p>
                                </div>
                                <div class="col-md-3 text-right atcb-2">
                                <input type="checkbox" <?php echo $wcps_atcb; ?>  data-toggle="toggle" name="wcps_show_atcb_2" data-onstyle="success" data-offstyle="danger">
                            </div>
                                
                            <div class="col-md-12 wcps-acb-panel atcb-2-c" style="display: <?php echo $wcps_atcb_none; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Title Color</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="wcps_atcb_color_2" value="<?php echo esc_attr(get_option('wcps_atcb_color_2'));?>" class="wcps-color">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="">Hover Color</label>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <input type="text" name="wcps_atcb_hover_2" value="<?php echo esc_attr(get_option('wcps_atcb_hover_2'));?>" class="wcps-color">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="">backgound</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" name="wcps_atcb_bg_2" value="<?php echo esc_attr(get_option('wcps_atcb_bg_2'));?>" class="wcps-color">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="">Hover</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" name="wcps_atcb_bg_hover_2" value="<?php echo esc_attr(get_option('wcps_atcb_bg_hover_2'));?>" class="wcps-color">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="">Font Size</label>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="number" name="wcps_atcb_size_2" value="<?php echo esc_attr(get_option('wcps_atcb_size_2'));?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>

                </div> 
            </div> <!-- End 7 -->
            
        </div> <!--End row -->

        <div class="wcps-submit-btn">
            <?php submit_button('SAVE CHANGES'); ?>
        </div>
    </form>
    </div>

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

<script>
     (function( $ ) {
    'use strict';
    
        $(".pro-ti-2").click(function(){
            $(".pt-2-c").toggle(300);
        });

        $(".vmb-2").click(function(){
            $(".vmb-2-c").toggle(300);
        });

        $(".pp-2").click(function(){
            $(".pp-2-c").toggle(300);
        });

        $(".atcb-2").click(function(){
            $(".atcb-2-c").toggle(300);
        });
      
    })( jQuery );

</script>



