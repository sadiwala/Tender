<?php include('a_header.php');?>
<div class="container">
	<div class="col-lg-4">
	</div>
	<div class="col-lg-8">
		<?php echo form_open_multipart('admin/sucesful');?>
		  <fieldset>
		    <legend>Upload the Tender</legend>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="name" id="inputEmail" placeholder="Tender Name" value="<?php echo set_value('name');?>">
		        <?php echo form_error("name","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Category</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="cat" id="inputEmail" placeholder="Tender Category" value="<?php echo set_value('cat');?>">
		        <?php echo form_error("cat","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Breif Detail</label>
		      <div class="col-lg-10">
		        <textarea name="detail" class="form-control" placeholder="Write Breif Detail About Your Tender Here" value="<?php echo set_value('detail');?>"></textarea>
		        <?php echo form_error("detail","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Last Date and Time</label>
		      <div class="col-lg-10">
		        <input type="datetime-local" class="form-control" name="date" placeholder="last date" value="<?php set_value('date');?>" />
		        <?php echo form_error("date","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Upload PDF</label>
		      <div class="col-lg-10">
		      	<?php echo form_upload(['name'=>'userfile']);?>
		        <?php if(isset($upload_error))
		        	  { echo "<p class='text-danger'>";echo $upload_error;echo "</p>";}?>
		      </div>
		    </div>
		    <div class="form-group">
	      		<div class="col-lg-10 col-lg-offset-2">
	      			<br />
	        		<button type="submit" class="btn btn-primary">Submit</button>
	        		<br />
	        		<br />
	      		</div>
	    	</div>
		  </fieldset>
		</form>
	</div>
</div>
<?php include('footer.php');?>