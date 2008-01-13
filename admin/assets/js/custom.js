$(document).ready( function(){
	/*$(".delete-btn").click(function() {
		// Display modal.
		$(".delete-modal").show();
	});	*/

	$(".close").click(function() {
		// Hide modal.
		$(".delete-modal").fadeOut();
	});

	$(".close").click(function() {
		// Hide modal.
		$(".edit-modal").fadeOut();
	});
});

//#############################
	// Get account bal.
	function getAcctBal(accNum){
		if (accNum != '') {
			$("document").load('account-balance.php', {
				accNum: accNum
			});
		}
	}
//#############################