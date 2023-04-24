<?php

function makeWatermark($watermark){
    $target_dir = "images/originals/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    list($width, $height) = getimagesize($target_file);
    $image_p = imagecreatetruecolor($width, $height);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    


    switch($fileType){
        case 'jpg': $newImg = imagecreatefromjpeg($target_file); break;
        case 'png': $newImg = imagecreatefrompng($target_file); break;
    }
    imagealphablending( $image_p, false );
    imagesavealpha( $image_p, true );
    imagecopyresampled($image_p, $newImg, 0, 0, 0, 0, $width, $height, $width, $height);

    $color = imagecolorallocate($image_p, 255, 255, 255);
    $font = "static/fonts/fontForWatermark.ttf";
    imagettftext($image_p, 20, 0, 10, 30, $color, $font, $watermark);


    switch($fileType){
        case 'jpg': imagejpeg($image_p, "images/watermarks/" . $_FILES["file"]["name"]); break; 
        case 'png': imagepng($image_p, "images/watermarks/" . $_FILES["file"]["name"]); break;
    }
    
}

function makeMini(){
    $h_o = 125;
    $w_o = 200;
    $target_dir = "images/watermarks/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    list($width, $height) = getimagesize($target_file);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    switch($fileType){
        case 'jpg': $newImg = imagecreatefromjpeg($target_file); break;
        case 'png': $newImg = imagecreatefrompng($target_file); break;
    }

    $image_p = imagecreatetruecolor($w_o, $h_o);
    imagecopyresampled($image_p, $newImg, 0, 0, 0, 0, $w_o, $h_o, $width, $height);

    switch($fileType){
        case 'jpg': imagejpeg($image_p, "images/mini/" . $_FILES["file"]["name"]); break; 
        case 'png': imagepng($image_p, "images/mini/" . $_FILES["file"]["name"]); break;
    }
    imagedestroy($newImg);
    imagedestroy($image_p);
}

function printPhotos($images){
    foreach($images as $image){
        echo "<div style='float:left; margin: 10px;'><img src='" . $image['mini_location'] . "' alt = '" . $image['name'] . "' class='explicphoto'><p style='text-align:center; margin:0;'><b>Tytuł:</b>".$image['title']."</p></br><p style='text-align:center; margin:0;'><b>Autor:</b>".$image['author']."</p></div>";
    }
    echo "<div style='clear:both;'/>";
}

function printPhotosForUsers($images){
    
    foreach($images as $image){
        if($image['privacy'] == 'private') $privacy = 'Prywatne zdjęcie';
        else $privacy = '';
        echo "<div style='float:left; margin: 10px;'><img src='" . $image['mini_location'] . "' alt = '" . $image['name'] . "' class='explicphoto'><p style='text-align:center; margin:0;'><b>Tytuł:</b>".$image['title']."</p></br><p style='text-align:center; margin:0;'><b>Autor:</b>".$image['author']."</p></br><p style='color:red; text-align:center; margin:0;'>".$privacy."</p></div>";
    }
    echo "<div style='clear:both;'/>";
}

function printPages($number_of_pages){
    for($i=1; $i<=$number_of_pages; $i++){
        echo "<span style='float:left; margin-left: 10px;' text-decoration:underline; float:left; margin-left: 10px;'><a href='/galeria_login?page=".$i."'>".$i."</a></span>";
    }
}

function printPagesForUsers($number_of_pages){
    for($i=1; $i<=$number_of_pages; $i++){
        echo "<span style='float:left; margin-left: 10px;' text-decoration:underline; float:left; margin-left: 10px;'><a href='/galeria?page=".$i."'>".$i."</a></span>";
    }
}

function getNumberOfImages($images){
    $nrOfImg = 0;
    foreach($images as $image){
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
            if($image['privacy']=='public' || ($image['privacy']=='private' && $image['author']==$_SESSION['account_id'])) $nrOfImg++;
        }else{
            if($image['privacy']=='public') $nrOfImg++;
        }
    }
    return $nrOfImg;
}

function makePages(&$model, $images){
    if(isset($_GET["page"])){
        $page_nr = $_GET["page"];
    }else $page_nr = 1;
    $images = $images->toArray();
    $number_of_images = getNumberOfImages($images);
    $number_of_images_on_page = 2;
    if(floor($number_of_images / $number_of_images_on_page) < ($number_of_images / $number_of_images_on_page)){
        $number_of_pages = floor($number_of_images / $number_of_images_on_page) + 1;
    }else $number_of_pages = $number_of_images / $number_of_images_on_page;
    
    $model['page_nr'] = $page_nr;
    $model['number_of_pages'] = $number_of_pages;

    $images_can_post = [];
    if(isset($images)){
        foreach($images as $image){
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
                if($image['privacy']=='public' || ($image['privacy']=='private' && $image['author']==$_SESSION['account_id'])) $images_can_post[] = $image;
            }else{
                if($image['privacy']=='public') $images_can_post[] = $image;
            }
        }
    }

    $images_on_page = [];

    if(isset($images)){
        $i = ($page_nr- 1)*$number_of_images_on_page;
        $f = $i + $number_of_images_on_page;
        $controlnumber = 0;
        foreach($images_can_post as $image){
            if($controlnumber<$f && $controlnumber >= $i && $controlnumber<$number_of_images){
                $images_on_page[] = $image;
            }
            $controlnumber++;
        }
    }
    $model['images'] = $images_on_page;
}