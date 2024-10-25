<html>
  <head>
    <title>Lauryn Williams-Lewis</title>
    <link rel='stylesheet' type='text/css' href="pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="lauryn.js"></script>
  <head>
  <body>
    <a href="home_page.html">
      <button class="btn"><i class="fa fa-home"></i></button>
    </a>
    <h1> Delete Movie</h1>
    <?php
    $db_host = 'mysql.cs.nott.ac.uk';
    $db_name = 'psylw2_COMP1004';
    $db_user = 'psylw2_COMP1004';
    $db_pass = 'Lauryn';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");

    $sql  = "SELECT mvID,mvName FROM Movie";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($mvID,$mvName);
    ?>
    
    <div class="box">
      <form action ="delete_movie.php"  onSubmit = "return validate(this)">
        <p> Movie Name: <br>
          <select name="movie" class="option" id="movie">
            <option  id="text" value = "" >---Select Movie---</option>
        </p>
            <?php
                while($stmt->fetch()){
                    echo "<option value='".htmlentities($mvID)."'>".htmlentities($mvName)."</option>";
                }
                $stmt->close();
            ?>
          </select>
          <br><br>
          <input type ="submit" class="button" id="Search" value="Delete">
        </p>
     `</form>
    </div>
       
  </body>
</html>