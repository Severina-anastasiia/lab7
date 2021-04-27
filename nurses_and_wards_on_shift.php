<?php 
  include 'connection.php';
  
  function getWards($dbh,$selected_shift){
    $sql = "SELECT nurse.name,ward.name as ward,nurse.date FROM ward INNER JOIN nurse_ward ON ward.id_ward=nurse_ward.fid_ward 
    INNER JOIN nurse ON nurse_ward.fid_nurse=nurse.id_nurse
    WHERE nurse.shift='$selected_shift'";
    
    $name=array();
    $ward=array();
    $date=array();
    
    foreach($dbh->query($sql) as $row){
      array_push($date,$row['date'] );
      array_push($ward,$row['ward'] );
      array_push($name,$row['name'] );
    }
    
    $result=array('name' => $name, 'ward' => $ward, 'date' => $date);
    echo json_encode($result);
  }

  if(isset($_GET['shift'])){
    $shift=$_GET['shift'];
    getWards($dbh,$shift);
  }
?>
