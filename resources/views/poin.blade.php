<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
  <body>
    <div class="container-fluid m-0 p-0 bg-orange vh-min-100">
        <div class="container h-100 m-auto py-5 pt-2">
            <a class="text-decoration-none fw-bold text-light" href="{{ route('dashboard') }}">home</a>
            {{-- <h1 class="font-1 text-light text-center h-0 mb-5">Poin</h1> --}}
            <h1 class="font-1 text-light text-center h-0 mb-5"><img src="IMG/poin.png" alt="login" style="width: 40vw"></h1>
                    
            <table class="w-100 mb-5">
                <tr>
                    <th class="p-2 fs-5 text-light">Ramadhan ke</th>
                    <th class="p-2 fs-5 text-light">Poin</th>
                </tr>
                @foreach ($checks as $check)
                    <tr class="text-light m-2 fw-bold garis-poin">
                        <td class="p-2 bg-orange3 fs-5">{{ $check->hijriyah }}</td>
                        <td class="p-2 bg-orange3 fs-5">{{ $check->point }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="total-poin bg-orange2 text-light fw-bold p-2">
            <p class="text-center mb-0 fs-5">Total Poin : {{ $total }}</p>
        </div>
    </div>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>