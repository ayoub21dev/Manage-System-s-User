<?php
session_start();
$mysqli = new mysqli('localhost','root','','mobileshopephp') or die(mysqli_error($mysqli));


$CId = 0;
$CName = ""; 
$CDesc = "";
$update = false;

  
// save button   
if(isset($_POST['Save'])){
    $CName = $_POST['CatNameTb'];  
    $CDesc = $_POST['CatRemTb'];  
    
    $mysqli->Query("INSERT INTO CategoryTbi(CatName,CatDesc) VALUES('$CName','$CDesc')") or die($mysqli->error);

    $_SESSION['message'] = "Category Recorded!";
    $_SESSION['msg_type'] = "success";

    header("location: Categories.php");
}

//(DELETE)
if(isset($_GET['delete'])){
    $SId = $_GET['delete'];
    $mysqli->Query("DELETE FROM CatgeoryTbi WHERE CatId=$CId") or die($mysqli->error);
    $_SESSION['message'] = "Category Deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: Categories.php");
}

// (EDIT)
if(isset($_GET['edit'])){
    $SId = $_GET['edit'];
    $update = true;
    $result = $mysqli->Query("SELECT * FROM CategoryTbi WHERE CatId=$CId") or die($mysqli->error);
   
    $row = $result->fetch_array();
    $CName = $row['SelName'];  
    $CDesc = $row['SelGender'];
}

// (UPDATE)
if(isset($_POST['update'])){
    $CName = $row['SelName'];  
    $CDesc = $row['SelGender'];
   
    $mysqli->Query("UPDATE CategoryTbi SET CatName='$CName', CDesc='$CDesc' WHERE CatId=$CId") or die($mysqli->error);

    $_SESSION['message'] = "Category Updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: Categories.php");
}
?>


