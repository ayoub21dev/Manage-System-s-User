<?php
session_start();
$mysqli = new mysqli('localhost','root','','mobileshopephp') or die(mysqli_error($mysqli));


$SId = 0;
$SName = "";
$SGen = "";
$SPhone = "";
$SAdd = "";
$SEmail = "";
$SPass = "";
$update = false;

// save button   
if(isset($_POST['Save'])){
    $SName = $_POST['SNameTb'];  
    $SGen = $_POST['SGenCb'];  
    $SPhone = $_POST['SPhoneTb'];  
    $SAdd = $_POST['SAddressTb'];  
    $SEmail = $_POST['SEmailTb'];  
    $SPass = $_POST['SpasswordTb']; 

    $mysqli->Query("INSERT INTO SellerTbi(SelName,SelGender,SelPhone,SelAddress,SelEmail,SelPassword) VALUES('$SName','$SGen','$SPhone','$SAdd','$SEmail','$SPass')") or die($mysqli->error);

    $_SESSION['message'] = "Seller Recorded!";
    $_SESSION['msg_type'] = "success";

    header("location: Selers.php");

}

//(DELETE)
if(isset($_GET['delete'])){
    $SId = $_GET['delete'];
    $mysqli->Query("DELETE FROM SellerTbi WHERE SelId=$SId") or die($mysqli->error);
    header("location: Selers.php");
}

// (EDIT)
if(isset($_GET['edit'])){
    $SId = $_GET['edit'];
    $update = true;
    $result = $mysqli->Query("SELECT * FROM SellerTbi WHERE SelId=$SId") or die($mysqli->error);
   
    $row = $result->fetch_array();
    $SName = $row['SelName'];
    $SGen = $row['SelGender'];
    $SPhone = $row['SelPhone'];
    $SAdd = $row['SelAddress'];
    $SEmail = $row['SelEmail'];
    $SPass = $row['SelPassword'];
}

// (UPDATE)
if(isset($_POST['update'])){
    $SId = $_POST['SelId'];
    $SName = $_POST['SNameTb'];
    $SGen = $_POST['SGenCb'];
    $SPhone = $_POST['SPhoneTb'];
    $SAdd = $_POST['SAddressTb'];
    $SEmail = $_POST['SEmailTb'];
    $SPass = $_POST['SpasswordTb'];
    $mysqli->Query("UPDATE SellerTbi SET SelName='$SName', SelGender='$SGen', SelPhone='$SPhone', SelAddress='$SAdd', SelEmail='$SEmail', SelPassword='$SPass' WHERE SelId=$SId") or die($mysqli->error);

    $_SESSION['message'] = "Seller Updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: Selers.php");
}
?>
