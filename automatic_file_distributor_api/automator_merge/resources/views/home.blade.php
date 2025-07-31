<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="font-inter bg-white min-h-screen flex flex-col">

        <!-- Header -->
        <div class="bg-[#21283f] text-white flex items-center justify-between min-h-[10vh] px-12 py-4">
            <div class="text-[40px] font-extrabold font-montserrat">
                <img src="{{ asset('images/ireply_logo.png') }}" alt="IREPLY" class="w-[200px] h-auto mt-2" />
            </div>
            <div class="flex gap-4 items-center">
                <a href="#" id="loginButton" class="font-montserrat font-bold text-sm text-white border-2 border-white px-5 py-2 rounded hover:bg-white hover:text-[#21283f] transition">
                    Login
                </a>
                <a href="#" id="registerButton" class="font-montserrat font-bold text-sm text-white border-2 border-white px-5 py-2 rounded hover:bg-white hover:text-[#21283f] transition">
                    Register
                </a>
            </div>
        </div>

        <!-- Hero Image -->
        <img src="{{ asset('images/office_pic.jpg') }}" alt="Office Picture" class="w-full h-auto block" />

        <!-- Login Modal -->
        <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[1000] opacity-0 invisible transition-opacity duration-300">
            <div class="bg-white p-10 rounded-2xl shadow-lg w-[90%] max-w-[450px] relative transform -translate-y-5 transition-transform duration-300">
                <button class="absolute top-4 right-4 text-2xl text-[#21283f] hover:text-black" onclick="closeModal('loginModal')">&times;</button>
                <h2 class="text-2xl font-bold text-center text-[#21283f] mb-6">Login</h2>
                <form id="loginForm">
                    <div class="mb-5">
                        <label for="loginEmail" class="block mb-2 font-medium text-[#21283f]">Email Address</label>
                        <input type="email" id="loginEmail" name="email" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#21283f]" placeholder="you@example.com" required>
                    </div>
                    <div class="mb-5">
                        <label for="loginPassword" class="block mb-2 font-medium text-[#21283f]">Password</label>
                        <input type="password" id="loginPassword" name="password" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#21283f]" placeholder="********" required>
                    </div>
                    <button type="submit" class="w-full bg-[#21283f] text-white py-3 rounded-lg font-semibold hover:bg-white hover:text-[#21283f] transition transform hover:-translate-y-0.5">
                        Log In
                    </button>
                </form>
            </div>
        </div>

        <!-- Register Modal -->
        <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[1000] opacity-0 invisible transition-opacity duration-300">
            <div class="bg-white p-10 rounded-2xl shadow-lg w-[90%] max-w-[450px] relative transform -translate-y-5 transition-transform duration-300">
                <button class="absolute top-4 right-4 text-2xl text-[#21283f] hover:text-black" onclick="closeModal('registerModal')">&times;</button>
                <h2 class="text-2xl font-bold text-center text-[#21283f] mb-6">Register</h2>
                <form id="registerForm">
                    <div class="mb-5">
                        <label for="registerName" class="block mb-2 font-medium text-[#21283f]">Full Name</label>
                        <input type="text" id="registerName" name="name" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#21283f]" placeholder="John Doe" required>
                    </div>
                    <div class="mb-5">
                        <label for="registerEmail" class="block mb-2 font-medium text-[#21283f]">Email Address</label>
                        <input type="email" id="registerEmail" name="email" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#21283f]" placeholder="you@example.com" required>
                    </div>
                    <div class="mb-5">
                        <label for="registerPassword" class="block mb-2 font-medium text-[#21283f]">Password</label>
                        <input type="password" id="registerPassword" name="password" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#21283f]" placeholder="********" required>
                    </div>
                    <div class="mb-5">
                        <label for="registerConfirmPassword" class="block mb-2 font-medium text-[#21283f]">Confirm Password</label>
                        <input type="password" id="registerConfirmPassword" name="confirm_password" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#21283f]" placeholder="********" required>
                    </div>
                    <button type="submit" class="w-full bg-[#21283f] text-white py-3 rounded-lg font-semibold hover:bg-white hover:text-[#21283f] transition transform hover:-translate-y-0.5">
                        Register
                    </button>
                </form>
            </div>
        </div>

        <!-- Scripts -->
        <script>
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('opacity-100', 'visible');
                modal.classList.remove('opacity-0', 'invisible');
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.remove('opacity-100', 'visible');
                modal.classList.add('opacity-0', 'invisible');
            }

            document.getElementById('loginButton').addEventListener('click', function(e) {
                e.preventDefault();
                openModal('loginModal');
            });

            document.getElementById('registerButton').addEventListener('click', function(e) {
                e.preventDefault();
                openModal('registerModal');
            });

            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                setTimeout(() => {
                    closeModal('loginModal');
                    window.location.href = '/upload';
                }, 500);
            });

            document.querySelectorAll('.modal-overlay').forEach(overlay => {
                overlay.addEventListener('click', e => {
                    if (e.target === overlay) closeModal(overlay.id);
                });
            });

            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal-overlay').forEach(overlay => {
                        if (overlay.classList.contains('visible')) closeModal(overlay.id);
                    });
                }
            });
        </script>
    </body>
</html>
