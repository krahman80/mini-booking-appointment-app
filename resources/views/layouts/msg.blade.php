@if ($errors->any())
    <ul id="errors" class="my-2 text-center">
        @foreach ($errors->all() as $error)
            <li class="bg-red-400 p-2 text-white text-sm rounded-sm">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (session('message'))
    <div class="text-center bg-green-400 p-2 my-2 text-white rounded-sm">
        {{ session('message') }}
    </div>    
@endif