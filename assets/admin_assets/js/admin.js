
//Ajax Begin
function ajaxConnection(url) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	alert(this.responseText);
        return this.responseText;
        //location.reload();
      }else{
      	return "error";
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  
}

//Ajax End


// Banner Begin
var currentBanner = 1;
function addBannerImage(){
	showModal(`
	<form method="post" name="bannerForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	  Select image to upload:
	  <input type="file" name="image" id="ImageToUpload" accept="image/jpeg">
	  <p id="msg" style="color:red;"></p>
	  <input type="submit" class="admin-button-medium" value="Upload Image" name="submit">
	</form>
	`);
}

function validateForm() {
  var x = document.forms["bannerForm"]["ImageToUpload"].value;
  if (x == "") {
    document.getElementById("msg").innerHTML = "JPG image not uploaded";
    return false;
  }
}

function showBannerImage(x, root){
	document.getElementById("banner-image").src="../../images/banners/"+x+".jpg";
	document.getElementsByClassName("banner-selector")[currentBanner-1].classList.remove("banner-selector-active");
	currentBanner = x;
}

for(let i=0; i<document.getElementsByClassName("banner-selector").length; i++){

	document.getElementsByClassName("banner-selector")[i].addEventListener("click", function(){
		
	document.getElementsByClassName("banner-selector")[i].classList.add("banner-selector-active");
	});
}

function changeBannerImage(){
	showModal(`
	<form method="post" name="bannerForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	  Select image to upload:
	  <input type="file" name="image" id="ImageToUpload" accept="image/jpeg">
	  <input name="hidden" id="hidden" value="`+currentBanner+`" style="display:none;">
	  <p id="msg" style="color:red;"></p>
	  <input type="submit" class="admin-button-medium" value="Upload Image" name="submit">
	</form>
	`);
}

function deleteBannerImage(root) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
        if(this.responseText.includes("****")){
        	showModal("<p style='color:green;'>Banner successfully deleted</p>");
        	location.reload();
        }else{
        	showModal("<p style='color:red;'>Error occured, try later</p>");
        }
        //location.reload();
      }
    };
    xmlhttp.open("GET", root+"ajax/banners.php?q=" + currentBanner, true);
    xmlhttp.send();
  
}



//Banner End

//upload items begin


var deleted = [];

var inputImage = [];

function uploadPhoto() {
	if(inputImage.length < 5){
		var html = `
  <canvas
      id="testCanvas"
      width="400px"
      height="400px"
      style="border: 1px solid black;"
      >Your browser does not support canvas.</canvas
    >
    

    <input type="file" id="fileInput" onchange="handleFileSelect()" accept=".png, .jpg, .jpeg" />
    <input
      type="button"
      onclick="cropper.startCropping()"
      value="Start cropping"
      id="cropping"
    />
    <input
      type="button"
      onclick="getCroppedImage()"
      value="Crop"
      id="crop"
    />

    <input
      type="button"
      onclick="saveImage()"
      value="Save"
      id="save"
    />

  `;

  showModal(html);
}else{
	showModal("<center><a style='color:red; text-align:center;'>photo upload limit reached</a></center>")
}
}
  


function handleFileSelect() {
  cropper.start(document.getElementById("testCanvas"), 1);
  // this function will be called when the file input below is changed
  var file = document.getElementById("fileInput").files[0]; // get a reference to the selected file
  console.log(file);

  var reader = new FileReader(); // create a file reader
  // set an onload function to show the image in cropper once it has been loaded
  reader.onload = function(event) {
    var data = event.target.result; // the "data url" of the image
    cropper.showImage(data); // hand this to cropper, it will be displayed
  };

  reader.readAsDataURL(file); // this loads the file as a data url calling the function above once done
  if (file.type.includes("jpeg") || file.type.includes("png")) {
    $("#fileInput").css("display", "none");
    $("#cropping").css("display", "block");
    $("#cropping").click(function() {
      $("#cropping").css("display", "none");
      $("#crop").css("display", "block");
    });
  } else {
    showModal("file must be a JPEG file or a PNG file");
  }
}

function getCroppedImage() {
  cropper.getCroppedImageSrc();
  $("#crop").css("display", "none");
  $("#save").css("display", "block");
}

function saveImage() {
	var image = document.getElementById("testCanvas").toDataURL();
	inputImage.push(image);


	renderImage();
  	hideModal();
 }


function deletePhoto(x){

	inputImage.splice(x,1);
	renderImage();
		
}

function makeProfile(x){
	var temp = inputImage[0];
	inputImage[0] = inputImage[x];
	inputImage[x] = temp;
	renderImage();
}

