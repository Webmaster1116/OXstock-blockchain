<div class="ks-column ks-sidebar ks-info">

    <div class="ks-wrapper ks-sidebar-wrapper">

        <ul class="nav nav-pills nav-stacked">

            <li class="nav-item">

                <a class="nav-link" href="<?php echo URL_BASEADMIN.HOME_PAGE; ?>">

                    <span class="ks-icon la la-dashboard"></span>

                    <span>Dashboard</span>

                </a>

            </li>  
           <?php 
		    //$get_url = $_SERVER['PHP_SELF'];
		   
		   	$link = $_SERVER['PHP_SELF'];
		    $link_array = explode('/',$link);
		    $get_url = end($link_array);
		   
		   ?>
           
         <?php /*  
             <li class="nav-item dropdown <?php if(HOME_CONTENT == $get_url || SERVICE_LIST == $get_url || SLIDER_LIST == $get_url || TESTIMONIAL_LIST == $get_url || BRAND_LIST == $get_url) { echo 'open'; } ?>">
    
                <a class="nav-link dropdown-toggle" href="#">     
    
                    <span class="ks-icon la la-list"></span>
    
                    <span>Home</span>
    
                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . HOME_CONTENT; ?>">Home Content</a>

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . SLIDER_LIST; ?>">Slider</a>
                    
                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . SERVICE_LIST; ?>">Services</a>
                    
                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . BRAND_LIST; ?>">Brand</a>
                    
                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . TESTIMONIAL_LIST; ?>">Testimonial</a>

                </div>

            </li>
           */ ?>
            
       <!--       <li class="nav-item">

                <a class="nav-link" href="<?php // echo URL_BASEADMIN.HOME_CONTENT; ?>">

                    <span class="ks-icon la la-home"></span>

                    <span>Home Content</span>

                </a>

            </li>    

        
          

            <li class="nav-item dropdown <?php if(SERVICE_LIST == $get_url || SERVICE_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">     

                    <span class="ks-icon la la-list"></span>

                    <span>Services</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . SERVICE_LIST; ?>">List Service</a>

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . SERVICE_EDIT; ?>">Add Service</a>

                </div>

            </li> -->

          <?php /*?> <li class="nav-item dropdown <?php if(PSLIDER_LIST == $get_url || PSLIDER_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">     

                    <span class="ks-icon la la-sliders"></span>

                    <span>Product Slider</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . PSLIDER_LIST; ?>">List Slider</a>

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . PSLIDER_EDIT; ?>">Add Slider</a>

                </div>

            </li>          <?php */?> 

           <!--   <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#">     

                    <span class="ks-icon la la-tasks"></span>

                    <span>Tasks</span>

                </a>

                <div class="dropdown-menu">      

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . TASK_STATUS_LIST; ?>">List of Tasks Status</a>

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . TASKS_LIST; ?>">List Tasks</a>

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . TASKS_EDIT; ?>">Create Task</a>

                </div>

            </li>  --> 
            
            <li class="nav-item dropdown <?php if(CATEGORIES_LIST == $get_url || CATEGORIES_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">

                    <span class="ks-icon la la-tasks"></span>

                    <span>Category</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN.CATEGORIES_LIST; ?>">List Category</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN.CATEGORIES_EDIT; ?>">Add Product</a>-->

                </div>

            </li>
            
            
            <li class="nav-item dropdown <?php if(AUTHOR_LIST == $get_url || AUTHOR_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">

                    <span class="ks-icon la la-tasks"></span>

                    <span>Author</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN.AUTHOR_LIST; ?>">List Author</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN.CATEGORIES_EDIT; ?>">Add Product</a>-->

                </div>

            </li>

 <?php /*  
            <li class="nav-item dropdown <?php if(PRODUCTS_LIST == $get_url || PRODUCTS_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">           

                    <span class="ks-icon la la-cart-plus"></span>

                    <span>Categories</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN.PRODUCTS_LIST; ?>">List Categories</a>

                   <!-- <a class="dropdown-item" href="<?php // echo URL_BASEADMIN.PRODUCTS_EDIT; ?>">Add Categories</a>-->

                </div>

            </li>

            

            <li class="nav-item dropdown <?php if(CATEGORIES_LIST == $get_url || CATEGORIES_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">

                    <span class="ks-icon la la-tasks"></span>

                    <span>Product</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN.CATEGORIES_LIST; ?>">List Product</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN.CATEGORIES_EDIT; ?>">Add Product</a>-->

                </div>

            </li> */ ?>

           <!-- <li class="nav-item dropdown <?php // if(SUB_CATEGORIES_LIST == $get_url || SUB_CATEGORIES_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">

                    <span class="ks-icon la la-tasks"></span>

                    <span>Sub Categories</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN.SUB_CATEGORIES_LIST; ?>">List Sub Categories</a>

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN.SUB_CATEGORIES_EDIT; ?>">Add Sub Category</a>

                </div>

            </li>-->

            <?php /*   

             <li class="nav-item dropdown <?php if(GALLERY_LIST == $get_url || GALLERY_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Gallery</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . GALLERY_LIST; ?>">List Gallery</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN . GALLERY_EDIT; ?>">Add Gallery</a>-->

                </div>

            </li> */ ?>
            
         <!--    <li class="nav-item dropdown <?php // if(BRAND_LIST == $get_url || BRAND_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Brand</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . BRAND_LIST; ?>">List Brand</a>

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . BRAND_EDIT; ?>">Add Brand</a>

                </div>

            </li>-->

 <?php /*  
            <li class="nav-item dropdown <?php if(CMSPAGE_LIST == $get_url || CMSPAGE_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Cms Pages</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . CMSPAGE_LIST; ?>">List Cms Pages</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN . CMSPAGE_EDIT; ?>">Add Cms Pages</a>-->

                </div>

            </li> */ ?>

        <!--    <li class="nav-item dropdown <?php // if(TESTIMONIAL_LIST == $get_url || TESTIMONIAL_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Testimonial</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . TESTIMONIAL_LIST; ?>">List Testimonial</a>

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . TESTIMONIAL_EDIT; ?>">Add Testimonial</a>

                </div>

            </li>-->
            
            
            <li class="nav-item dropdown <?php if(BLOGS_LIST == $get_url || BLOGS_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Blogs</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . BLOGS_LIST; ?>">List Blog</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN . BLOGS_EDIT; ?>">Add Blog</a>-->

                </div>

            </li>
            
             <li class="nav-item dropdown <?php if(NEWS_LIST == $get_url || NEWS_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>News</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . NEWS_LIST; ?>">List News</a>

                    <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN . BLOGS_EDIT; ?>">Add Blog</a>-->

                </div>

            </li>
            
            <?php /*   <li class="nav-item dropdown <?php if(INQUIRY_LIST == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Inquiry</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . INQUIRY_LIST; ?>">List Inquiry</a>

                </div>

            </li>    */ ?>         

            

          <!--  <li class="nav-item dropdown <?php // if(SLIDER_LIST == $get_url || SLIDER_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-sliders"></span>

                    <span>Slider</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . SLIDER_LIST; ?>">List Slider</a>

                    <a class="dropdown-item" href="<?php // echo URL_BASEADMIN . SLIDER_EDIT; ?>">Add Slider</a>

                </div>

            </li>-->
            
               <li class="nav-item dropdown <?php if(ACCOUNT_SETTIINGS == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-sliders"></span>

                    <span>Settings</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . ACCOUNT_SETTIINGS; ?>">Settings</a>

                </div>

            </li>
            
            <li class="nav-item dropdown <?php if(TESTIMONIAL_LIST == $get_url || TESTIMONIAL_LIST == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-envelope"></span>

                    <span>Testimonial</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . TESTIMONIAL_LIST; ?>">List Testimonial</a>

                    
                </div>

            </li> 
            
