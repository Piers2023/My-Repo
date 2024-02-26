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
    <title>ระบบจองห้องพักออนไลน์</title>
    <!-- Add font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <!-- LK icon awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css  ">
    <!-- LK css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

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
                        <a class="nav-link " href="#">รายการของฉัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="user_history.php">ประวัติของฉัน</a>
                    </li>
                </ul>

                <button class="btn btn-outline-primary" type="submit">เริ่มต้นจองห้องประชุม</button>
            </div>
        </div>
    </nav>

    <?php
    session_start();
    require_once "qr_class.php";
    require_once "connect.php";
    
    if (isset($_SESSION["std_id"])) {
        $id = $_SESSION["std_id"];
        $sql = "SELECT * FROM user_table WHERE std_id =?";
        $db->executeInsert($sql);
        $db->executeQuery([(int)$id]);
        $result = $db->fetchAll();
        if ($db->rowCount()== 1){

        $room = $result[0]["room"];
        $sql = "SELECT * FROM $room WHERE std_id = ?";
        $db->executeInsert($sql);
        $db->executeQuery([$id]);
        $result = $db->fetchAll();
        if ($db->rowCount() > 0) {
            
            $qrcode->qrcreate($_SESSION["std_id"], $room);
    ?>
            <div class="rows container justify-content-center d-flex " style="z-index: 99;">
                <div class="col">
                    <div class="card" style="max-width: 540px; margin-top: 100px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php
                                $qrcode->qrrender();
                                ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">ตั๋วจองห้อง</h5> <br>
                                    <p class="card-text">รหัสนักศึกษา : <?php echo $_SESSION["std_id"] ?></p>
                                    <p class="card-text">ชื่อ : <?php echo $_SESSION["std_name"] ?></p>
                                    <p class="card-text">วันที่ : <?php echo $result[0]["srt_day"] ?></p>
                                    <p class="card-text">เวลา : <?php echo $result[0]["srt_time"] . "-" . $result[0]["end_time"] ?></p>
                                    <p class="card-text">ห้อง : <?php echo $room ?></p>
                                    <p class="card-text">เลขที่ : <?php echo $result[0]["number"] ?></p>
                                    <a class="btn btn-outline-danger me-auto" href="member_process.php?delete=<?php echo $_SESSION["std_id"] ?>&table=<?php echo $room ?>">ยกเลิกการจอง</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }else {
            unset($_SESSION["std_id"]);
            
        }}else {?>
        <div class="rows mt-5">
            <div class="col d-flex justify-content-center">
            <br><br><br><br><br><br><br>ไม่พบข้อมูลการจอง
            </div>
        </div>
        <?php
        }
    }
    ?>

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
    <nav class="navbar navbar-dark bg-dark position-fixed w-100" style="bottom: 0px;">
        <div class="container-fluid justify-content-center d-flex">
            <p class="text-light">© UranusX Company</p>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    </script>
</body>

</html>