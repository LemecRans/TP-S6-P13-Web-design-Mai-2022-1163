<?php
    class Categorie{
        public $id;
        public $titre;

        public function __construct($id,$titre){
            $this->id = $id;
            $this->titre = $titre;
        }
    }
    $liste=array();
    $conn = new mysqli('mysql-saveworld.alwaysdata.net','saveworld','printf00','saveworld_actualite');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * from catégorie";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $i=0;
        while($row = $result->fetch_assoc()) {
            $liste[$i]=new Categorie($row["id"],$row["nom"]);
            $i++;
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="width: 1300px;background-image: url(images/a.jpg); color: rgb(59, 28, 7); ">
    <div style="color: azure; width: 500px;margin-left: 450px;margin-top: 130px;text-align: center;">
        <form action="traitement.php" method="post" style="text-align: center;border:5px solid white;border-radius:10px;margin-right:50px;padding:50px;">
            <h3>Ajout de contenue</h3>
            <?php if(isset($_GET['error'])){ ?>
                <p style="color:red">Il y a une erreur,veulliez réessayer</p>
            <?php } ?>
            <hr>
            <p>Date :<input type="date" name="daty" style="color:black;"></p>
            <p>Catégorie :<select name="catégorie" style="color:black;width:150px">
                <option value="#"></option>
                <?php for($i=0;$i<count($liste);$i++){ ?>
                    <option value="<?php echo $liste[$i]->id ?>"><?php echo $liste[$i]->titre ?></option>
                <?php } ?>
            </select>
            </p>
            <p>Titre :<input type="Text" name="titre" style="color:black;" ></p>
            <p>Résumé :<input type="Text" name="resume" style="color:black;"></p>
            <p>Image :<input type="Text" name="contenue" style="color:black;"></p>
            <button type="submit" style="color:black">Enregistrer</button>
        </form>
    </div>
</body>
</html>