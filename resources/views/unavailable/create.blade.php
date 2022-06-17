@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="mb-2 text-center text-xl">Add Unavailables</h1>
            @include('layouts.msg')
            
            <form action="{{ route('unavailable.store') }}" method="post">
                @csrf
                <div class="my-2">
                    <input type="text" placeholder="Name" name="name"
                    class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                    focus:outline-none focus:border-blue-600 focus:text-gray-700" />
                <div class="my-2">
                    <input type="email" placeholder="Date" name="date" id="date"
                    class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                    focus:outline-none focus:border-blue-600 focus:text-gray-700" />
                </div>
                <div class="my-2 justify-end md:flex md:items-center">
                    <input type="submit" value="create" 
                    class="w-full my-2 p-1 bg-blue-500 text-white rounded-lg
                    hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" />
                </div>
              </form>
            
    </div>
    
</div>
@endsection

@section('script')
    <script>
        const fp = flatpickr("#date", 
        {
            // minDate: "today",
            // maxDate: new Date().fp_incr(60) // 60 days from now
        });
    </script>
@endsection