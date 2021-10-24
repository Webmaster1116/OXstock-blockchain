    <!-- BEGIN HEADER -->

<nav class="navbar ks-navbar">

    <!-- BEGIN HEADER INNER -->

    <!-- BEGIN LOGO -->

    <div href="#" class="navbar-brand">

        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->

        <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>

        <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>

        <!-- END RESPONSIVE SIDEBAR TOGGLER -->



        <div class="ks-navbar-logo">

            <!--<a href="index.html" class="ks-logo">Kosmo</a>-->

            <a href="dashboard.php" class="ks-logo"><img src="images/logo-white.png"></a>

            <!-- END GRID NAVIGATION -->

        </div>

    </div>

    <!-- END LOGO -->



    <!-- BEGIN MENUS -->

    <div class="ks-wrapper">

        <nav class="nav navbar-nav">

            <!-- BEGIN NAVBAR MENU -->

            <div class="ks-navbar-menu">

                

            </div>

            <!-- END NAVBAR MENU -->



            <!-- BEGIN NAVBAR ACTIONS -->

            <div class="ks-navbar-actions">

                <!-- BEGIN NAVBAR LANGUAGES -->

                    

                <!-- END NAVBAR LANGUAGES -->



                <!-- END NAVBAR NOTIFICATIONS -->



                <!-- BEGIN NAVBAR USER -->                

                <div class="nav-item dropdown ks-user" id="dropdownToggle">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >

                        <span class="ks-avatar">                            

                            <img src="<?php echo 'upload/1513241623.png' ?>" width="36" height="36">

                        </span>

                        <span class="ks-info">

                            <span class="ks-name"><?php echo $user['fname'].' '.$user['lname']; ?></span>

                            <span class="ks-description"><?php echo $usergroup['title']; ?></span>

                        </span>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">

                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.ACCOUNT_PROFILE; ?>">

                            <span class="la la-user ks-icon"></span>

                            <span>Profile</span>

                        </a>

                         <!--<a class="dropdown-item" href="<?php // echo URL_BASEADMIN.ACCOUNT_SETTIINGS; ?>">

                            <span class="la la-wrench ks-icon" aria-hidden="true"></span>

                            <span>Settings</span>

                        </a> -->

                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.LOGOUT_PAGE; ?>">

                            <span class="la la-sign-out ks-icon" aria-hidden="true"></span>

                            <span>Logout</span>

                        </a>

                    </div>

                </div>

                <!-- END NAVBAR USER -->

            </div>

            <!-- END NAVBAR ACTIONS -->

        </nav>



        <!-- BEGIN NAVBAR ACTIONS TOGGLER -->

        <nav class="nav navbar-nav ks-navbar-actions-toggle">

            <a class="nav-item nav-link" href="#">

                <span class="la la-ellipsis-h ks-icon ks-open"></span>

                <span class="la la-close ks-icon ks-close"></span>

            </a>

        </nav>

        <!-- END NAVBAR ACTIONS TOGGLER -->



        <!-- BEGIN NAVBAR MENU TOGGLER -->

        <nav class="nav navbar-nav ks-navbar-menu-toggle">

            <a class="nav-item nav-link" href="#">

                <span class="la la-th ks-icon ks-open"></span>

                <span class="la la-close ks-icon ks-close"></span>

            </a>

        </nav>

        <!-- END NAVBAR MENU TOGGLER -->

    </div>

    <!-- END MENUS -->

    <!-- END HEADER INNER -->

</nav>

<!-- END HEADER -->