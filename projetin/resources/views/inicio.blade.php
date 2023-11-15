@extends('template')
@section('conteudo')
    <div id="carouselExampleAutoplaying" class="carousel slide py-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://imgcentauro-a.akamaihd.net/05_Campanhas/2023/DeOlhoNaBlack/prim/desk.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://imgcentauro-a.akamaihd.net/05_Campanhas/2023/Vulcabras/primaria2610/DESK.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://imgcentauro-a.akamaihd.net/05_Campanhas/2023/adidasNaCentauro/Desktop.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="p-4 border rounded mx-3">
        <div class="fs-5 border-bottom mb-2 pb-2">Produtos</div>

        <div class="produtos">
            @for ($i = 0; $i < 10; $i++)
                <div class="card" style="width: 18rem;">
                    <img src="https://placehold.co/300x180/png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
@section('script')
@endsection
