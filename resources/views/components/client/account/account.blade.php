<div class="card">
    <div class="p-2 bg-dark">
        <h6 style="color: white">Cập nhật Tài Khoản </h6>
    </div>
    <div class="card-body">
        <div class="row">
            <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                <div class="row">
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="label" for="name">Họ và Tên</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="label" for="email">Địa chỉ Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <br/>
                    <div class="mb-3">
                        <label for="gender" class="label">Giới tính</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="Nam">
                            <label class="label" for="male">Nam</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="Nữ">
                            <label class="label" for="female">Nữ</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="phone-number" class="label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone-number" placeholder="Nhập số điện thoại của bạn">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="street-address" class="label">Địa chỉ</label>
                        <input type="text" class="form-control" id="street-address" placeholder="Nhập địa chỉ của bạn">
                    </div>

                    <div class="file-upload">
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Thêm Ảnh</button>

                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"/>
                            <div class="drag-text">
                                <h5>Kéo và thả tệp hoặc thêm hình ảnh</h5>
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image"/>
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                    <span class="image-title">Uploaded Image</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="d-grid gap-2">
                            <button class="btn btn-danger" type="button">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>