<?php

use Muhammad\CompanyEmailValidator\EmailValidator;


it('should return false for an empty email', function (): void {
    $email = "";
    $validator = new EmailValidator();
    $validateEmail = $validator->isCompanyEmail($email);

    expect($validateEmail)->toBeFalse();
});

it('should return false for a non-email string', function (): void {
    $email = "just a random string";
    $validator = new EmailValidator();
    $validateEmail = $validator->isCompanyEmail($email);

    expect($validateEmail)->toBeFalse();
});

it('should return true if email does not belongs to a public email provider', function (): void {
    $email = "test@utterly.app";

    $validator = new EmailValidator();
    $validateEmail = $validator->isCompanyEmail($email);

    expect($validateEmail)->toBeTrue(); 
});


it('should return false if email belongs to a public email provider', function (): void {
    $email = "coddy@gmail.com";
    $validator = new EmailValidator();
    $validateEmail = $validator->isCompanyEmail($email);

    expect($validateEmail)->toBeFalse(); 
});


it('should return false for a user-defined free email provider', function (): void {
    $email = "user@customfree.com";
    $validator = new EmailValidator(['customfree.com']); 
    $validateEmail = $validator->isCompanyEmail($email);

    expect($validateEmail)->toBeFalse();
});

