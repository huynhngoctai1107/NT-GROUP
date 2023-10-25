<div>
        @foreach($postList as $item)
            <tr class="text-center">
                <td class="product-thumbnail pt-4"><a href="#">
                        @php
                            $imgPost = explode(',', $item->images)
                        @endphp
                        @for($i=0 ; $i <count($imgPost); $i++)

                            <img style="width: 100px" src='{{asset("images/posts/".$imgPost[$i])}}' alt="{{$imgPost[$i]}}">
                            @break
                        @endfor
                    </a>
                </td>
                <td class="product-name pt-5" data-title="Tiêu đề">
                    <p class="text-dark" style="
                                display:inline-block;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp:1;
                                  height: 75px;
                                max-width: 30ch;">{{$item->title}}</p>
                </td>
                <td class="product-quantity pt-5" data-title="Nhu cầu">{{$item->name_demands}}</td>
                <td class="product-quantity pt-5" data-title="Danh mục">{{$item->name_category}}</td>
                <td class="product-quantity text-danger pt-5" style="font-weight: bold;"  data-title="Giá">{{$formatPrice($item->price)}}</td>
                <td class="product-quantity pt-5" data-title="Diện tích">{{$item->acreages}} m<sup>2</sup></td>
                <td class="product-quantity pt-5" data-title="Địa chỉ"><p class="text-dark" style="
                                display:inline-block;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp:1;
                                  height: 75px;
                                max-width: 30ch;">{{$item->address}}</p></td>

                <td class="product-name pt-5" data-title="Chi tiết">
                    <a href="" class="text-success" style="font-weight: bold;">Chi tiết</a><br>
                </td>
                <td>
                    <div class="btn-group pt-5" role="group">
                        <a href="" class="btn btn-outline-success btn-sm">Sửa</a>
                        <a href="{{route('deletePostlist',$item->id_post)}}" class="btn btn-outline-danger btn-sm">Xóa</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </div>


