
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Form submission handling
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset error states
            document.querySelectorAll('.input-field').forEach(input => {
                input.classList.remove('error');
            });
            
            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Simulate validation errors
            if (!name) {
                document.getElementById('name').classList.add('error');
            }
            
            if (!email || !validateEmail(email)) {
                document.getElementById('email').classList.add('error');
            }
            
            if (!password || password.length < 8) {
                document.getElementById('password').classList.add('error');
            }
            
            // If no errors, submit form
            if (name && validateEmail(email) && password.length >= 8) {
                alert('Form submitted successfully!');
                this.reset();
            }
        });
        
        // Email validation helper
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        // Simulate server-side errors on load
        setTimeout(() => {
            document.querySelectorAll('.input-field').forEach(input => {
                input.classList.add('error');
            });
        }, 500);
