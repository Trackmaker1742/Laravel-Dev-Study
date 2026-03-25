<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
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
        .detail-container {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .detail-row {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }
        .detail-label {
            font-weight: bold;
            color: #555;
        }
        .detail-value {
            color: #333;
        }
        .product-image {
            max-width: 300px;
            height: auto;
            border-radius: 5px;
            margin: 20px 0;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
        }
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin: 5px;
        }
        .btn-edit {
            background: #ffc107;
            color: black;
        }
        .btn-edit:hover {
            background: #e0a800;
        }
        .btn-back {
            background: #007bff;
        }
        .btn-back:hover {
            background: #0056b3;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .actions {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <a href="{{ route('product.index') }}" class="back-link">← Về danh sách sản phẩm</a>
    
    <h1>Chi tiết sản phẩm</h1>
    
    <div class="detail-container">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
        @else
            <div style="width: 300px; height: 300px; background: #ddd; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                <span style="color: #999;">Không có ảnh</span>
            </div>
        @endif
        
        <div class="detail-row">
            <div class="detail-label">Tên sản phẩm:</div>
            <div class="detail-value">{{ $product->name }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">SKU:</div>
            <div class="detail-value">{{ $product->sku }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Danh mục:</div>
            <div class="detail-value">{{ $product->category ? $product->category->name : 'Không có' }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Giá:</div>
            <div class="detail-value">{{ number_format($product->price, 2) }} VND</div>
        </div>
        
        @if($product->sale_price)
            <div class="detail-row">
                <div class="detail-label">Giá bán:</div>
                <div class="detail-value">{{ number_format($product->sale_price, 2) }} VND</div>
            </div>
        @endif
        
        <div class="detail-row">
            <div class="detail-label">Tồn kho:</div>
            <div class="detail-value">{{ $product->stock }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Trạng thái:</div>
            <div class="detail-value">
                @if($product->is_active)
                    <span class="badge badge-success">Đang bán</span>
                @else
                    <span class="badge badge-danger">Ngừng bán</span>
                @endif
            </div>
        </div>
        
        @if($product->description)
            <div class="detail-row">
                <div class="detail-label">Mô tả:</div>
                <div class="detail-value">{{ $product->description }}</div>
            </div>
        @endif
        
        <div class="detail-row">
            <div class="detail-label">Ngày tạo:</div>
            <div class="detail-value">{{ $product->created_at->format('d/m/Y H:i') }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Cập nhật lần cuối:</div>
            <div class="detail-value">{{ $product->updated_at->format('d/m/Y H:i') }}</div>
        </div>
        
        <div class="actions">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">Chỉnh sửa</a>
            <a href="{{ route('product.index') }}" class="btn btn-back">Quay lại</a>
        </div>
    </div>
</body>
</html>
