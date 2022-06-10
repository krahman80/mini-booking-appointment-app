<?php

namespace App\Classes;

use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Support\Collection;

class TimeSlot 
{
    private $unavailable;
    private $date;
    private $startTime;
    private $endTime;
    private $duration;
    private $break;

    public function __construct($unavailable, $date, $startTime, $endTime, $duration = 45, $break = null) {
        $this->unavailable = $unavailable;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->duration = $duration;
        $this->break = $break;
    }

    public function getTimeSlot() {
        $start_date_time = $this->date ." ". $this->startTime;
        $end_date_time = $this->date ." ". $this->endTime;

        $start = DateTime::createFromFormat('Y-m-d H:i',$start_date_time);
        $end = DateTime::createFromFormat('Y-m-d H:i', $end_date_time);
        $interval = new DateInterval("PT" . $this->duration. "M");
        $breakInterval = new DateInterval("PT" . $this->break. "M");
        $coll = new Collection;

        if($this->unavailable) {
            return $coll;
        } else {
            $times = new DatePeriod($start, $interval, $end);
            foreach ($times as $time) {     
               
                $endPeriod = clone $time;
                $endPeriod->add($interval)->add($breakInterval);
                if ($endPeriod > $end) {
                    $endPeriod=$end;
                }
                $dura = $endPeriod->diff($time);

                    if((int)$dura->i == (int)$this->duration)
                    {
                        if($time->format('H:i') < '12:00' || $time->format('H:i') >= '13:00') 
                        {
                            $coll->push(
                                (object)
                                [
                                    'date' => $time->format('Y-m-d'),
                                    'start' => $time->format('H:i'),
                                    'end' => $endPeriod->format('H:i'),
                                ]
                            );
                        }
                    }
            }
            return $coll;
        }

    }

}
