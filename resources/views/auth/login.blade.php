<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - STALO</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">

    <main class="w-full max-w-md">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">STALO</h1>
            <p class="text-gray-600 mt-2">Software Studio</p>
        </header>

        <section class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Seja bem-vindo!</h2>
            <x-alert-errors />
            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf

                <x-input
                    type="email"
                    name="email"
                    placeholder="Digite seu email "
                    :icon="Blade::render('<x-heroicon-o-envelope class=\'w-5 h-5 text-gray-400\' />')"
                />

                <x-input
                    type="password"
                    name="password"
                    placeholder="Digite sua senha"
                    :icon="Blade::render('<x-heroicon-s-lock-closed class=\'w-5 h-5 text-gray-400\' />')"
                />

                <x-button>
                    Entrar
                </x-button>
            </form>
        </section>
    </main>

</body>
</html>
