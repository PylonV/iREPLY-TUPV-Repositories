<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css'])
    </head>
    <body class="bg-white text-gray-900 font-sans min-h-screen flex flex-col">

        {{-- Header --}}
        <header class="bg-[#21283f] text-white flex items-center justify-between px-12 py-4 shadow-md">
            <div>
                <img src="/images/ireply_logo.png" alt="IREPLY Logo" class="h-10">
            </div>
            <div>
                <a href="/home" class="px-4 py-2 border border-white rounded-md hover:bg-white hover:text-[#21283f] transition">Logout</a>
            </div>
        </header>

        {{-- Main --}}
        <main class="flex-grow px-6 py-12 max-w-2xl mx-auto">
            <div class="bg-gray-100 rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold mb-2 text-center text-[#21283f]">Upload Your File</h2>
                <p class="text-center text-gray-600 mb-8">Please select a file and provide the required details.</p>

                <form action="/upload" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- File --}}
                    <div>
                        <label for="file" class="block mb-2 font-medium">Resume File</label>
                        <input type="file" id="file" name="file" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    </div>

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block mb-2 font-medium">Name</label>
                        <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block mb-2 font-medium">Email</label>
                        <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block mb-2 font-medium">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    </div>

                    {{-- Platforms --}}
                    <div>
                        <label class="block mb-2 font-medium">Select Platforms</label>
                        <div class="flex gap-4">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="platforms[]" value="Airtable" class="accent-[#21283f]">
                                <span>Airtable</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="platforms[]" value="Zoho" class="accent-[#21283f]">
                                <span>Zoho</span>
                            </label>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit" class="w-full bg-[#21283f] text-white font-semibold py-3 rounded-lg hover:bg-white hover:text-[#21283f] border border-[#21283f] transition">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </main>

        {{-- Footer (Optional) --}}
        <footer class="text-center text-sm py-6 text-gray-500">
            &copy; {{ date('Y') }} IREPLY. All rights reserved.
        </footer>

    </body>
</html>
