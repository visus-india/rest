  <?php 
include('header.php');
?>
  
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
   
 <div class="container">
   <div class="form-group">    
	
      <div class="banner_1">

		   <div id="search_form" class="clearfix">
		   
		     <input type="text" class="text" id="jobTitle" placeholder="Job Title " value="Job Title" onfocus="this.value = '';" onblur="checkjobtitle();slidercheck()" onkeypress="return AlphaOnly(event)">
			 <span id="jobtitleerror" style="color:#F00"> </span>
		   
		     <input type="text" class="text" placeholder="Job Type " id="jobType" value="Job Type" onfocus="this.value = '';" onblur="checkjobtype();slidercheck()" onKeyPress="return letternumber(event)">
			 <span id="jobtypeerror" style="color:#F00"> </span>
			 <input type="text" class="text" placeholder="Location " value="Location" onfocus="this.value = '';" id="locaTion" onblur="checkjoblocation();slidercheck()" onkeypress="return AlphaOnly(event)">
			 <span id="locationerror" style="color:#F00"> </span>
			 <label class="btn2 btn-2 btn2-1b">
			 <input type="submit" value="Find Jobs" id="submitbutton" disabled>
			 
			 </label>
		   
		   </div>
		 
		 
	
	  
	  
	  </div>
	  
	 </div>
	

    </div>
   
        <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
          <img src="images/banner_1.jpg" alt="">
        </div>
        <div class="item">
          <img src="images/banner2.jpg" alt="">
        </div>
        <div class="item">
          <img src="images/banner_1.jpg" alt="">
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

  
 


<div class="container">

	 <div class="single">  
      <div class="form-container">
        <h2>About Us</h2>
		  
		 <p> We are a specialist recruitment firm that is intensely passionate about delivering the right fit for every hire. R4S helps companies of all sizes hire the best talent, and offers jobseekers the best opportunities to get hired in the roles that suit their abilities, personality and ambition. Jobseekers get free access to temporary or permanent jobs and relevant opportunities. 
We specialize in the following sector:<br/>
Healthcare
</p>

		  
		</div>
	 </div>
</div>

<?php
include('footer.php');
?>