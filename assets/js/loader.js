var loader = document.getElementById("myLoader");
function showLoader() {
  // Get the modal

  $("#modal-container2").html(`
      <div id="loader-container" style="margin-top:80px;">
          <div id="loader-one" class="loaders"></div>
          <div id="loader-two" class="loaders"></div>
          <div id="loader-three" class="loaders"></div>
        </div>
    `);

  

  $("#myLoader").fadeIn();

}

function hideLoader() {
  loader.style.display = "none";
}

