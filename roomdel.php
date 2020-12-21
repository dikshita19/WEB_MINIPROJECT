<?php 
session_start();
$db=mysqli_connect('localhost','root','','hotelldb') or die('could not connect');
    if(isset($_POST['delete'])){
    $id=$_POST['delete_id'];
    $que="DELETE FROM reservation where id=$id;";
    $sql=mysqli_query($db,$que);
    if($sql){
    	$_SESSION['success']="Delete Successful";
    	header("location:admin.php?message=delete_successful");
    }
    else{    
    	$_SESSION['stutus']="Delete Unsuccessful";
    	header("location:admin.php?message=delete_fail");
    }
  
  }

 if(isset($_POST['deletedin'])){
  	$dinid=$_POST['delete_id'];
  	$que="DELETE FROM dining where id=$dinid;";
  	$sql=mysqli_query($db,$que);
    if($sql){
    	$_SESSION['success']="Delete Successful";
    	header("location:admindining.php?message=delete_successful");
    }
    else{    
    	$_SESSION['stutus']="Delete Unsuccessful";
    	header("location:admindining.php?message=delete_fail");
    }
  }

  if(isset($_POST['update'])){
  	$name=mysqli_real_escape_string($db,$_POST['ename']);
    $email=mysqli_real_escape_string($db,$_POST['eemail']);
    $contact=mysqli_real_escape_string($db,$_POST['econtact']);
    $members=mysqli_real_escape_string($db,$_POST['emembers']);
    $checkin=mysqli_real_escape_string($db,$_POST['echeckin']);
    $nights=mysqli_real_escape_string($db,$_POST['enights']);
    $rooms=mysqli_real_escape_string($db,$_POST['erooms']);
    $id=$_POST['edit_id'];
  	$q="UPDATE reservation SET name='$name',email='$email',contact='$contact',members=$members,checkin='$checkin',nights=$nights,rooms=$rooms WHERE id=$id;";
  	$qu="UPDATE roompayment set amount=2000*$members*$nights*$rooms WHERE paymentId=$id;";
  	$up=mysqli_query($db,$q);
  	$upd=mysqli_query($db,$qu);
  	if($up && $upd){
  		$_SESSION['success']="Update Successful";
  		header("location:admin.php?message=update_successful");
  	}
  	else{
  		$_SESSION['status']="Update Unsuccessful";
  		header("location:admin.php?message=update_unsuccessful");
  	}
  }


if(isset($_POST['dinupdate'])){
	$name=mysqli_real_escape_string($db,$_POST['ename']);
    $email=mysqli_real_escape_string($db,$_POST['eemail']);
    $contact=mysqli_real_escape_string($db,$_POST['econtact']);
    $members=mysqli_real_escape_string($db,$_POST['emembers']);
    $date=mysqli_real_escape_string($db,$_POST['edate']);
    $type=mysqli_real_escape_string($db,$_POST['etype']);
    $id=$_POST['edit_id'];
    $q="UPDATE dining SET name='$name',email='$email',contact='$contact',type='$type',date='$date',members=$members WHERE id=$id;";
    $qu="UPDATE diningpayment set amount=500*$members WHERE paymentId=$id;";
  	$up=mysqli_query($db,$q);
  	$upd=mysqli_query($db,$qu);
 	if($up && $upd){
  		$_SESSION['success']="Update Successful";
  		header("location:admindining.php?message=update_successful");
  	}
  	else{
  		$_SESSION['status']="Update Unsuccessful";
  		header("location:admindining.php?message=update_unsuccessful");
  	}
  
}



 ?>