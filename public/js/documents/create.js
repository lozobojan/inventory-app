
function fillPositions(position_id = null){
    let department_id = $("#department_select").val();
    if(department_id == ''){
        $("#position_select").html('');
        return;
    }
    $.ajax({
       'url' : '/positions-by-department/'+department_id,
       'type' : 'GET',
       'success': (response) => {
           let positions = response;
           let options = '';
           positions.forEach((position) => {
               let selected = '';
               if(position_id && position_id == position.id) selected = 'selected';
               options += `<option value=\"${position.id}\" ${selected}>${position.name}</option>`;
           });
           $("#position_select").html(options);
       }
    });
}

function fillSerialNumbers(){
    let equipment_id = $("#equipment_select").val();
    $('#submit_button').attr('disabled','disabled');
    $("#serial_number").html('');

    if(equipment_id == ''){
        return;
    }

    $.ajax({
        'url' : '/serial-numbers-by-equipment/'+equipment_id,
        'type' : 'GET',
        'success': (response) => {
            let serial_numbers = response;
            let options = '';
            serial_numbers.forEach((serial_number) => {
                let selected = '';
                options += `<option value=\"${serial_number.id}\" ${selected}>${serial_number.serial_number}</option>`;
            });
            $("#serial_number").html(options);
            $('#submit_button').removeAttr('disabled');
        }
    });
}
