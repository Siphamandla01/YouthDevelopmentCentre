<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <fieldset>
        <form class="form-group" method="post" action="program_process.php" enctype="multipart/form-data">
        <legend class="mt-5">Create a new program</legend>
        <div class="col-lg-7">
            Name:<br>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="col-lg-7 ">
            Description:<br>
            <input type="text" class="form-control" name="desc" required>
        </div>
        <div class="col-lg-7">
            Status:<br>
            <input type="text" class="form-control" name="status" required>
        </div>
        <div class="col-lg-7">
            Maximum Clients:<br>
            <input type="number" class="form-control" name="maxclients" required>
        </div>
            <div class="col-lg-7">
                <input type="file" class="form-control" name="prog_pic" required>
                <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
            </div>
        <div class="col-lg-7">
            Start Date:<br>
            <input type="date" class="form-control" name="startDate" required>
        </div>
        <br><br>
        <input type="submit" class="btn btn-primary" name="save" value="submit">
    </fieldset>
    </form>
</div>

</body>
</html>