@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="my-2 text-center text-xl">Appointment Booking Application</h1>
        <h2 class="my-2 text-center">Available Time Slot</h2>
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
                    <input type="submit" value="booking" class="bg-blue-500 px-1 text-white rounded ml-3" id="booking">
                </form>
                
            </div>
        @empty
            <div class="w-full bg-gray-200 p-2 m-1 text-sm">
                No available time slot
            </div>
        @endforelse
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="border px-2 py-1 mt-2 rounded">back</a>
        </div>

    </div>
</div>
@endsection
@section('script')
    {{-- <script>
        const booking = document.getElementById('booking');
        booking.addEventListener('click', function(e) {
            e.preventDefault();
            // console.log('test');
            
            let result = confirm("Ready to book!");
            if (result == true) {
                console.log("OK was pressed.");
            } else {
                console.log("Cancel was pressed.");
            }
            
        });


    </script> --}}
@endsection