@extends('layouts.app')

@section('content')
<div class="bg-gray-50 w-full min-h-screen flex flex-col items-center justify-center px-6 py-10">

    {{-- Conteúdo principal --}}
    <div class="max-w-4xl w-full text-center">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4 ">
            Seja bem-vindo, {{ Auth::user()->name }}!
        </h2>
        <p class="text-gray-700 text-lg mb-12 max-w-2xl mx-auto">
            Esse sistema foi criado por Nicolas Matias com a ideia de mostrar, na prática, como usar o Laravel para construir um CRUD completo e funcional.
        </p>
    </div>

    {{-- Cards informativos --}}
    @php
        $cards = [
            ['id' => '01', 'text' => 'Funcionalidade simples e direta.'],
            ['id' => '02', 'text' => 'Experiência leve e intuitiva.'],
            ['id' => '03', 'text' => 'Código limpo e bem estruturado.'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl w-full">
        @foreach ($cards as $card)
            <div class="p-6 rounded-xl shadow-lg text-center text-[#000121] bg-white">
                <span class="text-sm font-bold text-[#000121] block mb-2">{{ $card['id'] }}</span>
                <p class="font-medium">{{ $card['text'] }}</p>
            </div>
        @endforeach
    </div>

</div>
@endsection
