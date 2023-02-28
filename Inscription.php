<?php 
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password-confirmation']) && isset($_POST['password'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_card = $_POST['password-confirmation'];
    $password = $_POST['password'];
    mkdir("./users/".$name) ;
    fopen("./users/".$name."/produit.txt", "w");
    $Line = $name . ":" .$email. ":"  .$id_card. ":" .$password. "\n";

    $file = "Inscription_File.txt";

    if(file_exists($file)){
        $fp = fopen($file, "a");//ouv
        fwrite($fp, $Line);
        fclose($fp);
       
        header("Location: Login.html");
    }
    else{
        $fp = fopen($file, "w");//creer
        fwrite($fp, $Line);
        fclose($fp);
    
    }
}
else{

}
?>