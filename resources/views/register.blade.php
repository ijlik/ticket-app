<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <!-- Particles background -->
    <div id="particles-js" class="absolute top-0 left-0 w-full h-full bg-black"></div>

    <!-- Registration Form -->
    <div class="bg-white bg-opacity-10 p-8 rounded-lg shadow-lg w-96 relative z-10">
        <h2 class="text-2xl font-semibold text-center mb-6 text-white">Register</h2>

        <!-- Error messages -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form Fields -->
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-white">Nama</label>
                <input type="text" name="name" id="name" required
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 bg-transparent text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-white">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 bg-transparent text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 bg-transparent text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Password Confirmation Field -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-white">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Register
            </button>
        </form>

        <!-- Login Redirect -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Sudah punya akun?</p>
            <a href="{{ route('authentication') }}" class="inline-block mt-2 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Login
            </a>
        </div>
    </div>

    <script>
        // Initialize particles.js for background effects
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 100,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff" // White color for particles
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1
                    }
                },
                "size": {
                    "value": 6,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 30,
                        "size_min": 0.1
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff", // White color for linking lines
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    }
                }
            },
            "retina_detect": true
        });
    </script>

</body>
</html>
