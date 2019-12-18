<?php
$moduleInfo = [
    'icon' => 'smartphone',
    'name' => 'Assistência Técnica',
];
$menu = [
    ['icon' => 'build', 'tool' => 'Clientes', 'route' => 'clientes.index'],
    ['icon' => 'face', 'tool' => 'Técnicos', 'route' => 'tecnicos.index'],
    ['icon' => 'face', 'tool' => 'Mãos-de-obra', 'route' => 'maoobra.index'],
    ['icon' => 'face', 'tool' => 'Peças', 'route' => 'pecas.index'],
];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Assistência</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="" type="image/x-icon"> <!-- Icone na aba-->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="{{asset('mdbootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('mdbootstrap/css/mdb.min.css')}}">
        <!-- Material Design Bootstrap -->
        
        <link rel="stylesheet" href="{{asset('bibliotecas/css/style.css')}}">

        @yield('css')
    </head>
    <body>
        <div class="d-flex">
            <div id="sidebar">
                <a href="" class="nav-link align-items-center d-flex shadow-sm" id="module-info">
                    <h1>Assistência técnica</h1>
                </a>
                <nav class="nav flex-column">
                    @foreach($menu as $itemMenu)
                    <a class="nav-link d-flex align-items-center" href="{{route($itemMenu['route'])}}">
                        icon{{$itemMenu['tool']}}
                    </a>
                    @endforeach
                    
                </nav>
            </div>
            <div class="d-flex flex-column" id="workspace">
                <div class="shadow-sm d-flex align-items-center justify-content-between" id="header">
                    <div class="d-flex align-items-center">
                        <i class="material-icons mr-2 btn-circle" onclick="toggleMenu()">menu</i>
                        ASSISTÊNCIA TÉCNICA DE SMARTPHONES
                    </div>
                    
                </div>
                <div id="content">
                    @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get("success")}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(Session::get('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{Session::get('warning')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="container">
                      @yield('content')
                    </div>

                </div>
                <div class="d-flex align-items-center" id="footer">
                    Desenvolvido por Rafael Alves &copy
                </div>
            </div>
        </div>

        <script>
            var main_url="{{url('')}}"
        </script>

        
        
        <script src="{{asset('bibliotecas/js/jquery.min.js')}}"></script>
        <script src="{{asset('bibliotecas/js/jquery.mask.js')}}"></script>
        <script src="{{asset('mdbootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('mdbootstrap/js/mdb.min.js')}}"></script>
        <script src="{{asset('mdbootstrap/js/popper.min.js')}}"></script>
        <script>

            function toggleMenu() {
                var width = window.innerWidth;
                if(width > 767){
                    var sidebar = document.getElementById('sidebar');
                    var workspace = document.getElementById('workspace');
                    var header = document.getElementById('header');
                    var footer = document.getElementById('footer');

                    var displaySidebar = sidebar.style.display === "none" ? "block" : "none";
                    var marginLeftWorkspace = workspace.style.marginLeft === "0px" ? "190px" : "0px";
                    var widthWorkspace = workspace.style.width === "100%" ? "calc(100% - 190px)" : "100%";
                    var widthFooter = footer.style.width === "100%" ? "calc(100% - 190px)" : "100%";
                    var widthHeader = header.style.width === "100%" ? "calc(100% - 190px)" : "100%";

                    sidebar.style.display = displaySidebar;
                    workspace.style.marginLeft = marginLeftWorkspace;
                    workspace.style.width = widthWorkspace;
                    footer.style.width = widthWorkspace;
                    header.style.width = widthHeader;
                }


               

            }
        </script>
        @yield('js')

    </body>
</html>