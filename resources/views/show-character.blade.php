<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/0c0888491f.js" crossorigin="anonymous"></script>
    <title>Character List</title>
</head>

<body>
    <div class="container text-center py-4">
        <h1>Character List</h1>
        <div class="row g-3 mt-3">
            @forelse ($characters as $char)
            <div class="col-lg-6">
                <div class="p-3 action d-flex justify-content-between align-items-center rounded-3 border">
                    <div class="text-start">
                        <small>{{ $char->code }}</small>
                        <h3 class="m-0">{{ $char->name }}</h3>
                        <small>
                            {{ ucfirst($char->element) }} |
                            {{ ucfirst($char->weapon) }} |
                            {{ ucfirst($char->region) }}
                        </small>
                    </div>
                    <div class="text-end">
                        <div>
                            <small>Constellation</small>
                            <b>{{ $char->constellation }}</b>
                        </div>
                        <div>
                            <small>ATK</small>
                            <b>{{ $char->base_atk }}</b>
                        </div>
                        <div>
                            <small>Birth Date</small>
                            <b>{{ $char->birth_date }}</b>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-dark d-inline-block">Tidak Ada Data</div>
            @endforelse
        </div>
    </div>
    <script src="/js/bootstrap.min.css"></script>
</body>

</html>