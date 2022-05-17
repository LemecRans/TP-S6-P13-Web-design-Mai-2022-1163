<?php
    class Actu{
        public $id;
        public $titre;
        public $date;
        public $resume;
        public $contenue;
    
        public function __construct($id,$titre,$date,$resume,$contenue){
          $this->id = $id;
          $this->titre = $titre;
          $this->date = $date;
          $this->resume = $resume;
          $this->contenue = $contenue;
        }
    }
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
    $valiny=null;
    if(isset($_GET['id'])){
        $conn = new mysqli('mysql-saveworld.alwaysdata.net','saveworld','printf00','saveworld_actualite');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
          
        $sql = "SELECT * from actu where id=".$_GET['id'];
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $valiny=new Actu($row["id"],$row["titre"],$row["daty"],$row["resume"],$row["contenue"]);
                if(slugify($valiny->titre,'_')!=$_GET['titre']){
                    header('Location: liste.php');
                }
                
            }
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<!--
	Daraz by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
	<head>
	<meta charset="utf-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SaveWorld</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/animate.css"/>

		<link rel="stylesheet" href="../css/style.css" />

    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyCZXJBVDf7R4JqmSpopVPoduIGWx1IwpBM"></script>
    <script type="text/javascript" src="../js/plugins.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	</head>
	<body>
	<div class="svg-wrap">
      <svg width="64" height="64" viewBox="0 0 64 64">
        <path id="arrow-left" d="M26.667 10.667q1.104 0 1.885 0.781t0.781 1.885q0 1.125-0.792 1.896l-14.104 14.104h41.563q1.104 0 1.885 0.781t0.781 1.885-0.781 1.885-1.885 0.781h-41.563l14.104 14.104q0.792 0.771 0.792 1.896 0 1.104-0.781 1.885t-1.885 0.781q-1.125 0-1.896-0.771l-18.667-18.667q-0.771-0.813-0.771-1.896t0.771-1.896l18.667-18.667q0.792-0.771 1.896-0.771z"></path>
      </svg>

      <svg width="64" height="64" viewBox="0 0 64 64">
        <path id="arrow-right" d="M37.333 10.667q1.125 0 1.896 0.771l18.667 18.667q0.771 0.771 0.771 1.896t-0.771 1.896l-18.667 18.667q-0.771 0.771-1.896 0.771-1.146 0-1.906-0.76t-0.76-1.906q0-1.125 0.771-1.896l14.125-14.104h-41.563q-1.104 0-1.885-0.781t-0.781-1.885 0.781-1.885 1.885-0.781h41.563l-14.125-14.104q-0.771-0.771-0.771-1.896 0-1.146 0.76-1.906t1.906-0.76z"></path>
      </svg>
    </div>


    <!-- MAIN CONTENT -->

   <div class="container-fluid">

    <!-- HEADER -->

    <section id="header">

      <!-- NAVIGATION -->
      <nav class="navbar navbar-fixed-top navbar-default bottom">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#header">SaveWorld</a>
          </div><!-- /.navbar-header -->

          <div class="collapse navbar-collapse" id="menu">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="index.html">Acceuil</a></li>
              <li><a href="trait.php">Action</a></li>
            </ul>
          </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container -->
      </nav>

      <!-- SLIDER -->
      <div class="header-slide">
        <section>
          <div id="loader" class="pageload-overlay" data-opening="M 0,0 0,60 80,60 80,0 z M 80,0 40,30 0,60 40,30 z">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
              <path d="M 0,0 0,60 80,60 80,0 Z M 80,0 80,60 0,60 0,0 Z"/>
            </svg>
          </div> <!-- /.pageload-overlay -->
          
          <div class="image-slide bg-fixed">
            <div class="overlay">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">

                    <div class="slider-content">
                      <h1></h1>
                      <p>Sauvons ensemble notre monde</p>
                    </div>

                  </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
              </div> <!-- /.container -->
            </div> <!-- /.overlay -->
          </div> <!-- /.image-slide -->

          <nav class="nav-slide">
            <a class="prev" href="#prev">
              <span class="icon-wrap">
                <svg class="icon" width="32" height="32" viewBox="0 0 64 64">
                  <use xlink:href="#arrow-left">
                </svg>
              </span>
              <div>
                <span>Prev Photo</span>
                <h3>...</h3>
                <p>...</p>
                <img alt="Previous thumb">
              </div>
            </a>
            <a class="next" href="#next">
              <span class="icon-wrap">
                <svg class="icon" width="32" height="32" viewBox="0 0 64 64">
                  <use xlink:href="#arrow-right">
                </svg>
              </span>
              <div>
                <span>Next Photo</span>
                <h3>...</h3>
                <p>...</p>
                <img alt="Next thumb">
              </div>
            </a>
          </nav>
        </section>

        <script type="text/javascript">
        var dataHeader = [
                            {
                              bigImage :"../images/slide-1.jpg",
                              title : "Reduire les émmissions de CO2",
							                author : "Templatestock"
                            },
                            {
                              bigImage :"../images/slide-2.jpg",
                              title : "Créons un monde verte ",
                              author : "Templatestock"
                            },
                            {
                              bigImage :"../images/slide-3.jpg",
                              title : "Pour une vie meilleure",
                              author : "Templatestock"
                            }
                        ],
            loaderSVG = new SVGLoader(document.getElementById('loader'), {speedIn : 600, speedOut : 600, easingIn : mina.easeinout});
            loaderSVG.show()
        </script>

      </div><!-- /.header-slide -->
    </section>

    <!-- HEADER END -->

    <section id="portfolio" class="light">
      <header class="title">
        <h1><?php echo $valiny->titre ?> </h1>
      </header>

      <div class="container" style="min-height:300px">
        <div class="row table-row">
          <div class="col-sm-6 hidden-xs">
            <div class="section-content">
              <img src="../images/<?php echo $valiny->contenue ?>" width="400px">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="section-content">
              <p><?php echo $valiny->resume ?></p>
            </div>
          </div>
        </div> <!-- /.row table-row -->
      </div> <!-- /.container -->
    </section>

    <!-- FOOTER CONTACT -->

    <section id="contact" class="dark">
      <header class="title">
        <h2>Nous <span>Contacter</span></h2>
      </header>

      <div class="container">
        <div class="row">
          <div class="col-md-8 animated" data-animate="fadeInLeft">
            <form action="#">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Votre Nom">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Votre E-Mail">
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" rows="3" placeholder="Votre message"></textarea>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-default submit">Envoyer</button>
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-4 animated" data-animate="fadeInRight">
            <address>
                <span><i class="fa fa-map-marker fa-lg"></i> ANTANANARIVO 102</span>
                <span><i class="fa fa-phone fa-lg"></i> 0346074705</span>
                <span><i class="fa fa-envelope-o fa-lg"></i> <a href="mickayarans@outlook.fr">mickayarans@outlook.fr</a></span>
                <span><i class="fa fa-globe fa-lg"></i> <a href="#">http://saveworld.alwaysdata.net</a></span>
            </address>
          </div>
		  
        </div>
      </div>
    </section>

    <section id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Made BY <i class="fa fa-heart"></i> <a href="#">Valisoa Ranaivoson</a></p>
            <p><small>Images : unsplash.com</small></p>
          </div>
        </div>
      </div>
    </section>

   </div><!-- /.container-fluid -->
    
    <!-- SCRIPT -->
    <script type="text/javascript" src="../js/main.js"></script>
	</body>
</html>