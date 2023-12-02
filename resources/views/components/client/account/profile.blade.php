<div class="card">
    <div class="p-2 mb-2 bg-dark text-center">
        <h5 style="color: white">Cập nhật Tài Khoản</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <form method="POST" action="{{route('updateProfile',auth()->user()->slug)}}" id="update_profile" enctype="multipart/form-data" class="contactForm">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="label" for="name">Họ và Tên</label>
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ auth()->user()->fullname }}" id="fullname" placeholder="Name">
                            @error('fullname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="label" for="email">Địa chỉ Email</label>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled id="email" placeholder="Email">
                        </div>
                    </div>
                    <br/>

                    <div class="mb-3">
                        <label for="gender" class="label">Giới tính</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="Nam" {{ auth()->user()->gender == 'Nam' ? 'checked' : '' }}>
                            <label class="label" for="male">Nam</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="Nữ" {{ auth()->user()->gender == 'Nữ' ? 'checked' : '' }}>
                            <label class="label" for="female">Nữ</label>
                        </div>
                        @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="phone-number" class="label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone-number" name="phone" value="{{ auth()->user()->phone ?? '' }}" placeholder="Nhập số điện thoại của bạn">
                        </div>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="street-address" class="label">Địa chỉ</label>
                            <input type="text" class="form-control" id="street-address" name="address" value="{{ auth()->user()->address ?? '' }}" placeholder="Nhập địa chỉ của bạn">
                        </div>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" value="" name="image" id="imageUpload" accept="image/*">
                        <div class="d-flex justify-content-center align-items-center imgs" style="max-width: 190px; max-height: 190px;  margin: 15px auto;">
                            <div id="imagePreview"></div>
                        </div>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-fill-out">Cập nhật tài khoản</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<style>
	.imgs {
		max-width: 300px;
		max-height: 300px;
		margin: 15px auto;
		position: relative;
		overflow: hidden;
	}
</style>

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

















