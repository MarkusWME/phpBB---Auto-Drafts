const PCGF_MIN_CHARS = 3;
var pcgfDraftSaveButton = $('#pcgf-autodrafts-save');
var pcgfDraftLoadButton = $('#pcgf-autodrafts-load');
var pcgfDraftCloseButton = $('#pcgf-autodrafts-close');
var pcgfDraftContainer = $('#pcgf-autodrafts-container');
var pcgfDraftNotificationContainer = $('#pcgf-autodrafts-notifications');
var pcgfDraftNotificationAutoDraft = $('#pcgf-autodrafts-autosaved');
var pcgfDraftNotificationQuickDraft = $('#pcgf-autodrafts-quicksaved');
var pcgfDraftList = $('#pcgf-autodrafts-drafts');
var pcgfDraftForumId = $('#pcgf-autodrafts-forum-id').val();
var pcgfDraftTopicId = $('#pcgf-autodrafts-topic-id').val();
var pcgfDraftUsername = $('#pcgf-autodrafts-username').val();
var pcgfDraftSubjectField = $('#subject');
var pcgfDraftMessageField = $('#message');
var pcgfLoadedDraft = -1;

function assignPCGFAutodraftsEventHandlers() {
    // Append the event handlers for the buttons
    pcgfDraftSaveButton.on('click', function(e) {
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
        // Save the draft as quick draft
        saveDraft(true);
    });

    pcgfDraftLoadButton.on('click', function(e) {
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
        // Show the drafts
        showDrafts();
        pcgfDraftContainer.fadeIn(600);
        pcgfDraftContainer.removeClass('hidden');
    });

    pcgfDraftCloseButton.on('click', function(e) {
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
        // Hide the drafts
        pcgfDraftContainer.fadeOut(200);
    });

    pcgfDraftContainer.on('click', '#pcgf-autodrafts-load', function(e) {
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
        // Load the selected draft
        loadDraft($(this).prev('#pcgf-autodrafts-time').val());
    });

    pcgfDraftContainer.on('click', '#pcgf-autodrafts-delete', function(e) {
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
        // Delete the selected draft
        deleteDraft($(this).prev().prev('#pcgf-autodrafts-time').val());
    });

    $(document).on('click', 'input[name="post"]', function() {
        // Delete the selected quick draft (if there is one)
        if (pcgfLoadedDraft >= 0) {
            deleteDraft(pcgfLoadedDraft);
        }
        var drafts = getDrafts();
        var draft;
        for (var i = 0; i < drafts.length; i++) {
            draft = drafts[i];
            if (draft.username === pcgfDraftUsername && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId) {
                if (draft.autoDraft === true) {
                    // Delete the auto draft
                    deleteDraft(draft.time);
                } else if (pcgfDeleteDraftsAfterSubmission == true) {
                    // Delete all other drafts of the topic
                    deleteDraft(draft.time);
                }
            }
        }
    });
}

function saveDraft(quickDraft) {
    // Load the currently saved drafts
    var drafts = getDrafts();
    // Create the new draft
    var newDraft = {
        autoDraft: quickDraft === undefined,
        time: new Date().getTime(),
        forumId: pcgfDraftForumId,
        topicId: pcgfDraftTopicId,
        username: pcgfDraftUsername,
        subject: pcgfDraftSubjectField.val(),
        message: pcgfDraftMessageField.val()
    };
    var draft;
    var i;
    if (newDraft.autoDraft === true) {
        // Delete old auto draft if this is an auto draft
        if (newDraft.message.length < PCGF_MIN_CHARS) {
            return;
        }
        for (i = 0; i < drafts.length; i++) {
            draft = drafts[i];
            if (draft.autoDraft === true && draft.username === pcgfDraftUsername && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId) {
                delete drafts[i];
            }
        }
    } else {
        for (i = 0; i < drafts.length; i++) {
            draft = drafts[i];
            if (draft.username === pcgfDraftUsername && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId && draft.message === newDraft.message) {
                // If a draft with the same text already exists don't create a new one
                return;
            }
        }
    }
    // Add the new draft
    drafts.push(newDraft);
    // Save the drafts
    localStorage['pcgfDrafts'] = JSON.stringify(drafts).replace(/null,?/gi, '');
    // Show save notification
    if (newDraft.autoDraft === true) {
        showNotification(pcgfDraftNotificationAutoDraft);
    } else {
        showNotification(pcgfDraftNotificationQuickDraft);
    }
    // Show the new draft in the draft list when the draft list is shown
    if (!pcgfDraftContainer.hasClass('hidden')) {
        showDrafts();
    }
}

