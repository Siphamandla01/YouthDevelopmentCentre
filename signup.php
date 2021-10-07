<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
    <title> SignUp </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="row">
            <?php

            $sqli = 'SELECT * FROM program WHERE status="Active"';
            $all_programs = mysqli_query($dbc,$sqli);
            $sqli2 = 'SELECT * FROM city';
            $all_city = mysqli_query($dbc,$sqli2);
            if(isset($_POST['signup'])){
                extract($_POST);
                if(strlen($fname)<3){ // Minimum
                    $error[] = 'Please enter First Name using 3 atleast characters .';
                }
                if(strlen($fname)>20){  // Max
                    $error[] = 'First Name: Max length 20 Characters Not allowed';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
                    $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
                }
                if(strlen($lname)<3){ // Minimum
                    $error[] = 'Please enter Last Name using 3 atleast characters .';
                }
                if(strlen($lname)>20){  // Max
                    $error[] = 'Last Name: Max length 20 Characters Not allowed';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
                    $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
                }
                if(strlen($username)<3){ // Change Minimum Length
                    $error[] = 'Please enter Username using 3 atleast characters .';
                }
                if(strlen($username)>50){ // Change Max Length
                    $error[] = 'Username : Max length 50 Characters Not allowed';
                }
                if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
                    $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername, okuniqueuser or myusername123';
                }
                if(strlen($email)>50){  // Max
                    $error[] = 'Email: Max length 50 Characters Not allowed';
                }
                if($passwordConfirm ==''){
                    $error[] = 'Please confirm the password.';
                }
                if($password != $passwordConfirm){
                    $error[] = 'Passwords do not match.';
                }
                if(strlen($password)<5){ // min
                    $error[] = 'The password is 6 characters long.';
                }

                if(strlen($password)>20){ // Max
                    $error[] = 'Password: Max length 20 Characters Not allowed';
                }
                $sql="select * from reg where (username='$username' or email='$email');";
                $res=mysqli_query($dbc,$sql);
                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);

                    if($username==$row['username'])
                    {
                        $error[] ='Username already Exists.';
                    }
                    if($email==$row['email'])
                    {
                        $error[] ='Email already Exists.';
                    }
                }
                if(!isset($error)){
                    $date=date('Y-m-d');
                    $options = array("cost"=>4);
                    $password = password_hash($password,PASSWORD_BCRYPT,$options);
                    $progId = mysqli_real_escape_string($dbc,$_POST['Program']);
                    $cityId = mysqli_real_escape_string($dbc,$_POST['City']);

                    $result = mysqli_query($dbc,"INSERT into reg (`fname`, `lname`, `username`, `email`, `password`, `date`, `programId_fk`, `city_fk`, `userType`) values('$fname','$lname','$username','$email','$password','$date','$progId','$cityId',default)");

                    if($result)
                    {
                        $done=2;
                    }
                    else{
                        $error[] ='Failed : Something went wrong';
                        die(mysqli_error($dbc));
                    }
                }
            } ?>

            <div class="col-sm-4">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<p class="errmsg">&#x26A0;'.$error.' </p>';
                    }
                }
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                ?>
            </div>
            <div>
                <?php if(isset($done))
                { ?>
                    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
                <?php } else { ?>
                <div class="form-group">
                    <form action="" method="POST">
                        <h3 class="mb-5 text-uppercase">Student registration form</h3>
                        <div class="form-row">
                            <div class="form-group mr-5">

                                <label class="label_txt">First Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
                            </div>
                            <div class="form-group mr-5">
                                <label class="label_txt">Last Name </label>
                                <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mr-5">
                                <label class="label_txt">Username </label>
                                <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
                            </div>

                            <div class="form-group mr-5">
                                <label class="label_txt">Email </label>
                                <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mr-5">
                                <label class="label_txt">Password </label>
                                <input type="password" name="password" class="form-control" required="">
                            </div>
                            <div class="form-group mr-5">
                                <label class="label_txt">Confirm Password </label>
                                <input type="password" name="passwordConfirm" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mr-5 ">
                                <p class="label_txt">Program I am applying for:</p>
                                <select name="Program" class="form-control">
                                    <?php

                                    while ($program = mysqli_fetch_array($all_programs,MYSQLI_ASSOC)):;
                                        ?>
                                        <option value="<?php echo $program["program_ID"];
                                        ?>"><?php echo $program['name']?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form_group mr-7">
                                <p class="label_txt">I am located at:</p>
                                <select name="City" class="form-control">
                                    <?php

                                    while ($City = mysqli_fetch_array($all_city,MYSQLI_ASSOC)):;
                                        ?>
                                        <option value="<?php echo $City["City_ID"];
                                        ?>"><?php echo $City['name']?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                        </div>

                        <div>
                            <br>
                            <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">Sign Up</button>
                            <p>Have an account?  <a href="login.php">Log in</a> </p>
                        </div>

                    </form>
                    <?php } ?>
                </div>
            </div>



    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
