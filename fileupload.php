<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file upload</title>

        <!-- bootstrap css 1  -->
        <link href="./libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <style>
            body{
                background-color: #eee;
            }
        </style>
</head>
<body>
        <?php 
            if (isset($_POST['btnUpload'])) {            
            $fileName = $_FILES['fileUpload']['name'];
            $temp = $_FILES['fileUpload']['tmp_name'];

            //sanitize the file name
            $fileNameArr = explode('.',$fileName);
            $newFileName = $fileNameArr[0];
            $newFileName = md5(time().$newFileName);
            $extension = $fileNameArr[1];

            $allowedFileType = ['jpg','png','txt'];

            if (in_array($extension,$allowedFileType)) {
                    //move upload file
                    $dest = "./uploaded_files/".$newFileName.".".$extension; //test.png
                    if (move_uploaded_file($temp,$dest)) {
                        $msg = "file upload success!";
                    } else {
                        $msg = "file uplad fail!. Make sure the uploaded directory is writable by the server";
                    }
                    
            } else {
                    $msg = "file upload fail!. allowed types are ". implode(',',$allowedFileType);
            }

            echo $msg;
           
        ?>
           
        <?php  
            } else {
        ?>

            <a href="index.php" class="btn btn-md btn-dark text-light mt-1 my-2 ms-2">Go Back</a>
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="fileUpload" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" name="btnUpload" class="form-control my-3" value="Upload">
                    </div>
                </form>
            </div>
            
        <?php 
            }        
        ?>

     <!-- bootstrap js 1  -->
     <script src="./libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>