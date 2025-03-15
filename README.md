# **Company Email Validator**  
A fast and efficient company/work email validator that checks if an email domain belongs to a free email provider.  

[![Packagist Version](https://img.shields.io/packagist/v/devmuhammad/company-email-validator)](https://packagist.org/packages/devmuhammad/company-email-validator)  [![Total Downloads](https://img.shields.io/packagist/dt/devmuhammad/company-email-validator)](https://packagist.org/packages/devmuhammad/company-email-validator)  [![License](https://img.shields.io/packagist/l/devmuhammad/company-email-validator)](https://packagist.org/packages/devmuhammad/company-email-validator)  

---

## **Installation**  
Install via Composer:  

```bash
composer require devmuhammad/company-email-validator

```

## Usage

#### Validate a single email

```php

    use Muhammad\CompanyEmailValidator\EmailValidator;

    $validator = new EmailValidator();
    $validator->isCompanyEmail("test@utterly.app");  //true
    $validator->isCompanyEmail("test@gmail.com");  //false

```

#### Validate multiple emails

```php
    use Muhammad\CompanyEmailValidator\EmailValidator;

    $validator = new EmailValidator();
    $validator->areCompanyEmails(["test@utterly.app", "test@gmail.com"]);  
 
    Output(array):
        [
            "test@utterly.app" => true,
            "test@gmail.com" => false
        ]
```

#### Validate emails against a custom free domain list

```php
    use Muhammad\CompanyEmailValidator\EmailValidator;

    $email = "user@customfree.com";
    $validator = new EmailValidator(['customfree.com']); 
    $validator->isCompanyEmail($email);  //false

```

## Contribution

Contributions are welcome! Feel free to submit an issue or a pull request. 

Check the ``LICENSE`` file for more info.