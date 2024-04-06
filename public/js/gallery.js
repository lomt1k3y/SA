  // Обработка события клика на кнопках сортировки

  function sortPhotosByDateAscending() {
    var $photoContainer = $('.row');
    var $photoList = $photoContainer.children('.user-card').detach();
    $photoList.sort(function(a, b) {
        return new Date($(a).find('.text-end').text()) - new Date($(b).find('.text-end').text());
    });
    $photoContainer.append($photoList.hide().each(function(index) {
        $(this).delay(200 * index).fadeIn(800);
    }));
}

function sortPhotosByDateDescending() {
    var $photoContainer = $('.row');
    var $photoList = $photoContainer.children('.user-card').detach();
    $photoList.sort(function(a, b) {
        return new Date($(b).find('.text-end').text()) - new Date($(a).find('.text-end').text());
    });
    $photoContainer.append($photoList.hide().each(function(index) {
        $(this).delay(200 * index).fadeIn(800);
    }));
}

$(document).ready(function() {
    // Сортировка по возрастанию
    $('#sortAscendingButton').on('click', function() {
        sortPhotosByDateAscending();
    });

    // Сортировка по убыванию
    $('#sortDescendingButton').on('click', function() {
        sortPhotosByDateDescending();
    });
});