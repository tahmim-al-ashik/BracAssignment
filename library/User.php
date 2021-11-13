<?php

include_once 'Session.php';
include 'ProjectDatabase.php';

class User{
    private $db;

    public function __construct(){
        $this->db= new ProjectDatabase();

    }
    public function userRegistration($data){
        $name =$data['name'];
        $username =$data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $check_email = $this->emailCheck($email);

        if($name == "" OR $username == "" OR $password == ""){
            $msg =" <div class ='alert-danger'><strong>Error!</strong>Filed must not be emplty</div>";
            return $msg;
        }
        elseif (strlen($username)< 3){
            $msg =" <div class ='alert-danger'><strong>Error!</strong>Filed must not be less than 3</div>";
            return $msg;

        }
        elseif (preg_match('/[^a-z0-9_-]+/i',$username) ){
            $msg =" <div class ='alert-danger'><strong>Error!</strong>User should be use alphanumeric dash and underscores</div>";
            return $msg;

        }
        elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){

            $msg =" <div class ='alert-danger'><strong>Error!</strong>The email address is not valid</div>";
             return $msg;

        }
        elseif ($check_email== true){
            $msg =" <div class ='alert-sucess'><strong>Done!!</strong>email successful</div>";
            return $msg;

        }
        $sql = "INSERT INTO users( name, username, email, password ) VALUES( :name, :username, :email, :password  )";
        $password = md5($data['password']);
        $query = $this->db->pdo->prepare($sql);
        $query -> bindValue(':name', $name);
        $query -> bindValue(':username', $username);
        $query -> bindValue(':email', $email);
        $query -> bindValue(':password', $password);
        $result =  $query ->execute();

        if ($result) {

            $msg = "<div class='alert alert-success'><strong>Thank your! </strong>You have been successfully registered!</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Sorry! </strong>there has been problem with your data!</div>";
            return $msg;
        }

    }

    public function emailCheck($email){
        $sql  = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt ->bindValue(':email', $email);
        $stmt ->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getLoginUser($email,$password){
        $sql = "SELECT * FROM users WHERE email =:email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);

    }


    public function userLogin($data){
        $email = $data['email'];
        $password = md5($data['password']);
        $check_email = $this->emailCheck($email);

        if( $email == "" OR $password == "" ){
            $msg =" <div class ='alert-danger'><strong>Error!</strong>Filed must not be emplty</div>";
            return $msg;
        }

        elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){

            $msg =" <div class ='alert-danger'><strong>Error!</strong>The email address is not valid</div>";
            return $msg;

        }

        elseif ($check_email== false){
            $msg =" <div class ='alert-sucess'><strong>sorry</strong>email is not registered</div>";
            return $msg;

        }
        $result = $this->getLoginUser($email,$password);


        if($result){
            Session::init();
            Session::set("login",true);
            Session::set("id",$result->id);
            Session::set("name", $result->name);
            Session::set("username",$result->username);
            Session::set("loginmsg", "<div class='alert alert-success'><strong>Success</strong>You are successfully logged in</div>");
            header("Location:index.php");


        }else{
            $msg ="<div class='alert alert-danger'><strong>Error</strong>Data not found!</div>";
            return $msg;
        }

    }
    public function getUserData(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query->fetchAll();
        return $result;

    }
    public function getUserById($id){

        $sql = "SELECT * FROM users WHERE id= :id LIMIT 1 ";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id',$id);
         $query -> execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;


    }
    public function updateUserData($id,$data){
        $name =$data['name'];
        $username =$data['username'];
        $email = $data['email'];
        if($name == "" OR $username == "" OR $email == "" ){
            $msg =" <div class ='alert-danger'><strong>Error!</strong>Filed must not be emplty</div>";
            return $msg;
        }




        $sql = "UPDATE users set name= :name, username= :username,    email = :email WHERE id = :id";
        $query = $this->db->pdo->prepare($sql);
        $query -> bindValue(':id', $id);
        $query -> bindValue(':name', $name);
        $query -> bindValue(':username', $username);
        $query -> bindValue(':email', $email);

        $result =  $query ->execute();

        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Thank your! </strong>You have been successfully Updated!</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Sorry! </strong>there has been problem with your data!</div>";
            return $msg;
        }

    }
    public function updatePassword($id, $data){
        $old_pass = $data['old_pass'];
        $new_pass = $data ['new_pass'];
        if($old_pass =="" OR $new_pass == ""){
            $msg="<div class='alert alert-danger'><strong>Error! Field must not be empty!</strong></div>";
            return $msg;
        }

    }





}

?>