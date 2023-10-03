@extends('layouts.app')

@section('content')
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Subir archivo</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Archivo: .xlsx 5 MB</div>
    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Subir</button>
@endsection
