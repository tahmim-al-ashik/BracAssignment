<?php
include "includes/header.php";
include "library/User.php";
Session::checLogin();

?>

<?php

 $user = new User();
  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    $userLogin = $user->userLogin($_POST);
}
?>


<div class="loginform">
    <div class="container">

        <div class="container h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>


                                    <?php
                                    if(isset($userLogin)){
                                        echo $userLogin;
                                    }
                                    ?>

                                    <form class="mx-1 mx-md-4" action="" method="post">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" name="password" class="form-control" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                                        </div>

                                        <p class="text-start ">Need an account? <a href="registration.php" style="color: blue; font-weight: bold">Sign Up</a> </p>


                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 demoimage">

                                    <img src="assets/images/loin.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>


    </div>
</div>
<br>
<br>
<br>
<br>


<?php
include "includes/footer.php"
?>
