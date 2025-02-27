<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Cloth Shopping</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
 <style type="text/css">

.ds_box {
	background-color:#336633;
	border: 2px solid #666600;
	position: absolute;
	z-index: 32767;
}

.ds_tbl {
	background-color: #FFF;
	
}

.ds_head {
	background-color: #85A157;
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	text-align: center;
	letter-spacing: 2px;
}

.ds_subhead {
	background-color: #85A157;
	color: #000;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	width: 32px;
}

.ds_cell {
	background-color:#FFFFCC;
	color: #000;
	font-size: 13px;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px;
	cursor: pointer;
	border: 1px solid #666600;
}

.ds_cell:hover {
	background-color: #F3F3F3;
} /* This hover code won't work for IE */

 </style>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style3 {font-weight: bold}
-->
</style>
</head>
<body>

<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>

<script type="text/javascript">
// <!-- <![CDATA[

// Project: Dynamic Date Selector (DtTvB) - 2006-03-16
// Script featured on JavaScript Kit- http://www.javascriptkit.com
// Code begin...
// Set the initial date.
var ds_i_date = new Date();
ds_c_month = ds_i_date.getMonth() + 1;
ds_c_year = ds_i_date.getFullYear();

// Get Element By Id
function ds_getel(id) {
	return document.getElementById(id);
}

// Get the left and the top of the element.
function ds_getleft(el) {
	var tmp = el.offsetLeft;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetLeft;
		el = el.offsetParent;
	}
	return tmp;
}
function ds_gettop(el) {
	var tmp = el.offsetTop;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetTop;
		el = el.offsetParent;
	}
	return tmp;
}

// Output Element
var ds_oe = ds_getel('ds_calclass');
// Container
var ds_ce = ds_getel('ds_conclass');

// Output Buffering
var ds_ob = ''; 
function ds_ob_clean() {
	ds_ob = '';
}
function ds_ob_flush() {
	ds_oe.innerHTML = ds_ob;
	ds_ob_clean();
}
function ds_echo(t) {
	ds_ob += t;
}

var ds_element; // Text Element...

var ds_monthnames = [
'January', 'February', 'March', 'April', 'May', 'June',
'July', 'August', 'September', 'October', 'November', 'December'
]; // You can translate it for your language.

var ds_daynames = [
'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
]; // You can translate it for your language.

// Calendar template
function ds_template_main_above(t) {
	return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
	     + '<tr>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_py();">&lt;&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();">&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Close]</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">&gt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">&gt;&gt;</td>'
		 + '</tr>'
	     + '<tr>'
		 + '<td colspan="7" class="ds_head">' + t + '</td>'
		 + '</tr>'
		 + '<tr>';
}

function ds_template_day_row(t) {
	return '<td class="ds_subhead">' + t + '</td>';

}

function ds_template_new_week() {
	return '</tr><tr>';
}

function ds_template_blank_cell(colspan) {
	return '<td colspan="' + colspan + '"></td>'
}

function ds_template_day(d, m, y) {
	return '<td class="ds_cell" onclick="ds_onclick(' + d + ',' + m + ',' + y + ')">' + d + '</td>';
	// Define width the day row.
}

function ds_template_main_below() {
	return '</tr>'
	     + '</table>';
}


function ds_draw_calendar(m, y) {

	ds_ob_clean();

	ds_echo (ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
	for (i = 0; i < 7; i ++) {
		ds_echo (ds_template_day_row(ds_daynames[i]));
	}

	var ds_dc_date = new Date();
	ds_dc_date.setMonth(m - 1);
	ds_dc_date.setFullYear(y);
	ds_dc_date.setDate(1);
	if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12) {
		days = 31;
	} else if (m == 4 || m == 6 || m == 9 || m == 11) {
		days = 30;
	} else {
		days = (y % 4 == 0) ? 29 : 28;
	}
	var first_day = ds_dc_date.getDay();
	var first_loop = 1;

	ds_echo (ds_template_new_week());

	if (first_day != 0) {
		ds_echo (ds_template_blank_cell(first_day));
	}
	var j = first_day;
	for (i = 0; i < days; i ++) {

		if (j == 0 && !first_loop) {
		
			ds_echo (ds_template_new_week());
		}
	
		ds_echo (ds_template_day(i + 1, m, y));
	
		first_loop = 0;
		// What is the next day?
		j ++;
		j %= 7;
	}
	
	ds_echo (ds_template_main_below());

	ds_ob_flush();

	ds_ce.scrollIntoView();
}


