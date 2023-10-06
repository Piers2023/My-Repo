
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .font {
            /* Add font */
            font-family: 'Itim', cursive;

        }

        .bg {

            /* Background Setting*/
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://cdn.discordapp.com/attachments/1153996048411414580/1154445144175693924/354045749_568272095479959_4306439740218074364_n.png?ex=6514f892&is=6513a712&hm=544b0ea856fecbea4089168460aee3ee15637a971099b8b352b17942248f60bb&");
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
                </ul>

                <button class="btn btn-outline-primary" type="submit">เริ่มต้นจองห้องประชุม</button>
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
            <div class=" col-sm-12 col-lg-10 col-xl-5 v-100 shadow container bg-body rounded p-4 " style="margin-bottom: 8rem;">
                <button class="btn btn-outline-primary mt-2 mb-3">จองห้องประชุม</button>
                <button class="btn btn-outline-primary mt-2 mb-3 ms-2">รายการของฉัน</button>
                <form action="process.php" method="post">
                    

                    <?php
                    session_start();
                    require_once "calendar.php";
                    $calendar = new Calendar();?>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="index.php?month=<?php echo date("n")?>&year=<?php echo date("Y")?>&room=LS1" class="btn <?php echo ($_SESSION["room"] == "LS1")?"btn-primary":"btn-outline-primary";?>">LS1</a>
                        <a href="index.php?month=<?php echo date("n")?>&year=<?php echo date("Y")?>&room=LS2" class="btn <?php echo ($_SESSION["room"] == "LS2")?"btn-primary":"btn-outline-primary";?>">LS2</a>
                        <a href="index.php?month=<?php echo date("n")?>&year=<?php echo date("Y")?>&room=LS3" class="btn <?php echo ($_SESSION["room"] == "LS3")?"btn-primary":"btn-outline-primary";?>">LS3</a>
                        <a href="index.php?month=<?php echo date("n")?>&year=<?php echo date("Y")?>&room=freezone" class="btn <?php echo ($_SESSION["room"] == "freezone")?"btn-primary":"btn-outline-primary";?>">Freezone</a>
                    </div><br>
                    <?php 
                    $month = $calendar->getmonth();
                    $year = $calendar->getyear();
                    $calendar->createCalendar();
                    ?>
                    <input type="hidden" name="valuedate" id="clickdate">
                    <input type="hidden" name="valueyear" value="<?php echo $year ?>">
                    <input type="hidden" name="valuemonth" value="<?php echo $month ?>">
                    <!-- Modal -->
                    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                    <div class="d-md-flex ">

                                        <div class="form-floating w-100  mt-3">
                                            <input type="number" name="std_num" min="4" max="15" value="4" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                                            <label for="floatingInputGrid">จำนวนคนเข้าใช้งาน</label>
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
                                        <select class="form-select" name="table" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <option selected value=<?php echo $_SESSION["room"]?>><?php echo $_SESSION["room"]?></option>


                                        </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">รายการจองวันนี้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="timevalue"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="rows gx-0 ">
        <div class="col">
            <div class="alert alert-light text-center fs-1 text-dark" role="alert">
                ทำไม?ถึงต้องจองห้องประชุมแบบออนไลน์
            </div>
        </div>
    </div>
    <div class="rows gx-0 mb-5">
        <div class="col container">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1 text-center"><i class="fas fa-clock"></i></h5>
                        <p class="card-text fs-5 text-center"><small class="">ประหยัดเวลาและค่าใช้จ่าย</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-1"><i class="far fa-calendar-alt"></i></h5>
                        <p class="card-text text-center fs-5"><small class="">ตรวจสอบการใช้งานห้องประชุมได้ง่ายสะดวกและรวดเร็ว</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-1"><i class="fas fa-check-square"></i></h5>
                        <p class="card-text text-center fs-5"><small class="">ไม่ว่าคุณจะอยู่ที่ไหนก็สามารถใช้งานได้</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-1"><i class="fas fa-smile"></i></h5>
                        <p class="card-text text-center fs-5"><small class="">ใช้งานง่ายปลอดภัย</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-1"><i class="fas fa-user-friends"></i></h5>
                        <p class="card-text text-center fs-5"><small class="">คุณและเพื่อนของคุณสามารถจัดเตรียมห้องประชุมไว้ได้ล่วงหน้า</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-1"><i class="fa-solid fa-virus"></i></h5>
                        <p class="card-text text-center fs-5"><small class="">ลดการสัมผัสจากผู้คนจากสถานการณ์ไวรัสโควิด-19</small></p>
                    </div>
                </div>

            </div>
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
                    <img src="https://eventbanana.blob.core.windows.net/blogcontainer/4cfe80d-6e74.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LS1</h5>
                        <p class="card-text">จำนวนคนที่ลองรับ:30คน</p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>
                                <div style="width:12px; height: 12px;" class="spinner-grow text-success " role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                พร้อมใช้งาน
                            </small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://novotelbangkokimpact.com/wp-content/uploads/sites/59/2019/10/Meeting_750x420_NOVEMBER19.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LS2</h5>
                        <p class="card-text">จำนวนคนที่ลองรับ:30คน</p>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                        <p class="card-text"><small>
                                <div style="width:12px; height: 12px;" class="spinner-grow text-success " role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                พร้อมใช้งาน
                            </small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/file.venuee/2020%2F03%2F13%2F1584087639-%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B8%E0%B8%A1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LS3</h5>
                        <p class="card-text">จำนวนคนที่ลองรับ:30คน</p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                        <p class="card-text"><small>
                                <div style="width:12px; height: 12px;" class="spinner-grow text-success " role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                พร้อมใช้งาน
                            </small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if (isset($_SESSION["validate"])){
    
?>
    <div class="rows ">
        <div class="col d-flex justify-content-center">
        <div class="modal-dialog position-fixed w-100" style="z-index: 100; top: 8rem;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!</h5>
                </div>
                <div class="modal-body text-center fs-3">
                    <p id="validate"><?php echo $_SESSION["validate"]?></p>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php unset($_SESSION["validate"]);}?>
    <!-- footer -->
    <nav class="navbar navbar-dark bg-dark" style="bottom: 0px; ">
        <div class="container-fluid justify-content-center d-flex">
            <p class="text-light">© UranusX Company</p>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        console.log("startscript");

        function setvaluedate(buttonvalue) {
            document.getElementById("clickdate").value = buttonvalue;
        }

        function timeuser(date, srt_time, end_time) {

            document.getElementById("timevalue").innerHTML = "ระยะเวลา " + date + " " + srt_time + "-" + end_time;
            console.log(srt_time);

        }
    </script>

</body>

</html>