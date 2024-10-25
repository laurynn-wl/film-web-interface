<html>
<head>
    <title>Lauryn Williams-Lewis</title>
    <link rel='stylesheet' type='text/css' href='page3.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <a href="home_page.html">
        <button class="btn"><i class="fa fa-home"></i></button>
    </a>
    
    <h1>Update Actor Result</h1>
    <br> <br> <br> <br> <br>
    
    <?php 
        $db_host = 'mysql.cs.nott.ac.uk';
        $db_name = 'psylw2_COMP1004'; 
        $db_user = 'psylw2_COMP1004';
        $db_pass = 'Lauryn';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($conn->connect_errno) {
            die("failed to connect to database\n</body>\n</html>");
        }

        if(isset($_POST['movie']) || isset($_POST['title']) || isset($_POST['actor']) || isset($_POST['price']) || isset($_POST['genre']) || isset($_POST['year'])){

            $movie = $_POST['movie'];
            $mvName = $_POST['title'];
            $actID = $_POST['actor'];
            $mvPrice = $_POST['price'];
            $mvGenre = $_POST['genre'];
            $mvYear = $_POST['year'];

            $sql = "UPDATE Movie SET actID='$actID', mvName='$mvName', mvPrice='$mvPrice', mvGenre='$mvGenre', mvYear='$mvYear' WHERE mvID='$movie'";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssisss", $actID, $mvName, $mvPrice, $mvGenre, $mvYear, $movie);
            $stmt->execute();

            $rows = $stmt->affected_rows;

            if ($rows > 0) {
                echo "<p>Record updated successfully</p>";
            } else {
                echo "<p>Error updating record</p>" . $conn->error;
            }
        }

        $conn->close();
    ?>   
</body>
</html>