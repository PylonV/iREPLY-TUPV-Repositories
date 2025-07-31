<div id="registerModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[1000] opacity-0 invisible transition-opacity duration-300">
    <div class="bg-white p-10 rounded-2xl shadow-lg w-[90%] max-w-[450px] relative transform -translate-y-5 transition-transform duration-300">
        <button class="absolute top-4 right-4 text-2xl text-[#21283f] hover:text-black" onclick="closeModal('registerModal')">&times;</button>
        <h2 class="text-2xl font-bold text-center text-[#21283f] mb-6">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-5">
                <label for="registerName" class="block mb-2 font-medium text-[#21283f]">Full Name</label>
                <input type="text" id="registerName" name="name" class="w-full p-3 border border-gray-200 rounded-lg" required>
            </div>
            <div class="mb-5">
                <label for="registerEmail" class="block mb-2 font-medium text-[#21283f]">Email Address</label>
                <input type="email" id="registerEmail" name="email" class="w-full p-3 border border-gray-200 rounded-lg" required>
            </div>
            <div class="mb-5">
                <label for="registerPassword" class="block mb-2 font-medium text-[#21283f]">Password</label>
                <input type="password" id="registerPassword" name="password" class="w-full p-3 border border-gray-200 rounded-lg" required>
            </div>
            <div class="mb-5">
                <label for="registerConfirmPassword" class="block mb-2 font-medium text-[#21283f]">Confirm Password</label>
                <input type="password" id="registerConfirmPassword" name="password_confirmation" class="w-full p-3 border border-gray-200 rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-[#21283f] text-white py-3 rounded-lg font-semibold">Register</button>
        </form>
    </div>
</div>
