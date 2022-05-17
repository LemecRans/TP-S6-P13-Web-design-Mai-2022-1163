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
        <form action="trai.php" method="post" style="text-align: center;border:5px solid white;border-radius:10px;margin-right:50px;padding:50px;">
            <h3>Connexion</h3>
            <?php if(isset($_GET['error'])){ ?>
                <p style="color:red">Il y a une erreur,veulliez réessayer</p>
            <?php } ?>
            <hr>
            <h4>Pseudo : <input type="text" name="pseudo" style="color:black;width:120px;margin-left:55px" value="Admin01"></h4>
            <h4>Mots de passe : <input type="password" name="mdp" style="color:black;width:120px" value="saveworld."></h4>
            <button type="submit" class="btn btn-light" style="width: 170px; height: 40px; padding: 10px; color:rgb(59, 28, 7)">Connexion</button>
        </form>
    </div>
    <p style="text-align: center;padding-top: 20px;color: aliceblue;">Copyright by <img src="images/logo Ye.png" height="100px" ></p>
</body>
</html>