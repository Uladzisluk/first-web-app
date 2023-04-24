<?php

require_once "functions.php";

use MongoDB\BSON\ObjectID;


function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function clearDbState() {
    $db = get_db();

    $db->users->deleteMany(['login' => ['$regex' => '']]);
    $db->images->deleteMany(['name' => ['$regex' => '']]);
}

function verifyRegistrationForm($postArr) {

    if($postArr['email'] === '' ) {
        return 1;
    }

    if($postArr['login'] === '') {
        return 2;
    }

    if($postArr['password'] === '') {
        return 3;
    }    

    if($postArr['r_password'] === ''){
        return 4;
    }

    if($postArr['password'] !== $postArr['r_password']) {
        return 5;
    }

    $hash = password_hash($postArr['password'], PASSWORD_DEFAULT);

    $account = [
        'email' => $postArr['email'],
        'login' => $postArr['login'],
        'password' => $hash,
        'photo_privacy' => 'public'
    ];
    
     $db = get_db();

     $current = getAccount($postArr['login']);
     
     if($current === NULL){ 
         $db->users->insertOne($account);
         return 0;
     } else{
        return 6;
     }

}

function verifyLoginForm($postArr) {
    unset($_SESSION["e_empty"]);

    $login = $postArr['login'];
    $password = $postArr['password'];

    $db = get_db();

    $user = $db->users->findOne(['login' => $login]);
    
    if($user !== null && password_verify($password, $user['password'])) {
        $_SESSION["logged_in"] = 1;
        $_SESSION["account_id"] = $login;
        return true;
    }

    return false;

}

function getAccount($login) {
     $db = get_db();
    return $db->users->findOne(['login' => $login]);
}

function getImages(){
    $db = get_db();
    $images = $db->images->find();
    return $images;
}

function getIndex(){
    $db = get_db();
    $index = 0;
    $images = $db->images->find();
    foreach($images as $image){
        if($image['index']===$index) $index++;
    }
    return $index;
}

function verifyUploadForm($postArr){
    $db = get_db();
    $allowedImgTypes = array('png', 'jpg');
    $target_dir = "images/originals/";
    $watermark_dir = "images/watermarks/";
    $mini_dir = "images/mini/";
    $resultCode = 0;
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=1) $privacy = 'public';
    else{
        $account_id = $_SESSION['account_id'];
        $user = $db->users->findOne(['login' => $account_id]);
        $privacy = $user['photo_privacy'];
    }

    if (filesize($_FILES['file']['tmp_name']) > 1048576 || $_FILES["file"]["error"] == 1) {
        $_SESSION["e_size"] = "Rozmiar pliku nie może przekraczać 1 MB";
        $resultCode = 1;
    }else unset($_SESSION["e_size"]);

    if(!in_array($fileType, $allowedImgTypes)) {
        $_SESSION["e_type"] = "Typ pliku ma być PNG lub JPG";
        $resultCode = 1;
    }else unset($_SESSION["e_type"]);
    
    if(file_exists($target_file)){
        $_SESSION["e_exist"] = "Taki plik już istnieje";
        $resultCode = 1;
    }else unset($_SESSION["e_exist"]);

    if($postArr['watermark'] === ''){
        $_SESSION["e_watermark"] = "Nie ustawiłeś znaku wodnego";
        $resultCode = 1;
    }else unset($_SESSION["e_watermark"]);

    if($postArr['title'] === ''){
        $_SESSION["e_title"] = "Nie ustawiłeś tytułu";
        $resultCode = 1;
    }else unset($_SESSION["e_title"]);

    if($postArr['author'] === ''){
        $_SESSION["e_author"] = "Nie ustawiłeś autora";
        $resultCode = 1;
    }else unset($_SESSION["e_author"]);

    $index = getIndex();

    if($resultCode == 0){
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) || $resultCode == 5) {
            $_SESSION["e_upload"] = "Problem z przechowywaniem pliku na stronie serwera";
            return false;
           } else {
             makeWatermark($postArr['watermark']);
             makeMini();
             unset($_SESSION["e_upload"]);
             $fileDbObject = [
               'index' => $index,
               'name' => $_FILES["file"]["name"],
               'location' => $target_dir.basename($_FILES["file"]["name"]),
               'watermark_location' => $watermark_dir.basename($_FILES["file"]["name"]),
               'mini_location' => $mini_dir.basename($_FILES["file"]["name"]),
               'title' => $postArr['title'],
               'author' => $postArr['author'],
               'privacy' => $privacy
             ];
         
             $db->images->insertOne($fileDbObject);

             return true;
           }
    }else return false;
}

function setPrivacy($postArr){
    $user_id = $_SESSION['account_id'];
    if(isset($postArr['visible'])){
        $privacy = $postArr['visible'];
    }
    $db = get_db();
    $user = $db->users->findOne(['login' => $user_id]);
    $user['photo_privacy'] = $privacy;
    $db->users->replaceOne(['login' => $user_id], $user);
    $db->images->updateMany(['author' => $user_id], ['$set' => ['privacy' => $privacy]]);
   
}