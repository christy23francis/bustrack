

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content>
<meta name="author" content>
<link rel="icon" type="image/png" href="img/logo.png">
<title>OsahanBus - Bus Booking HTML Mobile Template</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css" />

<link href="css/custom.css" rel="stylesheet">

<link href="vendor/sidebar/demo.css" rel="stylesheet">
</head>
<body>

<div class="osahan-signup">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
        <a class="text-danger mr-3" href="get-started.php"><i class="icofont-rounded-left"></i></a>
        Create an account
        </h5>
    </div>

    <div class="p-3">
        <form action="action/concession_reg.php" autocomplete="off" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Name</label>
            <input type="test" class="form-control" name="name" required pattern="[a-zA-Z]*">
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Age</label>
            <input type="test" class="form-control" name="age" min="10" max="30" required>
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Gender</label>
            <select name="sex" class="form-control" required>
                <option value="">Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Transgender</option>
            </select>
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Address</label>
            <textarea rows="3" class="form-control" name="addr" required></textarea>
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Contact No</label>
            <input type="test" class="form-control" name"cntno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" >
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">College</label>
            <input type="test" class="form-control" name="clge" required>
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Aadhar</label>
            <input type="file" class="form-control" name="aadhar" accept=".pdf" required >
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Collge Id Card</label>
            <input type="file" class="form-control" name="idcrd" accept=".pdf" required >
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Photo</label>
            <input type="file" class="form-control" name="photo" accept=".png, .jpg, .jpeg" required >
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Emal</label>
            <input type="email" class="form-control" name="email" required >
        </div>
        <div class="form-group">
            <label class="text-muted f-10 mb-1">Password</label>
            <input type="password" class="form-control" name="password" required minlength="5" maxlength="15">
        </div>
        <button type="submit" class="btn btn-danger btn-block osahanbus-btn mb-3 rounded-1 mt-4">CREATE AN ACCOUNT</button>
            <p class="text-muted text-center small">By signing up you agree to our Privacy Policy and Terms.</p>
        </form>
        <div class="sign-or d-flex align-items-center justify-content-center mb-4">
            <hr class="mr-4">
        </div>
            <a href="get-started.php" class="btn btn-block rounded-1 google-btn osahanbus-social">
                LOGIN
            </a>
    </div>
</div>

<script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<script type="text/javascript" src="vendor/slick/slick.min.js"></script>

<script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>

<script src="js/custom.js" type="text/javascript"></script>
</body>
</html>