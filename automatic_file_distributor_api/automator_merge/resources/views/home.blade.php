<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-6">Welcome to My App</h1>
            <div class="space-x-4">
                <button onclick="openModal('loginModal')" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</button>
                <button onclick="openModal('registerModal')" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Register</button>
            </div>
        </div>
    </div>

    <!-- Login & Register Modal -->
    @include('auth.login-modal')
    @include('auth.register-modal')


    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('opacity-0', 'invisible');
            modal.classList.add('opacity-100', 'visible', 'translate-y-0');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('opacity-0', 'invisible');
            modal.classList.remove('opacity-100', 'visible');
        }
    </script>

</body>
</html>
