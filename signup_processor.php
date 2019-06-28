<?php

    header("Content-type:application/json;charset=utf-8");
    ob_start();
    require_once("app/controller.php");

    $error = false;
    $fname = Database::escaped_string($_POST['fname']);
    $lname = Database::escaped_string($_POST['lname']);
    $email = Database::escaped_string($_POST['email']);
    $pwd = Database::escaped_string($_POST['pwd']);
    $cpwd = Database::escaped_string($_POST['cpwd']);
    $hash = sha1(md5($pwd));
    $phone = Database::escaped_string($_POST['phone']);
    $gender = Database::escaped_string($_POST['gender']);
    $state_of_origin = Database::escaped_string($_POST['state_of-origin']);
    $address = Database::escaped_string($_POST['address']);
    $next_of_kin = Database::escaped_string($_POST['next_of_kin']);
    $id_mode = Database::escaped_string($_POST['id_mode']);
    $id_number = Database::escaped_string($_POST['id_number']);
    $date = date("d-m-Y");

    if(empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($cpwd) || empty($phone) || empty($address) || empty($next_of_kin) || empty($id_number)){
        $error = true;
    }
    elseif($gender === "Gender" || $state_of_origin === "State of Origin" || $id_mode === "Mode of Identification"){
        $error = true;
    }

    if($pwd !== $cpwd){
        $data['response'] = "error";
        $data['content'] = "Password mismatch";
    }
    elseif(!Method::single_email_validator($email)){
        $data['response'] = "error";
        $data['content'] = "Type a valid email";
    }
    elseif(!Method::numbers_only($phone)){
        $data['response'] = "error";
        $data['content'] = "Only numbers required";
    }
    elseif($error == false){
        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $result = Database::query($sql);
        if($result->num_rows > 0){
            $data['response'] = "error";
            $data['content'] = "Email already exist";
        }else{
            $sql = "INSERT INTO users(firstname,lastname,email,password,phone,gender,state_of_origin,address,next_of_kin,mode_of_id,id_number,reg_date) VALUES('$fname', '$lname', '$email', '$hash', '$phone', '$gender', '$state_of_origin', '$address', '$next_of_kin', '$id_mode', '$id_number', '$date')";
            $result = Database::query($sql);
            if($result){
                $data['response'] = "success";
                $data['content'] = "Sign up successful";
            }else{
                $data['response'] = "error";
                $data['content'] = "Sign up failed, try again";
            }
        }
    }else{
        $data['response'] = "error";
        $data['content'] = "All fields required";
    }

    echo json_encode($data);
