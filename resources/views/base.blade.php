<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Ecommerce Website</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                @for($i = 1; $i <= 8; $i++)
                    <div class="col-md-4">
                    <div class="card" style="width: 18rem; position: relative;margin:8px">
                        <div class="card-body" style="position: relative;">
                            <img src="https://image.16pic.com/00/93/09/16pic_9309862_s.jpg" class="card-img-top" alt="Product {{ $i }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <p class="card-text" style="color:white; font-size: 24px; position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; padding: 10px;">$ {{ $i * 10 }}</p>
                        </div>
                        <button type="button" class="btn btn-primary w-100 m-0" data-toggle="modal" data-target="#productModal{{ $i }}">$ {{ $i * 10 }}</button>
                    </div>
            </div>
            @endfor
        </div>
        </div>

        @for($i = 1; $i <= 8; $i++)
            <div class="modal fade" id="productModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $i }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel{{ $i }}">Product {{ $i }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>This is product {{ $i }} with price $ {{ $i * 10 }}</p>
                    </div>
                    <div class="modal-footer w-100">
                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Send</button>
                    </div>
                </div>
            </div>
            </div>
            @endfor
    </main>
    <!-- <footer>
        <p>&copy; 2022 Ecommerce Website</p>
    </footer> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>