<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: #f5f5f5;
        }
        .register {
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #45a049;
        }
        .error-msg {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register">
        <h1>Tạo tài khoản</h1>
        
        @if ($message = session('msg'))
            <div class="error-msg">{{ $message }}</div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required value="{{ old('username') }}">
            </div>
            
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="repass">Xác nhận mật khẩu:</label>
                <input type="password" id="repass" name="repass" required>
            </div>
            
            <div class="form-group">
                <label for="mssv">MSSV (Mã số sinh viên):</label>
                <input type="text" id="mssv" name="mssv" required value="{{ old('mssv') }}">
            </div>
            
            <div class="form-group">
                <label for="lopmonhoc">Lớp môn học:</label>
                <input type="text" id="lopmonhoc" name="lopmonhoc" value="{{ old('lopmonhoc') }}">
            </div>
            
            <div class="form-group">
                <label for="gioitinh">Giới tính:</label>
                <select id="gioitinh" name="gioitinh">
                    <option value="">Chọn giới tính</option>
                    <option value="Nam" {{ old('gioitinh') === 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ old('gioitinh') === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    <option value="Khác" {{ old('gioitinh') === 'Khác' ? 'selected' : '' }}>Khác</option>
                </select>
            </div>
            
            <button type="submit">Tạo tài khoản</button>
        </form>
        
        <div class="login-link">
            Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập tại đây</a>
        </div>
    </div>
</body>
</html>
