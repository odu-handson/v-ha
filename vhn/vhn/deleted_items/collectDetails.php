<html>
<head>
</head>
<link rel="stylesheet" type="text/css" href="New Project.css">
<body>
<div class="body"; style=" margin-left: 0 auto; margin-right: 0 auto">
<h1 style=" text-align:center;"> Virtual Healthcare Neighborhood<br> Study Screening Form </h1>
<div class="div1">
<h2 style="text-align:left; padding-left:20px; padding-top:40px"><b>Contact Information:</b></h2>
<form action="saveParticipants.php" action="POST">
<table border="0" style=" padding-left:100px; text-align:right">
<tr>
<td><p>FIRSTNAME:</p></td>
<td>
 <input type="text" name="firstname">
</td>
</tr>
<tr>
<td><p>LASTNAME:</p></td>
<td><input type="text" name="lastname"></td>
</tr>
<tr>
<td><p>MIDDLE NAME:</p></td>
<td><input type="text" name="middleName"></td>
</tr>
<tr>
<td><p>ADDRESS  (STREET 1):</p></td>
<td><input type="text" name="street1"></td>
</tr>
<tr>
<td><p>STREET 2:</p></td>
<td><input type="text" name="street2"></td>
</tr>
<tr>
<td><p>CITY:</p></td>
<td><input type="city"></td>
</tr>
<tr>
<td><p>STATE:</p></td>
<td><input type="text" name="state"></td>
</tr>
<tr>
<td><p>ZIP:</p></td>
<td><input type="text" name="zip"></td>
</tr>
<tr>
<td><p>HOME PHONE:<p></td>
<td><input type="text" name="homephone"></td>
</tr>
<tr>
<td><p>CELL PHONE:</p></td>
<td><input type="text" name="cellphone"></td>
</tr>
<tr>
<td><p>EMAIL ADDRESS:</p></td>
<td><input type="text" name="emailaddress"></td>
</tr>
</table>
<br>
<h2 style="text-align:left; padding-left:20px; padding-top:40px"><b>Study Inclusion Criteria:<b></h2> 
<table border="0" style=" padding-left:100px; text-align:right">
<tr>
<td><p>Unpaid caregiver for a person with dementia</p></td>
<td><input type="radio" name="Caregiver" value="yes">YES</td>
<td><input type="radio" name="Caregiver" value="male">NO</td>
</tr>
<tr>
<td><p>Computer Access<p></td>
<td><input type="radio" name="Access" value="yes">YES</td>
<td><input type="radio" name="Access" value="male">NO</td>
</tr>
<tr>
<td><p>Internet Access<p></td>
<td><input type="radio" name="Internet" value="yes">YES</td>
<td><input type="radio" name="Internet" value="male">NO</td>
</tr>
<tr>
<td><p>Proficient in English<p></td>
<td><input type="radio" name="English" value="yes">YES</td>
<td><input type="radio" name="English" value="male">NO</td>
</tr>
<tr>
<td><p>Qualifies for Study<p></td>
<td><input type="radio" name="Study" value="yes">YES</td>
<td><input type="radio" name="Study" value="male">NO</td>
</tr>
</table>
<br>
<h2 style="text-align:left; padding-left:20px; padding-top:40px"><b>Payment for Participation Received:<b></h2>
<h3 style="text-align:left; padding-left:20px; padding-top:40px">Home visit 1 Receipt $50</h3> 
<table border="0" style=" padding-left:100px; text-align:left"> 
<tr>
<td><p>NAME:</p></td>
<td><input type="text" name="pay1reciever"></td>
<td>DATE:</td>
<td><input type="text" name="pay1date"></td>
</tr>
<tr>
<td><p>WITNESS:</p></td>
<td><select name="witness1">
<option value="" selected></option>
<option value="fowler">Christianne Fowler</option>
<option value="meg">Meg Lemaster</option> 
 
</select></td>
<td><p>DATE:</p></td>
<td><input type="text" name="date"></td>
</tr>
</table>
<h3 style="text-align:left; padding-left:20px; padding-top:40px">Home visit 2 Receipt $50</h3> 
<table border="0" style=" padding-left:100px; text-align:left"> 
<tr>
<td><p>NAME:</p></td>
<td><input type="text" name="pay2reciever"></td>
<td>DATE:</td>
<td><input type="text" name="pay2date"></td>
</tr>
<tr>
<td><p>WITNESS:</p></td>
<td><select name="witness2">
<option value="" selected></option> 
<option value="fowler">Christianne Fowler</option>
<option value="meg">Meg Lemaster</option> 

</select></td>
<td><p>DATE:</p></td>
<td><input type="text" name="date"></td>
</tr>
</table>
<input type="submit" value="submit">
</form>
</div>
</div>
</body>
</html>