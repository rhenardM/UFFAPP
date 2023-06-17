<?php 
    include_once("main.php");
    
   /*if(!empty($_POST["depart_code"])){
       $query="SELECT * FROM tb_eleve where tb_eleve=:matricule";
       $pdostmt=$pdo->prepare($query);
       $pdostmt->execute(["matricule"=>$_POST["depart_code"]]);

       while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
            echo "<option value=".$row["matricule"].">".$row["prenom"]."</option>";
       endwhile;
       $pdostmt
   }*/
?>
<?php
    if(!empty($_POST["username_register"])&&!empty($_POST["email_register"])&&!empty($_POST["password_register"])){
    $query="insert into user(username,email,password) values (:user,:mail,:pass)";
    $pdostmt=$pdo->prepare($query);
    $result=$pdostmt->execute(["user"=>$_POST["username_register"],"mail"=>$_POST["email_register"],"pass"=>password_hash($_POST["password_register"],PASSWORD_DEFAULT)])
    $mess="ajout avec succées!";
    if($result){
        $response=[
            "msg"=>$mess,
            "value"=>true
        ];
        else{
            $response=[
                "msg"=>$pdostmt->errorInfo(),
                "value"=>false
            ];
        }
        echo json_encode($response);
    }
}

?>