enableThisForm = function(id) {
    // If we are in save mode
    var testString = $('button.edit'+id).html();
    if (testString == "Edit") {
        console.log('in edit');
        $('input.'+id).each(function(){
            $(this).removeClass('disabledInput');
            $(this).addClass('enabledInput');
            $(this).prop('disabled', false);
        });
        $('button.edit'+id).html("Save");
    } else {
        console.log('in else');
        $('input.'+id).each(function(){
            $(this).removeClass('enabledInput');
            $(this).addClass('disabledInput');
            $(this).prop('disabled', true);
        });
        $('button.edit'+id).html("Edit");
        // Set our new submission Elements
        setSubmissionElements(id);
        // Submit form
        document.getElementById('selectedContact').value = id;
        var form = document.getElementById('editForm');
        form.submit();
    }
    console.log('finished');
}

function setSubmissionElements(contactID) {
    document.getElementById('name').value = document.getElementById('name'+contactID).value;
    document.getElementById('job').value = document.getElementById('job'+contactID).value;
    document.getElementById('lastContacted').value = document.getElementById('lastContacted'+contactID).value;
    document.getElementById('firstMeetingLocation').value = document.getElementById('firstMeetingLocation'+contactID).value;
    document.getElementById('primaryContactMethod').value = document.getElementById('primaryContactMethod'+contactID).value;
}