<?php
/* generate element start */
function elementtb($name, $value="", $class="", $id="", $extra="")
{
	$id = ($id=="") ? $name : $id;
	$class = ($class=="") ? "tbox" : $class;
	return '<input name="'.$name.'" type="text" id="'.$id.'" value="'.$value.'" class="'.$class.'" '.$extra.'/>';
}
function elementpw($name, $value="", $class="", $id="", $extra="")
{
	$id = ($id=="") ? $name : $id;
	$class = ($class=="") ? "tbox" : $class;
	return '<input name="'.$name.'" type="password" id="'.$id.'" value="'.$value.'" class="'.$class.'" '.$extra.'/>';
}
function elementhd($name, $value="", $id="", $extra="")
{
	$id = ($id=="") ? $name : $id;
	$class = ($class=="") ? "tbox" : $class;
	return '<input name="'.$name.'" type="hidden" id="'.$id.'" value="'.$value.'" '.$extra.'/>';
}
function elementta($name, $value="", $class="", $id="", $extra="")
{
	$id = ($id=="") ? $name : $id;
	$class = ($class=="") ? "tabox" : $class;
	return '<textarea name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.'>'.$value.'</textarea>';
}
function elementlb($name, $optionlist, $value="", $class="", $id="", $extra="")
{
	$id = ($id=="") ? $name : $id;
	$class = ($class=="") ? "sbox" : $class;
	$element='<select name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.'>';
	foreach ($optionlist as $opt => $optval)
	{
		$element.='<option value="'.$optval['value'].'"';
		if($optval['value']==$value)
			$element.='selected="selected"';
		$element.='>'.$optval['title'].'</option>';
	}
	$element.='</select>';
	return $element;
}
function elementolb($name, $optionlist, $value="", $class="", $id="", $extra="")
{
	$id = ($id=="") ? $name : $id;
	$class = ($class=="") ? "sbox" : $class;
	$element='<select name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.'>';
	foreach ($optionlist as $opt => $optval)
	{		
		if($optval['options'])
		{
			$element.='<option disabled="disabled" value="'.$optval['value'].'" style="font-weight:bold;font-style:italic;color:#000000;">'.$optval['title'].'</option>';
			foreach ($optval['options'] as $opt2 => $optval2)
			{
				$element.='<option value="'.$optval2['value'].'" style="padding-left:10px"';
				if($optval2['value']==$value)
					$element.='selected="selected"';
				$element.='>'.$optval2['title'].'</option>';
			}
		}
		else
		{
			$element.='<option value="'.$optval['value'].'" ';
			if($optval['value']==$value)
				$element.='selected="selected"';
			$element.='>'.$optval['title'].'</option>';			
		}
	}
	$element.='</select>';
	return $element;
}
/* generate element end */
/* * File Function Start * */
function uploadfile($newfile, $oldfile="",$filetype=array("gif","jpg","jpeg","png","bmp","pdf","doc","docx","ppt","pptx","xls","xlsx","txt","xml","swf"))
{	
	if($_FILES[$newfile]['tmp_name']!="")
	{
		$extantion = strtolower(substr($_FILES[$newfile]['name'], strrpos($_FILES[$newfile]['name'], '.') + 1));
		if(in_array($extantion,$filetype))
		{
			if($oldfile!="")
				@unlink(DIR_BASE.DIR_UPLOADS.$oldfile);
			$no = base_convert(rand(11111111,99999999),10,16);
			$name = str_replace(array('+',' ','-','&','!','?'),'_',$_FILES[$newfile]['name']);
			
			if(is_dir(DIR_BASE.DIR_UPLOADS.date('Y')))
			{
				if(!is_dir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m')))
				{
					mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
				}
			}
			else
			{
				mkdir(DIR_BASE.DIR_UPLOADS.date('Y'));
				mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
			}
			
			move_uploaded_file($_FILES[$newfile]['tmp_name'],DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m').'/'.$no.$name);
			return date('Y').'/'.date('m').'/'.$no.$name;
		}
		else
			return false;
	}
	else
		return $oldfile;	
}
function uploadfiles($newfile,$filetype=array("gif","jpg","jpeg","png","bmp","pdf","doc","docx","ppt","pptx","xls","xlsx","txt","xml","swf"))
{
	$n=0;
	unset($attachname);
	if($_FILES[$newfile]['tmp_name'][0])
	foreach($_FILES[$newfile]['tmp_name'] as $key=>$value)
	{
		if($_FILES[$newfile]['tmp_name'][$n]!="")
		{	
			$extantion = strtolower(substr($_FILES[$newfile]['name'][$n], strrpos($_FILES[$newfile]['name'][$n], '.') + 1));				
			if(in_array($extantion,$filetype))
			{		
				$no = base_convert(rand(11111111,99999999),10,16);
				$name = str_replace(array('+',' ','-','&','!','?'),'_',$_FILES[$newfile]['name'][$n]);
				if(is_dir(DIR_BASE.DIR_UPLOADS.date('Y')))
				{
					if(!is_dir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m')))
					{
						mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
					}
				}
				else
				{
					mkdir(DIR_BASE.DIR_UPLOADS.date('Y'));
					mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
				}
				move_uploaded_file($_FILES[$newfile]['tmp_name'][$n],DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m').'/'.$no.$name);
				$attachname[] = date('Y').'/'.date('m').'/'.$no.$name;
			}
		}
		$n++;
	}
	return $attachname;
}
function movetmpfiles($files)
{	
	if(is_array($files))
	{
		$attachname = array();
		foreach($files as $key=>$value)
		{									
			$no = base_convert(rand(11111111,99999999),10,16);
			$name = str_replace(array('+',' ','-','&','!','?'),'_',$value);
			if(is_dir(DIR_BASE.DIR_UPLOADS.date('Y')))
			{
				if(!is_dir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m')))
				{
					mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
				}
			}
			else
			{
				mkdir(DIR_BASE.DIR_UPLOADS.date('Y'));
				mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
			}
			if(file_exists(DIR_BASE.DIR_UPLOADS.'tmp/'.$value) && $value)
			{								
				if(copy(DIR_BASE.DIR_UPLOADS.'tmp/'.$value,DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m').'/'.$no.$name)) 
				{
					$attachname[] = date('Y').'/'.date('m').'/'.$no.$name;
					unlink(DIR_BASE.DIR_UPLOADS.'tmp/'.$value);
				}
			}
			
		}
		return $attachname;		
	}
	else
	{
		$no = base_convert(rand(11111111,99999999),10,16);
		$name = str_replace(array('+',' ','-','&','!','?'),'_',$files);
		if(is_dir(DIR_BASE.DIR_UPLOADS.date('Y')))
		{
			if(!is_dir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m')))
			{
				mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
			}
		}
		else
		{
			mkdir(DIR_BASE.DIR_UPLOADS.date('Y'));
			mkdir(DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m'));
		}		
		if(file_exists(DIR_BASE.DIR_UPLOADS.'tmp/'.$files) && $files)
		{			
			if(copy(DIR_BASE.DIR_UPLOADS.'tmp/'.$files,DIR_BASE.DIR_UPLOADS.date('Y').'/'.date('m').'/'.$no.$name)) 
			{	
				unlink(DIR_BASE.DIR_UPLOADS.'tmp/'.$files);			
				return date('Y').'/'.date('m').'/'.$no.$name;				
			}
		}
	}
}
function deletefile($file,$fullpath='')
{
	if($file!="")
	{
		if($fullpath)
			@unlink($file);
		else
			@unlink(DIR_BASE.DIR_UPLOADS.$file);
	}
	return;
}
function filesizeformat($file, $type)  
{  
	if(file_exists($file))
	{
		switch($type){  
			case "KB":  
					$filesize = filesize($file) * .0009765625; // bytes to KB  
			break;  
			case "MB":  
					$filesize = (filesize($file) * .0009765625) * .0009765625; // bytes to MB  
			break;  
			case "GB":  
					$filesize = ((filesize($file) * .0009765625) * .0009765625) * .0009765625; // bytes to GB  
			break;  
		}  
		if($filesize <= 0)
		{  
				return $filesize = 'unknown file size';
		}  
		else
		{
				return ' <strong>'.round($filesize, 2).'</strong> '.$type;
		}  
	}
}  
/* * File Function End * */

/* * Session Function Start * */
function session($sessionid="msg")
{
	$session = explode('|',$_SESSION[$sessionid]);
	if($session[0]!="")
	{
		$session[1] = ($session[1]) ? $session[1] : "alert-error";		
		$_SESSION[$sessionid]="";
		if($session[1]=='alert-success')
		{
			return '<div id="alert-success"
					 data-iziModal-title="'.$session[0].'"
					 data-iziModal-autoopen="false"
					 data-iziModal-headercolor="#2ecc71"
					 data-iziModal-width="600px"
					 data-iziModal-timeout="5000"					 					 
					 data-iziModal-timeoutProgressbar="true"
					 data-izimodal-top="0"
				></div><script>$(document).ready(function(){ $("#alert-success").iziModal(); $("#alert-success").iziModal("open"); })</script>';
		}
		else
		{
			return '<div id="alert-error"
				 data-iziModal-title="'.$session[0].'"
				 data-iziModal-autoopen="false"
				 data-iziModal-headercolor="#ec644b"
				 data-iziModal-width="600px"
				 data-iziModal-timeout="5000"
				 data-iziModal-timeoutProgressbar="true"
				 data-izimodal-top="0"
			></div><script>$(document).ready(function(){ $("#alert-error").iziModal(); $("#alert-error").iziModal("open"); })</script>';
		}
	}
}
function session2($sessionid="redmsg")
{
	$session = explode('|',$_SESSION[$sessionid]);
	if($session[0]!="")
	{
		$session[1] = ($session[1]) ? $session[1] : "redmsg";		
		$_SESSION[$sessionid]="";
		return '<div class="'.$session[1].'">'.$session[0].'</div>';
	}
}
/* * Session Function End * */

/* * Start Date Time Convert Functions * */
function strtodbtime($gettime,$hour24='')
{
	if($gettime=='' || $gettime=='00:00:00')
		return "";
	else
	{
		if(strpos($gettime,' pm'))
		{
			$temptime = str_replace(' pm','',$gettime);
			$temptime = explode(':',$temptime);
			$hour = ($temptime[0]!=12) ? (12 + $temptime[0]) : $temptime[0];
			$minute = $temptime[1];
			$retime = $hour.':'.$minute;
		}
		else
		{
			$temptime = str_replace(' am','',$gettime);
			$temptime = explode(':',$temptime);
			$hour = ($temptime[0]!=12) ? $temptime[0] : 00;
			$minute = $temptime[1];
			$retime = $hour.':'.$minute;
		}
		return $retime;
	}
}
function dbtimetostr($gettime,$hourfor='',$ret='')
{
	if(($gettime=='' || $gettime=='00:00:00') && $hourfor!=24)
	{
		$gettime = "12:00:00";
		$temptime = explode(':',$gettime);
		if($ret=='h')
		{
			$ampm = ($temptime[0]>=12) ? 'pm' : 'am';
			$temphour = ($temptime[0]==00) ? '12' : $temptime[0];
			$temphour = ($temphour>12) ? ($temphour - 12) : $temphour;
			$rettime = sprintf('%02u',$temphour);
		}
		elseif($ret=='m')
			$rettime = sprintf('%02u',$temptime[1]);
		elseif($ret=='s')
			$rettime = sprintf('%02u',$temptime[2]);
		elseif($ret=='hm')
			$rettime = sprintf('%02u',$temptime[0]).':'.sprintf('%02u',$temptime[1]);
		elseif($ret=='ms')
			$rettime = $temptime[1].':'.sprintf('%02u',$temptime[2]);
		elseif($ret=='ap')
			$rettime = 'am';
		else
			$rettime = sprintf('%02u',$temptime[0]).':'.sprintf('%02u',$temptime[1]).' am';
		return $rettime;
	}
	else
	{
		if($hourfor=='24')
		{
			$temptime = explode(':',$gettime);
			if($ret=='h')
				$rettime = sprintf('%02u',$temptime[0]);
			elseif($ret=='m')
				$rettime = sprintf('%02u',$temptime[1]);
			elseif($ret=='s')
				$rettime = sprintf('%02u',$temptime[2]);
			elseif($ret=='hm')
				$rettime = sprintf('%02u',$temptime[0]).':'.sprintf('%02u',$temptime[1]);
			elseif($ret=='ms')
				$rettime = $temptime[1].':'.sprintf('%02u',$temptime[2]);
			elseif($ret=='ap')
				$rettime = ($temptime[0]>=12) ? 'pm' : 'am';
			else
				$rettime = sprintf('%02u',$temptime[0]).':'.sprintf('%02u',$temptime[1]).':'.sprintf('%02u',$temptime[2]);
			return $rettime;
		}
		else if($hourfor=='12')
		{
			$temptime = explode(':',$gettime);
			if($ret=='h')
			{
				$ampm = ($temptime[0]>=12) ? 'pm' : 'am';
				$temphour = ($temptime[0]==00) ? '12' : $temptime[0];
				$temphour = ($temphour>12) ? ($temphour - 12) : $temphour;
				$rettime = sprintf('%02u',$temphour);
			}
			elseif($ret=='m')
				$rettime = sprintf('%02u',$temptime[1]);
			elseif($ret=='s')
				$rettime = sprintf('%02u',$temptime[2]);
			elseif($ret=='hm')
				$rettime = sprintf('%02u',$temptime[0]).':'.sprintf('%02u',$temptime[1]);
			elseif($ret=='ms')
				$rettime = $temptime[1].':'.sprintf('%02u',$temptime[2]);
			elseif($ret=='ap')
				$rettime = ($temptime[0]>=12) ? 'pm' : 'am';
			else
				$rettime = sprintf('%02u',$temptime[0]).':'.sprintf('%02u',$temptime[1]).':'.sprintf('%02u',$temptime[2]);
			return $rettime;
		}
		else
		{
			$temptime = explode(':',$gettime);
			$ampm = ($temptime[0]>=12) ? 'pm' : 'am';
			$temphour = ($temptime[0]==00) ? '12' : $temptime[0];
			$temphour = ($temphour>12) ? ($temphour - 12) : $temphour;
			$rettime = sprintf('%02u',$temphour).':'.sprintf('%02u',$temptime[1]).' '.$ampm;
			return $rettime;
		}
	}
}
function strtodbdate($getdate)
{
	if($getdate=='0000-00-00' || $getdate=='')
		return "";
	else
	{
		$temp = explode('-',$getdate);
		$redate = $temp[2].'-'.$temp[1].'-'.$temp[0];
		return date('Y-m-d',strtotime($redate));
	}
}
function dbdatetostr($getdate,$retfiel='d-M-Y')
{
	if($getdate=='0000-00-00')
		return "";
	if($getdate!='')
	{
		$temp = explode('-',$getdate);		
		$redate = $temp[2].'-'.$temp[1].'-'.$temp[0];
		if($retfiel=='d')
			return $temp[2];
		else if ($retfiel=='m')
			return $temp[1];
		else if ($retfiel=='y')
			return $temp[0];
		else
			return date($retfiel,strtotime($redate));
	}
	else
		return $getdate;
}
function dbdatetimetostr($getdate)
{
	$temp = explode(" ",$getdate);
	$date = dbdatetostr($temp[0]);
	$time = dbtimetostr($temp[1]);
	return $date." @ ".$time;
}
function strtodbdatetime($getdate)
{
	$temp = explode(" @ ",$getdate);
	$date = strtodbdate($temp[0]);
	$time = strtodbtime($temp[1]);
	return $date." ".$time;
}
function getdateformat($tempdate)
{
	return date('d-M-Y',strtotime($tempdate));
}
function getdatebetween($first, $last, $step = '+1 day', $format = 'Y-m-d') 
{ 
  $dates = array();
  $current = strtotime($first);
  $last = strtotime($last);
  while( $current <= $last ) 
	{ 
		$dates[] = date($format, $current);
    $current = strtotime($step, $current);
  }
  return $dates;
}
function plustime($timearr)
{
	if(is_array($timearr))
	{
		$temp = '';
		foreach($timearr as $k => $v)
		{
			list($hours, $mins, $secs) = explode(':', $timearr[$k]);
			$temp += ($hours * 3600 ) + ($mins * 60 ) + $secs;
		}
		$fhours = floor($temp / 3600);
		$fmins = floor(($temp - ($fhours*3600)) / 60);
		$fsec = floor(($temp - ($fhours*3600) - ($fmins*60)) / 60);
		return sprintf('%02u',$fhours).':'.sprintf('%02u',$fmins).':'.sprintf('%02u',$fsec);
	}
}
function differncetime($timein,$timeout)
{
	if($timein>$timeout)
	{
		return '00:00:00';
	}
	else
	{
		$temp = $tempin = $tempout = "";
		if(is_array($timein))
		{
			foreach($timein as $k => $v)
			{
				if($timein[$k] && $timeout[$k])
				list($hoursin, $minsin, $secsin) = explode(':', $timein[$k]);
				$tempin[$k] = ($hoursin * 3600 ) + ($minsin * 60 ) + $secsin;
				list($hoursout, $minsout, $secsout) = explode(':', $timeout[$k]);
				$tempin[$k] = ($hoursout * 3600 ) + ($minsout * 60 ) + $secsout;
				$temp[$k] = $tempout[$k] - $tempin[$k];	
				$fhours = floor($temp[$k] / 3600);
				$fmins = floor(($temp[$k] - ($fhours*3600)) / 60);
				$fsec = floor(($temp[$k] - ($fhours*3600) - ($fmins*60)) / 60);		
				$ftime[$k] = $fhours.':'.sprintf('%02u',$fmins).':'.sprintf('%02u',$fsec);
			}
			return date('H:i:s',$ftime);
		}
		else
		{
			list($hoursin, $minsin, $secsin) = explode(':', $timein);
			$tempin = ($hoursin * 3600 ) + ($minsin * 60 ) + $secsin;
			list($hoursout, $minsout, $secsout) = explode(':', $timeout);
			$tempout = ($hoursout * 3600 ) + ($minsout * 60 ) + $secsout;
			$temp = $tempout - $tempin;
			$fhours = floor($temp / 3600);
			$fmins = floor(($temp - ($fhours*3600)) / 60);
			$fsec = floor(($temp - ($fhours*3600) - ($fmins*60)) / 60);
			return sprintf('%02u',$fhours).':'.sprintf('%02u',$fmins).':'.sprintf('%02u',$fsec);
		}
	}
}
/* * End Date Time Convert Functions * */

function checkAccess($links)
{	
	$flag = 0;
	if(is_array($links))
	{
		foreach($links as $k => $v)
		if(strpos($_SERVER['PHP_SELF'], "/".$v)!==false || $_SERVER['PHP_SELF']=="/".$v)
		{
			$flag = 1;
			break;
		}		
	}
	else
	{
		if(strpos($_SERVER['PHP_SELF'], "/".$links)!==false || $_SERVER['PHP_SELF']=="/".$links)
			$flag = 1;
	}
	if($flag==1)
			return true;
	else
			return false;
}
/* * SEO Functions Start * */
function activelink($links,$class,$echo=0)
{	
	$flag = 0;
	if(is_array($links))
	{
		foreach($links as $k => $v)
		if(strpos($_SERVER['PHP_SELF'], "/".$v)!==false || $_SERVER['PHP_SELF']=="/".$v)
		{
			$flag = 1;
			break;
		}		
	}
	else
	{
		if(strpos($_SERVER['PHP_SELF'], "/".$links)!==false || $_SERVER['PHP_SELF']=="/".$links)
			$flag = 1;
	}
	if($flag==1 && $echo==0)
			return $class;
	else if($flag==1 && $echo==1)
			echo $class;
	else
			return false;
}
function genrateURL($temp,$default="")
{
	$match = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=');
	$replace = array('-','-','','','','','','','','','','','','','','','','','','','','','','','','');
	if($temp)
		return strtolower(str_replace($match,$replace,str_replace($match,$replace,$temp)));
	else
		return strtolower(str_replace($match,$replace,str_replace($match,$replace,$default)));
}
function getcmspageseourl($id,$table,$echo="")
{
	$returl = "";
	$temp = fetchqry("*",$table,array("id="=>$id));
	if($temp['parid']!=0)
	{
		$returl = getfieldvalue("url",$table,$temp['parid']).'/';
	}
	$returl .= $temp['url'];
	if($echo)
		echo $returl;
	else
		return $returl;
}
function myUrlEncode($string) {
    return urlencode($string);
}
function myUrlDencode($string) {
    
    return urldecode($string);
}
function replaceSamefilter($url,$ffield,$fvalue)
{
	$urlarr = explode('/',$url);
	if(in_array($ffield,$urlarr))
	{
		if($fvalue=="all")
		{
			$temp = array_search($ffield,$urlarr)+1;		
			unset($urlarr[$temp-1],$urlarr[$temp]);
			$urlarr = array_values($urlarr);
		}
		else
		{
			$temp = array_search($ffield,$urlarr)+1;		
			for($i=0;$i<=sizeof($urlarr);$i++)
			{
				if($temp==$i && $fvalue)
					$urlarr[$i] = $fvalue;
			}				
		}
		return implode('/',$urlarr);
	}
	else
	{
		if($fvalue=="all")		
			return $url;
		else
			return $url.'/'.$ffield.'/'.$fvalue;
	}
}
function addSamefilter($url,$ffield,$fvalue)
{
	$urlarr = explode('/',$url);
	if(in_array($ffield,$urlarr))
	{
		if($fvalue=="all")
		{
			$temp = array_search($ffield,$urlarr)+1;		
			unset($urlarr[$temp-1],$urlarr[$temp]);
			$urlarr = array_values($urlarr);
		}
		else
		{
			$temp = array_search($ffield,$urlarr)+1;		
			for($i=0;$i<=sizeof($urlarr);$i++)
			{
				if($temp==$i && $fvalue)
				{					
					if(strpos($urlarr[$i],$fvalue)===false)
					{
						$urlarr[$i] = $urlarr[$i].'::'.$fvalue;					
					}
					else
					{
						$tempReplace = $urlarr[$i];
						$tempReplace = str_replace(array('::'.$fvalue,$fvalue),'',$tempReplace);
						if(strlen($tempReplace)>0)
						{
							$urlarr[$i] = trim($tempReplace,'::');
						}
						else
						{
							unset($urlarr[$temp-1],$urlarr[$temp]);	
						}
					}
				}
			}				
		}
		return implode('/',$urlarr);
	}
	else
	{
		if($fvalue=="all")		
			return $url;
		else
			return $url.'/'.$ffield.'/'.$fvalue;
	}
}
function removefilters($url,$ffield)
{
	$urlarr = explode('/',$url);
	if(is_array($ffield))
	{
		foreach($ffield as $val)
		{
			if(in_array($val,$urlarr))
			{
				$temp = array_search($val,$urlarr)+1;		
				unset($urlarr[$temp-1],$urlarr[$temp]);
				$urlarr = array_values($urlarr);						
			}
		}
	}
	else
	{
		if(in_array($ffield,$urlarr))
		{
			$temp = array_search($ffield,$urlarr)+1;		
			unset($urlarr[$temp-1],$urlarr[$temp]);
			$urlarr = array_values($urlarr);					
		}
	}
	return implode('/',$urlarr);
}
/* * SEO Functions End * */

/* * Others Function Start * */
function generatepassword($length=10)
{
	$consonants = 'qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM';
	$password = '';
	for ($i = 0; $i < $length; $i++)
		$password .= $consonants[(rand() % strlen($consonants))];
	return $password;
}
function replacequoteb($string)
{
	$string= str_replace( "'", "&#39;",$string);
	return $string;
}
function replacequotes($string)
{
	$string= str_replace( "'", "&#39;",$string);
	$string= str_replace('"', "&#34;",$string);
	$string= str_replace('’', "&#34;",$string);
	$string= str_replace('‘', "&#34;",$string);
	return $string;
}
function encode($str)
{
  for($i=0; $i<5;$i++)
  {
    $str=strrev(base64_encode($str));
  }
  return $str;
}
function decode($str)
{
  for($i=0; $i<5;$i++)
  {
    $str=base64_decode(strrev($str));
  }
  return $str;
}
function contentlimit($tempstr,$templimit,$terminate="....",$terminateactive=false)
{
	if(strlen(strip_tags($tempstr))<$templimit)
	{
		if($terminateactive)
			$returnstr = strip_tags($tempstr).$terminate;
		else
			$returnstr = strip_tags($tempstr);
	}
	else
	{
		if(substr(strip_tags($tempstr), 0, strpos(strip_tags($tempstr), " ", $templimit)))		
			$returnstr = substr(strip_tags($tempstr), 0, strpos(strip_tags($tempstr), " ", $templimit)).$terminate;
		else
			$returnstr = substr(strip_tags($tempstr), 0, $templimit).$terminate;
	}
	return $returnstr;
}
function br2nl($string)
{
	return str_replace("<br />","",$string); 
}
/* * Get Number Format * */
function numberformat($temp,$dec=2)
{
	return number_format($temp,$dec);
}
/* * Check Blank Discription field * */
function checkfieldblank($tempcon)
{
	$tempcon = strip_tags($tempcon);
	$tempcon = str_replace(" ","",$tempcon);
	$return = ($tempcon) ? true : false;
	return $return;
}
/* * Replace Qoma * */
function replaceQoma($tempstr)
{
	return str_replace(',','',$tempstr);
}
/* * Get Location * */
function getLocations($id,$table,$type="")
{
	$province = fetchqry('*',$table,array("id="=>$id));
	$country = fetchqry('*',$table,array("id="=>$province['parid']));
	if($type==1)
	{
		$temparr = array("province"=>$province['name'],"country"=>$country['name']);
		return $temparr;
	}
	else if($type==2)
	{
		$temparr = array("province"=>$province['sname'],"country"=>$country['sname']);
		return $temparr;
	}	
	else
	{
		$temparr = array("province"=>$province['id'],"country"=>$country['id']);
		return $temparr;
	}	
}
/* * Get Youtube Video from URL * */
function getYoutubeVideo($url,$width="640",$height="360",$echo="")
{
	$temp = explode('/',$url);
	$temp = $temp[sizeof($temp)-1];
	if($echo)
		echo '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$temp.'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
	else
		return '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$temp.'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
}
function getYoutubeVideoCode($url,$echo="")
{
	$temp = explode('/',$url);
	$temp = $temp[sizeof($temp)-1];
	if($echo)
		echo $temp;
	else
		return $temp;
}
function websiteURL($website)
{
	if(checkfieldblank($website))
	{
		if(substr($website,strlen($website)-1,strlen($website))=='/')
			$website = substr($website,0,strlen($website)-1);
			
		if(substr($website,0,7)=="http://")
			$website = substr($website,7,strlen($website));
		if(substr($website,0,8)=="https://")
			$website = substr($website,8,strlen($website));
		if(substr($website,0,3)!="www" && substr($website,0,4)!="www.")
			$website = "www.".$website;
	}	
	return $website;
}
function displayEmail($email,$class="",$linktext="")
{
	$return = '<a href="mailto:'.$email.'" class="'.$class.'" ';
	if($linktext)
		$return .= ' title="'.$linktext.'">'.$linktext;
	else
		$return .= ' title="'.$email.'">'.$email;
	$return .= '</a>';
	return $return;
}
/* * Others Function End * */

/* * Get Browser Start * */
function getBrowser($return='')
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
	 	if($return=='u_agent')
		{
			return $u_agent;
		}
		else if($return=='name')
		{
			return $bname;
		}
		else if($return=='version')
		{
			return $version;
		}
		else if($return=='platform')
		{
			return $platform;
		}
		else if($return=='pattern')
		{
			return $pattern;
		}
		else
		{
			return array(
					'userAgent' => $u_agent,
					'name'      => $bname,
					'version'   => $version,
					'platform'  => $platform,
					'pattern'    => $pattern
			);
		}
}
/* * Get Browser End * */
function printAddress($address)
{
	extract(getLocations($address['locations_id'],TB_LOCATIONS,1));
	
	$return = '';
	if($address['address1'])
		$return .= $address['address1'].',<br />';
	if($address['address2'])
		$return .= $address['address2'].',<br />';
	if($address['city'] && $province)
		$return .= $address['city'].' '.$province.',<br />';
	else if($address['city'])
		$return .= $address['city'].',<br />';
	else if($province)
		$return .= $province.',<br />';
	if($country && $address['postalcode'])
		$return .= $country.' '.$address['postalcode'];
	else if($address['postalcode'])
		$return .= $address['postalcode'];
	else if($country)
		$return .= $country;
	return $return;
}
function getHashvalue()
{
	return md5(rand(11111,99999).date('Y-m-d h:i:s'));
}

/*******************************************************************************************************************************************/
/************************************************** API Validation functoins   **********************************************************/
/*******************************************************************************************************************************************/

/**
 * @isEmpty = function to check email is validate or not
 * @value = value to be email  
 * @return = true if email address is valid, false otherwise
 */
function isEmail($email) {  
        if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            return TRUE;
        } else {
            return FALSE;
        }
}
/**
 * @isEmpty = function to check if variable is empty or not
 * @value = value to be checked * 
 * @return = true if value is empty, false otherwise
 */
function isEmpty($value) {
    if (is_array($value)) {
        if (sizeof($value) > 0) {
            return false;
        } else {
            return true;
        }
    } else {
        if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0) && !empty($value)) {
            return false;
        } else {
            return true;
        }
    }
}

/**
 * @isCompanyIdValid = function to company id is valid or not
 * @value = value to be company_id *
 * @return = TRUE if company found ELSE FALSE
 */
function isCompanyIdValid($value) {
    if ( !isEmpty($value) ) {
            $result = fetchqry('`company`.`id`', TB_COMPANY, array('id=' => $value, 'status=' => "active" ) );
            if($result['id'] != ""){
                return TRUE;
            }else{
                return FALSE;
            }
    }else{
        return FALSE;
    }
}

/**
 * @isUserIdValid = function to user id is valid or not
 * @value = value to be user_id *
 * @return = Returns company_id if company found ELSE false
 */
function isUserIdValid($value) {
    if ( !isEmpty($value) ) {
            $result = fetchqry(' `user`.`company_id` ', TB_USER, array( 'id=' => $value, 'status=' => "active" ) );
            if($result['company_id'] != ""){
                return $result['company_id'];
            }else{
                return FALSE;
            }
    }else{
        return FALSE;
    }
}

/**
 * @getLatitudeAndLogitudeFromAddress = function For get Latitude and Longitude from address
 * @value = value to address(string)
 * @return = Returns Latitude and Longitude
 */
// function to get  the address
function getLatitudeAndLogitudeFromAddress($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    
    return $lat.','.$long;
}
?>