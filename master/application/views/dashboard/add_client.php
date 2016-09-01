<div class="row">
	<div class="col-xs-5" style="">
		<div style="margin-bottom: 30px ;">
			<h3 style="margin:0">Add New Client</h3>
		</div>
		
	</div>
	<div class="col-xs-7">
	    
	</div>

</div>


<div class="row">
<?php if(validation_errors()): ?>
     <ul class="alert alert-danger">
          <?php echo validation_errors('<li>','</li>'); ?>
     </ul>
<?php endif; ?>
     <?php echo form_open_multipart('main/register_client'); ?>
	<div class="col-xs-12" style="padding: 20px">
		<div class="col-md-6">

          	<div class="form-group">	
				<label for="">Company Name: *</label>
				<input type="text" name="company_name" class="form-control" required="1">
          	</div>

          	<div class="form-group ">	
				<label for="">Person in charge: *</label>
				<input type="text" name="company_pic" class="form-control" required="1">
          	</div>

          	<div class="form-group ">	
				<label for="">Phone number: *</label>
				<input type="text" name="company_phone" class="form-control" required="1">
          	</div>

          	<div class="form-group ">	
				<label for="">Company Admin: *</label>
				<input type="text" name="company_admin" class="form-control" required="1">
          	</div>

          	<div class="form-group ">	
				<label for="">Email: *</label>
				<input type="text" name="company_email" class="form-control" required="1">
          	</div>

          	<div class="form-group ">	
				<label for="">Password: *</label>
				<input type="password" name="company_password" class="form-control" required="1">
          	</div>

          	<div class="form-group ">	
				<label for="">Confirm Password: *</label>
				<input type="password" name="confirm_password" class="form-control" required="1">
          	</div>

               

          </div>

          <div class="col-md-6 ">

               <div class="form-group">
                    <label for="">URL : *</label>
                    <div class="input-group">
                         <input type="text" name="company_url" class="form-control" required="1">
                         <span class="input-group-addon">.gethassee.com</span>
                    </div>
               </div>

          	<div class="form-group ">
          		<label for="">Plan: *</label>
          		<select name="company_plan_id" class="form-control" required="1">
					<option value="">-- Select Plan --</option>
					<option value="1">Standard Plan</option>
				</select>
          	</div>

          	<div class="form-group ">
          		<label for="">Colour One (#000000): *</label>
          		<input type="text" name="company_color1" class="form-control" required="1">
          	</div>

          	<div class="form-group ">
          		<label for="">Colour Two (#000000): *</label>
          		<input type="text" name="company_color2" class="form-control" required="1">
          	</div>

			<div class="form-group ">
          		<label for="">Logo: *</label>
          		<input type="file" name="company_logo" class="form-control" required="1">
          	</div>

          	<div class="form-group ">
          		<label for="">Background: *</label>
          		<input type="file" name="company_background" class="form-control" required="1">
          	</div>

          	<div class="form-group ">
                    <label for="">Website: </label>
                    <input type="text" name="company_website" class="form-control" required="1">
               </div>

          	<div class="form-group ">
				<input type="submit" value="Submit" class="btn btn-primary" name="submit">
          		<input type="reset" value="Reset" class="btn btn-danger" name="reset">
                    <a href="<?php echo base_url('main/dashboard');?>" class="btn btn-warning pull-right">Cancel</a>
          	</div>

        </div>
    </div>
    <?php echo form_close() ?>
</div>

