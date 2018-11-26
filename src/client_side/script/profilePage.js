document.addEventListener("click", checkTarget);

function checkTarget(e){
  var target = e.target;
  if (target.id == "submit")
    checkInput2(e);
}

  function checkInput2(e){
    //check if email is valid
    var email = document.getElementsByName("email")[0];
    if (email.value.indexOf("@")== -1 && email.value.length > 0){
      alert("Please enter a valid email");
      e.preventDefault();
      email.classList.toggle("markReq");
      email.addEventListener("change", update);
    }

    //check for valid password
    var oldPass = document.getElementsByName("oldPass")[0];
    var newPass = document.getElementsByName("newPass")[0];
    if (oldPass.value.length > 0 || newPass.value.length > 0){
      if (oldPass.value.length <= 0){
        alert("Please enter your old password");
        oldPass.classList.toggle("markReq");
        oldPass.addEventListener("change", update);
        e.preventDefault();
      }
      else if (newPass.value.length < 8){
        alert("New password must be at least 8 characters long");
        newPass.classList.toggle("markReq");
        newPass.addEventListener("change", update);
        e.preventDefault();
      }
    }
  }
