<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Turjoy | Línea de buses</title>
    <style>
        body { background-color: #EAEAEA;
        }
    </style>
</head>
<body>
    <nav class="fixed-top" style="background-color: #333333">

        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
          <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
              <div class="flex flex-shrink-0 items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/TURJOY2.png" alt="codeWaveLogo" height="100" width="125">
                </a>
              </div>
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                  <a href="{{ url('/') }}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a>
                  <a href="#" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Proximamente</a>
                  <a href="#" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Próximamente</a>
                  @guest
                    @if (Route::has('login'))
                        <a class="nav-link text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                            href="{{ route('login') }}">Iniciar sesión </a>
                    @endif
                    @if (Route::has('register'))
                            <a class="nav-link text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    @endif
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                        href="#" role="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre>
                        {{ Auth::user()->name }}
                        </a>
                        <a {{ route('home') }}href="" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Cargar Rutas</a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hidden sm:ml-6 sm:block" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"> Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    <main>
        @yield('content')
    </main>
</body>

<footer class="shadow m-4 mx-auto" style="background-color: #333333">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ url('/') }}" class="flex items-center mb-4 sm:mb-0">
                <img src="img/CodeWave2.png" class="h-8 mr-3" alt="codeWaveLogo"/>
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">CodeWave</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Acerca de</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Políticas de privacidad</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Licencias</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contacto</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 sm:mx-auto" />
        <span class="block text-sm sm:text-center text-white">© 2023
            <a class="">CodeWave</a>. Todos los derechos reservados.</span>
    </div>
</footer>
</html>
