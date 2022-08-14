<!DOCTYPE html>
<html>
<head>
	<title>IMY 220 - Prac 2</title>
	<meta charset="utf-8" />
    <!-- Carlie van wyk -->
</head>
<body>
	
    <form action="" method="GET">
		<label for="nRows">Number of rows: </label>
		<input type="number" id="nRows" name="numRows" />
		<input type="submit" name="" value="Change"/>
	</form>
	
    <?php
		//task 1
		if(isset($_GET['numRows']) && $_GET['numRows'] != "") {
			$numRows = $_GET['numRows'];
		}
		else {
			$numRows = 1;
		}
		// if($numRows == null)
		// 	$numRows = 1;

		$filePath = "names.txt";
    	$numCols = count(file($filePath));
		$numCols = $numCols / $numRows;

		$file = fopen("names.txt", "r");

		echo "</br>
				<table border='1'>";

				
					for($i = 0; $i <= $numRows; $i++) {
						echo "<tr>";
						
							for($j = 0; $j <= $numCols; $j++) {
								if(!feof($file)) {
									$line = fgets($file);
									echo "<td>".$line."</td>";
								}
							}
						}
						echo "</tr>";
				
		fclose($file);

		echo "<table/> </br>";
	?>

	<form action="index.php" method="GET">
		<input type="submit" name="splitIntoGroups" value="Split and create groups"/>
	</form>

	<?php 
		$array1 = array();
		$array2 = array();

		$filePath = "names.txt";
    	$numLines = count(file($filePath));
		$numLinesArr1 = $numLines / 2;
		$numLinesArr2 = $numLines / 2;

		$file = fopen("names.txt", "r");
		$i = 0;
		while(!feof($file)) {
			$line = fgets($file);
			if($i < $numLinesArr1) {
				array_push($array1, $line);
			}
			else {
				array_push($array2, $line);
			}
			$i++;
		}
		fclose($file);

		//reverse array2
		$array2 = array_reverse($array2);

		//add arrays together with a comma seperating them
		foreach ($array2 as &$value) {
			$value = ' and ' . $value;
		}
		unset($value);

		$array3 = array();
		$k = 0;
		array_push($array2, "  ");
		foreach($array1 as &$value) {
			$value = $value . $array2[$k];
			array_push($array3, $value);
			$k++;
		}
		

		// echo "</br>";
		// echo "array1: ";
		// foreach($array1 as $value) {
		// 	echo $value . " ";
		// }

		// echo "</br>";
		// echo "array2: ";
		// foreach($array2 as $value) {
		// 	echo $value . " ";
		// }

		// echo "</br>";
		// echo "array3: ";
		// foreach($array3 as $value) {
		// 	echo $value . "<br/>";
		// }

		if(isset($_GET['splitIntoGroups'])) {
			echo "</br>
			</br>
					<table border='1'>";
						foreach($array3 as $value) {
							echo "<tr>";
							
								echo "<td>".$value."</td>";
	
							echo "</tr>";
						}
			echo "<table/> </br>";
		}
		else {
			echo "</br>";
		}

	?>
</body>
</html>