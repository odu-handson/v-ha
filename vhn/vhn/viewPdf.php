<script>
function getPdf()
{
 var x = document.getElementById("selectpdf");
 var value = x.options[x.selectedIndex].value;

	 var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","loadPdf.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+value);

 
}

</script>
<?php
include 'connectDB.php';
showpdf();
function showpdf()
{
$sql = "SELECT consent_form pdf FROM user_pdfforms WHERE user_id = 88";
$result = mysql_query($sql) or die('Bad query!'.mysql_error());  

while($row = mysql_fetch_array($result,MYSQL_ASSOC)){       
    $db_pdf = $row['pdf']; // No stripslashes() here.

	}

	file_put_contents("temp.pdf",$db_pdf);
		echo '<object data="temp.pdf" type="application/pdf" width="100%" height="100%">';
}

$sql1 = "SELECT id,name FROM pdfstore";
$result1 = mysql_query($sql1) or die('Bad query!'.mysql_error());  
echo '<div style="margin: 0 auto; width:350px">';
echo '<select id="selectpdf" onchange="getPdf()">';
while($row1 = mysql_fetch_array($result1,MYSQL_ASSOC)){       
    
	echo '<option value="'.$row1['id'].'">'.$row1['name'].'</option>';
	
	}
echo '</select>';
echo '</div>';
echo '<div id="myDiv" style="padding-top : 50px; margin: 0 auto; width: 85%"></div>';

		
		
?>