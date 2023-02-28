<?php
session_start();
if(isset($_POST['email'] ) && $_POST['password']){
    $path = "Inscription_File.txt";
    if ($file = fopen($path, "r")) {
        while(!feof($file)) {
            $line = fgets($file);

            $iparr = explode(':', $line);
   
      
if($line==!""){
    if (strcmp($_POST['email'],$iparr[1])==0 && strcmp($_POST['password'],$iparr[2])==0){
        
        echo "Connected successfully";
        $_SESSION["nom"]= $iparr[0];
       
        header("Location: dashboard.php");
        break;
     }
}
else{
    echo "Failed to connect";
}

            
     
        }}
        fclose($file);

}

?>