<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- bootstrap css 1  -->
    <link href="./libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        body{
            height: 100vh;

            background-color: #eee;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container{
            width: 500px;
            height: 600px;

            
            padding: 20px;
            
            border-radius: 10px;

            background-color: bisque;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-group{
            margin: 10px 0;
        }

        .card{
            width: 500px;
            height: 550px;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 10px;
            background-color: bisque;
        }

        

        .img_container{
            width: 150px;
            height: 150px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 50%;
            
        }

        .btncontainer{
            margin-bottom: 25px;
        }

        
    </style>

</head>
<body>
        <?php 
            if(isset($_POST['btnSave'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $role = $_POST['role'];

                $filename = $_FILES['uploadfile']['name'];
            
                $temp = $_FILES['uploadfile']['tmp_name'];
        
                $fileNameArr = explode('.',$filename);
                $newFileName = $fileNameArr[0];
                $newFileName = md5(time().$newFileName);
                $extension = $fileNameArr[1];
                
                $allowedFileType = ['jpg','png','txt'];
                //mn ad sv
                switch($role){
                    case 'mn':
                        $role = 'Manager';
                        break;
                    case 'ad':
                        $role = 'Admin';
                        break;
                    default :
                        $role = "Supervisor";
                        break;

                }

                if(in_array($extension,$allowedFileType)){
                    //move upload file
                    $dest = "./uploaded_files/".$newFileName.".".$extension;
                    if(move_uploaded_file($temp,$dest)){
                        $msg =  "";
        ?>
                    
                    <div class="card">
                            
                            
                        <div class="img_container" style="background: url(<?php echo $dest ?>);  background-repeat: no-repeat; background-position: center; background-size: cover;">
                            
                        </div>

                        <div class="card-body">
                            <p>ID :<span><?php echo $id; ?></span></p>
                            <p>Name : <span><?php echo $name; ?></span></p>
                            <p>Age : <span><?php echo $age; ?></span></p>
                            <p>Role : <span><?php echo $role; ?></span></p>
                        </div>

                        <div class="btncontainer">
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="btn btn-sm btn-info">Go Back</a>
                        </div>
                        
                    </div>

        <?php 
            }else{
                $msg = "file upload fail!. Make sure the uploaded directory is writable by the server";
            }
            }else{
                $msg = "file upload fail!. allowed types are ". implode(',',$allowedFileType);
            }

                
                
        ?>
            
            <div class="text-center text-danger mb-2">
                <p class=""><?php if($msg){ echo $msg; } ?></p>
            </div>

                    
        <?php 
            }else{
        ?>

        

            <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

                    <h6 class="text-center">Fill in the form</h6>

                    <div class="form-group">
                        <label>ID</label>
                        <select name="id" class="form-control">
                            <option value="chid" selected disabled>Choose ID</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name"/>
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control" placeholder="Enter Age"/>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="chrole" selected disabled>Choos Role</option>
                            <option value="mn">Manager</option>
                            <option value="ad">Admin</option>
                            <option value="sv">Supervisor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Upload Profile Picture</label>
                        <input type="file" name="uploadfile"  class="form-control"/>
                    </div>

                    <div class="form-group">
                        <a href="index.php" class="btn btn-md btn-dark text-light mt-1 me-5">Go Back</a>

                        <input type="submit" class="btn btn-success btn-md mt-1 float-end" name="btnSave" value="Save" />
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