
$('#add').on('click', (e) => {
    let serial = prompt('Insert serial number');
    if(serial) {
        $('#serial_numbers_select').append(`<option>${serial}</option>`);
        update_available_quantity();
    }
});

$('#remove').on('click', (e) => {
    $('#serial_numbers_select>option:selected').remove();
    update_available_quantity();
});

const update_available_quantity = () =>{
$('#available_quantity_input').val($('#serial_numbers_select').children().length);
}

$('#submit').on('click', (e) => {
    //e.preventDefault();
    let serials = [];
    $('#serial_numbers_select').children().each((e)=>{
        serials.push($('#serial_numbers_select').children()[e].value);
    })
    $('#serial_numbers').val(serials);
});

$(document).ready(()=>{
    if(serial_numbers){
        $('#serial_numbers').val(serial_numbers);
        serial_numbers = serial_numbers.split(',');
        $('#available_quantity_input').val(serial_numbers.length);
        serial_numbers.forEach(item=> $('#serial_numbers_select').append(`<option>${item}</option>`))
    }
});
