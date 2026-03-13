<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body>
    @if (session('success'))
        <div class="toast-container position-fixed top-0 inset-e-0 p-3">
            <div class="toast show align-items-center text-bg-success border-0" role="status" aria-live="polite"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="w-100 bg-white border-bottom py-3 mb-5">
        <div class="container-fluid">

            <h1 class="fs-5 fw-bold m-3"> Character Dictionary</h1>

        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-start m-5">
            <div>
                <h1 class="fw-bold">Characters</h1>
            </div>
        </div>

        <div class="m-5">

            <a href="{{ route('create') }}" class="btn btn-outline-secondary"><i class="bi bi-plus-circle"></i> Create
                Character</a>
        </div>
        <div>
        </div>


        @if ($characters->isEmpty())
            <p class="m-5">No characters found.</p>
        @else
            @foreach ($characters as $character)
                <div class="card m-5">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div>
                            <h2 class="h3 fw-bold mb-2">{{ $character->name }}</h2>
                            <p class="mb-1 fs-4">{{ $character->title }}</p>
                            <p class="mb-0 fs-4">{{ $character->universe }}</p>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('edit', $character->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('destroy', $character->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>

</html>
