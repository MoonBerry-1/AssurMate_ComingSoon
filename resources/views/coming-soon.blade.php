<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

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
=======
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AssurMate - Coming Soon</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
            rel="stylesheet"
        />
        <!-- Favicon -->
        <link
            rel="icon"
            href="{{ asset('Image/a-rond.png') }}"
            type="image/png"
        />
        @vite('resources/css/app.css')
    </head>

    <body class="relative flex flex-col min-h-screen bg-cover bg-center">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-white opacity-50"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col min-h-screen">
            <!-- Header -->
            <header
                class="bg-white bg-opacity-80 backdrop-blur-lg py-4 shadow-md"
            >
                <div
                    class="container mx-auto flex justify-between items-center px-6"
                >
                    <div class="flex items-center space-x-4">
                        <img
                            src="{{ asset('Image/a-rond.png') }}"
                            alt="AssurMate Logo"
                            class="h-10 md:h-12"
                        />
                        <span
                            class="text-xl md:text-2xl font-semibold text-gray-900"
                            >AssurMate</span
                        >
                    </div>
                    <div>
                        <span class="text-base md:text-lg text-gray-500 italic"
                            >Simplifiez vos assurances, restez assuré.</span
                        >
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main
                class="flex-grow flex flex-col items-center justify-center px-4 md:px-12"
            >
                <div
                    class="bg-white bg-opacity-95 p-8 md:p-14 rounded-lg shadow-lg max-w-2xl w-full text-center space-y-8 mb-12"
                >
                    <!-- Texte d'introduction avec animation "Coming Soon" -->
                    <h1
                        class="text-5xl md:text-6xl font-bold text-gray-700 animate-slow-bounce"
                    >
                        Coming Soon
                    </h1>
                    <h2
                        class="text-lg md:text-2xl font-medium text-gray-700 leading-tight"
                    >
                        Reprenez le pouvoir sur vos assurances !
                    </h2>
                    <p
                        class="text-gray-500 text-base md:text-lg leading-relaxed"
                    >
                        AssurMate est une plateforme numérique d’assurance pour
                        les particuliers, boostée par l’intelligence
                        artificielle. Rejoignez la communauté en vous inscrivant
                        et soyez alerté(e) du lancement !
                    </p>

                    <!-- Message de succès -->
                    @if(session('success'))
                    <div class="bg-green-600 text-white p-4 rounded-lg">
                        {{ session("success") }}
                    </div>
                    @endif

                    <!-- Formulaire d'inscription -->
                    <form
                        action="{{ route('coming-soon.submit') }}"
                        method="POST"
                        class="space-y-6"
                    >
                        @csrf
                        <div class="space-y-4">
                            <div class="relative">
                                <label
                                    for="nom"
                                    class="block text-left text-gray-700 font-medium"
                                    >Nom</label
                                >
                                <input
                                    type="text"
                                    name="nom"
                                    id="nom"
                                    value="{{ old('nom') }}"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:border-gray-400 focus:ring focus:ring-gray-400 focus:ring-opacity-50 shadow-sm transition-transform transform hover:scale-105"
                                />
                                @if ($errors->has('nom'))
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $errors->first('nom') }}
                                </div>
                                @endif
                            </div>
                            <div class="relative">
                                <label
                                    for="prenom"
                                    class="block text-left text-gray-700 font-medium"
                                    >Prénom</label
                                >
                                <input
                                    type="text"
                                    name="prenom"
                                    id="prenom"
                                    value="{{ old('prenom') }}"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:border-gray-400 focus:ring focus:ring-gray-400 focus:ring-opacity-50 shadow-sm transition-transform transform hover:scale-105"
                                />
                                @if ($errors->has('prenom'))
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $errors->first('prenom') }}
                                </div>
                                @endif
                            </div>
                            <div class="relative">
                                <label
                                    for="email"
                                    class="block text-left text-gray-700 font-medium"
                                    >Adresse e-mail</label
                                >
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:border-gray-400 focus:ring focus:ring-gray-400 focus:ring-opacity-50 shadow-sm transition-transform transform hover:scale-105"
                                />
                                @if ($errors->has('email'))
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="relative">
                            <button
                                type="submit"
                                class="w-full py-3 bg-gradient-to-r from-gray-700 to-gray-900 text-white font-semibold rounded-lg hover:from-gray-600 hover:to-gray-800 transition-transform transform hover:scale-105 shadow-lg"
                            >
                                Me tenir au courant !
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Additional Section -->
                <section class="container mx-auto text-center mt-12 px-6">
                    <h3
                        class="text-2xl md:text-3xl font-semibold text-gray-700 mb-8"
                    >
                        Pourquoi AssurMate ?
                    </h3>
                    <div
                        class="flex flex-col md:flex-row justify-center items-stretch space-y-8 md:space-y-0 md:space-x-8"
                    >
                        <div
                            class="bg-white bg-opacity-95 p-6 rounded-lg shadow-md flex-grow min-w-[200px] h-full"
                        >
                            <h4
                                class="text-xl font-semibold text-gray-700 mb-3"
                            >
                                Personnalisation
                            </h4>
                            <p class="text-gray-500">
                                Recevez des offres d'assurance personnalisées
                                selon vos besoins.
                            </p>
                        </div>
                        <div
                            class="bg-white bg-opacity-95 p-6 rounded-lg shadow-md flex-grow min-w-[200px] h-full"
                        >
                            <h4
                                class="text-xl font-semibold text-gray-700 mb-3"
                            >
                                Gestion Simplifiée
                            </h4>
                            <p class="text-gray-500">
                                Gérez tous vos contrats d'assurance en un seul
                                endroit.
                            </p>
                        </div>
                        <div
                            class="bg-white bg-opacity-95 p-6 rounded-lg shadow-md flex-grow min-w-[200px] h-full"
                        >
                            <h4
                                class="text-xl font-semibold text-gray-700 mb-3"
                            >
                                Économies
                            </h4>
                            <p class="text-gray-500">
                                Comparez et trouvez les meilleures offres pour
                                économiser sur vos assurances.
                            </p>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800 py-6 text-gray-300 mt-12">
                <div class="container mx-auto text-center">
                    <p>&copy; 2024 AssurMate. Tous droits réservés.</p>
                </div>
            </footer>
        </div>

        <!-- Custom Styles for Slow Animation -->
        <style>
            @keyframes slow-bounce {
                0% {
                    opacity: 0;
                    transform: translateY(30px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-slow-bounce {
                animation: slow-bounce 3s ease-in-out 1 alternate;
            }
        </style>
    </body>
</html>
>>>>>>> origin/master
