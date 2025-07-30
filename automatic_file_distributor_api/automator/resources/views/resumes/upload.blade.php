<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Resume</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 15px 0 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .checkbox-group {
            margin: 10px 0;
        }

        .checkbox-group label {
            font-weight: normal;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Resume</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('resumes.upload') }}" enctype="multipart/form-data">
            @csrf

            <label for="resume">Resume File</label>
            <input type="file" name="resume" required>

            <label for="name">Your Name</label>
            <input type="text" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" name="email" required>

            <label for="phone">Your Phone Number</label>
            <input type="text" name="phone" required>

            <div class="checkbox-group">
                <label><input type="checkbox" name="destinations[]" value="airtable"> Airtable</label><br>
                <label><input type="checkbox" name="destinations[]" value="zoho"> Zoho</label>
            </div>

            <button type="submit">Upload Resume</button>
            @if (session('resumePath'))
    <a href="{{ route('resumes.download', basename(session('resumePath'))) }}">Download Resume</a>
@endif

        </form>
    </div>
</body>
</html>
