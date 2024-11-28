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

  <?php
      require_once 'includes/navbar.php';
  ?>
  <hr class="m-0 p-0 opacity-25">
  
  <div class="bg-body-secondary p-4 container-fluid">      
    <main class="bg-body mx-3 rounded-5 d-flex mb-5 container-fluid">
   
      <div class="container-fluid mt-5 mx-5 justify-content-between">
        <div class="row">
            <div class="">
                <div class="d-flex flex-wrap rounded justify-content-between bg-body-secondary">
                    <h5 class="my-2 ms-3 text-success ps-3">Your Cart</h5>
                    <div class="" href="">
                        <button class="d-flex btn btn-outline-light align-items-center m-0 border-0 rounded-start-0">
                            <i class="bi bi-caret-left-fill text-success pe-2 fs-6"></i>
                            <h6 class="mb-0 text-success">Continue shopping</h6>
                        </button>
                    </div>       
                </div>
                <!-- Item-->
                <div class="d-sm-flex my-4 pb-4 border-bottom border">
                    <div class="d-block d-sm-flex text-sm-left me-5">
                        <a class="mx-auto mr-sm-4" href="#">
                            <img src="includes/images/laptop.png" alt="..." class="img-thumbnail border-2 " style="object-fit:contain; width: 240px; height: 240px;">
                        </a>
                        <div class="ps-3 pt-2 me-5">
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

                    <div class="pt-3 mx-5 border">
                        <div class="form-group mb-2 mx-5 border">
                            <h5 class="text-center fw-bold" for="quantity1">Quantity</h5>
                            <div class="d-flex">
                                <button class="btn border-success border-end-0 rounded-end-0"><i class="bi bi-plus text-success "></i></button>
                                <input class="form-control form-control-sm text-center border-success rounded-0" type="text" id="quantity1" value="1" style="max-width: 40px;">
                                <button class="btn border-success border-start-0 rounded-start-0"><i class="bi bi-dash text-success "></i></button>
                            </div>
                        </div>
                        <div>

                        </div>
                        <button class="btn btn-outline-danger btn-sm btn-block mb-2 fs-6" type="button">
                            <i class="bi bi-trash fs-5"></i>
                            Remove</button>
                    </div>
                </div>
                
            
        
        <!-- Sidebar-->
            <div class="col-xl-3 col-md-4 pt-3 pt-md-0 ms-auto">
                <h2 class="h6 py-3 bg-secondary text-center ps-auto">Subtotal</h2>
                <div class="h3 font-weight-semibold text-center py-3">$325.00</div>
                <hr>
                <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Note</span>Additional comments</h3>
                <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
                <a class="btn btn-primary btn-block" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>Proceed to Checkout</a>
                <div class="pt-4">
                    <div class="accordion" id="cart-accordion">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="accordion-heading font-weight-semibold"><a href="#promocode" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promocode">Apply promo code<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span></a></h3>
                            </div>
                            <div class="collapse show" id="promocode" data-parent="#cart-accordion">
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="cart-promocode" placeholder="Promo code" required="">
                                            <div class="invalid-feedback">Please provide a valid promo code!</div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="accordion-heading font-weight-semibold"><a class="collapsed" href="#shipping" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shipping">Shipping estimates<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span></a></h3>
                            </div>
                            <div class="collapse" id="shipping" data-parent="#cart-accordion">
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <select class="form-control custom-select" required="">
                                                <option value="">Choose your country</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Finland">Finland</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="United States">United States</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose your country!</div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control custom-select" required="">
                                                <option value="">Choose your city</option>
                                                <option value="Bern">Bern</option>
                                                <option value="Brussels">Brussels</option>
                                                <option value="Canberra">Canberra</option>
                                                <option value="Helsinki">Helsinki</option>
                                                <option value="Mexico City">Mexico City</option>
                                                <option value="Ottawa">Ottawa</option>
                                                <option value="Washington D.C.">Washington D.C.</option>
                                                <option value="Wellington">Wellington</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose your city!</div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="ZIP / Postal code" required="">
                                            <div class="invalid-feedback">Please provide a valid zip!</div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-block" type="submit">Calculate shipping</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<script src="../vendor/flatpickr.min.js"></script>
<script>

</script>
</html>
