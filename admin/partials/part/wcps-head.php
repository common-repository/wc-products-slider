<div class="wrap">
    <div class="container-fluid mt-4 wcps-header">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav flex-column wcps-nav-bar" id="menu">
                    <li class="nav-item <?php if($page == 'dashboard'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link" href="<?php echo admin_url(); ?>admin.php?page=wcps_dashboard">Slider Dashboard</a>
                    </li>
                    <li class="nav-item <?php if($page == 'theme_one'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link" href="<?php echo admin_url(); ?>admin.php?page=wcps_slider_one">Slider Theme One</a>
                    </li>
                    <li class="nav-item <?php if($page == 'theme_two'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link" href="<?php echo admin_url(); ?>admin.php?page=wcps_slider_two">Slider Theme Two</a>
                    </li>
                    <li class="nav-item <?php if($page == 'theme_three'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link" href="<?php echo admin_url(); ?>admin.php?page=wcps_slider_three">Slider Theme Three</a>
                    </li>
                    <li class="nav-item <?php if($page == 'theme_four'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link" href="<?php echo admin_url(); ?>admin.php?page=wcps_slider_four">Slider Theme Four</a>
                    </li>
                    <li class="nav-item <?php if($page == 'theme_five'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link" href="<?php echo admin_url(); ?>admin.php?page=wcps_slider_five">Slider Theme Five</a>
                    </li>
                    <li class="nav-item <?php if($page == 'category'){echo 'wcps-nav-active';}?>">
                        <a class="nav-link " href="<?php echo admin_url(); ?>admin.php?page=wcps_category_slider">Category Slider</a>
                    </li>
                </ul>
            </div>
   