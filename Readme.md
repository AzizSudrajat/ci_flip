# CodeIngniter - API Disbursement
API Disbursement build on :
- php >= 5.3.*
- codeingniter
- MySQL | JawsMySQL

## Installation
CodeIgniter requires [PHP on XAMPP](https://www.apachefriends.org/download.html) Version 7.* to run.
need [Composer](https://getcomposer.org/download/) Install and Setup.
Install apps and start the server.

```sh
Download or Clone from Github
cp ci_flip_master /Application/XAMPP/htdocs
mv ci_flip_master ci_flip
cd ciflip
composer install
```
Import Database into local MySQL
- Open PHPMyAdmin
- Create Database ci_flip
- tab Import
- Select File ci_flip.sql
- go

## API Endpoint
| METHOD | ENDPOINT | Description |
| ------ | ------ | ------ |
| POST | /api/bankaccount | GET Bank Account Info |
| GET | /api/disbursement | GET ALL Disbursement |
| GET | /api/disbursement/{id} | GET ONE Disbursement  |
| POST | /api/disbursement | CREATE Disbursemenet |
| PUT | /api/disbursement/{id} | PUT Approve / Reject Disbursement |
| GET | /receipt/{filename}.jpg | GET Receipt |

# DEMO
## Example Heroku
| METHOD | ENDPOINT | Description |
| ------ | ------ | ------ |
| GET | https://ciflip.herokuapp.com/api/disbursement | GET ALL Disbursement |
| GET | https://ciflip.herokuapp.com/api/disbursement/{id} | GET ONE Disbursement  |
| POST | https://ciflip.herokuapp.com/api/disbursement | CREATE Disbursemenet |
| PUT | https://ciflip.herokuapp.com/api/disbursement/{id} | PUT Approve / Reject Disbursement |
| GET | https://ciflip.herokuapp.com/receipt/{filename}.jpg | GET Receipt |
## Capture
Image on Directory demo/capture
## Postman Collection
File on Directory demo/postman

## License

MIT