function renderImage(){
	var displayImageCombined = "";

	for(var i=0; i<inputImage.length; i++){
		var url = inputImage[i].includes("http")? inputImage[i]+"?q="+Date.now() : inputImage[i];
		if(i==0){
			displayImageCombined += `
			<div class="col-xs-6 col-sm-4 col-md-3" id="photo${i}" style="margin-top:10px; margin-bottom:10px;">
				<div style="border:1px solid #cfcfcf;">
					<img src="${url}" width="100%" id="photo2${i}"/>
					<p class="admin-button-medium" onclick="deletePhoto(${i})" style="background:red; display:inline-block; cursor:pointer; padding:1px 0px;font-size:12px; width:47%;text-align:center;margin-right:1.5%;margin-left:1.5%;">Delete</p>
		        	
		        </div>
	        </div>
		`;
		}else{
			displayImageCombined += `
			<div class="col-xs-6 col-sm-4 col-md-3" id="photo${i}" style="margin-top:10px; margin-bottom:10px;">
				<div style="border:1px solid #cfcfcf;">
					<img src="${url}" width="100%" id="photo2${i}"/>
					<p class="admin-button-medium" onclick="deletePhoto(${i})" style="background:red; display:inline-block; cursor:pointer; padding:1px 0px;font-size:12px; width:47%;text-align:center;margin-right:1.5%;margin-left:1.5%;">Delete</p>
		        	<p class="admin-button-medium" onclick="makeProfile(${i})" style="background:blue; display:inline-block; cursor:pointer; padding:1px 0px;font-size:12px; width:47%;text-align:center;">Profile</p>
		        </div>
	        </div>
		`;
		}
		
	}
	$("#images").html(displayImageCombined);




	var inputImageCombined = "";
	for(var i=0; i<inputImage.length; i++){
		inputImageCombined += `
			<input type="text" id="image${i}" placeholder="Image" name="image${i}" value="${inputImage[i]}" /><br>
		`;
	}

	$("#imageData").html(inputImageCombined);

	if(document.getElementById("images").innerHTML.trim() == ""){
		document.getElementById("images").innerHTML= `<div class="col-xs-6 col-sm-4 col-md-3" >
                <img src="../../admin_assets/img/demoUpload.jpg" width="100%" id="photo"/>
            </div>
            `;
	}
}
function dataURLtoFile(dataurl, filename) {
  var arr = dataurl.split(","),
    mime = arr[0].match(/:(.*?);/)[1],
    bstr = atob(arr[1]),
    n = bstr.length,
    u8arr = new Uint8Array(n);
  while (n--) {
    u8arr[n] = bstr.charCodeAt(n);
  }
  return new File([u8arr], filename, { type: mime });
}



function checkCategories(){
	var category = document.getElementById("category").value;
	var category2 = document.getElementById("category2").value;
	var cat = document.getElementById("cat").value;
	var cat2 = document.getElementById("cat2").value;

	if(category == "other"){
		document.getElementById("cat").classList.add("hidden");
		document.getElementById("cat2").classList.remove("hidden");
	}else if(category=="select"){

	}else{
		fetchSubcategories(document.getElementById("category").value);
	}
}

function checkSubcategories(){
	var category = document.getElementById("subcategory").value;
	var category2 = document.getElementById("subcategory2").value;
	var cat = document.getElementById("subcat").value;
	var cat2 = document.getElementById("subcat2").value;

	if(category == "other"){
		document.getElementById("subcat").classList.add("hidden");
		document.getElementById("subcat2").classList.remove("hidden");
	}
}

function checkBrand(){
	var brand = document.getElementById("brand").value;
	var brand2 = document.getElementById("brand2").value;
	var bra = document.getElementById("bra").value;
	var bra2 = document.getElementById("bra2").value;

	if(brand == "other"){
		document.getElementById("bra").classList.add("hidden");
		document.getElementById("bra2").classList.remove("hidden");
	}
}

