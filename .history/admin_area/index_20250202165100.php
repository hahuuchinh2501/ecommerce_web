<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .admin_image {
        width: 100px;
        object-fit: contain;
    }

    .button-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* Khoảng cách giữa các nút */
        justify-content: center;
        width: 100%;
        padding: 10px 0;
    }

    .admin-button {
        flex: 1 1 200px; /* Chiều rộng tối thiểu 200px và mở rộng ra nếu đủ không gian */
        margin: 5px;
        padding: 10px;
        border-radius: 5px;
        transition: transform 0.3s, background-color 0.3s;
        font-weight: bold;
        text-align: center;
    }

    .admin-button a {
        text-decoration: none;
        color: white;
        display: block;
    }

    .admin-button:hover {
        transform: scale(1.05);
        background-color: #007bff;
    }

    .admin-button:active {
        transform: scale(0.95);
    }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/shop.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <div class="bg-light">
        <h3 class="text-center p-2">Manage details</h3>
    </div>

    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5 text-center">
                <a href="#"><img src="../images/shop.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin name</p>
            </div>
            <div class="button-group">
                <button class="admin-button bg-info"><a href="insert_product.php">Insert product</a></button>
                <button class="admin-button bg-info"><a href="">View product</a></button>
                <button class="admin-button bg-info"><a href="index.php?insert_category">Insert categories</a></button>
                <button class="admin-button bg-info"><a href="">View categories</a></button>
                <button class="admin-button bg-info"><a href="index.php?insert_brand">Insert brands</a></button>
                <button class="admin-button bg-info"><a href="">View brands</a></button>
                <button class="admin-button bg-info"><a href="">All orders</a></button>
                <button class="admin-button bg-info"><a href="">All payment</a></button>
                <button class="admin-button bg-info"><a href="">List user</a></button>
                <button class="admin-button bg-info"><a href="">Logout</a></button>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
