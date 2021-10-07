<?php require_once("../config.php");
if(!isset($_SESSION["login_sess"]))
{
    header("location:../login.php");
}
$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM reg WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
    $username = $res['username'];
    $fname = $res['fname'];
    $lname = $res['lname'];
    $email = $res['email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Regional Manager Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/d2style.css">

</head>
<body>
<input type="checkbox" id="menu" name="">
<div class="sidebar">
    <div class="sidebar-brand">

        <h2>
            <img src="../images/circle-cropped.png"width="45px" height="45px" alt="">
            <span class="fa fa-user-o"></span>
            OAU
        </h2>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="dashboard.php" class="active"><span class="fa fa-home"></span><span>Home</span></a>
            </li>
            <li>
                <a href="profile.php"><span class="fa fa-user"></span><span>My Profile</span></a>
            </li>
            <li>
                <a href="programs.php"><span class="fa fa-clipboard"></span><span>Manage Programs</span></a>
            </li>
            <li>
                <a href="centres.php"><span class="fa fa-asterisk"></span><span>View Centres</span></a>
            </li>
        </ul>
    </div>
</div>



<div class="content">
    <main>
        <div class="content">

            <header>
                <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Home</span></p>

                <div class="search-wrapper">
                    <span class="fa fa-search"></span>
                    <input type="search" name="" placeholder="Search here " />
                </div>

                <div class="user-wrapper" id="dropdown">
                    <div>
                        <tr>
                            <td><?php echo $fname; ?> <?php echo $lname; ?></td>
                        </tr><br>
                        <small>Regional Coordinator</small>
                    </div>

                    <img src="../image/image12.jpeg" width="30" height="30" >
                    <div class="dropdown-content">
                        <a href="profile.php"><p>My Profile</p></a>
                        <p><a href="../logout.php">Sign Out</a></p>
                    </div>

                </div>
            </header>

            <main>
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <?php
                            $count = 0;
                            $res=mysqli_query($dbc,"select * from program");
                            $count=mysqli_num_rows($res);
                            echo "<h2>$count</h2>";
                            ?>
                            <small>Total Programs</small>
                        </div>
                        <div>
                            <span class="fa fa-balance-scale"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $count = 0;
                            $res=mysqli_query($dbc,"select * from program WHERE status ='Active'");
                            $count=mysqli_num_rows($res);
                            echo "<h2>$count</h2>";
                            ?>
                            <small>Active Programs</small>
                        </div>
                        <div>
                            <span class="fa fa-rss"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $count = 0;
                            $res=mysqli_query($dbc,"select * from centre");
                            $count=mysqli_num_rows($res);
                            echo "<h2>$count</h2>";
                            ?>
                            <small>Active Centres</small>
                        </div>
                        <div>
                            <span class="fa fa-university"></span>

                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $count = 0;
                            $res=mysqli_query($dbc,"select * from reg WHERE userType = 'Student'");
                            $count=mysqli_num_rows($res);
                            echo "<h2>$count</h2>";
                            ?>
                            <small>Total students</small>
                        </div>
                        <div>
                            <span class="fa fa-group"></span>
                        </div>
                    </div>

                </div>

                <div class="composant">
                    <div class="ventes">
                        <div class="case">
                            <div class="header-case">
                                <h2>Currently Active Centres</h2>
                                <button class="button">See All<span class="fa fa-arrow-right"></span></button>
                            </div>
                            <div class="body-case">
                                <div class="tableau">
                                    <table width="100%">
                                        <thead>
                                        <tr>
                                            <td>Centre ID</td>
                                            <td>Name</td>
                                            <td>Status</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>RC01</td>
                                            <td>Bosasa C</td>
                                            <td><span class="status-produit color-three"></span>Active </td>
                                        </tr>
                                        <tr>
                                            <td>RC02</td>
                                            <td>Thusong C</td>
                                            <td><span class="status-produit color-three"></span>Active</td>
                                        </tr>
                                        <tr>
                                            <td>RC03</td>
                                            <td>Father Louis C</td>
                                            <td><span class="status-produit color-three"></span>Active</td>
                                        </tr>
                                        <tr>
                                            <td>RC04</td>
                                            <td>Iksasa Lethu C</td>
                                            <td><span class="status-produit color-one"></span>InActive</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="stock">
                        <div class="case">
                            <div class="header-case">
                                <h2>Notifications</h2>

                            </div>
                            <p>No new notifications</p>

                        </div>
                    </div>


            </main>
</div>
</body>
</html>
