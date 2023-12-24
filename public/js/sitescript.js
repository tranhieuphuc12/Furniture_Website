// AJAX
function sendData() {
    // Lấy giá trị từ ô nhập liệu
    var inputData = $('#dataInput').val();

    // Gửi yêu cầu AJAX
    $.ajax({
        url: 'process_data.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
        method: 'POST',
        data: { inputData: inputData }, // Dữ liệu gửi đi
        success: function(response) {
            // Hiển thị kết quả trả về từ máy chủ
            $('#result').html(response);
        }
    });
}