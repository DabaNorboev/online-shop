<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин - Главная</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        /* Шапка */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4a90e2;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #4a90e2;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline {
            border: 1px solid #4a90e2;
            color: #4a90e2;
        }

        .btn-outline:hover {
            background-color: #4a90e2;
            color: white;
        }

        .btn-primary {
            background-color: #4a90e2;
            color: white;
            border: 1px solid #4a90e2;
        }

        .btn-primary:hover {
            background-color: #3a7bc8;
            border-color: #3a7bc8;
        }

        /* Герой-секция */
        .hero {
            background: linear-gradient(135deg, #4a90e2, #6a5acd);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Категории */
        .categories {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.8rem;
            color: #333;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .category-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-img {
            height: 160px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .category-info {
            padding: 1.5rem;
        }

        .category-info h3 {
            margin-bottom: 0.5rem;
        }

        /* Популярные товары */
        .featured-products {
            padding: 3rem 2rem;
            background-color: #f1f5f9;
        }

        .products-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            height: 200px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-info h3 {
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-weight: bold;
            color: #4a90e2;
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .product-rating {
            color: #ffc107;
            margin-bottom: 1rem;
        }

        .add-to-cart {
            width: 100%;
            padding: 0.5rem;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #3a7bc8;
        }

        /* Футер */
        footer {
            background-color: #2d3748;
            color: white;
            padding: 3rem 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-column h3 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 0.8rem;
        }

        .footer-column a {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid #4a5568;
            color: #a0aec0;
        }
    </style>
</head>
<body>
    <!-- Шапка -->
    <header>
        <nav class="navbar">
            <a href="/" class="logo">МойМагазин</a>

            <div class="nav-links">
                <a href="/">Главная</a>
                <a href="/catalog.html">Каталог</a>
                <a href="/about.html">О нас</a>
                <a href="/contacts.html">Контакты</a>
            </div>

            <div class="auth-buttons">
                <a href="/login.html" class="btn btn-outline">Войти</a>
                <a href="/register.html" class="btn btn-primary">Регистрация</a>
            </div>
        </nav>
    </header>

    <!-- Герой-секция -->
    <section class="hero">
        <div class="hero-content">
            <h1>Добро пожаловать в наш магазин</h1>
            <p>Лучшие товары по доступным ценам с быстрой доставкой по всей стране</p>
            <a href="/catalog.html" class="btn btn-primary" style="background-color: white; color: #4a90e2;">Перейти в каталог</a>
        </div>
    </section>

    <!-- Категории -->
    <section class="categories">
        <h2 class="section-title">Популярные категории</h2>

        <div class="category-grid">
            <!-- Пример категории 1 -->
            <div class="category-card">
                <div class="category-img">
                    <!-- Замените на реальное изображение -->
                    <img src="images/category1.jpg" alt="Электроника" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                </div>
                <div class="category-info">
                    <h3>Электроника</h3>
                    <p>Смартфоны, ноутбуки и планшеты</p>
                </div>
            </div>

            <!-- Пример категории 2 -->
            <div class="category-card">
                <div class="category-img">
                    <img src="images/category2.jpg" alt="Одежда" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                </div>
                <div class="category-info">
                    <h3>Одежда</h3>
                    <p>Мужская и женская одежда</p>
                </div>
            </div>

            <!-- Пример категории 3 -->
            <div class="category-card">
                <div class="category-img">
                    <img src="images/category3.jpg" alt="Для дома" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                </div>
                <div class="category-info">
                    <h3>Для дома</h3>
                    <p>Мебель и предметы интерьера</p>
                </div>
            </div>

            <!-- Пример категории 4 -->
            <div class="category-card">
                <div class="category-img">
                    <img src="images/category4.jpg" alt="Красота" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                </div>
                <div class="category-info">
                    <h3>Красота</h3>
                    <p>Косметика и уход</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Популярные товары -->
    <section class="featured-products">
        <div class="products-container">
            <h2 class="section-title">Популярные товары</h2>

            <div class="product-grid">
                <!-- Пример товара 1 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="images/product1.jpg" alt="Смартфон" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    </div>
                    <div class="product-info">
                        <h3>Смартфон XYZ 10 Pro</h3>
                        <div class="product-price">34 990 ₽</div>
                        <div class="product-rating">★★★★☆</div>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                </div>

                <!-- Пример товара 2 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="images/product2.jpg" alt="Ноутбук" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    </div>
                    <div class="product-info">
                        <h3>Ноутбук SuperBook</h3>
                        <div class="product-price">64 990 ₽</div>
                        <div class="product-rating">★★★★★</div>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                </div>

                <!-- Пример товара 3 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="images/product3.jpg" alt="Наушники" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    </div>
                    <div class="product-info">
                        <h3>Беспроводные наушники</h3>
                        <div class="product-price">8 490 ₽</div>
                        <div class="product-rating">★★★☆☆</div>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                </div>

                <!-- Пример товара 4 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="images/product4.jpg" alt="Часы" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    </div>
                    <div class="product-info">
                        <h3>Умные часы</h3>
                        <div class="product-price">12 990 ₽</div>
                        <div class="product-rating">★★★★☆</div>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Футер -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Магазин</h3>
                <ul>
                    <li><a href="/about.html">О нас</a></li>
                    <li><a href="/contacts.html">Контакты</a></li>
                    <li><a href="/blog.html">Блог</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Помощь</h3>
                <ul>
                    <li><a href="/faq.html">FAQ</a></li>
                    <li><a href="/shipping.html">Доставка</a></li>
                    <li><a href="/returns.html">Возврат</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Контакты</h3>
                <ul>
                    <li>Email: info@mymagazin.ru</li>
                    <li>Телефон: +7 (123) 456-78-90</li>
                    <li>Адрес: г. Москва, ул. Примерная, 123</li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            &copy; 2023 МойМагазин. Все права защищены.
        </div>
    </footer>
</body>
</html>
