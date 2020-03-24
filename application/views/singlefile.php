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

<a href="<?php echo base_url()  ?>uploads/<?php echo $file['filefile']; ?>" download="SaveTo.net_<?php echo $file['filefile'];  ?>" class="btn btn-primary">Download</a>
<a href="deleteFile/<?php echo $file['id'];   ?>" class="btn btn-danger ml-3">Delete</a>

</div>

</div>




    <!--footer -->

<?php  $this->load->view("footer.php"); ?>