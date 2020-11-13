<?php
function validateUser($user)
{
    $errors = array();
        
    if(empty($user['username'])){
        array_push($errors, 'Username is Required');
    }
    if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Email is NOT valid');
    }
    if(empty($user['email'])){
        array_push($errors, 'Email is Required');
    }
    if(empty($user['password'])){
        array_push($errors, 'Password is Required');
    }

    if($user['passwordConf'] !== $user['password']){
        array_push($errors, 'Password Do Not Match ');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email already exists');
        }
    }
    $existingUser = selectOne('users', ['username' => $user['username']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Username already exists');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Username already exists');
        }
    }  

    return $errors;
}


function validateLogin($user)
{
    $errors = array();
        
    if(empty($user['username'])){
        array_push($errors, 'Username is Required');
    }
    if(empty($user['password'])){
        array_push($errors, 'Password is Required');
    }

    return $errors;
}
function validateDetails($user)
{
    $errors = array();

    if(empty($user['First_Name'])){
        array_push($errors, 'First Name is Required');
    }
    if(empty($user['Last_Name'])){
        array_push($errors, 'Last Name is Required');
    }
    if(empty($user['gender'])){
        array_push($errors, 'Select Your Gender');
    }    
    if(empty($user['Age'])){
        array_push($errors, 'Age is Required');
    }
    if(empty($user['DOB'])){
        array_push($errors, 'Date of Birth is Required');
    }
    if(empty($user['Contact'])){
        array_push($errors, 'Contact is Required');
    }

    return $errors;
}
?>