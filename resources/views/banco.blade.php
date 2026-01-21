<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn cờ vua {{ $n }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f0f0f0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .table-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #e9ecef;
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
    <a href="/" class="back-link">← Về Trang Chủ</a>
    
    <div class="table-container">
        <h1>Bàn cờ {{ $n }} x {{ $n }}</h1>
        
        <table>
            <thead>
                <tr>
                    <th>×</th>
                    @for ($i = 1; $i <= $n; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $n; $i++)
                    <tr>
                        <th>{{ $i }}</th>
                        @for ($j = 1; $j <= $n; $j++)
                            <td>{{ $i * $j }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>
