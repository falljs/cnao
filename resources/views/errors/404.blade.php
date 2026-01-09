@extends('layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : '404 - Page non trouvée | CNAO')
@section('content')
    <style>
        /* Reset rapide */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        h1 {
            font-size: 8rem;
            color: #146639;
        }

        h2 {
            font-size: 2rem;
            margin: 20px 0;
        }

        p {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        a.btn {
            display: inline-block;
            padding: 12px 30px;
            background: #146639;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }

        a.btn:hover {
            background: #146639;
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 5rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="container">
        <h1>404</h1>
        <h2>Oups ! Page non trouvée</h2>
        <p>La page que vous cherchez n'existe pas ou a été déplacée.</p>
        <a href="/" class="btn">Retour à l'accueil</a>
    </div>
@endsection
