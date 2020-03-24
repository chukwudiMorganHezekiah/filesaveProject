

<!--header -->

<?php  $this->load->view("header.php"); ?>

<!--navbar -->

<?php  $this->load->view("navbar.php"); ?>

<?php 

foreach($search_results as $result){
	$count=0;
	
	if($result['user_id'] == $this->session->auth_user){
		


$count+=1;

	}
	

}
if($count == 0){
	echo "<p style='text-align:center;color:indigo'>No result for Your search</p>";

}else{
	foreach($search_results as $result){
		if($result['user_id'] == $this->session->auth_user){ ?>

<div class="col-lg-6 offset-lg-3 card-header">



		<div class="card bg-white" style="margin-top:10px;">
		<div class="card-header ">File Detail</div>

				<div class="card-body bg-white" >

				<p><span style="font-size:16px;font-weight:bold">File Name</span>: <span class="text-muted"><?php echo $result['filename']; ?></span></p>

				<p><span style="font-size:16px;font-weight:bold">File</span>: <span class="text-muted"><?php echo $result['filefile']; ?></span></p>
				</div>

				<a href="viewfile/<?php echo $result['id'];  ?>" style="border-radius:0px" class="btn btn-success"> View </a>


				</div>

</div>





		</div>
</div>

		<?php }
	}
 }
?>





<!--footer  -->


<?php  $this->load->view("footer.php"); ?>
