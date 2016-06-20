function sendFile(base64Content, url, editor, isSummerNote, pictureId) {
	$("#" + pictureId + "-btn").hide();
	$("#" + pictureId + "-loading").show();
	var url = APIUrl + "/fileUpload"; // the script where you handle the form
	console.log("Processing: " + pictureId);
	var url = PHP_API + "/upload.php";
	var file_data = $('#' + pictureId).prop('files')[0];

	var d = new Date();
	var timeStamp = d.getTime();
	var form_data = new FormData();
	form_data.append('file', file_data);
	form_data.append('timeStamp', timeStamp);
	console.log(form_data);
	$.ajax({
		url : url,
		dataType : 'text',
		cache : false,
		contentType : false,
		processData : false,
		data : form_data,
		type : 'post',
		success : function(data) {
			if (isSummerNote == true) {
				editor.summernote('insertImage', UPLOAD_PATH + data);
				$("#" + pictureId + "-btn").show();
			} else {
				console.log("Editor: ");
				$("#" + editor + "_src").attr('src', UPLOAD_PATH + data);
				$("#" + editor).val(data);
				$("#" + pictureId + "-btn").show();
				$("#" + pictureId + "-loading").hide();
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
			sendFile(e.target.result, url, targetId, isSummerNote,
					currentlyLoading);
		};
		FR.readAsDataURL(this.files[0]);
	}
}
