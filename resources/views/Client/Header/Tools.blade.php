<div class="d-md-flex d-none">
    <div class="con-tooltip1 right" style="position: fixed; bottom: 30px; left: 10px; margin-left: 10px; z-index: 100">
        <a href="{{route('calculate')}}" style="display: flex">
            <div class="rounded-circle btn btn-primary  custom-circle">
                <i class="bi bi-calculator-fill"></i>
            </div>

            <div class="tooltip">
                <span class=""> Tính lãi suất</span>
            </div>
        </a>
    </div>
    <div class="call-to-action" style="position: fixed; bottom: 120px; left: 10px; margin-left: 10px; z-index: 100">
        <a href="{{route('buildCost')}}" style="display: flex">

            <div class="rounded-circle btn btn-primary  custom-circle">
                <i class="bi bi-building-fill-gear"></i>
            </div>

            <div class="tooltip">
                <span> Tính xây dựng</span>
            </div>
        </a>
    </div>

    <div class="con-tooltip3 left" style="position: fixed; bottom: 30px; right: 10px; margin-left: 10px; z-index: 100">
        <a href="{{route('designCost')}}" style="display: flex">
            <div class="tooltip">
                <span class=""> Tính thiết kế</span>
            </div>

            <div class="rounded-circle btn btn-primary  custom-circle">
                <i class="bi bi-easel"></i>
            </div>


        </a>
    </div>

    <div class="con-tooltip4 left" style="position: fixed; bottom: 120px; right: 10px; margin-left: 10px; z-index: 50; ">
        <a href="{{route('mapLocation')}}" style="display: flex">
            <div class="tooltip">
                <span class="" id="search-text" >Tìm kiếm quanh đây</span>
            </div>
            <div class="rounded-circle btn btn-primary  custom-circle" id="search-icon">
                <i class="bi bi-compass-fill"></i>
            </div>

        </a>
    </div>
</div>

    <div class="container d-md-none d-flex " style="position: fixed;  bottom: 0px;box-shadow: 0px -1px 5px rgba(0, 0, 0, 0.5);; background-color: white ; z-index: 100; height: 70px">

        <a href="{{route('mapLocation')}}" class="col-2 justify-content-center align-items-center d-flex flex-column  ">
            <i class="bi bi-compass-fill icons-menu-mobile"></i>
            <span style="font-size: 10px">Tìm kiếm DBS</span>
        </a>

        <a href="{{route('designCost')}}" class="col-3  justify-content-center align-items-center d-flex  flex-column ">
            <i class="bi bi-easel icons-menu-mobile"></i>
            <span style="font-size: 10px">Chi Phí Thiết kế</span>

        </a>
        <div class="col-2  justify-content-center align-items-center d-flex ">

            <a href="{{route('postAdd')}}" class="rounded-circle btn btn-primary   custom-circle" style="background-color: #ff324d !important;">

                <i class="bi bi-stickies icons-menu-mobile"></i>

            </a>

        </div>
        <a href="{{route('buildCost')}}" class="col-3 justify-content-center align-items-center d-flex flex-column">
            <i class="bi bi-building-fill-gear icons-menu-mobile"></i>
            <span style="font-size: 10px">Chi Phí Xây dựng</span>
        </a>
        <a href="{{route('calculate')}}" class="col-2  justify-content-center align-items-center d-flex   flex-column">
            <i class="bi bi-calculator-fill icons-menu-mobile"></i>
            <span style="font-size: 10px">Tính Lãi suất</span>
        </a>


    </div>

</div>
