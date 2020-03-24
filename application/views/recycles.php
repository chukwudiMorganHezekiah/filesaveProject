

<!--header -->

<?php  $this->load->view("header.php"); ?>

<!--navbar -->

<?php  $this->load->view("navbar.php"); ?>
    

<!--modal for the add file -->
<?php if($this->session->flashdata("success")){

    ?>

<div class="alert alert-success alert-dismissible">
<div class="alert-heading"><?php echo $this->session->flashdata("success"); ?></div>


<div class="close" style="color:red;">+</div>

</div>




<?php }  ?>

<div class="row">

<?php  if(count($files) > 0){ ?>

<?php foreach($files as $file) {?>

<!--page contente -->

<div class="col-lg-4 card-header">

<div class="card bg-white" style="margin-top:10px;">
<div class="card-header ">File Detail</div>

<div class="card-body bg-white" >

<p><span style="font-size:16px;font-weight:bold">File Name</span>: <span class="text-muted"><?php echo $file['filename']; ?></span></p>

<p><span style="font-size:16px;font-weight:bold">File</span>: <span class="text-muted"><?php echo $file['filefile']; ?></span></p>
</div>

<a href="viewrecycledfile/<?php echo $file['id'];  ?>" style="border-radius:0px" class="btn btn-success"> View </a>


</div>

</div>

 <?php 


} 
?>


<?php } else { ?>

<div style="text-align:center;margin-left:35%"><p class="text-muted" >You has no files recycled yet.. </p> </div>
<?php
} ?>



</div>



<!--footer  -->


<?php  $this->load->view("footer.php"); ?>