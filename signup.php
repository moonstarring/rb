<?php

    require_once './user.classes/user.class.php';
    require_once './user.classes/functions.php';

    if(isset($_POST['signup'])){

        $user = new User();
        //sanitize
        $user->name = htmlentities($_POST['name']);
        $user->email = htmlentities($_POST['email']);
        $user->email_verified_at = htmlentities($_POST['email']);
        $user->password = htmlentities($_POST['password']);
        $user->remember_token = htmlentities($_POST['remember_token']);
        $user->created_at = htmlentities($_POST['created_at']);
        $user->updated_at = htmlentities($_POST['updated_at']);
        $user->role = htmlentities($_POST['role']);


        //validate
        if (validate_field($user->name) &&
        validate_field($user->email) &&
        validate_field($user->password) &&
        validate_password($user->password) &&
        validate_cpw($user->password, $_POST['confirmpassword']) &&
        validate_email($user->email) && !$user->is_email_exist()){
            if($user->add()){
                $message = 'Welcome!';
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $title = 'Sign Up'; 
        require_once './user.classes/functions.php';?>

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
    
        <main class="container-fluid">
            <div class="container-fluid">
                <div class="card mx-auto mb-5 border border-0" style="width:500px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="text-center mt-4 fw-bold">Sign Up</h5>
                        <?php
                            if(isset($_POST['signup']) && isset($message)){
                        ?>
                                <div class="alert alert-success my-1 mb-3 text-center" role="alert">
                                    <?= $message ?>
                                </div>
                        <?php
                            }
                        ?>
                        <!-- <h6 class="text-center mb-4">Welcome!</h6> -->
                       <form action="" method="post">
                        <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                            <input type="email" class="form-control ps-4 rounded-5" id="email" name="email" placeholder="Email" 
                            value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            <label for="email" class="ps-4">Email</label>
                            <?php
                               $new_user = new User();
                               if(isset($_POST['email'])){
                                    $new_user->email = htmlentities($_POST['email']);
                               }else{
                                    $new_user->email = '';
                               }

                                if(isset($_POST['email']) && strcmp(validate_email($_POST['email']), 'success') != 0){
                            ?>
                                    <p class="text-danger my-1"><?php echo validate_email($_POST['email']) ?></p>
                            <?php
                                }else if ($new_user->is_email_exist() && $_POST['email']){
                            ?>
                                    <p class="text-danger my-1">Email already exist</p>
                            <?php      
                                }
                            ?>
                        </div>
                         
                        <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                            <input type="text" class="form-control ps-4 rounded-5" id="name" name="name" placeholder="First Name" 
                            value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>">
                            <label for="name" class="ps-4">Name</label>
                        </div>
                
                        <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                            <input type="password" class="form-control ps-4 rounded-5" id="password" name="password" placeholder="Password" 
                            value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                            <label for="password" class="ps-4">Password</label>
                            <?php
                                if(isset($_POST['password']) && validate_password($_POST['password']) !== "success"){
                            ?>
                                    <p class="text-danger my-1"><?= validate_password($_POST['password']) ?></p>
                            <?php
                                }
                            ?>
                        </div>

                        <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                            <input type="password" class="form-control ps-4 rounded-5" id="confirmpassword" name="confirmpassword" placeholder="Password" 
                            value="<?php if(isset($_POST['confirmpassword'])){ echo $_POST['confirmpassword']; } ?>">
                            <label for="confirmpassword" class="ps-4">Confirm Password</label>
                            <?php
                                if(isset($_POST['password']) && isset($_POST['confirmpassword']) && !validate_cpw($_POST['password'], $_POST['confirmpassword'])){
                            ?>
                                    <p class="text-danger my-1">Your confirm password didn't match</p>
                            <?php
                                }
                            ?>
                        </div>
                        

                        <div class="d-flex mb-3 mx-4 justify-content-center" style="font-size: 12px;">
                            <p>Have an Account?
                                <a class="text-secondary" href="renter/browse.php">Log in</a>
                            </p>
                        </div>

                        <button type="submit" name="signup" class="btn btn-success just rounded-5 mx-5 my-3 shadow">Create Account</button>
                        <div class="d-flex mb-3 mx-4 justify-content-center" style="font-size: 12px;">
                            <p>
                            Signing up for a Rentbox account means you agree to the <a href=""class="text-secondary">Privacy Policy</a> and <a href=""class="text-secondary">Terms of Service</a>
                            </p>
                        </div>




                        <input type="hidden" name="remember_token" value="">  <!-- Hidden field -->
                        <input type="hidden" name="created_at" value="">      <!-- Hidden field -->
                        <input type="hidden" name="updated_at" value="">      <!-- Hidden field -->
                        <input type="hidden" name="role" value="renter">       <!-- RENTER default role --> 
                        </form>
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