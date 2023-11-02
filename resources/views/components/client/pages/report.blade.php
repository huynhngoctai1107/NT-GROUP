<div class="form-group col-12 mb-3">
    <div class="card1 pb-0">
        <div class="row pt-3">
            <div class="col-lg-4 col-md-6 pb-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="reason1" id="reason1">
                    <label for="reason1"><span></span>Tài sản đã bán/cho thuê</label><br>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="reason2" id="reason2">
                    <label for="reason2"><span></span>Giá không đúng</label><br>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="other" id="otherViolation">
                    <label for="otherViolation"><span></span>Lý do khác</label><br>
                    <br/>
                    <form id="otherReasonForm" style="display: none;">
                        <h6>Lý do khác:</h6>
                        <textarea name="otherReason" rows="3" cols="85"></textarea>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 pb-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="reason3" id="reason3">
                    <label for="reason3"><span></span>Tin không có thật</label><br>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="reason4" id="reason4">
                    <label for="reason4"><span></span> Không liên lạc được</label><br>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 pb-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="reason5" id="reason5">
                    <label for="reason5">
                        Nội dung không đúng với thực tế
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="violationType" value="reason6" id="reason6">
                    <label for="reason6">
                        Địa chỉ bất động sản không đúng
                    </label>
                </div>
            </div>

            <div class="px-4 mb-3">
                <div class="btn btn-primary fw-bold">
                    Gửi báo cáo <span class="fas fa-angle-double-right ps-1"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var otherViolationRadio = document.getElementById("otherViolation");
    var otherReasonForm = document.getElementById("otherReasonForm");

    otherViolationRadio.addEventListener("change", function () {
        if (otherViolationRadio.checked) {
            otherReasonForm.style.display = "block";
        }
        else {
            otherReasonForm.style.display = "none";
        }
    });
</script>

<style>

	input:checked + label {
		content: '\2713';
		font-weight: bold;
		margin-right: 5px;
	}

	.contain {
		margin: 25px 25px;
		padding: 20px;
	}

	.col-lg-7 .card1 {
		overflow: hidden;
		border-radius: 0%;
		border: 1px solid #ddd;
		padding: 10px;
		background-color: white;
	}

	.btn.btn-primary {
		font-size: 12px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #8d5ecc;
		background-color: #efecf3;
		border: none;
		outline: none;
		box-shadow: none;

	}

	.btn.btn-primary:hover .fas.fa-angle-double-right {
		transform: translateX(10px);
		transition: transform 0.5s ease;
	}
	.btn.btn-secondary:hover .fas.fa-angle-double-right {
		transform: translateX(10px);
		transition: transform 0.5s ease;
	}
</style>

<script>
    var radioButtons = document.querySelectorAll('input[name="violationType"]');
    for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].addEventListener('click', toggleOtherReasonForm);
    }

    function toggleOtherReasonForm() {
        var otherViolation = document.getElementById("otherViolation");
        var otherReasonForm = document.getElementById("otherReasonForm");

        if (otherViolation.checked) {
            otherReasonForm.style.display = "block";
        }
        else {
            otherReasonForm.style.display = "none";
        }
    }
</script>
