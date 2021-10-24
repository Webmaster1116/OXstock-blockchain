<?php 

require_once 'classes/configure.php'; 
include(DIR_BASE.'header.php'); 
define('BLOGDETAIL','blog-detail.php'); 
$url = isset($_GET['url']) && $_GET['url'] != '' ? trim($_GET['url']) : '';
$blogInfo = array();

$q = $db->pdoQuery("SELECT b.*,a.title as author FROM blogs as b LEFT JOIN author AS a ON a.id = b.author_id where b.url=? LIMIT 1",array($url));
if($q->affectedRows() > 0){
    $blogInfo = $q->result();
}
?>
    <!---------------------- end priching ---------------->
    <!---------------------- news-sec ---------------->

    <div class="news-sec">
        <div class="Container">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-left">
                        <h2><?php echo $blogInfo['title'];?></h2>
                        
                        <div class="image-news">
                            <img src="<?php echo URL_BASE.DIR_UPLOADS.$blogInfo['image']; ?>">
                        </div>
                        <div class="pro-fil">
                            <div class="img-man">
                                <img src="<?php echo URL_BASE;?>plugin/images/mvn-pro.png" height="40" width="40">
                            </div>
                            <div class="socil-med">
                                <h3><i><?php echo $blogInfo['author']; ?></i></h3>
                                <ul>
                                    <li><a href="<?php echo $blogInfo['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $blogInfo['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $blogInfo['linkedin']; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $blogInfo['linkedin']; ?>"><i class="fa fa-share" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="contain">
                            <p class="date"><?php  echo date( 'j F Y', strtotime($blogInfo['created_at']) ); ?></p>
                            <p> <?php echo $blogInfo['description'];?></p>

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
                                <h3>Recent Posts</h3>
                                
                                <?php
                    				$table = TB_BLOGS;
                    				$Limit = 4;
                    				$qry = "select c.* from " . $table . " c where 1 ";
                    				
                    				/*     * For Group By * */
                    				$qry .= "group by c.id ";
                    				/*     * For Ordering * */
                    				$qry .= " order by c.id desc";
                    				$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 0;
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
                                    <a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>"><img src="<?php echo URL_BASE.DIR_UPLOADS.$blog['image']; ?>" height="50" width="50"></a>
                                </div>
                                <div class="right-cont">
                                <p class="date"><?php  echo date( 'j F Y', strtotime($blog['created_at']) ); ?></p>
                                    <h3 class="title"> <a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>"><?php echo $blog['title']; ?></a></h3>
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