<?php
    include 'bd.php';

    function accountExist($email, $bdd){
        $exist = true;
        $req = $bdd->query("SELECT * FROM account WHERE email = '".$email."'");
        $req->execute();
        $res = $req->fetch();
        if(empty($res)){
            $exist = false;
        }
        return $exist;
    }

    function createAccount($arr, $bdd) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $c_password = $_POST['c_password'];
        $req = $bdd->prepare("INSERT INTO account(prenom,nom,email,phone,password) VALUES(:prenom,:nom,:email,:phone,:password);");
        $req->bindParam(":prenom",$prenom);
        $req->bindParam(":nom",$nom);
        $req->bindParam(":email",$email);
        $req->bindParam(":phone",$phone);
        $req->bindParam(":password",$password);
        $req->execute();
    }

    function createReservation($id, $arr, $bdd) {
        $adultes = $_POST['adultes'];
        $enfants = $_POST['enfants'];
        $surmesure = $_POST['surmesure'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $req = $bdd->prepare("INSERT INTO reservations(user,adultes,enfants,surmesure,date,heure) VALUES(:user,:adultes,:enfants,:surmesure,:date,:heure);");
        $req->bindParam(":user",$id);
        $req->bindParam(":adultes",$adultes);
        $req->bindParam(":enfants",$enfants);
        $req->bindParam(":surmesure",$surmesure);
        $req->bindParam(":date",$date);
        $req->bindParam(":heure",$hour);
        $req->execute();
    }

    function getAccountInfos($email,$bdd) {
        $req = $bdd->query("SELECT * FROM account WHERE email = '".$email."'");
        $req->execute();
        $res = $req->fetch();
        return $res;
    }

    function getReservations($id,$bdd) {
        $req = $bdd->query("SELECT adultes,enfants,surmesure,date,heure FROM reservations WHERE user = ".$id);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function newMessage($arr, $bdd) {
        $prenom = $arr['prenom'];
        $nom = $arr['nom'];
        $email = $arr['email'];
        $phone = $arr['phone'];
        $message = $arr['message'];
        $req = $bdd->prepare("INSERT INTO messages(prenom,nom,email,phone,message) VALUES(:prenom,:nom,:email,:phone,:message);");
        $req->bindParam(":prenom",$prenom);
        $req->bindParam(":nom",$nom);
        $req->bindParam(":email",$email);
        $req->bindParam(":phone",$phone);
        $req->bindParam(":message",$message);
        $req->execute();
        return true;
    }

    function getMessage($id,$bdd) {
        $req = $bdd->query("SELECT message FROM reservations WHERE user = ".$id);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
?>
