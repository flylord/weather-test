<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>City's weather</title>
</head>
<body>

<form action="/weather/get" method="get" id="weather_get_form" novalidate>

    <div>
        <label for="city">Enter a city name</label>
        <input type="text" name="city" id="city" class="required">
    </div>

    <button type="button" id="weather_get_btn">Show</button>

</form>

<div id="results">


</div>

<script src="/assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/assets/node_modules/jquery-form/dist/jquery.form.min.js"></script>
<script src="/assets/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

<script>

  $(function () {

    $('#weather_get_form').validate();

    function cityWeatherRequest(formData, jqForm, options) {
      return $(jqForm).valid();
    }

    function cityWeatherResponse(responseText, statusText, xhr, $form) {

    }

    function cityWeatherError() {

    }

    $('#weather_get_btn').click(function (e) {
      e.preventDefault();

      console.log(1);

      var options = {
        // target: '#results',   // target element(s) to be updated with server response
        beforeSubmit: cityWeatherRequest,
        success: cityWeatherResponse,
        error: cityWeatherError
      };

      $('#weather_get_form').ajaxSubmit(options);

    });

  });

</script>

</body>
</html>
