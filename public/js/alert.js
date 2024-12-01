
// Function to automatically dismiss alerts after 2 seconds
setTimeout(function() {
    var successAlert = document.getElementById('successAlert');
    var errorAlert = document.getElementById('errorAlert');
    
    if (successAlert) {
        var bsAlert = new bootstrap.Alert(successAlert);
        bsAlert.close();
    }
    
    if (errorAlert) {
        var bsAlert = new bootstrap.Alert(errorAlert);
        bsAlert.close();
    }
}, 1500);

// Dismiss alert when there is input outside the alert
document.addEventListener('input', function(event) {
    if (event.target.closest('.alert') === null) {
        var successAlert = document.getElementById('successAlert');
        var errorAlert = document.getElementById('errorAlert');
        
        if (successAlert) {
            var bsAlert = new bootstrap.Alert(successAlert);
            bsAlert.close();
        }
        
        if (errorAlert) {
            var bsAlert = new bootstrap.Alert(errorAlert);
            bsAlert.close();
        }
    }
});
