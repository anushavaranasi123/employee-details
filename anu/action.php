<?php

//action.php

include('database.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':Name'  => $_POST['Name'],
  ':Address'  => $_POST['Address'],
  ':salary'   => $_POST['salary'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE details 
 SET Name = :Name, 
 Address = :Address, 
 salary = :salary 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM details
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}