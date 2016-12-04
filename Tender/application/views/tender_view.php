<?php include('a_header.php');?>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Category</th>
      <th>Details</th>
      <th>Start  <span><a href="<?php echo base_url('index.php/admin/a_s');?>">&uarr;</a></span>  <span><a href="<?php echo base_url('index.php/admin/d_s');?>">&darr;</a></span></th>
      <th>End  <span><a href="<?php echo base_url('index.php/admin/a_e');?>">&uarr;</a></span>  <span><a href="<?php echo base_url('index.php/admin/d_e');?>">&darr;</a></span></th>
      <th>Broucher</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php $count=0;?>
    <?php foreach ($all as $post)
    {
    	$post_id=$post['id'];
    	$post_a_id=$post['a_id'];
    	$post_name=$post['name'];
    	$post_cat=$post['cat'];
    	$post_d=$post['detail'];
    	$post_s=$post['st_time'];
    	$post_e=$post['end_time'];
    	$post_p=$post['pdf'];
    	
    ?>
    <?php $time_now=time(); if($post_e-$time_now>0)
    { $count++;
    ?>
	    <tr>
	      <td><?php echo $count;?></td>
	      <td><?php echo $post_name;?></td>
	      <td><?php echo $post_cat;?></td>
	      <td width="20%" height=""><?php echo $post_d;?></td>
	      <td><?php echo date('d/m/Y',$post_s);?></td>
	      <td><?php     
	      	if($post_e-$time_now<= 86400)
	      	{
	      		echo "<p class='text-danger'>";
            $post_e=$post_e+17640-1200-240;
	      		echo date('d/m/Y H:i',$post_e);
	      		echo "</p>";
	      	}
	      	else
	      	{
            $post_e=$post_e+17640-1200-240;
	      		echo date('d/m/Y H:i',$post_e);	
	      	}
	      ?></td>
	      <td><a href="<?php echo $post_p;?>">Download</a></td>
	      <td><a href="<?php echo base_url('index.php/admin/edit/'.$post_id);?>" class="btn btn-primary">Edit</a></td>
	    </tr>
    <?php
		}
    }
    ?>
  </tbody>
</table> 
<?php include('footer.php');?>