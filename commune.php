<?php


$servername = "localhost"; // db server keep it localhost
$username = "myonmvxl_jo"; // db user
$password = "31011997nbNB"; // db pass
$db_name = 'myonmvxl_jo'; // db name

header('Content-Type: application/json');

$wilaya = filter_var($_GET['wilaya'], FILTER_SANITIZE_STRING);
$communes = [];
try {
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn-> set_charset("utf8");
    if(!empty($wilaya))
    {
        $sql = "SELECT * FROM commune where wilaya = '".$wilaya."'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $communes[] = $row['name'];
            }
            
        } else {
            echo "0 results";
        }
    }
    
    $conn = null;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$json = json_encode($communes);

echo $json;