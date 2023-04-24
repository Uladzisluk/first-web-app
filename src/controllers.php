<?php
require_once 'business.php';
require_once 'functions.php';

function clear() {
     clearDbState();
     return 'redirect:galeria_login?dbclear=true';
}

function galeria(&$model) {


    //to make pages ang photos on page
    $images = getImages();
    makePages($model, $images);



    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
        $model['account'] = getAccount($_SESSION['account_id']);
        return 'galeria';
    }
    else return 'redirect:galeria_login';
}

function logout(&$model) {


    //to make pages ang photos on page
    $images = getImages();
    makePages($model, $images);


    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
        session_destroy();
        setcookie('PHPSESSID', "", time() - 3600);
        return 'redirect:galeria_login?logout=passed';
    } 
    return 'redirect:galeria_login?logout=failed';
}

function login(&$model) {
    

    //to make pages ang photos on page
    $images = getImages();
    makePages($model, $images);


    if(isset($_GET['logout'])) {
        $model['logout'] = $_GET['logout'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
             $model['account'] = getAccount($_SESSION['account_id']);
            return 'redirect:galeria';
        } else {
            return 'login';
        }
    } else {
        if(isset($_POST['register'])) {
            $regResult = verifyRegistrationForm($_POST);
            $model['regResult'] = $regResult;
            if($model['regResult']==0) return 'galeria_login';
            return 'registration';
        } else {
            if(verifyLoginForm($_POST)) {
                $model['account'] = getAccount($_SESSION['account_id']);
                return 'redirect:galeria';
            } else {
                $model['logError'] = true;
                return 'galeria_login';
            }

        }
    }

}

function index_view(&$model){
    return 'index_view';
}

function wstep_view(&$model){
    return 'wstep_view';
}

function ekwipunek_view(&$model){
    return 'ekwipunek_view';
}

function ostszerzenia_view(&$model){
    return 'ostszerzenia_view';
}

function galeria_login(&$model){
   
   
    //to make pages ang photos on page
    $images = getImages();
    makePages($model, $images);


    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
        $model['account'] = getAccount($_SESSION['account_id']);
        return 'redirect:galeria';
    }
    else return 'galeria_login';
}

function register(&$model){
    unset($_SESSION["e_empty"]);
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
        $model['account'] = getAccount($_SESSION['account_id']);
        return 'redirect:galeria';
    }
    else return 'registration';
}

function upload(&$model){

    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        unset($_SESSION["e_empty"]);
        $uplResult = verifyUploadForm($_POST);
        $model['uplResult'] = $uplResult;
        
        
        //to make pages ang photos on page
        $images = getImages();
        makePages($model, $images);


        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
            $model['account'] = getAccount($_SESSION['account_id']);
            header('Location: /galeria');
            return 'galeria';
        }
        else{
            header('Location: /galeria_login');
            return 'galeria_login';
        }
    }else{
        unset($_SESSION["e_size"]);
        unset($_SESSION["e_type"]);
        unset($_SESSION["e_exist"]);
        unset($_SESSION["e_upload"]);
        unset($_SESSION["e_watermark"]);
        unset($_SESSION["e_title"]);
        unset($_SESSION['e_author']);
        $_SESSION["e_empty"] = "Nie załodowałeś pliku";
        
        //to make pages ang photos on page
        $images = getImages();
        makePages($model, $images);

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
            $model['account'] = getAccount($_SESSION['account_id']);
            header('Location: /galeria');
            return 'galeria';
        }
        else{
            header('Location: /galeria_login');
            return 'galeria_login';
        }
    }
}

function privacy(&$model){
    setPrivacy($_POST);
    header('Location: /galeria');
    return 'galeria';
}

