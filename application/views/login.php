

<!--header -->

<?php  $this->load->view("header.php"); ?>

<!--navbar -->

<?php  $this->load->view("navbar.php"); ?>



<div class="col-lg-8 offset-lg-2" style="margin-top:30px;">

<form class="form-horizontal" action="loginUser" name="loginForm" method="POST" action="loginUser">

<div class="form-group">
<input type="text" name="email" placeholder="E-mail"  value="<?php echo set_value("email"); ?>"class="form-control" autofocus autocomplete="false">
<?php   echo form_error("email","<p class'error'>","</p>"); ?>

</div>

<div class="form-group" style="margin-top:20px;">
<input type="password" name="password" placeholder="password" class="form-control" >
<?php   echo form_error("password","<p class'error'>","</p>"); ?>
</div>

<div class="form-group">
<button class="btn btn-success pull-left">Login</button>
<a href="Register" style="float:right;font-size:17px;text-decoration:underline;">Register?</a>
</div>


</form>

</div>



<!--footer  -->


<?php  $this->load->view("footer.php"); ?>