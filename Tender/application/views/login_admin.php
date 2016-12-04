<?php include('header.php');?>
<div class="container">
	<div class="col-lg-4">
	</div>
	<div class="col-lg-8">
		<?php echo form_open('login_a/sucesful');?>
		  <fieldset>
		    <legend>Login As Admin</legend>
		    <?php if($err=$this->session->flashdata('login_failed_a'))
	    			{echo "<p class='text-danger'>$err</p>";}?>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">User</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="u_name" id="inputEmail" placeholder="User Name" value="<?php echo set_value('u_name');?>">
		        <?php echo form_error("u_name","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <br />
		    <br />
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Password</label>
		      <div class="col-lg-10">
		        <input type="password" class="form-control" name="pass" id="inputEmail" placeholder="Password">
		        <?php echo form_error("pass","<p class='text-danger'>","</p>");?>
		      </div>
		    </div>
		    <div class="form-group">
	      		<div class="col-lg-10 col-lg-offset-2">
	      			<br />
	        		<button type="submit" class="btn btn-primary">Login</button>
	        		<br />
	        		<br />
	      		</div>
	    	</div>
		  </fieldset>
		</form>
	</div>
</div>
<?php include('footer.php');?>