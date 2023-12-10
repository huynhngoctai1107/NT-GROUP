{{--form wallet--}}
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-12">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Ví của bạn {{auth()->user()->fullname}}</h6>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email: {{auth()->user()->email}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Số điện thoại: {{auth()->user()->phone}}</p>
                                    </div>
                                </div>
                                <hr>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: red">Số dư: {{ number_format(auth()->user()->wallet, 0, ',', '.') }} VND</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Giới tính: {{auth()->user()->gender}}</p>
                                    </div>
                                    <hr>
                                    <br/>
                                    <div class="col-sm-10">
                                        <p class="m-b-10 f-w-600">Địa chỉ: {{auth()->user()->address}}</p>
                                    </div>
                                    <br/>
                                    <br/>
                                    <button type="button" class="btn btn-fill-out text-uppercase" data-bs-toggle="modal" data-bs-target="#myModel" id="shareBtn" data-bs-placement="top" title="Click Me!" name="redirect">
                                        NẠP TIỀN
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>{{-- end form wallet--}}


{{--form nạp tền--}}

<!-- Modal -->
<div class="modal fade" id="myModel" tabindex="-1" aria-labelledby="myModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModelLabel">Nạp Tiền  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Payment_method')}}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="price">Số tiền</label>
                        <input type="text" required class="form-control" id="price" name="price"/>
                    </div>

                    <div class="col-md-12">
                        <label for="phuong-thuc-thanh-toan">Phương thức thanh toán</label>
                        <select class="form-control" name="payments">
                            @foreach($payment as $key => $payment_method)

                                @if($payment_method->id == 5)
                                    @break
                                @endif
                                <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <br/>
                        <button name="redirect" class="btn btn-fill-out" type="submit">Nạp Tiền</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--end form nạp tền--}}
<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        let field = document.querySelector('.field');
        let input = document.querySelector('input');
        let copyBtn = document.querySelector('.field button');

        copyBtn.onclick = () => {
            input.select();
            if (document.execCommand("copy")) {
                field.classList.add('active');
                copyBtn.innerText = 'Copied';
                setTimeout(() => {
                    field.classList.remove('active');
                    copyBtn.innerText = 'Copy';
                }, 3500)
            }
        }
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0/dist/autoNumeric.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new AutoNumeric('#price', {
            // currencySymbol: 'VND',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
        });
    });
</script>