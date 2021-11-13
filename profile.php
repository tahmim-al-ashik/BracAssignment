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
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
$updateuser = $user->updateUserData($userid,$_POST);

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
                               if(isset($updateuser)){
                                   echo $updateuser;
                               }
                               }
                               ?>

                                <?php
                                $userdata = $user ->getUserById($userid);
                                if($userdata){
                                ?>

                                <form class="mx-1 mx-md-4" action="" method="post">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $userdata->name;?>" />
                                            <label class="form-label" for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="username"  name="username" class="form-control" value="<?php echo $userdata->username;?>" />
                                            <label class="form-label" for="username">Your User Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $userdata->email;?>" />
                                            <label class="form-label" for="email">Your Email</label>
                                        </div>
                                    </div>

                                    <?php
                                    $sesid = Session::get("id");
                                    if($userid == $sesid){
                                    ?>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name="update" class="btn btn-primary btn-lg">Update</button>
                                    </div>

                                    <?php } ?>
                                    <?php
                                    $sesid = Session::get("id");
                                    if($userid == $sesid){
                                    ?>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <a  href="changepass.php?id=<?php echo $userid;?>" style="color:red;">Change Password</button> </a>
                                    </div>
                                    <?php } ?>

                                </form>

                                <?php
                                }
                                ?>

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
