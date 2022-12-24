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

    function cityWeatherResponse(response, statusText, xhr, $form) {

      let container = $('#results');

      if (!$.isEmptyObject(response) && !$.isEmptyObject(response.weather)) {

        $.each(response.weather, function(index, data) {
          console.log(data);
          let mainDiv = $('<div/>');

          let cityHeader = $('<h5/>').append('City Data');
          $(cityHeader).appendTo(mainDiv);

          let cityContainer = $('<span/>').append( '<strong>City: </strong>' + data.city.name + ' | ' + '<strong>Contry: </strong>' + data.city.country );
          $(cityContainer).appendTo(mainDiv);


          let weatherHeader = $('<h5/>').append('Weather Data for: ' + data.weather.current_weather.time);
          $(weatherHeader).appendTo(mainDiv);

          let ul = $('<ul/>').appendTo(mainDiv);
          $('<li/>').append('<strong>Current temperature: </strong>' + data.weather.current_weather.temperature).appendTo(ul);
          $('<li/>').append('<strong>Wind direction: </strong>' + data.weather.current_weather.winddirection).appendTo(ul);
          $('<li/>').append('<strong>Wind speed: </strong>' + data.weather.current_weather.windspeed).appendTo(ul);

          // $(ul).appendTo(mainDiv);


          let seperator = $('<hr/>');
          $(seperator).appendTo(mainDiv);

          $(mainDiv).appendTo(container);
        });
      }
    }

    function cityWeatherError() {

    }

    $('#weather_get_btn').click(function (e) {
      e.preventDefault();

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
