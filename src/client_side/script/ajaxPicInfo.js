<script>
function addToCart(){
 // $.post('../../server_side/addToCart.php', {input : getContent});
}


// Listens to the event that is trigerred by the user selecting the image in the form, and calls the function with the option that the user selected.
$("#select").on('change', function(){
  var selected = $(this).children(":selected").val();
  //Calls the function and passes to it the selection as a parameter.
  loadContent(selected);
});


// A function that uses jQuery.post to transfer the selected option to the server side, and returns the data back from the server.
function loadContent(selected){
  var feedback = $('#feedback'),
  getContent = selected;
  //post
  $.post('php/input.php', {input : getContent} , function(data) {
    //Takes the data returned from the server and embeds in the HTML.
    feedback.html(data);
  });
}


//Calls to the function when the page loads.
$(window).on('load', loadContent('red'));
<script>
