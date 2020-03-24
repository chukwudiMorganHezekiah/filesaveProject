<!--header -->

<?php  $this->load->view("header.php"); ?>

<!--navbar -->

<?php  $this->load->view("navbar.php"); ?>
    



<div class="" style="text-align:center;padding:20px;">

<?php foreach($files as $file) { ?>

<p>File name :<?php echo $file['filename']; ?>

<p>File :<?php echo $file['filefile']; ?>

<p>Created On :<?php echo $file['data_created']; ?>
<?php } ?>

<div class="">

<a href="retrievefile/<?php echo $file['id']; ?>"  class="btn btn-primary">Retrieve</a>
<a href="deleteFilePermanently/<?php echo $file['id'];   ?>" class="btn btn-danger ml-3">Delete Permanently</a>

</div>

</div>




    <!--footer -->

<?php  $this->load->view("footer.php"); ?>