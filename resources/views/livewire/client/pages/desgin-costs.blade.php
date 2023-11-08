<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Công cụ dự tính chi phí</h2>
        </div>
    </div>

    <div class="p-0 rounded-0 flex-column my-4 ">
        <div class="d-flex justify-content-between">
            <h3 class="col-md-3 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                CHỌN THÔNG SỐ XÂY DỰNG</h3>
        </div>
        <hr class="col-12 mt-0">
    </div>
    <form wire:submit="send" method="post">

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">

                    <select id="package" wire:model="design" name="design" class="form-select section-form_input" onchange="showHideOptions()">
                        <option selected>-- Chọn gói thiết kế --</option>
                        <option value="1">Thiết kế kiến trúc</option>
                        <option value="2">Thiết kế Nội thất</option>
                    </select>
                    <label for="design" class="section-form_label section-form_label--darkblue">
                        Gói thiết kế
                    </label>
                    @error('design') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating" id="architecture" style="display: {{$design != 1 ? 'none': "block"}}">

                    <select class="form-select section-form_input" wire:model="construction" name="construction">
                        <option selected>-- Chọn gói Kiến trúc --</option>
                        <option value="100000" {{$construction== 100000 ? "selected" : ''}}>Nhà phố</option>
                        <option value="120000" {{$construction== 120000 ? "selected" : ''}}>Nhà phố 2 mặt tiền</option>
                        <option value="170000" {{$construction== 170000 ? "selected" : ''}}>Biệt thự hiện đại</option>
                        <option value="4" {{$construction== 4 ? "selected" : ''}}>Nhà xưởng</option>
                    </select>
                    <label for="construction" class="section-form_label section-form_label--darkblue">
                        Gói thiết kế kiến trúc
                    </label>
                    @error('construction') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-floating" id="interior" style="display: {{$design != 2 ? 'none': "block"}}">

                    <select class="form-select section-form_input" wire:model="construction" name="construction">
                        <option selected>-- Chọn gói nội thất --</option>
                        <option value="100000" {{$construction== 100000 ? "selected" : ''}}>Nhà phố</option>
                        <option value="150000" {{$construction== 150000 ? "selected" : ''}}>Biệt thự hiện đại</option>
                        <option value="180000" {{$construction== 180000 ? "selected" : ''}}>Biệt thử cổ điển</option>
                    </select>
                    <label for="construction" class="section-form_label section-form_label--darkblue">
                        Gói thiết kế nội thất
                    </label>
                    @error('construction') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>


        </div>
        <div class="p-0 rounded-0 flex-column my-4 ">
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <h3 class="col-md-3 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                    CHỌN CẤU TRÚC NHÀ</h3>
                <button type="button" class="btn text-primary pe-0" wire:click="resset" style=" font-size: 15px">
                    <i class="bi bi-arrow-clockwise"></i>Làm mới
                </button>
            </div>
            <hr class="col-12 mt-0">
        </div>
        <div class="row">
            <div class="col-md-4 col-12  ">
                <div class="col-12">
                    <div class="form-floating">


                        <select id="type" wire:model="floors" class="form-select section-form_input" name="floors">
                            <option selected>-- Chọn số sàn --</option>
                            <option value="0" {{$floors== 0 ? "selected" : ''}}>Nhà không có sàn lầu</option>
                            <option value="1" {{$floors== 2 ? "selected" : ''}}>Nhà 01 tầng lầu</option>
                            <option value="2" {{$floors== 3 ? "selected" : ''}}>Nhà 02 tầng lầu</option>
                            <option value="3" {{$floors== 4 ? "selected" : ''}}>Nhà 03 tầng lầu</option>
                            <option value="4" {{$floors== 5 ? "selected" : ''}}>Nhà 04 tầng lầu</option>
                            <option value="5" {{$floors== 6 ? "selected" : ''}}>Nhà 05 tầng lầu</option>

                        </select>
                        <label for="type" class="section-form_label section-form_label--darkblue">
                            Số sần lầu
                        </label>
                        @error('floors') <span class="error  text-danger">{{ $message }}</span> @enderror
                    </div>


                </div>
                <div class="form-floating col-12 mt-3 ">
                    <input type="number" class="form-control section-form_input" name="wide" wire:model="wide" value="{{$wide}}" min="0" id="wide">
                    <label for="wide" class="section-form_label section-form_label--darkblue">
                        Chiều rộng
                    </label>
                    @error('wide') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-floating col-12 mt-3 ">
                    <input type="number" class="form-control section-form_input" name="long" wire:model="long" value="{{$long}}" min="0" id="wide">
                    <label for="wide" class="section-form_label section-form_label--darkblue">
                        Chiều dài
                    </label>
                    @error('long') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>


            </div>
            <div class="col-md-4 col-12 ">

                <div class="form-floating   ">
                    <input type="number" {{$gardenHiden == TRUE ? "" : "disabled"}} class="form-control section-form_input" name="heightPenthouse" wire:model="longGarden" value="{{$longGarden}}" min="0" id="longGarden">
                    <label for="heightPenthouse" class="section-form_label section-form_label--darkblue">
                        Chiều rộng hàng rào
                    </label>
                    @error('longGarden') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-floating  mt-3 ">
                    <input type="number" {{$gardenHiden == TRUE ? "" : "disabled"}} class="form-control section-form_input" name=wideGarden" wire:model="wideGarden" value="{{$wideGarden}}" min="0" id="wideGarden">
                    <label for="wideGarden" class="section-form_label section-form_label--darkblue">
                        Chiều dài hàng rào
                    </label>
                    @error('$wideGarden') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="form-floating  mt-3 ">
                    <input type="number" {{$penthouseHiden == TRUE ? "" : "disabled"}} class="form-control section-form_input" name="longPenthouse" wire:model="longPenthouse" value="{{$longPenthouse}}" min="0" id="longPenthouse">
                    <label for="longPenthouse" class="section-form_label section-form_label--darkblue">
                        Chiều dài Tum thắng
                    </label>
                    @error('longPenthouse') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-floating  mt-3 ">
                    <input type="number" {{$penthouseHiden == TRUE ? "" : "disabled"}} class="form-control section-form_input" name="widePenthouse" wire:model="widePenthouse" value="{{$widePenthouse}}" min="0" id="widePenthouse">
                    <label for="longPenthouse" class="section-form_label section-form_label--darkblue ">
                        Chiều rộng Tum thắng
                    </label>
                    @error('widePenthouse') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-floating  mt-3 ">
                    <input type="number" {{$penthouseHiden == TRUE ? "" : "disabled"}} class="form-control section-form_input" name="heightPenthouse" wire:model="heightPenthouse" value="{{$heightPenthouse}}" min="0" id="heightPenthouse">
                    <label for="heightPenthouse" class="section-form_label section-form_label--darkblue">
                        Chiều cao Tum thắng
                    </label>
                    @error('heightPenthouse') <span class="error  text-danger">{{ $message }}</span> @enderror
                </div>


            </div>
            <div class="col-md-4  col-12 my-3 mt-md-0 d-flex align-items-center flex-column">
                <div class="row mt-3 ms-1 ">
                    <div class="form-check form-switch  col-6">
                        <input class="form-check-input" wire:click="penthouse" {{$check == TRUE ? "checked" : ""}} name="check" type="checkbox" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Có sân thượng + Tum thắng</label>
                    </div>
                    <div class="form-check form-switch col-6">
                        <input class="form-check-input" wire:click="garden" {{$check1 == TRUE ? "checked" : ""}} name="check1" type="checkbox" id="flexSwitchCheckCheckedDisabled">
                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Sân hàng rào</label>
                    </div>

                    <div class="form-check form-switch col-6">
                        <input class="form-check-input" wire:model="check2" {{$check2 == TRUE ? "checked" : ""}} name="check2" type="checkbox" id="flexSwitchCheckCheckedDisabled1">
                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled1">Mái bê tông cốt thép và Lam trang trí
                        </label>
                    </div>
                    <div class="form-check form-switch col-6">
                        <input class="form-check-input" wire:model="check3" {{$check3 == TRUE ? "checked" : ""}} name="check3" type="checkbox" id="flexSwitchCheckCheckedDisabled2">
                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled2">Có hầm</label>
                    </div>

                </div>
                <button class="button-42 col-12 mt-4" role="button"><i class="bi bi-calculator"></i> Tính diện tích</button>


            </div>


        </div>


    </form>

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


            @foreach( $data  as $item)

                <tr>
                    <td class="text-center">{{$item['title']}}
                        <br><span class="fst-italic text-danger" style="font-size: 12px">{{$item['subtitle'] ??''}}</span>
                    </td>
                    <td class="text-center">
                        {{$item['acreage']}}
                    </td>
                    <td class="text-center">{{$item['coefficient']}}%</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <div class="col-md-6 col-12 mt-4 mt-md-0  ">
            @foreach($data as $item)
                @if($item['images'])
                    <div class="col-12 d-flex flex-md-row justify-content-center ">

                        <img class="col-md-10 col-8" src="{{asset($item['images']  ?? "")  }}" alt="">

                        <span class="align-items-center  d-flex">{{  $item['acreage']}}(m<sup>2</sup>)</span>

                    </div>
                @endif
            @endforeach

        </div>


    </div>

    <div class="p-0 rounded-0 flex-column mt-5  justify-content-center align-items-center d-flex">
        <h3 class="col-md-3 col-12 text-uppercase justify-content-center align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
            KẾT QUẢ DỰ TOÁN </h3>
        <hr class="col-12 mt-0 p-0">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <div class="row">
                <p class="text-start col-6 fw-bold">Diện tích tầng trệt, tầng hầm (nếu có):</p>
                <p class="text-end col-6">25 m<sup>2</sup></p>
            </div>
            <div class="row">
                <p class="text-start col-6 fw-bold">Diện tích lầu:</p>
                <p class="text-end col-6">25 m<sup>2</sup></p>
            </div>
            <div class="row">
                <p class="text-start col-6 fw-bold">Tổng diện tích sử dụng:</p>
                <p class="text-end col-6">25 m<sup>2</sup></p>
            </div>
            <div class="row">
                <p class="text-start col-6 fw-bold">Đơn vị tiết kế:</p>
                <p class="text-end col-6">25 VND</p>
            </div>
            <div class="row">
                <p class="text-start col-6 fw-bold">Giá trị thiết kế dự toán:</p>
                <p class="text-end col-6">25 VND</p>
            </div>


        </div>
        <p class="text-center">
            Số sàn lầu (không bao gồm tầng trệt, sàn sân thượng và tum thang): 4 sàn

        </p>
        <p class="text-center text-danger">- Đơn giá chưa bao gồm thuế VAT 10% </p>
        <div class="row justify-content-around">
            <button class="button-42  col-md-5" role="button"><i class="bi bi-calculator"></i> In kết quả</button>
            <button class="button-42 mt-3 mt-md-0 col-md-5" role="button">
                <i class="bi bi-calculator"></i> Gọi ngay cho chúng tôi
            </button>
        </div>
    </div>
</div>


