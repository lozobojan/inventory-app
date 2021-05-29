const equipmentSelect = document.getElementById("equipment_select");
const serialNumber = document.getElementById("serial_number");

const fetchSerials = async (id) => {
    const response = await fetch(`/serials-by-equipment/${id}`);
    const data = await response.json();
    return data;
};

const fillSerialNumbers = async () => {
    markup = "";
    const data = await fetchSerials(equipmentSelect.value);
    data.forEach((serial) => {
        markup += `<option value="${serial.serial_number}">${serial.serial_number}</option>`;
    });
    serialNumber.innerHTML = markup;
};

// onLoad
fillSerialNumbers();

equipmentSelect.addEventListener("change", fillSerialNumbers);
