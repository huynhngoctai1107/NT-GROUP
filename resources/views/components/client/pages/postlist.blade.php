@foreach ($postList as $item)

    <tr class="text-center">
        <td colspan="1" class="product-thumbnail pt-3"><a href="#">
                @php
                    $imgPost = explode(',', $item->images);
                @endphp
                @for ($i = 0; $i < count($imgPost); $i++)
                    <img width="" src='{{ asset('images/medias/' . $imgPost[$i]) }}' alt="{{ $imgPost[$i] }}">
                    @break
                @endfor
            </a>
        </td>
        <td colspan="2" class="product-name " data-title="Tiêu đề"><span class="text-dark" style="
                    display:inline-block;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    -webkit-line-clamp:1;
                    max-width: 30ch;">{{ $item->title }}</span>
            <a href="{{route('search',$item->slug_category )}}" class="btn btn-fill-out fst-italic " type="button">
                {{ $item->name_category }}</a>




            <a href="{{route('search1',$item->slug_demands)}}" class=" text-white  btn btn-fill-out fst-italic" type="button">
                {{ $item->name_demands }}</a>
        </td>


        <td colspan="1" class="text-danger" style="font-weight: bold;" data-title="Giá">
            {{ $formatPrice($item->price) }}</td>


        <td colspan="2" class="align-items-center" data-title="Địa chỉ">
            <p class="text-dark" style="
                                display:inline-block;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp:1;
                                  height: 75px;
                                max-width: 30ch;">
                {{ $item->address }}

            </p>

        </td>

        <td colspan="2">
            <form action="{{route('editStatus',$item->slug_posts)}}" method="post">
                @csrf
                <button type="submit" style="font-size:12px" class="btn  text-white fst-italic p-2 {{$item->status_post == 1 ? 'bg-success' : 'bg-danger' }}" name="status" value="{{$item->status_post}}">{{$item->status_post == 1 ? 'Đang hoạt động' : 'Tạm ngưng hoạt động' }}</button>
                @if($item->delete_posts == 0)
            </form>
            @endif
        </td>
        <td colspan="2">
            <a href="{{route('postSingle',$item->slug_posts)}}" class="text-success" style="font-weight: bold;">Xem Chi tiết</a><br>
        </td>

        <td colspan="2">
            @if($item->delete_posts == 0)
                <div class="btn-group  align-items-center" role="group">
                    <a href="{{route('postSingle',$item->slug_posts)}}" class="btn btn-outline-success btn-sm">Sửa</a>
                    <a href="{{ route('deletePostlist', $item->slug_posts) }}" class="btn btn-outline-danger btn-sm">Xóa</a>
                </div>
            @endif
        </td>

    </tr>
@endforeach