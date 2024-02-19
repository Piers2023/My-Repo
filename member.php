<?php
require_once 'connect.php';
$db = new Database("localhost", "SProject", "root", "");
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
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
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
                    <li class="nav-item">
                        <a class="nav-link " href="history.php">ประวัติการจองสมาชิก</a>
                    </li>
                </ul>
            
                <form class="d-flex me-5" action="member_process.php" method="get">
      <input class="form-control w-100 me-3" name="number" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

                <button type="button" name="scan" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#scanx"><img width="20px" height="20px" src="https://cdn.discordapp.com/attachments/1154752366537621634/1172175111252607026/scanner.png?ex=655f5c24&is=654ce724&hm=194e7bf711e0abeb7a0e057458531a16a8ed4f7bf01295f5cca1c323df967754&" alt=""></button>
                <button type="button" name="logout" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>

            </div>
        </div>
    </nav>
    </div>


    <div class='modal fade' id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Confirm?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="width: 4.5rem;" data-bs-dismiss="modal">No</button>
                    <form action="admin_process.php" method="post">
                        <!-- Button trigger modal -->

                        <button type="submit" name="logout" class="btn btn-outline-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="rows container d-flex justify-content-center">
        <div class="col-12">
            <div style="margin-top: 1px; ; margin-bottom:0px;" class=" text-center text-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">รหัสนักศึกษา</th>
                            <th scope="col">ชื่อ-สกุล</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เวลาเริ่ม</th>
                            <th scope="col">เวลาสิ้นสุด</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $table;
                        if (isset($_SESSION["UID"])) {
                            if ($_SESSION["UID"] == "admin") {
                                if (isset($_GET["table"])) {
                                    $table = $_GET["table"];
                                } else {
                                    $table = "LS1";
                                }
                            }
                        }
                        ?>

                            <div class="btn-group" role="group" style="margin-top: 90px;" aria-label="Basic outlined example">
                            <a href="member.php?table=LS1" class="btn <?php echo ($table == "LS1") ? "btn-primary" : "btn-outline-primary"; ?>">LS1</a>
                            <a href="member.php?table=LS2" class="btn <?php echo ($table == "LS2") ? "btn-primary" : "btn-outline-primary"; ?>">LS2</a>
                            <a href="member.php?table=LS3" class="btn <?php echo ($table == "LS3") ? "btn-primary" : "btn-outline-primary"; ?>">LS3</a>
                            <a href="member.php?table=freezone" class="btn <?php echo ($table == "freezone") ? "btn-primary" : "btn-outline-primary"; ?>">Freezone</a>

                    </div>
                        <br>
                        <?php
                        $sql = "SELECT * FROM $table JOIN member_tbl ON $table.std_id = member_tbl.std_id";
                        $db->Query($sql);
                        $result = $db->fetchAll();
                        $index = 0;
                        if (count($result) > 0) {
                            foreach ($result as $row) {
                                if ($row["status"] == ""){

                                
                                $index++;
                                echo "<tr>";
                                echo "<th scope='row'>" . $index . "</th>";
                                echo "<td>" . $row["std_id"] . "</td>";
                                echo "<td>" . $row["std_name"] . "</td>";
                                echo "<td>" . $row["srt_day"] . "</td>";
                                echo "<td>" . $row["srt_time"] . "</td>";
                                echo "<td>" . $row["end_time"] . "</td>";
                                echo "<td>";
                                echo "<div class='dropdown'>";
                                echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>Edit</button>";
                                echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>";
                                echo "<li><button type='button' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#ex" . $row['id'] . "'>Edit</button></li>";
                                echo "<li><button type='button' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#dl" . $row['id'] . "'>Delete</button></li>";
                                echo "";
                                echo "</ul>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                                }
                            }
                        } else {
                            echo "ไม่พบข้อมูลผู้ใช้";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php foreach ($result as $row) {
        echo "";
    ?>
        <form action="member_process.php" method="post" style=" margin-bottom: 0px; margin-top: 90px">
            <!-- Modal -->
            <div class='modal fade' id="ex<?php echo $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?php echo $table ?>" name="table">
                            <label for="user" class="mb-1">รหัสนักศึกษา</label>
                            <input type="text" value=<?php echo $row["std_id"] ?> name="std_id" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%; height: 2rem;">
                            <label for="user" class="mb-1">ชื่อ-สกุล</label>
                            <input type="text" value="<?php echo $row["std_name"] ?>" name="std_name" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%; height: 2rem;">
                            <label for="pass" class="mb-1">วันที่</label>
                            <input type="text" value="<?php echo $row["srt_day"] ?>" name="srt_day" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%; height: 2rem;">
                            <label for="pass" class="mb-1">เวลาเริ่ม</label>
                            <input type="time" value=<?php echo $row["srt_time"] ?> name="srt_time" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%; height: 2rem;">
                            <label for="pass" class="mb-1">สิ้นสุด</label>
                            <input type="time" value=<?php echo $row["end_time"] ?> name="end_time" style="border-radius: 10px; display: block; margin-bottom: 9px; width: 50%; height: 2rem;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php }
    ?>

    <?php foreach ($result as $row) {
        echo "";
    ?>

        <!-- Modal -->
        <div class='modal fade' id="dl<?php echo $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Confirm?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="width: 4.5rem;" data-bs-dismiss="modal">No</button>
                        <a class="btn btn-danger" style="width: 4.5rem;" href="member_process.php?id= <?php echo $row["std_id"] . "&table=$table" ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <?php }
    ?>
        <!-- Modal -->
        <div class="modal fade" id="scanx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div id="reader" width="600px"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    

<?php if (isset($_SESSION["validate"])) {
    $resultnumber = $_SESSION["validate"];
    $sql = "SELECT * FROM history WHERE number = ?";
$db->executeInsert($sql);
$db->executeQuery([(int)$resultnumber]);
$result = $db->fetchAll();
?>
    <div class="rows ">
        <div class="col d-flex justify-content-center">
            <div class="modal-dialog position-fixed w-100" style="z-index: 100; top: 8rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!</h5>
                    </div>
                    <div class="modal-body text-center fs-3">
                        <?php if($db->rowCount() > 0){?>
                            <p class="">รหัสนักศึกษา : <?php echo $result[0]["std_id"] ?></p>
                                    <p class="">ชื่อ : <?php echo $result[0]["std_name"] ?></p>
                                    <p class="">วันที่ : <?php echo $result[0]["srt_day"] ?></p>
                                    <p class="">เวลา : <?php echo $result[0]["srt_time"] . "-" . $result[0]["end_time"] ?></p>
                                    <p class="">ห้อง : <?php echo $result[0]["room"] ?></p>
                                    <p class="">เลขที่ : <?php echo $result[0]["number"] ?></p>
                        
                    </div>
                    <div class="modal-footer">
                        
                        <a href="/member.php" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</a>
                        <a href="/Accept.php?std_id=<?php echo $result[0]["std_id"] ?>&table=<?php echo $result[0]["room"] ?>" class="btn btn-success" data-bs-dismiss="modal">Accept</a>
                        <a href="/Decline.php?std_id=<?php echo $result[0]["std_id"] ?>&table=<?php echo $result[0]["room"] ?>&code=<?php echo  $result[0]["number"] ?>" class="btn btn-danger" data-bs-dismiss="modal">Decline</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php unset($_SESSION["validate"]);
} ?>

<?php if (isset($_SESSION["search"])) {
    $resultnumber = $_SESSION["search"];
    $sql = "SELECT * FROM history WHERE number = ?";
$db->executeInsert($sql);
$db->executeQuery([(int)$resultnumber]);
$result = $db->fetchAll();
?>
    <div class="rows ">
        <div class="col d-flex justify-content-center">
            <div class="modal-dialog position-fixed w-100" style="z-index: 100; top: 8rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!</h5>
                    </div>
                    <div class="modal-body text-center fs-3">
                        <?php if($db->rowCount() == 1){?>
                            <p class="">รหัสนักศึกษา : <?php echo $result[0]["std_id"] ?></p>
                                    <p class="">ชื่อ : <?php echo $result[0]["std_name"] ?></p>
                                    <p class="">วันที่ : <?php echo $result[0]["srt_day"] ?></p>
                                    <p class="">เวลา : <?php echo $result[0]["srt_time"] . "-" . $result[0]["end_time"] ?></p>
                                    <p class="">ห้อง : <?php echo $result[0]["room"] ?></p>
                                    <p class="">เลขที่ : <?php echo $result[0]["number"] ?></p>
                        <?php }else{
                            echo "ไม่พบข้อมูลผู้ใช้"; 
                        }
                         ?>
                    </div>
                    <div class="modal-footer">
                    <?php if($db->rowCount() == 1){?>
                        <a href="/member.php" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</a>
                        <a href="/Accept.php?std_id=<?php echo $result[0]["std_id"] ?>&table=<?php echo $result[0]["room"] ?>" class="btn btn-success" data-bs-dismiss="modal">Accept</a>
                        <a href="/Decline.php?std_id=<?php echo $result[0]["std_id"] ?>&table=<?php echo $result[0]["room"] ?>&code=<?php echo  $result[0]["number"] ?>" class="btn btn-danger" data-bs-dismiss="modal">Decline</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php unset($_SESSION["search"]);
} ?>
    <script src="scan.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>