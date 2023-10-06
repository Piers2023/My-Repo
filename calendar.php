<?php
require_once "connect.php";
class Calendar
{
    private $month;
    private $year;
    private $room;
    private $num;
    private $db;
    private $result;
    public function __construct()
    {
        
        $this->db = new Database("localhost", "SProject", "root", "");
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
            echo "<a style='text-decoration: none;' href='?month=" . $prevmonth . "&year=" . $prevyear . "&room=".$this->room."'> <- </a>";
        } else {
            if ($this->year != date("Y")) {
                echo "<a style='text-decoration: none;' href='?month=" . $prevmonth . "&year=" . $prevyear . "&room=".$this->room."'> <- </a>";
            } else {
                echo "<a style='text-decoration: none;' disable> <- </a>";
            }
        }
        echo "'" . date('F', mktime(0, 0, 0, $this->month, 1, $this->year)) . $this->year . " '";
        echo "<a style='text-decoration: none;' href='?month=" . $nextmonth . "&year=" . $nextyear . "&room=".$this->room."'> -> </a>";
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

                    if (isset($this->result[$this->num])) {

                        $starttime = $this->result[$this->num]["srt_time"];
                        $endtime = $this->result[$this->num]["end_time"];
                        $namearray = $this->result[$this->num]["srt_day"];
                        if ($dmy == $namearray ) {
                            if ($dayCount > date("d")) {
                            echo "<td class='m-0 p-0'><button type='button'
      data-bs-toggle='modal' data-bs-target='#timeuser'
      class='w-100 p-3 btn mydate btn-primary '
      onclick='timeuser(" . json_encode($namearray) . "," . json_encode($starttime) . "," . json_encode($endtime) . ")' >" . $dayCount . "</button></td>";

                            $this->num++;
                            }else{
                                echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                            data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate btn-secondary ' disabled>" . $dayCount . "</button></td>";
                            $this->num++;
                            }
                        } else {
                            if ($this->month == date("n") && $this->year == $currentyear) {
                                echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                            data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate btn-secondary ' disabled>" . $dayCount . "</button></td>";
                            } else {
                                echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                        data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                            }
                        }
                    } else {
                        if ($this->month == date("n") && $this->year == $currentyear) {
                            echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                        data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate btn-secondary ' disabled>" . $dayCount . "</button></td>";
                        } else {
                            echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                    data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                        }
                    }
                } else {

                    if (isset($this->result[$this->num])) {

                        $namearray = $this->result[$this->num]["srt_day"];
                        $starttime = $this->result[$this->num]["srt_time"];
                        $endtime = $this->result[$this->num]["end_time"];

                        if ($dmy == $namearray) {
                            echo "<td class='m-0 p-0'><button type='button'
      data-bs-toggle='modal' data-bs-target='#timeuser'
      class='w-100 p-3 btn mydate btn-primary '
      onclick='timeuser(" . json_encode($namearray) . "," . json_encode($starttime) . "," . json_encode($endtime) . ")' >" . $dayCount . "</button></td>";

                            $this->num++;
                        } else {
                            echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
                        }
                    } else {
                        echo "<td class='m-0 p-0'><button type='button' onclick='setvaluedate($dayCount)'
                data-bs-toggle='modal' data-bs-target='#form' class='w-100 p-3 btn mydate' >" . $dayCount . "</button></td>";
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

        if (isset($_GET["day"])) {
            echo "<p> คุณคลิกวันที่ " . $_GET["day"] . " </p>";
        }
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
