

<div class="container-fluid wcps-setting-page">
                <form method="post" action="options.php">
                    <?php 
                        settings_fields( 'wcps_slider_setting_group' );
                        do_settings_sections( 'wcps_slider_setting_group' );
                      
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

                        $show_pt = esc_attr(get_option('wcps_show_pt')); // wcps_show_pt = show product title
                        if($show_pt == 'on'){
                          $wcps_pt = "checked";
                        }else{
                          $wcps_pt = " ";
                        }

                        $show_pp = esc_attr(get_option('wcps_show_pp')); // wcps_show_pp = show Product price
                        if($show_pp == 'on'){
                          $wcps_pp = "checked";
                        }else{
                          $wcps_pp = " ";
                        }

                        $show_vmb = esc_attr(get_option('wcps_show_vmb')); // wcps_show_vmb = show view more button
                        if($show_vmb == 'on'){
                          $wcps_vmb = "checked";
                        }else{
                          $wcps_vmb = " ";
                        }

                        $show_atcb = esc_attr(get_option('wcps_show_atcb')); // wcps_show_atcb = show add to cart button
                        if($show_atcb == 'on'){
                          $wcps_atcb = "checked";
                        }else{
                          $wcps_atcb = " ";
                        }

                        

                ?>
  <div class="row">

    <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-transparent"><h4 class="wcps-h4">WC Products Slider Setting</h4></div>
          <div class="card-body">
            <h5 class="card-title">Add shortcode: [wcps_product]</h5>

              <div class="row">
                  <div class="col-md-6">
                    <div class="wcps-demo-text">
                      <p>Theme One : [wcps_product_1] </p>
                      <div class="wcps-demo-img" id="wcps_s_one">
                        <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_1.png');?>" data-lighter>
                          <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_1.png');?>" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="wcps-demo-text">
                      <p>Theme Two : [wcps_product_2] </p>
                      <div class="wcps-demo-img" id="wcps_s_one">
                        <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_2.png');?>" data-lighter >
                          <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_2.png');?>" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-4">
                    <div class="wcps-demo-text">
                      <p>Theme Three : [wcps_product_3] </p>
                      <div class="wcps-demo-img" id="wcps_s_one">
                        <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_3.png');?>" data-lighter >
                          <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_3.png');?>" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="wcps-demo-text mt-4">
                      <p>Theme Four : [wcps_product_4] </p>
                      <div class="wcps-demo-img" id="wcps_s_one">
                        <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_4.png');?>" data-lighter >
                          <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/p_slider_4.png');?>" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="row mt-4">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-7">
                        <p class="wcps-p-title">Show Product Title</p>
                      </div>
                      <div class="col-md-5 text-right">
                        <input type="checkbox" class="wcps-switch-btn" <?php echo $wcps_pt; ?> data-toggle="toggle" name="wcps_show_pt" data-onstyle="success" data-offstyle="danger">
                      </div>
                      <div class="col-md-12 wcps-pt-panel">

                        <div class="row">
                          <div class="col-md-6">
                            <label for="">Title Color</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="wcps_pt_color" value="<?php echo esc_attr(get_option('wcps_pt_color'));?>" class="wcps-color">
                          </div>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label for="">Font Size</label>
                          </div>
                          <div class="col-md-6">
                            <input type="number" name="wcps_pt_size" value="<?php echo esc_attr(get_option('wcps_pt_size'));?>" class="form-control">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-7">
                        <p class="wcps-p-title">Show Product Price</p>
                      </div>
                      <div class="col-md-5 text-right">
                        <input type="checkbox" <?php echo $wcps_pp; ?> data-toggle="toggle" name="wcps_show_pp" data-onstyle="success" data-offstyle="danger">
                      </div>
                    
                      <div class="col-md-12 wcps-pp-panel">

                        <div class="row">
                          <div class="col-md-6">
                            <label for="">Price Color</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="wcps_pp_color" value="<?php echo esc_attr(get_option('wcps_pp_color'));?>" class="wcps-color">
                          </div>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label for="">Font Size</label>
                          </div>
                          <div class="col-md-6">
                            <input type="number" name="wcps_pp_size" value="<?php echo esc_attr(get_option('wcps_pp_size'));?>" class="form-control">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-4">
                    <div class="row">
                      <div class="col-md-7">
                        <p class="wcps-p-title">View More Button</p>
                      </div>
                      <div class="col-md-5 text-right">
                        <input type="checkbox" <?php echo $wcps_vmb; ?> data-toggle="toggle" name="wcps_show_vmb" data-onstyle="success" data-offstyle="danger">
                      </div>
                      <div class="col-md-12 wcps-vmb-panel">

                        <div class="row">
                          <div class="col-md-6">
                            <label for="">Title Color</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="wcps_vmb_color" value="<?php echo esc_attr(get_option('wcps_vmb_color'));?>" class="wcps-color">
                          </div>
                        </div>


                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label for="">Font Size</label>
                          </div>
                          <div class="col-md-6">
                            <input type="number" name="wcps_vmb_size" value="<?php echo esc_attr(get_option('wcps_vmb_size'));?>" class="form-control">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-4">
                    <div class="row">
                      <div class="col-md-7">
                        <p class="wcps-p-title">Add to Cart Button</p>
                      </div>
                      <div class="col-md-5 text-right">
                        <input type="checkbox" <?php echo $wcps_atcb; ?> data-toggle="toggle" name="wcps_show_atcb" data-onstyle="success" data-offstyle="danger">
                      </div>
                      <div class="col-md-12 wcps-acb-panel">

                        <div class="row">
                          <div class="col-md-6">
                            <label for="">Title Color</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="wcps_atcb_color" value="<?php echo esc_attr(get_option('wcps_atcb_color'));?>" class="wcps-color">
                          </div>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label for="">Font Size</label>
                          </div>
                          <div class="col-md-6">
                            <input type="number" name="wcps_atcb_size" value="<?php echo esc_attr(get_option('wcps_atcb_size'));?>" class="form-control">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

              </div>

            </div>
        </div>
    </div>    <!-- End Product Slider settings -->


    <div class="col-md-6"> 
        <div class="card">
          <div class="card-header bg-transparent"><h4 class="wcps-h4">WC Category Slider Setting</h4></div>
          <div class="card-body">
            <h5 class="card-title">Add shortcode: [wcps_slider]</h5>
            <div class="row">
                <div class="col-md-4">
                  <div class="wcps-demo-text">
                    <p class="">Style One : Auto slide show </p>
                    <p class="card-text wcps-p"></span>  <input for="wcps_s_one" name="choose_slider" <?php echo $style_one; ?> value="1" type="radio"></p>
                    <div class="wcps-demo-img" id="wcps_s_one">
                      <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_1.png');?>" data-lighter>
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_1.png');?>" alt="">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="wcps-demo-text">
                    <p class="">Style Two : Auto slide show with nav</p>
                    <p class="card-text wcps-p"></span>  <input for="wcps_s_one" name="choose_slider" <?php echo $style_two; ?> value="2" type="radio" ></p>
                    <div class="wcps-demo-img" id="wcps_s_one">
                      <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_2.png');?>" data-lighter >
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_2.png');?>" alt="">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="wcps-demo-text">
                    <p class="">Style Three: Only nav</p>
                    <p class="card-text wcps-p"></span>  <input for="wcps_s_one" name="choose_slider" <?php echo $style_three; ?> value="3" type="radio" ></p>
                    <div class="wcps-demo-img" id="wcps_s_one">
                      <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_3.png');?>" data-lighter>
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../img/slider_3.png');?>" alt="">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mt-4">
                  <div class="row">
                    <div class="col-md-3">
                      <p>Categories</p>
                    </div>
                    <div class="col-md-9">
                      <!-- <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple" >
                          <option value="AL">Alabama</option>
                          <option value="AL">Alabama</option>
                          <option value="AL">Alabama</option>
                          <option value="AL">Alabama</option>
                          <option value="WY">Wyoming</option>
                      </select> -->
                      <p><input type="number" name="number_category" value="<?php echo esc_attr(get_option('number_category'));?>"></p>
                    </div>
                  </div>
                </div>
                  
              </div>
          </div>
    </div>

  </div>
  <?php submit_button(); ?>
  </form>
</div>