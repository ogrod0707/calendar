<?php

class Calendar{



    public function __construct(){
      $this->show();

    }
    public function show(){
        $this->yearInfo(3,2022);
        $this->createNav();
        $this->createCalendarCard(3,2022);


    }
    private $days = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];

    public function yearInfo($month, $year){
        $month = date("F", $month);
        echo "<main><p>$year $month </p>";
    }

    public function createNav(){
        echo "<table style='color:blue; border:1px solid blue; width:500px; height:300px;'> <tr>";
        foreach($this->days as $value){
            echo "<td> $value </td>";
        }
        echo"</tr>";
    }


    public function createCalendarCard($month, $year){
         $date = mktime(12, 0, 0, $month, 1, $year);
         $daysNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year);

         $offset = date('w', $date);
        $rowNumber = 1;
        for($i = 1; $i <= $offset; $i++)
        {
            echo "<td></td>";

        }

        for($day = 1; $day <= $daysNumber; $day++)
        {
            $datka = $year."-".$month."-".$day;
            $dayInNumber = date("w", mktime(0,0,0,$month,$day,$year));

            if( ($day + $offset - 1) % 7 == 0 && $day != 1)
            {
                echo "</tr> <tr>";
                $rowNumber++;
            }
            if ($dayInNumber == 6) {
                echo "<td style='color: red;'>" . $day . "</td>";
            } else{
                echo "<td>" . $day . "</td>";
            }

        }
        while( ($day + $offset) <= $rowNumber * 7)
        {

            echo "<td></td>";


            $day++;
        }
        echo "</tr></table></main>";

    }






}






