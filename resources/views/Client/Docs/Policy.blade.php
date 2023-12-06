@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Chính sách bảo mật";
@endphp
@section('main')
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>

    <div class="container">
        <br/>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">1. Giới Thiệu</button>

                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">2. Thu thập thông tin</button>

                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">3. Mục đích thu thập</button>

                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">4. Độ chính xác và bảo mật</button>

                <button class="nav-link" id="tab" data-bs-toggle="tab" data-bs-target="#nav" type="button" role="tab" aria-controls="nav" aria-selected="false">5. Cam kết của chúng tôi</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="text-center">
                    <h1>1. Giới thiệu về Chính sách bảo mật thông tin</h1>
                    <pre></pre>
                    <h6>CHÍNH SÁCH BẢO MẬT THÔNG TIN </h6>
                    <p>Có hiệu lực từ ngày 01/6/2023</p>
                </div>

                <div class="card-body">
                    <p style="color: #0a0e14">
                        Chính sách Bảo mật này (cùng với bất kỳ điều khoản hợp đồng nào khác áp dụng giữa Bạn và Chúng tôi) quy định cách
                        Chúng tôi sử dụng, tiết lộ hoặc và xử lý Thông tin (bao gồm cả Dữ Liệu Cá Nhân) mà Chúng tôi thu thập từ Bạn hoặc Bạn
                        cung cấp cho Chúng tôi. Chính sách Bảo mật này cũng đưa ra các loại Thông tin, Dữ Liệu Cá Nhân mà Chúng tôi thu thập,

                        cách Chúng tôi giữ an toàn, cũng như cách Bạn có thể truy cập hoặc thay đổi Thông tin, Dữ Liệu Cá Nhân của Bạn được lưu giữ bởi Chúng tôi. </p>

                    <p style="color: #0a0e14">
                        Vui lòng đọc kỹ để hiểu chính sách của Chúng tôi và áp dụng phù hợp liên quan đến Thông tin, Dữ Liệu Cá Nhân của
                        Bạn và cách mà Chúng tôi xử lý Thông tin, Dữ Liệu Cá Nhân. Chính sách bảo mật này gắn liền với các điều khoản sử dụng
                        dịch vụ và bất kỳ tài liệu nào khác áp dụng cho dịch vụ mà Bạn đang sử dụng. </p>

                    <p style="color: #0a0e14">
                        Trừ khi bị hạn chế bởi pháp luật Việt Nam, bằng các sử dụng, hoặc tương tác với Chúng tôi thông qua Website, Ứng dụng,
                        các trang mạng xã hội, các sản phẩm và/hoặc dịch vụ (sau đây gọi chung là “Dịch vụ”), bạn đồng ý rằng bất kỳ hoặc/và toàn
                        bộ Thông tin bao gồm cả Dữ Liệu Cá Nhân liên quan đến Bạn được Chúng tôi thu thập theo thời gian có thể được sử dụng, xử lý,

                        hoặc/và tiết lộ cho các mục đích và cho những người được đề cập trong Chính sách bảo mật này. </p>


                </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="text-center">
                    <h1>2. Thu thập thông tin, dữ liệu cá nhân</h1>
                    <pre></pre>
                </div>

                <div class="card-body">
                    <p style="color: #0a0e14">
                        Khi Bạn sử dụng Dịch vụ của Chúng tôi, Chúng tôi thu thập nhiều thông tin khác nhau từ và liên quan về Bạn
                        , thiết bị và tương tác của Bạn với Dịch vụ (gọi chung là “Thông tin”). </p>

                    <p style="color: #0a0e14">
                        Dữ Liệu Cá Nhân là thông tin dưới dạng ký hiệu, chữ viết, chữ số, hình ảnh, âm thanh hoặc dạng tương tự trên
                        môi trường điện tử gắn liền với một con người cụ thể hoặc giúp xác định một con người cụ thể. Theo đó, Dữ Liệu
                        Cá Nhân bao gồm dữ liệu cá nhân và các thông tin khác giúp xác định một con người cụ thể là thông tin hình thành
                        từ hoạt động của cá nhân mà khi kết hợp với các dữ liệu, thông tin lưu trữ khác có thể xác định một con người cụ
                        thể. Bất kỳ thông tin, dữ liệu nào, dù đúng hay không đúng về một cá nhân có thể nhận dạng cá nhân từ dữ liệu đó,
                        hoặc từ dữ liệu và các thông tin khác mà Chúng tôi có hoặc có khả năng có, được coi là Dữ Liệu Cá Nhân (“Dữ Liệu Cá Nhân”). </p>

                    <p style="color: #0a0e14">
                        Theo đó, trong toàn bộ các quy định và nội dung của Chính sách bảo mật thông tin này, Thông tin được đề cập
                        sẽ được hiểu bao gồm cả Thông tin và Dữ Liệu Cá Nhân của Bạn như được định nghĩa ở trên. </p>

                    <h5>2.1. Thông tin Bạn cung cấp</h5>

                    <p style="color: #0a0e14">
                        Chúng tôi thu thập Thông tin mà Bạn cung cấp cho Chúng tôi bao gồm nhưng không giới hạn ở họ tên, giới tính,
                        ngày sinh, email, mã số thuế, địa chỉ, điện thoại, nghề nghiệp, nơi làm việc và các thông tin cần thiết khác
                        theo quy định tại khoản 3 Điều 36 Nghị định 52/2013/NĐ-CP về thương mại điện tử, thông tin liên hệ, thông tin
                        thanh toán, thông tin tài chính, thông tin liên quan đến bất động sản, tài sản, sản phẩm và/hoặc dịch vụ mà Bạn quan tâm. </p>
                    <ul style="color: #0a0e14">
                        <li>Khi Bạn thực hiện giao dịch với Chúng tôi liên quan đến Dịch vụ.</li>
                        <li>Khi Bạn đăng ký tài khoản sử dụng Dịch vụ với Chúng tôi.</li>
                        <li>Khi Bạn liên lạc với bộ phận dịch vụ khách hàng hoặc bộ phận kinh doanh của Chúng tôi qua email, điện thoại, chat hoặc trực tiếp để giải quyết bất kỳ vấn đề nào mà bạn gặp phải hoặc yêu cầu khác của Bạn.</li>
                        <li>Khi Bạn đăng ký theo dõi Dịch vụ, nhận thông báo qua email, SMS, hoặc các bản tin mà Chúng tôi cung cấp.</li>
                        <li>Khi Bạn đăng nhập vào bất kỳ dịch vụ nào của Chúng tôi thông qua mạng xã hội như facebook, zalo, hoặc linkedin, hoặc nền tảng kỹ thuật số khác như Google hoặc Apple.</li>
                        <li>Khi Bạn hoàn thành các biểu mẫu
                    </ul>
                    <pre></pre>
                    <h5>2.2. Cookie, pixel và các cơ chế theo dõi khác</h5>

                    <p style="color: #0a0e14">
                        Chúng tôi và các đối tác của Chúng tôi sử dụng các công nghệ khác nhau để thu thập thông tin
                        tự động khi Bạn truy cập và sử dụng Dịch vụ của chúng tôi, bao gồm cookie và các công nghệ
                        tương tự khác. Cookie là các tệp được trang web người dùng truy cập tự động tạo ra, có thể
                        được chuyển đến máy tính hoặc thiết bị điện tử khác của Bạn để nhận dạng duy nhất trình duyệt
                        của Bạn. Khi Bạn sử dụng Dịch vụ, chúng tôi và các đối tác của Chúng tôi có thể đặt một hoặc
                        nhiều cookie trên máy tính của Bạn hoặc các thiết bị điện tử khác hoặc sử dụng các công nghệ
                        khác cung cấp chức năng tương tự. </p>

                    <ul style="color: #0a0e14">
                        <li>
                            Chúng tôi và các đối tác của Chúng tôi có thể sử dụng cookie để kết nối hoạt động của Bạn
                            trên Dịch vụ với thông tin khác mà Chúng tôi lưu trữ về Bạn trong hồ sơ tài khoản của Bạn
                            hoặc các tương tác trước đây của Bạn trên Dịch vụ của chúng tôi để lưu trữ tùy chọn của bạn
                            và các mục đích khác như được liệt kê tại Chính sách Bảo mật này. Việc sử dụng cookie giúp
                            Chúng tôi cải thiện chất lượng Dịch vụ của Chúng tôi cho Bạn, bằng cách xác định thông tin
                            thú vị nhất đối với Bạn, theo dõi xu hướng, đo lường hiệu quả của quảng cáo hoặc lưu trữ thông
                            tin Bạn có thể muốn truy xuất thường xuyên, chẳng hạn như thuộc tính trong danh sách rút gọn
                            hoặc tìm kiếm ưa thích của Bạn. Bất cứ lúc nào, bạn có thể điều chỉnh cài đặt trên trình duyệt
                            của mình để từ chối cookie theo hướng dẫn liên quan đến trình duyệt của Bạn. Tuy nhiên, nếu Bạn
                            chọn tắt cookie, nhiều tính năng miễn phí của Dịch vụ có thể không hoạt động bình thường.
                        </li>

                        <li>
                            Chúng tôi và các đối tác của Chúng tôi có thể sử dụng cookie để kết nối hoạt động của Bạn trên Dịch vụ
                            với thông tin khác mà Chúng tôi lưu trữ về Bạn trong hồ sơ tài khoản của Bạn hoặc các tương tác trước
                            đây của Bạn trên Dịch vụ của chúng tôi để lưu trữ tùy chọn của bạn và các mục đích khác như được liệt
                            kê tại Chính sách Bảo mật này. Việc sử dụng cookie giúp Chúng tôi cải thiện chất lượng Dịch vụ của Chúng
                            tôi cho Bạn, bằng cách xác định thông tin thú vị nhất đối với Bạn, theo dõi xu hướng, đo lường hiệu quả
                            của quảng cáo hoặc lưu trữ thông tin Bạn có thể muốn truy xuất thường xuyên, chẳng hạn như thuộc tính trong
                            danh sách rút gọn hoặc tìm kiếm ưa thích của Bạn. Bất cứ lúc nào, bạn có thể điều chỉnh cài đặt trên trình
                            duyệt của mình để từ chối cookie theo hướng dẫn liên quan đến trình duyệt của Bạn. Tuy nhiên, nếu Bạn chọn
                            tắt cookie, nhiều tính năng miễn phí của Dịch vụ có thể không hoạt động bình thường.
                        </li>

                        <li>
                            Chúng tôi cũng thu thập thông tin về máy tính hoặc thiết bị di động mà Bạn sử dụng để truy cập Dịch vụ của Chúng tôi,
                            chẳng hạn như kiểu phần cứng, hệ điều hành và phiên bản, số nhận dạng thiết bị duy nhất, thông tin mạng di động và hành
                            vi duyệt trang web.
                        </li>

                        <li>
                            Chúng tôi cũng cho phép một số bên thứ ba nhất định thu thập thông tin về các hoạt động trực tuyến của Bạn thông qua cookie
                            và các công nghệ khác khi Bạn sử dụng Website hoặc Ứng dụng. Các bên thứ ba này bao gồm (a) các đối tác kinh doanh, những
                            người thu thập thông tin khi Bạn xem hoặc tương tác với một trong các quảng cáo của họ trên Website hoặc Ứng dụng; và (b) mạng
                            quảng cáo, những người thu thập thông tin về sở thích của Bạn khi Bạn xem hoặc tương tác với một trong những quảng cáo mà họ đặt
                            trên nhiều trang web khác nhau trên Internet. Thông tin được thu thập bởi các bên thứ ba này là thông tin không thể nhận dạng cá
                            nhân, được sử dụng để đưa ra dự đoán về đặc điểm, sở thích hoặc sở thích của Bạn và để hiển thị quảng cáo trên Website, Ứng dụng
                            và trên mạng Internet phù hợp với sở thích của Bạn.
                        </li>

                        <li>
                            Bạn có thể quản lý loại cookie được phép thông qua cài đặt trình duyệt của mình, bao gồm chặn hoàn toàn tất cả cookie nếu bạn muốn.
                            Để biết thông tin về cách quản lý cookie trên trình duyệt của bạn, vui lòng xem phần trợ giúp của trình duyệt bạn đang sử dụng
                        </li>
                    </ul>
                    <pre></pre>
                    <h5> 2.3. Thông tin về thiết bị di động và trình duyệt di động </h5>
                    <p style="color: #0a0e14">
                        Bạn có thể điều chỉnh cài đặt trên thiết bị di động và trình duyệt di động của mình về cookie và chia sẻ một số thông tin
                        nhất định, chẳng hạn như kiểu thiết bị di động hoặc ngôn ngữ mà thiết bị di động của Bạn sử dụng, bằng cách điều chỉnh cài
                        đặt quyền riêng tư và bảo mật trên thiết bị di động của Bạn. Vui lòng tham khảo hướng dẫn do nhà cung cấp dịch vụ di động
                        hoặc nhà sản xuất thiết bị di động của Bạn cung cấp. </p>
                    <pre></pre>
                    <h5>2.4. Dữ liệu định vị</h5>
                    <p style="color: #0a0e14">
                        Nếu Bạn bật dịch vụ định vị trên thiết bị di động của mình, với sự cho phép của Bạn, Chúng tôi có thể thu thập vị trí thiết bị
                        của Bạn mà Chúng tôi sử dụng để cung cấp cho Bạn thông tin và quảng cáo dựa trên vị trí. Nếu Bạn muốn hủy tính năng này, bạn có
                        thể tắt dịch vụ định vị trên thiết bị di động của mình. </p>
                    <pre></pre>
                    <h5>2.5. Quản lý email</h5>
                    <p style="color: #0a0e14">
                        Bạn có thể nhận được email từ chúng tôi vì nhiều lý do khác nhau, ví dụ như khi Bạn thực hiện hành động thông qua Dịch vụ, Bạn
                        đăng ký báo cáo thường xuyên, hoặc đăng tin rao liên quan đến bất động sản của Bạn để bán hoặc cho thuê và người mua sẽ gửi tin
                        nhắn cho Bạn. Nếu Bạn có tài khoản với Chúng tôi, Bạn có thể chỉnh sửa tùy chọn của mình thông qua cài đặt tài khoản. Ngoài ra,
                        bạn có thể quản lý việc nhận một số loại thông tin liên lạc bằng cách làm theo các hướng dẫn có trong email Chúng tôi gửi cho Bạn.
                        Xin lưu ý rằng, ngay cả khi Bạn hủy đăng ký nhận một số thư từ email nhất định, Chúng tôi vẫn có thể cần gửi email cho Bạn về thông
                        tin giao dịch hoặc quản trị quan trọng. </p>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <div class="text-center">
                    <h1>3. Mục đích thu thập, sử dụng và tiết lộ</h1>
                    <pre></pre>
                </div>

                <div class="card-body">
                    <p style="color: #0a0e14">
                        3.1. Chúng tôi (bao gồm các công ty trong Tập đoàn và các chi nhánh của Chúng tôi) có thể thu thập, sử dụng,
                        tiết lộ và/hoặc xử lý Thông tin của Bạn (hoặc để Thông tin của Bạn được xử lý bởi các bên thứ ba (chẳng hạn
                        như Google Analytics) thay mặt Chúng tôi) cho các mục đích sau: </p>

                    <h5>(a) Khi Bạn với bất kỳ khả năng nào sử dụng Dịch vụ, Chúng tôi có thể xử lý Thông tin của Bạn để:</h5>

                    <ul style="color: #0a0e14">
                        <li>cung cấp, vận hành và quản lý Dịch vụ;</li>
                        <li>cải thiện trải nghiệm người dùng bằng cách cá nhân hóa Dịch vụ;</li>
                        <li>xác minh danh tính của Bạn khi Bạn đăng ký hoặc đăng nhập vào Dịch vụ của Chúng tôi, tạo, quản trị và cập nhật tài khoản của Bạn và để cho phép Bạn sử dụng Dịch vụ;</li>
                        <li>trả lời các câu hỏi hoặc yêu cầu của Bạn và thực hiện hành động tiếp theo đối với các khiếu nại hoặc phản hồi liên quan đến việc sử dụng Dịch vụ;</li>
                        <li>gửi cho Bạn thông tin liên lạc qua bất kỳ kênh liên lạc nào, bao gồm nhưng không giới hạn ở email, cuộc gọi thoại, tin nhắn và thông báo ứng dụng, bao gồm cho các mục đích tiếp thị khi chúng tôi đã nhận được sự đồng ý của Bạn;.</li>
                        <li>tạo điều kiện thuận lợi cho kết nối của Bạn với những người dùng khác, bao gồm đại lý, nhà thầu và các bên thứ ba khác thông qua Dịch vụ của chúng tôi;</li>
                        <li>cung cấp, vận hành và quản lý Dịch vụ;</li>
                        <li>cải thiện trải nghiệm người dùng bằng cách cá nhân hóa Dịch vụ;</li>
                        <li>thực hiện và điều hành các vấn đề về hành chính văn phòng;</li>
                        <li>tiến hành phân tích dữ liệu, nghiên cứu, thử nghiệm, giám sát, phân tích việc sử dụng và xu hướng, phát triển các sản phẩm và dịch vụ mới, cải thiện các sản phẩm và dịch vụ hiện có;</li>
                        <li>tạo điều kiện cho Bạn tham gia vào các tính năng tương tác của Dịch vụ của chúng tôi, khi Bạn lựa chọn và đồng ý;</li>
                        <li>thực hiện nghĩa vụ của Chúng tôi hoặc thực thi các quyền của Chúng tôi phát sinh từ bất kỳ hợp đồng nào được ký kết giữa Bạn và Chúng tôi và tham gia vào bất kỳ thủ tục tố tụng pháp lý nào;</li>
                        <li>thông báo cho Bạn về những thay đổi đối với các sản phẩm và dịch vụ của Chúng tôi;</li>
                    </ul>
                    <pre></pre>
                    <h5>(b) Khi Bạn sử dụng Dịch vụ với tư cách là bên thứ ba cung cấp Dịch vụ ("Đối tác Dịch vụ"), Chúng tôi có thể xử lý Thông tin của Bạn để:</h5>

                    <ul style="color: #0a0e14">
                        <li>
                            xem xét thông tin mà Bạn cung cấp để đánh giá rằng Bạn có phù hợp với vị trí mà Công ty đang tuyển dụng hoặc cho
                            bất kỳ vị trí nào khác công ty sẽ tuyển dụng trong tương lai;
                        </li>

                        <li>
                            trả lời Bạn trong trường hợp bạn sẽ ứng tuyển vào bất kỳ vị trí nào mà chúng tôi sẽ tuyển dụng trong tương lai;
                        </li>

                        <li>
                            tạo điều kiện thuận lợi cho việc thực hiện các cuộc phỏng vấn và/ hoặc các chuyến thăm của Bạn đến các văn phòng/ trụ sở làm việc của chúng tôi;
                        </li>

                        <li>
                            liên hệ với người giới thiệu Bạn với chúng tôi để thu thập thông tin mà Bạn đã đồng ý cho chúng tôi thu thập để xem xét và đánh giá mức độ phù hợp của Bạn với các cơ hội việc làm của Chúng tôi.
                        </li>
                    </ul>

                    <pre></pre>
                    <h5> 3.2. Mục đích khác </h5>
                    <p style="color: #0a0e14">
                        Vì các mục đích mà chúng tôi có thể/sẽ thu thập, sử dụng, tiết lộ và/hoặc xử lý Thông tin của Bạn tùy thuộc vào hoàn cảnh hiện tại,
                        mục đích đó có thể không xuất hiện ở trên. Tuy nhiên, Chúng tôi sẽ thông báo cho Bạn về mục đích khác tại thời điểm nhận được sự
                        đồng ý của Bạn, trừ khi việc xử lý Thông tin của Bạn mà không cần sự đồng ý của Bạn theo quy định hiện hành của pháp luật Việt Nam. </p>

                    <pre></pre>
                    <h5>3.3. Không nhận cuộc gọi quảng cáo</h5>
                    <p style="color: #0a0e14">
                        Nếu bạn đã cung cấp cho Chúng tôi (các) số điện thoại của bạn và cho biết rằng Bạn đồng ý nhận thông tin tiếp thị hoặc quảng cáo
                        khác qua các số điện thoại của Bạn, thì tùy từng thời điểm, Chúng tôi có thể liên hệ với Bạn bằng các số điện thoại đó với thông
                        tin về Dịch vụ của chúng tôi ngay cả khi những số điện thoại này được đăng ký với Cơ quan đăng ký nhà nước có thẩm quyền. Tuy nhiên,
                        bạn có thể thông báo bằng văn bản nếu bạn không muốn chúng tôi liên hệ theo số điện thoại của bạn cho các mục đích đó. </p>
                    <p style="color: #0a0e14">
                        3.4. Nếu không có sự đồng ý rõ ràng của Bạn, Chúng tôi sẽ không tiết lộ Thông tin của Bạn cho các bên thứ ba cho các mục đích tiếp
                        thị trực tiếp. Sự đồng ý tiết lộ Thông tin của Bạn cho bên thứ ba, nhằm mục đích nhận thông tin tiếp thị, được đưa ra thông qua biểu
                        mẫu đăng ký của chúng tôi, trực tuyến hoặc trên giấy. </p>
                </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="text-center">
                    <h1>4. Độ chính xác và bảo mật</h1>
                    <pre></pre>
                </div>

                <div class="card-body">
                    <p style="color: #0a0e14">
                        4.1. Bạn nên đảm bảo rằng tất cả Thông tin của Bạn được gửi cho chúng tôi là đầy đủ, chính xác, đúng sự thật
                        và hợp lệ. Việc Bạn không làm như vậy có thể dẫn đến việc chúng tôi không thể cung cấp cho bạn Dịch vụ mà Bạn đã yêu cầu. </p>

                    <p style="color: #0a0e14">
                        Dữ Liệu Cá Nhân là thông tin dưới dạng ký hiệu, chữ viết, chữ số, hình ảnh, âm thanh hoặc dạng tương tự trên
                        môi trường điện tử gắn liền với một con người cụ thể hoặc giúp xác định một con người cụ thể. Theo đó, Dữ Liệu
                        Cá Nhân bao gồm dữ liệu cá nhân và các thông tin khác giúp xác định một con người cụ thể là thông tin hình thành
                        từ hoạt động của cá nhân mà khi kết hợp với các dữ liệu, thông tin lưu trữ khác có thể xác định một con người cụ
                        thể. Bất kỳ thông tin, dữ liệu nào, dù đúng hay không đúng về một cá nhân có thể nhận dạng cá nhân từ dữ liệu đó,
                        hoặc từ dữ liệu và các thông tin khác mà Chúng tôi có hoặc có khả năng có, được coi là Dữ Liệu Cá Nhân (“Dữ Liệu Cá Nhân”). </p>

                    <p style="color: #0a0e14">
                        Theo đó, trong toàn bộ các quy định và nội dung của Chính sách bảo mật thông tin này, Thông tin được đề cập
                        sẽ được hiểu bao gồm cả Thông tin và Dữ Liệu Cá Nhân của Bạn như được định nghĩa ở trên. </p>

                    <p style="color: #0a0e14">
                        Chúng tôi thu thập Thông tin mà Bạn cung cấp cho Chúng tôi bao gồm nhưng không giới hạn ở họ tên, giới tính,
                        ngày sinh, email, mã số thuế, địa chỉ, điện thoại, nghề nghiệp, nơi làm việc và các thông tin cần thiết khác
                        theo quy định tại khoản 3 Điều 36 Nghị định 52/2013/NĐ-CP về thương mại điện tử, thông tin liên hệ, thông tin
                        thanh toán, thông tin tài chính, thông tin liên quan đến bất động sản, tài sản, sản phẩm và/hoặc dịch vụ mà Bạn quan tâm. </p>

                    <p style="color: #0a0e14">
                        4.5. Tuy nhiên, Bạn hiểu rằng việc truyền tải thông tin qua mạng Internet không hoàn toàn an toàn. Mặc dù Chúng
                        tôi sẽ cố gắng hết sức để bảo vệ Thông tin của Bạn, tuy nhiên Chúng tôi không thể đảm bảo tính bảo mật của Thông
                        tin của Bạn được truyền đến, bởi hoặc thông qua Website hoặc Ứng dụng, Bất kỳ sự truyền tải nào đều có nguy cơ
                        của riêng Bạn. Ngoài ra, Chúng tôi không chịu trách nhiệm về bất kỳ việc sử dụng trái phép Thông tin của Bạn bởi
                        các bên thứ ba khác do các yếu tố ngoài tầm kiểm soát của Chúng tôi. </p>

                    <p style="color: #0a0e14">
                        4.6. Khi chúng tôi đã cung cấp cho bạn (hoặc nơi bạn đã chọn) mật khẩu cho phép bạn truy cập một số phần nhất định
                        của Dịch vụ, bạn có trách nhiệm giữ bí mật mật khẩu này. Chúng tôi yêu cầu bạn không chia sẻ mật khẩu với bất kỳ ai.
                        Chúng tôi sẽ KHÔNG BAO GIỜ yêu cầu bạn cung cấp mật khẩu của Bạn trừ khi bạn đăng nhập vào Dịch vụ của Chúng tôi. </p>

                    <p style="color: #0a0e14">
                        4.7. Chúng tôi khuyên bạn nên thực hiện các bước để giữ an toàn cho Thông tin của mình, chẳng hạn như chọn mật khẩu
                        mạnh và giữ riêng tư, cũng như đăng xuất khỏi tài khoản người dùng và đóng trình duyệt web ngay sau khi bạn sử dụng
                        xong Dịch vụ của Chúng tôi trên thiết bị dùng chung hoặc không bảo mật. </p>
                </div>
            </div>

            <div class="tab-pane fade" id="nav" role="tabpanel" aria-labelledby="tab" tabindex="0">
                <div class="text-center">
                    <h1>5. Cam kết của chúng tôi</h1>
                    <pre></pre>
                </div>

                <div class="card-body">
                    <p style="color: #0a0e14">
                        Chúng tôi cam kết sẽ bảo mật các Thông tin của Bạn, nỗ lực và sử dụng các biện pháp thích hợp để bảo mật các
                        Thông tin mà Bạn cung cấp cho Chúng tôi trong quá trình sử dụng Dịch vụ. </p>

                    <p style="color: #0a0e14">
                        Chúng tôi không bán, chuyển giao Thông tin cho bên thứ ba, khi chưa được sự cho phép của Bạn ngoại trừ trường
                        hợp theo yêu cầu cung cấp Thông tin của cơ quan nhà nước có thẩm quyền bằng văn bản hoặc pháp luật có quy định khác. </p>

                    <p style="color: #0a0e14">
                        Trong trường hợp máy chủ lưu trữ Thông tin bị tấn công dẫn đến mất dữ liệu, Chúng tôi sẽ có trách nhiệm thông
                        báo vụ việc cho cơ quan có thẩm quyền điều tra xử lý kịp thời và thông báo cho Bạn được biết. </p>

                    <p style="color: #0a0e14">
                        Nếu xét thấy Thông tin của Bạn cung cấp cho Chúng tôi là không chính xác, Chúng tôi sẽ tiến hành hủy toàn bộ những
                        nội dung của Bạn được đăng tải trên Website và Ứng dụng. </p>

                    <p style="color: #0a0e14">
                        Chúng tôi không chịu trách nhiệm về bất kỳ việc Bạn tự nguyện tiết lộ Thông tin của mình cho những người dùng khác
                        liên quan đến việc sử dụng Dịch vụ. </p>

                    <p style="color: #0a0e14">
                        Chúng tôi cũng không chịu trách nhiệm giải quyết trong trường hợp thông báo của Bạn không đến được Chúng tôi, hoặc các
                        lỗi phát sinh từ kỹ thuật, đường truyền, phần mềm hoặc các lỗi khác không do lỗi của Chúng tôi. </p>

                    <p style="color: #0a0e14">
                        Nếu bạn cần thêm thông tin về việc Chúng tôi xử lý Thông tin của Bạn, vui lòng liên hệ với Cán bộ Bảo vệ Dữ liệu của Chúng tôi theo
                        email sau: htai67934@mail.com. </p>
                </div>
            </div>
        </div>
    </div>

@endsection
