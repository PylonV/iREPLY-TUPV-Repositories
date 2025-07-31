<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Resumes</title>
</head>
<body>
    <h1>Uploaded Resumes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Phone</th><th>File</th><th>Destinations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resumes as $resume)
                <tr>
                    <td>{{ $resume->name }}</td>
                    <td>{{ $resume->email }}</td>
                    <td>{{ $resume->phone }}</td>
                    <td>
                        <a href="{{ route('resumes.download', basename($resume->file_path)) }}">Download</a>
                    </td>
                    <td>{{ implode(', ', json_decode($resume->destinations, true)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><a href="{{ route('resumes.upload.form') }}">← Upload Another</a>
</body>
</html>

