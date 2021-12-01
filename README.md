# Database assignment

This repository contains a working setup with PHP and MySQL using Docker.

## Getting started

1. Download [Docker Desktop](https://www.docker.com/products/docker-desktop)
2. Follow the installation instructions (step 1 - 8) from [this page](https://docs.docker.com/desktop/windows/wsl/#install).
3. Go to this repository on [Gitlab.com](https://gitlab.com/keepgettingbetter/assignment-setup)
4. Click the "Fork" button in the top right corner and call the new repository `assignment-2`.
5. Clone the forked repository in your Ubuntu WSL instance:
```bash
$ git clone git@gitlab.com:your-username/assignment-2.git
```

6. Now cd into this directory and start the Docker containers:
```bash
   $ cd assignment-2
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