<!--            <li class="nav-item dropdown <?php if(TEAM_LIST == $get_url || TEAM_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-sliders"></span>

                    <span>Team</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . TEAM_LIST; ?>">List Team</a>

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . TEAM_EDIT; ?>">Add Team</a>

                </div>

            </li>
            
            <li class="nav-item dropdown <?php if(HISTORY_LIST == $get_url || HISTORY_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-sliders"></span>

                    <span>Comany History</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . HISTORY_LIST; ?>">List History</a>

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . HISTORY_EDIT; ?>">Add History</a>

                </div>

            </li>-->

            <li class="nav-item dropdown <?php if(USER_LIST == $get_url || USER_EDIT == $get_url) { echo 'open'; } ?>">

                <a class="nav-link dropdown-toggle" href="#">            

                    <span class="ks-icon la la-sliders"></span>

                    <span>User</span>

                </a>

                <div class="dropdown-menu">                   

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . USER_LIST; ?>">List User</a>

                    <a class="dropdown-item" href="<?php echo URL_BASEADMIN . USER_EDIT; ?>">Add User</a>

                </div>

            </li>

        </ul>

        <div class="ks-sidebar-extras-block">            

            <div class="ks-sidebar-copyright">© <?php echo date('Y'); ?> <?php echo BASSOCCIATES; ?></div>

        </div>

    </div>

</div>