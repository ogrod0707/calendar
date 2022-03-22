<?php

class Calendar{




    public function __construct($year, $month){
      $this->show($year, $month);

    }
    public function show($year, $month){
        $this->yearInfo($month,$year);
        $this->createNav();
        $this->createCalendarCard($month,$year);


    }
    private $days = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];



    public function yearInfo($month, $year){
        $month = date("F", $month);
        echo "<h1>$year $month </h1>";
    }

    public function createNav(){ // Metoda tworzy naglowki dla tabeli
        echo "<table> <tr>";
        foreach($this->days as $value){

            if ($value=="Sun")
            {
                echo "<th class='sunRedTh'> $value </th>";
            }
            else{
                echo "<th> $value </th>";
            }
        }
        echo"</tr>";
    }


    public function createCalendarCard($month, $year){  //Metoda odpowiadajaca za generowanie dni w kalendarzu
         $date = mktime(12, 0, 0, $month, 1, $year);
         $daysNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year);

         $offset = date('w', $date);
        $rowNumber = 1;
        for($i = 1; $i <= $offset; $i++) // jezeli miesiac nie rozpoczyna sie od poniedzialku to dodaje puste rekordy
        {
            echo "<td></td>";

        }

        for($day = 1; $day <= $daysNumber; $day++) // dodaje dni, jezeli dojdzie do 7miu to zaczyna nowy wiersz
        {
            $dayInNumber = date("w", mktime(0,0,0,$month,$day,$year));

            if( ($day + $offset - 1) % 7 == 0 && $day != 1)
            {
                echo "</tr> <tr>";
                $rowNumber++;
            }
            if ($dayInNumber == 6) {
                echo "<td class='sunRedTd''>" . $day . "</td>";
            } else{
                echo "<td>" . $day . "</td>";
            }

        }
        while( ($day + $offset) <= $rowNumber * 7) // jezeli dni w miesiacu sie skonczyly, a rzadek nie doszedl do konca to dodaje puste rekordy
        {

            echo "<td></td>";


            $day++;
        }
        echo "</tr></table>";

    }






}






