<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-info {
            flex-grow: 1;
        }
        .product-card h2 {
            margin-top: 0;
            color: #007bff;
        }
        .product-actions {
            display: flex;
            gap: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            background: #218838;
        }
        .btn-primary {
            background: #007bff;
            padding: 10px 20px;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .btn-edit {
            background: #ffc107;
            color: black;
        }
        .btn-edit:hover {
            background: #e0a800;
        }
        .btn-delete {
            background: #dc3545;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .delete-form {
            display: inline;
        }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Về trang chủ</a>
    
    <h1>{{ $title }}</h1>
    
    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="product-card">
                <div class="product-info">
                    <h2>{{ $product['name'] }}</h2>
                    <p><strong>Giá:</strong> {{ number_format($product['price'], 2) }} VND</p>
                    <p><strong>Mô tả:</strong> {{ $product['description'] ?? 'N/A' }}</p>
                    <p><strong>Tình trạng:</strong> <span style="padding: 3px 8px; border-radius: 3px; background: {{ $product['status'] === 'Còn hàng' ? '#d4edda' : '#f8d7da' }}; color: {{ $product['status'] === 'Còn hàng' ? '#155724' : '#721c24' }};">{{ $product['status'] ?? 'N/A' }}</span></p>
                    <p><strong>ID:</strong> {{ $product['id'] }}</p>
                </div>
                <div class="product-actions">
                    <a href="{{ route('product.edit', $product['id']) }}" class="btn btn-edit">Chỉnh sửa</a>
                    <form method="POST" action="{{ route('product.destroy', $product['id']) }}" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Xóa</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <p>Không có sản phẩm nào.</p>
    @endif
    
    <a href="{{ route('product.add') }}" class="btn btn-primary">Thêm sản phẩm mới</a>
</body>
</html>
