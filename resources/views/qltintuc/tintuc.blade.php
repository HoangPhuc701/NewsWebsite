<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Tin Tức</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

{{-- <body class="p-3 m-0 border-0 bd-example m-0 border-0"> --}}
    <body>
    {{-- <div class="container mt-5">
        <h1 class="mb-4">Tin Tức</h1> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Tin Tức</a>
            </div>
        </nav>
        <div class="container mt-4">
        <?php
        foreach($formnguontintheloai as $cd)
        {        
        $rss_url = $cd->LinkNguon;
        
       
        // $rss_url = 'https://tuoitre.vn/rss/the-gioi.rss'; // Đường dẫn đến RSS feed của bạn

        $rss = simplexml_load_file($rss_url.'rss/thoi-su.rss');
        //dump($rss);
        if ($rss) {
            //echo '<a href="danhmuc?url='.$cd->LinkNguon.'rss" class="mb-4">'.$cd->TenNguon.'</a>';
            echo '<h1 class="mb-4"><a  href="danhmuc?url='.$cd->LinkNguon.'rss">'.$cd->TenNguon.'</a></h1>';
            echo '<div class="row">';
            $count = 0;

            foreach ($rss->channel->item as $item) {
                $title = $item->title;
                $description = $item->description;
                $link = $item->link;

                // Bắt đầu một cột mới sau khi hiển thị 3 tin
                if ($count % 3 == 0) {
                    if ($count > 0) {
                        echo '</div><div class="row">';
                    }
                }

                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $title . '</h5>';
                echo '<p class="card-text">' . $description . '</p>';
                echo '<a href="scrape-tuoitre?url='.$link.'" class="btn btn-primary">Đọc thêm</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                $count++;
                if ($count == 3) {
                break; // Kết thúc vòng lặp sau khi hiển thị 3 tin
            }
            }

            echo '</div>';
        } else {
            echo 'Không thể tải RSS feed.';
        }
    }
        ?>

    </div>
    {{-- <script>

$(document).ready(function () {
    // Sử dụng class "btn-primary" để bắt sự kiện click
    $(".btn-primary").click(function (e) {
        e.preventDefault(); // Ngăn chuyển hướng mặc định
        var source_url = $(this).data("href");

        // Sử dụng $.load để tải trang chitiettin.blade.php với tham số link
        $("#siteloader").load(source_url, function () {
            // Sau khi trang đã tải, lấy nội dung của thẻ div có class "main"
            var mainContent = $("#siteloader .main").html();

            // Làm bất kỳ điều gì bạn muốn với mainContent
            console.log("Nội dung của thẻ div có class 'main': " + mainContent);
            // Thực hiện xử lý dữ liệu ở đây
        });
    });
});
    </script> --}}

    <!-- Link to Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
