# Wynd API SFTP Bundle

## Introduction

The purpose of this bundle is:
first to list the files and directories of an sftp server;
then to allow the search of a file or directory through its name;
and finally to allow the search by content.

## Installation

1. Download WyndApiBundle using composer
2. Add WyndApiBundle routing

### 1. Download WyndApiBundle using composer

Require the bundle with composer:

```composer
composer require christyb/sftp-api-bundle
```

### 2. Add WyndApiBundle routing

Add these lines in your `config/routes/routes.yaml`:

```
sftp_api_bundle:
  resource: '@WyndApiBundle/Resources/config/routes.yaml'
  prefix:
```

## Routes

the differents routes availables in this bundle:
- /api/sftp/list
- /api/sftp/list/search?search=
- /api/sftp/list/search/content?word=

## Documentation

- using of phpdocumentor :
```php phpdocumentor.phar -d /path/to/your/project -t /path/to/documentation
```
- creation of the Doxygen configuration file:
```doxygen -g Doxyfile
```
- generation of documentation
```doxygen Doxyfile
```

## Other 

1. No forget environment variables(sftp server)
2. install phpseclib in your project

### 1. sftp
SFTP_HOST= #host of your sftp server
SFTP_PASSWORD= #the password
SFTP_USER= # the user

### 2. phpseclib
composer require phpseclib/phpseclib:~3.0