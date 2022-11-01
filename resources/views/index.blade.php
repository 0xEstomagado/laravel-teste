<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Bem vindo</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <i class="fa fa-list" aria-hidden="true"></i>
                Listar produtos
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                Criar
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <p><i class="fa fa-sun-o" aria-hidden="true"></i>&nbsp;<span id="prevision"></span></p>
        <p><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;<span id="location"></span></p>
    </div>
    </div>

    <!-- CONTENT -->
    <table class="table table-striped">
        <thead>
           <tr>
                <th>trte</th>
                <th>trte</th>
           </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th>{{ $product->name }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <script>
        const geo = navigator.geolocation;

        const selectElement = (El) => {
            return document.querySelector(`#${El}`);
        }

        geo.getCurrentPosition((p) => {
            fetch(`
                /api/weather-forecast?lat=${p.coords.latitude}
                &long=${p.coords.longitude}
            `)
            .then(response => response.json())
            .then(response => {
                selectElement("prevision").innerText = response.weather[0].description;
                selectElement("location").innerText  = response.name;

            });
        });
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>