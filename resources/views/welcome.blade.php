<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
        <h1>Currency Converter</h1>
        
        <form id="currencyConverterForm">
            <label for="fromCurrency">From Currency:</label>
            <select id="fromCurrency" name="fromCurrency">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>
            <label for="toCurrency">To Currency:</label>
            <select id="toCurrency" name="toCurrency">
                <option value="BTC">BTC</option>
                <option value="ETH">ETH</option>
                <option value="XRP">XRP</option>
            </select>
            
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" min="0.01" required>
            
            <button type="submit">Convert</button>
        </form>

        <div id="result"></div>
    </div>

    <script>
        document.getElementById('currencyConverterForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var fromCurrency = document.getElementById('fromCurrency').value;
            var toCurrency = document.getElementById('toCurrency').value;
            var amount = document.getElementById('amount').value;
            
            fetch('/convert/' + fromCurrency + '/' + toCurrency + '/' + amount)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('result').innerHTML = '<p>Error: ' + data.error + '</p>';
                    } else {
                        document.getElementById('result').innerHTML = '<p>Original Amount: ' + data.originalAmount + ' ' + data.fromSymbol + '</p>' +
                                                                      '<p>Converted Amount: ' + data.convertedAmount + ' ' + data.toSymbol + '</p>' +
                                                                      '<p>Exchange Rate: ' + data.rate + '</p>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('result').innerHTML = '<p>Error: Something went wrong.</p>';
                });
        });
    </script>
</body>
</html>
