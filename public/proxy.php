<?php
// Đường dẫn đến tài nguyên trang web nguồn
// $source_url = "https://tuoitre.vn/du-an-cao-toc-bien-hoa-vung-tau-qua-dong-nai-dan-hoi-gia-den-bu-tai-dinh-cu-ra-sao-20231026120508382.htm";

// // Tải nội dung từ trang web nguồn
// $source_content = file_get_contents($source_url);

// // Trả về nội dung cho trình duyệt của bạn
// echo $source_content;



//news
if (isset($_GET['url'])) {
    // Lấy URL nguồn từ tham số truyền vào
    $source_url = $_GET['url'];

    // Kiểm tra xem URL hợp lệ
    if (filter_var($source_url, FILTER_VALIDATE_URL)) {
        // Tải nội dung từ URL nguồn
        $source_content = file_get_contents($source_url);

        // Trả về nội dung cho trình duyệt
        echo $source_content;
    } else {
        echo 'URL không hợp lệ.';
    }
} else {
    echo 'URL nguồn không được cung cấp.';
}


?> 

