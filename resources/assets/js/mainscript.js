
  $('#fullName').on('change', function(e){
    let reg_no=e.target.value;
    $.get('/get-regno/' + reg_no, function(data){
     $('#studentRegNumber').empty();
      $('#studentRegNumber').append(' <option value="'+data.studentRegNumber+'">'+data.studentRegNumber +'</option>')
    });
  });


  $('#studentClass').on('change', function(e){
    let stdClass=e.target.value;
    $.get('/get-student/' + stdClass, function(details){
        console.log(details)
     $('#fullName').empty();
      $.each(details,function(index,detail){
      $('#fullName').append(' <option value="'+detail.id+'">'+detail.firstName + ' ' + detail.lastName + '</option>')
      });
    });
    
  });
$('#message').hide();
$('#classTeacher').on('change', function(e){
console.log(e.target.value);
let teacherId=e.target.value;
$.get('/find-classteacher/' + teacherId, function(data){
    console.log(data);
if(data){
    $('#message').show();
    $("#message").css({"background-color": "red", "font-size": "20px", "font-family": "roboto", "margin-left": "20px","padding": "10px","border-radius": "5px","width": "auto","color": "white"});
    $('#message').html('The selected teacher has already been assigned to '+ data.className +' class');
}else{
    $('#message').hide();
}

});
});

