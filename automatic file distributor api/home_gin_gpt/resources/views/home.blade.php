<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <!-- Link to your custom app.css -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="home-container">
        {{-- The "IREPLY" text --}}
        <div class="home-text">
            <img src = "images/ireply_logo.png" alt="IREPLY" class="ireply-logo">
        </div>

        {{-- Container for Login/Register buttons --}}
        <div class="auth-buttons">
            <a href="#" id="loginButton" class="button">Login</a>
            <a href="#" id="registerButton" class="button">Register</a>
        </div>
    </div>

    {{-- The image will go here, directly below the header --}}
    {{-- Make sure office_pic.jpg is in your public/images/ directory, or adjust the path --}}
    <img src="{{ asset('images/office_pic.jpg') }}" alt="Office Picture" class="header-image">

    <!-- Login Modal -->
    <div id="loginModal" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close-button" onclick="closeModal('loginModal')">&times;</button>
            <h2 class="modal-title">Login</h2>
            <form id="loginForm"> {{-- Added an ID to the form --}}
                <div class="form-group">
                    <label for="loginEmail" class="form-label">Email Address</label>
                    <input type="email" id="loginEmail" name="email" class="form-input" placeholder="you@example.com" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" id="loginPassword" name="password" class="form-input" placeholder="********" required>
                </div>
                <button type="submit" class="form-submit-button">Log In</button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close-button" onclick="closeModal('registerModal')">&times;</button>
            <h2 class="modal-title">Register</h2>
            <form id="registerForm"> {{-- Added an ID to the form --}}
                <div class="form-group">
                    <label for="registerName" class="form-label">Full Name</label>
                    <input type="text" id="registerName" name="name" class="form-input" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail" class="form-label">Email Address</label>
                    <input type="email" id="registerEmail" name="email" class="form-input" placeholder="you@example.com" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" id="registerPassword" name="password" class="form-input" placeholder="********" required>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" id="registerConfirmPassword" name="confirm_password" class="form-input" placeholder="********" required>
                </div>
                <button type="submit" class="form-submit-button">Register</button>
            </form>
        </div>
    </div>

    <script>
        // Function to open a specific modal
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        // Function to close a specific modal
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Get references to the buttons
        const loginButton = document.getElementById('loginButton');
        const registerButton = document.getElementById('registerButton');

        // Add event listeners to the buttons to open the respective modals
        loginButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior (navigating to #)
            openModal('loginModal');
        });

        registerButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior (navigating to #)
            openModal('registerModal');
        });

        // Get reference to the login form
        const loginForm = document.getElementById('loginForm');

        // Add event listener for the login form submission
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // --- Client-side simulation of login success ---
            console.log('Login form submitted!');
            // In a real application, you would send an AJAX request here to your Laravel backend
            // For example:
            // fetch('/login', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // For Laravel CSRF protection
            //     },
            //     body: JSON.stringify({
            //         email: document.getElementById('loginEmail').value,
            //         password: document.getElementById('loginPassword').value
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         window.location.href = '/dashboard'; // Redirect on success
            //     } else {
            //         // Show error message
            //         console.error('Login failed:', data.message);
            //     }
            // })
            // .catch(error => console.error('Error during login:', error));

            // For this demonstration, we'll directly redirect after a small delay
            // to simulate processing.
            setTimeout(() => {
                closeModal('loginModal'); // Close the modal first
                window.location.href = '/dashboard'; // Redirect to your dashboard route
            }, 500); // Simulate a short delay
        });

        // Optional: Close modal when clicking outside the content
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(event) {
                if (event.target === overlay) {
                    closeModal(overlay.id);
                }
            });
        });

        // Optional: Close modal when pressing the Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.querySelectorAll('.modal-overlay').forEach(overlay => {
                    if (overlay.classList.contains('active')) {
                        closeModal(overlay.id);
                    }
                });
            }
        });
    </script>
</body>
</html>


