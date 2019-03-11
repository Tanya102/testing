<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<form method="POST" action="javascript:void(0)">
	<input id="city" type="text" placeholder="Search city & state" value="">
	<select id="state"></select>
	<button id="search" onclick="show();">Go</button>
	<hr>
	<p id="result"></p>
</form>

<script>
	var states=[],cityName,state_name;
	$.ajax({
			url : 'insert_city.php',
			type : 'GET',
			// data: {
			// 	city: searchStr
			// },
			success : function(res) {
		
				states = JSON.parse(res);
                for (var i = 0; i < states.length; i++) {
             	     $('#state').append('<option value="'+states[i].id+'">'+states[i].name+'</option>');
             	 }
             	},
    	})
</script>    