document.addEventListener("click", checkTarget);

function checkTarget(e){
  var target = e.target;
  if (target.id == "submit")
    checkInput(e);
}

  function checkInput(e){
    //check if passwords match
    var pwd1 = document.getElementById("pwd1");
    var pwd2 = document.getElementById("pwd2");
    if (pwd1.value.length > 0){
    if (pwd1.value !== pwd2.value){
      alert("Passwords don't match");
      e.preventDefault();
      pw2.classList.toggle("markReq");
      pw2.addEventListener("change", update);
      pw1.classList.toggle("markReq");
      pw1.addEventListener("change", update);
    }
    else if (pwd1.value.length < 8){
      alert("Password must be at least 8 characters long");
      e.preventDefault();
      pw1.classList.toggle("markReq");
      pw1.addEventListener("change", update);
      pw2.classList.toggle("markReq");
      pw2.addEventListener("change", update);
    }
    }

    //check if email is valid
    var email = document.getElementById("email");
    if (email.value.length > 0)
    if (email.value.indexOf("@") == -1){
      alert("Please enter a valid email");
      e.preventDefault();
      email.classList.toggle("markReq");
      email.addEventListener("change", update);
    }

    //check if all required fields are filled
    var req = document.getElementsByClassName("required");
    for(var i = 0; i < req.length; i++){
      if (req[i].classList.contains("markReq"))
        if (req[i].value.length <= 0){
          e.preventDefault();
        }
        else {
          e.target.classList.toggle("markReq");
        }
      else{
        if (req[i].value.length <= 0){
          req[i].classList.toggle("markReq");
          e.preventDefault();
          req[i].addEventListener("change", update);
        }
      }
    }
  }

//If user inputs text, remove red warning
  function update(e){
    e.target.classList.toggle("markReq");
  }
