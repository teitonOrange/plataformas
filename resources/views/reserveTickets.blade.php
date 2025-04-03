@extends('layouts.app')
@section('title')
    Reserve Tickets
@endsection
@section('content')

    @if ($countTravels > 0 && !Auth::user())

        <body>
            <div class="py-2 h-100 mx-auto shadow-lg" style="background-color: white">
                <div class="sm:py-16 m-4 justify-center items-center">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:text-center">
                            <h2 class="mb-4 text-4xl tracking-tight font-extrabold">Reservar pasajes</h2>
                            <p class=" text-gray-500 dark:text-gray-200">Reserva tus pasajes para viajar a cualquier parte
                                del país.</p>
                            <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

                            <form id="form" method="POST" action="{{route('add-reservation')}}">
                                <div class="flex flex-col items-start m-2">
                                    <!-- DATEPICKER-->
                                    <label class="m-2 mx-3" for="Fecha">Fecha del viaje</label>
                                    <div class="relative max-w-sm mx-3">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="date" datepicker datepicker-autohide type="date" name="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Seleccione una fecha">
                                    </div>

                                    <!-- ORIGIN-->
                                    <label class="m-4 " for="origins">Origen</label>
                                    <select id="origins" name="origins"
                                        class="mx-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected>Elige una opción</option>
                                    </select>

                                    <!-- DESTINATION-->
                                    <label class="m-4" for="destinations">Destino</label>
                                    <select id="destinations" name="destinations"
                                        class="mx-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected>Elige una opción</option>
                                    </select>
                                    <!-- SEATS-->
                                    <label class="m-4" for="seats">Asientos</label>
                                    <select id="seat" name="seat"
                                        class="mx-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected>Elige una opción</option>
                                    </select>

                                    <!-- BASE RATE-->
                                    <input type="hidden" id="base-rate" name="base-rate" value="">

                                    <!-- BUTTON-->
                                    <button type="button" id="button"
                                        class="mx-3 m-4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                        Reservar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
            <script src="{{ asset('assets/index.js') }}"></script>
        </body>
    @else
        <center>
            @if (Auth::user())
                <div class="alert alert-danger text-white px-3 py-2 text-sm font-medium"
                    style = "background-color:#ff8a80"role="alert">
                    Cierre sesión para ingresar a la página de reservas.
                </div>
            @else
                <div class="alert alert-danger text-white px-3 py-2 text-sm font-medium"
                    style = "background-color:#ff8a80"role="alert">
                    Por el momento no es posible realizar reservas, intente más tarde.
                </div>
            @endif
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="{{ asset('assets/index.js') }}"></script>
    @endif
    @section('js')
        <script src="{{ asset('assets/index.js') }}"></script>


        {{-- SweetAlert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            console.log(1)
            // Aqui va nuestro script de sweetalert
            const button = document.getElementById("button");
const form = document.getElementById("form");

button.addEventListener('click', (e) => {
    // Informacion Reserva
    const selectedOrigin = document.getElementById('origins').value;
    const selectedDestination = document.getElementById('destinations').value;

    const datePicker = document.getElementById('date').value;
    const selectedSeat = document.getElementById('seat').value;
    const fecha = new Date(datePicker);
    const dateFormatted = fecha.toLocaleDateString('es-ES', datePicker)

    const baseRate = document.getElementById('base-rate').value;


    e.preventDefault();

    if (selectedOrigin && selectedDestination && datePicker && selectedSeat && baseRate) {
        console.log("sdjhasjddhjsajhdjsdajhdhjsddjashjdjhsadjhsd")
        Swal.fire({
            title: "¿Desea continuar?",
            text: "El total de la reserva entre " + selectedOrigin + " y " + selectedDestination +
                " para el día " + dateFormatted + " es de " + "$" + (baseRate * selectedSeat) +
                ` (${selectedSeat} Asientos)`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirmar",
            cancelButtonText: "Volver",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
});

        </script>
    @endsection
@endsection
