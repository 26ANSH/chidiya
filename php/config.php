<?php
  $hostname = 'localhost:2000';
  $username = 'root';
  $password = 'root';
  $dbname = 'chatapp';

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if (!$conn) {
						echo "Error!".mysqli_connect_error();
					}
?>
x
