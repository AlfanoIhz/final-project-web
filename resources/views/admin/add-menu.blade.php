@extends('layouts.admin')

@section('content')
<div class="bg-cover bg-center backdrop-blur-md">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-cover bg-center text-black rounded-xl overflow-hidden w-4/5 md:w-4/5">
            <div class="flex items-center justify-center mt-4">
                <p class="block mb-2 text-lg font-medium text-gray-900 dark:text-black">Masukan Menu</p>
            </div>
            <form form id="addMenu" action="{{ route('menu.add') }}" method="POST" enctype="multipart/form-data" class="max-w-sm my-2 mx-auto">
                @csrf
                <div class="mb-5">
                    <label for="menu_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Name</label>
                    <input type="text" id="menu_name" name="menu_name" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-light focus:gray-light block w-full p-2.5 dark:bg-light-200 dark:border-gray-100 dark:placeholder-light-400 dark:text-black dark:focus:ring-gray-500">
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-light focus:gray-light block w-full p-2.5 dark:bg-light-200 dark:border-gray-100 dark:placeholder-light-400 dark:text-black dark:focus:ring-gray-500">
                </div>

                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="decimal" id="price" name="price" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-light focus:gray-light block w-full p-2.5 dark:bg-light-200 dark:border-gray-100 dark:placeholder-light-400 dark:text-black dark:focus:ring-gray-500">
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-light focus:gray-light block w-full p-2.5 dark:bg-light-200 dark:border-gray-100 dark:placeholder-light-400 dark:text-black dark:focus:ring-gray-500">
                </div>
            </form>
            <div class="bg-cover text-center text-gray-600 py-4 rounded-b-xl">
                <button type="button" onclick="window.location.href='{{ route('admin.dashboard') }}'" class="btn btn-danger">Back</button>
                <button type="submit" form="addMenu" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection