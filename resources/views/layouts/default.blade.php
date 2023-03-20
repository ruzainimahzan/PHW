<!doctype html>
<html>
<head>
    @include('includes.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            @include('includes.header')
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                @include('includes.sidebar')
            </section>
        </aside>

            <div>
            @yield('content')
            </div>
            @include('includes.scripts')
        <footer class="main-footer">
            @include('includes.footer')
        </footer>
    </div>

</body>
</html>