function showDrafts() {
    // Prepare the date formatter object
    var dateFormatter = new DateFormatter();
    dateFormatter.setLocaleSettings(pcgfLocales);
    // Generate a list of all saved drafts for the current forum and topic
    var draftListContent = '<table class="pcgf-drafts"><tr class="centered panel-heading"><th>' + pcgfLanguageDraftTime + '</th><th>' + pcgfLanguageSavedUntil + '</th><th>' + pcgfLanguageAutoDraft + '</th><th>' + pcgfLanguageDraftSubject + '</th><th>' + pcgfLanguageDraftMessage + '</th><th>' + pcgfLanguageAction + '</th></tr>';
    var drafts = getDrafts();
    var found = false;
    var draft;
    for (var i = 0; i < drafts.length; i++) {
        draft = drafts[i];
        if (draft.username === pcgfDraftUsername && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId) {
            found = true;
            draftListContent += '<tr><td>' + dateFormatter.format(pcgfDateTimeFormat, draft.time) + '</td><td>' + (pcgfAutoDeleteInterval == 0 ? '' : dateFormatter.format(pcgfDateTimeFormat, draft.time + (pcgfAutoDeleteInterval * 1))) + '</td><td class="centered">' + (draft.autoDraft ? pcgfYes : pcgfNo) + '</td><td>' + draft.subject + '</td><td>' + draft.message + '</td><td><input id="pcgf-autodrafts-time" type="hidden" value="' + draft.time + '"/><input id="pcgf-autodrafts-load" class="button2" type="submit" value="' + pcgfDraftLoadButton.val() + '"/><input id="pcgf-autodrafts-delete" class="button2" type="submit" value="' + pcgfLanguageDeleteDraft + '"/></td></tr>';
        }
    }
    if (!found) {
        draftListContent += '<tr><td colspan="6">' + pcgfLanguageNoDraftsFound + '</td></tr>';
    }
    draftListContent += '</table>';
    // Show the draft list
    pcgfDraftList.html(draftListContent);
}