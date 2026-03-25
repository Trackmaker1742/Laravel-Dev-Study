<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .btn-cancel {
            background: #6c757d;
            text-decoration: none;
            display: inline-block;
        }
        .btn-cancel:hover {
            background: #5a6268;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 3px;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .form-row .form-group {
            margin-bottom: 0;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin: 0;
        }
    </style>
</head>
<body>
    <a href="{{ route('product.index') }}" class="back-link">← Về danh sách sản phẩm</a>
    
    <h1>Thêm sản phẩm mới</h1>
    
    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">
            <strong>Lỗi xác thực:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Tên sản phẩm: <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="sku">SKU: <span style="color: red;">*</span></label>
                <input type="text" id="sku" name="sku" value="{{ old('sku') }}" required>
                @error('sku') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="category_id">Danh mục (Quản lý Sản phẩm):</label>
                <select id="category_id" name="category_id">
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="price">Giá: <span style="color: red;">*</span></label>
                <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" min="0" required>
                @error('price') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="sale_price">Giá sale:</label>
                <input type="number" id="sale_price" name="sale_price" step="0.01" value="{{ old('sale_price') }}" min="0">
                @error('sale_price') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="stock">Số lượng tồn kho: <span style="color: red;">*</span></label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0" required>
            @error('stock') <div class="error-message">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description') <div class="error-message">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label for="image">Ảnh sản phẩm:</label>
            <input type="file" id="image" name="image" accept="image/*">
            @error('image') <div class="error-message">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active" style="margin-bottom: 0;">Kích hoạt (Đang bán)</label>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn">Thêm sản phẩm</button>
            <a href="{{ route('product.index') }}" class="btn btn-cancel">Hủy</a>
        </div>
    </form>
</body>
</html>
