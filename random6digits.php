

<input type="button" value="Generate!" onclick="location='random.php'" />


<?php 


$dbname = "test";

$dbuser = "root";

$dbpass = "mysql";

$dbhost = "localhost";


$link = new mysqli($dbhost, $dbuser, $dbpass,$dbname) ;

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 



 
$a=mt_rand(100000,999999);


//echo $a;
$b=mt_rand();


$query = "SELECT * FROM random";

    $result = mysqli_query($link,$query);
    $rows = mysqli_num_rows($result);
    
	for($j = 0; $j < $rows; ++$j){
            
            
			
			
			$row=mysqli_fetch_assoc($result);
			
						
			if($row["randomcol"]==$a)
			{
	
			do {
					echo "\n fetched";
					echo $row["randomcol"];
					echo "\n generated";
					echo $a;
					echo "\n repetition";
					$a=mt_rand(100000,999999);
					echo "\n Just after regeneration";
					echo $a;
					
				} while ($row["randomcol"]==$a);

			}
			
			
			
    }
	
	
	
	
	
//echo $b;

echo $a;

$sql = "INSERT INTO random ( idrandom,randomcol)
VALUES ($b,$a)";


$link->query($sql);



/*if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}*/

$link->close();
?>










