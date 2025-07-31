<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 1rem;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: blue;
        }
    </style>
</head>
<body>
    <h2>Uploaded Resumes</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->number }}</td>
                    <td><a href="{{ asset($item->resume) }}" target="_blank">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
