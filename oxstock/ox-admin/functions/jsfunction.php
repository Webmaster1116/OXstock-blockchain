<script type="text/javascript">
function clickclear(thisfield, defaulttext) {  if (thisfield.value == defaulttext) { thisfield.value = ""; }  } 
function clickrecall(thisfield, defaulttext) { if (thisfield.value == "") { thisfield.value = defaulttext;  } }
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
/* Validation Tips */
function ToolTips(id,strid)
{
	var str = document.getElementById(strid).innerHTML;
	$('#'+id).mjstip({
			content: str,
			showOn: 'none',		
			alignTo: 'target',
			alignX: 'inner-left',
			className: 'tip-grey',
			offsetX: 0,
			offsetY: 10
	});
	$('#'+id).mjstip('show'); 
}
function UnToolTips(id){ $('#'+id).mjstip('hide');  }
/* Validation Tips */
<!-- Start functions for compulsory check -->
var p_revid;
function validationTips(id,str,seconds)
{	
	if(seconds==null || seconds=='')
	{ seconds = 3000; }
	else
	{	seconds = seconds * 1000; }
	
	if(p_revid!='' && p_revid!=null)
	{	
		return;
		$('#'+id).mjstip('hide');	
	}
	$('#'+id).mjstip({
			content: str,
			showOn: 'none',
			alignTo: 'target',
			alignX: 'inner-left',
			className: 'tip-red',
			offsetX: 0,
			offsetY: 5
	});	   			
	$('#'+id).mjstip('show'); 
	document.getElementById(id).focus();
	setTimeout("$('#"+id+"').mjstip('hide'); p_revid='';",seconds);
	p_revid=id;             		
} 
function check(which,type)
{
	for (x in which)
	{	
		var temparr = x.split("#");
		var temparr2 = temparr[0].split(":");
		var defaultvalue = temparr[1];
		var fieltype = temparr2[0];
		var fieldid = temparr2[1];
		var focusfieldid = temparr2[2];
		if(document.getElementById(fieldid)!= null)
		{
			var fieldvalue = document.getElementById(fieldid).value;
			if(!focusfieldid || focusfieldid==null){ focusfieldid = fieldid;  }	
			fieldvalue = fieldvalue.trim();		
		}
		if(fieltype=="t")
		{
			if(fieldvalue=="" || fieldvalue==defaultvalue)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Enter "+which[x]);
				}
				else
				{
					alert("Please Enter "+which[x]);				
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="tm")
		{
			var temp = fieldid.split("|");
			var flag = false;
			for (var j = 0;j<temp.length;j++)
			{			
				fieldvalue = document.getElementById(temp[j]).value;
				if(fieldvalue!='' && fieldvalue!=defaultvalue)
				{
					flag = true;
					break;
				}
			}
			if(flag == false)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Enter "+which[x]);
				}
				else
				{
					alert("Please Enter "+which[x]);				
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="s")
		{
			if(fieldvalue=="" || fieldvalue==defaultvalue)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Select "+which[x]);
				}
				else
				{
					alert("Please Select "+which[x]);
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="sm")
		{
			var temp = fieldid.split("|");
			var flag = false;
			for (var j = 0;j<temp.length;j++)
			{			
				fieldvalue = document.getElementById(temp[j]).value;
				if(fieldvalue!='' && fieldvalue!=defaultvalue)
				{
					flag = true;
					break;
				}
			}
			if(flag == false)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Select "+which[x]);
				}
				else
				{
					alert("Please Enter "+which[x]);				
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="e")
		{
			if(fieldvalue=="" || fieldvalue==defaultvalue)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Enter "+which[x]);
				}
				else
				{
					alert("Please Enter "+which[x]);
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
			else 
			{
				var pass=fieldvalue.indexOf('@',0);
				var pass1=fieldvalue.indexOf('.',pass);
				if((pass==-1) || (pass1==-1))
				{
					if(type)
					{
						validationTips(focusfieldid,"Please Enter E-Mail in Proper Format.");
					}
					else
					{
						alert ("Please Enter E-Mail in Proper Format.");
					}
					document.getElementById(focusfieldid).focus();
					return false;
				}
				if(pass+1==pass1)
				{
					if(type)
					{
						validationTips(focusfieldid,"Please Enter E-Mail in Proper Format.");
					}
					else
					{
						alert ("Please Enter E-Mail in Proper Format.");
					}
					document.getElementById(focusfieldid).focus();
					return false;
				}
			}
		}
		if(fieltype=="p")
		{
			if(fieldvalue=="" || fieldvalue==defaultvalue)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Enter "+which[x]);
				}
				else
				{
					alert("Please Enter "+which[x]);
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
			else
			{
				if(document.getElementById(focusfieldid).value.length<6)
				{
					if(type)
					{
						validationTips(focusfieldid,"Password must be greater then 6 charecters.");
					}
					else
					{
						alert("Password must be greater then 6 charecters.");
					}
					document.getElementById(focusfieldid).focus();
					return false;
				}
			}
		}
		if(fieltype=="c")
		{			
			if(document.getElementById(fieldid.substr(0, parseInt(fieldid.indexOf('|')))).value!=document.getElementById(fieldid.substr(parseInt(fieldid.indexOf('|'))+1)).value)
			{	
				if(type)
				{
					validationTips(focusfieldid,fieldid.substr(0, fieldid.indexOf('|'))+" & "+fieldid.substr(parseInt(fieldid.indexOf('|'))+1)+" must be same.");
				}
				else
				{
					alert(fieldid.substr(0, fieldid.indexOf('|'))+" & "+fieldid.substr(parseInt(fieldid.indexOf('|'))+1)+" must be same.");
				}		
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="d")
		{
			if(fieldvalue==0 || fieldvalue==defaultvalue)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Enter "+which[x]);
				}
				else
				{
					alert("Please Enter "+which[x]);
				}
				document.getElementById(focusfieldid).select();
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="f")
		{
			if(fieldvalue=="" && document.getElementById('h'+fieldid).value=="")
			{
				if(type)
				{
					validationTips(focusfieldid,"Please Choose "+which[x]);
				}
				else
				{
					alert("Please Choose "+which[x]);
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}
		}
		if(fieltype=="ch")
		{
			var temp = document.getElementsByName(fieldid);
			var flag = false;
			for (var j = 0;j<temp.length;j++)
			{
				if(temp[j].checked)
				{
					flag = true;
					break;
				}
			}
			if(flag == false)
			{
				if(type)
				{
					validationTips(focusfieldid,"Please select "+which[x]);
				}
				else
				{
					alert("Please select "+which[x]);
				}
				document.getElementById(focusfieldid).focus();
				return false;
			}			
		}
	}	
	startloader();
	return true
}
<!-- End functions for compulsory check -->
<!-- Start Check File Extention -->
function checkExtantion(file,types) 
{
	file = document.getElementById(file).value;
	if(file)
	{
		var extarr = file.split('.');
		var ext = extarr[extarr.length-1]
		var typesarr = types.split(',');
		var flag = 0;
		for(var i=0;i<=typesarr.length-1;i++)
		{
			if(typesarr[i]==ext)
			{
				flag = 1;
			}	
		}
		if(flag!=1)
		{
			alert("Please Choose only "+types+" extantion files.");
			return false;
		}
		else
			return true;
	}
	else
			return true;
}
<!-- End Check File Extention -->
<!-- Start Fetch Page Via Ajax -->
function GetXmlHttpObject()
{
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
		objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
}
function getajaxdata(url, returnid, typeele, buttondisable)
{
	var xmlHttp;
	
	/* * For Start Display Loading Image on ajax start * */
	startloader();
	
	/* * For Hide Save Buttons on ajax start * */
	if(buttondisable)
	{
		if(document.getElementById("submitbutton")!= null)
			document.getElementById("submitbutton").style.display = "none";
		if(document.getElementById("submitbuttonb")!= null)
			document.getElementById("submitbuttonb").style.display = "none";
	}
	
	returnid=returnid.split("::");
	typeele=typeele.split("::");
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert("Browser does not support HTTP Request")
		return
	}
	for(var i=0; i<returnid.length; i++)
	{
		if(typeele[i]==1)
			document.getElementById(returnid[i]).innerHTML='<img src="<?php echo URL_BASEADMIN.DIR_IMAGES; ?>loading.gif" maxheight="24px" />';
	}
	xmlHttp.open("GET",url,true)
	xmlHttp.onreadystatechange = function () 
	{
		if (xmlHttp.readyState == 4)
		{
			var returnval=xmlHttp.responseText.split("|");
			for(var i=0; i<returnid.length; i++)
			{
				if(typeele[i]==1)
					document.getElementById(returnid[i]).innerHTML=returnval[i];
				else if(typeele[i]==2)
					document.getElementById(returnid[i]).value=returnval[i];
				else if(typeele[i]==3)
				{
					document.getElementById(returnid[i]).innerHTML=returnval[i];
					eval("set"+returnid[i]+"()");
				}
				else if(typeele[i]==4)
				{
					document.getElementById(returnid[i]).value=returnval[i];
					eval("set"+returnid[i]+"()");
				}
				else if(typeele[i]==5)
				{					
					eval(returnid[i]);
				}
			}
			/* * For Stop Display Loading Image on ajax stop * */
			stoploader();
			
			/* * For Show Save Buttons on ajax stop * */
			if(document.getElementById("submitbutton")!= null)
				document.getElementById("submitbutton").style.display = "";
			if(document.getElementById("submitbuttonb")!= null)
				document.getElementById("submitbuttonb").style.display = "";
			
		}
	}
	xmlHttp.send(null);
}
<!-- End Fetch Page Via Ajax -->
<!-- Start Generate Password Code -->
function generatepassword(nos,id)
{
	chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#$!~@%-=";
	pass = "";
	for(x=0;x<nos;x++)
	{
		i = Math.floor(Math.random() * 70);
		pass += chars.charAt(i);
	}
	document.getElementById(id).value = pass;
}
<!-- End Generate Password Code -->
<!-- Start code of displaying list group wise with plus / minus sign -->
function showhiderows(which)
{
	var sign=document.getElementById(which+"sign").innerHTML.indexOf('minus');
	if(sign!=-1)
		document.getElementById(which+"sign").innerHTML=document.getElementById(which+"sign").innerHTML.replace('minus', 'plus');
	else
		document.getElementById(which+"sign").innerHTML=document.getElementById(which+"sign").innerHTML.replace('plus', 'minus');
	var i=1;
	while(1)
	{
		if(document.getElementById(which+''+i))
		{
			if(sign!=-1)
				$('#'+which+''+i).hide();
			else
				$('#'+which+''+i).show();
			//	document.getElementById(which+''+i).style.display='table-row';
		}
		
		else
			break;
		i++;
	}
}
<!-- End code of displaying list group wise with plus / minus sign -->
<!-- Start code of displaying list group wise with Up / Down sign -->
function expandRow(which)
{
	var sign=document.getElementById(which+"sign").innerHTML.indexOf('downarrow');
	if(sign!=-1)
	{
		document.getElementById(which+"sign").innerHTML=document.getElementById(which+"sign").innerHTML.replace('downarrow', 'uparrow');
		document.getElementById(which+"hrow").style.display='table-row';		
	}
	else
	{
		document.getElementById(which+"sign").innerHTML=document.getElementById(which+"sign").innerHTML.replace('uparrow', 'downarrow');
		document.getElementById(which+"hrow").style.display='none';
	}
}
<!-- End code of displaying list group wise with Up / Down sign -->
<!-- Start to My Alert Style -->
function myalert(title, icon, which)
{
	$("#my-alert").html('<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES; ?>'+icon+'" /></td><td>'+which+'</td></tr></table>');	
	$("#my-alert").dialog({	
		resizable: false,
		modal: true,
		title : title,
		buttons: {			
			"Ok": function() {
				$( this ).dialog( "close" );
			}
		}
	});	
}
<!-- End to My Alert Style -->
<!-- Start to check before delete the record -->
function deletesure(recordid, tabnm, which ,field)
{	
	if(which=="")
	{
		field = (field) ? field : "did=";
		$("#my-alert").html('<div id="delete-sure-modal" class="ks-izi-modal" data-iziModal-history="false" data-iziModal-title="Delete" data-iziModal-icon="la la-question" data-iziModal-padding="20" data-iziModal-autoopen="false" data-iziModal-headercolor="#ec644b">Are you sure you want to delete this record ?<br /><br /><button id="delete-sure-yes" class="btn btn-danger btn-sm">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="delete-sure-no" class="btn btn-primary btn-sm">No</button></div>');		
		$("#delete-sure-modal").iziModal(); 
		$("#delete-sure-modal").iziModal("open");
		$(document).on('click',"#delete-sure-yes",function(e){
			var cururl = window.location.href;
			var returl = window.location.href;
			if(cururl.indexOf("?")!=-1)
			{
				if(cururl.indexOf("?"+field)==-1 && cururl.indexOf("&"+field)==-1)
					returl = cururl+"&"+field+recordid+"&tabnm="+tabnm
				else
				{
					if(cururl.indexOf("?"+field)!=-1 && cururl.indexOf("&"+field)==-1)
					{
						var firstsubstr = cururl.substr(0,parseInt(cururl.indexOf("?"+field))+5);
						var secondsubstr = cururl.substr(parseInt(cururl.indexOf("?"+field))+5);
					}
					else
					{
						var firstsubstr = cururl.substr(0,parseInt(cururl.indexOf("&"+field))+5);
						var secondsubstr = cururl.substr(parseInt(cururl.indexOf("&"+field))+5);								
					}
					if(secondsubstr.indexOf("&")!=-1)
					{
						var secondsubstr = secondsubstr.substr(parseInt(secondsubstr.indexOf("&")));
						returl = firstsubstr+recordid+secondsubstr;
					}
					else
					{
						returl = firstsubstr+recordid;
					}
				}
			}
			else
			{
				returl = cururl+"?"+field+recordid+"&tabnm="+tabnm;
			}
			
			window.location.href = returl;
			$("#delete-sure-modal").iziModal("close");
		});
		$("#delete-sure-no").click(function(e){
			$("#delete-sure-modal").iziModal("close");
		});			
	}
	else
	{			
		$("#my-alert").html('<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES.'alert-ext.png'; ?>" /></td><td>'+which+'</td></tr></table>');
		$("#my-alert").html('<div id="delete-sure-modal" class="ks-izi-modal" data-iziModal-fullscreen="true" data-iziModal-title="Delete" data-iziModal-icon="la la-exclamation-triangle" data-iziModal-padding="20" data-iziModal-autoopen="false" data-iziModal-headercolor="#ec644b">'+which+'<br /><br /><button id="delete-sure-ok" class="btn btn-danger btn-sm">Ok</button>/div>');	
		$("#delete-sure-ok").click(function(e){
			$("#delete-sure-modal").iziModal("close");
		});
	}		
	return false
}
<!-- End to check before delete the record -->
<!-- Start to check before Move to Trash the record -->
function trashsure(recordid, tabnm, which)
{
	if(!which)
	{
		var field = (field) ? field : "tid=";
		$("#my-alert").html('<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES.'alert-que.png'; ?>" /></td><td>Are you sure you want to move record in trash ?</td></tr></table>');	
		$("#my-alert").dialog({
			resizable: false,
			modal: true,
			title: 'Move to trash',
			buttons: {
				"Yes": function() {
					var cururl = window.location.href;
					var returl = window.location.href;
					if(cururl.indexOf("?")!=-1)
					{
						if(cururl.indexOf("?"+field)==-1 && cururl.indexOf("&"+field)==-1)
							returl = cururl+"&"+field+recordid+"&tabnm="+tabnm
						else
						{
							if(cururl.indexOf("?"+field)!=-1 && cururl.indexOf("&"+field)==-1)
							{
								var firstsubstr = cururl.substr(0,parseInt(cururl.indexOf("?"+field))+5);
								var secondsubstr = cururl.substr(parseInt(cururl.indexOf("?"+field))+5);
							}
							else
							{
								var firstsubstr = cururl.substr(0,parseInt(cururl.indexOf("&"+field))+5);
								var secondsubstr = cururl.substr(parseInt(cururl.indexOf("&"+field))+5);								
							}
							if(secondsubstr.indexOf("&")!=-1)
							{
								var secondsubstr = secondsubstr.substr(parseInt(secondsubstr.indexOf("&")));
								returl = firstsubstr+recordid+secondsubstr;
							}
							else
							{
								returl = firstsubstr+recordid;
							}
						}
					}
					else
					{
						returl = cururl+"?"+field+recordid+"&tabnm="+tabnm;
					}
					
					window.location.href = returl;
					$( this ).dialog( "close" );
					stoploader();
				},
				"No": function() {
					$( this ).dialog( "close" );
				}
			}
		});			
	}
	else
	{
		$("#my-alert").html('<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES.'alert-ext.png'; ?>" /></td><td>'+which+'</td></tr></table>');	
		$("#my-alert").dialog({
			resizable: false,
			modal: true,
			title: 'Move to trash',
			buttons: {
				"Ok": function() {
					$( this ).dialog( "close" );
				}
			}
		});	
	}
	return false
}
<!-- End to check before Move to Trash the record -->
<!-- Start to check before Move from Trash the record -->
function restoresure(recordid, tabnm, which)
{
	if(!which)
	{
		var field = (field) ? field : "rid=";
		$("#my-alert").html('<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES.'alert-que.png'; ?>" /></td><td>Are you sure you want to restore this record ?</td></tr></table>');			
		$("#my-alert").dialog({
			resizable: false,
			modal: true,
			title: 'Restore',
			buttons: {
				"Yes": function() {
					var cururl = window.location.href;
					var returl = window.location.href;
					if(cururl.indexOf("?")!=-1)
					{
						if(cururl.indexOf("?"+field)==-1 && cururl.indexOf("&"+field)==-1)
							returl = cururl+"&"+field+recordid+"&tabnm="+tabnm
						else
						{
							if(cururl.indexOf("?"+field)!=-1 && cururl.indexOf("&"+field)==-1)
							{
								var firstsubstr = cururl.substr(0,parseInt(cururl.indexOf("?"+field))+5);
								var secondsubstr = cururl.substr(parseInt(cururl.indexOf("?"+field))+5);
							}
							else
							{
								var firstsubstr = cururl.substr(0,parseInt(cururl.indexOf("&"+field))+5);
								var secondsubstr = cururl.substr(parseInt(cururl.indexOf("&"+field))+5);								
							}
							if(secondsubstr.indexOf("&")!=-1)
							{
								var secondsubstr = secondsubstr.substr(parseInt(secondsubstr.indexOf("&")));
								returl = firstsubstr+recordid+secondsubstr;
							}
							else
							{
								returl = firstsubstr+recordid;
							}
						}
					}
					else
					{
						returl = cururl+"?"+field+recordid+"&tabnm="+tabnm;
					}					
					window.location.href = returl;
					$( this ).dialog( "close" );
					stoploader();
				},
				"No": function() {
					$( this ).dialog( "close" );
				}
			}
		});			
	}
	else
	{
		document.getElementById('my-alert').innerHTML = '<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES.'alert-ext.png'; ?>" /></td><td>'+which+'</td></tr></table>';		
		$("#my-alert").html('<table border="0"><tr><td><img src="<?php echo URL_BASEADMIN.DIR_IMAGES.'alert-ext.png'; ?>" /></td><td>'+which+'</td></tr></table>');			
		$("#my-alert").dialog({
			resizable: false,
			modal: true,
			title: 'Restore',
			buttons: {
				"Ok": function() {
					$( this ).dialog( "close" );
				}
			}
		});	
	}
	return false
}
<!-- End to check before Move from Trash the record -->
<!-- Start Ordring Record as required -->
function changeorder(recordid)
{
	if(window.location.href.indexOf("?")!=-1)
	{
		if(window.location.href.indexOf("?oby=")==-1 && window.location.href.indexOf("&oby=")==-1)
			window.location.href=window.location.href+"&oby="+recordid
		else
		{
			if(window.location.href.indexOf("?oby=")!=-1 && window.location.href.indexOf("&oby=")==-1)
				var subst=window.location.href.substr(parseInt(window.location.href.indexOf("?oby="))+1)
			else
				var subst=window.location.href.substr(parseInt(window.location.href.indexOf("&oby="))+1)
			if(subst.indexOf("&")!=-1)
				subst=subst.substr(0, subst.indexOf("&"))
			window.location.href=window.location.href.replace(subst, "oby="+recordid)
		}
	}
	else
		window.location.href=window.location.href+"?oby="+recordid;
}
<!-- End Ordring Record as required -->
<!-- Start code of show or hide rows -->
function showhiderow(hiderowids, action)
{
	hiderowids=hiderowids.split(",");
	for(var i=0; i<hiderowids.length; i++)
	{
		if(action=='show')
		{
			try {
				document.getElementById(hiderowids[i]).style.display="table-row"
			}
			catch(ex) {
				document.getElementById(hiderowids[i]).style.display="inline"
			}
		}
		else
		{
			document.getElementById(hiderowids[i]).style.display="none"
		}
	}
}
<!-- End code of show or hide rows -->
<!-- Start Popup Page Code -->
function popup(pageURL,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, "popuppage", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	if (window.focus)
	{

		targetWin.focus()
	}
}
<!-- End Popup Page Code -->
<!-- Start functions for Save & New -->
function savennew(temp)
{
	document.getElementById('addnew').value=temp;
	chkrequired();
}
function submitform()
{
	setTimeout("chkrequired();",100);
	return false;
}
<!-- End functions for Save & New -->
<!-- Start functions CheckedAll -->
function checkedAll(mainfield) 
{
	var i = 1;
	while(document.getElementById(mainfield+[i]))
	{
		var field = document.getElementById(mainfield+[i]);
		field.checked = true;
		i++;
	}
}
<!-- End functions CheckedAll -->
<!-- Start functions uncheckedAll -->
function uncheckedAll(mainfield,tempfield) 
{
	var i = 1;
	while(document.getElementById(mainfield+[i]))
	{
		var field = document.getElementById(mainfield+[i]);
		field.checked = false;
		i++;
	}
}
<!-- End functions uncheckedAll -->
function getCookie(c_name)
{
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++)
	{
	  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
	  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
	  x=x.replace(/^\s+|\s+$/g,"");
	  if (x==c_name)
	  {
		return unescape(y);
	  }
	}
}
function setCookie(c_name,value,exdays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}
<!-- Start Body Load Function List -->
function onloadfunctions()
{
	/* functions Listed here for body load required */		
	/* * Stop Page Loader * */
	stoploader();	
}
<!-- End Body Load Function List -->
<!-- Start Find Diffrence between 2 time -->
function timeDifference(stime,etime,retsec) 
{
	var diff = new Array();
	var stimearr = new Array();
	var etimearr = new Array();
	var samp = stime.substr(stime.length - 2);
	var eamp = etime.substr(stime.length - 2);
	stime = stime.substr(0, stime.length - 3);
	etime = etime.substr(0, etime.length - 3);
	stimearr = stime.split(':');
	etimearr = etime.split(':');
	if(samp=='pm')
		var stimesec = ((stimearr[0]*60)*60) + (stimearr[1]*60) + 43200;	
	else
		var stimesec = ((stimearr[0]*60)*60) + (stimearr[1]*60);	
	if(eamp=='pm')
		var etimesec = ((etimearr[0]*60)*60) + (etimearr[1]*60) + 43200;	
	else
		var etimesec = ((etimearr[0]*60)*60) + (etimearr[1]*60);	
	var diffrenceSecond = etimesec-stimesec;
	var hoursDifference = Math.floor(diffrenceSecond/60/60);
	diffrenceSecond -= hoursDifference*60*60;
	var minutesDifference = Math.floor(diffrenceSecond/60);
	if(retsec==0)
		return hoursDifference+':'+minutesDifference;
	else
		return etimesec-stimesec;
}
<!-- End Find Diffrence between 2 time -->
<!-- Start for set max lenght of textarea -->
function ismaxlength(obj)
{
	var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length>mlength)
	obj.value=obj.value.substring(0,mlength)
}
<!-- End for set max lenght of textarea -->
<!-- Start for Element Disable and Enable -->
function disableenableElments(status,elementlist)
{
	var elementarr = new Array();
	var elementid = "";
	elementarr = elementlist.split('::');
	
	for(i=0; i<elementarr.length; i++) 
	{		
		if(status==true)
			document.getElementById(elementarr[i]).disabled=false;
		else
			document.getElementById(elementarr[i]).disabled=true;
	}
}
<!-- End for Element Disable and Enable -->
<!-- Start for Allow only Decimal number -->
function numbersonly(e)
{
		var unicode=e.charCode? e.charCode : e.keyCode
    if(unicode==37 || unicode==46 || unicode==39 || unicode==9|| unicode==44){ return true;}; // del key  /  left key  / right key
		if (unicode!=8) //if the key isn't the backspace key (which we should allow)
		{ 	
    	if (unicode<48 || unicode>57) //if not a number
        return false //disable key press
    }
}
<!-- End for Allow only Decimal number -->
<!-- Start for Check Number -->
function isNum(number)
{
	if(isNaN(number))
		return false;
	else
	{
		if(number.length>0)
			return true;
		else
			return false;
	}
}
<!-- End for Check Number -->
<!-- Start for Round Number -->
function roundNumber(rnum, rlength) 
{ // Arguments: number to round, number of decimal places
  var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
  newnumber = parseFloat(newnumber); // Output the result to the form field (change for your purposes)
	return newnumber.toFixed(2);
}
<!-- End for Round Number -->
/* Hide Session MSG */
function hideObject(obid)
{
	if(document.getElementById(obid) != null)
	{
		$("#"+obid).animate({ opacity: 0 },4000,
			function() {				
				$("#"+obid).hide();
		});		
	}
}
/* Page Loader Function */
function startloader()
{
	/* * For Start Display Loading Image * */
	$('#pageloader').show();
	$('#loader').show();	
}
function stoploader()
{
	/* * For Stop Display Loading Image * */
	$('#pageloader').hide();
	$('#loader').hide();
}
/* * Show Hide Div * */
function showhideId(id)
{
	$("#"+id).toggle();
}
function hideActionMSG()
{
	$(document).ready(function() {
  	$("#actionmsg").slideUp("slow");  
  });	
}
</script>