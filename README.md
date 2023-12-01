<p align="center">
    <a href="https://demo.muhamdaily.com" target="_blank">
        <img src="https://raw.githubusercontent.com/muhamdaily/assets/a8b75b29df010310d7f182d97dafe5de8e9cf48b/laravel-auth.svg" width="400" alt="Logo">
    </a>
</p>

<span align="center">

Authentication implementation uses Laravel Breeze, which has been enhanced and modified with Keen Admin integration to provide an elegant and functional user interface.

![GitHub repo size](https://img.shields.io/github/repo-size/muhamdaily/laravel-auth)
![GitHub contributors](https://img.shields.io/github/contributors/muhamdaily/laravel-auth)
![GitHub stars](https://img.shields.io/github/stars/muhamdaily/laravel-auth?style=social)
![GitHub forks](https://img.shields.io/github/forks/muhamdaily/laravel-auth?style=social)

</span>

## Features
This project makes it easy to:

* Laravel Breeze: Utilizes the power of Laravel Breeze for a robust authentication system.
* Custom Styling: The authentication views have been enhanced with a visually appealing and modern design.
* User-Friendly: Provides a seamless and user-friendly authentication experience.
* Easy to Install: Follow the simple installation steps below to get started.

## Getting started
To install **Laravel Auth**, follow these steps:

Clone the Repository
```bash
git clone https://github.com/muhamdaily/laravel-auth.git
```

Navigate to the Project Directory
```bash
cd laravel-auth
```

Install Dependencies
```bash
composer install
```

Copy the Example Environment File
```bash
cp .env.example .env
```

Generate Application Key
```bash
php artisan key:generate
```

## Configuration
Update the .env file with your database credentials.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DATABASE_NAME
DB_USERNAME=YOUR_USERNAME
DB_PASSWORD=YOUR_PASSWORD
```

Update the .env file with your SMTP email.

```bash
MAIL_MAILER=smtp
MAIL_HOST=YOUR_HOST
MAIL_PORT=YOUR_PORT
MAIL_USERNAME=YOUR_USERNAME
MAIL_PASSWORD=YOUR_PASSWORD
MAIL_ENCRYPTION=YOUR_ENCRYPTION
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Update the .env file with your APi Keys.
```bash
# Github Auth APi Key
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=

# Google Auth APi Key
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
```

## Using
Run Migrations and Seed the Database

```bash
php artisan migrate --seed
```

Run the Development Server
```bash
php artisan serve
```

Open your browser and visit `http://localhost:8000` to access the authentication system.

## Contributing to Laravel Auth
To contribute to **Laravel Auth**, follow these steps:

1. Fork this repository.
2. Create a branch: `git checkout -b <branch_name>`.
3. Make your changes and commit them: `git commit -m '<commit_message>'`
4. Push to the original branch: `git push origin <project_name>/<location>`
5. Create the pull request.

Alternatively see the GitHub documentation on [creating a pull request](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request).

## Contributors

Thanks to the following people who have contributed to this project:

* [@muhamdaily](https://github.com/muhamdaily) 📖

## Contact

If you want to contact me you can reach me at <muhammadmauribi@gmail.com>.

## License
This Laravel Auth repository is open-source software licensed under the [MIT License](LICENSE).
