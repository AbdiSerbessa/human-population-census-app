<?php

session_start();

include_once "config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if ( !$connection ) {
    echo mysqli_error( $connect );
    throw new Exception( "Database cannot Connect" );
}
$action = $_REQUEST['action'] ?? '';

if ( 'login' == $action ) {
    $email = $_REQUEST['email'] ?? '';
    $password = $_REQUEST['password'] ?? '';
    $role = $_REQUEST['role'] ?? '';
    
    if ( $email && $password && $role ) {
        if($role=='admins')
        {
            $query = "SELECT * FROM {$role} WHERE email='{$email}'";
        }
        else {
            $query = "SELECT * FROM {$role} WHERE email='{$email}' and status=1";
        }
        
        
        $result = mysqli_query( $connection, $query ) or die (mysqli_error($connection));

        if ( $data = mysqli_fetch_assoc($result) ) {
            
            $_passsword = $data['password'] ?? '';
            $_email = $data['email'] ?? '';
            $_role = $data['role'] ?? '';
            $_id = $data[$_role.'_id'] ?? '';
            
            if ( password_verify( $password, $_passsword ) ) {
                $_SESSION['role'] = $_role;
                $_SESSION['id'] = $_id;
                $_SESSION['email'] = $_email;
                
                
                header( "location:cms.php" );
                die();
            }
            else{
                header( "location:login.php?error" );
            
            }
        } else {
            header( "location:login.php?error" );
        }

    }
}
