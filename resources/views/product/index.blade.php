<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
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
        .product-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .product-card h2 {
            margin-top: 0;
            color: #007bff;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background: #218838;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Về trang chủ</a>
    
    <h1>{{ $title }}</h1>
    
    <!-- Sample Product -->
    <div class="product-card">
        <h2>Sản phẩm mẫu</h2>
        <p><strong>Giá:</strong> $99.99</p>
        <p><strong>Mô tả:</strong> Sản phẩm minh họa.</p>
        <p><strong>Tình trạng:</strong> Còn hàng</p>
    </div>
    
    <a href="{{ route('product.add') }}" class="btn">Thêm sản phẩm mới</a>
</body>
</html>
