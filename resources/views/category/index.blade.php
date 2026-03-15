<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
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
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table thead {
            background: #f0f0f0;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            font-weight: bold;
            color: #333;
        }
        table tr:hover {
            background: #f9f9f9;
        }
        .btn-sm {
            display: inline-block;
            padding: 8px 12px;
            font-size: 12px;
            margin-right: 5px;
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
        .status-badge {
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-active {
            background: #d4edda;
            color: #155724;
        }
        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
        .delete-form {
            display: inline;
        }
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Về trang chủ</a>
    
    <h1>Quản lý danh mục</h1>
    
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    
    <a href="{{ route('category.create') }}" class="btn">Thêm danh mục mới</a>
    
    @if(count($categories) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Danh mục cha</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::limit($category->description, 50) }}</td>
                        <td>
                            @if($category->parent)
                                {{ $category->parent->name }}
                            @else
                                <em>Không</em>
                            @endif
                        </td>
                        <td>
                            <span class="status-badge {{ $category->is_active ? 'status-active' : 'status-inactive' }}">
                                {{ $category->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-edit">Sửa</a>
                            <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">Không có danh mục nào</div>
    @endif
</body>
</html>
