<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        a.button {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            background: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .empty {
            text-align: center;
            color: gray;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('resumes.upload') }}" class="button">← Back to Upload</a>
        <h2>Uploaded Resumes</h2>

        @if ($resumes->count())
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Filename</th>
                        <th>Destinations</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resumes as $resume)
                        <tr>
                            <td>{{ $resume->name }}</td>
                            <td>{{ $resume->email }}</td>
                            <td>{{ $resume->phone }}</td>
                            <td>{{ $resume->filename }}</td>
                            <td>
                                @if (is_array($resume->destinations))
                                    {{ implode(', ', $resume->destinations) }}
                                @else
                                    {{ $resume->destinations }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ Storage::url($resume->path) }}" target="_blank">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="empty">No resumes have been uploaded yet.</p>
        @endif
    </div>
</body>
</html>
