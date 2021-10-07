<?php
//database connection  file
require_once("../config.php");
//Code for deletion
if(isset($_GET['delid']))
{
    $rid=intval($_GET['delid']);
    $picture=$_GET['ppic'];
    $ppicpath="images"."/".$picture;
    $sql=mysqli_query($dbc,"delete from program where program_ID=$rid");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'programs.php'</script>";
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
    <title>Regional Manager Programs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/d2style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a href="programs.php" class="active"><span class="fa fa-clipboard"></span><span>Manage Programs</span></a>
            </li>
            <li>
                <a href="centres.php"><span class="fa fa-asterisk"></span><span>View Centres</span></a>
            </li>


        </ul>
    </div>
</div>



<div class="content">

    <header>
        <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Manage Programs</span></p>

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
                <a href="profile.html"><p>My Profile</p></a>
                <p><a href="../logout.php">Sign Out</a></p>
            </div>

        </div>
    </header>

    <main>
        <div class="addNew">
            <h1>Our Programs</h1>
            <a href="program_process.php" class="btn btn-success pull-right">Add new Program</a>
            <br><br>
            <p>These are the programs which are currently offered at our centres</p>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Program Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Maximum Clients</th>
                    <th>Start Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $ret=mysqli_query($dbc,"select * from program");
                $cnt=1;
                $row=mysqli_num_rows($ret);
                if($row>0){
                    while ($row=mysqli_fetch_array($ret)) {

                        ?>
                        <!--Fetch the Records -->
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><img src="../images<?php echo $row['picture'];?>" width="80" height="80"></td>
                            <td><?php  echo $row['name'];?></td>
                            <td><?php  echo $row['desc'];?></td>
                            <td><?php  echo $row['status'];?></td>
                            <td> <?php  echo $row['maxclients'];?></td>
                            <td> <?php  echo $row['startDate'];?></td>
                            <td>
                                <a href="read.php?viewid=<?php echo htmlentities ($row['program_ID']);?>" class="view" title="View" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                <a href="edit.php?editid=<?php echo htmlentities ($row['program_ID']);?>" class="edit" title="Edit" data-toggle="tooltip"><span class="fa fa-pencil fa-fw"></span></a>
                                <a href="programs.php?delid=<?php echo ($row['program_ID']);?>&&ppic=<?php echo $row['picture'];?>?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><span class="fa-fw fa fa-trash"></span></a>
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
            </table>
        </div>
            <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>
    </main>
</div>
</body>
</html>