function Regvalidate(){
     const a= document.getElementById("fullename");
     const b= document.getElementById("email");
     const c= document.getElementById("phoneno");
     const d= document.getElementById("password");
     const e=document.getElementById("confirmpassword");
     const f=document.getElementById("gender");

     if(a.value ==="" || b.value === "" || c.value=== "" || d.value === "" || e.value === "" || f.value ===""){
        
        window.alert("please fill up the form properly!");
        return false;
        
        
     }
     
        return true;
     
    }
   

     
