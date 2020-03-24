

<nav class="navbar navbar-expand navbar-light bg-white " >

<div class="container">


  <!--toggle button -->

  <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">

                <span class="navbar-toggler-icon"></span>
</button>

<a href="" class="navbar-brand " style="color:black;font-size:30px;font-weight:20px;">SaveTo.net</a>
<div class="collapse navbar-collapse" id="menu">



<ul class="nav navbar-nav ml-auto" >

<?php if($this->session->has_userdata("auth_user")){ ?>


  <li style="color:black" class="mr-2 "><a href="<?php echo base_url()  ?>">Home</a></li>

<li style="color:black" class="mr-2"><a href="recycledfiles">Recycle Bin</a></li>

<li style="color:black" class="mr-2" ><a href="addfile" >Add File</a></li>

<li style="color:black" class="mr-2"><a href="">Contact Us</a></li>


<li style="color:black" class="mr-2 dropdown"><a href="" clas="dropdown-toggle" data-toggle="dropdown" ><?php $user=$this->db->select("name")->from("users")->where("id",$this->session->auth_user)->get()->result_array();  
 
foreach($user as $users){
  echo ($users['name']);

};?><span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="logout" class="">Logout</a></li>
</ul>
</li>

<?php } else{ ?>

  <li style="color:black" class="mr-2" ><a  href="login" class="btn btn-default" >Login</a></li>

<li style="color:black" class="mr-2"><a  href="Register" class="btn bnt-default">Register</a></li>



 <?php }?>

</ul>
</div>

</div>


</nav>


<!--this is not included in the navbar -->

<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2 bg-white">
