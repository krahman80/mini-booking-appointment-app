@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="mb-2 text-center text-xl">Book an appointment on 
            <br/><span class="text-sm p-1 bg-red-300 font-semibold">@php
            $result = $time_slots->get(0);
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $result['date']);
            echo $date->format('M d Y');

            @endphp
            </span>
        </h1>
        <h2 class="mb-2 text-center">Available Time Slot</h2>
        @include('layouts.msg')
        @forelse ($time_slots as $time)
            <div class="w-full bg-gray-200 p-2 mt-1 text-sm flex justify-center items-center">
                <div>
                    {{ $time['start'] . " - " . $time['end'] }}
                </div>
                <form action="{{ route('calendar.book') }}" method="post">
                    @csrf
                    <input type="hidden" name="date" value="{{ $time['date'] }}">
                    <input type="hidden" name="start" value="{{ $time['start'] }}">
                    <input type="hidden" name="end" value="{{ $time['end'] }}">
                    <input type="submit" value="booking" class="bg-blue-500 px-1 text-white rounded ml-3 booking-submit" id="booking">
                </form>
                
            </div>
        @empty
            <div class="w-full bg-gray-200 p-2 m-1 text-sm">
                full booked / holiday
            </div>
        @endforelse
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="border px-2 py-1 mt-2 rounded">back</a>
        </div>

    </div>
</div>
@endsection
@section('script')
    <script>
        const booking = document.getElementsByClassName("booking-submit");
        for(var i = 0; i < booking.length; i++) {
            (function(index) {
                booking[index].addEventListener("click", function(e) {
                    
                    let result = confirm("Ready to book!");
                    if (result == false) {
                        e.preventDefault();
                        console.log("Cancel was pressed.");
                    }
                    
                })
            })(i);
        }
    </script>
@endsection