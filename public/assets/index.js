const selectOrigin = document.getElementById('origins');
const selectDestination = document.getElementById('destinations');
const selectSeat = document.getElementById('seat');
const datePicker = document.getElementById('date');
const baseRate = document.getElementById('base-rate');

const addSeatingToSelect = (seat, travel) => {
    clearSelectSeat();

    for (let index = 1; index <= seat; index++) {
        const option = document.createElement('option');
        option.value = index;
        option.text = index;
        selectSeat.appendChild(option);
    }
    baseRate.value = travel.base_rate;
}

const verifySeating = () => {
    const origin = selectOrigin.value;
    const destination = selectDestination.value;
    const date = datePicker.value;

    if (origin && destination && date) {
        fetch(`/seating/${origin}/${destination}/${date}`)
            .then(response => response.json())
            .then(data => {
                // Manipula los datos recibidos aquí
                console.log(data.seat);
                addSeatingToSelect(data.seat, data.travel);
                console.log(data);

            })
            .catch(error => {
                // Maneja los errores aquí

                console.error('Hubo un error:', error);
            });
    }
}

const clearSelectSeat = () => {
    if(!selectSeat.value){
        return;
    }
    while (selectSeat.firstChild) {
        selectSeat.removeChild(selectSeat.firstChild);
    }
}


const clearSelect = () => {
    if(!selectDestination.value){
        return;
    }
    while (selectDestination.firstChild) {
        selectDestination.removeChild(selectDestination.firstChild);
    }
}

const addDestinationsToSelect = (destinations) => {
    // Limpiar el select
    clearSelect();
    // Crear la opcion por defecto
    const option = document.createElement('option');
    option.value = "";
    option.text = "Seleccione un destino";
    option.selected = true;
    selectDestination.appendChild(option);
    destinations.forEach(destination => {
        const option = document.createElement('option');
        option.value = destination;
        option.text = destination;
        selectDestination.appendChild(option);
    });
}

const loadedDestinations = (e) => {
    const currentValue = selectOrigin.value;
    if (currentValue) {
        fetch(`/get/destinations/${currentValue}`)
            .then(response => {
                console.log(response); // Agrega este registro para ver la respuesta completa
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                const destinations = data.destination;
                console.log(destinations);
                addDestinationsToSelect(destinations);
            })
            .catch(error => {
                console.error('Hubo un error:', error);
            });
    }
}

const addOriginsToSelect = (origins) => {
    origins.forEach(origin => {
        const option = document.createElement('option');
        option.value = origin;
        option.text = origin;
        selectOrigin.appendChild(option);
    });
}


const loadedOrigins = (e) => {
    fetch('/get/origins')
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            const origins = data.origins;
            // console.log(origins);
            addOriginsToSelect(origins);
            // console.log(data);

        })
        .catch(error => {
            // Maneja los errores aquí
            console.error('Hubo un error:', error);
        });
}



document.addEventListener('DOMContentLoaded', loadedOrigins)
selectOrigin.addEventListener('change', loadedDestinations)
selectDestination.addEventListener('change', verifySeating)
datePicker.addEventListener('change', verifySeating)

