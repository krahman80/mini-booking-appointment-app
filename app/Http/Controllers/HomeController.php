<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index() {
        // return 'home-index';
        

        $test = $this->getServiceScheduleSlots('45', '0', '09:00', '15:00');
        // dd($test);
    
        dd($test->filter(function($data) {
            // return new DateTime($data->start) < new DateTime('12:00') || new DateTime($data->start) > New DateTime('13:00');
            return $data->start < '12:00' || $data->start >= '13:00';
        }));
    
        // $today = new DateTime('09:00');
        // $todaydiff = new DateTime('12:00');
    
        // if($today <= $todaydiff) {
        //     echo true;
        // }
        // dd($today);

    }

    public function getServiceScheduleSlots($duration,$break, $stTime,$enTime)
    {
        $start = new DateTime($stTime);
        $end = new DateTime($enTime);
        $interval = new DateInterval("PT" . $duration. "M");
        $breakInterval = new DateInterval("PT" . $break. "M");
        $coll = new Collection;
        

        for ($intStart = $start; 
             $intStart < $end; 
             $intStart->add($interval)->add($breakInterval)) {

               $endPeriod = clone $intStart;
               $endPeriod->add($interval);
               if ($endPeriod > $end) {
                 $endPeriod=$end;
               }
            //    $periods[] = $intStart->format('H:i') . 
            //                 ' - ' . 
            //                 $endPeriod->format('H:i');
            // $periods[] = array('start' => $intStart->format('H:i'), 'end' => $endPeriod->format('H:i'));
            $diff_duration = $endPeriod->diff($intStart);
            if ($diff_duration->i == $duration) {
                $coll->push((object) 
                [
                    'start' => $intStart->format('H:i'), 
                    'end' => $endPeriod->format('H:i'),
                    // 'duration' => $diff_duration->i,
                ]);
            }

        }

        return $coll;
    }
    
   
}
