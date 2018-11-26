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
      email.toggle("markReq");
    }

    //Check for valid credit card number and csv
    var cardNum = document.getElementsByName("CardNumber")[0];
    var csv = document.getElementsByName("CardCSV")[0];
    if ((cardNum.value.length < 16 || isNaN(cardNum.value)) && cardNum.value.length > 0){
      alert("Please enter a valid card number");
      e.preventDefault();
      cardNum.classList.toggle("markReq");
      cardNum.addEventListener("change", update);
    }
    else if ((csv.value.length < 3 || isNaN(csv.value)) && csv.value.length > 0){
      alert("Please enter a valid CSV");
      e.preventDefault();
      csv.classList.toggle("markReq");
      csv.addEventListener("change", update);
    }
  }
