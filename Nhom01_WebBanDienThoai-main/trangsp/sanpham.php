<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Sidebar */
        .sidebar-box {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }
        .sidebar-box ul li a {
            text-decoration: none;
            color: #333;
        }
        .sidebar-box ul li {
            padding: 6px 0;
        }
        .sidebar-box ul li:hover a {
            color: #ff5722;
        }

        /* Product card */
        .product-card {
            border: 1px solid #eee;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.2s;
            background: #fff;
        }
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        }
        .product-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
            background: #fafafa;
        }
        .product-title {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            height: 40px;
        }
        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #ff3d00;
        }
        .tag-sale {
            position: absolute;
            background: #ff3d00;
            color: #fff;
            padding: 3px 6px;
            font-size: 12px;
            top: 10px;
            right: 10px;
            border-radius: 4px;
        }
        .tag-hot {
            font-size: 12px;
            padding: 3px 5px;
            background: #ff9800;
            color: #fff;
            border-radius: 4px;
        }

        /* Sort bar */
        .sort-bar button {
            border: 1px solid #ddd;
            background: #fff;
            padding: 6px 14px;
            border-radius: 6px;
        }
        .sort-bar button.active {
            background: #ff5722;
            color: #fff;
            border-color: #ff5722;
        }
    </style>
</head>

<body class="bg-light">

<div class="container py-4">

    <!-- Breadcrumb -->
    <div class="mb-3">
        <a href="index.php?act=view/home" class="text-decoration-none">Trang Chủ</a> /
        <a href="index.php?act=sanpham" class="text-decoration-none">Điện Thoại</a>
    </div>

    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-md-3 mb-4">
            <div class="sidebar-box">
                <h5><i class="fa-solid fa-list"></i> Tất Cả Danh Mục</h5>
                <ul class="list-unstyled">
                    <?php foreach ($listdm as $dm): ?>
                        <?php extract($dm); ?>
                        <li>
                            <a href="index.php?act=dmsp&iddm=<?= $id ?>"><?= $name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="col-md-9">

            <!-- SORT BAR -->
            <div class="sort-bar mb-3 d-flex gap-2">
                <button class="active">Phổ Biến</button>
                <button>Mới Nhất</button>
                <button>Bán Chạy</button>
                <button>Giá <i class="fa-solid fa-chevron-down"></i></button>
            </div>

            <!-- PRODUCT GRID -->
            <div class="row g-3">
                <?php foreach ($dssp as $sp): ?>
                    <div class="col-md-4 col-6">
                        <div class="product-card position-relative">

                            <?php if (!empty($sp['img'])): ?>
                                <?php $linksp = "index.php?act=spct&idsp=" . $sp['id']; ?>
                                <a href="<?= $linksp ?>">
                                    <img src="view/images/<?= $sp['img'] ?>" class="product-img">
                                </a>
                            <?php endif; ?>

                            <span class="tag-sale">-15%</span>

                            <div class="p-2">
                                <div class="product-title"><?= $sp['name'] ?></div>

                                <div class="product-price">
                                    <?= number_format($sp['price'], 0, ',', '.') ?>đ
                                </div>

                                <div class="small text-secondary">
                                    Đã bán <?= rand(30, 500) ?>+
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>

</div>

</body>
</html>
