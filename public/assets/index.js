const selectOrigin = document.getElementById("origins");
const selectDestination = document.getElementById("destinations");
const selectSeat = document.getElementById("seat");
const datePicker = document.getElementById("date");
const baseRate = document.getElementById("base-rate");
const button = document.getElementById("botón");
const form = document.getElementById("form");


const addSeatingToSelect = (seat, travel) => {
    clearSelectSeat();

    for (let index = 1; index <= seat; index++) {
        const option = document.createElement("option");
        option.value = index;
        option.text = index;
        selectSeat.appendChild(option);
    }
    baseRate.value = travel.base_rate;
};

const isDateValid = () => {
    var currentDate = new Date().toISOString().slice(0, 10);
    const date = datePicker.value;
    if (date < currentDate) {
        datePicker.value = "";
        alert("La fecha no puede ser menor a la actual");
    }
};

const verifySeating = () => {
    const origin = selectOrigin.value;
    const destination = selectDestination.value;
    const date = datePicker.value;

    if (origin && destination && date) {
        fetch(`/seating/${origin}/${destination}/${date}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.seat > 0) {
                    addSeatingToSelect(data.seat, data.travel);
                }else{
                    clearSelectSeat();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No hay servicios disponibles para la ruta seleccionada.",
                        background: '#ff8a80',
                      });
                }
            })
            .catch((error) => {
                console.error("Hubo un error:", error);
            });
    }
};

const clearSelectSeat = () => {
    if (!selectSeat.value) {
        return;
    }
    while (selectSeat.firstChild) {
        selectSeat.removeChild(selectSeat.firstChild);
    }
};

const clearSelect = () => {
    if (!selectDestination.value) {
        return;
    }
    while (selectDestination.firstChild) {
        selectDestination.removeChild(selectDestination.firstChild);
    }
};

const addDestinationsToSelect = (destinations) => {
    clearSelect();
    const option = document.createElement("option");
    option.value = "";
    option.text = "Seleccione un destino";
    option.selected = true;
    selectDestination.appendChild(option);
    destinations.forEach((destination) => {
        const option = document.createElement("option");
        option.value = destination;
        option.text = destination;
        selectDestination.appendChild(option);
    });
};

const loadedDestinations = (e) => {
    clearSelect();
    const currentValue = selectOrigin.value;
    if (currentValue) {
        fetch(`/get/destinations/${currentValue}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                clearSelect();
                const destinations = data.destination;
                if (destinations.length === 0) {
                    clearSelect();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Por el momento no es posible realizar reservas, intente más tarde",
                        background: '#ff8a80',
                      });
                }
                addDestinationsToSelect(destinations);
            })
            .catch((error) => {
                console.error("Hubo un error:", error);
            });
    }
};

const addOriginsToSelect = (origins) => {
    clearSelect();
    origins.forEach((origin) => {
        const option = document.createElement("option");
        option.value = origin;
        option.text = origin;
        selectOrigin.appendChild(option);
    });
};

const loadedOrigins = (e) => {

    fetch("/get/origins")
        .then((response) => response.json())
        .then((data) => {
            const origins = data.origins;
            if (origins.length === 0) {
                clearSelect();
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Por el momento no es posible realizar reservas, intente más tarde",
                    background: '#ff8a80',
                  });
            }
            addOriginsToSelect(origins);
        })
        .catch((error) => {
            console.error("Hubo un error:", error);
        });
};



button.addEventListener('click', (e) => {
    const selectedOrigin = document.getElementById('origins').value;
    const selectedDestination = document.getElementById('destinations').value;
    const datePicker = document.getElementById('date').value;
    const selectedSeat = document.getElementById('seat').value;
    const fecha = new Date(datePicker);
    const dateFormatted = fecha.toLocaleDateString('es-ES', datePicker)
    const baseRate = document.getElementById('base-rate').value;

    e.preventDefault();

    if (selectedOrigin && selectedDestination && datePicker && selectedSeat && baseRate) {

        Swal.fire({
            title: "¿Desea continuar?",
            text: "El total de la reserva entre " + selectedOrigin + " y " + selectedDestination +
                " para el día " + datePicker + " es de " + "$" + (baseRate * selectedSeat) +
                ` (${selectedSeat} Asientos)`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0a74da",
            cancelButtonColor: "#ff6b6b",
            confirmButtonText: "Confirmar",
            cancelButtonText: "Volver",
        }).then((result) => {
            if (result.isConfirmed) {
                var total = baseRate;
                form.submit();
            }
        });
    }
    else if (selectOrigin && selectDestination && selectSeat && !datePicker && !baseRate || selectOrigin && selectDestination && selectSeat && !datePicker && baseRate) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Debe seleccionar la fecha del viaje antes de realizar la reserva",
            background: '#ff8a80',

          });
    }
    else if (selectOrigin && selectDestination && datePicker && !selectSeat && !baseRate){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Debe seleccionar la cantidad de asientos antes de realizar la reserva",
            background: '#ff8a80',

          });
    }
    else if(selectOrigin && !selectDestination && datePicker && !selectSeat && !baseRate){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Debe seleccionar un destino antes de realizar la reserva",
            background: '#ff8a80',

          });
    }


});


datePicker.addEventListener("change", isDateValid);
document.addEventListener("DOMContentLoaded", loadedOrigins);
selectOrigin.addEventListener("change", loadedDestinations);
selectDestination.addEventListener("change", verifySeating);
datePicker.addEventListener("change", verifySeating);
