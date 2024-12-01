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

</head>
<body>
  
  <?php
      require_once 'includes/navbar.php';
  ?>
  <hr class="m-0 p-0 opacity-25">
  
  <div class="bg-body-secondary p-4">      
    <main class="bg-body rounded-5 d-flex mb-5 p-4">
    <div class="container-fluid">

      <div class="row">
          <div class="col-8 p-0">
            <div class="card rounded-4">

            <div class="rounded-4 rounded-bottom-0 d-flex flex-wrap bg-body-secondary justify-content-between align-items-center">
                <h5 class="mb-0 text-success ps-4">Checkout</h5>
                <div class="d-flex" href="">
                    <button class="d-flex btn btn-outline-light align-items-center border-0 rounded-start-0">
                        <i class="bi bi-caret-left-fill text-success pe-2 fs-6"></i>
                        <h6 class="mb-0 text-success pe-3">Continue shopping</h6>
                    </button>
                </div>       
            </div>

            <hr class="m-0 p-0">

                <div class="card-body">
                    <ol class="activity-checkout mb-0 px-4 mt-3">
                      <li class="">
                        <h6 class="mb-1 fw-bold">Billing and Shipping</h6>
                        <div class="mb-3">
                          <form>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="billing-name">Name</label>
                                        <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="billing-email-address">Email Address</label>
                                        <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="billing-phone">Phone</label>
                                        <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="billing-address">Address</label>
                                <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4 mb-lg-0">
                                        <label class="form-label">Country</label>
                                        <select class="form-control form-select" title="Country">
                                            <option value="0">Select Country</option>
                                            <option value="AF">Country</option>                               
                                            <option value="AF">Country</option>                               
                                            <option value="AF">Country</option>                               
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-4 mb-lg-0">
                                        <label class="form-label" for="billing-city">City</label>
                                        <input type="text" class="form-control" id="billing-city" placeholder="Enter City">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-0">
                                        <label class="form-label" for="zip-code">Zip / Postal code</label>
                                        <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code">
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                      </li>

                      <li class="">
                          <div class="feed-item-list">
                            <h6 class="fw-bold mb-1">Payment Information</h6>  
                              <div class="mt-3">
                                  <h6 class="mb-3">Payment method:</h6>
                                  <div class="row">
                                      <div class="card card-radio col-lg-3 col-sm-6 p-2 ">
                                        <label class="card-body">
                                            <input type="radio" name="pay-method" id="pay-methodoption1" class="d-none">
                                            <span class="py-3">
                                              <i class="bi bi-credit-card-2-front-fill d-block fs-2"></i>
                                              Credit / Debit Card
                                            </span>
                                        </label>
                                      </div>
                                      
                                      <div class="col-lg-3 col-sm-6">
                                          <div>
                                              <label class="card-radio-label">
                                                  <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">
                                                  <span class="card-radio py-3 text-center text-truncate">
                                                      <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                      Paypal
                                                  </span>
                                              </label>
                                          </div>
                                      </div>

                                      <div class="col-lg-3 col-sm-6">
                                          <div>
                                              <label class="card-radio-label">
                                                  <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked="">

                                                  <span class="card-radio py-3 text-center text-truncate">
                                                      <i class="bx bx-money d-block h2 mb-3"></i>
                                                      <span>Cash on Delivery</span>
                                                  </span>
                                              </label>
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                          </div>
                      </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-4">
                    <a href="ecommerce-products.html" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <a href="#" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i> Procced </a>
                    </div>
                </div> <!-- end col -->
            </div> 
          </div>

        <div class="col-4">
              <div class="card checkout-order-summary">
                  <div class="card-body">
                      <div class="p-3 bg-light mb-3">
                          <h6 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h6>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-centered mb-0 table-nowrap">
                              <thead>
                                  <tr>
                                      <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                      <th class="border-top-0" scope="col">Product Desc</th>
                                      <th class="border-top-0" scope="col">Price</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row"><img src="" alt="product-img" title="product-img" class="avatar-sm rounded"></th>
                                      <td>
                                          <h6 class="font-size-16 text-truncate"><a href="#" class="text-dark">Waterproof Mobile Phone</a></h6>
                                          <p class="text-muted mb-0">
                                              <i class="bx bxs-star text-warning"></i>
                                              <i class="bx bxs-star text-warning"></i>
                                              <i class="bx bxs-star text-warning"></i>
                                              <i class="bx bxs-star text-warning"></i>
                                              <i class="bx bxs-star-half text-warning"></i>
                                          </p>
                                          <p class="text-muted mb-0 mt-1">$ 260 x 2</p>
                                      </td>
                                      <td>$ 520</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                          <h6 class="font-size-14 m-0">Sub Total :</h6>
                                      </td>
                                      <td>
                                          $ 780
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                          <h6 class="font-size-14 m-0">Discount :</h6>
                                      </td>
                                      <td>
                                          - $ 78
                                      </td>
                                  </tr>

                                  <tr>
                                      <td colspan="2">
                                          <h6 class="font-size-14 m-0">Shipping Charge :</h6>
                                      </td>
                                      <td>
                                          $ 25
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                          <h6 class="font-size-14 m-0">Estimated Tax :</h6>
                                      </td>
                                      <td>
                                          $ 18.20
                                      </td>
                                  </tr>                              
                                      
                                  <tr class="bg-light">
                                      <td colspan="2">
                                          <h6 class="font-size-14 m-0">Total:</h6>
                                      </td>
                                      <td>
                                          $ 745.2
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end row -->

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
  // for invalid field
(() => {
  'use strict'

  // fetch for validation
  const forms = document.querySelectorAll('.needs-validation')

  // loop
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  document.querySelectorAll('.card-radio').forEach(card => {
      card.addEventListener('click', function() {
          // Remove the active class from all cards
          document.querySelectorAll('.card-radio').forEach(c => {
              c.style.backgroundColor = '';
              c.style.color = '';
              c.style.boxShadow = '';
          });

          // Get the radio input inside the clicked card
          const radioInput = this.querySelector('input[type="radio"]');
          if (radioInput) {
              radioInput.checked = true; // Check the radio input

              // Apply styles to the selected card
              this.style.backgroundColor = '.bg-body';
              this.style.color = 'black';
              this.style.boxShadow = '0 0 10px rgba(31, 69, 41, 0.3)';
          }
      });
  });
</script>
</html>
