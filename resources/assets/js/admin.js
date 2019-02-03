
require('../../../node_modules/admin-lte/dist/js/adminlte.min.js');
$(document).ready(function() {
    $('.delete-poll').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε την ψηφοφορία;')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
});