


$(document).ready(function(){
    $("#first form").submit(function(e){
        e.preventDefault();
        var filename=$("#filename").val();
     


        //ajax call

        $.ajax({
            url:"addfile",
            method:"POST",
            data:{filename:filename},
            success:function(Response){
                
               console.log(Response);
              console.log(typeof(Response));
             
                
                if(Response == "go front dear"){
                  
                    alert("gugu")
                    $("#first").removeClass("active").fadeOut("slow");
                    $("#second").addClass("active").fadeIn("slow");

                }
                if(Response === "Please enter a file name"){
                    $("#filenameerror").text(Response);
                    

                }

            },
            error:function(error){
                console.log(error)
            }


        })

    })
})