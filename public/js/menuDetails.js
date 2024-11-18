$(document).ready(function() {
    // Event listener for when the modal is about to be shown
    $('#menuModal').on('show.bs.modal', function (event) {
        // Get the button that triggered the modal
        var button = $(event.relatedTarget); 
        
        // Extract data from data-* attributes
        var menuName = button.data('menu-name');
        var description = button.data('description');
        var price = button.data('price');
        var image = button.data('image');
        var availability = button.data('availability');

        // Update the modal's content
        var modal = $(this);
        modal.find('#modalMenuName').text(menuName);
        modal.find('#modalDescription').text(description);
        modal.find('#modalPrice').text(price);
        modal.find('#modalImage').attr('src', image);
        modal.find('#modalAvailability').text(availability);
    });
});