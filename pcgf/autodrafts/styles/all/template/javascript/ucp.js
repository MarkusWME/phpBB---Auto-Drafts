var pcgfDraftUsername = $('#pcgf_autodrafts_username').val();
var pcgfAutoDraftsCountField = $('#autodrafts_saved_drafts');
var pcgfAutoDraftsClearButton = $('#clear');

function getDrafts() {
    if (typeof localStorage['pcgfDrafts'] === 'undefined') {
        // If no drafts are set return an empty draft set
        return [];
    } else {
        // Return all current drafts
        if (localStorage['pcgfDrafts'][localStorage['pcgfDrafts'].length - 2] === ',') {
            localStorage['pcgfDrafts'] = localStorage['pcgfDrafts'].substring(0, localStorage['pcgfDrafts'].length - 2) + ']';
        }
        return JSON.parse(localStorage['pcgfDrafts']);
    }
}

function refreshAutodraftsCount() {
    // Load the draft count for the current user and write it into the info field
    var drafts = getDrafts();
    var draftCount = 0;
    for (var i = 0; i < drafts.length; i++) {
        if (drafts[i] !== null && drafts[i].username === pcgfDraftUsername) {
            draftCount++;
        }
    }
    pcgfAutoDraftsCountField.html(draftCount);
}

$(document).ready(function() {
    refreshAutodraftsCount();
    pcgfAutoDraftsClearButton.on('click', function(e) {
        // Don't reload the site when the button is clicked
        e.preventDefault();
        e.stopPropagation();
        var drafts = getDrafts();
        for (var i = 0; i < drafts.length; i++) {
            if (drafts[i] === null || drafts[i].username === pcgfDraftUsername) {
                // Delete invalid drafts and drafts that are from the current user
                delete drafts[i];
            }
        }
        localStorage['pcgfDrafts'] = JSON.stringify(drafts).replace(/null,?/gi, '');
        refreshAutodraftsCount();
    });
});