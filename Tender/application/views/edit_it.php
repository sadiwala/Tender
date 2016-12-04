<?php include('a_header.php');?>
	<div class="container">
	<div class="col-lg-4">
	</div>
	<div class="col-lg-8">
		<?php echo form_open('admin/edit_suc/'.$p['id']);?>
		  <fieldset>
		    <legend>Edit the Tender</legend>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="name" id="inputEmail" placeholder="Tender Name" value="<?php echo $p['name'];?>">
		        <?php echo form_error("name","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Category</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="cat" id="inputEmail" placeholder="Tender Category" value="<?php echo $p['cat'];?>">
		        <?php echo form_error("cat","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Breif Detail</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="detail" id="inputEmail" placeholder="Tender Detail" value="<?php echo $p['detail'];?>">
		        <?php echo form_error("detail","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    
		    <div class="form-group">
	      		<div class="col-lg-10 col-lg-offset-2">
	      			<br />
	        		<button type="submit" class="btn btn-primary">EDIT</button>
	        		<a href="<?php echo base_url('index.php/admin/t_view');?>" class="btn btn-danger">Cancel</a>
	        		<br />
	        		<br />
	      		</div>
	    	</div>
		  </fieldset>
		</form>
	</div>
</div>
<?php include('footer.php');?>