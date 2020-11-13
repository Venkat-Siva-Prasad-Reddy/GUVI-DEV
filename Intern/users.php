<?php 

include("db.php");
include("validateUser.php");



$table = 'users';
$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$firstname = '';
$lastname = ''; 
$Age = '';
$DOB = '';
$Contact = ''; 



function loginUser($user) 
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';
    header('location: index.php');
    exit();
}

if (isset($_POST['register-btn']) ) {
    $errors = validateUser($_POST);
    

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
        loginUser($user);
       
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
           array_push($errors, 'Wrong credentials');
        }  
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}
if (isset($_POST['details-btn'])) {
    $_POST['user_id'] = $_SESSION['id'];
    del('details',$_POST['user_id']);
    $errors = validateDetails($_POST);
    
    if (count($errors) === 0) {
        unset($_POST['details-btn']);
        $user_id = create('details', $_POST);
        $user = selectOne('details', ['id' => $user_id]);
        $_SESSION['message'] = 'Details updated successfully';
        $_SESSION['type'] = 'success';
        header('location: index.php');
        exit();
    }
    $firstname = $_POST['First_Name'];
    $lastname = $_POST['Last_Name'];
    $Age = $_POST['Age'];
    $DOB = $_POST['DOB'];
    $Contact = $_POST['Contact'];
}