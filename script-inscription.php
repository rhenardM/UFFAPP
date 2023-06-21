<?php 
@$valider=$_POST['valider'];
@$nom=$_POST['nom'];
@$email=$_POST['email'];
@$password=$_POST['password'];
@$pass_comfirm	=$_POST['pass_comfirm'];
@$message= '';
if(isset($valider)){ 
    if(empty($nom)) $message="<li> Non laisser vide !</li>";
    if(empty($email)) $message.="<li>Email laisser vide </li>";
    if(empty($password)) $message.="<li>Mot de passe invalide !</li>";
    if(($password!=$pass_comfirm))$message.="<li>Mot de passe non identique !</li>";
    if(empty($message)){
        include('login-connexion.php');
        $req=$pdo->prepare("SELECT id FROM user_register WHERE email=? limit 1");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute(array($email));
        $tab=$req->fetchAll();
        if(count($tab)>0)
            $message ="<li> email existe déjà!</li>";
        else{
            $ins=$pdo->prepare("INSERT INTO user_register(nom,email, pass) VALUES(?,?,?)");
            $ins->execute(array($nom,$email,md5($pass)));
            $message = "valeurs bien inserets";
            header("location:page-login.php");
    }         
 }
}
?>