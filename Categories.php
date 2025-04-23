<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Selers</title>
<link rel="stylesheet" href="Assets/lib/css/bootstrap.min.css">
<link rel="stylesheet" href="Assets/CSS/style.css">
</head>
<body>
    
<?php require_once 'CaFunctions.php'; ?>
    
    <?php 
        //  cononect to the database
        $mysqli = new mysqli('localhost','root','','mobileshopephp') or die(mysqli_error($mysqli));
        $result = $mysqli->Query("SELECT * FROM CategoryTbi") or die($mysqli->error);
    ?>

    <div class="container-fluid">
        <div class="row" style="height: 100vh; width: 100vw;">
          <div class="col-md-2  bg-danger">
            <ul class="nav flex-column">
                <div class="row" >
                    <div class="col"> 
                       <img src="Assets/images/smartphone.png" style="width: 80px;" >
                    </div>
                </div>
                <li class="nav-item">
                  <a class="nav-link text-light " aria-current="page" href="Items.html">Items</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="#">Categories</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link text-light" href="Selers.php">Sellers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light " aria-disabled="true">Billing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" aria-disabled="true">Logout</a>
                  </li>
              </ul>
          </div>

          <div class="col-md-10">
             <div class="row">
                <div class="col ">
                    <div class="row">
                        <div class="col bg-warning">
                         <h3 class="text-center">Manage Item's Categories</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Enter detials here -->
                        <form class="row g-3" action="CaFunctions.php" method="POST">
                            <div class="col-md-4">
                              <label for="SNameTb" class="form-label">Category Name</label>
                              <input type="text" class="form-control" name="CatNameTb" required placeholder="Enter Category's Name">
                            </div>

                 
   

                           

                            <div class="col-8">
                              <label for="inputAddress" class="form-label">Remarks</label>
                              <input type="text" class="form-control" name="CatRemTb" placeholder="Enter Categories's Remarks" required>
                            </div>
                            
                            
                            
                            <div class="col-6 d-grid">
                                    <?php if($update == true): ?> 
                                        <button type="submit" name="update" class="btn btn-info">Update Selected Category</button>
                                    <?php else: ?>
                                        <button type="submit" name="Save" class="btn btn-warning">Add New Category</button>
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
                                    <th>Categories</th>
                                    <th>Remarks</th>
                                    
                                    <th colspan="2">Actions</th>
                                </tr>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['CatId']; ?></td>
                                        <td><?php echo $row['CatName']; ?></td>
                                        <td><?php echo $row['CatDesc']; ?></td>
                                        
                                        <td>
                                            <a href="Categories.php?edit=<?php echo $row['CatId']; ?>" class="btn btn-success">Edit</a>
                                            <a href="Categories.php?delete=<?php echo $row['CatId']; ?>" class="btn btn-danger">Delete</a>
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