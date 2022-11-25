<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .text {
            margin-bottom: 0;
        }
    </style>
    <title>Popular Movies TMDB</title>
</head>

<body>
    <h1 class="text-center">Popular Movies TMDB</h1>
    <div class="container">
        <div class="row">


            @foreach ($tmdbPopuler as $populer)
                <div class="col-sm-3 col-lg-3">
                    <div class="card my-3">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $populer['poster_path'] }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/"
                                    style="text-decoration: none;">{{ $populer['title'] }}</a></h5>
                            <div class="card-text">
                                <p class="text"><b>Rating :</b> {{ $populer['vote_average'] }} &#9733;
                                </p>
                                <p class="text"><b>Release Date :</b>
                                    {{ \Carbon\Carbon::parse($populer['release_date'])->format('M d, Y') }}
                                </p>
                                <p class="text">
                                    <b> Genre :</b>
                                    @foreach ($populer['genre_ids'] as $idGenre)
                                        {{ $genre->get($idGenre) }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </p>
                                {{-- <p class="text">
                                    {{ substr($populer['overview'], 0, 133) . '...' }}
                                </p> --}}
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
