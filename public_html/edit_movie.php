<html>
    <head>
        <title>Lauryn Williams-Lewis</title>
        <LINK rel='stylesheet' type='text/css' href='page5.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <a href="home_page.html">
            <button class="btn"><i class="fa fa-home"></i></button>
        </a>
        
        <h1> Edit Movie </h1>
        
        <?php

            $db_host = 'mysql.cs.nott.ac.uk';
            $db_name = 'psylw2_COMP1004'; 
            $db_user = 'psylw2_COMP1004';
            $db_pass = 'Lauryn';

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>"); 

            $sql="SELECT mvID, actID, mvName, mvPrice, mvGenre, mvYear FROM  Movie"; /* Might cause an error  */
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($mvID, $actID, $mvName, $price, $genre, $year);
            ?>
            <div class="box">
                <form  action ="edit_movie1.php" method="post" onSubmit = "return validate(this)">
                <p> Current Movie Title:  <br>
                    <select name="movie" class="option" id="movie">
                        <option id ="text" value = "" >---Select Movie---</option>
                </p>
                    <?php
                        while($stmt->fetch()){
                            echo "<option value='".htmlentities($mvID)."'>".htmlentities($mvName)."</option>";
                        }
                        $stmt->close();
                    ?>
                     </select>
                    
                    <p> Updated Movie Name:
                        <input type="text" class="option" id="title" name="title">
                        <br>
                    </p>

                    
                    <p> Updated Actor Name:
                        <select name="actor" class="option" id="actor">
                            <option value = "" >---Select Actor---</option>
                    </p>
                        <?php
                          $db_host = 'mysql.cs.nott.ac.uk';
                          $db_name = 'psylw2_COMP1004'; 
                          $db_user = 'psylw2_COMP1004';
                          $db_pass = 'Lauryn';
              
                          $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                          if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>"); 
              
                          $sql="SELECT actID, actName FROM Actor"; /* Might cause an error  */
                          $stmt = $conn->prepare($sql);
                          $stmt->execute();
                          $stmt->bind_result($actID, $actName);

                            while($stmt->fetch()){
                                echo "<option value='".htmlentities($actID)."'>".htmlentities($actName)."</option>";
                            }
                            $stmt->close();
                        ?>
                        </select>
                      
                    </p>

                    <p> Updated Movie Price:
                        <input type = "number" min="0" step ="0.01" class="option" id="price" name = "price">
                    </p>

                    <p> Updated Movie Genre:
                        <input type = "text" class="option" id="genre" name = "genre">
                    </p>

                    <p> Updated Movie Year: <br>
                        <input type = "number" min="1895" max="2023" class="option" id="year" name = "year">
                    </p>

                    <p>
                        <input type ="submit" class="button" id="Search" value="Update">
                    </p>
                </form>
            </div>
    </body>
</html>