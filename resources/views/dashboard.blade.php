@extends('layouts.app')


@section('content')
<style>
    .left {
        float: left;
        margin-right: 15px;
    }
    body {
            background-color: #EAEAEA;
            display: grid;
            min-height: 100vh;
            grid-template-rows: auto 1fr auto;
        }

</style>
<body>
    <div style="background-color: #f4f4f4">
            <div class="shadow-lg py-16 sm:py-16">
                <h1>Próximamente</h1>
              </div>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
@endsection