function loadDraft(draftTime) {
    // Get the currently saved drafts
    var drafts = getDrafts();
    // Search for the draft to load
    var draft;
    for (var i = 0; i < drafts.length; i++) {
        draft = drafts[i];
        if (draft.time == draftTime && draft.username === pcgfDraftUsername) {
            // Save which draft has been loaded last
            pcgfLoadedDraft = draftTime;
            // Draft found, display it
            pcgfDraftSubjectField.val(draft.subject);
            pcgfDraftMessageField.val(draft.message);
            pcgfDraftCloseButton.trigger('click');
            return;
        }
    }
}

function deleteDraft(draftTime) {
    // Get the currently saved drafts
    var drafts = getDrafts();
    // Search for the draft to delete
    var draft;
    for (var i = 0; i < drafts.length; i++) {
        draft = drafts[i];
        if (draft.time == draftTime && draft.username === pcgfDraftUsername) {
            // Draft found, delete it
            drafts.splice(i, 1);
            localStorage['pcgfDrafts'] = JSON.stringify(drafts).replace(/null,?/gi, '');
            if (!pcgfDraftContainer.hasClass('hidden')) {
                showDrafts();
            }
            return;
        }
    }
}

function parsePCGFDrafts() {
    if (localStorage['pcgfDrafts'][localStorage['pcgfDrafts'].length - 2] === ',') {
        localStorage['pcgfDrafts'] = localStorage['pcgfDrafts'].substring(0, localStorage['pcgfDrafts'].length - 2) + ']';
    }
    return JSON.parse(localStorage['pcgfDrafts']);
}

function getDrafts() {
    var drafts;
    if (typeof localStorage['pcgfDrafts'] === 'undefined') {
        // If no drafts are set return an empty draft set
        return [];
    } else {
        // Load the current drafts
        drafts = parsePCGFDrafts();
    }
    var draft;
    for (var i = 0; i < drafts.length; i++) {
        draft = drafts[i];
        if (draft === null || (pcgfAutoDeleteInterval > 0 && draft.time + (pcgfAutoDeleteInterval * 1) < new Date().getTime())) {
            // Delete all old or invalid drafts
            delete drafts[i];
        }
    }
    // Save the drafts object so that deleted drafts get deleted in local storage too
    localStorage['pcgfDrafts'] = JSON.stringify(drafts).replace(/null,?/gi, '');
    return parsePCGFDrafts();
}

function showNotification(notificationElement) {
    notificationElement.show();
    pcgfDraftNotificationContainer.show(200);
    setTimeout(function() {
        pcgfDraftNotificationContainer.hide(500);
        notificationElement.hide();
    }, 1500);
}

$(document).ready(function() {
    // Check if local storage is available
    if (typeof Storage !== 'undefined') {
        // Show the draft buttons and enable auto saving function
        pcgfDraftSaveButton.removeClass('hidden');
        pcgfDraftLoadButton.removeClass('hidden');
        pcgfDraftCloseButton.removeClass('hidden');
        pcgfDraftContainer.insertBefore('#postingbox + div.panel + div');
        pcgfDraftNotificationContainer.insertBefore(pcgfDraftContainer);
        if (pcgfAutoSaveInterval > 0) {
            setInterval(saveDraft, pcgfAutoSaveInterval);
        }
        assignPCGFAutodraftsEventHandlers();
        // Load the last auto draft automatically if no text is inside the message field
        if (pcgfInsertLastDraft == true && pcgfDraftMessageField.val().length === 0) {
            var drafts = getDrafts();
            var draft;
            for (var i = 0; i < drafts.length; i++) {
                draft = drafts[i];
                if (draft.autoDraft === true && draft.forumId === pcgfDraftForumId && draft.topicId === pcgfDraftTopicId) {
                    loadDraft(draft.time);
                }
            }
        }
    }
});