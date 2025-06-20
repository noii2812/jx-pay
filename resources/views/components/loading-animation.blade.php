<!-- Loading Animation Component -->
<div id="page-loading-overlay" class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(232, 244, 255, 0.5); z-index: 9999; pointer-events: none;">
    <div class="text-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success mx-3" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <h4 class="mt-4 mb-1 text-primary">Loading</h4>
        <p class="text-muted">Please wait while we prepare your content...</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide loading animation when page is fully loaded
        setTimeout(function() {
            const loadingOverlay = document.getElementById('page-loading-overlay');
            if (loadingOverlay) {
                loadingOverlay.style.opacity = '0';
                loadingOverlay.style.transition = 'opacity 0.3s ease';
                
                setTimeout(function() {
                    loadingOverlay.style.display = 'none';
                }, 300);
            }
        }, 300); // Reduced delay to 300ms
    });
</script>

<style>
    #page-loading-overlay {
        opacity: 1;
        transition: opacity 0.3s ease;
    }
    
    .spinner-grow {
        animation-duration: 0.8s;
    }
</style> 