<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <style>
        body {
            padding: 10px;
        }
    </style>
</head>
<body>
<form action="/" method="post">
    <h1>Pro calculator</h1>
    <label for="metoda">Metoda podatkowa</label>
    <select name="metoda" id="metoda">
        <option{{ @$metoda === 'one' ? ' selected' : '' }} value="one">One</option>
        <option{{ @$metoda === 'two' ? ' selected' : '' }} value="two">Two</option>
    </select>

    <hr>

    <label for="dochod">Dochód</label>
    <input name="dochod" type="text" value="{{ $dochod ?? 10000 }}"/>

    <hr>

    <button type="submit">Oblicz ile zwortu podatku</button>

    @if (@$tax)
        <div style="margin-top: 50px; padding: 30px; border: 5px solid {{ $tax >= 0 ? 'red' : 'green' }};">Twój tax to: {{ $tax }}</div>
    @endif
</form>

</body>
</html>
