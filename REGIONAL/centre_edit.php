<?php
//Database Connection
include('../config.php');
if(isset($_POST['submit']))
{
    $eid=$_GET['editid'];
    //Getting Post Values
    $name = $_POST['name'];
    $year_founded = $_POST['year_founded'];
    $physical_address = $_POST['physical_address'];
    $current_intake = $_POST['current_intake'];
    $max_capacity = $_POST['max_capacity'];

    //Query for data update
    $query=mysqli_query($dbc,"UPDATE `centre` SET `name` = '$name ', `year_founded` = '$year_founded', `physical_address` = '$physical_address', `current_intake` = '$current_intake', `max_capacity` = '$max_capacity' WHERE `centre`.`centreId` = '$eid'");

    if ($query) {
        echo "<script>alert('You have successfully updated the Centre');</script>";
        echo "<script type='text/javascript'> document.location ='centres.php'; </script>";
    }
    else
    {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location ='centres.php'; </script>";
    }
    mysqli_close($dbc);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Update page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
        }
        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }
        .form-control:focus {
            border-color: #5cb85c;
        }
        .form-control, .btn {
            border-radius: 3px;
        }
        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }
        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }
        .signup-form h2:before, .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }
        .signup-form h2:before {
            left: 0;
        }
        .signup-form h2:after {
            right: 0;
        }
        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }
        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }
        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }
        .signup-form .row div:first-child {
            padding-right: 10px;
        }
        .signup-form .row div:last-child {
            padding-left: 10px;
        }
        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover {
            text-decoration: none;
        }
        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }
        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="signup-form">
    <form  method="POST">
        <?php
        $eid=$_GET['editid'];
        $ret=mysqli_query($dbc,"select * from centre where centreId='$eid'");
        while ($row=mysqli_fetch_array($ret)) {
            ?>
            <h2>Update </h2>
            <p class="hint-text">Update Centre info.</p>
           <!-- <div class="form-group">
                <img src="../images<?php  echo $row['picture'];?>" width="120" height="120">
                <a href="change-image.php?userid=<?php echo $row['program_ID'];?>">Change Image</a>
            </div> -->
            <div class="form-group">
                Name:<br>
                <div><input type="text" class="form-control" name="name" value="<?php  echo $row['name'];?>" required="true"></div
            </div>
            <div class="form-group">
                Year Founded:<br>
                <div><input type="date" class="form-control" name="year_founded" value="<?php echo $row['year_founded'];?>"></div>
            </div>
            <div class="form-group">
                Physical Address:<br>
                <div><input type="text" class="form-control" name="physical_address" value="<?php echo $row['physical_address'];?>"></div>
            </div>
            <div class="form-group">
                Current Number Of Students<br>
                <input type="number" class="form-control" name="current_intake" value="<?php  echo $row['current_intake'];?>" required="true">
            </div>
            <div class="form-group">
                Maximum Capacity<br>
                <input type="number" class="form-control" name="max_capacity" value="<?php  echo $row['max_capacity'];?>" required="true">
            </div>


            <?php
        }?>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>
    <div class="text-center"><a href="centres.php">Back</a></div>
</div>
</div>
</body>
</html>