<?php 
include 'classes/configure.php'; 
$url = explode( "/",(isset($_REQUEST['q']) ? $_REQUEST['q'] : '') );
$urlarr = array_filter($url);	
$urlstr = implode("','",$url);	
$level = sizeof($urlarr);	
$shopby = false;	

function category_tree($catid,&$tree){

	$selCate = selectqry('*',TB_PRODUCTS,array("parent_id="=>$catid));  

	while($row = mysqli_fetch_array($selCate)):
		$tree[] = $row['id'];
		category_tree($row['id'],$tree);        
	endwhile;

}

/* * For Pagination * */
if(in_array("page", $urlarr))
{
	$temp = array_search("page",$urlarr)+1;		
	$movepage = $urlarr[$temp];
	unset($urlarr[$temp-1],$urlarr[$temp]);
	$urlarr = array_values($urlarr);
	$pageurl = 'page/'.$movepage;	
}

/* * For Products Limit * */
if(in_array("limit", $urlarr))
{
	$temp = array_search("limit",$urlarr)+1;		

	$Limit = $urlarr[$temp];
	
	unset($urlarr[$temp-1],$urlarr[$temp]);
	
	$urlarr = array_values($urlarr);
	
	$limiturl .= 'limit/'.$Limit;	
	
}



/* * For Products SortBy * */

if(in_array("sortby", $urlarr))

{

	$temp = array_search("sortby",$urlarr)+1;		

	$SortBy = $urlarr[$temp];

	unset($urlarr[$temp-1],$urlarr[$temp]);

	$urlarr = array_values($urlarr);

	$sortbyurl .= 'sortby/'.$SortBy;	

}


/* * For Delete record from cart * */

if(in_array("did", $urlarr))

{

	$temp = array_search("did",$urlarr)+1;		

	$did = $urlarr[$temp];

	unset($urlarr[$temp-1],$urlarr[$temp]);

	$urlarr = array_values($urlarr);

	$didurl = 'did/'.$did;	

}

$fullurl = implode('/',$urlarr);
$baseurl = implode('/',$urlarr);		
if(count($urlarr) > 0)
	$turl = $urlarr[sizeof($urlarr)-1];

// if(getrows('*',TB_BLOGS,array("url="=>$turl))>0)
// {	
// 	$blogInfo = fetchqry('*',TB_BLOGS,array("url="=>$turl));  
// 	define('SEO_BLOGDETAIL','blog-detail');
// 	define('BLOGDETAIL','blog-detail.php');  
// 	require(BLOGDETAIL);
	
// }else if(getrows('*',TB_NEWS,array("url="=>$turl))>0){	
// 	$NewsInfo = fetchqry('*',TB_NEWS,array("url="=>$turl));  
// 	define('SEO_NEWSDETAIL','news-detail');
// 	define('NEWSDETAIL','news-detail.php');   
	
// 	require(NEWSDETAIL);
	
// }else if(getrows('*',TB_CATEGORIES,array("id="=>$turl))>0){	
// 	$blogCatId = fetchqry('category_id',TB_BLOGS,array("category_id="=>$turl));  
// 	define('SEO_BLOGCATEGORY','blog-category');
// 	define('BLOGCATEGORY','blog-category.php');   
	
// 	require(BLOGCATEGORY);
	
// }else if($turl == SEO_ABOUTUS){
// 	require(ABOUTUS);
// }else if($turl == SEO_CONTACT){
// 	require(CONTACT);
// }else if($turl == SEO_GALLERY){
// 	require(GALLERY);
// }else if($turl == SEO_BLOG){
// 	require(BLOG);	
// }else if($turl == SEO_PRODUCT){
// 	require(PRODUCT);	
// }else if($turl == SEO_PRODUCTDETAIL){
// 	require(PRODUCTDETAIL);	
// }
// else if($turl == SEO_FAQ){
// 	require(FAQ);
// }else{
// 	require(DEFAULTPAGE);
// }

require_once DIR_BASE.'home.php'; 