<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ONLINE CLOTH SHOPPING</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {color: #FFFFFF}
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:#003300"> Welcome  <?php echo $_SESSION['Name'];?></span></h2>
    <table width="100%" border="1" bordercolor="#003300" >
     <tr>
        
        <td bgcolor="#4B692D" class="style10 style3"><strong>ID</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Name</strong></td>
      <td bgcolor="#4B692D" class="style10 style3"><strong>Size</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Quantity</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Total</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Image</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Delete</strong></td>
      </tr>
      <?php

$con = mysqli_connect("localhost","root", "2012116664", "shopping");

$sql = "SELECT shopping_cart.CartId, shopping_cart.ItemName, shopping_cart.Quantity, shopping_cart.Total, item_master.`Size`, item_master.Image
FROM admin_master, shopping_cart, item_master
WHERE item_master.ItemName=shopping_cart.ItemName and shopping_cart.CustomerId=".$_SESSION['ID']."";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result))
{
$Id=$row['CartId'];
$ItemName=$row['ItemName'];
$Size=$row['Size'];
$Quantity=$row['Quantity'];
$Total=$row['Total'];
$Image=$row['Image'];
?>
      <tr>
        
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $ItemName;?></strong></div></td>
      <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Size;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Quantity;?></strong></div></td>
            <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Total;?></strong></div></td>
        <td class="style3"><img src="../Products/<?php echo $Image;?>" alt="" width="124" height="124" border="5" /></td>
          <td class="style3"><a href="DeleteCart.php?CartId=<?php echo $Id;?>"><img src="img/delete.png"></a></td>
      </tr>
      <?php
}

$records = mysqli_num_rows($result);
?>
      <?php

mysqli_close($con);
?>
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
</body>
</html>
