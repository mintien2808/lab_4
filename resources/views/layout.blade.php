<!-- resources/views/products_and_categories.blade.php -->
dd($categories);
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục và Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Danh Mục và Sản Phẩm</h1>

        <!-- Danh Mục -->
        <div class="container mt-4">
            <h1>Danh Mục</h1>
    
    
            <a href="" class="btn btn-primary mb-3">Tạo Danh Mục Mới</a>
    
            {{-- <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        {{ $category->name }}
                        <a href="" class="btn btn-warning btn-sm float-end ms-2">Sửa</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-end">Xóa</button>
                        </form>
                    </li>
                @endforeach
            </ul> --}}
        </div>

        <hr>

        
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
