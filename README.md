# Database assignment

This repository contains a working setup with PHP and MySQL using Docker.

## Getting started

1. Download [Docker Desktop](https://www.docker.com/products/docker-desktop)
2. Follow the installation instructions (step 1 - 8) from [this page](https://docs.docker.com/desktop/windows/wsl/#install).
5. Clone this repository in your Ubuntu WSL instance:
```bash
$ git clone git@gitlab.com:keepgettingbetter/assignment-2-your-name.git
```

6. Now cd into this directory and start the Docker containers:
```bash
   $ cd assignment-2-your-name
   $ docker-compose up -d
```
7. Be patient, get a coffee. First time will take a while.
8. If you now go to http://localhost you should see the page.

## Administrating the database

1. In PhpStorm, on the right hand side, Click "Database".
2. Then click "+" ->  "Data Source" -> "MySQL"
3. Configure the following values:
   1. Host: `localhost`
   2. User:  `student`
   3. Password: `letmein`
   4. Database: `assignment`
   5. Click "Test Connection", this should succeed.
   6. Click "Save".
