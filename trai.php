<?php 
    $conn = new mysqli('mysql-saveworld.alwaysdata.net','saveworld','printf00','saveworld_actualite');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['id'])){
        $sql = "DELETE from actu where id =".$_GET['id'];
        $result = $conn->query($sql);
        header('Location: liste.php');
    }
    else{
        $sql = "SELECT id,nom,mdp FROM utilisateur where nom = '".$_POST['pseudo']."' and mdp = '".$_POST['mdp']."'; ";
        var_dump($sql);
        $result = $conn->query($sql);
        $ind=$result->num_rows;
        if($ind==1){
            header('Location: liste.php');
        }
        else{
            header('Location: admin.php?error=1');
        }
    }
    $conn->close();
?>