var pcgfDraftSaveButton = $('#pcgf-autodrafts-save');
var pcgfDraftLoadButton = $('#pcgf-autodrafts-load');
var pcgfDraftContainer = $('#pcgf-autodrafts-container');
var pcgfDraftList = $('#pcgf-autodrafts-drafts');
var pcgfDraftForumId = $('#pcgf-autodrafts-forum-id').val();
var pcgfDraftTopicId = $('#pcgf-autodrafts-topic-id').val();
var pcgfDraftSubjectField = $('#subject');
var pcgfDraftMessageField = $('#message');

function assignEventHandlers() {
    // Append the event handlers for the buttons
    pcgfDraftSaveButton.on('click', function(e) {
        saveDraft(true);
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
    });

    pcgfDraftLoadButton.on('click', function(e) {
        /*showDrafts();
        pcgfDraftContainer.fadeIn(600);
        pcgfDraftContainer.removeClass('hidden');*/
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
    })
}

function saveDraft(quickDraft) {
    console.log(quickDraft);
    console.log(localStorage.getItem('pcgfDrafts'));
    // Load the currently saved drafts
    var drafts;
    if (typeof localStorage['pcgfDrafts'] === 'undefined') {
        drafts = [];
    } else {
        drafts = JSON.parse(localStorage['pcgfDrafts']);
    }
    // Create the new draft
    var newDraft = {
        autoDraft: quickDraft === undefined,
        time: new Date().getTime(),
        forumId: pcgfDraftForumId,
        topicId: pcgfDraftTopicId,
        subject: pcgfDraftSubjectField.val(),
        message: pcgfDraftMessageField.val()
    };
    // Delete old auto draft if this is an auto draft
    if (newDraft.autoDraft === true) {
        var draft;
        console.log(drafts.length);
        for (var i = 0; i < drafts.length; i++) {
            draft = drafts[i];
            if (draft === null || (draft.autoDraft === true && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId)) {
                delete drafts[i];
            }
        }
    }
    // Add the new draft
    drafts.push(newDraft);
    // Save the drafts
    localStorage['pcgfDrafts'] = JSON.stringify(drafts);
}

function showDrafts() {
    // Generate a list of all saved drafts for the current forum and topic
    var draftListContent = '<table><tr><th>' + pcgfLanguageDraftTime + '</th><th>' + pcgfLanguageAutoDraft + '</th><th>' + pcgfLanguageDraftSubject + '</th><th>' + pcgfLanguageDraftMessage + '</th></tr></table>';

    // Show the draft list
    pcgfDraftList.html(draftListContent);
}

$(document).ready(function() {
    // Check if local storage is available
    if (typeof Storage !== 'undefined') {
        // Show the draft buttons and enable auto saving function
        pcgfDraftSaveButton.removeClass('hidden');
        pcgfDraftLoadButton.removeClass('hidden');
        pcgfDraftContainer.insertBefore('#tabs');
        if (pcgfAutoSaveInterval > 0) {
            setInterval(saveDraft, pcgfAutoSaveInterval);
        }
        assignEventHandlers();
    }
});