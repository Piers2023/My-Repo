<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .font {
            /* Add font */
            font-family: 'Playfair Display', serif;
            font-family: 'Sarabun', sans-serif;
        }

        .bg {

            /* Background Setting*/
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://cdn.discordapp.com/attachments/1209163392527503442/1209207371717672960/bg.jpg?ex=65e6151f&is=65d3a01f&hm=faa6b1ed25ec5bab8b6f828fa3e2f542849aa030c4a3db44b25152c641b53689&");
        }

        .table-equal {
            table-layout: fixed;
            width: 100%;
            font-size: auto;

        }

        @media(max-width:480px) {
            .table-equal {
                font-size: 10px;

            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองห้องประชุมออนไลน์</title>
    <!-- Add font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <!-- LK icon awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css  ">
    <!-- LK css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<p></p>

<body class="font">
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

                <?php session_start();
                if (isset($_GET["time"])) {
                    $daylink = $_GET["day"];
                    $time = $_GET["time"];
                    if (isset($_SESSION["UID"])) {
                        echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var myModal = new bootstrap.Modal(document.getElementById('timeuser'));
                        myModal.show();
                    });
                    </script>";
                    } else {
                        echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var myModal = new bootstrap.Modal(document.getElementById('login'));
                        myModal.show();
                    });
                    </script>";
                    }
                } else {
                    $time = "";
                }
                if (isset($_SESSION["std_name"])) {

                ?>
                    <p style="align-item: center; margin-right: 50px;"></p><?php echo $_SESSION["std_name"] ?></p>
                    <a class="ms-3 btn btn-outline-danger" href="Login.php?logout=0">Logout</a>
                <?php } else { ?>
                    <button class="btn btn-outline-primary me-2" data-bs-toggle='modal' data-bs-target='#register' type="button">Register</button>
                    <button class="btn btn-outline-primary" data-bs-toggle='modal' data-bs-target="#login" type="button">Login</button>
                <?php } ?>
            </div>
        </div>
    </nav>

    <div class="containner-fluid bg" style="margin-top:62px ; margin-bottom:0px;">
        <!-- rows form -->
        <div class="rows  gx-0 justify-content-center d-xl-flex mb-5">
            <div class="col-6 justify-content-center d-xl-flex">
                <div class="rows w-100 d-block">
                    <div class="col ">

                    </div>
                </div>
            </div>
            <div class=" col-sm-12 col-lg-10 col-xl-5 v-100 shadow container bg-body rounded p-4 " style="margin-bottom: 8rem; margin-top: 8rem;">
                <form action="process.php" method="post">


                    <?php

                    require_once "calendar.php";
                    $calendar = new Calendar(); ?>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="index.php?month=<?php echo date("n") ?>&year=<?php echo date("Y") ?>&room=LS1" class="btn <?php echo ($_SESSION["room"] == "LS1") ? "btn-primary" : "btn-outline-primary"; ?>">LS1</a>
                        <a href="index.php?month=<?php echo date("n") ?>&year=<?php echo date("Y") ?>&room=LS2" class="btn <?php echo ($_SESSION["room"] == "LS2") ? "btn-primary" : "btn-outline-primary"; ?>">LS2</a>
                        <a href="index.php?month=<?php echo date("n") ?>&year=<?php echo date("Y") ?>&room=LS3" class="btn <?php echo ($_SESSION["room"] == "LS3") ? "btn-primary" : "btn-outline-primary"; ?>">LS3</a>
                        <a href="index.php?month=<?php echo date("n") ?>&year=<?php echo date("Y") ?>&room=freezone" class="btn <?php echo ($_SESSION["room"] == "freezone") ? "btn-primary" : "btn-outline-primary"; ?>">Freezone</a>
                    </div><br>
                    <?php
                    $month = $calendar->getmonth();
                    $year = $calendar->getyear();
                    $calendar->createCalendar();

                    ?>
                    <input type="hidden" name="valuedate" id="clickdate">
                    <input type="hidden" name="date1" id="clickdate" value="<?php echo $daylink ?>">
                    <input type="hidden" name="valueyear" value="<?php echo $year ?>">
                    <input type="hidden" name="valuemonth" value="<?php echo $month ?>">
                    <!-- Modal -->
                    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION["room"] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-sm-flex d-none">

                                    </div>



                                    <div class="d-md-flex ">

                                        <div class="form-floating w-100  mt-3">
                                            <?php
                                            if (($_SESSION["room"] != "freezone")) {


                                            ?>
                                                <input type="number" name="std_num" min="5" max="15" value="5" class="form-control" id="floatingInputGrid" placeholder="name@example.com">
                                                <label for="floatingInputGrid">จำนวนคนเข้าใช้งาน</label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class=" d-md-flex">
                                        <div class="form-floating mt-3 w-100 ">
                                            <input name="srt_time" class="form-control" id="floatingInputGrid" placeholder="เวลาเริ่ม" type="time">
                                            <label for="floatingInputGrid">เวลาเริ่ม</label>
                                        </div>

                                        <div class="form-floating mt-3 w-100">
                                            <input name="end_time" class="form-control" id="floatingInputGrid" placeholder="เวลาเริ่ม" type="time">
                                            <label for="floatingSelectGrid">เวลาสิ้นสุด</label>
                                        </div>
                                    </div>
                                    <div class="form-floating mt-3">

                                        <input name="table" value=<?php echo $_SESSION["room"] ?> class="form-control" id="floatingInputGrid" type="text" readonly>



                                        <label for="floatingSelectGrid">เลือกจองห้องประชุม</label>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">จองห้อง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="timeuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="currentdate">วันที่ <?php echo $time ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php

                    if (isset($time)) {


                        $room = $_SESSION["room"];
                        $sql2 = "SELECT * FROM $room WHERE srt_day = ?";
                        $db->executeInsert($sql2);
                        $db->executeQuery([$time]);
                        $result = $db->fetchAll();
                        if (count($result) > 0) {
                            foreach ($result as $time) {



                    ?>
                                <p>ระยะเวลา <?php echo $time["srt_time"] ?> ถึง <?php echo $time["end_time"] ?></p>
                    <?php }
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="sendday();" class="btn btn-primary" data-bs-target="#form" data-bs-toggle="modal" data-bs-dismiss="modal">จองห้อง</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="Register.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">กรอกรายละเอียด</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-sm-flex d-none">

                        </div>

                        <!-- รหัสนักศึกษา -->
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="		fas fa-graduation-cap"></i></span>
                            <input type="text" name="std_id" minlength="13" maxlength="13" class="form-control" placeholder="รหัสนักศึกษา" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input type="password" name="std_pass" minlength="8" maxlength="20" class="form-control" placeholder="รหัสผ่าน" aria-label="Username" aria-describedby="basic-addon1" required>
                            <input type="password" name="con_password" minlength="8" maxlength="20" class="form-control" placeholder="ยืนยันรหัสผ่าน" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <!-- ชื่อ-สกุล -->
                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                            <input placeholder="ชื่อ" name="fname" type="text" aria-label="First name" class="form-control">
                            <input placeholder="นามสกุล" name="lname" type="text" aria-label="Last name" class="form-control">
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="	fas fa-book-open"></i></span>
                            <input placeholder="คณะ" name="std_fac" type="text" aria-label="First name" class="form-control">
                            <input placeholder="สาขา" name="std_bch" type="text" aria-label="Last name" class="form-control">
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="	fas fa-phone-alt"></i></span>
                            <input type="text" maxlength="10" class="form-control" placeholder="xxx-xxx-xxxx" name="std_tel" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="Login.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">กรอกรายละเอียด</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-sm-flex d-none">

                        </div>

                        <!-- รหัสนักศึกษา -->
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="		fas fa-graduation-cap"></i></span>
                            <input type="text" name="std_id" minlength="13" maxlength="13" class="form-control" placeholder="รหัสนักศึกษา" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input type="password" name="std_pass" minlength="8" maxlength="20" class="form-control" placeholder="รหัสผ่าน" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>

    <div class="rows gx-0 container justify-content-center d-block mb-5" id="meetingRoom">
        <div class="col">
            <div class="alert alert-light text-center fs-1 text-dark" role="alert">
                รายละเอียดห้องประชุม
            </div>
        </div>
        <div class="col">
            <div class="card-group">
                <div class="card">
                    <img src="https://cdn.discordapp.com/attachments/1154752366537621634/1209163328820224171/ls3.jpg?ex=65e5ec1a&is=65d3771a&hm=5e3fff4c0b4242e072f47af66c15d1c54c93fe4053b878a8f734ba87e062a002&" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LS1</h5>
                        <p class="card-text">จำนวนคนที่รองรับ: 8 คน</p>

                        
                    </div>
                </div>
                <div class="card">
                    <img src="https://cdn.discordapp.com/attachments/1154752366537621634/1209162640098852874/ls2.jpg?ex=65e5eb76&is=65d37676&hm=7868699229ef434da6a5199fe306b35b98b56daee01248c3e7f8ed33a77df21a&" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LS2</h5>
                        <p class="card-text">จำนวนคนที่รองรับ: 8 คน</p>

                        
                    </div>
                </div>
                <div class="card">
                    <img src="https://cdn.discordapp.com/attachments/1154752366537621634/1209179227296108615/ls1.jpg?ex=65e5fae9&is=65d385e9&hm=5639b0f7a165bac575cbdc7351bc0abf52605c08efa81b9d9d37c3d0ed56cf98&" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LS3</h5>
                        <p class="card-text">จำนวนคนที่รองรับ: 12 คน</p>

                        
                    </div>
                </div>
            </div>

        </div>
        <div class="col justify-content-center w-100 d-flex p-5">
        <div class="card w-50">
        <div id="carouselExampleIndicators" class="carousel slide  " data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cdn.discordapp.com/attachments/1154752366537621634/1209181097942851634/FZ1.jpg?ex=65e5fca7&is=65d387a7&hm=4b55a314d78b4f63882acbcefc060d435afbbbf417adc45f9a5721d68f9cd0ec&" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/1154752366537621634/1209181098291101746/FZ2.jpg?ex=65e5fca7&is=65d387a7&hm=f7b8d9e6981edf448c59a45b51bc03d84428097880f05880eb50905664a2f52c&" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/1154752366537621634/1209181098756804698/FZ3.jpg?ex=65e5fca7&is=65d387a7&hm=66ed51259c4897f46e1ae58b02e86680250fc6ded09348887dda3a5f48e56e33&" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
                    <div class="card-body">
                        <h5 class="card-title">Freezone</h5>

                        
                    </div>
                </div>
            

        </div>
    </div>
    <?php if (isset($_SESSION["validate"])) {

    ?>
        <div class="rows ">
            <div class="col d-flex justify-content-center">
                <div class="modal-dialog position-fixed w-100" style="z-index: 100; top: 8rem;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!</h5>
                        </div>
                        <div class="modal-body text-center fs-3">
                            <p id="validate"><?php echo $_SESSION["validate"] ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php unset($_SESSION["validate"]);
    } ?>
    <!-- footer -->
    <nav class="navbar navbar-dark bg-dark" style="bottom: 0px; ">
        <div class="container-fluid justify-content-center d-flex">
            <p class="text-light">© UranusX</p>
        </div>
    </nav>
    <input type="hidden" id="sendday" value="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="process.js">
    </script>

</body>

</html>