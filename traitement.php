<?php
session_start();
if(isset($_POST['daty']) && isset($_POST['catégorie']) && isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['contenue'])){
   
    $conn = new mysqli('mysql-saveworld.alwaysdata.net','saveworld','printf00','saveworld_actualite');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
      
    $sql = "INSERT INTO actu(daty,idCategorie,titre,resume,contenue) VALUE (now(),".$_POST['catégorie'].",'".$_POST['titre']."','".$_POST['resume']."','".$_POST['contenue']."')";
    echo ($sql);
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header('Location: liste.php');
}
else
{
   //header('Location: Ajout.php?error=1');
}
?>