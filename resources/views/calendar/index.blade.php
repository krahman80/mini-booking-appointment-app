@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="my-2 text-center text-xl">Appointment Booking Application</h1>
        <form action="{{ route('calendar.show') }}" method="post" class="mb-4">
            @csrf
            <div>
                <label for="calendar" class="sr-only">Calendar</label>
                <input type="text" name="date" id="calendar" class="w-full border p-1 border-black rounded-sm @error('body') border-red-500
                @enderror focus:outline-none" placeholder="Pick a date">
            </div>
            <div>
                <input type="submit" value="submit" class="w-full my-2 p-1 bg-blue-500 text-white rounded-sm">
            </div>

        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        const fp = flatpickr("#calendar", 
        {
            // minDate: "today",
            maxDate: new Date().fp_incr(60) // 60 days from now
        });
    </script>
@endsection