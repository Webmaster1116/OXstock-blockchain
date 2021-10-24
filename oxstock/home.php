<?php 
include(DIR_BASE.'header.php'); 
?>
<!---------------------- blog-banner ---------------->
<section class="blog-banner">
    <div class="Container">
        <div class="row">
            <div class="col-lg-7">
                <?php
                        // $blogFirstInfo = fetchqry('*',TB_BLOGS,array("id="=>'1'));  
                        
                        $table = TB_BLOGS;
            			$qry = "select c.* from " . $table . " c where 1 ";
            			$qry .= "group by c.id ";
            			$qry .= " order by c.id desc LIMIT 0, 1";
            			$sel = mysqli_query($con, $qry);
            			while ($blogFirstInfo = mysqli_fetch_array($sel)) {
                        $blogAuthor = fetchqry('*',TB_AUTHOR,array("id="=>$blogFirstInfo['author_id']));  
                    ?>
                <div class="singel-post">
                    <div class="image-box">
                        <a href="<?php echo URL_BASE.'blog-detail/'.$blogFirstInfo['url'];?>"><img src="<?php echo URL_BASE.DIR_UPLOADS.$blogFirstInfo['image']; ?>"></a>
                    </div>
                    <div class="pos-contain">
                        <p>
                            <span class="athour"><a href=""><?php echo $blogAuthor['title']; ?></a></span>
                            <span class="date"><?php  echo date( 'j F Y', strtotime($blogFirstInfo['created_at']) ); ?></span>
                        </p>
                        <h3><a href="<?php echo URL_BASE.'blog-detail/'.$blogFirstInfo['url'];?>"><?php echo $blogFirstInfo['title'];?></a></h3>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-5">
                <div class="recent-post">
                    <?php
            				$table = TB_BLOGS;
            				$qry = "select c.* from " . $table . " c where c.id != (SELECT MAX(id) FROM " . $table . ") ";
            				$qry .= "group by c.id ";
            				$qry .= " order by c.id desc LIMIT 0, 4";
            				$sel = mysqli_query($con, $qry);
            				while ($blog = mysqli_fetch_array($sel)) {
            			        $blogAuthor = fetchqry('*',TB_AUTHOR,array("id="=>$blog['author_id'])); 
            			        $blogcat = fetchqry('*',TB_CATEGORIES,array("id="=>$blog['category_id']));  
            			?>
                    <div class="recent-post-box">
                        <p class="category"><a href="<?php echo URL_BASE.'blog-category/'.$blogcat['id'];?>"><?php echo $blogcat['title']; ?></a></p>
                        <h3><a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>"><?php echo $blog['title']; ?></a></h3>
                        <p>
                            <span class="athour"><a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>"><?php echo $blogAuthor['title']; ?></a></span>
                            <span class="date"><?php  echo date( 'j F Y', strtotime($blog['created_at']) ); ?></span>
                        </p>
                    </div>


                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!---------------------- end blog-banner ---------------->

<!---------------------- grap-post-sec ---------------->
<!--- <section class="grap-post-sec">
        <div class="Container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="side-menu">
                        <div class="sid-img">
                            <img src="<?php echo URL_BASE;?>plugin/images/grap_2.jpg">
                        </div>
                        <div class="letest-form">
                            <img src="<?php echo URL_BASE;?>plugin/images/grap_1.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="recent-post">
                        
                        <?php
            				$table = TB_NEWS;
            				$qry = "select c.* from " . $table . " c where 1 ";
            				$qry .= "group by c.id ";
            				$qry .= " order by c.id desc LIMIT 0, 4";
            				$sel = mysqli_query($con, $qry);
            				while ($news = mysqli_fetch_array($sel)) {
            			        $newsAuthor = fetchqry('*',TB_AUTHOR,array("id="=>$news['author_id'])); 
            			        $newscat = fetchqry('*',TB_CATEGORIES,array("id="=>$news['category_id']));  
            			?>
                        
                        <div class="recent-post-box">
                            <div class="left-img">
                                <a href="<?php echo URL_BASE.SEO_NEWSDETAIL.'/'.$news['url'];?>"><img src="<?php echo URL_BASE.DIR_UPLOADS.$news['image']; ?>" width="375" height="250"></a>
                            </div>
                            <div class="right-cont">
                                <p class="category"><a href="<?php echo URL_BASE.SEO_NEWSDETAIL.'/'.$news['url'];?>"><?php echo $newscat['title']; ?></a></p>
                                <h3><a href="<?php echo URL_BASE.SEO_NEWSDETAIL.'/'.$news['url'];?>"><?php echo $news['title']; ?></a></h3>
                                <p>
                                    <span class="athour"><a href="<?php echo URL_BASE.SEO_NEWSDETAIL.'/'.$news['url'];?>"><?php echo $newsAuthor['title']; ?></a></span>
                                    <span class="date"><?php  echo date( 'j F Y', strtotime($news['created_at']) ); ?></span>
                                </p>
                            </div>
                        </div>
                        
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>--->



<section class="currency_home text-center">


    <div class="Container">
        <div class="row currency_icon_info">

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="currency_icon">

                    <div class="currency_image">
                        <a href="#"> <img src="plugin/images/Market-News.png"> </a>
                    </div>
                    <div class="currency_content">

                        <h4><a href="#">Market News</a></h4>

                    </div>

                </div>


            </div>


            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="currency_icon">


                    <div class="currency_image">
                        <a href="<?php echo URL_BASE;?>nft"> <img src="plugin/images/Crypto-Marketplace.png"> </a>
                    </div>
                    <div class="currency_content">

                        <h4><a href="<?php echo URL_BASE;?>nft">Crypto Marketplace</a></h4>

                    </div>

                </div>


            </div>


            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="currency_icon">

                    <div class="currency_image">
                        <a href="<?php echo URL_BASE;?>mining.php"> <img src="plugin/images/Mining-Cloud.png"> </a>
                    </div>
                    <div class="currency_content">

                        <h4><a href="<?php echo URL_BASE;?>mining.php">Mining Cloud</a></h4>

                    </div>




                </div>


            </div>


        </div>


    </div>

</section>




<!---------------------- end grap-post-sec ---------------->

<!---------------------- Recent-post_sec ---------------->
<section class="Recent-post_sec" id="Recent-post_sec">
    <div class="Container">
        <div class="row">
            <div class="col-lg-12">
                <div class="headding">
                    <h2>Recent</h2>
                </div>

                <?php
        				 if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                         } else {
                            $page = 1;
                         }
                         $table = TB_BLOGS;
                         $Limit = 3;
                         $offset = ($page-1) * $Limit;  
                         
                         $total_pages_sql = "SELECT COUNT(*) FROM " . $table . "";
                         $result = mysqli_query($con,$total_pages_sql);
                         $NumberOfResults = mysqli_fetch_array($result)[0];
                         $NumberOfPages = ceil($NumberOfResults / $Limit);
                
                         $sql = "SELECT * FROM " . $table . " ORDER BY id DESC LIMIT $offset, $Limit";
                         $res_data = mysqli_query($con,$sql);
                         while($blog1 = mysqli_fetch_array($res_data)){
                             $blogAuthor = fetchqry('*',TB_AUTHOR,array("id="=>$blog1['author_id'])); 
            			     $blogcat = fetchqry('*',TB_CATEGORIES,array("id="=>$blog1['category_id'])); 
        
        			?>

                <div class="Recent-post_box Recent_box_odd">
                    <div class="recent-img">
                        <a href="#"><img src="<?php echo URL_BASE.DIR_UPLOADS.$blog1['image']; ?>"></a>
                    </div>
                    <div class="recent-contain">
                        <p class="category"><a href="<?php echo URL_BASE.'blog-detail/'.$blog1['url'];?>"><?php echo $blogcat['title']; ?></a></p>
                        <p>
                            <span class="athour"><a href=""><?php echo $blogAuthor['title']; ?></a></span>
                            <span class="date"><?php  echo date( 'j F Y', strtotime($blog1['created_at']) ); ?></span>
                        </p>
                        <h3><a href="<?php echo URL_BASE.'blog-detail/'.$blog1['url'];?>"><?php echo $blog1['title']; ?></a></h3>

                        <div class="read-more">
                            <a href="<?php echo URL_BASE.'blog-detail/'.$blog1['url'];?>">Read More</a>
                        </div>
                    </div>
                </div>

                <?php } ?>



            </div>
        </div>

        <div class="pagnation">
            <div class="row">
                <div class="col-lg-12">
                    <?php include('includes/pagination.php'); ?>
                </div>
            </div>
        </div>

        <!--<div class="pagnation">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content_detail__pagination cdp" actpage="1">
                            <a href="#!-1" class="cdp_i">prev</a>
                            <a href="#!1" class="cdp_i">1</a>
                            <a href="#!2" class="cdp_i">2</a>
                            <a href="#!3" class="cdp_i">3</a>
                            <a href="#!4" class="cdp_i">4</a>
                            <a href="#!5" class="cdp_i">5</a>
                            <a href="#!6" class="cdp_i">6</a>
                            <a href="#!7" class="cdp_i">7</a>
                            <a href="#!8" class="cdp_i">8</a>
                            <a href="#!9" class="cdp_i">9</a>
                            <a href="#!+1" class="cdp_i">next</a>
                        </div>
                    </div>
                </div>
            </div>-->

    </div>
</section>
<!---------------------- end Recent-post_sec ---------------->

<!---------------------- video-post-sec ---------------->
<!-----------    <section class="video-post-sec">
    <div class="Container">
        <div class="row">
            <div  class="col-lg-12">
            
            <div class="headding">
            <h2>Recent Videos</h2>
            </div>
            
            </div>
        <div class="col-lg-7">
            <div class="video-post">
                <div class="video-box">
                <a href="#"><img src="plugin/images/blog-img.png"></a>
                    </div>
                <div class="video-contain">
                    <h3>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt massa id turpis dignissim facilisis. Mauris diam metus, sodales at mauris ac, pharetra pellentesque neque.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-5">
            <div class="all-video-post">
                <div class="all-video-box">
                <p class="category"><a href="#">Lorem Ipsum</a></p>
               <h3><a href="#">Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit.</a></h3>
                   <p>
                    <span class="athour"><a href="">- Sebastian Sinclair</a></span>
                    <span class="date">Aug 19, 2021</span>
                    </p>
                    </div>            
            </div>
            </div>
        </div>
           </div>
    </section>--->

<section class="video-post-sec">


    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="headding">
                    <h2>Recent Videos</h2>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="video-post">
                            <div class="video-box">
                                <iframe width="100%" height="562" src="https://www.youtube.com/embed/MMVnnJfJB38" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-contain">
                                <h3>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt massa id turpis dignissim facilisis. Mauris diam metus, sodales at mauris ac, pharetra pellentesque neque.</p>
                            </div>
                        </div>




                    </div>

                    <div role="tabpanel" class="tab-pane" id="profile">

                        <div class="video-post">
                            <div class="video-box">
                                <iframe width="100%" height="562" src="https://www.youtube.com/embed/linlz7-Pnvw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-contain">
                                <h3>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt massa id turpis dignissim facilisis. Mauris diam metus, sodales at mauris ac, pharetra pellentesque neque.</p>
                            </div>
                        </div>




                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">


                        <div class="video-post">
                            <div class="video-box">
                                <iframe width="100%" height="562" src="https://www.youtube.com/embed/QOdcUvl3IHo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-contain">
                                <h3>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt massa id turpis dignissim facilisis. Mauris diam metus, sodales at mauris ac, pharetra pellentesque neque.</p>
                            </div>
                        </div>




                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">


                        <div class="video-post">
                            <div class="video-box">
                                <iframe width="100%" height="562" src="https://www.youtube.com/embed/Hj4rlbbQK7o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="video-contain">
                                <h3>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt massa id turpis dignissim facilisis. Mauris diam metus, sodales at mauris ac, pharetra pellentesque neque.</p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <ul class="nav nav-tabs tabs-left" role="tablist">


                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">

                            <div class="sider-blog">

                                <div class="blog_b">

                                    <img src="<?php echo URL_BASE;?>plugin/images/blog-img.png">

                                </div>
                                <div class="blog_c">
                                    <p>Lorem Ipsum Dolor Sit Amet
                                        Consectetur Adipilit.</p>

                                </div>

                            </div>





                        </a></li>



                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">

                            <div class="sider-blog">

                                <div class="blog_b">

                                    <img src="<?php echo URL_BASE;?>plugin/images/blog-img.png">

                                </div>
                                <div class="blog_c">
                                    <p>Lorem Ipsum Dolor Sit Amet
                                        Consectetur Adipilit.</p>

                                </div>

                            </div>




                        </a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">

                            <div class="sider-blog">

                                <div class="blog_b">

                                    <img src="<?php echo URL_BASE;?>plugin/images/blog-img.png">

                                </div>
                                <div class="blog_c">
                                    <p>Lorem Ipsum Dolor Sit Amet
                                        Consectetur Adipilit.</p>

                                </div>

                            </div>




                        </a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">


                            <div class="sider-blog">

                                <div class="blog_b">

                                    <img src="<?php echo URL_BASE;?>plugin/images/blog-img.png">

                                </div>
                                <div class="blog_c">
                                    <p>Lorem Ipsum Dolor Sit Amet
                                        Consectetur Adipilit.</p>

                                </div>

                            </div>



                        </a></li>
                </ul>
            </div>
        </div>
    </div>



</section>

<?php include('footer.php'); ?>
<!---------------------- footer ---------------->
