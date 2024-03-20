<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="/IMG/RK.webp" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css">
</head>
  <body>
        <div class="container-fluid position-relative m-0 p-0 bg-white vh-min-100">
            <div class="dashboard container h-100 m-auto py-4">
                {{-- <h1 class="font-1 text-orange2 text-center h-0 mb-4">Ramadhan</h1> --}}
                <h1 class="font-1 text-light text-center h-0 mb-5"><img src="IMG/ramadhan.png" alt="login" style="width: 50vw"></h1>
                <p class="mb-0 text-center fw-bold">{{ $ramadhan }} Ramadhan 1445 H</p>
                <p class="text-center fw-bold">{{ $waktuSholat["tanggal"]}} M</p>

                <p class="text-center text-lowercase fs-7 mb-1">{{ $waktuSholat["lokasi"] }}</p>
                <div class="d-flex justify-content-between align-items-center">
                   <div class="col-2 text-center">
                        <p class="fw-bold mb-0 text-orange2">{{ $waktuSholat["jadwal"]["subuh"] }}</p>
                        <p class="fs-7">Subuh</p>
                   </div>
                   <div class="col-2 text-center">
                        <p class="fw-bold mb-0 text-orange2">{{ $waktuSholat["jadwal"]["dzuhur"] }}</p>
                        <p class="fs-7">Dzhuhur</p>
                   </div>
                   <div class="col-2 text-center">
                        <p class="fw-bold mb-0 text-orange2">{{ $waktuSholat["jadwal"]["ashar"] }}</p>
                        <p class="fs-7">Ashar</p>
                   </div>
                   <div class="col-2 text-center">
                        <p class="fw-bold mb-0 text-orange2">{{ $waktuSholat["jadwal"]["maghrib"] }}</p>
                        <p class="fs-7">Maghrib</p>
                   </div>
                   <div class="col-2 text-center">
                        <p class="fw-bold mb-0 text-orange2">{{ $waktuSholat["jadwal"]["isya"] }}</p>
                        <p class="fs-7">Isya'</p>
                   </div>
                </div>

                <div class="poin row">
                    <div class="col-6">
                        <div class="card bg-orange2 border-0 pt-0 p-2">
                            <p class="text-center text-light fs-7 mb-0">poin anda</p>
                            <div class="row">
                                <div class="col-6 text-center text-light border-samping">
                                    <p class="fw-bold fs-5 m-0 p-0">{{ $point }}</p>
                                    <p class="fs-7 m-0 p-0">hari ini</p>
                                </div>
                                <div class="col-6 text-center text-light">
                                    <p class="fw-bold fs-5 m-0 p-0">{{ $total_point }}</p>
                                    <p class="fs-7 m-0 p-0">total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-orange2 border-0 pt-0 p-2">
                            <p class="text-center text-light fs-7 mb-0">poin tertinggi</p>
                            <div class="row">
                                <div class="col-6 text-center text-light border-samping">
                                    <p class="fw-bold fs-5 m-0 p-0">{{ $highScoreDaily }}</p>
                                    <p class="fs-7 m-0 p-0">hari ini</p>
                                </div>
                                <div class="col-6 text-center text-light">
                                    <p class="fw-bold fs-5 m-0 p-0">{{ $highScoreTotal }}</p>
                                    <p class="fs-7 m-0 p-0">total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-center fs-7 mt-3 mb-0">”{{ $quote }}”</p>
                <p class="text-center fs-7">({{ $quote_title }})</p>

                <p class="text-center mt-3 mb-1"><a class="text-orange2 fw-bold" href="{{ route('history') }}">History Amalan</a></p>
                <p class="text-center mb-1"><a class="text-orange2 fw-bold" href="{{ route('poin') }}">Poin</a></p>
                <p class="text-center"><a class="text-orange2 fw-bold" href="{{ route('logout') }}">Logout</a></p>

            </div>
            <div class="container p-2 mb-0">
                <div class="checklist container bg-orange rounded-5 pt-2 pb-5">
                    <div class="d-block geser rounded-pill mb-1"></div>
                    <div class="d-block geser rounded-pill"></div>

                    <h2 class="text-center fw-bold fs-2 text-light mt-3">Ceklist Amalan</h2>
                    <p class="mb-0 text-center fs-6 text-light">{{ $ramadhan }} Ramadhan 1445 H</p>
                    <p class="text-center text-light fs-6">{{ $waktuSholat["tanggal"]}}</p>

                    <form action="{{ route("dashboard") }}" method="POST">
                        @csrf
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
            <div class="bg-light p-1 position-relative">
                <p class="bg-light text-center fw-bold">Informasi: <a target="_blank" href="https://www.instagram.com/fjrproject11?igsh=Y3h6aGE0bW00bWVp">@fjrproject11</a></p>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>