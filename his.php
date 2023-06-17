
<?php 
    include_once ("header.php");
    include_once("main.php");
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inscription_db";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 

    $classe=@$_POST["classe"];
    $mtpaye=@$_POST["mtpaye"];
    $matricule=@$_POST["matricule"];

    $mess='';
?>
    <h1 class="mt-5">Historique des paiements éffectués</h1>
    <form class="row g-3" method="POST">
        <div class="col-md-3">
            <div class="col-md-6">
                <label for="matricule" class="form-label">MATRICULE</label>
                <input type="text" class="form-control" name="matricule" value="<?php print $matricule;?>" >
            </div>
        </div>
    </form>
    <?php
	//recherche  paiement
	if(isset($_POST['brech'])&&!empty($matricule)){
	$rq1=mysqli_query($conn,"select tbHistoriquePaie.matricule,tbHistoriquePaie.datePaie,tbHistoriquePaie.montant,prenom,nom,classe from tbHistoriquePaie inner join tb_eleve on tb_eleve.matricule=tbHistoriquePaie.matricule where tbHistoriquePaie.matricule='$matricule' order by tbHistoriquePaie.datePaie desc");
	print'<table border="1" class="tab"><tr><th>Matricule</th><th>Date</th><th>Montant payé (cfa)</th><th>Nom</th><th>Prénom</th><th>Classe</th></tr>';
	while($rst=mysqli_fetch_assoc($rq1)){
	 print"<tr>";
	         echo"<td>".$rst['matricule']."</td>";
	         echo"<td>".$rst['datePaie']."</td>";
	         echo"<td>".$rst['montant']."</td>";
	         echo"<td>".$rst['prenom']."</td>";
	         echo"<td>".$rst['nom']."</td>";
	         echo"<td>".$rst['classe']."</td>";
	         print"</tr>";
	
	}
		print'</table>';
	}
	?>
    <?php
        $query="select * from tbhistoriquepaie";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute();
        //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
    <table id="table_test" class="display"><font></font>
    <thead><font></font>
        <tr><font></font>
            <th>ID</th><font></font>
            <th>MATRICULE</th><font></font>
            <th>DATE PAIE</th><font></font>   
            <th>MONTANT</th><font></font> 
            <th>ACTION</th><font></font>          
        </tr><font></font>
    </thead><font></font>
    <tbody><font></font>
        <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr><font></font>
            <td><?php echo $ligne["id"]; ?></td><font></font>
            <td><?php echo $ligne["matricule"]; ?></td><font></font>
            <td><?php echo $ligne["datePaie"]; ?></td><font></font>
            <td><?php echo $ligne["montant"]; ?></td><font></font>
            <td>
            </td><font></font>
        </tr><font></font>
        <?php endwhile; ?>
    </tbody><font></font>
    </table><font></font>
  </div>
</main>

<?php 
    include_once("footer.php");
?>
