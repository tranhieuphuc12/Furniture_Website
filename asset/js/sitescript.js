
// // AJAX
// function getProductsByOrderId(orderId) {
    
//     // Gửi yêu cầu AJAX
//     $.ajax({
//         url: 'add_to_cart.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
//         method: 'POST',
//         data: { orderId: orderId}, // Dữ liệu gửi đi
//         success: function(response) {
//             // Hiển thị kết quả trả về từ máy chủ
//            console.log(response);
//         }
//     });

// }
// const btnAll = document.querySelectorAll('.btn-view');
// btnAll.forEach(element => {
//    // getProductsByOrderId(element.value);
//     // console.log(element.value);
//     element.addEventListener('click', function() {
//         console.log("hello");
//         // getProductsByOrderId(element.value);
//     })
// });

// AJAX
function sendData() {
    // Lấy giá trị từ ô nhập liệu
    let productId = $('#dataInput').val();
    let quantity = $('#quantity').val();
    let price = $('#price').val();
    // Gửi yêu cầu AJAX
    $.ajax({
        url: 'add_to_cart.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
        method: 'POST',
        data: { productId: productId, quantity: quantity, price:price }, // Dữ liệu gửi đi
        success: function(response) {
            // Hiển thị kết quả trả về từ máy chủ
            $('#result').html(response);
        }
    });
    
}
