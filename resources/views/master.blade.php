<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>E-commerce Project</title>
    <style>
        .custom-login{
            height: 500px;
            padding-top: 100px;
        }

        img.slider-img{
            height: 400px !important;
        }
        .custom-product{
            height: 600px;
        }
        .slider-text{
            background-color: #35443585 !important;
        }
        .trending-image{
            height: 100px;
            width: auto;
        }
        .trending-item{
            float: left;
            width: 20%;
        }
        .trending-wrapper{
            margin: 30px;
        }
        .detail-img{
            height: 200px;
        }
        .search-box{
            width: 500px !important;
        }

        .cart-list-divider{
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- To display header file -->
    {{ View::make('header') }}
    
    <!-- yield = placeholder for "content" section in other files -->
    @yield('content')

    <!-- To display footer file -->
    {{ View::make('footer') }}
    
    <!-- compiled and minified JQuery file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>    
</body>
</html>