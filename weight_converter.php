<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Converter</title>

    <!--Bs CSS 1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style type="text/css">
        body{
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            width: 800px;
            height: 400px;

            background-color: orange;
            display: flex;
            /* flex-direction: column; */
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .form-group{
            padding: 10px;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inputvalue{
            border: 0;
           background: transparent;
           border-bottom: 1px solid green;
        }

        .inputvalue:focus{
            outline: 0;
        }

        .link{
            position: absolute;
            top: 5%;
            left: 5%;
        }

        
    </style>
</head>
<body>
    <?php 
        if(isset($_GET['convertBtn'])){ 
            $inputvalue = $_GET['inputvalue'];
            $unit = $_GET['unit'];

            switch($unit){
                //pound to kg
                case 'kg':
                   $result = $inputvalue * 0.454 . 'kgs';
                    break;
                default:
                //kg to pound
                   $result = $inputvalue / 0.454 . 'pounds';
                    break;
            }
    ?>
            <div class="container col-6">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h3 class="text-center">Weight Converter</h3>

               
                    <div class="form-group">
                        <span class="text-center d-inline-block">Choose a unit to Convert : </span>

                        <input  type="radio" name="unit" id="kg" value="kg" <?php if($unit == 'kg') {echo 'checked';} ?> class="form-check-input"/>
                        <label for="kg" class="form-check-label"> Pounds to Kgs </label>

                        
                        <input type="radio" name="unit" id="pd" value="pd" <?php if($unit == 'pd') {echo 'checked';} ?>  class="form-check-input">
                        <label for="pd" class="form-check-label"> Kgs to Pounds </label>

                    </div> 
                       
                    <p class="text-center">Input Value</p>

                    <div class="form-group">
                        <input type="text" name="unitvalue" disabled value="<?php echo $inputvalue;?>"/>
                    </div>

                    <p class="text-center">Result</p>

                    <div class="form-group">
                        <input type="text" name="unitvalue" disabled value="<?php echo $result; ?>"/>
                    </div>

                    <div class="form-group">
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-success btn-sm"> Go Back</a>
                    </div>

                </form>
            </div>
   
   <?php 

        }else{ 
    ?>
        
            <div class="container col-6">
                <div class="link">
                    <a href="index.php" class="btn btn-sm btn-dark text-light">Go Back</a>
                </div>

                <form action="weight_converter.php" method="get">
                    <h3 class="text-center">Weight Converter</h3>
                    
                    <div class="form-group">
                        <span class="text-center d-inline-block">Choose a unit to Convert : </span>

                        <input  type="radio" name="unit" id="kg" value="kg" checked class="form-check-input"/>
                        <label for="kg" class="form-check-label"> Pounds to Kgs </label>

                        
                        <input type="radio" name="unit" id="pd" value="pd" class="form-check-input">
                        <label for="pd" class="form-check-label"> Kgs to Pounds </label>
                    </div>

                    <div class="form-group">
                        <p class="text-center">Input Value</p>
                    </div>

                    <div class="form-group">
                            <input type="text" name="inputvalue" class="inputvalue" autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="convertBtn" value="convert" class="btn btn-success"/>
                    </div>


                </form>
            </div>
    <?php 
        }
    ?>

    <!--BS JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>