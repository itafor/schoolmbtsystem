<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content={{csrf_token()}}>

    <title>Laravel Starter</title>
    <link rel="stylesheet" href="/css/app.css"></link>
    <link rel="stylesheet" href="/dist/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/dist/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/dist/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/dist/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/dist/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    @guest @yield('content') @else
    <div class="wrapper" id="app">
        <!-- Header -->
    @include('layouts.header')
        <!-- Sidebar -->
    @include('layouts.sidebar') 
    @include('message.success')
    @include('message.errors')
    @yield('content')
        <!-- Footer -->
    @include('layouts.footer')
    </div>
    <!-- ./wrapper -->
    @endguest @yield('javascript')
    
</body>


<script type="text/javascript">

  var stdRegNumber=[];
 let marksToRank=[];
 
var studentId =document.getElementById("user_id").value;

// var feeAtm =document.getElementById("feeAmount").value;
// console.log(feeAtm);
// if(feeAtm == 0){
//   document.getElementById("submitBtn").disabled = false
// }else if(feeAtm >=1){
//    $('#message').hide();
//   document.getElementById("submitBtn").disabled = false;
// }

//fee payment
  $('#message').hide();

$('#otherItemDiv').hide();
$('.paymentiTEM').on('change',function(event){
  var item=event.target.value;
  console.log(item)
  if(item ==='Others'){
$('#otherItemDiv').show();
  }else if(item =='School Fee' || item ==''){
$('#otherItemDiv').hide();
  }
})
document.getElementById("feeterm").disabled = true;
var feeClassName='';
$('.feeclassName,.feesessionName').on('change',function(clasName){
  feeclassName =clasName.target.value;
  if(feeclassName ==''){
document.getElementById("feeterm").disabled = true;
$('.feeterm').val(0);
  }else{
document.getElementById("feeterm").disabled = false;
  }
console.log(feeclassName)
});

getBalance();

function getBalance(){
 $('body').delegate('.feeterm','change',function(){
  let tr=$(this).parent().parent();
  var feeclassName=tr.find('.feeclassName').val();
  var feesessionName=tr.find('.feesessionName').val();
  var feeterm=tr.find('.feeterm').val();

var feeAtm = tr.find('.feeAmount').val('8'); 

console.log(feeAtm);



var studentName=document.getElementById("stdName").textContent;

  var feeterm=tr.find('.feeterm').val();
$.get('/get-fee-balance/' + feeclassName + '/' + feesessionName + '/' + feeterm + '/' +studentId, function(data){
   console.log(data.balance);

  if(data ==''){
    
$.get('/get-total-fee-amt/' + feeclassName + '/' + feesessionName + '/' + feeterm, function(data){
  if(data ==''){
    alert('You have not set TOTAL FEE AMOUNT for the selected Term, Session and Class');
    $('.feeAmount').val('');
  }else{
    $('.feeAmount').val(data.feeAmount);

    $('.amountPaid').on('keyup',function(e){
  var amountPaid=e.target.value;

  var bal= data.feeAmount - Number(amountPaid);
    $('.balance').val(bal);
    if(bal === 0){
      $('.feestatus').val('Cleared');
    }else{
      $('.feestatus').val('Owning');
    }

    if(bal <=-1){
  alert('Invalid digit detected in balance, Amount Paid must not be more than Fee Amount');
    $('.balance').val(0);
    }
    });

  }
})

  }else{
    $('.feeAmount').val(data.balance);
  

 if(data.balance == 0){
    $('#message').show();
    $("#message").css({"background-color": "green", "font-size": "20px", "font-family": "roboto", "margin-left": "20px","padding": "10px","border-radius": "5px","width": "auto","color": "white"});
    $('#message').html( studentName + ' is Cleared for the selected Term and Session');
    // var feeAtm = tr.find('.feeAmount').val(data.feeAmount); 

}else{
    $('#message').hide();
}

    $('.amountPaid').on('keyup',function(e){
  var amountPaid=e.target.value;
  var mainBal=data.balance;
  var bal=mainBal- Number(amountPaid);



    $('.balance').val(bal);
    if(bal === 0){
      $('.feestatus').val('Cleared');
    }else{
      $('.feestatus').val('Owning');
    }

    if(bal <=-1){
  alert('Invalid digit detected in balance, Amount Paid must not be more than Fee Amount');
    $('.balance').val(0);
    }
    });

  }
})
 });
  }




function getTotalFee(){
 // $('body').delegate('.feeterm','change',function(){
 // let tr=$(this).parent().parent();
 //  var feeclassName=tr.find('.feeclassName').val();
 //  var feesessionName=tr.find('.feesessionName').val();
   //var feeterm=tr.find('.feeterm').val();
$.get('/get-total-fee-amt/' + feeclassName + '/' + feesessionName + '/' + feeterm, function(data){
  if(data ==''){
    alert('No amount found');
  }else{
    $('.feeAmount').val(data.feeAmount);

    $('.amountPaid').on('keyup',function(e){
  var amountPaid=e.target.value;

  var bal= data.feeAmount - Number(amountPaid);
    $('.balance').val(bal);
    if(bal === 0){
      $('.feestatus').val('Cleared');
    }else{
      $('.feestatus').val('Owning');
    }

    if(bal <=-1){
  alert('Invalid digit detected in balance, Amount Paid must not be more than Fee Amount');
    $('.balance').val(0);
    }
    });

  }
})
 // });
  }
    $('.studentClass').on('change', function(e){
    let stdClass=e.target.value;
      $('.studentRegNumber').val('');
    $.get('/get-student/' + stdClass, function(details){
     $('.fullName').empty();
      $.each(details,function(index,detail){
         // console.log(detail);
         $('.studentRegNumber').val('');
      $('.fullName').append(' <option value="'+detail.id+'">'+detail.firstName + ' ' + detail.lastName + '</option>')
      });
    });
    
  });

      $('.studentClass').on('change', function(e){
    let studentclass=e.target.value;
   
 var dataId = {'studentClass':studentclass};
      $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{url('/findclass/')}}" + '/' + studentclass,
    method: 'POST',
    data: dataId,
    dataType:'json',
    success: function(result){
     // console.log(result);
  $.get('/enter-result',function(data){
    
  });
    }
    });
  });

