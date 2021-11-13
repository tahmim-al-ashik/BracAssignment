<?php
include 'library/user.php';
include "includes/header.php";
Session::checkSession();
?>
<?php
if(isset($_GET['id'])){
    $userid = (int)$_GET['id'];
}
$user = new User();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepass'])){
$updatepass = $user->updatePassword($userid,$_POST);

?>

<div class="regisform">

    <div class="container h-100">

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">You Are Logged in As:</p>
                                <?php
                                if(isset($updatepass)){
                                    echo $updatepass;
                                }
                                }
                                ?>

                                    <form class="mx-1 mx-md-4" action="" method="post">


                                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                                <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                                                                <div class="form-outline flex-fill mb-0">
                                                                                    <input type="password" id="old_pass" name="old_pass" class="form-control" value="" />
                                                                                    <label class="form-label" for="old_pass">Old Password</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                                <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                                                                                <div class="form-outline flex-fill mb-0">
                                                                                    <input type="password" id="new_pass" name="new_pass" class="form-control" required="" />
                                                                                    <label class="form-label" for="new_pass">New Password</label>
                                                                                </div>
                                                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="updatepass" class="btn btn-primary btn-lg">Update</button>
                                            </div>

                                    </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
<br>
<br>
<br>
<br>

<?php

include "includes/footer.php"

?>
