<?php

declare(strict_types=1);

namespace Muhammad\CompanyEmailValidator;

class EmailValidator
{
    private array $freeEmailProviderDomains;

    public function __construct(private array $userDefinedFreeEmailProviderDomains = [])
    {
        $defaultDomains = json_decode(file_get_contents(__DIR__ . '/data/free_email_provider_domains.json'), true);
        
        // Merge built-in domains with user-provided ones
        $this->freeEmailProviderDomains = array_merge($defaultDomains, $userDefinedFreeEmailProviderDomains);
    }

    private function validate(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isCompanyEmail(string $email): bool
    {
        if (!$this->validate($email)) {
            return false;
        }

        $domain = explode('@', $email)[1];

        return !in_array($domain, $this->freeEmailProviderDomains);
    }
    
    /**
     * Validate multiple emails at once.
     *
     * @param array $emails List of emails to validate.
     * @return array Associative array with email as key and validation result as value.
     */
    public function areCompanyEmails(array $emails): array
    {
        $results = [];
    
        foreach ($emails as $email) {
            if (!$this->validate($email)) {
                $results[$email] = false; // Invalid email format
                continue;
            }
    
            $results[$email] = $this->isCompanyEmail($email);
        }
    
        return $results;
    }
    
}
