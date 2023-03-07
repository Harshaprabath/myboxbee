<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin - Dashboard</title>
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" >
  <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/datatables/buttontable.css')}}" rel="stylesheet">
  @livewireStyles

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('admin.operaion.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('admin.operaion.navbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="main-panel">


      <!-- Main content section -->
      @yield('main-panel')
      <!-- End main content section -->


   </div>

      <!-- Footer -->

      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/admin.js')}}"></script>
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/button.js')}}"></script>
  <script src="{{asset('vendor/datatables/print.js')}}"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Kraken/3.8.2/js/html5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable({
        order: [[0, 'desc']],
      }); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script>
   
  </script>
  <script>
    $(document).ready(function() {
      
    
    $('#dataTable1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
                {
                    extend: 'print',

                    exportOptions: {
                        stripHtml : false,

                        //specify which column you want to print

                    },
                    footer: true,
                    title: '',
                }

            ]
    } );
    $('#dataTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel'
        ]
    } );
} );
</script>

  <script>
    $(document).ready(function () {


$('.select2-single').select2();

// Select2 Single  with Placeholder
$('.select2-single-placeholder').select2({
  placeholder: "Select a Province",
  allowClear: true
});
$(document).on('keyup','.discoun',function(){
     var discount = $('#disco').val();
     var price = $('#price1').val();
     var discount1 = discount / 100;
     var total = price * discount1;
     var g = price - total;
     $('#discount').val(parseFloat(g).toFixed(0));
     console.log(discount1);
    })
// Select2 Multiple
$('.select2-multiple').select2();

// Bootstrap Date Picker
$('#simple-date1 .input-group.date').datepicker({
  format: 'dd/mm/yyyy',
  todayBtn: 'linked',
  todayHighlight: true,
  autoclose: true,
});

$('#simple-date2 .input-group.date').datepicker({
  startView: 1,
  format: 'dd/mm/yyyy',
  autoclose: true,
  todayHighlight: true,
  todayBtn: 'linked',
});

$('#simple-date3 .input-group.date').datepicker({
  startView: 2,
  format: 'dd/mm/yyyy',
  autoclose: true,
  todayHighlight: true,
  todayBtn: 'linked',
});

$('#simple-date4 .input-daterange').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true,
  todayHighlight: true,
  todayBtn: 'linked',
});

// TouchSpin

$('#touchSpin1').TouchSpin({
  min: 0,
  max: 100,
  boostat: 5,
  maxboostedstep: 10,
  initval: 0
});

$('#touchSpin2').TouchSpin({
  min:0,
  max: 100,
  decimals: 2,
  step: 0.1,
  postfix: '%',
  initval: 0,
  boostat: 5,
  maxboostedstep: 10
});

$('#touchSpin3').TouchSpin({
  min: 0,
  max: 100,
  initval: 0,
  boostat: 5,
  maxboostedstep: 10,
  verticalbuttons: true,
});

$('#clockPicker1').clockpicker({
  donetext: 'Done'
});

$('#clockPicker2').clockpicker({
  autoclose: true
});

let input = $('#clockPicker3').clockpicker({
  autoclose: true,
  'default': 'now',
  placement: 'top',
  align: 'left',
});

$('#check-minutes').click(function(e){
  e.stopPropagation();
  input.clockpicker('show').clockpicker('toggleView', 'minutes');
});

});
</script>
<script>
 $(document).ready(function() {

if(window.File && window.FileList && window.FileReader) {
   $("#file-input").on("change",function(e) {
       var files = e.target.files ,
       filesLength = files.length ;
       for (var i = 0; i < filesLength ; i++) {
           var f = files[i]
           
           var fileReader = new FileReader();
           fileReader.onload = (function(e) {
               var file = e.target;
              var img= $("<span class='pip'><img class='imageThumb' src="+ e.target.result + " title=" + file.name + "/><br/><span id='deleteImage' class='remove'><i class='fas fa-trash'></i></span> </span>");
          $('#thumb-output').append(img)
          //      $(".remove").click(function(){
           
          //      console.log('áa',i);
          //   $(this).parent(".pip").remove();
         
            
          // });
          });
         
         
          fileReader.readAsDataURL(f);
      }
 });
} else { alert("Your browser doesn't support to File API") }
});
$(document).on('click','#deleteImage',function(){
  console.log('sd');
    var pips = $('.pip').toArray();
    var $selectedPip = $(this).parent('.pip');
    var index = pips.indexOf($selectedPip[0]);

    var dt = new DataTransfer();
    var files = $("#file-input")[0].files;

    for (var fileIdx = 0; fileIdx < files.length; fileIdx++) {
        if (fileIdx !== index) {
            dt.items.add(files[fileIdx]);
            console.log(fileIdx);
        }
    }

    $("#file-input")[0].files = dt.files;

    $selectedPip.remove();
});
var i = 0;

$(document).on("click", ".add", function(){

           $(this).before("<input class='full form-control  col-md-3' name='color"+ ++i +"' >");
           $('.length').val(i)
            $('.full:empty').spectrum({
               showPaletteOnly: true,
               showPalette:true,

            });

        });
        var a =0;
        var b =0;
        $(document).on("click", ".add1", function(){
           $(this).before(" <div class='form-group col-md-6' "  + "> <input type='text' class='form-control' name='heading"+  ++a +"'>  </div>  <div class='form-group col-md-6'> <textarea name='description"+  ++b +"'  cols='10' rows='10' class='form-control'></textarea> </div>");
           $('.length1').val(a)
           $('.full:empty').spectrum({
               showPaletteOnly: true,
               showPalette:true,

            });
        });
</script>
<script>
        $(document).on('click', '.edit', function() {

            var _this = $(this).parents('tr');
            $('#id').val(_this.find('.id').text());
            $('#category').val(_this.find('.name').text());
        })
        $(document).on('click', '.edit1', function() {

var _this = $(this).parents('tr');
$('#id').val(_this.find('.id').text());
$('#category1').val(_this.find('.category').val());
$('#subname').val(_this.find('.name').text());
})

$(document).on('click', '.edit2', function() {

var _this = $(this).parents('tr');
$('#id').val(_this.find('.id').text());
$('#subcat').val(_this.find('.category').val());
$('#subname').val(_this.find('.name').text());
})
$(document).on('click', '.brandedit', function() {

var _this = $(this).parents('tr');
$('#id').val(_this.find('.id').text());
$('#bname').val(_this.find('.name').text());
$('#shortcut').val(_this.find('.short').text());
})
    </script>
    
@include('layout.notify')
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
</body>

</html>
