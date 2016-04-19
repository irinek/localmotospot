$(document).ready(function() {

$('div.alert-success').delay(3000).slideUp(300);


$(document).on("click", ".open-modal", function() {
	var imageId = $(this).data('id');
	$(".modal-footer form").attr("action", "/admin/upload/" + imageId);
});

});
//# sourceMappingURL=admin-app.js.map
