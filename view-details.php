<?php 
include('header.php');
?>
<div class="container">
    <div class="single"> 
	<div class="col-md-6">
	<div>
	<h3>Job Details</h3>
    <form class="form-horizontal">
        <fieldset>
		
            <div class="form-group">
                <label class="control-label col-xs-3">Company Name</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputCampanyname" placeholder="">Gaddiel Technologies Pvt.Ltd.</label>
                </div>
            </div>
			
			
            <div class="form-group">
                <label class="control-label col-xs-3">Job Title</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputJob_title" placeholder="">Testing</label>
                </div>
            </div>
			
			
			 <div class="form-group">
                <label class="control-label col-xs-3">Job Type</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputJob_type" placeholder="">Developing</label>
                </div>
            </div>
			
			
            <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-3">Location</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputLocation" placeholder="">Bangalore</label>
                </div>
            </div>
			
			
			 <div class="form-group">
                <label class="control-label col-xs-3">Salary</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputSalary" placeholder="">Rs.10,000/-</label>
                </div>
            </div>
			
			
            <div class="form-group">
                <label class="control-label col-xs-3">Qualification</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputQualification" placeholder="">B.Tech</label>
                </div>
            </div>
			
			
			 <div class="form-group">
                <label class="control-label col-xs-3">Experience</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputExperience" placeholder="">2 Years</label>
                </div>
            </div>
			
			
            <div class="form-group">
                <label class="control-label col-xs-3">Languages</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputLanguages" placeholder="">English,Hindi</label>
                </div>
            </div>
			
			
			 <div class="form-group">
                <label class="control-label col-xs-3">Licenses</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputLicenses" placeholder="">Insurance L234</label>
                </div>
            </div>
			
			
            <div class="form-group">
                <label class="control-label col-xs-3">Apply Before</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputApply_before" placeholder="">19-07-2015</label>
                </div>
            </div>
			
			
			<div class="form-group">
                <label  class="control-label col-xs-3">Expected Join Date</label>
                <div class="col-xs-7">
                    <label class="form-control" id="inputExpected_join_date" placeholder="">19-09-2015</label>
                </div>
            </div>
			
			
			<div class="form-group">
			<div class="row col-xs-12">
                <label for="inputPassword" class="col-xs-6 control-label">Are you living Close to location of job</label>&nbsp;&nbsp;&nbsp;
					<label>
					<input type="checkbox" >
					</label>
					</div>
					</div>
					
					
			<div class="form-group">
			<div class="row col-xs-12">
                <label for="inputPassword" class="col-xs-6 control-label">Resume Required</label>&nbsp;&nbsp;&nbsp;
					<label>
					<input type="checkbox"> 
					</label>
					</div>
					</div>
        </fieldset>
    </form>
</div>
	</div>
	<div class="col-md-4">
			<h3>Job Description</h3>
			<textarea class="form-control" rows="6" id="comment"></textarea>
	</div>
	
	<div class="col-md-2">
			<a href="apply-for-job.php"><button type="submit" class="btn btn-default">Apply for this job</button></a>
	</div>
	</div>
	
	<div class="single">
	<div class="bottom-align-text col-sm-12">
	<div class="pull-right" style="padding-bottom:20px;">
	<a href="apply-for-job.php"><button type="submit" class="btn btn-default">Apply for this job</button></a></div>
	</div>
	</div>	
	</div>
	
<?php
include('footer.php');
?>