<div class="containers" id="containers">

    <div class="form-container sign-up-container">
        <form class="wallet" action="#">
            <div class="round-image">
                <img src="@if(auth()->user()->image){{asset('images/users/'.auth()->user()->image )}}@else{{'https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg'}}@endif" class="rounded-circle img-fluid" style="width: 100px;"/>            </div>

            <h4 class="mt-3">{{auth()->user()->fullname}}</h4>

            <form class="row g-3">

                <label for="name" id="name-label">
                    <span>Tên chủ thẻ</span>
                    <input type="text" name="name" class="form-control" required="required">
                </label>

                <label for="phone" id="name-label">
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" class="form-control" required="required">
                </label>

                <label for="email" id="email-label">
                    <span>Eamil chủ thẻ</span>
                    <input type="text" name="name" min="1" max="999" class="form-control" required="required">
                </label>

                <br/>
                <div class="px-5 pay">
                    <button class="btn btn-success btn-block">Nạp Tiền</button>
                </div>
            </form>
        </form>
    </div>

    <div class="form-container sign-in-container">

        <div class="card py-4">
            <div class="round-image">
                <img src="@if(auth()->user()->image){{asset('images/users/'.auth()->user()->image )}}@else{{'https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg'}}@endif" class="rounded-circle img-fluid" style="width: 100px;"/>            </div>
            <div class="#">
                <h4 class="mt-3">{{auth()->user()->fullname}}</h4>
                <br/>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="email"> Email: </label>
                        <h6>{{auth()->user()->email}}</h6> <br/>
                    </div>

                    <div class="col-md-6">
                        <label for="email">Số dư: </label>
                        <h6>{{ number_format(auth()->user()->wallet, 0, ',', '.') }} VND</h6><br/>
                    </div>

                    <div class="col-md-6">
                        <label for="phone">Số điện thoại: </label>
                        <h6>{{auth()->user()->phone}}</h6> <br/>
                    </div>

                    <div class="col-md-6">
                        <label for="gender">Giới tính: </label>
                        <h6>{{auth()->user()->gender}}</h6> <br/>
                    </div>

                    <div class="col-md-6">
                        <label for="address">Địa chỉ: </label>
                        <h6>{{auth()->user()->address}}</h6> <br/>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1 id="title">Chào Mừng Bạn Đến Với Website Bất Động Sản</h1>
                <p>Điền các thông tin thẻ của bạn</p>
                <p>Khi điền thông tin thẻ vui lòng không để lộ ra bên ngoài</p>
                <button class="ghost" id="signIn">Ví của tôi</button>
            </div>

            <div class="overlay-panel overlay-right">
                <h3 id="title">Website Bất Động Sản! Xin Chào Bạn</h3>
                <p>Nhập thông tin ví hoặc số thẻ của bạn để nạp tiền</p>
                <button class="ghost" id="signUp">Nạp Tiền</button>
            </div>
        </div>
    </div>
</div>


<style>
	button {
		border-radius: 50px;
		border: 1px solid #4A00E0;
		background-color: #4A00E0;
		color: #000000;
		font-size: 13px;
		font-weight: bold;
		padding: 12px 45px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
	}

	button:active {
		transform: scale(0.95);
	}

	button:focus {
		outline: none;
	}

	button.ghost {
		background-color: transparent;
		border-color: #FFFFFF;
	}

	.wallet {
		background-color: #FFFFFF;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 50px;
		height: 100%;
		text-align: center;
	}


	.containers {
		background-color: #FFFFFF;
		border-radius: 10px;
		position: relative;
		overflow: hidden;
		width: 100%;
		left: 70px;
		max-width: 100%;
		min-height: 550px;
	}

	.form-container {
		position: absolute;
		top: 0;
		height: 100%;
		transition: all 0.6s ease-in-out;
	}

	.sign-in-container {
		left: 0;
		width: 50%;
		z-index: 2;
	}

	.sign-up-container {
		left: 0;
		width: 50%;
		opacity: 0;
		z-index: 1;
	}

	.containers.right-panel-active .sign-up-container {
		transform: translateX(100%);
		opacity: 1;
		z-index: 5;

	}

	.overlay-container {
		position: absolute;
		top: 0;
		left: 50%;
		width: 50%;
		height: 100%;
		overflow: hidden;
		transition: transform 0.6s ease-in-out;
		z-index: 100;
	}

	.containers.right-panel-active .overlay-container {
		transform: translateX(-100%);
	}

	.overlay {
		background: #f6f5f7;
		background: -webkit-linear-gradient(to right, #a8fc87, #fcbe8e);
		background: linear-gradient(to right, #a8cefa, #f6ee93);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: 0 0;
		color: #FFFFFF;
		position: relative;
		left: -100%;
		height: 100%;
		width: 200%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	.containers.right-panel-active .overlay {
		transform: translateX(50%);
	}

	.overlay-panel {
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 40px;
		text-align: center;
		top: 0;
		height: 100%;
		width: 50%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	.overlay-left {
		transform: translateX(-20%);
	}

	.containers.right-panel-active .overlay-left {
		transform: translateX(0);
	}

	.overlay-right {
		right: 0;
		transform: translateX(0);
	}

	.containers.right-panel-active .overlay-right {
		transform: translateX(20%);
	}


	.social-container i {
		font-size: 25px;
	}

	.social-container a {
		border: 1px solid #DDDDDD;
		border-radius: 50%;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		margin: 0 5px;
		height: 40px;
		width: 40px;
	}

	.round-image {
		width: 100px;
		height: 100px;
		border: 2px solid red;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;

	}


</style>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const containers = document.getElementById('containers');

    signUpButton.addEventListener('click', () => {
        containers.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        containers.classList.remove("right-panel-active");
    });
</script>
