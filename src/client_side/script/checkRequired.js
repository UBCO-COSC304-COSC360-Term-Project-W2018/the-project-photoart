document.addEventListener("click", checkTarget);

function checkTarget(e){
  var target = e.target;
  if (target.id == "submit")
    checkInput(e);
}

  function checkInput(e){
    //check if all required fields are filled
    var req = document.getElementsByClassName("required");
    for(var i = 0; i < req.length; i++){
      if (req[i].classList.contains("markReq"))
        if (req[i].value.length <= 0)
          e.preventDefault();
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
    if (e.target.value.length > 0 && e.target.classList.contains("markReq"))
      e.target.classList.toggle("markReq");
  }
