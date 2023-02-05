<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Početna') }} - 
                <a href="{{ route('workouts') }}">
                    {{ __('Vježbe') }}
                </a> 
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <a href="/add_workout" class="m-2 p-2 justify-end inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase float-right">Dodaj vježbu</a>
                    <h1 style="padding-top: 10px; font-weight: bold;" class="font-xl mb-4 text-center">Vježbe - Lista</h1>
                    <hr />
                    @foreach ($workouts as $workout)
                        <div class="flex space-x-3">
                            <div class="flex-1">
                                <p class="p-2">{{ $workout->name }} - Težina vježbe: {{ $workout->workout_level }}</p>
                            </div>
                            <div class="flex-1">
                                <form method="POST" action="{{ route('delete_workout') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $workout->id }}">
                                    <div class="p-2">
                                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                                            {{ __('Obriši') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex-1">
                                <form method="POST" action="{{ route('edit_workout') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $workout->id }}">
                                    <div class="p-2">
                                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase">
                                            {{ __('Uredi') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
