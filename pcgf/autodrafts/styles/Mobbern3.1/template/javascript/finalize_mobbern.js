if ($('#tabs.sub-panels').length > 0) {
    pcgfDraftContainer.insertBefore('#tabs.sub-panels');
} else {
    pcgfDraftContainer.addClass('pm-container').insertBefore('#options-panel');
}
pcgfDraftSaveButton.on('click', function() {
    $(this).blur();
});
pcgfDraftLoadButton.on('click', function() {
    $(this).blur();
});