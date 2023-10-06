<?php  
    require_once 'connect.php';
    $db = new Database ("localhost", "SProject", "root", "");
     session_start();
if (isset($_SESSION["UID"])) {
    if ($_SESSION["UID"] != "admin") {
        header("location:admin.php");
    }
} else {
    header("location:admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <!-- navbar main -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100" style="z-index: 99; top:0;">
        <div class="container-fluid">
            <a class="navbar-brand " href="#">
                <img src="https://www.pnru.ac.th/storage/site-logo.png" alt="" width="38" height="38">
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="dashboard.php">จัดการ Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="member.php">จัดการสมาชิก</a>
                    </li>
                </ul>

                <form action="admin_process.php" method="post">
                    <!-- Button trigger modal -->

                    <button type="submit" name="logout" class="btn btn-outline-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    </form>
    </div>


    <form action="admin_process.php" method="post" style=" margin-bottom: 0px; margin-top: 90px">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="user" class="mb-1">Username</label>
                        <input type="text" name="n_user" placeholder="username" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%;">
                        <label for="pass" class="mb-1">Password</label>
                        <input type="password" name="pass" placeholder="password" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="rows container d-flex justify-content-center">
        <div class="col-12">
            <div style="margin-top: 1px; ; margin-bottom:0px;" class=" text-center text-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM admin_tbl";
                        $db->Query($sql);
                        $result=$db->fetchAll();
                        $index=0;
                        if (count($result)>0){
                          foreach($result as $row){
                            $index++;
                            echo"<tr>";
                            echo"<th scope='row'>".$index."</th>";
                            echo"<td>".$row["a_user"]."</td>";
                            echo"<td>";
                            echo"<div class='dropdown'>";
                            echo"<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>Edit</button>";
                            echo"<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>";
                            echo"<li><button type='button' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#ex".$row['id']."'>Edit</button></li>";
                            echo"<a class='dropdown-item' href='admin_process.php?id=".$row['id']."'>Delete</a>";
                            echo"</ul>";
                            echo"</div>";
                            echo"</td>";
                            echo"</tr>";
                          }
                        } else{
                            echo "ไม่พบข้อมูลผู้ใช้";
                        }
                        ?>                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php foreach($result as $row){
        echo "";
        ?>
    <form action="admin_process.php" method="post" style=" margin-bottom: 0px; margin-top: 90px">
        <!-- Modal -->
         <div class='modal fade' id="ex<?php echo $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="user" class="mb-1">Username</label>
                        <input type="text" name="a_user" placeholder="username" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%;">
                        <label for="pass" class="mb-1">Password</label>
                        <input type="password" name="a_pass" placeholder="password" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="another" value=<?php echo $row["id"]?>>Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>