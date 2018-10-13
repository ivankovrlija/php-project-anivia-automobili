function valid(){
	var name=$("input['name=name']").val();
	var number=$("input['name=number']").val();
	var email=$("input['name=email']").val();
	var message=$("input['name=message']").val();
	if (name=="" || number=="" || email=="" || message="") {
		$("input").css("background-color", "red");
	}
	
		
	
}