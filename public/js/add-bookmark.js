const _token = $('meta[name="csrf-token"]').attr('content');

/**
 * Click listener
 * @param articleId
 * @param element
 * @param authCheck
 */
let bookmark = function (articleId, element, authCheck) {
    if (element.classList.contains('add') && authCheck){
        deleteBookmark(articleId);
    }else if(authCheck) {
        addBookmark(articleId);
    }else {
        window.location.href = `${window.location.origin}/login`;
    }
}

/**
 * Store bookmark
 * @param articleId
 */
let addBookmark = function (articleId) {
    $.ajax({
        method: 'PUT',
        url: `${window.location.origin}/profile/bookmark/store/${articleId}`,
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
        url: `${window.location.origin}/profile/bookmark/ajax/${articleId}`,
        data: {
            _token,
        },
        success: function (response) {
            console.log(response.message);
        }
    });
}
