{{-- Display Validation Errors --}}
{{-- @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

{{-- Display Success Message --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="success-alert">
        {{ session('success') }}
    </div>
@endif

<style>
    .alert {
        transition: all 0.5s ease-in-out;
        height: 50px;
    }
    .alert.fade-out {
        opacity: 0;
        height: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all alert elements
        const alerts = document.querySelectorAll('.alert');
        
        alerts.forEach(function(alert) {
            // Show the alert for 3 seconds
            setTimeout(function() {
                // Add fade-out class
                alert.classList.add('fade-out');
                
                // Remove the alert from DOM after animation completes
                setTimeout(function() {
                    alert.remove();
                }, 500); // This matches the transition duration
            }, 3000); // Show alert for 3 seconds
        });
    });
</script>


