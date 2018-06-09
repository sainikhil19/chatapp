<html>
	<body>
		<?php
			$con = new mysqli('localhost', 'root', '', 'chatdatabase');
			if($con){
					$result = $con->query("SELECT * FROM logs where id ORDER BY id ASC");
					while($row=$result->fetch_assoc()){
							echo "<span style='text-transform: capitalize;'><b>".$row['username']."</b></span>: <span>".$row['msg']."</span><br>";
						}
			}
		?>
	</body>
</html>
