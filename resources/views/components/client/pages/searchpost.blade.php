<div class="col-md-4 mt-1">
    <div class="row mb-5">
        <div class="col-md-12 bg-light">
            <div class="text-center pt-3">
                <p style="font-size: 1.5em;">Lọc Bài Viết</p>
            </div>
            <div class="mt-3" id="searchForm">
                <form action="{{route('listPost')}}">
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option value="0" selected>Loại BDS</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="propertyType">
                            <option value="">Tỉnh / Thành Phố</option>
                            <option value="camau">Cà Mau</option>
                            <option value="dat">Đất</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="propertyType">
                            <option value="">Huyện / Quận</option>
                            <option value="nha">Nhà</option>
                            <option value="dat">Đất</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="propertyType">
                            <option value="">Xã / Phường</option>
                            <option value="nha">Nhà</option>
                            <option value="dat">Đất</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="propertyType">
                            <option value="">Giá</option>
                            <option value="nha">Nhà</option>
                            <option value="dat">Đất</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="propertyType">
                            <option value="">Diện tích</option>
                            <option value="dat">Đất</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">

                        <button type="submit" class="btn btn-warning mb-4">
                            <i class="bi bi-search"></i>
                            Tìm kiếm
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>