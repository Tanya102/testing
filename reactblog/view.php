
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
   <title>React App</title>
   <link href="/static/css/main.5e481508.css" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"><div class="search-app">
	<div class="container-fluid">
		<div class="search-header">
			<form class="search-form" method="POST">
				<h1 class="title page-title search-header__title">Search</h1>
				<div class="form-inline">
					<div class="form-group form-group__search">
					 	<input type="text" class="search-form__input form-control search" placeholder="Search..." value="">
					</div>
					<button class="btn btn-primary search-form__submit" type="submit" onclick="search();">Search</button>
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
						<select class="form-control search-sort__select">
							<option value="latest">latest</option>
							<option value="popularity">popularity</option>
							<option value="comments count">comments count</option>
						</select>
					</label>
				</div>
			</div>


 
			<div class="search-result-list loop">
				
</div>

<nav>
	<ul class="pagination search-results-pagination">
		<li class="page-item disabled"><a class="page-link" tabindex="0">Prev</a></li>
		<li class="page-item active"><a class="page-link" tabindex="0" aria-label="Page 1 is your current page" aria-current="page">1</a></li>
		<li class="page-item"><a class="page-link" tabindex="0" aria-label="Page 2">2</a></li>
		<li class="page-item"><a class="page-link" tabindex="0" aria-label="Page 3">3</a></li>
		<li class="page-item"><a class="page-link" tabindex="0" aria-label="Page 4">4</a></li>
		<li class="break-me page-item page-link disabled">...</li>
		<li class="page-item"><a class="page-link" tabindex="0" aria-label="Page 50">50</a></li>
		<li class="page-item"><a class="page-link" tabindex="0">Next</a></li>
	</ul>
</nav>
</div>
</div>
</div>
</div>

<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script type="text/javascript" src="/static/js/main.js"></script>

<script>
	var txt;
	var searchStr = $('.search').val();

$.ajax({
	url : 'all_lists_api.php',
	type : 'GET',
	success : function(res) {
				res = JSON.parse(res);
				
				for (var i = 0; i < res.length; i++) {
					txt +=data(res[i]);
					//console.log(txt);
				}
				$('.loop').html(txt);
				},

})
function search(){
$.ajax({
	url : 'search_api.php',
	type : 'POST',
	success : function(res) {
				console.log(searchStr);
				console.log(res);
				},

})}


function data(res){
	var append="<div class='search-results__body'>"+
					"<div class='search-result'>"+
						"<div class='row'>"+
							"<div class='col-3'>"+
							"<img class='search-result__image' src='https://via.placeholder.com/270x200' alt='meaningful description'>"+
						    "</div>"+

						"<div class='col'>"+
							"<div class='search-result__main-info'>"+
								"<span class='search-result__date'>"+
									"<span class='search-result-field__text'>"+res.date_of_update+"</span>"+
								"</span>"+
								"<span class='search-result__article-type'>"+
									"<span class='badge badge-primary'>"+res.cat_name+"</span>"+
								"</span>"+
								"<span class='search-result__author'>"+res.user_name+"</span>"+
							"</div>"+
							"<h2 class='search-result__title'><a href='https://edgardo.com'>"+res.title+"</a></h2>"+
							"<div class='search-result__description'>"+res.description+"</div>"+
                            "<div class='search-result__add-info'>"+
                            	"<span class='search-result__comments-count'>Comments - 1719</span>"+
                            	"<span class='search-result__views-count'>Views - 1088</span>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
                
"</div>";
return append;}
	</script>
}
</body>
