<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStore</title>
    <link rel="stylesheet" href="boot.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">MyStore</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active"  href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Ajouter_des_produits.html">Ajouter Produit</a>
        </li>


      </ul>
      <a href="logout.php" class="btn btn-success"> Log out <i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
  </div>
</nav>
    <?php session_start(); ?> 
  <h3 class="text-center my-2">   Liste des produits<h3>

   
    <hr>
    <div class="d-flex">

     <?php 

     if(isset($_SESSION['nom'] )){

    if ($file = fopen("users/".$_SESSION['nom']."/produit.txt", "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            $iparr = explode(':', $line);; 
   
      
if($line==!""){
 ?>

<div>

<div class="card mx-2" style="width: 18rem;">
  <img height="190px" src= <?php echo "users/".$_SESSION['nom'].'/'.$iparr[2]; ?> class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Prix : <?php echo $iparr[0] ?> DH</h5>
    <h5 class="card-text">Nom : <?php echo $iparr[1] ?> </h5>
    <a href="delete.php?nom=<?php echo $iparr[1] ; ?>"  style="color:red"> <i class="fa-sharp fa-solid fa-trash"></i></a>
   
  </div>

</div>
</div>

 
 <?php
}


            
     
        }}
        fclose($file);

} ?>

    </div>


</body>

</html>