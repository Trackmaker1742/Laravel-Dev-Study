<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .info-row {
            margin: 15px 0;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        .label {
            font-weight: bold;
            color: #ffd700;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Về trang chủ</a>
    
    <div class="card">
        <h1>Thông tin sinh viên</h1>
        
        <div class="info-row">
            <span class="label">Họ và tên:</span> {{ $name }}
        </div>
        
        <div class="info-row">
            <span class="label">Mã số sinh viên:</span> {{ $mssv }}
        </div>
        
        <div class="info-row">
            <span class="label">Bài tập:</span> Lập trình Laravel
        </div>
    </div>
</body>
</html>
