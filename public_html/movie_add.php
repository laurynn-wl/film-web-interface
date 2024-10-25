<html>
    <head>
        <title> Lauryn Williams-Lewis </title>
        <link rel='stylesheet' type='text/css' href="page3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            </head>
            <body>
            <a href="home_page.html">
                 <button class="btn"><i class="fa fa-home"></i></button>
            </a>
                <h1>Movie Addition Result</h1>
                <br> <br> <br> <br> <br>
                
                <?php
                    $mvTitle = $_GET['mvName'];
                    $mvID = $_GET['mvID'];
                    $genre = $_GET['genre'];
                    $price = $_GET['price'];
                    $year =  $_GET['year'];
                    $actID = $_GET['actor'];

                    $db_host = 'mysql.cs.nott.ac.uk';
                    $db_name = 'psylw2_COMP1004';
                    $db_user = 'psylw2_COMP1004';
                    $db_pass = 'Lauryn';

                    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                    if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");

                    $sql = "INSERT INTO Movie (mvID,actID,mvName,mvPrice,mvGenre,mvYear ) VALUES ('$mvID','$actID', '$mvTitle','$price','$genre','$year')";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($mvID, $actID, $mvTitle, $price, $genre, $year);

                    $sql1 = "SELECT mvName FROM Movie WHERE mvName = '$mvTitle'";
                  

                    if ($conn->query($sql1) == TRUE) {
                        echo "<p> Record added successfully </p>";
                    } else {
                        echo " <p> Error adding record: </p> " . $conn->error;
                    }
                    
                    $stmt->close();
                ?>
                
    </body>
</html>