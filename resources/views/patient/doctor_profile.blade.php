<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="p-16">
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-1 text-center order-last md:order-first mt-20 md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $commentaireCount }}</p>
                        <p class="text-gray-400">Comments</p>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                {{-- @dd($medecin->id) --}}
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    <a href="{{ route('patient.reserve', $medecin->id) }} "
                        class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500    shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Rendez-vous
                    </a>
                    <a href="/patient/home"
                        class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Retour
                    </a>
                </div>
            </div>

            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">
                    <span class="font-light text-gray-500">Dr. {{ $medecin->user->name }}</span>
                </h1>
                <p class="font-light text-gray-600 mt-3">Specialité : {{ $medecin->speciality->specialityName }} </p>
            </div>
            <div class="antialiased mx-auto max-w-screen-sm">
                <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
                @if (!empty($value->star_rating))
                    <div class="container">
                        <div class="row">
                            <div class="col mt-4">
                                <p class="font-weight-bold ">Review</p>
                                <div class="form-group row">
                                    <input type="hidden" name="booking_id" value="{{ $value->id }}">
                                    <div class="col">
                                        <div class="rated">
                                            @for ($i = 1; $i <= $value->star_rating; $i++)
                                                <input type="radio" id="star{{ $i }}" class="rate"
                                                    name="rating" value="5" />
                                                <label class="star-rating-complete" title="text">{{ $i }}
                                                    stars</label>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col">
                                        <p>{{ $value->comments }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col mt-4">
                                <form class="py-2 px-4" action="{{ route('doctor_profile.store') }}"
                                    style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $medecin->id }}">
                                    <p class="font-weight-bold ">Review</p>
                                    <div class="form-group row">
                                        <input type="hidden" name="booking_id" value="">
                                        <div class="col">
                                            <div class="rate">
                                                <input type="radio" id="star5" class="rate" name="rating"
                                                    value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" checked id="star4" class="rate"
                                                    name="rating" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" class="rate" name="rating"
                                                    value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" class="rate" name="rating"
                                                    value="2">
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" class="rate" name="rating"
                                                    value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col">
                                            <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-right">
                                        <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- @dd($commants) --}}
                        <div class="py-2 px-4 mt-2" style="box-shadow: 0 0 10px 0 #ddd;">
                            @foreach ($commants as $c)
                                <p class="font-weight-bold">{{ $c->user->name }}: || Commenter à:
                                    {{ $c->created_at }}
                                </p>
                                <p>{{ $c->comments }}</p>
                                <p>Star Rating: {{ $c->star_rating }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>
    </div>

</body>

</html>
