<?php
  $hostname = 'qwiklabs-gcp-04-df912a8ed331:asia-south1:chatdata';
  $username = 'root';
  $password = 'M6tkP0l9e2zojrj6';
  $dbname = 'chatapp';

  $conn = mysqli_connect(null, $username, $password, $dbname, null, $hostname);
  if (!$conn) {
						echo "Error!".mysqli_connect_error();
					}
?>