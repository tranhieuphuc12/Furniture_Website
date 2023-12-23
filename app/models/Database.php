<?php
class Database
{
    public static $connection = NULL;
    
    // 1. Tạo kết nối 
    public function __construct() {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
            self::$connection->set_charset('utf8mb4');
        }
    }

    // Lấy dữ liệu (select)
    public function select($sql){
        $items = [];
        // 3. Thực thi câu sql
        $sql->execute();

        // 4. Xử lý kết quả trả về
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); // Lấy kết quả từ câu sql đổ về mảng items dưới dạng associative array
        return $items;
    }
}
 