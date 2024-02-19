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
    <title>history</title>
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
                    <li class="nav-item">
                        <a class="nav-link " href="history.php">ประวัติการจองสมาชิก</a>
                    </li>
                </ul>

                <form action="admin_process.php" method="post">
                    <!-- Button trigger modal -->
                    <button type="button" name="logout" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <br>
    <?php
                        $table;
                        if (isset($_SESSION["UID"])) {
                            if ($_SESSION["UID"] == "admin") {
                                if (isset($_GET["table"])) {
                                    $table = $_GET["table"];
                                } else {
                                    $table = "all_history";
                                }
                            }
                        }
                        ?>
    <div class="container d-flex justify-content-center">
        <div class="btn-group" role="group" style="margin-top: 90px;" aria-label="Basic outlined example">
            <a href="history.php?table=all_history" class="btn <?php echo ($table == "all_history") ? "btn-primary" : "btn-outline-primary"; ?>">ทั้งหมด</a>
            <a href="history.php?table=LS1" class="btn <?php echo ($table == "LS1") ? "btn-primary" : "btn-outline-primary"; ?>">LS1</a>
            <a href="history.php?table=LS2" class="btn <?php echo ($table == "LS2") ? "btn-primary" : "btn-outline-primary"; ?>">LS2</a>
            <a href="history.php?table=LS3" class="btn <?php echo ($table == "LS3") ? "btn-primary" : "btn-outline-primary"; ?>">LS3</a>
            <a href="history.php?table=freezone" class="btn <?php echo ($table == "freezone") ? "btn-primary" : "btn-outline-primary"; ?>">Freezone</a>
        </div>
    </div>
    <div class="rows container d-flex mt-5 justify-content-center">
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
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($table == "all_history"){
                            $sql = "SELECT * FROM history ";
                            $db->Query($sql);
                        $result = $db->fetchAll();
                        }else{
                            $str = strval($table);
                            $sql = "SELECT * FROM history WHERE room = ? ";
                            $db->executeInsert($sql);
                            $db->executeQuery([$table]);
                            $result = $db->fetchAll();
                        }
                        
                        
                        $index = 0;
                        if (count($result) > 0) {
                            $R = array_reverse($result);
                            foreach ($R as $row) {

                                $index++;
                                echo "<tr>";
                                echo "<th scope='row'>" . $index . "</th>";
                                echo "<td>" . $row["std_id"] . "</td>";
                                echo "<td>" . $row["std_name"] . "</td>";
                                echo "<td>" . $row["srt_day"] . "</td>";
                                echo "<td>" . $row["srt_time"] . "</td>";
                                echo "<td>" . $row["end_time"] . "</td>";
                                echo "<td>";

                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>



</html>