function ds_sh(t) {
	
	ds_element = t;
	
	var ds_sh_date = new Date();
	ds_c_month = ds_sh_date.getMonth() + 1;
	ds_c_year = ds_sh_date.getFullYear();

	ds_draw_calendar(ds_c_month, ds_c_year);
	
	ds_ce.style.display = '';

	the_left = ds_getleft(t);
	the_top = ds_gettop(t) + t.offsetHeight;
	ds_ce.style.left = the_left + 'px';
	ds_ce.style.top = the_top + 'px';
	
	ds_ce.scrollIntoView();
}


function ds_hi() {
	ds_ce.style.display = 'none';
}


function ds_nm() {
	
	ds_c_month ++;
	
	if (ds_c_month > 12) {
		ds_c_month = 1; 
		ds_c_year++;
	}

	ds_draw_calendar(ds_c_month, ds_c_year);
}


function ds_pm() {
	ds_c_month = ds_c_month - 1; 
	
	if (ds_c_month < 1) {
		ds_c_month = 12; 
		ds_c_year = ds_c_year - 1; 
	}

	ds_draw_calendar(ds_c_month, ds_c_year);
}


function ds_ny() {
	
	ds_c_year++;
	
	ds_draw_calendar(ds_c_month, ds_c_year);
}


function ds_py() {
	
	ds_c_year = ds_c_year - 1;

	ds_draw_calendar(ds_c_month, ds_c_year);
}


function ds_format_date(d, m, y) {

	m2 = '00' + m;
	m2 = m2.substr(m2.length - 2);

	d2 = '00' + d;
	d2 = d2.substr(d2.length - 2);
	
	return y + '-' + m2 + '-' + d2;
}


function ds_onclick(d, m, y) {
	
	ds_hi();
	
	if (typeof(ds_element.value) != 'undefined') {
		ds_element.value = ds_format_date(d, m, y);

	} else if (typeof(ds_element.innerHTML) != 'undefined') {
		ds_element.innerHTML = ds_format_date(d, m, y);
	
	} else {
		alert (ds_format_date(d, m, y));
		
	}
}


</script>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:#003300"> Welcome Administrator </span></h2>
    <table width="100%" height="247" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#003300"><span class="style10">Manage Special Offfers</span></td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="InsertOffer.php">
          <table width="100%" height="181" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>Offer Name:</td>
              <td><span id="sprytextfield1">
                <label>
                <input type="text" name="txtName" id="txtName" />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            </tr>
            <tr>
              <td>Offer Detail:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtDetail" id="txtDetail" cols="45" rows="3"></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
            <tr>
              <td>Offer Valid Up to:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text" name="txtDate" id="txtDate"  onclick="ds_sh(this);"/>
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input type="submit" name="button" id="button" value="Create Offer" />
              </label></td>
            </tr>
          </table>
                </form>
        </td>
      </tr>
      <tr>
        <td bgcolor="#003300"><span class="style10">Special Offeres</span></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" bordercolor="#003300" >
          <tr>
            <th height="32" bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Id</strong></div></th>
            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Offer</strong></div></th>
            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Detail</strong></div></th>
            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Valid Upto</strong></div></th>
            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style12">Delete</div></th>
          </tr>
          <?php

$con = mysqli_connect("localhost","root", "2012116664", "shopping");


$sql = "select * from Offer_Master";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result))
{
$Id=$row['OfferId'];
$Offer=$row['Offer'];
$Detail=$row['Detail'];
$Valid=$row['Valid'];
?>
          <tr>
            <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id;?></strong></div></td>
            <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Offer;?></strong></div></td>
            <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Detail;?></strong></div></td>
            <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Valid;?></strong></div></td>
            <td class="style3"><div align="left" class="style9 style5"><strong><a href="DeleteOffer.php?OfferId=<?php echo $Id;?>">Delete</a></strong></div></td>
          </tr>
          <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
          <tr>
            <td colspan="5" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
          </tr>
          <?php
// Close the connection
mysqli_close($con);
?>
        </table></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><p><img src="img/Jeans.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/asd.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/images.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
      </tr>
      <tr>
        <td height="26" bgcolor="#BCE0A8"><div align="center" class="style9">Jeans</div></td>
        <td bgcolor="#BCE0A8"><div align="center" class="style9">Bleasures</div></td>
        <td bgcolor="#BCE0A8"><div align="center" class="style9">T-Shirts</div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
 <?php
 include "Right.php";
 ?>
  <div style="clear:both;"></div>
   <?php
 include "Footer.php";
 ?>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
