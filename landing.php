<?php
session_start();
require_once 'db/db.php';

if (isset($_SESSION['id'])) {
    if ($_SESSION['role'] === 'No') {
        header('Location: renter/browse.php');
        exit();
    } elseif ($_SESSION['role'] === 'Yes') {
        header('Location: owner/dashboard.php');
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Rentbox</title>
        <link rel="icon" type="image/png" href="images\rb logo white.png">
        <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
        <link rel="stylesheet" href="other.css">
    </head>
    <body>
        <?php
        require_once 'includes\navbar.php';
        ?>
        
        <hr class="m-0 p-0">
        <header class="container-fluid pt-5">
            <div class="container pt-1">
                <form class="d-flex my-lg-0">
                <input class="form-control input-group-text shadow-sm rounded-pill ps-4 py-2 border" type="text" placeholder="Search" id="searchInput"/>
                    <button class="btn btn-success ms-4 me-3 my-sm-0 rounded-circle d-flex align-items-center ms-2 shadow" type="submit">
                    <i class="bi bi-search text-white" style="font-size: 20px;"></i>
                    </button>
                </form>
            </div>
            <div class="container px-4 px-lg-5 my-lg-5">
                <div class="text-center">
                    <h1 class="display-4 fw-bolder">Rent Gadgets, Your Way</h1>
                    <p class="lead fw-normal mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur exercitationem, reiciendis optio ex veritatis voluptatum quibusdam dignissimos. Recusandae ipsam nam eius placeat, enim praesentium accusamus dolor adipisci et dolores laborum?</p>
                </div>
            </div>
        </header>
        <hr>

        <!--items-->
        <div class="album rounded-4 my-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <div class="col">
                        <a href="" class="card rounded-5 text-decoration-none">
                        <img src="images/laptop.png" class="bd-placeholder-img rounded-top-5 card-img-top" alt="item" width="100%" height="255px" style="object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-end">
                                    <h5 class="card-title mb-0 me-2">ACER Swift 3</h5>
                                    <small class="text-body-secondary ms-0">Laptop</small>  
                                </div>
                                <img class="pfp rounded-circle img-thumbnail" src="images/pfp.png" alt="pfp" height="40px" width="40px" style="object-fit: contain;">
                            </div>
                            <h6 class="card-subtitle mb-2 text-success">PHP 200
                            <small class="text-body-secondary">/day</small>
                            </h6>
                            <div class="d-flex gap-1 align-items-center">
                                <i class="bi bi-star-fill text-warning"></i>
                                <small class="text-body-secondary border-end pe-2">5</small>
                                <i class="bi bi-geo-alt-fill ps-2 text-warning"></i>
                                <small class="text-body-secondary">Tetuan, Zamboanga City</small>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="item.php" class="card rounded-5 text-decoration-none">
                        <img src="images/laptop.png" class="bd-placeholder-img rounded-top-5 card-img-top" alt="item" width="100%" height="255px" style="object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-end">
                                    <h5 class="card-title mb-0 me-2">ACER Swift 3</h5>
                                    <small class="text-body-secondary ms-0">Laptop</small>  
                                </div>
                                <img class="pfp rounded-circle img-thumbnail" src="images/pfp.png" alt="pfp" height="40px" width="40px" style="object-fit: contain;">
                            </div>
                            <h6 class="card-subtitle mb-2 text-success">PHP 200
                            <small class="text-body-secondary">/day</small>
                            </h6>
                            <div class="d-flex gap-1 align-items-center">
                                <i class="bi bi-star-fill text-warning"></i>
                                <small class="text-body-secondary border-end pe-2">5</small>
                                <i class="bi bi-geo-alt-fill ps-2 text-warning"></i>
                                <small class="text-body-secondary">Tetuan, Zamboanga City</small>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="item.php" class="card rounded-5 text-decoration-none">
                        <img src="images/laptop.png" class="bd-placeholder-img rounded-top-5 card-img-top" alt="item" width="100%" height="255px" style="object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-end">
                                    <h5 class="card-title mb-0 me-2">ACER Swift 3</h5>
                                    <small class="text-body-secondary ms-0">Laptop</small>  
                                </div>
                                <img class="pfp rounded-circle img-thumbnail" src="images/pfp.png" alt="pfp" height="40px" width="40px" style="object-fit: contain;">
                            </div>
                            <h6 class="card-subtitle mb-2 text-success">PHP 200
                            <small class="text-body-secondary">/day</small>
                            </h6>
                            <div class="d-flex gap-1 align-items-center">
                                <i class="bi bi-star-fill text-warning"></i>
                                <small class="text-body-secondary border-end pe-2">5</small>
                                <i class="bi bi-geo-alt-fill ps-2 text-warning"></i>
                                <small class="text-body-secondary">Tetuan, Zamboanga City</small>
                            </div>
                        </div>
                        </a>
                    </div>
                
                </div>
            </div>
        </div>
        <hr>   
    <?php
        require_once 'includes\footer.html';
    ?>    
    </body>
<script src="vendor\bootstrap-5.3.3\dist\js\bootstrap.bundle.min.js"> </script>
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