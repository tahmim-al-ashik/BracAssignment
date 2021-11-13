<?php
include "includes/header.php";
include "library/user.php";
Session::checkSession();
$user = new User();
?>
<?php
  $loginmsg = Session::get("loginmsg");
  if(isset($loginmsg)){
      echo $loginmsg;
  }
  Session::set("loginmsg" , NULL);
?>
<div class="card">
    <div class="card-body text-center">
        Welcome <strong style="color: red; font-family: 'Harlow Solid Italic'"><?php
        $name = Session::get("name");
        if (isset ($name)){
            echo $name;
        }
        ?>
            !
        </strong>

    </div>
</div>


<div class="table-responsive">
<table class="table table-striped">
    <div style="overflow-x:auto;width: 100%">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
        <tbody>

        <?php
        $user = new User();
        $userdata = $user->getUserData();
        if($userdata){
            $i=0;
            foreach ($userdata as $data){
                $i++;
                ?>
                <tr>

                    <td> <?php echo $i; ?></td>
                    <td> <?php echo $data ['name'];?></td>
                    <td><?php echo $data ['username'];?></td>
                    <td><?php echo $data ['email'];?></td>
                    <td><a href="profile.php?id=<?php echo $data ['id'];?>"><button type="button" class="btn btn-primary">view</button></a> </td>
                </tr>


         <?php   }} else{ ?>

            <tr><td colspan="5">No User Data Found</td></tr>

            <?php } ?>

    </tbody>
    </div>
</table>
</div>


<?php
include "includes/footer.php";
?>