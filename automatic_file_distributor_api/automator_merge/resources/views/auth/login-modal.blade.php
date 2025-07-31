<div id="loginModal" class="fixed inset-0 flex items-center justify-center z-[1000] bg-black bg-opacity-60">
    <div class="bg-white p-10 rounded-2xl shadow-lg w-[90%] max-w-[450px] relative">
        <button class="absolute top-4 right-4 text-2xl text-[#21283f] hover:text-black" onclick="closeModal('loginModal')">&times;</button>
        <h2 class="text-2xl font-bold text-center text-[#21283f] mb-6">Login</h2>

        @if(session('status'))
            <div class="mb-4 text-green-600 text-center">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="mb-4 text-red-600 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
                <label for="loginEmail" class="block mb-2 font-medium text-[#21283f]">Email Address</label>
                <input type="email" id="loginEmail" name="email" class="w-full p-3 border border-gray-200 rounded-lg" required>
            </div>
            <div class="mb-5">
                <label for="loginPassword" class="block mb-2 font-medium text-[#21283f]">Password</label>
                <input type="password" id="loginPassword" name="password" class="w-full p-3 border border-gray-200 rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-[#21283f] text-white py-3 rounded-lg font-semibold">Log In</button>
        </form>
    </div>
</div>