function validateItemForm(){

	var item = document.getElementById("item").value.trim();
	var category = document.getElementById("category").value == "other"? document.getElementById("category2").value.trim() : document.getElementById("category").value;
	var subcategory = document.getElementById("subcategory").value == "other"? document.getElementById("subcategory2").value.trim() : document.getElementById("subcategory").value;
	var brand = document.getElementById("brand").value == "other"? document.getElementById("brand2").value.trim() : document.getElementById("brand").value;
	var details = $("#summernote").summernote("code");
	var quantity = document.getElementById("quantity").value.trim();
	var price = document.getElementById("price").value.trim();
	var status = document.getElementById("status").value;
	var seo = document.getElementById("seo").value.trim();

	if(item==""){
		showModal("<center><a style='color:red'>Enter item's name</a></center>");
		return false;
	}else if(item.includes("/")){
		showModal("<center><a style='color:red'>Item name can not include /</a></center>");
		return false;
	}else if(category=="select"|| category==""){
		showModal("<center><a style='color:red'>Pick a category</a></center>");
		return false;
	}else if(subcategory=="select"|| subcategory==""){
		showModal("<center><a style='color:red'>Pick a sub-category</a></center>");
		return false;
	}else if(brand=="select"|| brand==""){
		showModal("<center><a style='color:red'>Pick a brand</a></center>");
		return false;
	}else if (details.trim() == "" || details.trim() == "<p><br></p>") {
	    showModal("<center><a style='color:red'>Enter item's details</a></center>");
		return false;
	}else if (details.trim().length > 29500) {
	    showModal("<center><a style='color:red'>Item details too long</a></center>");
		return false;
	}else if (inputImage.length == 0) {
	    showModal("<center><a style='color:red'>Upload at least one image</a></center>");
		return false;
	}else if(quantity==""){
		showModal("<center><a style='color:red'>Enter item's quantity</a></center>");
		return false;
	}else if(price==""){
		showModal("<center><a style='color:red'>Enter item's price</a></center>");
		return false;
	}else if(status=="select"){
		showModal("<center><a style='color:red'>Select status</a></center>");
		return false;
	}else if(seo==""){
		showModal("<center><a style='color:red'>Enter item's description for SEO</a></center>");
		return false;
	}else{
		document.getElementById("details").value = details;
		return true;
	}

	
	
}
fetchCategories();
function fetchCategories(){
	var xmlhttp = new XMLHttpRequest();
	var url = "../../ajax/items.php?p=category";
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	if(this.responseText.trim()!=""){
      		$("#category").html("<option>select</option>");
	        array = this.responseText.split(":::").sort();
			for(var i=0; i<array.length; i++){
				$("#category").append(`<option>${array[i]}</option>`);
			}
			$("#category").append("<option>other</option>");

	        //location.reload();
      	}
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
		
}


function fetchSubcategories(item, sub=""){
	var xmlhttp = new XMLHttpRequest();
	var url = "../../ajax/items.php?p=subcategory&q="+item;
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

      	
      	$("#subcategory").html("<option>select</option>");
        array = this.responseText.split(":::").sort();
		for(var i=0; i<array.length; i++){
			$("#subcategory").append(`<option>${array[i]}</option>`);
		}
		$("#subcategory").append("<option>other</option>");
		if(sub!=""){
			document.getElementById("subcategory").value = sub;
		}

        //location.reload();
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
		
}

fetchBrand();
function fetchBrand(){
	var xmlhttp = new XMLHttpRequest();
	var url = "../../ajax/items.php?p=brand";
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	if(this.responseText.trim()!=""){
	      	$("#brand").html("<option>select</option>");
	        array = this.responseText.split(":::").sort();
			for(var i=0; i<array.length; i++){
				$("#brand").append(`<option>${array[i]}</option>`);
			}
			$("#brand").append("<option>other</option>");

	      }  
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
		
}

//upload end

//update begin
function getSearchItems(root){
	var search = document.getElementById("search").value;
	var url = root+"ajax/items.php?q=" + search+"&p=search";
	$("#suggestion").html("");
	if(search.length >2){
		$("#suggestion").show();
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	      	

	        array = this.responseText.split("***");
			for(var i=0; i<array.length; i++){
				$("#suggestion").append(`<p onclick="fetchItemDetails('${root}','${array[i].split(":::")[1]}')">${array[i].split(":::")[0]}</p>`);
			}
	        //location.reload();
	      }
	    };
	    xmlhttp.open("GET", url, true);
	    xmlhttp.send();
		
	}else{
		$("#suggestion").hide();
	}

}

function fetchItemDetails(root, item){
	inputImage = [];
	var xmlhttp = new XMLHttpRequest();
	var url = root+"ajax/items.php?q=" + item+"&p=general";
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	

        array = this.responseText.split(":::");
		for(var i=0; i<array.length; i++){
			console.log(array[i]);

		}
		
		document.getElementById("item").value = array[1];
		document.getElementById("category").value = array[2];
		//document.getElementById("subcategory").value = array[3];
		fetchSubcategories(document.getElementById("category").value, array[3]);
		document.getElementById("brand").value = array[4];
		$("#summernote").summernote("code", array[5]);
		var imageCount = Number(array[6]);

		for(let j=0; j<imageCount; j++){
			inputImage.push(root+"images/items/"+array[0]+"/"+j+".png");
			if(j==imageCount-1){
		    	renderImage();
		    }

		}
		
		document.getElementById("quantity").value = array[7];
		document.getElementById("price").value = array[8];
		document.getElementById("status").value = array[10];
		document.getElementById("seo").value = array[11];

		$("#uploadForm").append(`<input type="text" value=${array[0]} name="id" id="id" style="display:none" />`);
		
		document.getElementById("search").value = array[1];
		$("#suggestion").hide();

        //location.reload();
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
		
}

const toDataURL = url => fetch(url)
  .then(response => response.blob())
  .then(blob => new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.onloadend = () => resolve(reader.result)
    reader.onerror = reject
    reader.readAsDataURL(blob)
  }))


