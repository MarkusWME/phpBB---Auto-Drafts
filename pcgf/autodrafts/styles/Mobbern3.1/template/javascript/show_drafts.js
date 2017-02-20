function showDrafts() {
    // Prepare the date formatter object
    var dateFormatter = new DateFormatter();
    dateFormatter.setLocaleSettings(pcgfLocales);
    // Generate a list of all saved drafts for the current forum and topic
    var draftListContent = '<div class="panel"><ul class="topiclist"><li class="header"><dl><dd>' + pcgfLanguageDraftTime + '</dd><dd>' + pcgfLanguageSavedUntil + '</dd><dd>' + pcgfLanguageAutoDraft + '</dd><dd>' + pcgfLanguageDraftSubject + '</dd><dd>' + pcgfLanguageDraftMessage + '</dd><dd>' + pcgfLanguageAction + '</dd></dl></li>';
    var drafts = getDrafts();
    var found = false;
    var draft;
    for (var i = 0; i < drafts.length; i++) {
        draft = drafts[i];
        if (draft.username === pcgfDraftUsername && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId) {
            found = true;
            draftListContent += '<li class="row"><dl><dd>' + dateFormatter.format(pcgfDateTimeFormat, draft.time) + '&nbsp;</dd><dd>' + (pcgfAutoDeleteInterval == 0 ? '' : dateFormatter.format(pcgfDateTimeFormat, draft.time + (pcgfAutoDeleteInterval * 1))) + '&nbsp;</dd><dd class="centered">' + (draft.autoDraft ? pcgfYes : pcgfNo) + '&nbsp;</dd><dd>' + draft.subject + '&nbsp;</dd><dd>' + draft.message + '&nbsp;</dd><dd><input id="pcgf-autodrafts-time" type="hidden" value="' + draft.time + '"/><input id="pcgf-autodrafts-load" class="button2" type="submit" value="' + pcgfDraftLoadButton.val() + '"/>&nbsp;<input id="pcgf-autodrafts-delete" class="button2" type="submit" value="' + pcgfLanguageDeleteDraft + '"/>&nbsp;</dd></dl></li>';
        }
    }
    if (!found) {
        draftListContent += '<li class="row not-found"><dl><dd>' + pcgfLanguageNoDraftsFound + '</dd></dl></li>';
    }
    draftListContent += '</ul></div>';
    // Show the draft list
    pcgfDraftList.html(draftListContent);
}