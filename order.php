<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_factory";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	echo"
        <script type=\"text/javascript\">
        	if ( window.confirm('Oops, Connection failed. Just click OK to redirect to homepage.') ) {
				window.location.href='http://localhost/CakeFactory/';
			}
        </script>
    ";
    //die("Connection failed: " . mysqli_connect_error());
}

$cost = $_POST["cost"];
switch ($cost) {
	case 300 :
		$type = 'Cake 1';
		break;
	case 400 :
		$type = 'Cake 2';
		break;
	case 500 :
		$type = 'Cake 3';
		break;
	case 600 :
		$type = 'Cake 4';
		break;
	case 700 :
		$type = 'Cake 5';
		break;
	default:
		echo"
            <script type=\"text/javascript\">
            	if ( window.confirm('Oops, Something went wrong. Just click OK to redirect to homepage.') ) {
					window.location.href='http://localhost/CakeFactory/';
				}
            </script>
        ";
		break;
}

$weight =  $_POST["weight"];
$total = $_POST["total"];

$sql = "INSERT INTO order_details (Type, Weight, Amount) VALUES ('".$type."', ".$weight.", ".$total.")";

$to = 'utkarshsoni12@gmail.com'; 
$subject = 'Order from Cake Factory'; 
$headers = "From: utkarshsoni.nptel@gmail.com\r\n";
$message = "Congrats!\r\nOrder details:-\r\nType: ".$type."\r\nWeight: ".$weight."\r\nTotal: ".$total."\r\nThank You."; 

if (mysqli_query($conn, $sql)) {
	if (mail($to, $subject, $message, $headers)) {
		echo"
            <script type=\"text/javascript\">
            	if ( window.confirm('Congrats, Order has been placed. Just click OK to redirect to homepage.') ) {
					window.location.href='http://localhost/CakeFactory/';
				}
            </script>
        ";
		// header('Location: http://localhost/CakeFactory');
		// exit;
	} else {
		echo"
            <script type=\"text/javascript\">
            	if ( window.confirm('Oops, Mail could not be send. Just click OK to redirect to homepage.') ) {
					window.location.href='http://localhost/CakeFactory/';
				}
            </script>
        ";
	}
} else {
	echo"
        <script type=\"text/javascript\">
        	if ( window.confirm('Oops, Order could not placed. Just click OK to redirect to homepage.') ) {
				window.location.href='http://localhost/CakeFactory/';
			}
        </script>
    ";
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>