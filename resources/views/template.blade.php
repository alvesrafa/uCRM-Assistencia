<?php
$moduleInfo = [
    'icon' => 'smartphone',
    'name' => 'Assistência Técnica',
];
$menu = [
    ['icon' => 'build', 'tool' => 'Consertos', 'route' => 'consertos.index'],
    ['icon' => 'face', 'tool' => 'Clientes', 'route' => 'cliente.index'],
    ['icon' => 'extension', 'tool' => 'Peças', 'route' => 'pecas.localizar'],
    ['icon' => 'gavel', 'tool' => 'Mão de obra', 'route' => 'servicos.localizar'],
    ['icon' => 'payment', 'tool' => 'Pagamentos', 'route' => 'pagamento.index'],
    ['icon' => 'perm_identity', 'tool' => 'Técnicos', 'route' => 'tecnico.index'],
    ['icon' => 'print', 'tool' => 'Relatórios', 'route' => 'relatorios.index']
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

        <style>
            * {
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            @media (max-width: 767px) {
                
                #header {
                    z-index: 99;
                    width: 100% ;
                    background: #05151E;
                    position: fixed;
                    padding: 0 16px;
                    height: 55px;
                    color: white;
                }
                #workspace {
                    width: 100%;
                    margin-left: 0px;
                    background: white;
                }
                #module-info {
                    color: #fff;
                    min-height: 64px;
                    padding-left: 10px;
                }
                #module-info i { font-size: 36px; }
                #module-info h1 {
                    max-width: 100px;
                    font-size: 18px;
                    margin: 0;
                }
                #content {
                    padding: 20px;
                    padding-top: 55px;
                    min-height: calc(100vh - 128px);
                }
                #footer {
                    color: #5f6368;
                    height: 40px;
                    padding-left: 16px;
                    border-top: 1px solid #cfd8dc;
                    background: white;
                    position: fixed;
                    width: 100%;
                    bottom: 0;
                }
                #sidebar {
                    display:none;
                    background: #162935;
                    position: fixed;
                    min-width: 190px;
                    min-height: 100vh;
                }
            }
            @media (min-width: 768px) {
                #sidebar {
                    background: #162935;
                    position: fixed;
                    min-width: 190px;
                    min-height: 100vh;
                }
                #header {
                    z-index: 99;
                    width: calc(100% - 190px);
                    background: #05151E;
                    position: fixed;
                    padding: 0 16px;
                    height: 55px;
                    color: white;
                }
                #workspace {
                    width: calc(100% - 190px);
                    margin-left: 190px;
                    background: white;
                }
                #module-info {
                    color: #fff;
                    min-height: 64px;
                    padding-left: 10px;
                }
                #module-info i { font-size: 36px; }
                #module-info h1 {
                    max-width: 100px;
                    font-size: 18px;
                    margin: 0;
                }
                #content {
                    padding: 20px;
                    padding-top: 55px;
                    min-height: calc(100vh - 128px);
                }
                #footer {
                    color: #5f6368;
                    height: 40px;
                    padding-left: 16px;
                    border-top: 1px solid #cfd8dc;
                    background: white;
                    position: fixed;
                    width: calc(100% - 190px);
                    bottom: 0;
                }
                .container {
                    padding: 25px;
                }
            }
            

        </style>

        @yield('css')
    </head>
    <body>
        <div class="d-flex">
            <div id="sidebar">
                <a href="" class="nav-link align-items-center d-flex shadow-sm" id="module-info">
                    <h1>Assistência técnica</h1>
                </a>
                <nav class="nav flex-column">
                    <a class="nav-link d-flex align-items-center" href="">
                        Item
                    </a>
                    <a class="nav-link d-flex align-items-center" href="">
                        Item
                    </a>
                    <a class="nav-link d-flex align-items-center" href="">
                        Item
                    </a>
                    <a class="nav-link d-flex align-items-center" href="">
                        Item
                    </a>
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