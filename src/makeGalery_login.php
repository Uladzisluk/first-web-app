<?php

require_once "../functions.php";

echo '<div style="text-align:center;" class="login">';
echo '<form action="login" method="post" enctype="multipart/form-data">';
    if(isset($regResult) && $regResult == 0) echo '<span style="color:green;">Konto zostało pomyślnie założone</span>';
    echo '<h2>Zaloguj się:</h2></br>';
    echo '<p>Login: </p><input type="text" name="login"></br>';
    echo '<p>Hasło: </p><input type="password" name="password"></br>';
    if(isset($logError) && $logError) echo '<span style="color:red;">Błąd logowania</span>';
    echo '</br><input type="submit" value="Wejść" name="submit"></br>';
echo '</form>';
echo '<a href="/registration">Założyć konto</a></br>';
echo '</div>';
echo '<div class="upload">';
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
    echo '<input style = "margin: 5px;" type="text" name="author"></br>';
    
    if(isset($_SESSION['e_author'])){
        echo "<span style='color:red;'>" . $_SESSION['e_author'] . "</span></br>";
    }
    
    echo '<input style = "margin: 5px;" type="submit" value="Doładować plik" name="submit">';
echo '</form>';
echo '</div>';
echo '<div class="galeria">';

if(isset($images)){
    printPhotos($images);
}

echo '</div>';
echo '<div class="pages">';

if(isset($images)){
    printPages($number_of_pages);
}

echo '</div>';
echo '</div>';