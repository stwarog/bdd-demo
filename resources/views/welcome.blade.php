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
<form method="post">
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

    @if (isset($tax))
        <div style="margin-top: 50px; padding: 30px; border: 5px solid {{ $tax >= 0 ? 'red' : 'green' }};">Twój tax to: <span id="tax">{{ $tax }}</span></div>
    @endif
</form>

</body>

<script lang="java">
    document.addEventListener('DOMContentLoaded', function () {
        var tax = document.getElementById('tax');
        if (tax && parseInt(tax.innerHTML) < 0) {
            alert('Świetnie, dostałeś socjal! Go vote for us!')
        }
    });
</script>
</html>
