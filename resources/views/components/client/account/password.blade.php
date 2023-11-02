<div class="card">
    <div class="p-2 mb-2 bg-dark text-center">
        <h5 style="color: white">Đổi mật khẩu</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <form method="POST" action="{{ route('updatePassword', auth()->user()->token) }}" id="update_password" enctype="multipart/form-data" class="contactForm">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="old-password" class="form-label">Nhập Mật khẩu cũ</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"   id="old-password" name="current_password" placeholder="Nhập mật khẩu cũ của bạn">
                        <input type="checkbox" id="show-old-password" onchange="showPassword('old-password', 'show-old-password')"> Hiện mật khẩu
                        @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new-password" class="form-label">Nhập Mật khẩu mới</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new-password" name="new_password" placeholder="Nhập mật khẩu mới của bạn">
                        <input type="checkbox" id="show-new-password" onchange="showPassword('new-password', 'show-new-password')"> Hiện mật khẩu
                        @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm-password" name="confirm_password" placeholder="Nhập lại mật khẩu mới của bạn">
                        <input type="checkbox" id="show-confirm-password" onchange="showPassword('confirm-password', 'show-confirm-password')"> Hiện mật khẩu
                        @error('confirm_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-fill-out" >Cập nhật tài khoản</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showPassword(inputId, checkboxId) {
        var input = document.getElementById(inputId);
        var checkbox = document.getElementById(checkboxId);

        if (checkbox.checked) {
            input.type = "text";
        }
        else {
            input.type = "password";
        }
    }
</script>
