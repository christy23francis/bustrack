<?php
	$result = $db->prepare("select * from passenger where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$navname=$rows["name"];		
		$navcntno=$rows["cntno"];
		$navphoto=$rows["photo"];
	}	
?>
<nav id="main-nav">
    <ul class="second-nav">
        
        <li>
            <a href="#" class="bg-danger sidebar-user d-flex align-items-center py-4 px-3 border-0 mb-0">
                <img src="app/photos/<?php echo $navphoto?>" class="img-fluid rounded-pill mr-3" width="70">
                <div class="text-white">
                    <h6 class="mb-0"><?php echo $navname?></h6>
                    <small><?php echo $navcntno?></small><br>
                    <span class="f-10 text-white-50">Version 1.32</span>
                </div>
             </a>
        </li>
    
        <li><a href="home.php"><i class="icofont-ui-home mr-2"></i> Home</a></li>
        <!-- <li><a href="bus.php"><i class="icofont-sale-discount mr-2"></i> Bus</a></li>
        <li><a href="list_bus.php"><i class="icofont-list mr-2"></i> Listing</a></li>
        <li><a href="payment_fisrt.php"><i class="icofont-file-text mr-2"></i> Payment</a></li> -->
        <li><a href="ticket_list.php"><i class="icofont-id-card mr-2"></i> My Tickets</a></li>
        <li><a href="wallet.php"><i class="icofont-id-card mr-2"></i> Wallet</a></li>
        <li><a href="transfer.php"><i class="icofont-ui-v-card mr-2"></i> Transfer</a></li>
        <li><a href="history.php"><i class="icofont-ui-v-card mr-2"></i> History</a></li>
        <li><a href="notification.php"><i class="icofont-ui-v-card mr-2"></i> Notifications</a></li>
        <li><a href="profile.php"><i class="icofont-ui-v-card mr-2"></i> Profile</a></li>
        <li>
            <a href="#"><i class="icofont-page mr-2"></i> Complaint</a>
            <ul>
                <li><a href="complaint_send.php">Send</a></li>
                <li><a href="complaint_view.php">View</a></li>
                <li><a href="complaint_reply.php">Reply</a></li>
            </ul>
        </li>
        <li><a href="index.php"><i class="icofont-ui-v-card mr-2"></i> Logout</a></li>
    </ul>
</nav>
