<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Rentbox</title>
        <link rel="icon" type="image/png" href="images\rb logo white.png">
        <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
    </head>
    <style>
    </style>
    
    <body>
        <?php
        require_once 'includes\navbar.php';
        ?>
        
        <hr class="m-0 p-0">
        
        <main class="container-fluid">
            <div class="container-fluid">
                <div class="card mx-auto my-5 border border-0" style="width:500px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="text-center mt-4 mb-3 fw-bold">Login</h5>
                        <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                            <input type="email" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="Email" >
                            <label for="floatingInput" class="ps-4">Email</label>
                        </div>
                        
                        <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                            <input type="password" class="form-control ps-4 rounded-5" id="floatingPassword" placeholder="Password" >
                            <label for="floatingPassword" class="ps-4">Password</label>
                        </div>

                        <div class="d-flex mb-3 mx-4 justify-content-between" style="font-size: 12px;">
                            <a class="text-secondary" href="signup.php">Create an account</a>
                            <a class="text-secondary" href="">Forgot Password?</a>
                        </div>

                        <button type="submit" class="btn btn-success just rounded-5 mx-5 my-3 shadow" href="renter/">Login</button>
                    </div>
                </div>

            </div>
        </main>






        
        <footer class="mt-5 px-3">
            <div class="d-flex flex-column flex-sm-row justify-content-between py-2 border-top">
                <p>© 2024 Rentbox. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                <li class="ms-3"><a href=""><i class="bi bi-facebook text-body"></i></a></li>
                <li class="ms-3"><a href=""><i class="bi bi-twitter-x text-body"></i></a></li>
                <li class="ms-3"><a href=""><i class="bi bi-linkedin text-body"></i></a></li>
                </ul>
            </div>
        </footer>
    </body>
<script src="vendor\bootstrap-5.3.3\dist\js\bootstrap.bundle.min.js"> </script>
<script>
</script>
</html>