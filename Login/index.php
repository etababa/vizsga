<?php
    require_once('db_connect.php');

    if (isset($_POST['login']) && !empty($_POST['userName']) && !empty($_POST['password'])){

        //biztonsági beállítás -> eszképelés: speciális karakterek eltávolítása
        $userName =  mysqli_real_escape_string($mysqli, $_POST['userName']);
        $password =  mysqli_real_escape_string($mysqli, sha1($_POST['password']));

        $sql = "SELECT * FROM user WHERE userName LIKE '$userName' AND password LIKE '$password';";

        $result = $mysqli->query($sql);

        //Ha talál egy olyan rekordot, aminek az a felhasználónév/jelszó párosa
        //amit megadott a felhasználó az űrlapon
        if (mysqli_num_rows($result) == 1){
            $userData = mysqli_fetch_array($result);
            $userID = $userData['userID'];
            $userName = $userData['userName'];

            //Helyes volt a felhasználó/jelszó páros
            //echo "Helyesen adta meg az adatokat!!!";
            //Session mentés id és felhasználónév session-be mentés
            session_start(); //létrehozunk egy munkamenetet
            $_SESSION['userID'] = $userID;
            $_SESSION['userName'] = $userName;

            //Dashboard oldalra irányítás (belső oldal, csak bejelentkezett felhasználók láthatják) 
            $url = 'dashboard/index.php';
            header("Location: ".$url);
            mysqli_close($mysqli);            
        } else {
            //Helytelen volt a felhasználó/jelszó páros
            //echo "Hibás felhasználónév/jelszó!!!";
            $errorMessage = "Hibás felhasználónév/jelszó!!!";
        }

    }



?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="jumbotron bg-info text-white pt-3 pb-3">
            <h1 class="display3 text-center">Bejelentkezés</h1>
        </div>
    </div>    
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-sm-6">
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-group">
                    <label for="userName">Felhasználónév*</label>
                    <input type="text" class="form-control" name="userName" id="userName" required>
                </div> 
                <div class="form-group">    
                    <label for="password">Jelszó*</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">    
                    <input type="submit" class="btn btn-success mt-3" name="login" id="login" value="Belépés">
                </div>
                <span class="text-danger"><?php isset($errorMessage) ? print $errorMessage : print ""; ?></span>
            </form>
        </div>
    </div>
</body>
</html>