<?php
	$result = $db->prepare("select * from admin where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$headername=$rows["name"];
		$headerphoto=$rows["photo"];
	}
	
?>
 <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.php"><img src="assets/images/favicon.png" alt="logo" /></a>
    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
        <i class="mdi mdi-menu"></i>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
        </a>
        <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
            <h6 class="p-3 mb-0">Notifications</h6>
              <?php
				$result = $db->prepare("select * from notification limit 2");
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++)
				{
				?>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="../photos/<?php echo $row["photo"];?>" alt="" class="profile-pic" />
            </div>
            <div class="preview-item-content">
                <p class="mb-0"> <?php echo $row["name"];?> <span class="text-small text-muted"><?php echo $row["subj"];?> </span>
                </p>
            </div>
            </a>
           <?php }?> 
            
            <div class="dropdown-divider"></div>
            <a  href="notification.php" class="p-3 mb-0">View All Notifications</a>
        </div>
        </li>
        
        <li class="nav-item dropdown d-none d-sm-flex">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-email-outline"></i>
        </a>
        <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0">Messages</h6>
             <?php
				$result = $db->prepare("select * from message where status='Pending' limit 2");
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++)
				{
				?>
            <a class="dropdown-item preview-item">
            <div class="preview-item-content flex-grow">
                <span class="badge badge-pill badge-warning"><?php echo $row["status"];?></span>
                <p class="text-small text-muted ellipsis mb-0"> <?php echo $row["subj"];?> </p>
            </div>
            <p class="text-small text-muted align-self-start"> <?php echo $row["data"];?> </p>
            </a>
             <?php }?> 
            <a href="message.php" class="p-3 mb-0">See All Message</a>
        </div>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
        
        <li class="nav-item nav-profile dropdown border-0">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
            <img class="nav-profile-img mr-2" alt="" src="../photos/<?php echo $headerphoto?>" />
            <span class="profile-name"><?php echo $headername?></span>
        </a>
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-cached mr-2 text-success"></i>Profile </a>
            <a class="dropdown-item" href="../index.php">
            <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
        </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
    </button>
    </div>
</nav>