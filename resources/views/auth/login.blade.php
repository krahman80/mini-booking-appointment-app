@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="mb-2 text-center text-xl">Login</h1>
        @include('layouts.msg')
        <form action="{{ route('login') }}" method="post" class="mb-4">
            @csrf
            <div class="my-2">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                focus:outline-none focus:border-blue-600 focus:text-gray-700 
                @error('body') border-red-500 @enderror" 
                placeholder="email" 
                >
            </div>
            <div class="my-2">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg 
                focus:outline-none focus:border-blue-600 focus:text-gray-700 
                @error('body') border-red-500 @enderror" 
                placeholder="password">
            </div>
            <div class="my-2">
                <input type="submit" value="login" class="w-full p-1 bg-blue-500 text-white rounded-lg">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
  
@endsection