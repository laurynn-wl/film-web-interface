<html>
    <head>
        <title>Lauryn Williams-Lewis</title>
        <LINK rel='stylesheet' type='text/css' href='page4.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <a href="home_page.html">
            <button class="btn"><i class="fa fa-home"></i></button>
        </a>
        
        <h1> Movie Search Results</h1>
        <br>  <br>  <br>
        
        <?php 
            $titlesearch = $_GET['title'];
         

            $db_host = 'mysql.cs.nott.ac.uk';
            $db_name = 'psylw2_COMP1004'; 
            $db_user = 'psylw2_COMP1004';
            $db_pass = 'Lauryn';

            

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");

            $sql="SELECT mvID,mvName,mvPrice,mvGenre,mvYear FROM Movie WHERE mvName LIKE '%$titlesearch%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($ID, $Title, $Price, $Genre, $Year);
        ?>
       
       
        <div class="center">
            <table width="750" border="1" cellpadding="1" cellspacing="1">
            <tr> <th>ID</th> <th>Title</th> <th>Price</th> <th>Genre</th> <th>Year</th> </tr>
        </div>

        <?php
            while($stmt->fetch()){
                echo "<tr>";
                echo "<td>".htmlentities($ID)."</td>";
                echo "<td>".htmlentities($Title)."</td>";
                echo "<td>".htmlentities($Price)."</td>";
                echo "<td>".htmlentities($Genre)."</td>";
                echo "<td>".htmlentities($Year)."</td>";
                echo "</tr>";
            }
        ?>

        

        </table>
    </body>
</html>
