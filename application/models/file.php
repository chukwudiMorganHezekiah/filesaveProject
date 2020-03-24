

<?php


defined("BASEPATH") or exit("No access here");


class file extends CI_Model{
    public function __construct(){

        $this->load->database();
    }

    //select all user data

    public function selectAllUserData($value){
        return $this->db->select("*")->from("files")->where("user_id",$value)->order_by("id","DESC")->get()->result_array();
    }


    public function isFileNameUnique($name){

       return $this->db->select("*")->from("files")->where(["filename"=>$name,"user_id"=>$this->session->auth_user])->get()->result_array();

    }

    //inserting the file details

    public function insertFile($data){
       return $this->db->insert('files', $data);
    }
    

    //create or register new user

    public function insertUser($data){
        return $this->db->insert('users', $data);
     }

     //select user id 

     public function selectUser($data){
         return $this->db->select("id")->from("users")->where("email",$data)->get()->row_array();

     }

     //checking email uniqueness

     public function isEmailUnique($email){

        return $this->db->select("*")->from("users")->where("email",$email)->get()->result_array();
 
     }

     //is a file to be viewed a users 
     public function isFileAUsers($id){

        return $this->db->select("*")->from("files")->where(['user_id'=>$this->session->auth_user,"id"=>$id])->get()->result_array();
     }

     //deleting a single file and moving it to the cycle bin

     public function deleteFile($id){
        $filedata= $this->db->select("*")->from("files")->where(['user_id'=>$this->session->auth_user,"id"=>$id])->get()->result_array();
         $data=[];
        
         foreach($filedata as $file){
            $data['file_id']=$file['id'];
            $data['user_id']=$file['user_id'];
            $data['filename']=$file['filename'];
            $data['filefile']=$file['filefile'];
            $data['data_created']=$file['data_created'];

         }

         if($this->db->insert('recycles', $data)){
           return  $this->db->where('id', $id)->delete('files');
           
         }

     }

     //select all the files from the recyced files daatabse


     public function recycledfiles(){
        return $this->db->select("*")->from("recycles")->where(['user_id'=>$this->session->auth_user])->get()->result_array();
     }


     //view a recycled file

     public function viewrecycledfile($id){
      return $this->db->select("*")->from("recycles")->where(['user_id'=>$this->session->auth_user,"id"=>$id])->get()->result_array();
   }

   //retrieve a save file
   public function retrievefile($id){
      $filedata= $this->db->select("*")->from("recycles")->where(['user_id'=>$this->session->auth_user,"id"=>$id])->get()->result_array();
      foreach($filedata as $file){

         $data['user_id']=$file['user_id'];
         $data['filename']=$file['filename'];
         $data['filefile']=$file['filefile'];

      }

      

      
      if($this->db->insert('files', $data)){
         return  $this->db->where('id', $id)->delete('recycles');
         
       }
  
   }


   //deleting file permanently

   public function deleteFilePermanently($id){
      return  $this->db->where('id', $id)->delete('recycles');

   }

   //selecting user with the name

   public function selectUserName($email){
     
      return $this->db->select("password,id")->from("users")->where(['email'=>$email])->get()->result_array();
	}
	
	
	
	public function search_file($data){

		return $this->db->query("SELECT * FROM tbl_files WHERE MATCH(`filename`) AGAINST('.$data.')")->result_array();
	}

   
     
    
}
