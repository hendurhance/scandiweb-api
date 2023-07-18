# Scandiweb Test Task - Backend

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/hendurhance/scandiweb-api/blob/main/LICENSE)

## Description
Scandiweb Junior Developer Test Task - Backend, using PHP 8.2, MySQL 8.0, and Docker.

## Prerequisites
- [Docker](https://www.docker.com/get-started)
- [PHP 8.2](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [MySQL 8.0](https://dev.mysql.com/downloads/mysql/)
- [Postman](https://www.postman.com/downloads/)

## Installation
1. Clone the repository
```bash
git clone https://github.com/hendurhance/scandiweb-api.git
```
2. Install dependencies
```bash
composer install
```
3. Create a `.env` file from the `.env.example` file
```bash
cp .env.example .env
```
4. Run the application
```bash
php -S localhost:8000 -t public
```


## Usage
### API Endpoints
| Method | Endpoint | Description | Parameters | Body | Response |
| --- | --- | --- | --- | --- | --- |
| GET | /api | Health check | - | - | `{"status":"success","message":"Welcome to Scandi API","data":{"name":"Scandiweb","version":"1.0.0"}}` |
| GET | /api/products | Get all products | - | - | `{"status":"success","message":"Products retrieved successfully","data":[{"sku":"SKU001","name":"Product 1","price":10,"type":"book","weight":2.85},{"sku":"SKU002","name":"Product 2","price":15,"type":"dvd","size":12}]}` |
| POST | /api/products/store | Create a new product | - | `{"sku":"SKU003","name":"Product 3","price":20,"type":"furniture","height":10,"width":20,"length":30}` | `{"status":"success","message":"Product created successfully"}` |
| DELETE | /api/products/delete | Delete a product | `?sku=SKU003,SKU004` | - | `{"status":"success","message":"Product deleted successfully"}` |

## Configuration
### Database
The database configuration can be found in the `.env` file or in the `config/database.php` file. The default configuration is as follows:
```dotenv
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=scandiweb
DB_USERNAME=root
DB_PASSWORD=root
```

### Application
The application configuration can be found in the `.env` file. The default configuration is as follows:
```dotenv
APP_NAME=Scandiweb
APP_VERSION=1.0.0
APP_URL=http://localhost:8000
```

## Development
### Architecture
The application follows the MC (Model-Controller) architecture. The `public/index.php` file is the entry point of the application.
- `app/Controllers` - Contains the application controllers
- `app/Enums` - Contains the application enums
- `app/Factories` - Contains the application factories for resolving Product types
- `app/Models` - Contains the application models
- `app/Repositories` - Contains the application repositories
- `app/Requests` - Contains the application requests for validating requests
- `app/Resources` - Contains the application resources for formatting responses
- `app/helpers.php` - Contains the application helper functions
- `config` - Contains the application configuration files
- `database` - Contains the database migrations and seeds file which is SQL files
- `postman` - Contains the Postman collection and environment files
- `public` - Contains the application entry point
- `routes` - Contains the application routes
- `src` - Contains the application base classes and interfaces

## Testing

## Contributing
Contributions are welcome! Here's how you can contribute to this project:

1. Fork the project
2. Create a new branch: (`git checkout -b feature/AmazingFeature`)
3. Make your changes and commit them: (`git commit -m 'Add some AmazingFeature'`)
4. Push the branch to your forked repository (`git push origin feature/AmazingFeature`)
5. Create a pull request in the original repository.

Please make sure to follow the code style and include appropriate tests and documentation for your changes.

## License
Distributed under the MIT License. See `LICENSE` for more information.