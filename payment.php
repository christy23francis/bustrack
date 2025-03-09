<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$result = $db->prepare("select * from passenger where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$name=$rows["name"];
		$cntno=$rows["cntno"];
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
        include("include/css.php")
    ?>
</head>
<body class="bg-light">

<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-danger" href="home.php"><i class="icofont-rounded-left"></i></a>
        </h5>
        <div class="ml-auto d-flex align-items-center">
            <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
            <a href="#" class="mx-4 text-white h6 mb-0"></a>
            <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
            <hr>
                <form action="action/payment.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="padding: 10px;">
                                <label class="control-label mb-10">Bus</label>
                                <input type="hidden" name="cname" value="<?php echo $name;?>">
                                <input type="hidden" name="ccntno" value="<?php echo $cntno;?>">
                                <input type="hidden" name="Log_Id" value="<?php echo $Log_Id;?>">
                                 <input list="BLog_Id" required class="form-control" name="BLog_Id" placeholder="Search">
                                <datalist id="BLog_Id">
                                    <option value="">Select</option> 
                                     <?php
                                        $result = $db->prepare("select distinct(bname) from  vehicle");
                                        $result->execute();
                                        for($i=0; $rows = $result->fetch(); $i++)
                                        {
                                        echo '<option>'.$rows['bname'].'</option>';
                                        }
                                    ?>	                                         					
                                </datalist>
                                 <label class="control-label mb-10">From</label>
                                 <input list="frm" required class="form-control" name="frm" placeholder="Start" id="from-dropdown">
                                <datalist id="frm">
                                    <option value="">Select</option> 
                                     <?php
                                        $result = $db->prepare("select distinct(stop) from  stops");
                                        $result->execute();
                                        for($i=0; $rows = $result->fetch(); $i++)
                                        {
                                        echo '<option>'.$rows['stop'].'</option>';
                                        }
                                    ?>	                                         					
                                </datalist>
                                 <label class="control-label mb-10">To</label>
                                 <input list="retrun" required class="form-control" name="retrun" placeholder="Stop" id="to-dropdown">
                                <datalist id="retrun">
                                    <option value="">Select</option> 
                                     <?php
                                        $result = $db->prepare("select distinct(stop) from  stops");
                                        $result->execute();
                                        for($i=0; $rows = $result->fetch(); $i++)
                                        {
                                        echo '<option>'.$rows['stop'].'</option>';
                                        }
                                    ?>	                                         					
                                </datalist>
                                <label class="control-label mb-10">Amount</label>
                                <input type="number" class="form-control" id="amt" readonly name="amt" required min="0" step="0.01">
                                <br>
                                <input type="submit" value="Pay" class="btn btn-danger  btn-block">
                            </div>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<?php
        include("include/sidebar.php")
    ?>
<?php
        include("include/js.php")
    ?>
    <script>
            // When either "From" or "To" dropdown value changes
        $('#from-dropdown, #to-dropdown').change(function() {
            var selectedFromStop = $('#from-dropdown').val();  // Get the selected "From" stop
            var selectedToStop = $('#to-dropdown').val();  // Get the selected "To" stop
            if (selectedFromStop && selectedToStop) {
                $.ajax({
                    url: 'action/calculate_fare.php', // Create this PHP file
                    type: 'POST',
                    data: {
                        fromStop: selectedFromStop,
                        toStop: selectedToStop
                    },
                    success: function(response) {
                        $('#amt').val(response);
                    }
                });
            }
        });
    </script>
    <script>
  $(document).ready(function() {
    $('#myLink').click(function(event) {
      event.preventDefault();  // Prevents the link from being followed
      alert('Link clicked, but no navigation happens!');
    });
  });
</script>
<script>
$(document).ready(function () {
    // Initially disable the "From" and "To" dropdowns
    $('#from-dropdown, #to-dropdown').prop('disabled', true);

    // When a bus is selected, fetch stops dynamically
    $("input[name='BLog_Id']").on('input', function () {
        var busName = $(this).val();

        if (busName) {
            // Enable the "From" and "To" dropdowns
            $('#from-dropdown, #to-dropdown').prop('disabled', false);

            // Make AJAX request to fetch stops for the selected bus
            $.ajax({
                url: 'action/fetch_stops.php',
                type: 'POST',
                data: { busName: busName },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        var stops = response.stops;

                        // Clear existing options and add new ones
                        $('#frm, #retrun').empty().append('<option value="">Select</option>');

                        stops.forEach(function (stop) {
                            $('#frm, #retrun').append('<option value="' + stop + '">' + stop + '</option>');
                        });
                    } else {
                        alert('No stops found for this bus.');
                        $('#from-dropdown, #to-dropdown').prop('disabled', true);
                    }
                },
                error: function () {
                    alert('Error fetching stops. Please try again.');
                }
            });
        } else {
            // If no bus is selected, disable "From" and "To" dropdowns
            $('#from-dropdown, #to-dropdown').prop('disabled', true);
        }
    });
});

</script>

</body>
</html>