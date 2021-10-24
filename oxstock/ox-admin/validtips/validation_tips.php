<script type="text/javascript">
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
					validationTips(focusfieldid.substr(0, focusfieldid.indexOf('|')),fieldid.substr(0, fieldid.indexOf('|'))+" & "+fieldid.substr(parseInt(fieldid.indexOf('|'))+1)+" must be same.");
				}
				else
				{
					alert(fieldid.substr(0, fieldid.indexOf('|'))+" & "+fieldid.substr(parseInt(fieldid.indexOf('|'))+1)+" must be same.");
				}		
				document.getElementById(focusfieldid.substr(0, focusfieldid.indexOf('|'))).focus();
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
	return true
}
<!-- End functions for compulsory check -->
</script>

