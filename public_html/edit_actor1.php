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
        
        <h1> Update Actor Result</h1>
        <br> <br> <br> <br> <br>
        
        <?php 

            $db_host = 'mysql.cs.nott.ac.uk';
            $db_name = 'psylw2_COMP1004'; 
            $db_user = 'psylw2_COMP1004';
            $db_pass = 'Lauryn';

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");

            if(isset($_POST['actor']) && isset($_POST['title'])) {

                $actName = $_POST['actor'];
                $updateName = $_POST['title'];

                $sql = "UPDATE Actor SET actName='$updateName' WHERE actName='$actName'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $updateName, $actName);
                $stmt->execute();
                
                $rows = $stmt->affected_rows;

                if ($rows > 0) {
                    echo "<p> Record updated sucessfully </p>";
                }
                else {
                    echo "<p> Error updating record </p>" . $conn->error ;
                }



            }

            $conn->close();

        ?>   
    </body>
</html>