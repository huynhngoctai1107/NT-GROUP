

@foreach($list as $item )
    <tr>
        <td><span class="badge {{$item->id_category_transaction == 1 ? 'bg-success' : 'bg-danger'}}">{{$item->name}}</span></td>
        <td>{{$item->fullname}}</td>
        <td>{{$item->phone ?? 'Không có'}}</td>
        <td>{{number_format($item->price)}} Đ</td>
        <td>{{number_format($item->surplus)}} Đ</td>
        <td>{{$item->content ?? 'Không có'}}</td>
        <td> {{date('d-m-Y',strtotime($item->created_at))}}</td>
    </tr>
@endforeach

 