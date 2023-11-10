<div>

    <div class="container mt-5 py-5" > @csrf
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Công cụ dự tính chi phí xây dựng</h2>
            </div>
        </div>

        <div class="p-0 rounded-0 flex-column my-4 ">
            <div class="d-flex justify-content-between">
                <h3 class="col-md-3 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                    CHỌN THÔNG SỐ XÂY DỰNG</h3>
                <button wire:click="reset_cs" type="button" class="cursor-point btn text-primary pe-0" style=" font-size: 15px">
                    <i class="bi bi-arrow-clockwise"></i>Làm mới
                </button>
            </div>
            <hr class="col-12 mt-0">
        </div>

        <div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating">

                        <select id="package" wire:model.live="investment_level" name="investment_level" class="
                        @error('investment_level') border border-danger @enderror form-select section-form_input">
                            <option hidden >-- Chọn mức đầu tư --</option>
                            <option value="3800000">Phần thô tiêu chuẩn</option>
                            <option value="4000000">Phần thô cao cấp</option>
                            <option value="6000000">Phần trọn gói tiêu chuẩn</option>
                        </select>
                        <label for="investment_level" class="section-form_label section-form_label--darkblue">
                            Mức đầu tư
                        </label>
                        @error('investment_level')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        <select class=" @error('construction') border border-danger @enderror form-select section-form_input" wire:model.live="construction" name="construction">
                            <option hidden>-- Chọn mặt tiền --</option>
                            <option value="1">Nhà 1 mặt tiền</option>
                            <option value="1.03">Nhà 2 mặt tiền</option>
                            <option value="1.06">Nhà 3 mặt tiền</option>
                        </select>
                        <label for="construction" class="section-form_label section-form_label--darkblue">
                            Chọn số mặt tiền
                        </label>
                        @error('construction')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">

                        <select id="package" wire:model.live="land" name="land" class=" @error('land') border border-danger @enderror form-select section-form_input">
                            <option hidden>-- Chọn mái công trình --</option>
                            <option value="1.35">Mái tole</option>
                            <option value="1.5">Mái bê tông cốt thép</option>
                            <option value="1.65">Mái ngói khung kèo thép</option>
                            <option value="1.85">Mái bê tông dán ngói</option>
                        </select>
                        <label for="land" class="section-form_label section-form_label--darkblue">
                            Mái công trình
                        </label>
                        @error('land')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-floating">

                        <select id="package" wire:model.live="construction1" name="construction1" class="@error('construction1') border border-danger @enderror form-select section-form_input">
                            <option hidden>-- Chọn loại công trình --</option>
                            <option value="1">Nhà phố</option>
                            <option value="1.2">Biệt thự hiện đại</option>
                            <option value="1.3">Biệt thự tân cổ điển</option>
                        </select>
                        <label for="construction" class="section-form_label section-form_label--darkblue">
                            Loại công trình
                        </label>
                        @error('construction1')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">

                        <select id="package" wire:model.live="road" name="road" class="@error('road') border border-danger @enderror form-select section-form_input">
                            <option {{is_null($road) ? 'selected' : ''}}>-- Chọn loại đường --</option>
                            <option value="1">Đường nhựa, mặt tiền lớn</option>
                            <option value="1.1">Hẻm nhỏ 3m, cấm tải 1,5T</option>
                            <option value="0">Hẻm nhỏ 2m và hẻm sâu</option>
                        </select>
                        <label for="road" class="section-form_label section-form_label--darkblue">
                            Loại đường
                        </label>
                        @error('road')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">

                        <select class="@error('foundation') border border-danger @enderror form-select section-form_input" wire:model.live="foundation" name="foundation">
                            <option {{is_null($foundation) ? 'selected' : ''}}>-- Chọn móng công trình --</option>
                            <option value="1.4">Móng đơn cừ tràm</option>
                            <option value="1.7">Móng băng cừ tràm</option>
                            <option value="1.5">Móng cọc</option>
                        </select>
                        <label for="foundation" class="section-form_label section-form_label--darkblue">
                            Móng công trình
                        </label>
                        @error('foundation')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>
            <div class="p-0 rounded-0 flex-column my-4 ">
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <h3 class="col-md-3 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                        CHỌN CẤU TRÚC NHÀ</h3>
                    <button wire:click="reset_hs" type="button" class="btn text-primary pe-0" style=" font-size: 15px">
                        <i class="bi bi-arrow-clockwise"></i>Làm mới
                    </button>
                </div>
                <hr class="col-12 mt-0">
            </div>
            <div class="row">
                <div class="col-md-4 col-12  ">
                    <div class="col-12">
                        <div class="form-floating">
                            <select id="type" wire:model.live="floor_type" class="@error('floor_type') border border-danger @enderror form-select section-form_input" name="floors">
                                <option selected>-- Chọn số sàn --</option>
                                <option value="0">Nhà không có sàn lầu</option>
                                <option value="1">Nhà 01 tầng lầu</option>
                                <option value="2">Nhà 02 tầng lầu</option>
                                <option value="3">Nhà 03 tầng lầu</option>
                                <option value="4">Nhà 04 tầng lầu</option>
                                <option value="5">Nhà 05 tầng lầu</option>
                            </select>
                            <label for="type" class="section-form_label section-form_label--darkblue">
                                Số tầng lầu
                            </label>
                            @error('floor_type')
                            <span class="text-danger py-2">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="form-floating col-12 mt-3 ">
                        <input wire:model.live="wide" type="number" class="@error('wide') border border-danger @enderror form-control section-form_input" name="wide" min="0" id="wide">
                        <label for="wide" class="section-form_label section-form_label--darkblue">
                            Chiều rộng
                        </label>
                        @error('wide')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-4 col-12 ">

                    <div class="col-12">
                        <div class="form-floating">


                            <select id="type" wire:model.live="basement_type" class="@error('basement_type') border border-danger @enderror form-select section-form_input" name="floors">
                                <option selected>-- Chọn số tầng hầm --</option>
                                <option value="0">Không hầm</option>
                                <option value="1.3">Bán hầm < 0,5m</option>
                            </select>
                            <label for="type" class="section-form_label section-form_label--darkblue">
                                Tầng hầm
                            </label>
                            @error('basement_type')
                            <span class="text-danger py-2">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-floating  mt-3 ">
                            <input type="number" wire:model.live="long" class="@error('long') border border-danger @enderror form-control section-form_input" name=wideGarden" min="0" id="wideGarden">
                            <label for="wideGarden" class="section-form_label section-form_label--darkblue">
                                Chiều dài
                            </label>
                            @error('long')
                            <span class="text-danger py-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="col-md-4 col-12 my-3 mt-md-0 d-flex align-items-center flex-column">
                    <div class="row mt-3 ms-1 ">
                        <div class="form-check form-switch  col-6">
                            <input wire:model.live="terrace" class="form-check-input" name="check" type="checkbox"
                                    {{is_null($terrace) ? '' : 'checked'}} >
                            <label class="form-check-label">Có sân thượng + Tum thang</label>
                        </div>
                        <div class="form-check form-switch col-6">
                            <input wire:model.live="yard_check" class="form-check-input" name="check1" type="checkbox"
                                    {{is_null($yard_check) ? '' : 'checked'}} >
                            <label class="form-check-label">Sân hàng rào</label>
                        </div>
                    </div>
                    <button wire:click="calc_area_" class="button-42 col-12 mt-4" role="button">
                        <i class="bi bi-calculator"></i> Tính diện tích
                    </button>


                </div>


            </div>
            <div id="toolBuild">
            <div class="p-0 rounded-0 flex-column my-4 ">
                <div class="d-flex justify-content-between">
                    <h3 class="col-md-3 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                        CẤU TRÚC NHÀ</h3>

                </div>
                <hr class="col-12 mt-0">
            </div>
            <div class="d-flex flex-md-row flex-column  p-0">
                <table class="col-md-6 col-12 table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center text-black-50">Hạng mục</th>
                        <th scope="col" class="text-center text-black-50">Diện tích (m <sup>2</sup>)</th>
                        <th scope="col" class="text-center text-black-50">Hệ số (%)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        <td>Mái và làm trang trí</td>
                        <td><input class="form-control" type="number" value="{{$calc_area}}" disabled></td>
                        <td>{{$land ? $land * 100 : '100'}}%</td>
                    </tr>
                    @if(isset($floor_type) || isset($terrace) || isset($yard_check))
                        @if($terrace)

                            <tr class="text-center">
                                <td>Tum thang</td>
                                <td>
                                    <input class="form-control text-center"  type="number" value="{{$mezzanine}}" wire:model.live="mezzanine">
                                </td>
                                <td>100%</td>
                            </tr>
                            <tr class="text-center">
                                <td>Sân thượng</td>
                                <td><input class="form-control" type="number" value="{{$calc_terrace}}" disabled></td>
                                <td>50%</td>
                            </tr>
                        @endif
                        @for($i=$floor_type;$i>=1;$i--)
                            <tr class="text-center">
                                <td>Diện tích tầng {{$i}}</td>
                                <td><input class="form-control" type="number" value="{{$calc_area}}" disabled></td>
                                <td>100%</td>
                            </tr>
                        @endfor
                        @if($yard_check)
                            <tr class="text-center">
                                <td>Sân hàng rào</td>
                                <td><input class="form-control text-center" type="number" value="25" wire:model.live="yard"></td>
                                <td>50%</td>
                            </tr>
                        @endif
                    @endif
                    <tr class="text-center">
                        <td>Tầng trệt</td>
                        <td><input class="form-control" type="number" value="{{$calc_area}}" disabled></td>
                        <td>100%</td>
                    </tr>
                    @if($basement_type > 1 && $basement_type < 1.6)
                        <tr class="text-center">
                            <td>Tầng hầm</td>
                            <td><input class="form-control" type="number" value="{{$calc_area}}" disabled></td>
                            <td>130%</td>
                        </tr>
                    @endif


                    </tbody>
                </table>

                <div class="col-md-6 col-12 mt-4 mt-md-0 d-flex justify-content-end align-items-center">
                    <div class="col-12">
                        <div class="d-flex justify-content-center align-items-center position-relative">
                            <div class="w-75 ms-2">
                                <img src="{{asset('images\tools\mai.jpg')}}">
                            </div>
                            <span class="position-absolute bottom-0 end-0">{{$calc_area}}m&sup2;</span>
                        </div>
                        <div class="d-flex justify-content-center  align-items-center position-relative">
                            @if($terrace)
                                <div class="w-75 ms-2">
                                    <img src="{{asset('images\tools\santhuong.jpg')}}">
                                </div>
                            @endif
                            <span class="position-absolute bottom-0 end-0">{{$calc_area}}m&sup2;</span>
                        </div>

                        @for($i =1;$i <= $floor_type;$i++)
                            <div class="d-flex justify-content-center  align-items-center position-relative">
                                <div class="w-75 ms-2">
                                    <img src="{{asset('images\tools\lau.jpg')}}">
                                </div>
                                <span class="position-absolute bottom-0 end-0">{{$calc_area}}m&sup2;</span>
                            </div>
                        @endfor

                        <div class="d-flex justify-content-center  align-items-center position-relative">
                            <div class="w-75 ms-2">
                                <img src="{{asset('images\tools\tret.jpg')}}">
                            </div>
                            <span class="position-absolute bottom-0 end-0">{{$calc_area}}m&sup2;</span>
                        </div>
                        <div class="d-flex justify-content-center  align-items-center position-relative">
                            @if($basement_type > 1 && $basement_type < 1.6)
                                <div class="w-75 ms-2">
                                    <img src="{{asset('images/tools/ham.jpg')}}">
                                </div>
                                <span class="position-absolute bottom-0 end-0">{{$calc_area}}m&sup2;</span>
                            @endif
                        </div>
                    </div>

                </div>


            </div>


            <div class="p-0 rounded-0 flex-column mt-5  justify-content-center align-items-center d-flex">
                <h3 class="col-md-3 col-12 text-uppercase justify-content-center align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                    KẾT QUẢ DỰ TOÁN </h3>
                <hr class="col-12 mt-0 p-0">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold">Diện tích mái:</p>
                        <p class="text-end col-6">{{$calc_area}} m<sup>2</sup></p>
                    </div>
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold">Diện tích tầng trệt:</p>
                        <p class="text-end col-6">{{$calc_area}} m<sup>2</sup></p>
                    </div>
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold">Diện tích lầu:</p>
                        <p class="text-end col-6">
                            @php
                                $lau = 0;
                                if(isset($floor_type)){
                                     $lau = $calc_area * $floor_type;
                                }
                            @endphp
                            {{$lau}} m<sup>2</sup>
                        </p>
                    </div>
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold">Diện tích sân (nếu có):</p>
                        <p class="text-end col-6">{{$yard}} m<sup>2</sup></p>
                    </div>
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold">Diện tích hầm ( nếu có ):</p>
                        <p class="text-end col-6">
                            @php
                            $calc = 0;
                                if($basement_type > 1 && $basement_type < 1.6){
                                    $calc = $calc_area;
                                }
                            @endphp
                            {{$calc}} m<sup>2</sup></p>
                    </div>
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold ">Diện tích tum thang:</p>
                        <p class="text-end col-6">{{$mezzanine ? $mezzanine : 0}} m<sup>2</sup></p>
                    </div>
                    <div class="row hide-print">
                        <p class="text-start col-6 fw-bold ">Diện tích sân thượng:</p>
                        <p class="text-end col-6">{{$calc_terrace ? $calc_terrace : 0}} m<sup>2</sup></p>
                    </div>
                    <div class="row">
                        <p class="text-start col-6 fw-bold">Tổng diện tích sử dụng:</p>
                        <p class="text-end col-6">{{$totalArea ? $totalArea : 0}} m<sup>2</sup></p>
                    </div>

                    <div class="row">
                        <p class="text-start col-6 fw-bold">Giá trị dự toán:</p>
                        <p class="text-end col-6">{{number_format($totalPrice)}} đ</p>
                    </div>


                </div>
                <p class="text-center">
                    Số sàn lầu (không bao gồm tầng trệt, sàn sân thượng và tum thang): {{$floor_type ? $floor_type : 0}} sàn

                </p>
                <div class="d-flex justify-content-center mb-3">
                    <ul style="width: 750px" class="hide-print">
                        <li>- Bảo hành kết cấu bê tông cốt thép móng cột đà sàn 05 đến 20 năm</li>
                        <li>- Giá trị khái toán trên chưa bao gồm cừ tràm; chưa bao gồm phần thi công cọc ép, thi công cọc khoan nhồi (nếu có)</li>
                        <li>- Đối với công trình không có giá trị xin vui lòng liên hệ công ty để được tư vấn.</li>
                        <li>- Bảng tiều chuẩn, quy trình , vật liệu sử dụng trong mỗi gói xin quý khách liên hệ trực tiếp công ty</li>
                        <li>- Đơn giá áp dụng cho công trình thi công có bán kính dưới 20km so với trung tâm thành phố Cần Thơ</li>
                        <li>- Công trình thi công ngoại tỉnh sẽ áp dụng thêm hệ số tùy tỉnh thành</li>
                        <li>- Đơn giá chưa bao gồm thuế VAT 10%</li>
                        </ul>
                </div>
                <div class="row justify-content-around hide-print">
                    <button class="button-42  col-md-5" role="button" id="printBuildButton"><i class="bi bi-calculator"></i> In kết quả
                    </button>
                    <button class="button-42 mt-3 mt-md-0 col-md-5" role="button">
                        <i class="bi bi-calculator"></i> Gọi ngay cho chúng tôi
                    </button>
                </div>
            </div>
            </div>
        </div>


    </div>
</div>
