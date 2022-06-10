@extends('layouts.app')
@section('content')
<div class="flex w-1/2 mx-auto justify-between p-2">
    <div class="w-1/3">left</div>
    <div class="w-2/3 bg-white p-6 rounded-sm">
        <form action="{{ route('calendar.show') }}" method="post" class="mb-4">
            @csrf
            <div>
                <label for="calendar" class="sr-only">Calendar</label>
                <input type="text" name="calendar" id="calendar" class="w-full border p-1 border-black rounded-sm @error('body') border-red-500
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
        // console.log('test script');

        // var picker = new pikaday({ 
        //     field: document.getElementById('calendar'),
        // });

        // picker.clear()

        const fp = flatpickr("#calendar", {});
    </script>
@endsection