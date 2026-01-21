<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .links a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Trang Home</h1>
    <p>Trang chủ app Laravel.</p>
    
    <div class="links">
        <a href="{{ route('product.index') }}">Xem sản phẩm</a>
        <a href="{{ route('product.add') }}">Thêm sản phẩm mới</a>
        <a href="/sinhvien/Nguyễn Hoàng Minh/0035467">Thông tin sinh viên</a>
        <a href="/banco/5">Bàn cờ vua (5x5)</a>
    </div>
</body>
</html>
