
<?php
	define('DB_SERVER'  , 'us-cdbr-azure-southcentral-f.cloudapp.net');
	define('DB_USERNAME', 'b63846e152e580');
	define('DB_PASSWORD', '7917508a');
	define('DB_DATABASE', 'acsm_19d8be07abc1ab4');

	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	if($db -> connect_errno) {
		die('Connection failed [' . $db -> connect_errno . ']');
	}

	$sql_query = "SELECT * FROM clubs";
	$result = $db -> query($sql_query);

	while ($row = $result -> fetch_array()) {
		echo "<section class='block'>
		  		<img  id='cimg' src='assets/images/club.jpg'/>
		  		<section>
		  			<h1>" . $row['clubname'] . "</h1>
			    	<p>" . $row['longDescr'] . "</p>
			    	<div class='age-gr'>" . $row['age_group'] . "</div>
			    </section>
			  </section>";
	}

	$result -> close();
	$db -> close()
?>