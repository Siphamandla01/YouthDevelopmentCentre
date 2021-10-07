<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Regional Manager Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/d2style.css">

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function goToNewPage()
        {
            var url = document.getElementById('activities').value;
            if(url != 'none') {
                window.location = url;
            }
        }
    </script>
</head>
<body>
<input type="checkbox" id="menu" name="">
<div class="sidebar">
    <div class="sidebar-brand">

        <h2>
            <img src="../image/circle-cropped.png"width="45px" height="45px" alt="">
            <span class="fa fa-user-o"></span>
            OAU
        </h2>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="home.html" ><span class="fa fa-home"></span><span>Home</span></a>
            </li>
            <li>
                <a href="profile.html"><span class="fa fa-user"></span><span>My Profile</span></a>
            </li>
            <li>
                <a href="programs.html"><span class="fa fa-clipboard"></span><span>Manage Programs</span></a>
            </li>
            <li>
                <a href="centres.html" class="active"><span class="fa fa-asterisk"></span><span>View Centres</span></a>
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
                <h4>Siphamandla Mncube</h4>
                <small>Regional Coordinator</small>
            </div>

            <img src="../image/image12.jpeg" width="30" height="30" >
            <div class="dropdown-content">
                <a href="profile.html"><p>My Profile</p></a>
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
                    <option value="centres.php">Active Centres</option>
                    <option value="declineC.html">Declined Applications</option>
                    <option value="inactiveC.html">Inactive Centres</option>
                </select>
                <input type=button value="Go" onclick="goToNewPage()" />
            </form>
        </div>


        <table class="table table-image">
            <div class="contain">
                <div class="row">
                    <div>
                        <style>
                            h1{text-align:center}
                            h1{color: rgb(138, 148, 0);}
                        </style>
                        <h1>Pending Appilications</h1>
                    </div>
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Reason</th>

                    </tr>
                    <button class="btn btn-info mr-1" href="#">Update</button>

                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Khayalethu Youth Centre</th>
                        <th scope="row">Pending</th>
                        <th scope="row">Missing Documents</th>


                    </tr>


                    </tbody>

                </div>
            </div>
        </table>

    </main>
</div>
</body>
</html>
