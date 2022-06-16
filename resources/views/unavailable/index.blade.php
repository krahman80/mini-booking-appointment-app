@extends('layouts.app')
@section('content')
<div class="flex w-1/4 mx-auto justify-between p-2">
    <div class="w-full bg-white p-6 rounded-sm">
        <h1 class="mb-2 text-center text-xl">Manage Unavailables</h1>


        <div class="container flex justify-center mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="border-b border-gray-200 shadow">
                        <table>
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        ID
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Name
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Date
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Created_at
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Edit
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            Jon doe
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">jhondoe@example.com</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        2021-1-12
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                    </td>
                                </tr>
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

