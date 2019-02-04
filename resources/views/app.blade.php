<html>
    <head>
        <link href="{{ 'css/app.css' }}" rel="stylesheet">
        <title> Cadastro de  produtos </title>
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <style>
        body{
            padding: 20px;
        }
        .navbar{
            margin-bottom: 20px;
        }
    </style>
    </head>

<body>
        
        
    <div class="container-fluid">
        <main role="main">
            @component('componente_navbar',["current" => $current])
                
            @endcomponent
            @hasSection ('body')
                @yield('body')

                @endif
           
        </main>
    </div>



<script src="{{'js/app.js'}}" type="text/javascript"></script>
</body>

</html>