# SPARTAN
PHP Framework (FEP)

This PHP framework is for people interested in learning PHP or understanding how a PHP-Framework works. It displays the core functionalities of a framework to set up a website with a database connection. The structure of this framework should make it easy for anyone to switch to a full qualified framework like Symfony.


## Installation

### 1. Download Project

**Attention:** The sourcecode should be directly installed by the 
webserver's user to avoid access right issues. Alternativly see '2'.

```bash
git clone https://github.com/pmaasz/SPARTAN.git
```

### 2. Configutrate Access Rights (not required)

```bash
sudo chown www-data:www-data [Filename] -R
sudo chmod 2775 [Filename] -R
```

### 3. Upload Database Structure

Upload the spartan.sql file into your mysql application

### 4. create config.json

The config.json file has to be created in the config directory.
Fill out the missing parameters for user and password.

```bash
{
    "database":{
        "driver": "mysql",
        "user": "",
        "password": "",
        "dbname": "spartan",
        "host": "localhost"
    }
}
```

### 5. what's missing?
+ Entity Manager
+ Manage database via entity manager
