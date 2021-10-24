<?php 

require_once 'classes/configure.php'; 
include('header.php'); 
define('SEO_NEWSDETAIL','news-detail');
define('NEWSDETAIL','news-detail.php'); 
?>
    <!---------------------- end priching ---------------->
    <!---------------------- news-sec ---------------->

    <div class="news-sec">
        <div class="Container">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-left">
                        <h2><?php echo $NewsInfo['title'];?></h2>
                        
                        <div class="image-news">
                            <img src="<?php echo URL_BASE.DIR_UPLOADS.$NewsInfo['image']; ?>">
                        </div>
                        <div class="pro-fil">
                            <div class="img-man">
                                <img src="<?php echo URL_BASE;?>plugin/images/mvn-pro.png">
                            </div>
                            <div class="socil-med">
                                <h3><i><?php echo $NewsInfo['author']; ?></i></h3>
                                <ul>
                                    <li><a href="<?php echo $NewsInfo['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $NewsInfo['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $NewsInfo['linkedin']; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $NewsInfo['linkedin']; ?>"><i class="fa fa-share" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="contain">
                            <p class="date"><?php  echo date( 'j F Y', strtotime($NewsInfo['created_at']) ); ?></p>
                            <p> <?php echo $NewsInfo['description'];?></p>

                        </div>
                       
                       
                       
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="news-sid-ber">
                           <!-- <div class="se_category">
                            <div class="category">
                            <h3>Categories</h3>
                                <ul>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Proin libero nisl cursus</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Qrisus leo, et venenatis</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Adipiscing elitam tempus</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Thet amet, consectetur</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
                                </ul>
                            </div>
                            </div>-->
                            <div class="recent-post">
                                <h3>Recent News</h3>
                                
                                <?php
                    				$table = TB_NEWS;
                    				$Limit = 4;
                    				$qry = "select c.* from " . $table . " c where 1 ";
                    				if ($swords) {
                    					$qry .= "and 1 ";
                    					$paginationback .= "&s=" . $swords;
                    				}
                    				/*     * For Group By * */
                    				$qry .= "group by c.id ";
                    				/*     * For Ordering * */
                    				$qry .= " order by c.id desc";
                    				$page = $_REQUEST['page'];
                    				$sel = mysqli_query($con, $qry);
                    				if ($page == "")
                    					$page = 1;
                    				$NumberOfResults = mysqli_num_rows($sel);
                    				$NumberOfPages = ceil($NumberOfResults / $Limit);
                    				$sel = mysqli_query($con, $qry . " LIMIT " . ($page - 1) * $Limit . ",$Limit");
                    				$display = mysqli_num_rows($sel);
                    			
                    			    $n = ($page - 1) * $Limit;
                    			    while ($blog = mysqli_fetch_array($sel)) {
                    
                    			?>
                                
                                <div class="post">
                                <div class="left-img">
                                    <a href="<?php echo URL_BASE.SEO_NEWSDETAIL.'/'.$blog['url'];?>"><img src="<?php echo URL_BASE.DIR_UPLOADS.$blog['image']; ?>" height="50" width="50"></a>
                                </div>
                                <div class="right-cont">
                                <p class="date"><?php  echo date( 'j F Y', strtotime($blog['created_at']) ); ?></p>
                                    <h3 class="title"> <a href="<?php echo URL_BASE.SEO_NEWSDETAIL.'/'.$blog['url'];?>"><?php echo $blog['title']; ?></a></h3>
                                </div>
                                </div>
                                
                                 <?php } ?>  
                                

                                
                            </div> 
                            <div class="social-add">
                            <div class="social-profile">
                            <h3>social profiles</h3>
                                 <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>

                                </ul>
                            </div>                            
                           
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!---------------------- end news-sec ---------------->
    <!---------------------- related-sec ---------------->
    <div class="related-sec">
    <div class="Container">
        <div class="row">
            <div class="col-lg-12">
            <div class="heading">
                <h2>Related</h2>
                </div>
            </div>
        <div class="col-sm-4">
            <div class="related-post">
            <div class="img-post_r">
                <img src="<?php echo URL_BASE;?>plugin/images/cryptocurrency-rate.jpg">
                <p>Consectetur</p>
                </div>
                <div class="contain">
                    <p class="date">  Aug 19, 2021 </p>
                <h3>Lorem Ipsum Dolor Sit Amet Consesec Consectetur scing dft.</h3>
                    <p>- Sebastian Sinclair</p>
                </div>
            </div>
            </div>
            
                 <div class="col-sm-4">
            <div class="related-post">
            <div class="img-post_r">
                <img src="<?php echo URL_BASE;?>plugin/images/YjiK7dolQ.jpg">
                <p>Consectetur</p>
                </div>
                <div class="contain">
                    <p class="date">  Aug 19, 2021 </p>
                <h3>Lorem Ipsum Dolor Sit Amet Consesec Consectetur scing dft.</h3>
                    <p>- Sebastian Sinclair</p>
                </div>
            </div>
            </div>
            
                 <div class="col-sm-4">
            <div class="related-post">
            <div class="img-post_r">
                <img src="<?php echo URL_BASE;?>plugin/images/iK7dolQ-copy.jpg">
                <p>Consectetur</p>
                </div>
                <div class="contain">
                    <p class="date">  Aug 19, 2021 </p>
                <h3>Lorem Ipsum Dolor Sit Amet Consesec Consectetur scing dft.</h3>
                    <p>- Sebastian Sinclair</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
        <!---------------------- end related-sec ---------------->

     <!---------------------- footer ---------------->
   <?php include('footer.php'); ?>