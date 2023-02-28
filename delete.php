
<?php
session_start();
  
    $nom = $_GET["nom"];//produit
    $new_file = fopen("users/".$_SESSION["nom"]."/tmpfile.txt", "w");//user
    if ($file = fopen("users/".$_SESSION["nom"]."/produit.txt", "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            $iparr = explode(':', $line);
        if($iparr[0]!="") {
            if($nom!=$iparr[1]){            //produit
                fwrite($new_file, $line);
            }
            else {
                $string ="users/".$_SESSION["nom"]."/".$iparr[2];//chemin d'immage 

               unlink(trim($string));
                
            }
        }
        else{ 
            
             fclose($new_file);
               fclose($file);

            unlink("users/".$_SESSION["nom"]."/produit.txt") ;
            rename("users/".$_SESSION["nom"]."/tmpfile.txt", "users/".$_SESSION["nom"]."/produit.txt");
         header("Location: dashboard.php");   
        }
    
        
        
        }
    }


?>