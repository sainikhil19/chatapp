<html>
	<body>
		<?php
			$id = date("d")."".date("his");
			$uname = $_REQUEST['uname'];
			$msg = $_REQUEST['msg'];
			$con = new mysqli('localhost', 'root', '', 'chatdatabase');
			if($con){
				 //echo "connection established"."<br>";
			}
			$sql = "INSERT INTO LOGS VALUES ('$id', '$uname', '$msg')";
			if($con->query($sql)==TRUE){
					// echo '<script language="javascript">';
				  // echo 'alert(message successfully sent)';  //not showing an alert box.
				  // echo '</script>';
					echo "SENDING MESSAGE....";
				}
		?>

		<!-- <meta http-equiv="refresh" content="0;URL=index.php" /> -->
	</body>
</html>
