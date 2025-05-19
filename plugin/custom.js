
//hide or show the solution boxes

$(document).ready(function() {
	jQuery(".show-solution").click(function(){
		var that = jQuery(this);
		that.siblings(".solution-content").show();
		that.hide();
		that.siblings(".hide-solution").show();
	});

	jQuery(".hide-solution").click(function(){
		var that = jQuery(this);
		that.siblings(".solution-content").hide();
		that.hide();
		that.siblings(".show-solution").show();
	});
	

});
