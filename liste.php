<?php 
    class Actu{
        public $id;
        public $titre;
        public $date;
        public $resume;
        public $contenue;
        public $categorie;

        public function __construct($id,$titre,$date,$resume,$contenue,$categorie){
        $this->id = $id;
        $this->titre = $titre;
        $this->date = $date;
        $this->resume = $resume;
        $this->contenue = $contenue;
        if($categorie==1){
            $this->categorie = "Actu";
        }else{
            $this->categorie = "Sport";
        }
        
        }
    }
    $liste=array();
    $conn = new mysqli('mysql-saveworld.alwaysdata.net','saveworld','printf00','saveworld_actualite');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * from actu";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $i=0;
        while($row = $result->fetch_assoc()) {
            $liste[$i]=new Actu($row["id"],$row["titre"],$row["daty"],$row["resume"],$row["contenue"],$row["idCategorie"]);
            $i++;
        }
    }
    $conn->close();
    $divider = '_';
        function slugify($text,$divider)
        {
            // replace non letter or digits by divider
            $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

            // transliterate
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);

            // trim
            $text = trim($text, $divider);

            // remove duplicate divider
            $text = preg_replace('~-+~', $divider, $text);

            // lowercase
            $text = strtolower($text);

            if (empty($text)) {
                return 'n-a';
            }

            return $text;
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Liste Actu</title>
        <meta charset="UTF-8"> 
		<link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>

	<body Style=" Text-align:center;background-color:#47251b;color:white">
        <h1>SaveWorld</h1>
        <a href="Ajout.php">Ajouter</a>
        <h1> ---------------------------------------------------------</h1>
        <div style="height:400px;margin-left:60px">
            <?php for($i=0;$i<count($liste) ;$i++){ $valiny=slugify($liste[$i]->titre,'_');?>
                <div style="width:400px;height:390px;float:left;margin-right:10px;border:5px solid white;border-radius:20px">
                    <h2 ><?php echo $liste[$i]->titre ?></h2>
                    <h4 ><?php echo $liste[$i]->resume?></h4>
                    <a href="trai.php?id=<?php echo $liste[$i]->id ?>" name="id">Supprimer</a>
                </div>
            <?php } ?>
            </div>
    </body>
</html>