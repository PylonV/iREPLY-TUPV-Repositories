<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
</head>
<body>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Uploaded Resumes</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($resumes->isEmpty())
            <p>No resumes uploaded yet.</p>
        @else
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Name</th>
                        <th class="border px-4 py-2 text-left">Email</th>
                        <th class="border px-4 py-2 text-left">Phone</th>
                        <th class="border px-4 py-2 text-left">Platforms</th>
                        <th class="border px-4 py-2 text-left">Uploaded</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resumes as $resume)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $resume->name }}</td>
                            <td class="border px-4 py-2">{{ $resume->email }}</td>
                            <td class="border px-4 py-2">{{ $resume->phone }}</td>
                            <td class="border px-4 py-2">
                                @foreach(json_decode($resume->platforms ?? '[]') as $platform)
                                    <span class="inline-block bg-blue-200 text-blue-800 text-sm px-2 py-1 rounded mr-1">
                                        {{ $platform }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">{{ $resume->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
