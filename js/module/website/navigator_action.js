function click_menu(name){
	switch(name){
	case "normal": 
		//flush normal
		break;
	case "local": 
		break;
	case "my": 
		break;
	case "add_site": 
		$('#navigatorDialog').dialog('open');
		render_add1();
		break;
	}
}