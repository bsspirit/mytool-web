function click_menu(obj){
	var o = {"id":$(obj).attr('mid'), "name":$(obj).attr('title')}
	render_wins(o);
}

function hover_bar(){
	$('#navigator .bar').each(function(idx){
		var bar = $(this);
		bar.hide();
		
		$(this).parent().hover(function(){
			bar.show();
		},function(){
			bar.hide();
		});
	});
}

function click_fade(){
	$('#navigator h1').each(function(idx){
		$(this).toggle(function(){
			$(this).next().fadeOut();
		},function(){
			$(this).next().fadeIn();
		});
	});
}