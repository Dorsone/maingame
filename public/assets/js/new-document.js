function addFile(params) {
    return `<div class="account-settings-document-block" id="document-${params.id}">
                <div class="account-settings-document-item">
                    <div class="account-settings-document-icon">
                        <svg class="icon icon-file-blank">
                            <use xlink:href="${window.location.origin}/images/sprite-inline.svg#file-blank"></use>
                        </svg>
                    </div>
                    <p class="account-settings-document-label">${params.file_name}</p>
                    <button class="account-settings-document-btn" onclick="deleteFile(${params.id})">Удалить</button>
                </div>
            </div>`;
}