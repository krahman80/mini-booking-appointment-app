@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="mb-2 text-center text-xl">Login</h1>
        @include('layouts.msg')
        <form action="{{ route('login') }}" method="post" class="mb-4">
            @csrf
            <div>
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" class="w-full border p-1 my-1 border-black rounded-sm @error('body') border-red-500
                @enderror focus:outline-none" placeholder="email">
            </div>
            <div>
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" class="w-full border my-1 p-1 border-black rounded-sm @error('body') border-red-500
                @enderror focus:outline-none" placeholder="password">
            </div>
            <div>
                <input type="submit" value="login" class="w-full my-2 p-1 bg-blue-500 text-white rounded-sm">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
  
@endsection