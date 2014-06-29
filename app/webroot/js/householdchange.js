$(document).ready(function() {
	var h = $('#householdchange');
	h.change(function(event) {
		var id = $(this).val();
		if (id != "") {
			window.location.href = '/budget_app/Bills/all/'+id;
		}
	});
});

