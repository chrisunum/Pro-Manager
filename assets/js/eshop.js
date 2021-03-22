//products page

function showProfileImages(url){
	document.getElementById("main-image").src = url;
}
//alert(window.location.href);

//pagination
function next(page, pages){
	var url = window.location.href.split("?")[0];
	if(page < pages){
		window.location.href =url+"?page="+(page+1);
	}
}

function previous(page){
	var url = window.location.href.split("?")[0];
	if(page >1){
		window.location.href =url+"?page="+(page-1);
	}
}

function showAllPages(pages){
	var url = window.location.href.split("?")[0];
	var combined = "";
	for(var i=0; i<pages; i++){
		combined += `
			<a href="${url}?page=${i+1}"><button class="pagination-button">page ${i+1}</button></a>
		`;

	}
	var html = `
			<div style="max-height:400px; overflow-y:auto;">
				${combined}
			</div>
		`;

	showModal(combined);
}

//search engine
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
				$("#suggestion").append(`<p onclick="showItem('${root}','${array[i].split(":::")[0]}','${array[i].split(":::")[1]}')">${array[i].split(":::")[0]}</p>`);
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

function showItem(root,item,id){
	window.location.href = `${root}products/${item.replace(/ /g, "-")}-${id}`;
}

//cart

function addToCart(root, id){
		var url = root+"ajax/items.php?id=" +id+"&p=add";
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	      	

	        array = this.responseText.split("***");
			
	        //location.reload();
	      }
	    };
	    xmlhttp.open("GET", url, true);
	    xmlhttp.send();
		
	
}