function previewFile() {
  const image = document.getElementById("previewImage");
  const imageContainer = document.getElementById("previewContainer");
  const fileInput = document.getElementById("image-upload");
  const fileLabel = document.getElementById("image-label");
  const files = fileInput.files;

  if (files.length > 0) {
      var reader = new FileReader();
      reader.onload = function (e) {
          image.src = e.target.result;
      };
      imageContainer.style.display = "block";
      reader.readAsDataURL(files[0]);
      fileLabel.style.display = "none";
  }
}