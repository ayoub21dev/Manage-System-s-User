<!DOCTYPE html>
<html lang="en">
<head>
    <title>Selers</title>
    <link rel="stylesheet" href="Assets/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/CSS/style.css">
</head>
<body>

    <?php require_once 'functions.php'; ?>
    
    <?php 
        //  cononect to the database
        $mysqli = new mysqli('localhost','root','','mobileshopephp') or die(mysqli_error($mysqli));
        $result = $mysqli->Query("SELECT * FROM SellerTbi") or die($mysqli->error);
    ?>
 
    <div class="container-fluid">
        <div class="row" style="height: 100vh; width: 100vw;">
            <div class="col-md-2 bg-danger">
                <ul class="nav flex-column">
                    <div class="row">
                        <div class="col"> 
                            <img src="Assets/images/smartphone.png" style="width: 80px;">
                        </div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="Items.html">Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="Categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Sellers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-disabled="true">Billing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-disabled="true">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col bg-warning">
                                <h3 class="text-center">Manage System's User</h3>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Forme-->
                            <form class="row g-3" action="Functions.php" method="POST">
                                <!--  hidden Id -->
                                <div class="col-md-4">
                                    <label for="SNameTb" class="form-label">Seller Name</label>
                                    <input type="text" class="form-control" value="<?php echo $SName; ?>" name="SNameTb" required placeholder="Enter Seller Name">
                                    <input type="hidden" name="SelId" value="<?php echo $SId; ?>">
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Gender</label>
                                    <select name="SGenCb" class="form-select">
                                        <option selected>Your Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputPassword4" class="form-label">Seller's phone</label>
                                    <input type="text" class="form-control" value="<?php echo $SPhone; ?>" name="SPhoneTb" placeholder="Enter Seller's phone">
                                </div> 

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" value="<?php echo $SAdd; ?>" name="SAddressTb" placeholder="Enter Seller's Address" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="SNameTb" class="form-label">Seller Email</label>
                                    <input type="email" class="form-control" value="<?php echo $SEmail; ?>" name="SEmailTb" required placeholder="Enter Seller Email">
                                </div>

                                <div class="col-md-6">
                                    <label for="SpasswordTb" class="form-label">Seller password</label>
                                    <input type="password" class="form-control" value="<?php echo $SPass; ?>" name="SpasswordTb" required placeholder="Enter Seller password">
                                </div>
                            
                                <div class="col-6 d-grid">
                                    <?php if($update == true): ?> 
                                        <button type="submit" name="update" class="btn btn-info">Update Selected Agent</button>
                                    <?php else: ?>
                                        <button type="submit" name="Save" class="btn btn-warning">Add New Agent</button>
                                    <?php endif; ?>
                                </div>
                                  
                                <div class="col-6"> 
                                    <?php if(isset($_SESSION['message'])): ?>
                                        <div class="alert alert-<?=$_SESSION['msg_type']?> mb-0">
                                            <?php 
                                                echo $_SESSION['message'];
                                                unset($_SESSION['message']); 
                                            ?>
                                        </div>
                                    <?php endif; ?>  
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <table class="table table-bordered mt-3">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['SelId']; ?></td>
                                        <td><?php echo $row['SelName']; ?></td>
                                        <td><?php echo $row['SelGender']; ?></td>
                                        <td><?php echo $row['SelPhone']; ?></td>
                                        <td><?php echo $row['SelAddress']; ?></td>
                                        <td><?php echo $row['SelEmail']; ?></td>
                                        <td><?php echo $row['SelPassword']; ?></td>
                                        <td>
                                            <a href="Selers.php?edit=<?php echo $row['SelId']; ?>" class="btn btn-success">Edit</a>
                                            <a href="Selers.php?delete=<?php echo $row['SelId']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

</body>
</html>
