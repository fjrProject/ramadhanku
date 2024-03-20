<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="/IMG/RK.webp" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css">
</head>
  <body>
        <div class="container-fluid m-0 p-0 bg-orange vh-min-100">
            <div class="container h-100 m-auto py-5 pt-2">
                <a class="text-decoration-none fw-bold text-light" href="{{ route('dashboard') }}">home</a>
                {{-- <h1 class="font-1 text-light text-center h-0 mt-3 mb-5">History</h1> --}}
                <h1 class="font-1 text-light text-center h-0 mb-5"><img src="IMG/history.png" alt="login" style="width: 40vw"></h1>
                <div class="dropdown">
                    <label for="id" class="fw-bold text-light">Ramadhan ke - </label>
                    <button class="input-column-2 dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ $hijriyah }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($checks as $item)
                            <li><a class="dropdown-item fw-bold" href="/history?id={{ $item->hijriyah }}">{{ $item->hijriyah }}</a></li>
                        @endforeach
                    </ul>
                    <p class="d-inline-block fw-bold text-light">| Poin : </p>
                    <p class="d-inline-block fw-bold text-light">{{ $point }}</p>
                  </div>
                
                  <form action="{{ route("history") }}" method="POST">
                    @csrf
                    <input type="hidden" name="ramadhan" value={{ $hijriyah }}>
                    <table class="w-100">
                        @for ($i = 0; $i <= 20; $i ++)
                        <tr class="garis-bawah">
                            <td class="p-2 fw-bold text-light capitalize"><label for="ibadah_{{ $i }}">{{ $ibadah[$i]->name }}</label><br></td>
                            <td class="p-2"><input type="checkbox" class="check-box" name="ibadah_{{ $i }}" id="ibadah_{{ $i }}" value="1" @checked($check[$i])></td>
                        </tr>
                        @endfor
                        <tr class="garis-bawah">
                            <td class="p-2 fw-bold text-light capitalize"><label for="ibadah_21">Baca {{ $ibadah[21]->name }}</label><br></td>
                            <td class="p-2"><input type="number" class="input-quran " name="ibadah_21" id="ibadah_21" value={{ $check[21] }} style="width: 50px"></td>
                        </tr>
                    </table>
                    <button class="d-block mt-5 w-50 fs-5 border-0 outline-0 rounded-pill fw-bold text-center text-orange2 m-auto" type="submit">Submit</button>
                </form>

            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>