<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zoho Resume Viewer</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f3f6fb;
        }

        header {
            background-color: #e5f0fa;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #ccc;
        }

        header img {
            height: 40px;
            margin-right: 15px;
        }

        header h1 {
            font-size: 1.5rem;
            color: #2a2f4a;
        }

        h2 {
            margin: 2rem;
            color: #1f2d3d;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }

        th {
            background-color: #d4e9fa;
            color: #1a2d4a;
        }

        tr:hover {
            background-color: #f0faff;
        }

        a {
            color: #0056b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <img src="https://seeklogo.com/images/Z/zoho-logo-4A909A1B3D-seeklogo.com.png" alt="Zoho Logo">
    <h1>Zoho Resume Viewer</h1>
</header>

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
