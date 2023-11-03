
    <div class="row mb-5">
        <div class="col-md-12 bg-light">
            <div class="text-center pt-3">
                <p style="font-size: 1.5em;">Lọc Bài Viết</p>
            </div>
            <div class="mt-3" id="searchForm">
                <form action="{{route('SearchPost')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected>Loại BDS</option>
                            @foreach($dataToCategory as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="demand">
                            <option selected>Nhu Cầu</option>
                            @foreach($dataToDemand as $demand)
                                <option value="{{$demand->id}}">{{$demand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="city" name="city">
                            <option value="" selected>Chọn tỉnh thành</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="district" name="district">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="ward" name="ward">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="price">
                            <option selected>Giá</option>
                            @foreach($dataToPrice as $price)
                                <option value="{{$price->id}}">{{ $formatPrice($price->name_min) }} - {{ $formatPrice($price->name_max) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="propertyType" name="acreage">
                            <option selected>Diện tích</option>
                            @foreach($dataToAcreage as $acreage)
                                <option value="{{$acreage->id}}">{{ $acreage->name_min }} m² - {{ $acreage->name_max }} m²</option>
                            @endforeach
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
