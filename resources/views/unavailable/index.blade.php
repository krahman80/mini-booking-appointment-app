@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-sm">
        <div class="flex justify-between items-center">
            <div class="">
                <h1 class="mb-2 text-center text-xl">List Unavailables</h1>
            </div>
            <div class="">
                <a href="{{ route("unavailable.create") }}" 
                class="px-2 py-1 ml-1 text-xs text-white bg-blue-400 rounded">add</a>
            </div>
        </div>
                
        @include('layouts.msg')

            @forelse ($unavailable as $key  => $item)
            <div class="w-full bg-gray-200 p-2 mt-1 text-sm flex flex-col rounded">
                <div class="flex justify-between mb-1">
                    <div class="text-gray-900">
                        {{-- {{ $unavailable->firstItem() + $key }}.  --}}
                        {{ $item->name }}
                    </div>
                    <div class="text-gray-900">
                        {{ $item->date->format('M d, Y') }}
                    </div>
                </div>
                <div class="flex justify-end text-xs"> 
                    <a href="{{ route('unavailable.edit', ['unavailable' => $item->id ])}}" class="px-1 mr-1 text-xs text-white bg-blue-400 rounded">edit</a>
                    {{-- <a href="{{ route('unavailable.destroy', ['unavailable'])}}" class="px-1 ml-1 text-xs text-white bg-red-400 rounded">delete</a> --}}
                    <form action="{{ route('unavailable.destroy', ['unavailable' => $item->id]) }}" method="post">
                        <input class="px-1 ml-1 text-xs text-white bg-red-400 rounded" type="submit" value="Delete" />
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
            
            @empty
            <div class="w-full bg-gray-200 p-2 mt-1 text-sm flex flex-col rounded">
                <div class="flex justify-between mb-1">
                    <div class="text-gray-900">
                        No item found
                    </div>
                    <div class="font-semibold">
                        
                    </div>
                </div>
                <div class="flex justify-end text-xs"> 
                    &nbsp;
                </div>
            </div>
            @endforelse
            <div>
                {{ $unavailable->links() }}
            </div>

    </div>
</div>
@endsection

