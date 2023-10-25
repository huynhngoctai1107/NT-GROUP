

@foreach($list as $item )
    <tr>
        <td><span class="badge {{$item->id_category_transaction == 2 ? 'bg-success' : 'bg-danger'}}">{{$item->name}}</span></td>
        <td>{{$item->fullname}}</td>
        <td>{{$item->phone ?? 'Không có'}}</td>
        <td>{{number_format($item->price)}} Đ</td>
        <td>{{number_format($item->surplus)}} Đ</td>
        <td>{{$item->content ?? 'Không có'}}</td>
        <td>{{$item->created_at}}</td>
    </tr>
@endforeach



{{--"id" => 2--}}
{{--"id_category_transaction" => 2--}}
{{--"id_user" => 2--}}
{{--"created_at" => "2023-10-24 00:00:00"--}}
{{--"updated_at" => "2023-10-25 13:35:02"--}}
{{--"surplus" => 100000--}}
{{--"voucher" => ""--}}
{{--"price" => -50000--}}
{{--"status" => 1--}}
{{--"content" => "Giao dịch thành công"--}}
{{--"name" => "Mua tin vip"--}}
{{--"slug" => "mua-tip-vip"--}}
{{--"note" => ""--}}
{{--"id_role" => 3--}}
{{--"social_id" => 0--}}
{{--"image" => "1698215702.jpg"--}}
{{--"fullname" => "Nguyễn Minh Nhi"--}}
{{--"email" => "nhi@gmail.com"--}}
{{--"phone" => "0948585965"--}}
{{--"address" => "Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ"--}}
{{--"password" => "$2y$10$pSd.OtXbsoX4EXpVfAOo/edxSfbiRm5SoNgEkAM0MDeDowCt79YKC"--}}
{{--"wallet" => 0--}}
{{--"token" => "0BO8G2IJGB"--}}
{{--"gender" => "Nữ"--}}
{{--"remember_token" => null--}}