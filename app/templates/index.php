<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>City's weather</title>
</head>
<body>

<form action="/weather/get" method="get">

  <div>
    <label for="city">Enter a city name</label>
    <input type="text" name="city" id="city">
  </div>

  <button type="submit">Show</button>

</form>

<script src="/assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/assets/node_modules/jquery-form/dist/jquery.form.min.js"></script>

</body>
</html>
