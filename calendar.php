<?php
require_once "connect.php";
class Calendar
{
    private $modal1;
    private $modal2;
    private $month;
    private $year;
    private $room;
    private $num;
    private $db;
    private $result;

    private $S = [];
    private $E = [];

    public $currentday;


    public function __construct()
    {
        $this->db = new Database("localhost", "sproject", "root", "");
        if (isset($_SESSION["UID"])) {
            $this->modal1 = "#form";
            $this->modal2 = "#timeuser";
        } else {
            $this->modal1 = "#login";
            $this->modal2 = "#login";
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->num = 0;
        if (isset($_GET["month"]) && isset($_GET["year"]) && isset($_GET["room"])) {
            $this->month = $_GET["month"];
            $this->year = $_GET["year"];
            $this->room = $_GET["room"];
            $_SESSION["room"] = $this->room;
        } else {
            $this->month = date("n");
            $this->year = date("Y");
            $this->room = "LS1";
            $_SESSION["room"] = "LS1";
        }
        $sql = "SELECT srt_day,srt_time,end_time FROM $this->room WHERE MONTH(STR_TO_DATE(srt_day, '%d-%m-%Y')) = $this->month AND YEAR(STR_TO_DATE(srt_day, '%d-%m-%Y')) = $this->year ORDER BY STR_TO_DATE(srt_day, '%d-%m-%Y')";
        $this->db->Query($sql);
        $this->result = $this->db->fetchAll();
    }
    public function createCalendar()
    {

        $nextmonth = $this->month == 12 ? 1 : $this->month + 1;
        $prevmonth = $this->month == 1 ? 12 : $this->month - 1;
        $nextyear = $this->month == 12 ? $this->year + 1 : $this->year;
        $prevyear = $this->month == 1 ? $this->year - 1 : $this->year;
        $DayinMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        echo "<div class='d-inline' style='float: right; align-items:center;'>";
        if ($this->month != date("n") && $this->year == date("Y")) {
            echo "<a style='text-decoration: none; font-size: 30px;' href='?month=" . $prevmonth . "&year=" . $prevyear . "&room=" . $this->room . "'> <i class='fas fa-caret-square-left'></i> </a>";
        } else {
            if ($this->year != date("Y")) {
                echo "<a style='text-decoration: none; font-size: 30px;' href='?month=" . $prevmonth . "&year=" . $prevyear . "&room=" . $this->room . "'> <i class='fas fa-caret-square-left'></i> </a>";
            } else {
                echo "<a style='text-decoration: none; font-size: 30px;' disable> <i class='fas fa-caret-square-left'></i> </a>";
            }
        }
        echo "<span style='font-size: 30px;'>'" . date('F', mktime(0, 0, 0, $this->month, 1, $this->year)) . $this->year . " '</span>";
        echo "<a style='text-decoration: none; font-size: 30px;' href='?month=" . $nextmonth . "&year=" . $nextyear . "&room=" . $this->room . "'> <i class='fas fa-caret-square-right'></i> </a>";
        echo "</div>";
        echo "<table class='table border border-5 table-equal table-bordered border-primary'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>อา.</th>";
        echo "<th scope='col'>จ.</th>";
        echo "<th scope='col'>อ.</th>";
        echo "<th scope='col'>พ.</th>";
        echo "<th scope='col'>พฤ.</th>";
        echo "<th scope='col'>ศ.</th>";
        echo "<th scope='col'>ส.</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        $dayCount = 1;
        $dmy = $dayCount . "-" . $this->month . "-" . $this->year;

        $firstDayofMonth = date('w', mktime(0, 0, 0, $this->month, 1, $this->year));
        for ($i = 0; $i < $firstDayofMonth; $i++) {
            echo "<td></td>";
        }
        while ($dayCount <= $DayinMonth) {
            for ($i = $firstDayofMonth; $i < 7; $i++) {
                if ($dayCount > $DayinMonth) {
                    break;
                }

                $currentyear = date("Y");
                if ($dayCount < date("d")) {
                    $starttime = $this->result[$this->num]["srt_time"];
                    $endtime = $this->result[$this->num]["end_time"];
                    $namearray = $this->result[$this->num]["srt_day"];
                    if (isset($this->result[$this->num])) {

                        
                        if ($dmy == $namearray) {
                            if ($dayCount > date("d")) {
                                echo "<td class='m-0 p-0'><button type='button'
      data-bs-toggle='modal' data-bs-target='#timeuser'
      class='w-100 p-3 btn mydate  '
      onclick='timeuser(" . json_encode($namearray) . "," . json_encode($dayCount) . ")' >" . $dayCount . "</button></td>";

                                $this->num++;
                            } else {
                                echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                            data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate btn-secondary ' disabled>" . $dayCount . "</button></td>";
                                $this->num++;
                            }
                        } else {
                            if ($this->month == date("n") && $this->year == $currentyear) {
                                echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                            data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate btn-secondary ' disabled>" . $dayCount . "</button></td>";
                            } else {
                                echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                        data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                            }
                        }
                    } else {
                        if ($this->month == date("n") && $this->year == $currentyear) {
                            echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                        data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate btn-secondary ' disabled>" . $dayCount . "</button></td>";
                        } else {
                            echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                    data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                        }
                    }
                } else {
                    $namearray = $this->result[$this->num]["srt_day"];
                    $starttime = $this->result[$this->num]["srt_time"];
                    $endtime = $this->result[$this->num]["end_time"];
                    if (isset($this->result[$this->num])) {



                        if ($dmy == $namearray) {
                            echo "<td class='m-0 p-0'><button type='button'
      data-bs-toggle='modal' data-bs-target='" . $this->modal2 . "'
      class='w-100 p-3 btn mydate  '
      onclick='timeuser(" . json_encode($namearray) . "," . json_encode($dayCount) . ")' >" . $dayCount . "</button></td>";

                            $this->num++;
                        } else {
                            echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                        }
                    } else {
                        echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount, $namearray)'
                data-bs-toggle='modal' data-bs-target='" . $this->modal1 . "' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                    }
                }

                $dayCount++;
                $dmy = $dayCount . "-" . $this->month . "-" . $this->year;
            }
            if ($i < 7) {
                for ($x = $i; $x < 7; $x++) {
                    echo "<td></td>";
                }
            }
            if ($dayCount <= $DayinMonth) {
                echo "</tr><tr>";
            }
            $firstDayofMonth = 0;
        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }

    public function getmonth()
    {
        return $this->month;
    }
    public function getyear()
    {
        return $this->year;
    }
}
