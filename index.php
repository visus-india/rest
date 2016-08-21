<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<?php 
include('header.php');
?>
<style type="text/css">
  .form-group 
  {
    position:absolute;
    z-index:9999999;
    top:20%; /* change to whatever you want */
    left:20%; /* change to whatever you want */
    right:auto; /* change to whatever you want */
    bottom:auto; /* change to whatever you want */
}

.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }


</style>
<div class="desktopview"> 
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
   

   <div class="form-group">    
	 
      <div class="">

		   <div id="search_form" class="clearfix">
		     
			 <h2> Search For Jobs </h2>
			 <select class="form-control col-md-12" id="jobTypeId" style="margin-bottom:7px;">
				<option value="" selected>Select Job Type</option>
					<option >Full Time</option>
					<option>Part Time</option>
					<option>Temporary</option>
					<option>Contract</option>
					<option>Internship</option>
					<option>Fresher</option>
					<option>Walk-in</option>
				</select>
		   
		     <input type="text" class="text col-md-12" id="jobTitle" placeholder="Enter Job Title ">
			<br/>
		   
		    
			 <input type="text" class="text col-md-12" placeholder="Enter Job Location ">
			 <br/>
			 
			 <label class="btn2 btn-2 btn2-1b col-md-12" style="margin-bottom:7px; text-align:center;">
			 <input type="submit" value="Find Jobs" id="findJobButton">
			 
			 </label>
			 
			<label class="btn2 btn-2 btn2-1b col-md-12" style="text-align:center;">
			 <input type="submit" value="Register" id="RegisterButton" onClick="gotoRegister();">
			 
			 </label>
		   
		   </div>
		 
		 
	
	  
	  
	  </div>
	  

	

    </div>
   
        <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
          <img src="images/banner.jpg" alt="">
        </div>
        
        <div class="item">
          <img src="images/banner.jpg" alt="">
        </div>  
    </div>
    <!-- Controls -->
	 <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right"></span>
   </a>
	
   <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left"></span>
   </a>
   
   
   
   </div>
</div>

<div class="mobileview">
	<div class="container">
		
		 
		  <div class="single"> 
		
	           <h3>Start your job search</h3>
	            <select class="form-control col-md-12" id="jobTypeId" >
				<option value="" selected>Select Job Type</option>
					<option >Full Time</option>
					<option>Part Time</option>
					<option>Temporary</option>
					<option>Contract</option>
					<option>Internship</option>
					<option>Fresher</option>
					<option>Walk-in</option>
				</select><br/>
			 <input type="text"  class="form-control" id="jobTitle" placeholder="Enter  Job Title " onfocus="this.value = '';" >
			<br/>
		
			
			 
			 <input type="text"  class="form-control" placeholder="Enter  Job Location " id="locaTion" >
			<br/>
			
			 <div id="search_form" class="clearfix">
			 <label class="btn2 btn-2 btn2-1b col-md-12" style="margin-bottom:7px; text-align:center;">
			 <input type="submit" value="Find Jobs" id="findJobButton">
			 
			 </label>
			 
			<label class="btn2 btn-2 btn2-1b col-md-12" style="text-align:center;">
			 <input type="submit" value="Register" id="RegisterButton">
			 
			 </label>
			
			 
			
			</div> 
         </div>
          <!-- Wrapper for slides -->

		
   </div> 
</div>	
 
<script>
function gotoRegister() {
location.href="upload-resume.php";
}
</script>



<?php
include('footer.php');
?>










