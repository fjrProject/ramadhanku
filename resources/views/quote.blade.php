<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="/IMG/RK.webp" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css">
</head>
  <body>
        <div class="container-fluid m-0 p-0 bg-orange vh-100 overflow-hidden">
            <div class="container h-100 m-auto py-5 px-5 d-flex justify-content-between align-itemns-center flex-column">
                <h1 class="font-1 text-light text-center h-0 mb-5">Qoute</h1>
                @error('message')
                <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                @enderror
                
                <form class="d-flex justify-content-between align-itemns-center flex-column" action="{{ route('edit-quote') }}" method="POST">
                    @csrf

                    <div>
                        @error('quote')
                        <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                        @enderror
                        <input type="text" name="quote" id="quote" value='{{ request("quote") }}' class="input-column my-2 fs-5 px-4 py-2 text-light fw-bold rounded-pill" placeholder="quote">
                    
                        @error('title')
                        <p class="text-light mb-2 pb-0">*{{ $message }}</p>
                        @enderror
                        <input type="text" name="title" id="title" value='{{ request("title") }}' class="input-column my-2 fs-5 px-4 py-2 text-light fw-bold rounded-pill" placeholder="title">
                    
                    </div>
                    <div class="mt-5">
                        <button class="bg-light d-block w-50 m-auto py-1 px-2 text-orange rounded-pill text-center my-2 fs-5 px-4 fs-5 py-2 fw-bold rounded-pill outline-0 border-0">Post           </button>
                    </div>
                </form>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>