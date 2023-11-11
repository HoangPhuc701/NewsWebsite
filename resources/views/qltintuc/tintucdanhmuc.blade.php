<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Tin Tức</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- fb --}}
    <!-- Đoạn mã Facebook SDK -->
    {{-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=884092579988564" nonce="AA4osiPo"></script>

    <script>
        $(document).ready(function() {
            // Bắt sự kiện click vào nút "Đọc thêm"
            $(".btn-primary").click(function(e) {
                e.preventDefault(); // Ngăn chuyển hướng mặc định
                
                // Lấy URL của tin tức từ thuộc tính "data-url" của nút
                var articleUrl = $(this).data("url");
                
                // Thay đổi thuộc tính "data-href" của khung bình luận để hiển thị bình luận cho tin tức này
                $(".fb-comments").attr("data-href", articleUrl);
                
                // Tải lại plugin Facebook Comments
                FB.XFBML.parse();
            });
        });
    </script> --}}

</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <div class="container mt-5">
        <h1 class="mb-4">Tin Tức</h1>

        <?php
          
        $rss_url = $tin;
        $the=$thecontent;
        
       
        // $rss_url = 'https://tuoitre.vn/rss/the-gioi.rss'; // Đường dẫn đến RSS feed của bạn

        $rss = simplexml_load_file($rss_url);
        //dump($rss);
        if ($rss) {
            //echo '<h1 class="mb-4"><a  href="tindanhmuc?url='.$cd->LinkNguon.'rss">'.$cd->TenNguon.'</a></h1>';
            echo '<div class="container">';
        $count = 0;

        foreach ($rss->channel->item as $item) {
            $title = $item->title;
            $description = $item->description;
            $link = $item->link;

            // Bắt đầu một hàng mới sau khi hiển thị 3 tin
            if ($count % 3 == 0) {
                if ($count > 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            }

            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text">' . $description . '</p>';
            echo '<a href="scrape-tuoitre?url=' . $link . '&thecontent='.$the.'" class="btn btn-primary">Đọc thêm</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $count++;
        }

        echo '</div>'; // Đóng container

        } else {
            echo 'Không thể tải RSS feed.';
        }
        ?>

            
    </div>
   </body>
</html>
