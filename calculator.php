<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

    <!-- bootstrap css 1  -->
    <link href="./libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <style>
        body{
            height: 100vh;

            background-color: #f4f4f4;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            width: 300px;
            height: 550px;
            background-color: burlywood;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            border-radius: 10px;
            /* position: relative; */
        }

        .form-group{
            padding: 5px;
        }

        input,select{
            margin-top: 5px;
        }

    </style>
</head>
<body> 

    <?php 

        if(isset($_POST['btnSave'])){

            $firstvalue = $_POST['firstvalue'];
            $secondvalue = $_POST['secondvalue'];
            $operator = $_POST['operator'];

            switch($operator){
                case 'add':
                    $result = $firstvalue + $secondvalue;
                    break;
                case 'minus':
                    $result = $firstvalue - $secondvalue;
                    break;
                case 'multi':
                    $result = $firstvalue * $secondvalue;
                    break;
                default :
                    $result = $firstvalue / $secondvalue;
                    break;
            }
    ?>
        <div class="container">

            <h4 class="text-center">Calculator</h4>

            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                <div class="form-group">
                    <label for="fv" class="d-block">First Value</label>
                    <input type="text" name="firstvalue" class="form-control" id="fv" disabled value="<?php echo $firstvalue?>"/>
                </div>

                <div class="form-group">
                    <label for="sv" class="d-block">Second Value</label>
                    <input type="text" name="secondvalue" class="form-control" id="sv" disabled value="<?php echo $secondvalue?>"/>
                </div>

                <div class="form-group">
                    <label class="d-block">Choose Sign</label>
                    <select name="operator" class="form-control" disabled>
                        <option value="add" <?php if($operator == 'add'){ echo 'selected'; }?>>+</option>
                        <option value="minus" <?php if($operator == 'minus'){ echo 'selected'; }?>>-</option>
                        <option value="multi" <?php if($operator == 'multi'){ echo 'selected'; }?>>*</option>
                        <option value="divi" <?php if($operator == 'divi'){ echo 'selected'; }?>>/</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label for="result" class="d-block">Result</label>
                    <input type="text" name="result" id="result" class="form-control" disabled value="<?php echo $result?>"/>
                </div>

                <div class="form-group">
                    <a href="<?php echo $_SERVER['PHP_SELF']?>" class="btn btn-info btn-sm">Go Back</a>
                </div>

            </form>
        </div>

    <?php 
        }else{
    ?>  
        <div class="container">
        
            <h4 class="text-center d-inline">Calculator</h4>

            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                <div class="form-group">
                    <label for="fv" class="d-block">First Value</label>
                    <input type="text" name="firstvalue" class="form-control" id="fv"/>
                </div>

                <div class="form-group">
                    <label for="sv" class="d-block">Second Value</label>
                    <input type="text" name="secondvalue" class="form-control" id="sv"/>
                </div>

                <div class="form-group">
                    <label class="d-block">Choose Sign</label>
                    <select name="operator" class="form-control">
                        <option value="add" selected>+</option>
                        <option value="minus">-</option>
                        <option value="multi">*</option>
                        <option value="divi">/</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label for="result" class="d-block">Result</label>
                    <input type="text" name="result" id="result" class="form-control" disabled/>
                </div>

                <div class="form-group">
                    
                    <a href="index.php" class="btn btn-sm btn-dark text-light mt-1 mx-2">Go Back</a>

                    <input type="submit" name="btnSave" class="btn btn-info btn-sm mx-2" value="Calculate" />
                    
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