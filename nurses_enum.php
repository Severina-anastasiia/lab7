<?php 
    include 'connection.php';
    
    function getWards($dbh,$depart){
        $sth=$dbh->prepare("SELECT nurse.name FROM nurse WHERE nurse.department=:department");
        $sth->bindParam(':department',$depart);
        $sth->execute();
        
        header("Content-Type: text/xml");
        header("Cache-Control: no-cache, must-revalidate");

        print ("<root>");
        
        foreach(($sth) as $row) {
            print ("<name>".$row['name']."</name>");
        }

        print(" </root>");
    }

    if(isset($_GET['depid'])){
        $dep=$_GET['depid'];  
        getWards($dbh,$dep);
    }
?>


