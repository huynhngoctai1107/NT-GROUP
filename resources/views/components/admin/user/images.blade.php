<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Upload Image</title>
    <style>
		.thumbnail-image {
			max-width: 200px;
			max-height: 200px;
		}
    </style>
</head>

<body>


        <div class="mb-3">
            <label for="imageUpload" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" value="" name="image" id="imageUpload" accept="image/*">
            <div class="d-flex justify-content-center align-items-center" style="max-width: 190px; max-height: 190px;  margin: 15px auto;">
                <div id="imagePreview"></div>
            </div>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


<script>
    document.getElementById("imageUpload").addEventListener("change", function (event) {
        var imagePreview = document.getElementById("imagePreview");
        imagePreview.innerHTML = "";

        var files = event.target.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement("img");
                img.setAttribute("src", e.target.result);
                img.setAttribute("class", "img-thumbnail mt-3 thumbnail-image");
                imagePreview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    });
</script>
</body>

</html>