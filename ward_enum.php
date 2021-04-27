<body>
    <?php 
        include 'connection.php';

        function getWards($dbh,$surname){
        $sql = "SELECT ward.name FROM ward INNER JOIN nurse_ward ON ward.id_ward=nurse_ward.fid_ward 
        INNER JOIN nurse ON nurse_ward.fid_nurse=nurse.id_nurse
        WHERE nurse.name='$surname'";
        
        echo "<table border='1'>";
        
        foreach($dbh->query($sql) as $row) {
            echo "<tr><td>$row[0]</td></tr>";
        }

        echo "</table>";  
        }


        if(isset($_GET['select1'])){
            $namee=$_GET['select1']; 
            getWards($dbh,$namee);
        }
    ?>
</body>