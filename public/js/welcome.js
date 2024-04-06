$('.avatar-thumbnail').on('click', function() {
    var fullsizeSrc = $(this).data('src');
    $('.fullsize-avatar').attr('src', fullsizeSrc);
});

$('.open-modal').on('click', function(event) {
    event.preventDefault();
});
document.getElementById('redirectButton').addEventListener('click', function() {
    window.location.href = '/redirect-if-not-authenticated';
});