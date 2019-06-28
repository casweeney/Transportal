<?php

    header("Content-type:application/json;charset=utf-8");
    ob_start();
    require_once("app/controller.php");
    require_once("app/session.php");

    $error = false;
    $email = Database::escaped_string($_POST['email']);
    $pwd = Database::escaped_string($_POST['pwd']);
    $hash = sha1(md5($pwd));

    if(empty($email) || empty($pwd)){
        $error = true;
    }

    if($error == false){
        $sql = Admin::authenticate($email, $hash);
        if($sql){
            $admin_session->login($sql);
            $data['response'] = "success";
            $data['content'] = "Sign in successful";
        }else{
            $data['response'] = "error";
            $data['content'] = "Login failed, try again!";
        }
    }else{
        $data['response'] = "error";
        $data['content'] = "All fields required";
    }

    echo json_encode($data);