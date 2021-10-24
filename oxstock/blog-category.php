<?php 
require_once 'classes/configure.php'; 
include('header.php'); 
// define('SEO_BLOGDETAIL','blog-detail');
// define('BLOGDETAIL','blog-detail.php'); 

// define('SEO_NEWSDETAIL','news-detail');
// define('NEWSDETAIL','news-detail.php'); 

// define('SEO_BLOGCATEGORY','blog-category');
// define('BLOGCATEGORY','blog-category.php');

// print_r($blogCatId['category_id']);exit;
$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/',$link);
$blogCatId = end($link_array);

?>
<!---------------------- blog-banner ---------------->


<section class="news-sec">
    <div class="Container">
        <div class="row">
            <div class="col-md-8">
                <!--   <div class="news-left">
                    <h2>Apple cant force developers to use its in-app payment system, federal judge rules</h2>

                    <div class="image-news">
                        <img src="http://www.kpve.com.au/oxstock/uploads/2021/09/38cd6e7Screen_Shot_2021_09_13_at_6.15.03_pm.png">
                    </div>
                </div>-->

                <div class="row news_sec_wrap">
                    
                    <div class="col-md-12">
                    
                    <div class="hedd_news">
                        
                        <h3>All Ox Stock News</h3>
                        
                        </div>
                    
                    </div>


                    <div class="col-md-12">
                        
                        <?php 
            				$table = TB_BLOGS;
            			    $qry = "select c.* from " . $table . " c where c.category_id=".$blogCatId." ";
            				$qry .= "group by c.id ";
            				$qry .= " order by c.id desc";
            				$sel = mysqli_query($con, $qry);
            				while ($blog = mysqli_fetch_array($sel)) {
            			        $blogAuthor = fetchqry('*',TB_AUTHOR,array("id="=>$blog['author_id'])); 
            			        $blogcat = fetchqry('*',TB_CATEGORIES,array("id="=>$blog['category_id']));  
            			?>
            			
                        <div class="Recent-post_box">
                            <div class="recent-img">
                                <a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>"><img src="<?php echo URL_BASE.DIR_UPLOADS.$blog['image']; ?>" height="105" width="158"></a>
                            </div>
                            <div class="recent-contain">
                                <p>
                                    <span class="athour"><a href=""><?php echo $blogAuthor['title']; ?></a></span>
                                    <span class="date"><?php  echo date( 'j F Y', strtotime($blog['created_at']) ); ?></span>
                                </p>
                                <h3><a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>"><?php echo $blog['title']; ?></a></h3>

                                <div class="read-more">
                                    <a href="<?php echo URL_BASE.'blog-detail/'.$blog['url'];?>">Read More</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>    
                        
        
                    </div>



                </div>
                
                
                <!--<div class="row news_sec_wrap">
                    
                <div class="col-md-12">
                    
                    <div class="hedd_news">
                        
                        <h3>Commentary</h3>
                        
                        </div>
                    
                    </div>    
                
                
                <div class="col-md-6">
                       <div class="Recent-post_box">
                            <div class="recent-img">
                                <a href="#"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/331bb34Screen_Shot_2021_09_16_at_8.41.31_am.png" width="76" height="51"></a>
                            </div>
                            <div class="recent-contain">
                                <p>
                                    <span class="athour"><a href="">OX STOCKS</a></span>
                                    <span class="date">16 September 2021</span>
                                </p>
                                <h3><a href="http://www.kpve.com.au/oxstock/blog-detail/ethereum-founder-vitalik-buterin-named-to-time-magazine’s-‘most-influential’-list-b8">Ethereum Founder Vitalik Buterin Named to Time Magazine’s ‘Most Influential’ List</a></h3>

                             
                            </div>
                        </div>
                    
                     <div class="Recent-post_box">
                            <div class="recent-img">
                                <a href="#"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/1b41c1eScreen_Shot_2021_09_09_at_10.04.08_am.png" width="76" height="51"></a>
                            </div>
                            <div class="recent-contain">
                                <p> <span class="athour"><a href="">Dimitri</a></span>
                                    <span class="date">11 September 2021</span>
                                </p>
                                <h3><a href="http://www.kpve.com.au/oxstock/blog-detail/bitcoin-rebound-stalls-after-botched-el-salvador-rollout-b5">Bitcoin Rebound Stalls After Botched El Salvador Rollout</a></h3>

                           
                            </div>
                        </div>

                    </div>
                      
                <div class="col-md-6">
                       <div class="Recent-post_box">
                            <div class="recent-img">
                                <a href="#"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/331bb34Screen_Shot_2021_09_16_at_8.41.31_am.png" width="76" height="51"></a>
                            </div>
                            <div class="recent-contain">
                                <p>
                                    <span class="athour"><a href="">OX STOCKS</a></span>
                                    <span class="date">16 September 2021</span>
                                </p>
                                <h3><a href="http://www.kpve.com.au/oxstock/blog-detail/ethereum-founder-vitalik-buterin-named-to-time-magazine’s-‘most-influential’-list-b8">Ethereum Founder Vitalik Buterin Named to Time Magazine’s ‘Most Influential’ List</a></h3>

                             
                            </div>
                        </div>
                    
                     <div class="Recent-post_box">
                            <div class="recent-img">
                                <a href="#"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/1b41c1eScreen_Shot_2021_09_09_at_10.04.08_am.png" width="76" height="51"></a>
                            </div>
                            <div class="recent-contain">
                                <p> <span class="athour"><a href="">Dimitri</a></span>
                                    <span class="date">11 September 2021</span>
                                </p>
                                <h3><a href="http://www.kpve.com.au/oxstock/blog-detail/bitcoin-rebound-stalls-after-botched-el-salvador-rollout-b5">Bitcoin Rebound Stalls After Botched El Salvador Rollout</a></h3>

                             
                                </div>
                            </div>
                        </div>

                    </div> -->
                
                
                </div>
          



                <div class="col-md-4">
                    <div class="news-sid-ber news_bar_in">

                        <div class="recent-post">
                            <h3>Recent News</h3>
                            
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


                            <!--<div class="post">
                                <div class="left-img">
                                    <a href="http://www.kpve.com.au/oxstock/blog-detail/ethereum-founder-vitalik-buterin-named-to-time-magazine’s-‘most-influential’-list-b8"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/331bb34Screen_Shot_2021_09_16_at_8.41.31_am.png" height="50" width="50"></a>
                                </div>
                                <div class="right-cont">
                                    <p class="date">16 September 2021</p>
                                    <h3 class="title"> <a href="http://www.kpve.com.au/oxstock/blog-detail/ethereum-founder-vitalik-buterin-named-to-time-magazine’s-‘most-influential’-list-b8">Ethereum Founder Vitalik Buterin Named to Time Magazine’s ‘Most Influential’ List</a></h3>
                                </div>
                            </div>


                            <div class="post">
                                <div class="left-img">
                                    <a href="http://www.kpve.com.au/oxstock/blog-detail/apple-cant-force-developers-to-use-its-in-app-payment-system-federal-judge-rules-b7"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/38cd6e7Screen_Shot_2021_09_13_at_6.15.03_pm.png" height="50" width="50"></a>
                                </div>
                                <div class="right-cont">
                                    <p class="date">16 September 2021</p>
                                    <h3 class="title"> <a href="http://www.kpve.com.au/oxstock/blog-detail/apple-cant-force-developers-to-use-its-in-app-payment-system-federal-judge-rules-b7">Apple cant force developers to use its in-app payment system, federal judge rules</a></h3>
                                </div>
                            </div>


                            <div class="post">
                                <div class="left-img">
                                    <a href="http://www.kpve.com.au/oxstock/blog-detail/sydney-airport-nears-sale-with-new-takeover-bid-b6"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/44771b3Screen_Shot_2021_09_13_at_2.14.55_pm.png" height="50" width="50"></a>
                                </div>
                                <div class="right-cont">
                                    <p class="date">13 September 2021</p>
                                    <h3 class="title"> <a href="http://www.kpve.com.au/oxstock/blog-detail/sydney-airport-nears-sale-with-new-takeover-bid-b6">Sydney Airport Nears Sale with New Takeover Bid</a></h3>
                                </div>
                            </div>


                            <div class="post">
                                <div class="left-img">
                                    <a href="http://www.kpve.com.au/oxstock/blog-detail/bitcoin-rebound-stalls-after-botched-el-salvador-rollout-b5"><img src="http://www.kpve.com.au/oxstock/uploads/2021/09/1b41c1eScreen_Shot_2021_09_09_at_10.04.08_am.png" height="50" width="50"></a>
                                </div>
                                <div class="right-cont">
                                    <p class="date">11 September 2021</p>
                                    <h3 class="title"> <a href="http://www.kpve.com.au/oxstock/blog-detail/bitcoin-rebound-stalls-after-botched-el-salvador-rollout-b5">Bitcoin Rebound Stalls After Botched El Salvador Rollout</a></h3>
                                </div>
                            </div>-->





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
                     <div class="image-news">
                        <img src="<?php echo URL_BASE;?>plugin/images/news_cc.jpg"/>
                    </div>
                    
                    
                </div>
            </div>

        </div>
</section>










<!---------------------- end blog-banner ---------------->










<?php include('footer.php'); ?>
<!---------------------- footer ---------------->
