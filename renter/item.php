<?php
require_once './../user.classes/database.php'; //Keep your database connection
require_once './../user.classes/product.class.php'; //Include the Product class

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    try {
        //Instead of your PDO code use this:
        $productObj = new Product();  // Create a Product object
        $product = $productObj->getProductById($productId);

        if (!$product) {
            echo "Product not found.";
            exit;
        }

    } catch (PDOException $e) {
        error_log("Database error (details): " . $e->getMessage());
        echo "Error fetching product details.";
        exit; //Important to stop execution on error
    }
} else {
    echo "Product ID not provided.";
    exit;
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
        <link rel="stylesheet" href="../other.css">
    </head>
    <body>
    <?php
        require_once 'navbar.php';
    ?>
    <hr class="m-0 p-0 opacity-25">
    <div class="z-3 position-absolute top-0" style="margin-left: 35%;">
        <form class="d-flex my-4 " style="width:400px;">
            <input class="form-control input-group-text shadow-sm rounded-pill me-2 border" type="text" placeholder="Search" id="searchInput"/>
            <button class="btn btn-outline-success my-2 my-sm-0 rounded-circle d-flex align-items-center" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
    </div>

    <div class="bg-body-secondary p-4">      
        <main class="bg-body mx-3 p-5 rounded-5 d-flex flex-row mb-5">
            
        <div id="carouselIndicator" class="carousel carousel-dark slide me-3">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="0" class="active border rounded" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="1" class="border rounded" aria-label="Slide 2 rounded"></button>
                <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="2" class="border rounded" aria-label="Slide 3 rounded"></button>
            </div>
            <div class="carousel-inner border" style="width:600px; height:400px;">
                <div class="carousel-item active">
                <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="" style="object-fit:contain; width:600px; height:400px;">
                </div>
                <div class="carousel-item">
                <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="" style="object-fit:contain; width:600px; height:400px;">
                </div>
                <div class="carousel-item">
                <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="" style="object-fit:contain; width:600px; height:400px;">
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicator" data-bs-slide="prev">
                <div class="d-flex align-items-center position-absolute top-0" style="width: auto; height: 400px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </div>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator" data-bs-slide="next">
                <div class="d-flex align-items-center position-absolute top-0" style="width: auto; height: 400px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </div>
            </button>
            
        </div>

            <div class="container-fluid">
                
                <div class="d-flex align-items-end gap-2 mb-2">
                    <h1><?= $product['name']; ?></h1>  
                    <h6 class="text-body-secondary pb-1">Laptop</h6>  
                </div>
                
                <div class="gap-2">
                    <div class="d-flex">
                    <h5 class="pe-2">5</h5>
                    <i class="bi bi-star-fill text-warning border-end pe-2"></i>

                    <h5 class="text-primary ps-2 pe-2">20</h5>
                    <h5 class="border-end pe-2">Ratings</h5>

                    <h5 class="text-success ps-2 pe-2">21</h5>
                    <h5 class="pe-2">Rentals</h5>
                </div>

                <div class="bg-body-tertiary mt-2 p-2 w-50">
                    <h3 class="fw-bold text-center mb-0" ><?= $product['rental_price']; ?></h3>
                </div>

                <div class="d-flex gap-2 mt-5 mb-2 align-items-center">
                    <h6 class="text-body-secondary" style="margin-right: 20px;">Condition</h6>  
                    <div class="d-flex align-items-center border rounded border-success px-2 py-1 text-success">
                        <p class="mb-0 border-success">Good</p>
                    </div>                        
                </div>

                <div class="d-flex gap-2 mt-2 mb-2 align-items-center">
                    <h6 class="text-body-secondary" style="margin-right: 20px;">Specifications</h6>  
                    <div class="d-flex align-items-center border rounded border-success px-2 py-1 text-success">
                        <p class="mb-0 border-end border-1 border-success pe-1">Intel i3</p>
                        <p class="mb-0 border-end border-1 border-success px-1">14 hz LCD</p>
                        <p class="mb-0 ps-1">Other</p>
                    </div>                        
                </div>

                <div class="d-flex gap-2 mt-2 mb-2 align-items-center">
                    <h6 class="text-body-secondary" style="margin-right: 37px;">Accessories</h6>  
                    <div class="d-flex align-items-center border rounded border-success px-2 py-1 text-success">
                        <p class="mb-0 border-end border-1 border-success pe-1">Charger</p>
                        <p class="mb-0 border-end border-1 border-success px-1">Laptop Bag</p>
                        <p class="mb-0 ps-1">Other</p>
                    </div>                        
                </div>

                <form id="addToCartForm" method="post">
                    <input type="hidden" id="renterId" name="renterId" value="123">
                    <div class="d-flex mb-4">
                        <h6 class="text-body-secondary" style="margin-right: 70px;">Reserve</h6>  
                        <div class="d-flex">
                            <input class="border border-success border-1 rounded-start px-2 text-success" type="text" id="startDate" placeholder="Start Date" style="width: 100px;">
                            <input class="border border-success border-1 rounded-end px-2 text-success" type="text" id="endDate" placeholder="End Date" style="width: 100px;">
                        </div>
                        
                    </div>
                    

                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-2">
                            <img src="./includes/images/laptop.png" class="border rounded-circle object-fit-fill" alt="pfp" height="40px" width="40px">
                        </div>
                        <div class="d-flex gap-3 mb-4">
                            <button type="submit" class="px-3 py-2 btn rounded-pill shadow-sm btn-light px-3 border ms-auto">
                                <a  href="cart.php" class="text-decoration-none text-dark"><i class="bi bi-bag-plus pe-1"></i>Add to Cart</a>
                            </button>
                            <button type="submit" class="px-3 py-2 btn rounded-pill shadow-sm btn-success d-flex align-items-center gap-2" >
                                <a href="cart.php" class="text-decoration-none text-white">Checkout<span class="mb-0 ps-1 fw-bold" id="checkoutTotalPrice">₱</span></a>
                            </button>
                        </div>
                    </div>
                </form>
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
    //search input 
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('focus', function() {
        this.classList.add('border-success');
    });

    searchInput.addEventListener('blur', function() {
        this.classList.remove('border-success');
    });
    
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
    
    //calculate total price based on selected dates
    function calculateTotal() {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const checkoutTotalPrice = document.getElementById('checkoutTotalPrice'); // Target this element

    const pricePerDay = <?php echo $product['rental_price']; ?>;
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    if (startDateInput.value && endDateInput.value && startDate <= endDate) {
        const timeDifference = endDate - startDate;
        const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
        const totalPrice = daysDifference * pricePerDay;
        checkoutTotalPrice.textContent = '₱' + totalPrice;
    } else {
        checkoutTotalPrice.textContent = '₱' + pricePerDay; // Show rental price if dates are invalid
    }
    }
    document.getElementById('startDate').addEventListener('change', calculateTotal);
    document.getElementById('endDate').addEventListener('change', calculateTotal);

    $(document).ready(function() {
    $('#addToCartForm').submit(function(event) {
        event.preventDefault();
        const renterId = $('#renterId').val(); //Get renter ID from hidden input
        const productId = <?php echo $product['id']; ?>;

        $.ajax({
                type: 'POST',
                url: 'add_to_cart.php', // Create a separate file to handle the addition
                data: { renterId: renterId, productId: productId },
                success: function(response) {
                    if (response === 'success') {
                        alert('Product added to cart!');
                        // Optionally redirect or update cart display
                    } else {
                        alert('Error adding to cart: ' + response);
                    }
                },
                error: function(xhr, status, error) {
                    alert('AJAX error: ' + error);
                }
            });
        });
    });



    </script>

</html>