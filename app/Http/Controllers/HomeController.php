<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Classes\TimeSlot;
use App\Models\Unavailable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index() {
        # define time slot
        # loop time slot according start, end and interval
        # if diff duration less than parameter duration, remove it (duration is inconsistent)
        # if date is sat and sun then return null 
        # if time slot is within 12:00 and 13:00, remove it (break time)

        return view('calendar.index');
    }
    
    public function show(Request $request) {

        $unavailable = Unavailable::where('date', $request->input('date'))->count();
        $test = new TimeSlot($unavailable, $request->input('date'), '09:00', '17:00', '45', '0');
        dd($test->getTimeSlot());
    }

    public function index2() {
        // return 'home-index';
        

        $test = $this->getServiceScheduleSlots('45', '0', '2022-05-24 09:00', '2022-05-24 15:00');
        $off = new Collection; 
            
            $off->push((object)['date'=> '2022-05-24', 'start' => '12:00', 'end' =>'13:00']);
            $off->push((object)['date'=> '2022-05-22', 'start' => '00:00', 'end' =>'23:59']);
            $off->push((object)['date'=> '2022-05-21', 'start' => '00:00', 'end' =>'23:59']);
            
        // dd($off);
        
        $coll = new Collection;
        $test->each(function($item) use ($off, $coll){
            $off->each(function($item2) use ($item, $coll){
                $dayformat = new DateTime($item->date);
                if($item->date ==  $item2->date ) {
                    if ($dayformat->format('D') == 'Sun' || $dayformat->format('D') == 'Sat')
                    { 
                        return false; //equal to break
                    } 
                    else {
                        $coll->push(["start" => $item->start, "end" => $item->end]);
                    }
                }
                
                // if ($item->date == $item2->date && $item->start < $item2->start || $item->start >= $item2->end) {
                //     // echo $item->date." and ". $item->start ." and " . $item->end. "<br/>";
                //     // return array("start" => $item->start, "end" => $item->end);
                //     $coll->push(["start" => $item->start, "end" => $item->end]);
                // }
            }); 
            // return $coll;
        });
        
        dd($coll);

        // dd($res2);
        // dd($test->filter(function($data) {
        //     // return new DateTime($data->start) < new DateTime('12:00') || new DateTime($data->start) > New DateTime('13:00');
        //     return $data->start < '12:00' || $data->start >= '13:00';
        // }));
    
        // $today = new DateTime('09:00');
        // $todaydiff = new DateTime('12:00');
    
        // if($today <= $todaydiff) {
        //     echo true;
        // }
        // dd($today);

    }

    public function edit() {
        return view('calendar.edit');
    } 

    // public function show(Request $request) {
    //     dd($request->input());

    // }

    public function getServiceScheduleSlots($duration,$break, $stTime,$enTime)
    {
        # define time slot
        # loop time slot according start, end and interval
        # if diff duration less than parameter duration, remove it (duration is inconsistent)
        # if date is sat and sun then return null 
        # if time slot is within 12:00 and 13:00, remove it (break time)
        
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
            
            $diff_duration = $endPeriod->diff($intStart);
            if ($diff_duration->i == $duration) {
                if ($intStart->format('D') == 'Sun' || $intStart->format('D') == 'Sat')
                    { 
                        return false; //equal to break
                    } 
                else 
                {
                    $coll->push((object) 
                    [
                        'date' => $intStart->format('Y-m-d'),
                        'start' => $intStart->format('H:i'), 
                        'end' => $endPeriod->format('H:i'),
                    ]);
                }
            }

        }

        return $coll;
    }
    
   
}
