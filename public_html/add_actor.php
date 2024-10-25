<html>
    <head>
        <title>Lauryn Williams-Lewis</title>
        <LINK rel='stylesheet' type='text/css' href='page3.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <a href="home_page.html">
            <button class="btn"><i class="fa fa-home"></i></button>
        </a>
        
        <h1> Add Actor Result </h1>

        <br> <br> <br> <br> <br>

        
        
        <?php 
            $titlesearch = $_GET['title'];
            $idsearch = $_GET['id'];

            $db_host = 'mysql.cs.nott.ac.uk';
            $db_name = 'psylw2_COMP1004'; 
            $db_user = 'psylw2_COMP1004';
            $db_pass = 'Lauryn';

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_errno) die("failed to connect to database\n</body>\n</html>"); 

            $sql="INSERT INTO Actor (actID, actName) VALUES ('$idsearch', '$titlesearch')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($id, $title);

            $sql1="SELECT actID, actName FROM Actor WHERE actName LIKE '%$titlesearch%'";
            $stmt->execute();

            if ($conn->query($sql1) == TRUE) {
                echo "<p> Record added successfully</p>";
            } else {
                echo "<p> Error adding record: </p> " . $conn->error;
            }

            ?>

            


    
    
    </body>
</html>