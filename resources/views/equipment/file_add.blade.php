<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Početna') }} - 
                <a href="{{ route('equipments') }}">
                    {{ __('Oprema') }} - 
                </a> 
                {{ __('Dodaj fajl') }}
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">  
                    <form method="POST" action="/process" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}"/>
                        <p>
                            <label for="file">
                                <input type="file" name="file" id="file"/>
                            </label>
                        </p>
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase float-right m-2">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>