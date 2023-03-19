function previewImage1() {
  var preview = document.getElementById('preview-img');
  var file = document.getElementById("file").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewImage2() {
  var preview = document.getElementById('preview-img1');
  var file = document.getElementById("file1").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewImage3() {
  var preview = document.getElementById('preview-img2');
  var file = document.getElementById("file2").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewImage4() {
  var preview = document.getElementById('preview-img3');
  var file = document.getElementById("file3").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}


function showBio() {
	var bioTextarea = document.getElementById("bio-textarea");
	if (bioTextarea.value.trim() !== "") {
	    var bioDiv = document.createElement("div");
	    bioDiv.className = "bio";
	    bioDiv.innerHTML = bioTextarea.value;
		bioTextarea.parentNode.replaceChild(bioDiv, bioTextarea);
		bioDiv.addEventListener("dblclick", editBio);
	}
}

function editBio() {
	var bioDiv = document.getElementsByClassName("bio")[0];
	var bioTextarea = document.createElement("textarea");
	bioTextarea.id = "bio-textarea";
	bioTextarea.name = "bio";
	bioTextarea.className = "bio-textarea";
	bioTextarea.value = bioDiv.innerHTML;
	bioDiv.parentNode.replaceChild(bioTextarea, bioDiv);
	bioTextarea.focus();
	bioTextarea.addEventListener("blur", showBio);
}
var bioTextarea =document.getElementById("bio-textarea");
bioTextarea.addEventListener("blur", showBio);
bioTextarea.focus();
