<?php

    function getDocument()
    { 
        $sql="SELECT COUNT(*) AS nbre FROM tb_document";

        $req = $GLOBALS['login-connexion']->prepare($sql);

        $req->execute();

        return $req->fetch();
    }
?>