<?php

//fetch.php

include('database.php');

$column = array("id", "Name", "Address", "salary");

$query = "SELECT * FROM details ";




$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['Name'];
 $sub_array[] = $row['Address'];
 $sub_array[] = $row['salary'];
 $data[] = $sub_array;

}

function count_all_data($connect)
{
 $query = "SELECT * FROM details";
 $statement = $connect->prepare($query);
 $statement->execute();
 
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>


