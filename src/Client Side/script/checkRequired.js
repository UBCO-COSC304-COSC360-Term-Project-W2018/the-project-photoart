window.onload = function(){
  var form = document.getElementById("mainForm");
  form.addEventListener("submit", checkInput);

  function checkInput(e){
    var req = document.getElementsByClassName("required");
    for(var i = 0; i < req.length; i++){
      if (req[i].classList.contains("markReq"))
        e.preventDefault();
      else{
        if (req[i].value.length <= 0){
          req[i].classList.toggle("markReq");
          e.preventDefault();
          req[i].addEventListener("change", update);
        }
      }
    }
  }

  function update(e){
    e.target.classList.toggle("mark");
  }
}
