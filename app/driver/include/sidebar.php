<?php
	$result = $db->prepare("select * from driver where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$sidebarname=$rows["name"];
		$sidebarphoto=$rows["photo"];
		$sidebarcntno=$rows["cntno"];
	}
	
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/favicon.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.php"><img src="assets/images/favicon.png" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-profile">
        <a href="profile.php" class="nav-link">
            <div class="nav-profile-image">
            <img src="../photos/<?php echo $sidebarphoto;?>" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2"><?php echo $sidebarname;?></span>
            <span class="font-weight-normal"><?php echo $sidebarcntno;?></span>
            </div>
        </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Payment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="payment">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="payment_request.php">Request</a>
                </li>
               
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bus" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Bus</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bus">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="bus_search.php">Search</a>
                </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#notificaton" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Nodification</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="notificaton">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="notification_send.php">Send</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notification.php">View</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#message" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Message</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="message">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="message_send.php">Send</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php">View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message_reply.php">Reply</a>
                </li>
                </ul>
            </div>
        </li>
    </ul>
    </nav>