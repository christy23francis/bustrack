<?php
include('../../db_connect/db.php');
							
	$cntno=$_POST["cntno"];	
	$result = $db->prepare("select * from passenger where cntno='$cntno'");
	$result->execute();
		for($i=0; $rows = $result->fetch(); $i++)
		{
			
			$data["Log_Id"] = $rows["Log_Id"];	
			$data["name"] = $rows["name"];	
			$data["age"] = $rows["age"];	
			$data["sex"] = $rows["sex"];	
			$data["addr"] = $rows["addr"];
			$data["email"] = $rows["email"];
			$data["photo"] = $rows["photo"];
		}
		echo json_encode($data);
?>


                  		
                  								
                  							