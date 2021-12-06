const _token = $('meta[name="csrf-token"]').attr('content');

/**
 * Click listener
 * @param articleId
 * @param element
 */
let bookmark = function (articleId, element) {
    if (element.classList.contains('add')){
        deleteBookmark(articleId);
    }else {
        addBookmark(articleId);
    }
}

/**
 * Store bookmark
 * @param articleId
 */
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

/**
 * Delete bookmark
 * @param articleId
 */
let deleteBookmark = function (articleId) {
    $.ajax({
        method: 'DELETE',
        url: `${window.location.origin}/author/bookmark/ajax/${articleId}`,
        data: {
            _token,
        },
        success: function (response) {
            console.log(response.message);
        }
    });
}
