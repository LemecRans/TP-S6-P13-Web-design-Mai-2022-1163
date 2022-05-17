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
//$conn = new mysqli('mysql-saveworld.alwaysdata.net','saveworld','printf00','saveworld_actualite');
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
try{
    $cache="<script type=\"text/javascript\">\n
    var portfolio = [";
    for($i=0;$i<count($liste) ;$i++){
        $valiny=slugify($liste[$i]->titre,'_');
        $cache.="{\n
            category : \"".$liste[$i]->categorie."\",\n image : \"images/".$liste[$i]->contenue."\",\n title : \"".$liste[$i]->titre."\",\n link : \"http://localhost:1024/daraz/".$liste[$i]->categorie."/".$valiny."-".$liste[$i]->id.".php\", \n  text : \"".$liste[$i]->resume."\"\n },\n";
    };
    $cache=$cache."]; \n </script>\n";
    file_put_contents("cache.html",$cache);
    header('Location: Action.php');
}catch(Exception $e) {
   header('Location: index.php');
}
?>
