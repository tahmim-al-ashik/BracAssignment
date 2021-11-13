<?php
 $filepath = realpath(dirname(__FILE__));
 include_once $filepath.'/../library/Session.php';
 Session::init();
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/style.css" >

    <link  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>




    <title>Brac-JPGSPH Project</title>
</head>

<?php
 if(isset($_GET['action'])&& $_GET['action']== "logout"){
   Session::destroy();
 }
?>

<body>

    <nav class="navbar bd-dark navbar-dark navbar-custom">
        <div class="container-fluid">

            <a  class="navbar-brand ms-auto" style="color: white" target="_blank" href="https://www.facebook.com/Bangladesh-Health-Watch-BHW-109403770656047"><i class="fa fa-facebook"></i></a>
            <a  class="navbar-brand ms-1" style="color: white" target="_blank" href="https://www.linkedin.com/in/bangladesh-health-watch-4800ab206/"><i class="fa fa-linkedin"></i></a>
            <a  class="navbar-brand ms-1" style="color: white" target="_blank" href="https://www.youtube.com/channel/UC0Uf5r2je-CQG-506n0l5_g"><i class="fa fa-youtube"></i></a>

        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
        <div class="container">
            <a href="https://bangladeshhealthwatch.org">

                <img class="logo " src="assets/images/logo.png"  alt="BHW Logo Image">
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <?php
                    $id = Session::get("id");
                    $userlogin =Session::get("login");
                    if($userlogin==true){
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $id;?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">Logout</a>
                    </li>

                    <?php } else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                   <?php } ?>



                    <!--                <li class="nav-item dropdown">-->
                    <!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                    <!--                        Dropdown link-->
                    <!--                    </a>-->
                    <!--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
                    <!--                        <li><a class="dropdown-item" href="#">Action</a></li>-->
                    <!--                        <li><a class="dropdown-item" href="#">Another action</a></li>-->
                    <!--                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                    <!--                    </ul>-->
                    <!--                </li>-->
                </ul>
            </div>


        </div>
    </nav>
    <div class="container-fluid">