<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập tuổi</title>
</head>
<body>
    <h1>Nhập tuổi</h1>
    <form method="POST" action="{{ route('age.store') }}">
        @csrf
        <label for="age">Tuổi:</label>
        <input type="text" id="age" name="age" required>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
