
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
                        <a class="nav-link active " aria-current="page" href="index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="list_room.php">รายการของฉัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="user_history.php">ประวัติของฉัน</a>
                    </li>
                </ul>

                <button class="btn btn-outline-primary" type="submit">เริ่มต้นจองห้องประชุม</button>
            </div>
        </div>
    </nav>
    <br>
    <div class="rows container d-flex mt-5 justify-content-center">
        <div class="col-12">
            <div style="margin-top: 1px; ; margin-bottom:0px;" class=" text-center text-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            
                            <th scope="col">วันที่</th>
                            <th scope="col">เวลาเริ่ม</th>
                            <th scope="col">เวลาสิ้นสุด</th>
                        </tr>
                    </thead>
                    <tbody>
                                             
                        <?php
                        require_once 'connect.php';
                        $db = new Database ("localhost", "SProject", "root", "");
                        session_start();
                        if (isset($_SESSION["std_id"])){
                            $id = $_SESSION["std_id"];
                            $sql = "SELECT * FROM history WHERE std_id = $id";
                        $db->Query($sql);
                        $result = $db->fetchAll();
                        $index = 0;
                        if (count($result) > 0) {
                            $R = array_reverse($result);
                            foreach ($R as $row) {
                                

                                
                                $index++;
                                echo "<tr>";
                                echo "<th scope='row'>" . $index . "</th>";
                                
                                echo "<td>" . $row["srt_day"] . "</td>";
                                echo "<td>" . $row["srt_time"] . "</td>";
                                echo "<td>" . $row["end_time"] . "</td>";
                                echo "<td>";
                                
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                                }
                            }
                    else {
                            echo "ไม่พบข้อมูลการจอง";
                        }
                        }else{
                            echo "กรุณาเข้าสู่ระบบ";
                        }
                        
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

