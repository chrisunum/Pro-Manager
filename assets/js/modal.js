var modal = document.getElementById("myModal2");
function showModal(html) {
  // Get the modal

  $("#modal-message").html(html);

  // Get the <span> element that closes the modal
  var span = document.getElementById("close2");

  // When the user clicks on the button, open the modal

  $("#myModal2").fadeIn();

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}

function hideModal() {
  modal.style.display = "none";
}

