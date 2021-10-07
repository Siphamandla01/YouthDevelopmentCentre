<!DOCTYPE html>
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
    <title>Regional Manager Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/myprofile.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
<input type="checkbox" id="menu" name="">
<div class="sidebar">
    <div class="sidebar-brand">
        <img src="../images/circle-cropped.png"width="45px" height="45px" alt="">
            OAU
        </h2>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="dashboard.php" ><span class="fa fa-home"></span><span>Home</span></a>
            </li>
            <li>
                <a href="profile.php" class="active"><span class="fa fa-user"></span><span>My Profile</span></a>
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

    <header>
        <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">My Profile</span></p>
        <div class="user-wrapper" id="dropdown">
            <div>
                <tr>
                    <td><?php echo $fname; ?> <?php echo $lname; ?></td>
                </tr><br>
                <small>Regional Coordinator</small>
            </div>

            <img src="../image/image12.jpeg" width="30" height="30" >
            <div class="dropdown-content">
                <p><a href="../logout.php">Sign Out</a></p>
            </div>

        </div>
    </header>

    <main>
        <div class="headerProfile">
        </div>
        </br>
        <div class="row">
            <div class="container">
                <div class="">
                    <div class="column1">
                        <div class="card">
                            <img src="../image/image12.jpeg" alt="Profile picture" style="width:100%">
                            <div class="container">
                                <p class="title">Profile Picture</p>
                                <input type="file" name="profileImage" id="profileImage" class="form-control">
                                <p><button class="btnUpdate">Change</button></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="">

                    <div class="card">
                        <div class="pInfo-align">
                            <div class="container">
                                <div class="leftbox">
                                    <nav class="profile nav">
                                        <a onclick="tabs(0)" class="tab active">
                                            <i class="fa fa-user"></i>
                                        </a>&nbsp&nbsp
                                        <a onclick="tabs(1)" class="tab">
                                            <i class="fa fa-trophy"></i>
                                        </a>&nbsp&nbsp

                                    </nav>
                                </div>
                            </div>
                            <div class="rightbox">
                                <div class="profile tabshow">

                                    <h2>Personal Info </h2>
                                    <h4>First Name</h4>
                                    <input type="text" class="input" name="fname" value="<?php echo $fname; ?>">
                                    <h4>Last Name</h4>
                                    <input type="text" class="input" name="lname" value="<?php echo $lname; ?>">
                                    <h4>Date of Birth</h4>
                                    <input type="text" class="input" value="11 April 1996">
                                    <h4>Gender</h4>
                                    <input type="text" class="input" value="Male">
                                    <h4>Contact Number</h4>
                                    <input type="text" class="input" value="0832445723">
                                    <h4>Email  address</h></h4>
                                    <input type="text" class="input" name="email" value="<?php echo $email; ?>">
                                    <h4>Username</h4>
                                    <input type="text" class="input" name="lname" value="<?php echo $username; ?>"><br><br>
                                    <button class ="btnUpdate" name="update">Update</button>
                                </div>
                                <div class="archivement tabshow">
                                    <br>
                                    <h2> Archivements</h2>
                                    <br>
                                    <br>
                                    <h3>Qualifications</h3>
                                    <p>Honours in Information Systems </p>
                                    <br>
                                    <h3>Head Developer</h3>
                                    <p>Years in Position: 4</p>
                                    <br>

                                </div>
                                <div class="privacy tabshow">
                                    <h2> Settings</h2>
                                    <h3>Manage Email Notifications</h3>

                                    <h3>Manage Privacy Settings</h3>

                                    <h3>View Terms Of Use</h3>

                                    <button class = "btn" name="update">Update</button>
                                </div>
                                <script src="jquery/jquery.js"></script>
                                <script>
                                    const tabBtn = document.querySelectorAll(".tab");
                                    const tab = document.querySelectorAll(".tabshow");

                                    function tabs(panelIndex) {
                                        tab.forEach(function(node){
                                            node.style.display = "none"
                                        });
                                        tab[panelIndex].style.display = "block";
                                    }
                                    tabs(0);
                                </script>
                                <script>
                                    $(".tab").click(function(){
                                        $(this).addClass("active").siblings().removeClass("active");
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="carousel slide text-center">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                        </div>
    </main>
</div>
</body>
</html>