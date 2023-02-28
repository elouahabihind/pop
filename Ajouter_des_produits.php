<?php
session_start();

if(isset($_POST['sub'])){
    $prix = $_POST['prix'];
    $name = $_POST['nom'];
    $filename = time().$_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];  

    $line = $prix . ":" .$name . ":"  .$filename.  "\n";
    $file = "produit.txt";

    $folder = "users/".$_SESSION["nom"]."/".$filename; 

    move_uploaded_file($tempname, $folder);
    if(file_exists("users/".$_SESSION["nom"]."/".$file)){
        $fp = fopen("users/".$_SESSION["nom"]."/".$file, "a");
        fwrite($fp, $line);
        fclose($fp);
     
        header("Location: dashboard.php");
    }
    else{
        $fp = fopen("users/".$_SESSION["nom"]."/".$file, "w");
        fwrite($fp, $line);
        fclose($fp);
       
    }

  
    
}
?>