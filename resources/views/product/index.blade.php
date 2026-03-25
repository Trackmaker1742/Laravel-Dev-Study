<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            margin-right: 5px;
        }
        .btn-primary {
            background: #007bff;
            padding: 10px 20px;
            margin-bottom: 20px;
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
        .btn-detail {
            background: #17a2b8;
        }
        .btn-detail:hover {
            background: #138496;
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
        .badge {
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
        }
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .no-products {
            padding: 20px;
            text-align: center;
            background: #f9f9f9;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Về trang chủ</a>
    
    <h1>{{ $title }}</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if($products->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>SKU</th>
                    <th>Giá</th>
                    <th>Giá sale</th>
                    <th>Tồn kho</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ? $product->category->name : 'Không có' }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ number_format($product->price, 2) }} VND</td>
                        <td>{{ $product->sale_price ? number_format($product->sale_price, 2) : '-' }} VND</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if($product->is_active)
                                <span class="badge badge-success">Đang bán</span>
                            @else
                                <span class="badge badge-danger">Ngừng bán</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product.detail', $product->id) }}" class="btn btn-detail">Chi tiết</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">Sửa</a>
                            <form method="POST" action="{{ route('product.destroy', $product->id) }}" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $products->links() }}
        </div>
    @else
        <div class="no-products">
            <p>Không có sản phẩm nào.</p>
        </div>
    @endif
    
    <a href="{{ route('product.add') }}" class="btn btn-primary">Thêm sản phẩm mới</a>
</body>
</html>
