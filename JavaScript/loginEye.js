 
 let eyeIcon =document.querySelector(".eye");
 let password =document.querySelector(".textbox1");

 eyeIcon.onclick =function(){
   if(password.type =="password"){
      password.type ="text";
      eyeIcon.src ="../images/openEye.png";
   }
   else{
      password.type="password";
      eyeIcon.src="../images/closeEye.png";
   }
 }