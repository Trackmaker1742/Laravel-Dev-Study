<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
        .container {
            background: white;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }
        .menu-section {
            margin-bottom: 25px;
        }
        .menu-section h2 {
            font-size: 14px;
            color: #555;
            text-transform: uppercase;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 8px;
            margin: 0 0 15px 0;
        }
        .menu-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .menu-links a {
            display: block;
            padding: 12px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            font-weight: bold;
            text-align: center;
            transition: background 0.3s;
        }
        .menu-links a:hover {
            background: #45a049;
        }
        .menu-links a.secondary {
            background: #2196F3;
        }
        .menu-links a.secondary:hover {
            background: #0b7dda;
        }
        .logout-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
        }
        .logout-form {
            display: inline-block;
            width: 100%;
        }
        .logout-form button {
            width: 100%;
            padding: 10px;
            background: #f44336;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        .logout-form button:hover {
            background: #da190b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trang chủ</h1>

        <div class="menu-section">
            <h2>Chức năng</h2>
            <div class="menu-links">
                <a href="{{ route('age.form') }}">Nhập tuổi & Xem sản phẩm</a>
                <a href="{{ route('product.index') }}" class="secondary">Xem sản phẩm</a>
            </div>
        </div>

        <div class="menu-section">
            <h2>Account</h2>
            <div class="menu-links">
                <a href="{{ route('login') }}" class="secondary">Login</a>
                <a href="{{ route('register.form') }}" class="secondary">Register</a>
            </div>
        </div>

        <div class="logout-section">
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
