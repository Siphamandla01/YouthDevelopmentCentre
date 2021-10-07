<?php
//database connection  file
require_once("../config.php");
//Code for deletion
if(isset($_GET['delid']))
{
    $rid=intval($_GET['delid']);
    $sql=mysqli_query($dbc,"delete from centre where centreId=$rid");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'centres.php'</script>";
}
?>
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Regional Manager Centres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/d2style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        function goToNewPage()
        {
            var url = document.getElementById('activities').value;
            if(url != 'none') {
                window.location = url;
            }
        }
    </script>
    <style>
        .fa-eye{
            color: blue;
        }
        .fa-pencil{
            color: green;
        }
        .fa-trash{
            color: red;
        }
    </style>
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
                <a href="dashboard.php" ><span class="fa fa-home"></span><span>Home</span></a>
            </li>
            <li>
                <a href="profile.php"><span class="fa fa-user"></span><span>My Profile</span></a>
            </li>
            <li>
                <a href="programs.php"><span class="fa fa-clipboard"></span><span>Manage Programs</span></a>
            </li>
            <li>
                <a href="centres.php" class="active"><span class="fa fa-asterisk"></span><span>View Centres</span></a>
            </li>


        </ul>
    </div>
</div>



<div class="content">

    <header>
        <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Centres</span></p>

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
                <p>Sign Out</p>
            </div>

        </div>
    </header>

    <main>
        <div class="selection">
            <p>Please select the activity you would like to view</p>
            <form action="">
                <select name="activities" id="activities" class="custom-select mb-3">
                    <option selected>Select centre activity</option>
                    <option value="pendingC.php">Pending Applications</option>
                    <option value="declineC.html">Declined Applications</option>
                    <option value="inactiveC.html">Inactive Centres</option>
                </select>
                <input type=button class="btn btn-primary" value="Go" onclick="goToNewPage()" />
            </form>
        </div>


        <table class="table table-image">
            <div class="contain">
                <div class="row">
                    <div>
                        <style>
                            h1{text-align:center}
                            h1{color: rgba(4, 231, 16, 0.925);}
                        </style>
                        <h1>Active Centres</h1>
                    </div>
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Year Founded</th>
                        <th scope="col">Physical Address</th>
                        <th scope="col">Current Intake</th>
                        <th scope="col">Max Capacity</th>
                        <th scope="col">Image</th>
                    </tr>
                    <button class="btn btn-info mr-1" href="program_process.php">Update</button>
                    <button class="btn btn-primary button">See All<span class="fa fa-arrow-right"></span></button>

                    </thead>
                    <tbody>
                    <?php
                    $ret=mysqli_query($dbc,"select * from centre");
                    $cnt=1;
                    $row=mysqli_num_rows($ret);
                    if($row>0){
                        while ($row=mysqli_fetch_array($ret)) {

                            ?>
                            <!--Fetch the Records -->
                            <tr>
                                <td><?php  echo $row['name'];?></td>
                                <td><?php  echo $row['year_founded'];?></td>
                                <td><?php  echo $row['physical_address'];?></td>
                                <td><?php  echo $row['current_intake'];?></td>
                                <td><?php  echo $row['max_capacity'];?></td>
                                <td>
                                    <a href="centre_read.php?viewid=<?php echo htmlentities ($row['centreId']);?>" class="view" title="View" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                    <a href="centre_edit.php?editid=<?php echo htmlentities ($row['centreId']);?>" class="edit" title="Edit" data-toggle="tooltip"><span class="fa fa-pencil fa-fw"></span></a>
                                    <a href="centres.php?delid=<?php echo ($row['centreId']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><span class="fa-fw fa fa-trash"></span></a>
                                </td>
                            </tr>
                            <?php
                            $cnt=$cnt+1;
                        } } else {?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </div>
            </div>
        </table>

    </main>
</div>
</body>
</html>