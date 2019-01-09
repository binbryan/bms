$(document).ready( function(){
	/*$(".delete-btn").click(function() {
		// Display modal.
		$(".delete-modal").show();
	});	*/

	$(".close").click(function() {
		// Hide modal.
		$(".delete-modal, .edit-modal, .error-modal").fadeOut();
	});

	/*$(".close").click(function() {
		// Hide modal.
		$(".edit-modal").fadeOut();
	});*/
});

//#############################
	// Get account bal.
	function getAcctBal(accNum){
		if (accNum != '') {
			$("#accBal").load('account-balance.php', {
				accNum: accNum
			});
		}
	}
//#############################