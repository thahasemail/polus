
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">

    @if(session()->has("message"))
    <p>{{ session()->get("message")}}</p>
    @endif

    <form action="{{ route('save') }}" method="post">
    @csrf
    <table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price(in $)</th>
      <th scope="col">Tax</th>
      <th scope="col">Line Total</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr id="myRow1">
      <th scope="row">1</th>
      <td><input type="text" class="form-control" id="name1" name="name1" required></td>
      <td><input type="number" class="form-control" id="quantity1" name="quantity1" required></td>
      <td><input type="number" class="form-control" id="unit_price1" name="unit_price1" required></td>
      <td>
      <select class="form-select" aria-label="Tax" name="tax1" id="tax1">
        <option value="0" selected>0 %</option>
        <option value="1">1 %</option>
        <option value="5">5 %</option>
        <option value="10">10 %</option>
        </select>

      </td>
      <td scope="col" id="line_total1"></td>
      <td><i id="plus" class="bi bi-plus-circle-fill" style="font-size: 25px; color: cornflowerblue;cursor:pointer"></i></td>
    </tr>
   
    <tr>
        <td></td>
        <td colspan="4" class="text-end fw-bold">Sub Total Without Tax</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" class="text-end fw-bold">Sub Total With Tax</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" class="text-end fw-bold">Discount</td>
        <td><input type="number" class="form-control" id="discount" name="discount" >
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
            <label class="form-check-label" for="inlineRadio1">Percentage</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Fixed Amount</label>
            </div>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" class="text-end fw-bold">Total Amount</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" class="text-end fw-bold"><button type="submit" class="btn btn-primary">Save and Generate Invoice</button></td>
        <td></td>
    </tr>
   
  </tbody>
</table>

<input type="hidden" id="count_row" name="count_row" value="1" />

</form>

    </div>

<script>



var current_counter_value = $("#count_row").val() * 1


$("#plus").click(

    function(){

 var current_counter_value = $("#count_row").val() * 1
 var counter_value = $("#count_row").val() * 1 + 1;
 $("#count_row").val(counter_value);


        $('#myRow' + current_counter_value).after(`<tr id="myRow`+ counter_value +`"><th scope="row">`+counter_value+`</th>
      <td><input type="text" class="form-control" id="name`+ counter_value +`" name="name`+ counter_value +`" required></td>
      <td><input type="number" class="form-control" id="quantity`+ counter_value +`" name="quantity`+ counter_value +`" required></td>
      <td><input type="number" class="form-control" id="unit_price`+ counter_value +`" name="unit_price`+ counter_value +`" required></td>
      <td>
      <select class="form-select" aria-label="Tax" name="tax`+ counter_value +`" id="tax`+ counter_value +`">
        <option value="0" selected>0 %</option>
        <option value="1">1 %</option>
        <option value="5">5 %</option>
        <option value="10">10 %</option>
        </select>

      </td>
      <td scope="col"></td>
      <td></td>
    </tr>`);

  });

  $("#unit_price" + current_counter_value).blur(



    function(){
        
        quantity =  $("#quantity" + current_counter_value) .val() *1;
        unit_price =  $("#unit_price" + current_counter_value) .val() *1;
        line_total = quantity * unit_price;
        $("#line_total" + current_counter_value).html(line_total);


    });


</script>



</body>
</html>