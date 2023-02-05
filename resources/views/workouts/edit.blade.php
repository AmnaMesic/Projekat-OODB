<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Početna') }} - 
                <a href="{{ route('workouts') }}">
                    {{ __('Vježbe') }} - 
                </a>
                {{ __('Uređivanje') }} 
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($workouts as $workout)
                    <form method="POST" action="{{ route('update_workout') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $workout->id }}"/>
                        <div class="columns-2">
                            <x-jet-label for="name" value="{{ __('Naziv') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $workout->name }}" required autofocus />
                            <x-jet-label for="body_part" value="{{ __('Dio tijela') }}" />
                            <x-jet-input id="body_part" class="block mt-1 w-full" type="text" name="body_part" value="{{ $workout->body_part }}" required autofocus />
                        </div> 
                        <div class="columns-3 mt-4">
                            <x-jet-label for="workout_level" value="{{ __('Težina vježbe') }}" />
                            <x-jet-input id="workout_level" class="block mt-1 w-full" type="number" name="workout_level" value="{{ $workout->workout_level }}" required autofocus />
                            <x-jet-label for="series_number" value="{{ __('Broj serija') }}" />
                            <x-jet-input id="series_number" class="block mt-1 w-full" type="number" name="series_number" value="{{ $workout->series_number }}" required autofocus />    
                            <x-jet-label for="repetitions_number" value="{{ __('Broj ponavljanja') }}" />
                            <x-jet-input id="repetitions_number" class="block mt-1 w-full" type="number" name="repetitions_number" value="{{ $workout->repetitions_number }}" required autofocus />
                        </div>
                        <div class="columns-2 mt-4">
                            <x-jet-label for="calories_burned" value="{{ __('Utrošak kalorija') }}" />
                            <x-jet-input id="calories_burned" class="block mt-1 w-full" type="number" name="calories_burned" value="{{ $workout->calories_burned }}" required autofocus />
                            <x-jet-label for="equipment" value="{{ __('Oprema') }}" />
                            <select id="equipment" name="equipment" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option>Odaberi</option>
                                @foreach($equipments as $equipment)
                                <option value="{{ $equipment->id }}" 
                                @if($workout->equipment == $equipment->id) selected 
                                @endif>{{$equipment->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="columns-2 mt-4">
                            <x-jet-label for="workout_period" value="{{ __('Termin') }}" />
                            <select id="workout_period" name="workout_period" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option>Odaberi</option>
                                @foreach($workout_periods as $workout_period)
                                <option value="{{ $workout_period->id }}" 
                                @if($workout->workout_period == $workout_period->id) selected 
                                @endif>{{$workout_period->day_time}}</option>
                                @endforeach
                            </select> 
                            <x-jet-label for="trainer" value="{{ __('Trener') }}" />
                            <select id="trainer" name="trainer" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option>Odaberi</option>
                                @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}" 
                                @if($workout->trainer == $trainer->id) selected 
                                @endif>{{$trainer->name}} {{$trainer->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Spremi') }}
                            </x-jet-button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>