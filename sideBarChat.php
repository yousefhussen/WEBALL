<?php 
  include_once "php/DBConnection.php";
  if($_SESSION['Type'] == "Auditor") {
    $_SESSION['unique_id'] = 1;
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/styleUsers.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></head>


</head>
<body>
<div id="errorMsg"></div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div >
    
  <div class="wrapper" id="UL">
      <div id ="backAuditor"></div>
    <section class="users">
      <header>
        <div class="content">
          <?php 
            include_once "php/DBConnection.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE `userid` =" . $_SESSION['userid']);
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
           
          ?>
          

          <img src="<?php echo $row['image']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['username'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        
      </header>
      <div id="users-list" class="users-list">
         
      </div>
     
    </section>

    
  </div>
  </div>

   <div  id ="chatting" class="showing">
    <section class=" chat-area " id ="chatting2">
     
    </section>
  </div>

</div>


<script>


chatIcon.onclick = (e)=>{
        e.preventDefault();
}

function openNav() {
  document.getElementById("mySidenav").style.width = "700px";
  
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

var auditorState = 0;
var incoming_id;
function msgChat(incomingid) {
  
    if(<?php echo "'".$_SESSION['Type']."'"; ?> == "Auditor" && auditorState == 0) {
      let xhr2 = new XMLHttpRequest();
      xhr2.open("GET", "Php/changeAuditorUniqueId.php?userid="+incomingid, true);
      xhr2.onload = ()=>{
        if(xhr2.readyState === XMLHttpRequest.DONE){
            if(xhr2.status === 200){
               console.log("Et8yyrrr");
               let data2 = xhr2.response;
               auditorState = data2;
            }
        }
      }
    
    xhr2.send();
    }

    
    else  {

   
    
 // console.log("out");
    document.getElementById("UL").style.width = "0";
    document.getElementById("UL").style.visibility = "hidden";
    document.getElementById("chatting").style.width = "700px";
    document.getElementById("chatting").style.visibility = "visible";
    document.getElementById("chatting2").style.visibility = "visible";
    document.getElementById("chatting2").style.width = "auto";

     let xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "php/data2.php?userid="+incomingid, true);
    xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){

            let data = xhr2.response;
             
             document.getElementById("chatting2").innerHTML = data;
             if(auditorState == 0) {
                form = document.querySelector(".typing-area"),
                incoming_id = form.querySelector(".incoming_id").value,
                inputField = form.querySelector(".input-field"),
                sendBtn = form.querySelector("button");
              }
              else {
                incoming_id = incomingid;
              }
           
              chatBox = document.querySelector(".chat-box");
              const chatIcon = document.getElementById("chatIcon");



   
//console.log("outtttttttttttttttttttttttttttt");
if(auditorState == 0) {
  form.onsubmit = (e)=>{
    e.preventDefault();

}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    // console.log("out2");
    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "php/insert-chat.php", true);
    xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
            let data = xhr2.response;
              console.log(data);
              inputField.value = "";
              document.getElementById("uploadFile").value = "";
              document.getElementById("errorMsg").innerHTML = data;
              var myTimeout = setTimeout(timeout, 5000);
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    
    xhr2.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


    setInterval(() =>{
        let xhr2 = new XMLHttpRequest();
        xhr2.open("POST", "php/get-chat.php", true);
        xhr2.onload = ()=>{
          if(xhr2.readyState === XMLHttpRequest.DONE){
              if(xhr2.status === 200){
                let data = xhr2.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                  }
              }
          }
        }
        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.send("incoming_id="+incoming_id);
    }, 500);
}

setInterval(() =>{
        let xhr2 = new XMLHttpRequest();
        xhr2.open("POST", "php/get-chat.php", true);
        xhr2.onload = ()=>{
          if(xhr2.readyState === XMLHttpRequest.DONE){
              if(xhr2.status === 200){
                let data = xhr2.response;
               
                chatBox.innerHTML = data;
              }
          }
        }
        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.send("incoming_id="+incoming_id);
    }, 500);


 
function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }

//console.log(incoming_id);
    
            
          }
      }
    }
    xhr2.send();



  }
  
}

function back_icon(incomingid) {
 // console.log("out");
 if(<?php echo "'".$_SESSION['Type']."'"; ?> == "Auditor") {
   auditorState = 1;
 }
    let xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "Php/SeenInside.php?userid="+incomingid, true);
    xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
            console.log(incomingid);
            
            
          }
      }
    }
   
    xhr2.send();

    document.getElementById("UL").style.width = "450px";
    document.getElementById("UL").style.visibility = "visible";
    document.getElementById("chatting").style.width = "0px";
    document.getElementById("chatting").style.visibility = "hidden";
    document.getElementById("chatting2").style.visibility = "hidden";
    document.getElementById("chatting2").style.width = "0px";



  
}

function back_icon2() {
 console.log("edaas 3laaaaaak");
    
    let xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "Php/changeAuditorBack.php", true);
    xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
            let data = xhr2.response;
             console.log(data);
            auditorState = data;
            
          }
      }
    }
   
    xhr2.send();

    
  
}

//const typingArea = document.querySelector(".typing-area");
function commented(msg_id) {
  
  
           
  console.log(msg_id);
  document.querySelector(".typing-area").style.visibility = "visible";
  document.querySelector(".msg_id").value = msg_id;
  form = document.querySelector(".typing-area"),
  inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button");
  

  form.onsubmit = (e)=>{
    e.preventDefault();

}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    // console.log("out2");
    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "php/insert-chat.php", true);
    xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
              inputField.value = "";
              let data = xhr2.response;
              document.querySelector(".typing-area").style.visibility = "hidden";
          }
      }
    }
    let formData = new FormData(form);
    xhr2.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

}

function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("uploadFile");
    var inputField = document.getElementById("input-field");
    inputField.value = preview.value;
    sendBtn.classList.add("active");
   
    $('#uploadImage').ajaxSubmit({
         
     });
    
    //preview.src = src;
    // preview.style.display = "block";
    console.log("ah");
  }
}




  function timeout(){ 
    document.getElementById("errorMsg").innerHTML = "";
  }
  


</script>

<script src = "JS/users-list.js"></script>
<!-- <script src = "chat.js"></script>
 -->

   
</body>
</html> 
