@extends('./welcome');


<div class="container bg-for-card-list">
    <div class="centered">
        <div class="card-container">
            @foreach ($comics as $comic)
            <div class="card-container-for">
                <div class="card">
                    <img src="{{ $comic['image']}}" alt="">
                </div>
                <div>
                    {{ $comic['series']}}
                </div>
                <div>
                    {{ $comic['price']}}
                </div>

                <a href="{{ route('comics.show', $comic['id']) }}" class="btn btn-secondary">Info</a>

                


            </div>
            @endforeach
            
        </div>

    </div>

</div>