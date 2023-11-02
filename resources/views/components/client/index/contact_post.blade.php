<div class="card_post">
    <div class="content_post">
        <div class="p-3 card-4">
            <br/>
            <h4 class="text-center">LIÊN HỆ ĐĂNG TIN</h4>

            <div class="p-3 card-child mt-4">
                <div class="d-flex flex-row align-items-center">
                <span class="circle">
                  <i class="fa fa-home"></i>
                </span>
                    <div class="d-flex flex-column ms-3">
                        <h6 class="fw-bold"><a href="{{route('about')}}">Giới thiệu</a></h6>
                        <span>Sơ lược Bất Động Sản Kiên Giang</span>
                    </div>

                </div>
            </div>

            <div class="p-3 card-child mt-4">
                <div class="d-flex flex-row align-items-center">
              <span class="circle-2">
                  <a href="tel:0949 615 859"><i class="bi bi-telephone-fill"></i></a>
              </span>
                    <div class="d-flex flex-column ms-3">
                        <h6 class="fw-bold">Liên Hệ</h6>
                        <span>Nếu còn thắc mắc hãy gọi ngay với chúng tôi</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<style>
	.card_post {
		width: 350px;
		height: 400px;
		position: relative;
		cursor: pointer;
	}

	.card_post .content_post {
		width: 100%;
		height: 100%;
		background: rgba(255, 255, 255, 0.34);
		backdrop-filter: blur(20px);
		box-shadow: 0 0 30px rgb(255, 255, 255);
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		padding: 10px;
		border-radius: 10px;
		transition: all 2s;
		overflow: hidden;
	}

	.card_post .content_post p {
		font-size: 14px;
		padding: 0.3em 1.5em;
		text-align: center;
	}

	.circle{
		background-color:#ebdffb;
		height:50px;
		width:70px;
		border-radius:30%;
		display:flex;
		color: #a86ef3;
		justify-content:center;
		align-items:center;
		font-size:30px;
	}


	.circle-2{

		background-color: #fdd7b5;
		height:50px;
		width:90px;
		border-radius: 30%;
		display:flex;
		color: #e77a01;
		justify-content:center;
		align-items:center;
		font-size:30px;

	}

	.card_post:hover .content_post {
		color: rgb(0, 0, 0);
	}

	.card_post:before, .card_post:after {
		content: '';
		position: absolute;
		width: 100%;
		height: 50%;
		background: #ff7d7d;
		z-index: -20;
		transition: all 0.5s;
	}

	.card_post:before {
		top: 0;
		right: 0;
	}

	.card_post:after {
		bottom: 0;
		left: 0;
		background: #ffd1d1;
	}

	.card_post:hover::before {
		width: 100px;
		height: 100px;
		transform: translate(60px, -30px);
		border-radius: 50%;
	}

	.card_post:hover::after {
		width: 100px;
		height: 100px;
		transform: translate(-50px, 60px);
		border-radius: 50%;
	}
</style>
