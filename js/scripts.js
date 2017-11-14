// prevent js from creating global variables
'use-strict';

// form validation function
function validate() {
  // JQuery sets DOM element to the variable
  var form = $('#dataform')[0];
  var fields = ["x1", "x2", "x3", "x4", "x5", "x6", "x7", "x8", "x9"];
  var fieldname;

  // iterate throught form fields and check for numeric type
  for(let i in fields){
    fieldname = fields[i];
    if(!$.isNumeric(form[fieldname].value)) {
      $('#form-alert').html('<div class="alert alert-danger">Wypełnij pola liczbami</div>');
      return false;
    }
  }

  // x3-x4 let user to write only number 0,1,2
  for(let i=3; i<5; i++){
    fieldname = fields[i];
    if(form[fieldname].value < 0 || form[fieldname].value > 2) {
      $('#form-alert').html('<div class="alert alert-danger">Dla wentylacji: 0-0% | 1-50% | 2-100%</div>');
      return false;
    }
  }

  // x5-x9 - let user to write only 0 or 1
  for(let i=5; i<fields.length; i++){
    fieldname = fields[i];
    if(form[fieldname].value < 0 || form[fieldname].value > 1) {
      $('#form-alert').html('<div class="alert alert-danger">Dla ochorny i zasilania: 0-off | 1-on</div>');
      return false;
    }
  }
  return true;
}

// submit form
$('#submit').click(function(e) {
  // prevent button from default functions
  e.preventDefault();

  // if validation success
  if(validate()){
    // serialize form data into string
    var data = $('#dataform').serialize();

    // do ajax call to the server (send serialized form)
    $.ajax({
      url: './scripts/save.php',
      method: 'POST',
      data: { "data" : data },
      success: function(response) {
        if(response == 'success'){
          $('#form-alert').html('<div class="alert alert-success">Zapisano poprawnie :)</div>');
          $('#dataform')[0].reset();
        }
        else{
          $('#form-alert').html('<div class="alert alert-danger">Wystąpił błąd serwera :(</div>');
        }
      }
    });
  }
});

// while document is loaded
$(document).ready(function() {
  // ajax call to php (retrieve data from db)
  $.ajax({
    url: "./scripts/fetch_data.php",
    method: "GET",
    success: function(response) {

      // parse json data from PHP json to js object
      var res_obj = $.parseJSON(response);

      // temp < 19 - low
      // 19 <= temp < 22 - med
      // temp > 22 - high
      function temp(val){
        var state;
        if(val >= 19){
          val > 22 ? state = "high" : state = "med";
        }
        else{
          state = "low";
        }
        return state;
      }

      // add class to icon wrapper
      $('#temp1').addClass(temp(res_obj[0].x1));
      $('#temp2').addClass(temp(res_obj[0].x2));
      $('#temp3').addClass(temp(res_obj[0].x3));

      // 0 - fan is off
      // 1 - fan spins slow
      // 2 - fan spins fast
      function speed(val){
        var state;
        if(val != 0){
          val != 1 ? state = "fast" : state = "slow";
        }
        else{
          state = "off";
        }
        return state;
      }

      $('#fan1').addClass(speed(res_obj[0].x4));
      $('#fan2').addClass(speed(res_obj[0].x5));

      // 0 - device off
      // 1 - device on
      function onof(val){
        var state;
        val == 1 ? state = "on" : state = "off";
        return state;
      }

      $('#en1').addClass(onof(res_obj[0].x6));
      $('#en2').addClass(onof(res_obj[0].x7));
      $('#lock1').addClass(onof(res_obj[0].x8));
      $('#lock2').addClass(onof(res_obj[0].x9));

      // Draw chart with Chart.js
      var ctx = $('#myChart')[0].getContext('2d');
      var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
          labels: [res_obj[4].date, res_obj[3].date, res_obj[2].date, res_obj[1].date, res_obj[0].date],
          datasets: [
            {
              label: "Serwerownia temp. 1",
              borderColor: '#00ff00',
              backgroundColor: 'transparent',
              data: [res_obj[4].x1, res_obj[3].x1, res_obj[2].x1, res_obj[1].x1, res_obj[0].x1]
            },
            {
              label: "Serwerownia temp. 2",
              borderColor: '#ff0000',
              backgroundColor: 'transparent',
              data: [res_obj[4].x2, res_obj[3].x2, res_obj[2].x2, res_obj[1].x2, res_obj[0].x2]
            },
            {
              label: "Serwerownia temp. 3",
              borderColor: '#0000ff',
              backgroundColor: 'transparent',
              data: [res_obj[4].x3, res_obj[3].x3, res_obj[2].x3, res_obj[1].x3, res_obj[0].x3]
            }
          ]
        },

        // Configuration options go here
        options: {}
      });

    }
  });
});
