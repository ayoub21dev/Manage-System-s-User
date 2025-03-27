<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Selers</title>
<link rel="stylesheet" href="Assets/lib/css/bootstrap.min.css">
<link rel="stylesheet" href="Assets/CSS/style.css">
</head>
<body>
    
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
                        <form class="row g-3">
                            <div class="col-md-4">
                              <label for="SNameTb" class="form-label">Category Name</label>
                              <input type="text" class="form-control" name="CatNameTb" required placeholder="Enter Category's Name">
                            </div>

                 
   

                           

                            <div class="col-8">
                              <label for="inputAddress" class="form-label">Remarks</label>
                              <input type="text" class="form-control" name="CatRemTb" placeholder="Enter Categories's Remarks" required>
                            </div>
                            
                            
                            
                            <div class="col-6 d-grid">
                              <button type="submit" class="btn btn-warning">Add New Category</button>
                            </div>
                            
                          </form>
                   </div>

                   <div class="row">
                    
                        <!-- Display list here -->

                    </div>
                </div>
             </div>
          </div> 

        </div>

    </div>




</body>
</html>