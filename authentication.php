<?php
session_start();
include 'connection/config.php';

if(isset($_POST['action'])){
    //Login Action
    if($_POST['action'] == 'login'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = run_query("SELECT * from users where email ='{$email}';");
        $user = mysqli_fetch_assoc($user); 
    
        if ($email == $user['email']) {
            if($user['password'] == (md5($password))){
                $_SESSION['username'] = $user['name'];
                //Login success
                echo '200';
            }else{
                //Icorrect password
                echo '405';
            }
        } else {
            echo '404';
            //Doesn't have and this email 
        }
    }
    //Signup Action
    if($_POST['action'] == 'signup'){
        $name = $_POST['lname'] .' '. $_POST['fname'] ;
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Check the exist email
        $findEmail = "SELECT * from users where email = '$email';";

        $result = run_query($findEmail);
        
        // $row = $result -> fetch_assoc();
        // echo $row['email'];
        $exist = false;
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                if(($row["email"] == $email)){
                    $exist = true;
                }
            }
        }
        if(!$exist){
            //Insert data to database.
            $pass = md5($password);
            $user ="insert into users (name, email, password, active)
                                values('{$name}','{$email}', '{$pass}', '1')
                ";
            $i = run_query($user);
            
            if($i > 0){
                $_SESSION['username'] = $name;
                echo "Create successfully";
            }else{
                echo "Failed to create!";
            }
        }else{
            //Exist email
            echo "404";
        }     
    }
    if($_POST['action'] == 'logout'){
        session_destroy();
        echo 'logout';
    }
    
}

?>