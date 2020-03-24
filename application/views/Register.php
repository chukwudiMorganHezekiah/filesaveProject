



<!--header -->

<?php  $this->load->view("header.php"); ?>

<!--navbar -->

<?php  $this->load->view("navbar.php"); ?>



<div class="col-lg-8 offset-lg-2" style="margin-top:30px;">

<form class="form-horizontal" name="loginForm" method="POST" action="RegisterUser">

<div class="form-group">
<input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo set_value("name"); ?>" autofocus autocomplete="false">
<?php echo form_error("name","<div class='error'>","</div>") ?>
</div>

<div class="form-group" style="margin-top:20px;">
<input type="number" name="Phone" placeholder="Phone.no" class="form-control" value="<?php echo set_value("Phone"); ?>">
<?php echo form_error("Phone","<div class='error'>","</div>") ?>
</div>

<div class="form-group" style="margin-top:20px;">
<input type="text" name="Email" placeholder="Email" class="form-control" value="<?php echo set_value("Email"); ?>">
<?php echo form_error("Email","<div class='error'>","</div>") ?>
</div>



<div class="form-group" style="margin-top:20px;">
<input type="password" name="password" placeholder="password" class="form-control" value="<?php echo set_value("password"); ?>">
<?php echo form_error("password","<div class='error'>","</div>") ?>
</div>

<div class="form-group">
<button class="btn btn-success pull-left">Register</button>
</div>



</form>

</div>



<!--footer  -->


<?php  $this->load->view("footer.php"); ?>