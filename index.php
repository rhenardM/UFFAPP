<?php 
    include_once("header.php");
    include_once("main.php");
?>
<?php 
    session_start();
    include_once("db_conn.php");
    if(isset($_POST['username'])&&isset($_POST['password'])) {
      function validate($data){
          $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }  

        $username= validate($_POST['username']);
        $pass = validate($_POST['password']);

      if(empty($username)) {
        header("location: login.php?error=Username is required");
        exit();
      }else if(empty($pass)){
        header("location: login.php?error=Password is required");
        exit();
      }else{
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $pass ) {
                $SESSION['username'] = $row['username'];
                $SESSION['name'] = $row['name'];
                $SESSION['id'] = $row['id'];
            }else{
                header("location: login.php?error=incorrect User name or password");
                exit();
            }
        }else{
            header("location: login.php");
            exit();
        }
      }

    }
?>

<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion_db";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 
?>

<?php
    
    $matricule=@$_POST["matricule"];
    $nom=@$_POST["nom"];
    $postnom=@$_POST["postnom"];
    $prenom=@$_POST["prenom"];
    $sexe=@$_POST["sexe"];
    $numero=@$_POST["numero"];
    $age=@$_POST["age"];
    $nom_tuteur=@$_POST["nom_tuteur"];
    $num_tuteur=@$_POST["num_tuteur"];
    $objstmt;

    //Enregistrement des élèves
    if(isset($_POST['benrg'])&&!empty($nom)&&!empty($postnom)&&!empty($prenom)&&!empty($sexe)
    &&!empty($numero)&&!empty($nom_tuteur)&&!empty($num_tuteur)){
    $sql=mysqli_query($conn,"insert into tb_inscription(nom,postnom,prenom,sexe,numero,age,nom_tuteur,num_tuteur) values('$nom','$postnom','$prenom','$sexe','$numero','$age','$nom_tuteur','$num_tuteur') ");
    header("Location:index.php");
    }
?>

    <h1 class="mt-5">Liste des inscrits</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="float:right;margin-bottom:20px;" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un inscrit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
              <form class="row g-3" method="POST">
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">NOM</label>
                    <input type="text" class="form-control" name="nom" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">POSTNOM</label>
                    <input type="text" class="form-control" name="postnom" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">PRENOM</label>
                    <input type="text" class="form-control" name="prenom" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="inputsexe" class="form-label">SEXE</label>
                    <select class="form-control" name="sexe" id="sexe" required>
                    <option  value="<?php echo $sexe; ?>"><?php echo $sexe; ?>Selectionner</option>
                    <option  value="MASCULIN">MASCULIN</option>
                    <option  value="FEMININ">FEMININ</option>
                    </select>
        </div>
        <div class="col-md-6">
                    <label for="inputdatenaissance" class="form-label">NUMERO</label>
                    <input type="text" class="form-control" name="numero" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="mtpaye" class="form-label">AGE</label>
                    <input type="text" class="form-control" name="age" value="" >
        </div>
        <div class="col-md-6">
                    <label for="quartier" class="form-label">QUARTIER</label>
                    <input type="text" class="form-control" name="quartier" value="" required>
        </div>
        <div class="col-md-6">
                <label for="contact" class="form-label">NOM_TUTEUR</label>
                <input type="text" class="form-control" name="nom_tuteur" value="" required>
        </div>
        <div class="col-md-6">
                <label for="contact" class="form-label">NUM_TUTEUR</label>
                <input type="text" class="form-control" name="num_tuteur" value="" required>
        </div>
        </div>
            <div class="modal-footer">
                <input type="submit" name="benrg" value="Ajouter" class="btn btn-primary">
            </div>
            </form>
            </div>
        </div>
        </div>
    <?php
        $query="select * from tb_inscription";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute();
        //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
    <table id="table_test" class="display"><font></font>
    <thead><font></font>
        <tr><font></font>
          
            <th>NOM</th><font></font>
            <th>POSTNOM</th><font></font>
            <th>PRENOM</th><font></font>
            <th>SEXE</th><font></font>
            <th>NUMERO</th><font></font>
            <th>AGE</th><font></font>
            <th>NOM_TUTEUR</th><font></font>
            <th>NUM_TUTEUR</th><font></font>
            <th>ACTION</th><font></font>
        </tr><font></font>
    </thead><font></font>
    <tbody><font></font>
        <!-- afficher des livres enregistrés depuis la bases de données -->
        <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr><font></font>
          
            <td><?php echo $ligne["nom"]; ?></td><font></font>
            <td><?php echo $ligne["postnom"]; ?></td><font></font>
            <td><?php echo $ligne["prenom"]; ?></td><font></font>
            <td><?php echo $ligne["sexe"]; ?></td><font></font>
            <td><?php echo $ligne["numero"]; ?></td><font></font>
            <td><?php echo $ligne["age"]; ?></td><font></font>
            <td><?php echo $ligne["nom_tuteur"]; ?></td><font></font>
            <td><?php echo $ligne["num_tuteur"]; ?></td><font></font>
            <td>
            <!-- suprimer un livre -->
            <div class="d-flex">
                <a href="modif.php?matricule=<?php echo $ligne["matricule"]; ?>" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                </a>.
            <!-- modifier un livre -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </button>
            </div>
            </td><font></font>
        </tr><font></font>

            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">suppresion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        voulez vous supprimer ce client ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger">supprimer</button>
                </div>
                </div>
            </div>
            </div>
        <?php endwhile; ?>
    </tbody><font></font>
    </table><font></font>
  </div>
</main>

<?php 
    include_once("footer.php");
?>
