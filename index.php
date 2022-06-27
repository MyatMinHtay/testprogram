<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program</title>

    <!-- bootstrap css 1  -->
    <link href="./libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        body{
            background-color: black;
        }

        .btn{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-light mt-5">Click On A Link To Test The Program</h1>

        <div class="btn_container btn-group-vertical">
            
            <a href="weight_converter.php" class="btn btn-outline-primary fw-bold">Weight Converter</a>

            <a href="calculator.php" class="btn btn-outline-success fw-bold">Calculator</a>

            <a href="createprofile.php" class="btn btn-outline-danger fw-bold">Create Profile</a>

            <a href="fileupload.php" class="btn btn-outline-warning fw-bold">File Upload</a>

        </div>
       
    </div>

    <!-- bootstrap js 1  -->
    <script src="./libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>