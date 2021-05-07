
function fillPositions(){
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
               options += `<option value=\"${position.id}\">${position.name}</option>`;
           });
           $("#position_select").html(options);
       }
    });
}
