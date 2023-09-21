@foreach($list as $item )
    <tr>
        <td><span
                class="badge {{$item['id_category']==1 ? 'bg-success' : 'bg-danger'}}">{{$item['id_category']==1 ? 'Nạp tiền' : 'Rút tiền'}}</span>
        </td>
        <td>{{$item['email']}}</td>
        <td>{{$item['date_input']}}</td>
        <td>{{$item['id_category']==1 ? '+' : '-'}} {{number_format($item['price'])}} VND</td>
        <td>{{number_format($item['surplus'])}} VND</td>
        <td>{{$item['content'] ?? 'Không có'}}</td>
        <td></td>
    </tr>
@endforeach
