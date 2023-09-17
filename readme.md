# PHP Deploy Environment

PHP Deploy Environment is a versatile Docker-based development stack that includes Apache, MySQL, PHP, PHPMyAdmin, LDAP (OpenLDAP), and PHPLDAPAdmin. It's designed for easy setup and configuration, making it a convenient choice for PHP developers. This stack is built on features PHP 8.2. Whether you're working on web applications or other PHP projects, this environment simplifies the development and deployment process.

## Technologies

- Docker (Dockerfile, Docker-Compose)
- Apache (you can use your favourite web server)
- PHP
- MySQL (you can replace by another)
- PHPMyAdmin
- LDAP (OpenLDAP)
- PHPLDAPAdmin
- Extensions for PHP (pdo_mysql, ldap)

## Getting Started

First of all, you need to have [docker](https://www.docker.com/) installed (if possible the latest version) and be familiar with its use.
Also you must have some ports free of use:

- 389 (OpenLDAP)
- 6443 (PHPLDAPAdmin)
- 8080 (Apache-PHP)
- 33060 (MySQL)
- 8081 (PHPMyAdmin)

Then follow these steps:

1. Open the terminal (on the repository directory)
2. Put this on the terminal (-d put the process on background, if you close the terminal the process will still be running) :

```bash
  $ docker-compose up -d
```

3. Open your browser
4. Open the URL: [localhost:8080](http://localhost:8080)
5. Now you can change the code inside 'src' folder and will be updated in the server (reload the page)

## Issues

Do you have a problem? Open a new issue on 'Issues' section
