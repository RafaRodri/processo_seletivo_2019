@php
    setlocale(LC_TIME, 'pt_BR.utf-8');
    date_default_timezone_set('America/Sao_Paulo');
@endphp

<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desafio - 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="robots" content="index, follow"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">

    <!-- CSS -->
    {{--<link rel="stylesheet" href="{{ asset('css/geral.css') }}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="selectivizr.js"></script>
    <noscript>
        <link rel="stylesheet" href="[fallback css]"/>
    </noscript>
    <![endif]-->

</head>

<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<section class="conteudo-internas">
    <div class="centraliza">
        <div class="conteudo-esquerda">
            <div class="lista">
            <!--Lista de Noticias-->
                <form action="{{route('noticia.search')}}" method="post" class="form-group row">
                    {{ csrf_field() }}
                    <div class="col-12 busca">
                        <input type="text" name="search" class="form-control col-8" placeholder="Digite sua busca">
                        <button class="btn btn-primary col-2">Buscar</button>
                    </div>
                </form>

            @forelse($noticias->noticias as $noticia)
            <!--Notícia-->
                <article class="box-noticia">
                    <a href="{{ $noticia->url }}">
                        <figure>
                            <img src="{{ $noticia->imagem }}" alt="{{ $noticia->titulo }}">
                        </figure>
                        <div class="texto-lista-noticias">
                            <p class="data-lista-noticia">
                                @php
                                    $data = explode("/", $noticia->data_formatada);
                                    $data = $data[2].'-'.$data[1].'-'.$data[0];

                                    $data = new DateTime($data);

                                    echo strftime("%A, %e de %B de %Y", strtotime($data->format('d-m-Y')))

                                @endphp
                            </p>
                            <h1>{!! $noticia->titulo !!}</h1>
                            <p>{!! substr(strip_tags($noticia->texto),0,300) !!}...</p>
                        </div>
                    </a>
                </article>
                <hr>
                <!--Fim Notícia-->
            @empty
                <article class="box-noticia">
                    <p>Nenhum resultado encontrado</p>
                </article>
            @endforelse


            <!--Inicio Paginação-->
                @if(isset($noticias->qtd_paginas))
                    <ul class="pagination">
                        @if(!$noticias->first)
                            <li class="page-item">
                                <a class="page-link"
                                   href="{{route('noticia.page', ['id' => $noticias->page-1, 'search' => $search])}}">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for($i=1; $i <= $noticias->qtd_paginas; $i++)
                            <li class="{!! ($noticias->page == $i) ? 'active' : '' !!} page-item">
                                <a class="page-link"
                                   href="{{route('noticia.page', ['id' => $i, 'search' => $search])}}">{!! $i !!}</a>
                            </li>
                        @endfor

                        @if(!$noticias->last)
                            <li class="page-item">
                                <a class="page-link"
                                   href="{{route('noticia.page', ['id' => $noticias->page+1, 'search' => $search])}}">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
            @endif
            <!--Fim Paginação-->

            </div><!--Fim Lista de Noticias-->
        </div> <!-- final conteudo-esquerda -->
    </div> <!-- final centraliza -->
</section>


</body>
</html>
