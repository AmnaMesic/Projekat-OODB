<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Početna') }}
            </a>
        </h2>
    </x-slot>

    @php

        $latitude = 44.811962;
        $longitude = 15.868565;

        $api_key = '1cd3d74f300a272e8257af0ced42d2db';
        
        $api_url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $latitude . '&lon=' . $longitude . '&appid=' . $api_key; 

        $weather_data = json_decode(file_get_contents($api_url), true);

        $temperature = $weather_data['main']['temp'];

        $temperature_in_celsius = $temperature - 273.15;

        $temperature_current_weather = $weather_data['weather'][0]['main'];

        $temperature_current_weather_description = $weather_data['weather'][0]['description'];

        $temperature_current_weather_icon = $weather_data['weather'][0]['icon'];

    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-3">
                <h1 style="padding-top: 10px; font-weight: bold;" class="font-xl mb-4 text-center">Prikaz složenih upita</h1>
                <hr />
                <div class="grid grid-cols-5 gap-5 p-4 justify-items-center">
                    <div>
                        <h1>Upit 1.</h1>
                        <hr />
                        @foreach($most_common_equipments as $most_common_equipment)
                            <p>{{ $loop->iteration }}. {{ $most_common_equipment->name }} - {{ $most_common_equipment->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Upit 2.</h1>
                        <hr />
                        @foreach($most_common_equipment_weights as $most_common_equipment_weight)
                            <p>{{ $loop->iteration }}. {{ $most_common_equipment_weight->weight }} kg - {{ $most_common_equipment_weight->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Upit 3.</h1>
                        <hr />
                        @foreach($most_common_workout_periods as $most_common_workout_period)
                            <p>{{ $loop->iteration }}. {{ $most_common_workout_period->day_time }} - {{ $most_common_workout_period->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Upit 4.</h1>
                        <hr />
                        @foreach($most_common_trainers as $most_common_trainer)
                            <p>{{ $loop->iteration }}. {{ $most_common_trainer->name }} - {{ $most_common_trainer->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Upit 5.</h1>
                        <hr />
                        @foreach($most_common_trainer_weights as $most_common_trainer_weight)
                            <p>{{ $loop->iteration }}. {{ $most_common_trainer_weight->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-3">
                <h1 style="padding-top: 10px; font-weight: bold;" class="font-xl mb-4 text-center">Interakcija sa Weather API</h1>
                <hr />
                <div class="grid grid-cols-2 gap-2 p-2 justify-items-center">
                    <div>
                        <p style="padding: 10px;">Trenutna temperatura u Bihaću je:</p>
                        <h1 style="text-align: center; font-size: 60px; font-weight: bold;">{{ round($temperature_in_celsius) }} °C</h1>
                    </div>
                    <div>
                        <p style="padding: 10px;">Vrijeme u Bihaću je oblačno.</p>
                        <img src="http://openweathermap.org/img/wn/{{ $temperature_current_weather_icon }}@2x.png" alt="Weather icon" style="display: block; margin: 0 auto; width: 50%;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
