const usersList = document.querySelector(".users-list");

const backAuditor = document.getElementById("backAuditor");

setInterval(() =>{
    
   
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "Php/users-list.php?auditorState="+auditorState, true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){

            let data = xhr.response;
            usersList.innerHTML = data;
            if(auditorState == 1) {
              backAuditor.innerHTML = '<a class="back-icon" onclick= "back_icon2()" ><i class="fas fa-arrow-left"></i></a>';
            }
            else {
              backAuditor.innerHTML = '';
            }
    
            
          }
      }
    }
    xhr.send();
  }, 500);