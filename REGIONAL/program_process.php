<?php
//Database Connection file
include_once ('../config.php');
if(isset($_POST['save']))
{
    //getting the post values
    $name = mysqli_real_escape_string($dbc, $_POST['name']);
    $desc = mysqli_real_escape_string($dbc, $_POST['desc']);
    $status = mysqli_real_escape_string($dbc, $_POST['status']);
    $maxclients = mysqli_real_escape_string($dbc, $_POST['maxclients']);
    $startDate = mysqli_real_escape_string($dbc, $_POST['startDate']);
    $picture = $_FILES["prog_pic"]["name"];

    // get the image extension
    $extension = substr($picture,strlen($picture)-4,strlen($picture));
    // allowed extensions
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }else {
//rename the image file
        $imgnewfile = md5($imgfile) . time() . $extension;
// Code for move image into directory
        move_uploaded_file($_FILES["prog_pic"]["tmp_name"], "images" . $imgnewfile);


    // Query for data insertion
    $sql = "INSERT INTO program
	 VALUES ('','$name','$desc','$status','$maxclients','$imgnewfile','$startDate')";

    if (mysqli_query($dbc,$sql)) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='programs.php'; </script>";
    }
    else
    {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
    mysqli_close($dbc);

}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Add Program</title>
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
        .insert-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }
        .insert-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }
        .insert-form h2:before, .insert-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }
        .insert-form h2:before {
            left: 0;
        }
        .insert-form h2:after {
            right: 0;
        }
        .insert-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }
        .insert-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .insert-form .form-group {
            margin-bottom: 20px;
        }
        .insert-form input[type="checkbox"] {
            margin-top: 3px;
        }
        .insert-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }
        .insert-form .row div:first-child {
            padding-right: 10px;
        }
        .insert-form .row div:last-child {
            padding-left: 10px;
        }
        .insert-form a {
            color: #fff;
            text-decoration: underline;
        }
        .insert-form a:hover {
            text-decoration: none;
        }
        .insert-form form a {
            color: #5cb85c;
            text-decoration: none;
        }
        .insert-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="insert-form">
    <form  method="POST">
        <h2>Fill Data</h2>
        <p class="hint-text">Fill below form.</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="name" placeholder="Program Name" required="true"></div>
                <div class="col"><textarea type="text" class="form-control" name="desc" placeholder="Description" required="true"></textarea></div>
            </div>
        </div>
        <div class="form-group">
            <select name="status" class="form-control" required="true">
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Declined">Declined</option>

            </select>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="maxclients" placeholder="Maximum clients" required="true">
        </div>

        <div class="form-group">
            <input type="date" class="form-control" name="startDate" placeholder="Select a date" required="true">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="prog_pic"  required="true">
            <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="save">Submit</button>
        </div>

    </form>
    <div class="text-center">View Already Inserted Programs!!  <a href="programs.php">View</a></div>
</div>
</body>
</html>