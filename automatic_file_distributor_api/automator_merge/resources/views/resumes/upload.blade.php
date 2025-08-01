<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
</head>
<body>

    {{-- Header bar --}}
    <div class="home-container">
        <div class="home-text">
            <img src="images/ireply_logo.png" alt="IREPLY" class="ireply-logo">
        </div>
        <div class="auth-buttons">
            <a href="/home" class="button">Logout</a>
        </div>
    </div>

    {{-- Upload form --}}
    <div class="dashboard-content">
        <div class="welcome-message">
            <h2>Upload Your File</h2>
            <p>Please select a file and provide the required details.</p>
        </div>

        <div style="margin-bottom: 24px;">
            <a href="/resumes" style="
                display: inline-block;
                background-color: #38a169;
                color: white;
                font-weight: 600;
                padding: 10px 20px;
                border-radius: 6px;
                text-decoration: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
                transition: background-color 0.2s ease;
            " onmouseover="this.style.backgroundColor='#2f855a'" onmouseout="this.style.backgroundColor='#38a169'">
                View Uploaded Resumes
            </a>
        </div>

        <form action="/resumes" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Resume File --}}
            <div class="form-group">
                <label for="resume" class="form-label">Resume File</label>
                <input type="file" id="resume" name="resume" class="form-input" required>
            </div>

            {{-- Name --}}
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>

            {{-- Phone Number --}}
            <div class="form-group">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-input" required>
            </div>

            {{-- Airtable and Zoho Checkboxes --}}
            <div class="form-group">
                <label class="form-label">Select Platforms</label>
                <div>
                    <label>
                        <input type="checkbox" name="platforms[]" value="Airtable">
                        Airtable
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="platforms[]" value="Zoho">
                        Zoho
                    </label>
                </div>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="form-submit-button">Upload</button>
        </form>
    </div>

</body>
</html>
