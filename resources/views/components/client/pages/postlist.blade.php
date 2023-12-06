@foreach ($postList as $item)

    <tr class="text-center">
        <td colspan="1" class="product-thumbnail"><a href="#">
                @php
                    $imgPost = explode(',', $item->images);
                @endphp
                @for ($i = 0; $i < count($imgPost); $i++)
                    <a class="hover" href="{{route('postSingle',$item->slug_posts)}}">
                        <img width="" src='{{ asset('images/medias/' . $imgPost[$i]) }}' alt="{{ $imgPost[$i] }}"> </a>
                    @break
                @endfor
            </a>
        </td>

        <td colspan="2" class="product-name " data-title="Tiêu đề">
            <a href="{{route('postSingle',$item->slug_posts)}}" class="text-dark" style="
                    display:inline-block;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    -webkit-line-clamp:1;
                    max-width: 30ch;">{{ $item->title }}</a>
            <br>
            <a href="{{route('search',$item->slug_category )}}">
                <button type="button" class="badge p-2 team-status border" style="background:#ff324d">{{ $item->name_category }}</button>
            </a>
            <a href="{{route('search1',$item->slug_demands)}}">
                <button type="button" class="badge p-2 team-status border" style="background:#ff324d">{{ $item->name_demands }}</button>
            </a>
            <br>
            @if($item->featured_news == 0 && $item->delete_posts ==0)
                <a href="{{route('buyVipNew',$item->slug_posts)}}">
                    <button type="button" class="badge p-2 team-status border" style="background:#ff324d">Mua tin Vip</button>
                </a>
            @endif

        </td>
        <td colspan="1" class="text-danger pt-4" style="font-weight: bold;" data-title="Giá">
            {{ $formatPrice($item->price) }}</td>

        <td colspan="2" class="align-items-center pt-4" data-title="Địa chỉ">
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
        @if($item->delete_posts == 0)
            <td colspan="2" class="pt-4">
                <form action="{{route('editStatus',$item->slug_posts)}}" method="post">
                    @csrf
                    <button type="submit" style="background: #ff324d; width: auto; height: 32px" class="badge p-2 team-status border {{$item->status_post == 1 ? 'bg-success' : 'style="background: #ff324d' }}" name="status" value="{{$item->status_post}}">{{$item->status_post == 1 ? 'Đang hoạt động' : 'Tạm ngưng hoạt động' }}</button>
                </form>

            </td>
            {{--        <td colspan="2">--}}
            {{--            <a href="{{route('postSingle',$item->slug_posts)}}" class="text-success" style="font-weight: bold;">Xem Chi tiết</a><br>--}}
            {{--        </td>--}}

            <td colspan="2" class="pt-4">
                <div class="btn-group  align-items-center" role="group">
                    <a href="{{route('editPostsClient',$item->slug_posts)}}" class="btn btn-outline-success btn-sm" style="width: auto;height: 32px">Sửa</a>
                    <a href="{{ route('deletePostlist', $item->slug_posts) }}" class="btn btn-outline-danger btn-sm" style="width: auto;height: 32px">Xóa</a>
                </div>
            </td>
        @else

            <td colspan="2" class="pt-4">
            <button type="submit" style="width: auto; height: 32px; background:#ff324d " class="badge border">Tạm ngưng hoạt động</button>
            </td>
            <td class="pt-4">
                <a href="#">
                    <button style="width: auto; height: 32px;" class="badge bg-success border ">Yêu cầu khôi phục</button>
                </a>
            </td>
        @endif
    </tr>
@endforeach