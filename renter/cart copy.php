<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Rentbox</title>
    <link rel="icon" type="image/png" href="../images/rb logo white.png">
    <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../vendor/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../vendor/flatpickr.min.css">
    <link rel="stylesheet" href="../other.css">
</head>
<body class=""> 
  <?php
      require_once 'includes/navbar.php';
  ?>
  <hr class="m-0 p-0 opacity-25">
  
  <main class="bg-body bg-body-tertiary p-5">
    <div class="container-fluid bg-body rounded-5 border p-5">
        <div class="row">
            <!--Items wrapper-->
            <div class="col col-9 order-first p-0 border border-2">


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
                                        <input class="border border-success border-1 rounded-start px-2 text-success" type="text" id="startDate" placeholder="Start Date" style="width: 90px; font-size: 14px;">
                                        <input class="border border-success border-1 rounded-end px-2 text-success" type="text" id="endDate" placeholder="End Date" style="width: 90px; font-size: 14px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>       

                    <!-- Actions -->
                    <div class="col-3 d-flex align-items-center justify-content-center border">
                        <div class="d-flex flex-column align-items-center gap-2">
                            
                            <div class="form-group d-flex flex-column justify-content-center">
                                <h5 class="text-center fw-bold" for="quantity1">Quantity</h5>
                                <div class="d-flex">
                                    <button class="btn border-success border-end-0 rounded-end-0"><i class="bi bi-plus text-success "></i></button>
                                    <input class="form-control form-control-sm text-center border-success rounded-0" type="text" id="quantity1" value="1" style="max-width: 40px;">
                                    <button class="btn border-success border-start-0 rounded-start-0"><i class="bi bi-dash text-success "></i></button>
                                </div>
                            </div>
                            
                            <div class="">
                                <button class="btn btn-outline-danger btn-sm px-3 fs-6" type="button">
                                <i class="bi bi-trash fs-5"></i>
                                Remove</button>
                            </div>

                            <div class="">
                                <button class="btn btn-light btn-sm px-3 fs-6" type="button">
                                <i class="bi bi-trash fs-5"></i>
                                View Similar</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>  
            <!--Other functions wrapper-->
            <div class="col col-3 order-last border border-primary">
                column 2
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
<script src="../vendor/flatpickr.min.js"></script>
<script>

</script>
</html>
