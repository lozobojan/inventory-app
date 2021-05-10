function confirmUserDelete(user_id){
    if(confirm('Da li ste sigurni?')){
        console.log("#delete_form_"+user_id);
        $("#delete_form_"+user_id).submit();
    }
}
