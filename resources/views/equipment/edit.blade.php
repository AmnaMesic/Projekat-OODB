<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Početna') }} - 
                <a href="{{ route('equipments') }}">
                    {{ __('Oprema') }} - 
                </a>
                {{ __('Uređivanje') }} 
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($equipments as $equipment)
                    <form method="POST" action="{{ route('update_equipment') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $equipment->id }}"/>
                        <div>
                            <x-jet-label for="name" value="{{ __('Naziv') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $equipment->name }}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-jet-label for="weight" value="{{ __('Težina [kg]') }}" />
                            <x-jet-input id="weight" class="block mt-1 w-full" type="number" name="weight" value="{{ $equipment->weight }}" required autofocus />
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