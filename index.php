<?php

$conn = new mysqli("localhost", "root", "", "test");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$data = array(
	array("data"=>233, "data2"=>233, "data3"=>233, "data4"=>233, "data5"=>233, "data6"=>233, "company_name"=>"hihi"),
	array("data"=>233, "data2"=>233, "data3"=>233, "data4"=>233, "data5"=>233, "data6"=>233, "company_name"=>"hihi1"),
	array("data"=>233, "data2"=>233, "data3"=>233, "data4"=>233, "data5"=>233, "data6"=>233, "company_name"=>"hihi2"),
	array("data"=>233, "data2"=>233, "data3"=>233, "data4"=>233, "data5"=>233, "data6"=>233, "company_name"=>"hihi3"),
	array("data"=>233, "data2"=>233, "data3"=>233, "data4"=>233, "data5"=>233, "data6"=>233, "company_name"=>"hihi4")
);

$wheres = [];
$values1 = [];
$values2 = [];
$values3 = [];
$values4 = [];
$values5 = [];
$values6 = [];

foreach ($data as $arr) {
	// code...
	$wheres = array_merge($wheres,[$arr['company_name']]);
	$values1 = array_merge($values1,[$arr['data']]);
	$values2 = array_merge($values2,[$arr['data2']]);
	$values3 = array_merge($values3,[$arr['data3']]);
	$values4 = array_merge($values4,[$arr['data4']]);
	$values5 = array_merge($values5,[$arr['data5']]);
	$values6 = array_merge($values6,[$arr['data6']]);

}


$wheres = implode("','",$wheres);
$values1 = implode(",",$values1);
$values2 = implode(",",$values2);
$values3 = implode(",",$values3);
$values4 = implode(",",$values4);
$values5 = implode(",",$values5);
$values6 = implode(",",$values6);

$sql = "UPDATE tbl2 SET 
	data1 = ELT(FIELD(company_name, '".$wheres."'), ".$values1."), 
	data2 = ELT(FIELD(company_name, '".$wheres."'), ".$values2."), 
	data3 = ELT(FIELD(company_name, '".$wheres."'), ".$values3."), 
	data4 = ELT(FIELD(company_name, '".$wheres."'), ".$values4."), 
	data5 = ELT(FIELD(company_name, '".$wheres."'), ".$values5."), 
	data6 = ELT(FIELD(company_name, '".$wheres."'), ".$values6.")
	WHERE company_name in ('".$wheres."')";


if($conn->query($sql)){
	echo "Records Updated successfully.";
}

$conn->close();

?>

