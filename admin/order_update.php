<?php

include("../connection/connect.php");
error_reporting(0);
session_start();
/*if(strlen($_SESSION['user_id'])==0)
{ 
  header('location:login.php');
}*/

  if(isset($_POST['update']))
  {
$form_id=$_GET['form_id'];
$status=$_POST['status'];
//$remark=$_POST['remark'];
//$query=mysqli_query($db,"insert into remark(frm_id,status,remark) values('$form_id','$status','$remark')");
$sql=mysqli_query($db,"update users_orders set status='$status' where o_id='$form_id'");

echo "<script>alert('form details updated successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}

</script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   
<style type="text/css" rel="stylesheet">

table { 
	width: 650px; 
	border-collapse: collapse; 
	margin: auto;
	margin-top:50px;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #004684; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	}
</style>
</head>

<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table  border="0" cellspacing="0" cellpadding="0">
     <tr >
      <td><b>Form Number</b></td>
      <td><?php echo $_GET['form_id']; ?></td>
    </tr>
	<tr>
      <td  >&nbsp;</td>

      <td >&nbsp;</td>
    </tr>
   
    <tr >
      <td><b>Status</b></td>
      <td><select name="status" required="required" >
      <option value="">Select Status</option>
      <option value="in process">In Process</option>
      <option value="closed">Closed</option>
	    <option value="rejected">Rejected</option>
        
      </select></td>
    </tr>
     <!--<tr >
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>-->
    <tr>
      <td><b>Action</b></td>
      <td><input type="submit" name="update"  class="btn btn-primary" value="Submit">
	   
      <input name="Submit2" type="submit"  class="btn btn-danger"  value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>

 
</table>
 </form>
</div>

</body>
</html>

     <?php 
     ?>