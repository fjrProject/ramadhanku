<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
  <body>
        <div class="container-fluid m-0 p-0 bg-orange vh-100 overflow-hidden">
            <div class="container h-100 m-auto py-5 px-5 d-flex justify-content-between align-itemns-center flex-column">
    <link rel="shortcut icon" href="/IMG/RK.webp" type="image/x-icon">
    {{-- <h1 class="font-1 text-light text-center h-0 mb-5">Register</h1> --}}
    <h1 class="font-1 text-light text-center h-0 mb-5"><img src="IMG/register.png" alt="login" style="width: 40vw"></h1>
                @error('message')
                <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                @enderror
                
                <form class="d-flex justify-content-between align-itemns-center flex-column" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div>
                        @error('username')
                        <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                        @enderror
                        <input type="text" name="username" id="username" value='{{ request("username") }}' class="input-column my-2 fs-5 px-4 py-2 text-light fw-bold rounded-pill" placeholder="Username" autocomplete="off">
                    
                        @error('city_code')
                        <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                        @enderror
                        <select name="city_code" id="city_code" class="input-column my-2 fs-5 px-4 py-2 text-light fw-bold rounded-pill">
                            <option value="0314">Kota Padang</option>
                            <option value="0412">Kota Pekanbaru</option>
                            <option value="0313">Kota Bukittinggi</option>
                            <option value="0301">Agam</option>
                            <option value="0305">Kota Padang Pariaman</option>
                            <option value="0306">Pasaman</option>
                            <option value="0307">Pasaman Barat</option>
                        </select>

                        @error('password')
                        <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                        @enderror
                        <input type="password" name="password" id="password" value='{{ request("password") }}' class="input-column my-2 fs-5 px-4 py-2 text-light fw-bold rounded-pill" placeholder="Passsword">
                    
                        @error('password2')
                        <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                        @enderror
                        <input type="password" name="password2" id="password2" value='{{ request("password2") }}' class="input-column my-2 fs-5 px-4 py-2 text-light fw-bold rounded-pill" placeholder="Konfirmasi Passsword">
                    </div>
                    <div class="mt-5">
                        <button class="bg-light d-block w-50 m-auto py-1 px-2 text-orange rounded-pill text-center my-2 fs-5 px-4 fs-5 py-2 fw-bold rounded-pill outline-0 border-0">Register</button>
                        <a href="{{ route("login") }}" class="text-center d-block text-underline text-light fw-bold">Sudah memiliki akun | Login</a>
                    </div>
                </form>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>