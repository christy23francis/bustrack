<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_OWNER_ID'];
	$result = $db->prepare("select * from vehicle where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$bname=$rows["bname"];
	}
	
	$waltot=0;	
	$resultw = $db->prepare("select * from  deposit where OLog_Id='$Log_Id'");
	$resultw->execute();
	for($i=1; $rowsw = $resultw->fetch(); $i++)
	{
		$waltot=$waltot+$rowsw["amt"];
	}
	
	$bustot=0;	
	$resultbus = $db->prepare("select * from  payment where bname='$bname' and status='Accept'");
	$resultbus->execute();
	for($i=1; $rowsbus = $resultbus->fetch(); $i++)
	{
		$bustot=$bustot+$rowsbus["amt"];
	}
	
		
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    include("include/css.php");
  ?>
  </head>
  <body>
    <div class="container-scroller">
        <!-- Side Bar Start -->
          <?php
            include("include/sidebar.php");
          ?>
       <!-- Side Bar End -->
      <div class="container-fluid page-body-wrapper">
        
       <!-- Side Bar Start -->
       <?php
            include("include/header.php");
          ?>
       <!-- Side Bar End -->

        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back ! track my bus.</span>
              </h3>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Wallet Collection</p>
                            <h2 class="text-white"> <?php echo $waltot;?>.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                        <h6 class="text-white">Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Bus Collection</p>
                            <h2 class="text-white"> <?php echo $bustot;?>.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
                        <h6 class="text-white">Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Total Collection </p>
                            <h2 class="text-white"> <?php echo $bustot;?>.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        <h6 class="text-white">Since last month</h6>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Payment Analysis</h5>
                        <p class="text-muted"> Show overview dec 2024 - mar 2025
                        </p>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Collection</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">
                                <?php
									$tdc=0;	
									$dat=date("Y-m-d");
									$resultbus = $db->prepare("select * from  payment where bname='$bname' and date='$dat'");
									$resultbus->execute();
									for($i=1; $rowsbus = $resultbus->fetch(); $i++)
									{
										$tdc=$tdc+$rowsbus["amt"];
									}
									echo $tdc;
								?>
                                </h3>
                              </div>
                              <div id="earningChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Transfer</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">
                                <?php
									$tdc=0;	
									$dat=date("Y-m-d");
									$resultbus = $db->prepare("select * from  transfer where  date='$dat'");
									$resultbus->execute();
									for($i=1; $rowsbus = $resultbus->fetch(); $i++)
									{
										$tdc=$tdc+$rowsbus["amt"];
									}
									echo $tdc;
								?>
                                </h3>                               
                              </div>
                              <div id="productChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Wallet</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">
                                <?php
									$tdc=0;	
									$dat=date("Y-m-d");
									$resultbus = $db->prepare("select * from  deposit where OLog_Id='$Log_Id' and date='$dat'");
									$resultbus->execute();
									for($i=1; $rowsbus = $resultbus->fetch(); $i++)
									{
										$tdc=$tdc+$rowsbus["amt"];
									}
									echo $tdc;
								?>
                                </h3>
                              </div>
                              <div id="orderChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12">
                        <div class="flot-chart-wrapper">
                          <div id="flotChart" class="flot-chart">
                            <canvas class="flot-base"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Payment Request</h4>
                    <div class="table-responsive">
                     <table class="table">
                        <thead class="bg-light">
                          <tr>
                          	<th>Sl No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php							
						$tot=0;	
						$result = $db->prepare("select * from  payment where bname='$bname' and status='Pending'");
						$result->execute();
						for($i=1; $rows = $result->fetch(); $i++)
						{
							$tot=$tot+$rows["amt"];
						?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $rows["cname"];?></td>
                            <td><?php echo $rows["ccntno"];?></td>
                            <td><?php echo $rows["date"];?></td>
                            <td><?php echo $rows["frm"];?></td>
                            <td><?php echo $rows["retrun"];?></td>
                            <td><?php echo $rows["tme"];?></td>                           
                            <td><?php echo $rows["amt"];?></td>
                            <td>
                              <div class="badge badge-inverse-success"> <?php echo $rows["status"];?> </div>
                            </td>                           
                          </tr>
                         <?php
						}
						 ?> 
                         <tr>
                        	<th colspan="7">Total</th>
                            <th colspan="2"><?php echo $tot;?></th>
                        </tr>
                        </tbody>
                      </table>
                    </div>                   
                  </div>
                </div>
              </div>
          
            </div>            
            <div class="row">
              <div class="col-xl-8 grid-margin stretch-card">
                <div class="card card-calender">
                  <div class="card-body">
                    <div class="row pt-4">
                      <div class="col-sm-6">
                        <h1 class="text-white">10:16PM</h1>
                        <h5 class="text-white">Monday 25 January, 2025</h5>
                        <h5 class="text-white pt-2 m-0">Precipitation:50%</h5>
                        <h5 class="text-white m-0">Humidity:23%</h5>
                        <h5 class="text-white m-0">Wind:13 km/h</h5>
                      </div>
                      <div class="col-sm-6 text-sm-right pt-3 pt-sm-0">
                        <h3 class="text-white">Clear Sky</h3>
                        <p class="text-white m-0">Kerala, Palakkad</p>
                        <h3 class="text-white m-0">21°C</h3>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-sm-12">
                        <ul class="d-flex pl-0 overflow-auto">
                          <li class="weakly-weather-item text-white font-weight-medium text-center active">
                            <p class="mb-0">TODAY</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">MON</p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">TUE</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">WED</p>
                            <i class="mdi mdi-weather-fog"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">THU</p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">FRI</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">SAT</p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">SUN</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <!--datepicker-->
                <div class="card">
                  <div class="card-body">
                    <div id="inline-datepicker" class="datepicker table-responsive"></div>
                  </div>
                </div>
                <!--datepicker ends-->
              </div>
            </div>
          
          </div>
          <!-- Footer Start -->
            <?php
              include("include/footer.php");
            ?>
          <!-- Footer End -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   
    <?php
      include("include/js.php");
    ?>
  </body>
</html>