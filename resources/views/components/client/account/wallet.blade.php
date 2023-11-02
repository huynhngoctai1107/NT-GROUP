<div class="containers" id="containers">
    <div class="form-container1 sign-up-container">

        <form action="{{route('Payment_method')}}" method="POST">

            @csrf
            <div class="col-12">
                <label for="inputAddress" class="form-label">Số tiền cần nạp</label>
                <input type="number" name="price" class="form-control rounded-input" required="required"/>
            </div>
            <div class="col-md-12">

                <label for="payments" class="form-label">Phương thức thanh toán</label>
                <select class="form-select rounded-input" aria-label="Default select example" name="payments">
                    @foreach($payment as $key => $payment_method)

                        @if($payment_method->id == 5)
                        @break
                        @endif
                        <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>

                        @endforeach


                </select>
            </div>
            <div class="btn-group text-center" role="group">
                <button name="redirect" class="centered button">Nạp Tiền</button>
            </div>
        </form>
    </div>

    <div class="form-container sign-in-container">
        <div class="card py-4">

            <div class="#">

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
                <h3 id="title">Chào Mừng Bạn Đến Với Website Bất Động Sản</h3>
                <p>Điền các thông tin thẻ của bạn. Khi điền thông tin thẻ vui lòng không để lộ ra bên ngoài</p>
                <p></p>
                <button class="ghost button" id="signIn">Ví của tôi</button>
            </div>

            <div class="overlay-panel overlay-right">
                <h3 id="title">Website Bất Động Sản! Xin Chào Bạn</h3>
                <p>Nhập thông tin ví hoặc số thẻ của bạn để nạp tiền</p>
                <button class="ghost button" id="signUp">Nạp Tiền</button>
            </div>
        </div>
    </div>
</div>


<style>

	.form-container1 {
		background-color: #FFFFFF;
		border-radius: 10px;
		padding: 40px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		width: 400px;
	}

	.form-container1 h1 {
		text-align: center;
		margin-bottom: 20px;
	}
	.form-container1 span {
		text-align: center;
		margin-bottom: 10px;
	}

	.form-container1 input {
		width: 100%;
		padding: 10px;
		margin-bottom: 10px;
		border: 1px solid #DDDDDD;
		border-radius: 5px;
	}

	.form-container1 .button {
		width: 100%;
		border-radius: 50px;
		border: 1px solid #279b00;
		background-color: #17a846;
		color: #FFFFFF;
		font-size: 13px;
		margin-top: 20px;
		font-weight: bold;
		padding: 12px 45px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
	}

	.form-container1 .button:active {
		transform: scale(0.95);
	}

	.form-container1 .button:focus {
		outline: none;
	}

	.button {
		border-radius: 50px;
		border: 1px solid #279b00;
		background-color: #17a846;
		color: rgb(255, 255, 255);
		font-size: 13px;
		margin-top: 20px;
		font-weight: bold;
		padding: 12px 45px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
	}
	.centered social:hover {
		cursor: pointer;
		opacity: 0.8;
		color: springgreen;
		background-color: #222425;
		transition: all 0.3s ease-in
	}

	.button:active {
		transform: scale(0.95);
	}

	.button:focus {
		outline: none;
	}

	.ghost {
		background-color: transparent;
		border-color: #FFFFFF;
	}

	.form-container {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.rounded-input {
		border-radius: 20px;
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
		height: 150px;
		transition: all 0.6s ease-in-out;
	}

	.sign-in-container {
		left: 0;
		width: 50%;
		z-index: 2;
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
		background: linear-gradient(to right, #ff947e, #f6ee93);
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

	.sign-up-container {
		left: 0;
		width: 50%;
		opacity: 0;
		z-index: 1;
	}

	.container.right-panel-active .sign-up-container {
		transform: translateX(100%);
		opacity: 1;
		z-index: 5;
		animation: show 0.6s;
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

	.round-image1 {
		margin-left: 50px;
		width: 120px;
		height: 120px;
		border: 2px solid red;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		overflow: hidden;
	}

	.round-image1 img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.round-image2 {
		margin-left: 50px;
		width: 125px;
		height: 125px;
		border: 2px solid red;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		overflow: hidden;
	}

	.round-image2 img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	userImage {
		width: 100%;
		height: 100%;
		object-fit: cover;
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