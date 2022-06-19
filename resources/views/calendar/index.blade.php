@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-lg">
        <h1 class="mb-2 text-center text-xl">Book an appointment</h1>
        @include('layouts.msg')
        <form action="{{ route('calendar.show') }}" method="post" class="mb-4">
            @csrf
            <div>
                <label for="calendar" class="sr-only">Calendar</label>
                <input type="text" name="date" id="calendar" class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                focus:outline-none focus:border-blue-600 focus:text-gray-700" placeholder="Pick a date">
            </div>
            <div>
                <input type="submit" value="submit" class="w-full my-2 p-1 bg-blue-500 text-white rounded-lg">
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