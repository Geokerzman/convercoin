# Currency Converter

This is a simple currency converter application built with Laravel. It allows users to convert an amount from one currency to another, using real-time exchange rates from the CoinAPI.

## Features

- Fetches real-time exchange rates from CoinAPI.
- Converts an amount from one currency to another.
- Responsive and user-friendly interface.

## Backend (Server-side)

### Controllers

#### `CryptoCurrencyController`

- `/show/{symbol}`: Retrieves the current price of the selected cryptocurrency.
- `/convert`: Accepts data for currency conversion, sends a request to the CoinAPI, and returns the conversion result.

### Services

#### `CryptoCurrencyService`

- `getPrice($symbol)`: Performs a GET request to the CoinAPI to get the current price of the selected cryptocurrency.
- `convertCurrency($fromSymbol, $toSymbol, $amount)`: Performs a GET request to the CoinAPI to get the exchange rate, and then converts the amount from one currency to another.

## Frontend (Client-side)

### HTML Page

#### `welcome.blade.php`

- Currency conversion form: Allows the user to select the source and target currency, enter an amount, and click the "Convert" button.
- Conversion result display: Displays the conversion results below the form.

### CSS Styles

- Simple CSS styles to improve the appearance of the page.

## Docker

The project can be run in Docker containers using `docker-compose.yml`.

- **PHP Container (`app`)**: Includes PHP and all necessary dependencies, including Composer.
- **MySQL Container (`db`)**: Runs a MySQL database to store application data.

## How Currency Conversion Works?

1. The user fills out the form on the page and clicks the "Convert" button.
2. JavaScript handles the form submission and collects the data (source currency, target currency, amount).
3. JavaScript makes an AJAX request to the `/convert` endpoint of the backend, passing the collected data.
4. The backend receives the data, sends a request to the CoinAPI to get the exchange rate, and then performs the conversion.
5. The backend returns the conversion result in JSON format.
6. JavaScript processes the response and displays the conversion results on the page.

## What's Next?

After running the project in Docker containers and verifying its functionality, you can:

- Improve the user interface: Add more styles and make the interface more attractive.
- Add new features: For example, conversion history, currency rate charts, etc.
- Optimize and scale: Optimize the code and scale the project to handle a large number of users.

Feel free to contribute to this project or use it as a basis for your own currency converter application!
