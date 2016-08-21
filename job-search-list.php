<?php 
include('header.php');
?>
<div class="banner_1">
	<div class="container">
		<div id="search_wrapper">
		 <div id="search_form" class="clearfix">
		 <h1>Start your job search</h1>
		    <p>
			 <input type="text" class="text" placeholder="Job Type" value="Job Title" onfocus="this.value = '';" >
			 <input type="text" class="text" placeholder=" " value="Job Type" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Title(s)';}">
			 <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
			</p>
           
         </div>
		
       </div>
   </div> 
</div>	
<div class="container">
    <div class="single">  

	 <div class="col-md-12 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"> Jobs Locations</a></li>

			</ul>
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
		    <div class="tab_grid">
			  
			    <div class="col-sm-9">
			       <div class="location_box1">
				   
			    	 <h6><a href="location_single.html"> Java developer  </a></h6>
				
					 <ul class="links_bottom">
		  		    	<li><span class="icon_text">Job Type : Testing</span></li>
		  		    	<li><span class="icon_text"><span class="m_2">Location :</span>Chennai</span></li>
			  			<li class="last"><span class="icon_text">Salary :30000</span></li>			  			
					 </ul>

			    	  <p><span class="m_2">Company Name : </span> CSS CROP CHENNAI.<br/>
					 <span class="m_2">Job Description : </span>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure</p>
			    	 
					 <ul class="links_bottom">
		  		    	<li class="pull-right"><a href="location_single.html"><span class="icon_text">Apply for this Jobs</span></a></li>
			  			<li class="pull-right"><a href="location_single.html"><span class="icon_text">View Details</span></a></li>
			  			
					 </ul>
				   </div>
			    </div>
			    <div class="clearfix"> </div>
			 </div>
		  </div>
		  
		  
		  
		  
		  

	  </div>
     </div>
    </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>
<?php
include('footer.php');
?>