//-------enter student reg no------------
$('body').delegate('.fullName','change',function(){
    var tr =$(this).parent().parent();
    var id = tr.find('.fullName').val();
    var dataId = {'id':id};
    $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{route('findRegNumber')}}",
    method: 'POST',
    data: dataId,
    dataType:'json',
    success: function(result){
   tr.find('.studentRegNumber').val(result.studentRegNumber);
   stdRegNumber.push(tr.find('.studentRegNumber').val());
    let totalMarks=$('.totalmark').val();


 var recipientsArray = stdRegNumber.sort(); 

var reportRecipientsDuplicate = [];
for (var i = 0; i < recipientsArray.length - 1; i++) {
    if (recipientsArray[i + 1] == recipientsArray[i]) {
       alert('Repeated Reg. Number detected');
       stdRegNumber.pop(recipientsArray[i]);
       stdRegNumber[i]=null;
    }
}
 console.log(stdRegNumber);

    }
    });

});

  //-------enter student reg no end------------


//-----------check if class teachere has been assigned to a class-----------
$('#message').hide();
$('#classTeacher').on('change', function(e){
console.log(e.target.value);
let teacherId=e.target.value;
$.get('/find-classteacher/' + teacherId, function(data){
    // console.log(data);
if(data){
    $('#message').show();
    $("#message").css({"background-color": "red", "font-size": "20px", "font-family": "roboto", "margin-left": "20px","padding": "10px","border-radius": "5px","width": "auto","color": "white"});
    $('#message').html('The selected teacher has already been assigned to '+ data.className +' class');
}else{
    $('#message').hide();
}

});
});

//-----------end class teacher check -----------

//remove row
$('body').delegate('.remove','click',function(){
    let l=$('tbody tr').length;
    if(l===1){
        alert('You cannot romve this');
    }else{
    $(this).parent().parent().remove();
    }
});
//end remove row
//-------check for valid input----
$('.testscore,.examscore, .points').on('keyup',function(e){
let Valu = e.target.value;
if(Valu<=-1){
   // $('.testscore,.examscore,.points').val('');
   alert('Invalid input (Negative number) detected');
}
});

$('.testscore').on('keyup',function(e){
let Valu = e.target.value;
if(Valu > 40){
alert('Test maximum score exceeded');
 // $('.examscore').val('');
}else if(Valu == ''){
alert('Test Score field cannot be empty');
}
});

$('.examscore').on('keyup',function(e){
let Valu = e.target.value;
if(Valu > 60){
alert('Exam maximum score exceeded');
  // $('.examscore').val('');
}
});
// ende validation


$('body').delegate('.testscore,.examscore,.points','keyup',function(){
var tr = $(this).parent().parent();
var testscore =tr.find('.testscore').val();
var examscore =tr.find('.examscore').val();
var total = Number(testscore) + Number(examscore);
 tr.find('.totalmark').val(total);
if(total <=0 || total <=39){
    tr.find('.points').val(9);
    tr.find('.remark').val('Fail');
}else if(total <= 40 || total <=45){
    tr.find('.points').val(8);
    tr.find('.remark').val('Pass');
}else if(total <= 46 || total <=50){
    tr.find('.points').val(7);
    tr.find('.remark').val('Pass');
}else if(total <= 51 || total <=54){
    tr.find('.points').val(6);
    tr.find('.remark').val('Credit');
}else if(total <= 55 || total <=60){
    tr.find('.points').val(5);
    tr.find('.remark').val('Credit');
}else if(total <= 61 || total <=64){
    tr.find('.points').val(4);
    tr.find('.remark').val('Strong credit');
}else if(total <= 65 || total <=69){
    tr.find('.points').val(3);
    tr.find('.remark').val('Strong credit');
}else if(total <= 70 || total <=74){
    tr.find('.points').val(2);
    tr.find('.remark').val('Distinction');
}else if(total <= 75 || total <=100){
    tr.find('.points').val(1);
    tr.find('.remark').val('Distinction');
}else{
     tr.find('.remark').val(' ');
      tr.find('.points').val(' ');
}
});

</script>
<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_count').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});

$(document).ready(function(){
  $('.btnPrint').printPage();
});

function printReport()
    {
        var prtContent = document.getElementById("theResult");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.write( '<style> href="./asset/css/layout.css" rel="stylesheet">');
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

    function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}


$(document).ready(function(){
  $('#searchskill').keyup(function(){
    var searchskills=document.querySelector('#searchskill')
    
    var query2=$(this).val();
    if(query2!==''){
      var _token = $('input[name="_token"').val();
      $.ajax({
        url:"{{ route('autocomplete.fetchskill')}}",
        method:"get",
        data:{query2:query2, _token:_token},
        success:function(user){
          console.log(user)
          $('#skillList').fadeIn();
          $('#skillList').html(user);
        }
      })
    }
  }); 

  $(document).on('click', 'li', function(e){  
        $('#searchskill').val($(this).text());  
        $('#skillList').fadeOut();  
    });  
 
});
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
</html>