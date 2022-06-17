@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="mb-2 text-center text-xl">Edit Unavailables</h1>
            @include('layouts.msg')
            

            <form action="{{ route('unavailable.update', ['unavailable' => $unavailable->id ]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <input type="text" placeholder="Name" name="name" value="{{ $unavailable->name }}"
                    class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                    focus:outline-none focus:border-blue-600 focus:text-gray-700" />
                <div class="my-2">
                    <input type="email" placeholder="Date" name="date" value="{{ $unavailable->date }}" id="date"
                    class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                    focus:outline-none focus:border-blue-600 focus:text-gray-700" />
                </div>
                <div class="my-2 justify-end md:flex md:items-center">
                    <input type="submit" value="update" 
                    class="w-full my-2 p-1 bg-blue-500 text-white rounded-lg
                    hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" />
                </div>
              </form>


            {{-- <form action="{{ route('unavailable.update', ['unavailable' => $unavailable->id ]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="my-2 md:flex md:items-center">
                    <div class="mb-1 md:mb-0 md:w-1/3">
                      <label for="name">Name</label>
                    </div>
                    <div class="md:w-2/3 md:flex-grow">
                      <input name="name" class="w-full border p-1 border-black rounded-sm focus:outline-none" type="text" value="{{ $unavailable->name }}"/>
                    </div>
                </div>

                <div class="my-2 md:flex md:items-center">
                    <div class="mb-1 md:mb-0 md:w-1/3">
                      <label for="date">Date</label>
                    </div>
                    <div class="md:w-2/3 md:flex-grow">
                      <input name="date" class="w-full border p-1 border-black rounded-sm focus:outline-none" type="text" value="{{ $unavailable->date }}" id="date"/>
                    </div>
                </div>

                <div class="my-2 justify-end md:flex md:items-center">
                    <input type="submit" value="submit" class="w-2/3 my-2 p-1 bg-blue-500 text-white rounded-sm">
                </div>
            </form> --}}
            
            <div class="mt-6">
                <a href="{{ url()->previous() }}" class="border px-2 py-1 mt-2 rounded">back</a>
            </div>
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