<?php

require_once "../functions.php";

if ($account['photo_privacy'] == 'public') {$public = 'checked'; $privat = '';}
else {$public = ''; $privat = 'checked';}

echo '<div style="text-align:center;" class="login">';
echo '<h2>Welcome '.$account['login'].'</h2>';
echo '<a href="/logout">Wyloguj się</a></br>';
echo '</div>';
echo '<div class="upload">';
echo '<div class="photo-settings">';
echo 'Ustawiena prywatności twoich zdjęć:</br>';
echo '<form id="privacyForm" action="privacy" method="post" enctype="multipart/form-data">';
echo '<input type="radio" name="visible" value="public" '.$public.' onClick="validateRadio();">Publiczne</input>';
echo '<input type="radio" name="visible" value="private" '.$privat.' onClick="validateRadio();">Prywatne</input>';
echo '</form>';
echo '<form action="upload" method="post" enctype="multipart/form-data">';
    echo '</br><span style = "margin: 5px;">Dodać zdjęcie:</span></br>';
    echo '<input style = "margin: 5px;" type="file" name="file" id="file"></br>';
    
    if(isset($_SESSION['e_size'])){
        echo "<span style='color:red;'>" . $_SESSION['e_size'] . "</span></br>";
    }
    if(isset($_SESSION['e_type'])){
        echo "<span style='color:red;'>" . $_SESSION['e_type'] . "</span></br>";
    }
    if(isset($_SESSION['e_exist'])){
        echo "<span style='color:red;'>" . $_SESSION['e_exist'] . "</span></br>";
    }
    if(isset($_SESSION['e_upload'])){
        echo "<span style='color:red;'>" . $_SESSION['e_upload'] . "</span></br>";
    }
    if(isset($_SESSION['e_empty'])){
        echo "<span style='color:red;'>" . $_SESSION['e_empty'] . "</span></br>";
    }
    
    echo '<span style = "margin: 5px;">Znak wodny:</span></br>';
    echo '<input style = "margin: 5px;" type="text" name="watermark"></br>';
    
    if(isset($_SESSION['e_watermark'])){
        echo "<span style='color:red;'>" . $_SESSION['e_watermark'] . "</span></br>";
    }
    
    echo '<span style = "margin:: 5px;">Tytuł:</span></br>';
    echo '<input style = "margin: 5px;" type="text" name="title"></br>';
    
    if(isset($_SESSION['e_title'])){
        echo "<span style='color:red;'>" . $_SESSION['e_title'] . "</span></br>";
    }
    
    echo '<span style = "margin:: 5px;">Autor:</span></br>';
    echo '<input style = "margin: 5px;" type="text" name="author" value = "'.$account['login'].'" readonly></br>';
    
    if(isset($_SESSION['e_author'])){
        echo "<span style='color:red;'>" . $_SESSION['e_author'] . "</span></br>";
    }
    
    echo '<input style = "margin: 5px;" type="submit" value="Doładować plik" name="submit">';
echo '</form>';
echo '</div>';
echo '<div class="galeria">';

if(isset($images)){
    printPhotosForUsers($images);
}

echo '</div>';
echo '<div class="pages">';

if(isset($images)){
    printPagesForUsers($number_of_pages);
}

echo '</div>';
echo '</div>';