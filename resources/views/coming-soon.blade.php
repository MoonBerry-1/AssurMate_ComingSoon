<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Coming Soon</h1>
        <p class="text-center text-gray-600 mb-8">Stay tuned! We'll be here soon with our new website.</p>
        @if(session('success'))
    @foreach(session('success') as $key => $message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endforeach
@endif
        <form action="{{ route('coming-soon.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nom" class="block text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="mt-2 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($errors->has('nom'))
        <div style="color: red;">
            {{ $errors->first('nom') }}
        </div>
    @endif
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" class="mt-2 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($errors->has('prenom'))
        <div style="color: red;">
            {{ $errors->first('prenom') }}
        </div>
    @endif
            </div>
            <div class="mb-6">
                <label for="email" class="block text-gray-700">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-2 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($errors->has('email'))
        <div style="color: red;">
            {{ $errors->first('email') }}
        </div>
    @endif
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Notify Me</button>
            </div>
        </form>
    </div>
</body>
</html>
