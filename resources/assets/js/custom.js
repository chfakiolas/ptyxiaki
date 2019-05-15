$( document ).ready(function() {
	// Το κουμπί που βάζει περισσότερες επιλογές για ψηφοφορία
	$('#add-choice').click(function(){
		// βρίσκω το data id απο το τελευταίο div των #pollchoices
		let id = $('#options').children().last().data("id");
		id++;
		// προσθετω το πεδιο πριν το div του κουμπιου
		$('#options').append(`
			<div data-id="`+id+`" class="form-group row">
    			<label for="option`+id+`" class="col-sm-2 col-form-label">Ψήφος `+id+`</label>
    			<div class="col-sm-10">
					<input class="form-control" placeholder="Poll option `+id+`" name="option[]" type="text" id="option`+id+`">
				</div>
			</div>`);
	});
});