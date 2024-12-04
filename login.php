<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is login then redirect to authenticated page
    */
    if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])){
        header('location: ./renter/browse.php');
        exit;
    }

    //if the login button is clicked
    require_once './user.classes/user.class.php';    
    
    if (isset($_POST['login'])) {
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        if ($user->sign_in_user()){
            $_SESSION['user_id'] = $user->id;
            header('location: ./renter/browse.php');
            exit;
        }else{
            $error =  'Invalid email/password. Try again.';
        }
    }
    
    //if the above code is false then html below will be displayed
?>
<!DOCTYPE html>
<html lang="en">
    <?php $title = 'Log In';
    require_once './user.classes/functions.php';    
    ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Rentbox</title>
        <link rel="icon" type="image/png" href="renter/images/rb logo white.png">
        <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
    </head>
    <style>
    </style>
    
    <body>
        <?php
        require_once 'includes/navbar.php';
        ?>
        
        <hr class="m-0 p-0">
        
        <main class="container-fluid">
            <div class="container-fluid">
                <div class="card mx-auto my-5 border border-0" style="width:500px;">

                    <form action="" method="post">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="text-center mt-4 mb-3 fw-bold">Login</h5>
                            <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                                <input type="email" class="form-control ps-4 rounded-5" id="email" name="email" placeholder="Email" 
                                value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                <label for="email" class="ps-4">Email</label>
                            </div>
                            
                            <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                                <input type="password" class="form-control ps-4 rounded-5" id="password" name="password" placeholder="Password" 
                                value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                                <label for="password" class="ps-4">Password</label>
                            </div>
                        
                            <div class="d-flex mb-3 mx-4 justify-content-between" style="font-size: 12px;">
                                <a class="text-secondary" href="signup.php">Create an account</a>
                                <a class="text-secondary" href="">Forgot Password?</a>
                            </div>
                            
                            <button type="submit" class="btn btn-success just rounded-5 mx-5 my-3 shadow" href="renter/">Login</button>
                            <?php
                            if (isset($_POST['login']) && isset($error)){
                            ?>
                                <p class="text-danger mt-3 text-center"><?= $error ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </form>

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