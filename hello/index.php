<html>
<head>
</head>
<style>
.det1{height: 76px;
    width: 48%;
    margin-left: 27%;
    margin-top: 0%;
    margin-bottom: 1%;
    background-color: ghostwhite;
    border:1px solid ghostwhite;
    color:#535766;
}
.det2{height: 180px;
    width: 48%;
    margin-left: 27%;
    margin-top: 0%;
    margin-bottom: 1%;
    background-color: ghostwhite;
    border:1px solid ghostwhite;
    color:#535766!important;}

.butn1{width: 200px;
    float: none;
    display: block;
    margin-left: 43%;
    padding:10px;
    margin-top: 5%;
    background-color: #337ab7;
    box-shadow: none!important;
color:white;
text-transform: uppercase;
-webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-weight: 500;
    letter-spacing: 2px;
font-size: 13px;}

.bg{background-color:whitesmoke; 
	padding:25px;
	font-family: Whitney;
}

.para{
	text-align: center;
	font-size: 20px;
	font-family: Whitney;
	text-transform: uppercase;
	color:#535766;
}
</style>
<body>
<div  class="bg">
<div class="form-group has-error"> 
	<div class="assessment_question"> 
		<p class="para">Topic</p> 
	</div> 
	<div class="copyCoverLetterContainer"> 
	</div> 
	<textarea id="cover_letter" name="cover_letter" class="textarea form-control det1" placeholder="Please provide a suitable title.">
		
	</textarea> 
	
 </div>

 <div class="form-group has-error"> 
	<div class="assessment_question"> 
		<p class="para">Description</p>
	</div> 

	<div class="copyCoverLetterContainer"> 
	</div> 
	<textarea id="cover_letter" name="cover_letter" class="textarea form-control det2" placeholder="Please provide a description of this topic">
		
	</textarea> 
	
 </div>
 <br>

<input type="submit" name="submit" id="submit" class="btn btn-primary butn1" value="Submit">
 </div>
<script>
</script>
</body>
</html>