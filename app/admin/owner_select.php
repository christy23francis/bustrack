<?php
include('../../db_connect/db.php');
							
	$oname=$_POST["oname"];	
	$result = $db->prepare("select * from owner where name='$oname'");
	$result->execute();
		for($i=0; $rows = $result->fetch(); $i++)
		{
			
			$data["Log_Id"] = $rows["Log_Id"];	
			$data["osex"] = $rows["sex"];	
			$data["oage"] = $rows["age"];	
			$data["oaddrs"] = $rows["addrs"];	
			$data["ocntno"] = $rows["cntno"];
			$data["ulocation"] = $rows["ulocation"];
				
		}
		echo json_encode($data);
?>


                  		
                  								
                  							