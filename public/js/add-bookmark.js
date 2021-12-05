const _token = $('meta[name="csrf-token"]').attr('content');

let bookmark = function (articleId, element) {
    if (element.classList.contains('add')){
        deleteBookmark(articleId);
    }else {
        addBookmark(articleId);
    }
}

let addBookmark = function (articleId) {
    $.ajax({
        method: 'PUT',
        url: `${window.location.origin}/author/bookmark/store/${articleId}`,
        data: {
            _token,
        },
        success: function (response) {
            console.log(response.message);
        }
    });
}

let deleteBookmark = function (articleId) {
    $.ajax({
        method: 'DELETE',
        url: `${window.location.origin}/author/ajax/bookmarks/${articleId}`,
        data: {
            _token,
        },
        success: function (response) {
            console.log(response.message);
        }
    });
}
