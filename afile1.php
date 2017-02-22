
<?php

// include database connection
include 'database.php';
 
// select all data
$query = "SELECT * FROM answers ORDER BY questionnaire_id DESC";

$stmt = $con->prepare($query);
$stmt->execute();

$data = array();
$fp = fopen('afile1.csv','w');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	//
	$questionnaire_id = $row['questionnaire_id'];

	if (false === isset($data[$questionnaire_id])) {
    $data[$questionnaire_id] = array();
	}
		
	// push
	$data[$questionnaire_id][] = $row['answer'];

}
fputcsv($fp, $data[$questionnaire_id]);
$questionnaire_id ++;
var_dump($data);





/*


$fp = fopen('afile1.csv','w');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	foreach($row as $line){
		fputcsv($fp, $row);
		$questionnaire_id = $line;
		
	
		}
	//var_dump($row);
	echo"Sucess";
	
}
*/
