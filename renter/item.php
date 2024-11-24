<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Rentbox</title>
        <link rel="icon" type="image/png" href="../images/rb logo white.png">
        <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../vendor/font/bootstrap-icons.css">
        <link rel="stylesheet" href="other.css">
    </head>
    <body>
    <?php
        require_once 'includes/navbar.php';
    ?>
    <!-- <hr class="m-0 p-0"> -->
    <div class="z-3 position-absolute top-0" style="margin-left: 35%;">
        <form class="d-flex my-4 " style="width:400px;">
            <input class="form-control input-group-text shadow-sm rounded-pill me-2 border" type="text" placeholder="Search" id="searchInput"/>
            <button class="btn btn-outline-success my-2 my-sm-0 rounded-circle d-flex align-items-center" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
    </div>

    <div class="bg-body-secondary p-4">      
        <main class="border bg-body mx-3 p-5 rounded-5 d-flex flex-row">
            
            <div id="carousel" class="carousel carousel-dark slide border mx-5">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                    <div class="carousel-inner d-flex" style="width: 600px; height: 300px;">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="../images/laptop.png" alt="image">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="../images/laptop.png" alt="image">
                        </div>
                        <div class="carousel-item">
                            <img src="../images/laptop.png" alt="image">
                        </div>
                    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon rounded-circle" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>



            <div class="container-fluid">
                <p>Link/Link/Link/TBA</p>
                <div class="d-flex align-items-end gap-2 mb-2">
                    <h1>Product Name</h1>  
                    <h6 class="text-body-secondary pb-1">Laptop</h6>  
                </div>

                <div class="d-flex gap-2 mb-2">
                    <a href=""><h5>5</h5></a>
                    <i class="bi bi-star-fill text-warning border-end pe-2"></i>

                    <a href=""><h5 class="text-primary">20</h5></a>
                    <h5 class="border-end pe-2">Ratings</h5>

                    <a href=""><h5 class="text-primary">21</h5></a>
                    <h5 class="pe-2">Rentals</h5>
                </div>

                <h3 class="bg-light-subtle text-success fw-bold p-2 mt-3 " style="width: 400px;">₱200</h3>
                
                <div class="d-flex gap-2 mt-4 mb-2 align-items-center">
                    <h6 class="me-5 text-body-secondary">Condition</h6>  
                    <p class="mb-0 border rounded border-success px-2 py-1 text-success">Good</p>
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

                <h5>Rental Period</h5>
                <div class="d-flex gap-2 justify-content-start my-1">
                    <button class="btn btn-light rounded-pill px-3" type="button">Light</button>
                </div>

                <button type="button" class="btn bg-light border" href="">Add to Cart</button>
                <button type="button" class="btn btn-success" href="checkout.php">Checkout</button>
            </div>
            

        </main>
    </div>
</body>
<script src="../vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    //search input 
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('focus', function() {
        this.classList.add('border-success');
    });

    searchInput.addEventListener('blur', function() {
        this.classList.remove('border-success');
    });
    
</script>
</html>