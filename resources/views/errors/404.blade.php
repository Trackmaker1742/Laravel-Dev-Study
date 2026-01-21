<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .error-container {
            text-align: center;
            padding: 40px;
        }
        .error-code {
            font-size: 120px;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        h1 {
            font-size: 36px;
            margin: 20px 0;
        }
        p {
            font-size: 18px;
            margin: 20px 0;
            opacity: 0.9;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h1>Oops! Page Not Found</h1>
        <p>The page you are looking for doesn't exist or has been moved.</p>
        <a href="/" class="btn">Go Back Home</a>
    </div>
</body>
</html>
