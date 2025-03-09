<?php
	$result = $db->prepare("select * from owner where Log_Id='$Log_Id'");
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
            <a class="nav-link" data-toggle="collapse" href="#driver" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Driver</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="driver">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="driver_register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="driver_search.php">Search</a>
                </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#conductor" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Conductor</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="conductor">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="conductor_register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conductor_search.php">Search</a>
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
                    <a class="nav-link" href="time_register.php">Time</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bus_search.php">Search</a>
                </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#wallet" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Wallet</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="wallet">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="wallet_register.php">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wallet_deposit.php">Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wllet_card.php">Card</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="report_payment.php">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="report_bus.php">Bus</a>
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