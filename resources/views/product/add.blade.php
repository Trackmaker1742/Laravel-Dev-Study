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
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
    </style>
</head>
<body>
    <a href="{{ route('product.index') }}" class="back-link">← Về danh sách sản phẩm</a>
    
    <h1>Thêm sản phẩm mới</h1>
    
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="stock">Số lượng tồn kho:</label>
            <input type="number" id="stock" name="stock" required>
        </div>
        
        <button type="submit" class="btn">Thêm sản phẩm</button>
    </form>
</body>
</html>
