
<?php  $this->load->view("header.php"); ?>

<!--navbar -->

<?php  $this->load->view("navbar.php"); ?>
    

<!--modal for the add file -->

<div class="addfile" >

<form action="addnewfile" method="post" class="form-horizontal"enctype="multipart/form-data">


<div class="form-group">

<input type="text" name="filename" placeholder="File Name" class="form-control" value="<?php  echo set_value("filename");  ?>">


<?php  echo form_error("filename","<div class='error'>","</div");  ?>
</div>


<div class="form-group">

<input type="file" name="filefile" class='form-control'>

<?php  echo form_error("filefile","<div class='error'>","</div");  ?>

</div>

<div class="form-group">

<input type="submit"  class='form-control btn btn-success' value="Add File">

</div>



</form>


</div>


<!--footer  -->


<?php  $this->load->view("footer.php"); ?>