$(document).ready(() => {
	var notification = "typing...";
	$("#query").on("keyup", () => {
		$("#userTyping").text(notification);
	});
	$("#adminQuery").on("keyup", () => {
		$("#adminTyping").text(notification);
	});
});