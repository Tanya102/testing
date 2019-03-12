<head>
   <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
   <title>React App</title>
   
   <link href="style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"><div class="search-app">
	<div class="container-fluid">
		<div class="search-header">
			<form class="search-form">
				<h1 class="title page-title search-header__title">Search</h1>
				<div class="form-inline">
					<div class="form-group form-group__search">
					 	<input type="text" class="search-form__input form-control" placeholder="Search..." name="search" id="search">
					</div>
					<button class="btn btn-primary search-form__submit searchBtn" type="submit" >Search</button>
				</div>
			</form>
		</div>

		<div class="search-results">
			<div class="search-results__article-type-filters">
				<ul class="filter-tabs nav nav-tabs">

					<li role="presentation" class="filter-tab nav-item"><a data-article-type="all" class="filter-tab__button nav-link " href="/">all</a></li>
					<li role="presentation" class="filter-tab nav-item"><a data-article-type="serious" class="filter-tab__button nav-link active" href="/serious">serious</a></li>
					<li role="presentation" class="filter-tab nav-item"><a data-article-type="light" class="filter-tab__button nav-link " href="/light">light</a></li>
				</ul>

				<select class="form-control filter-select">
					<option value="all">all</option>
					<option value="serious">serious</option>
					<option value="light">light</option>
				</select>
			</div>

			<div class="search-results__header">
				<div class="search-results__info">
					<span class="search-results__counter">500 Results</span>
					<span class="search-results__search-word"></span>
				</div>

				<div class="search-sort">
					<label class="search-sort__label">Sort by
						<select class="form-control search-sort__select" id="sort" name ="selection">
							<option value="latest">latest</option>
							<option value="popularity">popularity</option>
							<option value="comments count">comments count</option>
						</select>
					</label>
				</div>
			</div>

            <div id="content"></div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			$( document ).ready(function() {
			   	var params = {};
				
				httpRequest('list.php', 'POST', params);

				$('.search-form').on('submit', function(e){
				   	e.preventDefault();
				   			    	
			        var search = $('#search').val();
			        params = {
			        	search: search
			        };
			       	httpRequest('list.php', 'POST', params);	
			  	});

			  	// $('.sort').on('click', function(e){
				  //  	e.preventDefault();
				  //  	var selection = $(this).val();		    	
			   //       console.log(selection);
			   //      params = {
			   //      	selection: selection
			   //      };
			   //     	httpRequest('list.php', 'POST', params);	
			  	// });
			});

			function httpRequest(url, type, params) {
				var list = '';
				$.ajax({
		            url : url,
		            type : type,
		            data: params,
		            success : function(res) {
		                array = JSON.parse(res);
		                 console.log(array);
		                
		              	list = appendHTML(array);
		            	$('#content').html(list);
		            },
		        });
			}		

			function appendHTML(array) {
				var htmlcode = '';
		        for (var i = 0; i < array.length; i++) {
		               		  
					htmlcode += "<div class='search-result-list'>"+
										"<div class='search-results__body'>"+
					 						"<div class='search-result'>"+
					 							"<div class='row'>"+
					 								"<div class='col-3'>"+
					 									"<img  class='search-result__image' src='https://via.placeholder.com/270x200' alt='meaningful description'>"+
				 									"</div>"+
					 								"<div class='col'>"+
					 									"<div class='search-result__main-info'>"+
					 										"<span class='search-result__date'>"+
				 												"<span class='search-result-field__text' id='date'>"+array[i].date_of_update+"</span>"+
				 											"</span>"+
			 												"<span class='search-result__article-type'>"+
			 													"<span class='badge badge-primary' id='category'>"+array[i].category+"</span>"+
			 												"</span>"+
				 											"<span class='search-result__author' id='user'>"+"Author:"+array[i].user+"</span>"+
				 										"</div>"+
				 										"<h2 class='search-result__title'>"+
					 										"<a href='https://edgardo.com' id ='title'>"+array[i].title+"</a>"+
					 									"</h2>"+
					 									"<div class='search-result__description' id ='description'>"+array[i].description+"</div>"+
				 										"<div class='search-result__add-info'>"+
				 											"<span class='search-result__comments-count'>Comments - 1719</span>"+
				 											"<span class='search-result__views-count' id='views'>Views -"+array[i].views+ " </span>"+
				 										"</div>"+
				 									"</div>"+
				 								"</div>"+
				 							"</div>"+
				 						"</div>"+
				 					"</div>";

			 		if(array.length != i+1) {
			 			htmlcode += '<hr/>';
			 		}
		        }
			 	return htmlcode;
			}
</script>