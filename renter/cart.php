<?php
require_once '../user.classes/database.php';
require_once '../user.classes/product.class.php';

if (isset($_GET['renterId']) && isset($_POST['productId'])) { //Get renter ID from GET
    $renterId = $_GET['renterId'];
    $productId = $_POST['productId'];
    $productObj = new Product();
    $success = $productObj->addProductToCart($productId, $renterId);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Rentbox</title>
    <link rel="icon" type="image/png" href="images/rb logo white.png">
    <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../vendor/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../vendor/flatpickr.min.css">
</head>
<body class=""> 
  <?php
      require_once 'navbar.php';
  ?>
  <hr class="m-0 p-0 opacity-25">
  
  <main class="bg-body bg-body-tertiary p-5">
    <div class="container-fluid bg-body rounded-5 p-5">
        <div class="row">
            <!--Items wrapper-->
            <div class="col col-9 order-first p-0">


                <!-- Title -->
                <div class="rounded-3 d-flex flex-wrap bg-body-secondary justify-content-between align-items-center">
                    <h5 class="mb-0 text-success ps-3">Your Cart</h5>
                    <div class="d-flex" href="">
                        <button class="d-flex btn btn-outline-light align-items-center border-0 rounded-start-0">
                            <i class="bi bi-caret-left-fill text-success pe-2 fs-6"></i>
                            <h6 class="mb-0 text-success">Continue shopping</h6>
                        </button>
                    </div>       
                </div>

                <!--Item 1 with actions-->
                <div class="row px-5 py-3">
                    <!-- Info -->
                    <div class="col-9 m-0 p-0">
                        <div class="d-flex">
                            <a class="" href="#">
                                <img src="includes/images/laptop.png" alt="..." class="img-thumbnail border-2 object-fit-cover" style="width: 240px; height: 240px;">
                            </a>
                            <div class="ps-3 pt-2">
                                <a href="item.php" class="text-decoration-none fw-bold text-dark border-0 pb-0 fs-3 text-start">ACER Aspire 3</a>
                                <div class="d-flex gap-3 align-items-end mt-2">
                                    <small class="text-body-secondary">Condition</small>  
                                    <small class="mb-0 border rounded border-success px-2 py-1 text-success fw-bold">Good</small>
                                </div>
                                <div class="d-flex gap-3 align-items-end mt-2">
                                    <small class="text-body-secondary">Specifications</small>  
                                    <div class="d-flex align-items-center border rounded border-success px-2 py-1 text-success">
                                        <small class="mb-0 border-end border-1 border-success pe-1">Intel i3</small>
                                        <small class="mb-0 border-end border-1 border-success px-1">14 hz LCD</small>
                                        <small class="mb-0 ps-1">Other</small>
                                    </div> 
                                </div>
                                <div class="d-flex gap-3 align-items-end mt-2">
                                    <small class="text-body-secondary">Accesssories</small>  
                                    <div class="d-flex align-items-center border rounded border-success px-2 py-1 text-success">
                                        <small class="mb-0 border-end border-1 border-success pe-1">Charger</small>
                                        <small class="mb-0 border-end border-1 border-success px-1">Laptop Bag</small>
                                        <small class="mb-0 ps-1">Other</small>
                                    </div> 
                                </div>
                                <div class="d-flex gap-3 align-items-end mt-2">
                                    <small class="text-body-secondary">Reserve</small> 
                                    <div class="d-flex">
                                        <input class="border border-success border-1 rounded-start px-2 text-success" type="text" id="startDate" placeholder="Start Date" style="width: 100px; font-size: 14px;">
                                        <input class="border border-success border-1 rounded-end px-2 text-success" type="text" id="endDate" placeholder="End Date" style="width: 100px; font-size: 14px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>       

                    <!-- Actions -->
                    <div class="col-3 d-flex flex-column align-items-center">
                        <div class="d-flex flex-column align-items-center">
                            <div class="form-group d-flex flex-column">
                                <h5 class="text-center pt-2 pb-3" for="quantity1">Quantity</h5>
                                <div class="d-flex pb-2">
                                    <button type="button" class="btn btn-outline-success rounded-end-0 border-end-0"><i class="bi bi-plus"></i></button>
                                    <input class="form-control form-control-sm text-center border-success rounded-0" type="text" id="quantity1" value="1" style="max-width: 40px;">
                                    <button type="button" class="btn btn-outline-success rounded-start-0 border-start-0"><i class="bi bi-dash"></i></button>
                                </div>
                            </div>
                            
                            
                            <a class="btn btn-outline-danger btn-sm px-3 mb-2 fs-6 rounded d-flex justify-content-center" href="#" type="button">
                            <i class="bi bi-trash fs-6 pe-2 pt-1"></i>
                            <small class="pt-1">Remove</small></a>
                            
                            <a type="button" class="btn btn-light px-3" href="#" style="font-size:small;">View Similar</a>
                            
                        </div>
                    </div>
                <hr class="px-2 mt-2">
                </div>

            </div>  
            <!--Other functions wrapper-->
            <div class="col col-3 order-last">
                <!-- Total -->
                <div class="d-flex flex-column justify-content-center">
                    <h5 class="h6 py-2 rounded bg-body-secondary text-success text-center">Subtotal</h5>
                    <h4 class="fw-bold text-center pt-3 pb-1">$325.00</h4>

                    <hr class="mx-2 p-0">

                    <small class="mt-1 mx-auto">Additional comments</small>

                    <textarea class="form-control mt-2 mb-3" id="order-comments" rows="5" style="font-size:12px;"></textarea>
                    
                    <a class="btn btn-success btn-sm px-3 rounded d-flex justify-content-center" href="#" type="button">
                        <i class="bi bi-credit-card fs-6 pe-2 pt-1"></i>
                        <p class="pt-1 mb-0">Checkout</p></a>
                </div>
                <!-- Promo Code -->
                <div class="card mt-2 p-1 rounded border-0">
                    <button class="btn btn-secondary card-title text-white m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        Promocode disable
                    </button>
                    
                    <div class="collapse" id="collapse1">
                        <div class="card-body">
                        <form class="needs-validation d-flex flex-column justify-content-center gap-2" novalidate="">
                            <div class="form-group">
                                <input class="form-control" type="text" id="cart-promocode" placeholder="Promo code" required="">
                                <div class="invalid-feedback">Please provide a valid promo code!</div>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit">Apply</button>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="card mt-2 p-1 rounded border-0">
                    <button class="btn btn-secondary card-title text-white m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Address
                    </button>
                    
                    <div class="collapse" id="collapse2">
                        <div class="card-body">
                        <form class="needs-validation d-flex flex-column justify-content-center" novalidate="">
                            <div class="form-group">
                                <input class="form-control mb-2" type="text" id="address" placeholder="City" required="">
                                <div class="invalid-feedback">City</div>
                                <input class="form-control mb-2" type="text" id="address" placeholder="Barangay" required="">
                                <div class="invalid-feedback">Barangay</div>
                                <input class="form-control mb-2" type="text" id="address" placeholder="More details" required="">
                                <div class="invalid-feedback">Additional Info</div>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit">Save</button>
                        </form>
                        </div>
                    </div>
                </div>












                
            
            </div> 



        </div>









    </div>
  </main>
  
      
  </div>  
  <footer>
      <div class="d-flex flex-column flex-sm-row justify-content-between py-2 border-top">
          <p class="ps-3">© 2024 Rentbox. All rights reserved.</p>
          <ul class="list-unstyled d-flex pe-3">
          <li class="ms-3"><a href=""><i class="bi bi-facebook text-body"></i></a></li>
          <li class="ms-3"><a href=""><i class="bi bi-twitter-x text-body"></i></a></li>
          <li class="ms-3"><a href=""><i class="bi bi-linkedin text-body"></i></a></li>
          </ul>
      </div>
  </footer>
</body>
<script src="../vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../vendor/flatpickr.min.js"></script>
    <script>
    //flatpickr
 
    flatpickr("#startDate", {
    dateFormat: "Y-m-d", 
    maxDate: new Date(2025, 11, 1), 
    minDate: "today",     
    disableMobile: true 
    });

    flatpickr("#endDate", {
    minDate: "today",     
    dateFormat: "Y-m-d", 
    maxDate: new Date(2025, 11, 1), 
    disableMobile: true 
    });
    
    
    </script>
</html>
