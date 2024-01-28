function previewFile() {

    const image = document.querySelector(".img-preview");
    const fileInput = document.getElementById("image-upload");
    const files = fileInput.files;
  
    if (files.length > 0) {
      var reader = new FileReader();
      reader.onload = function (e) {
        fileInput.src = e.target.result;
      };
      image.style.display = "block";
      reader.readAsDataURL(files[0]);
    }
  }