function sendFile(base64Content, url, editor, isSummerNote) {
	console.log("Base 64============?" + base64Content);
	var url = APIUrl + "/fileUpload"; // the script where you handle the form
	// input.
	// console.log("Form info: " + $("#idForm").serialize());
	console.log(url);
	$.ajax({
		type : "POST",
		url : url,
		data : $("#pictureUploadForm").serialize(), // serializes the form's elements.
		success : function(data) {
			if (isSummerNote == true)
				editor.summernote('insertImage', data);
			else {
				console.log("Editor: ");
				$("#" + editor + "_src").attr('src', data);
				$("#" + editor).val(data);
			}
		}
	});

	// e.preventDefault(); // avoid to execute the actual submit of the form.
}

function EL(id) {
	return document.getElementById(id);
}

function readFile() {
	console.log(this.id);
	currentlyLoading = this.id;
	if (this.files && this.files[0]) {
		var FR = new FileReader();
		FR.onload = function(e) {
			EL("imgText").value = e.target.result;
			url = APIUrl + "/fileUpload";
			// console.log("Base64 CLIENT: " + e.target.result);
			console.log("Currently loading: " + currentlyLoading);
			if (currentlyLoading == "uploadFile") {
				targetId = $("#summernote");
				isSummerNote = true;
			} else {
				targetId = "img_" + currentlyLoading;
				isSummerNote = false;
			}
			sendFile(e.target.result, url, targetId, isSummerNote);
		};
		FR.readAsDataURL(this.files[0]);
	}
}
