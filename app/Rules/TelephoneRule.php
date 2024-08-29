<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TelephoneRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Enlève les espaces et les signes "+" du numéro pour une validation plus facile
        $cleanedValue = str_replace([' ', '+'], '', $value);

        // Vérifie que le numéro de téléphone ne contient que des chiffres
        if (!preg_match('/^\d+$/', $cleanedValue)) {
            $fail('Le numéro de téléphone ne doit contenir que des chiffres.');
            return;
        }

        // Vérifie que la longueur totale du numéro est raisonnable (entre 10 et 15 chiffres)
        if (strlen($cleanedValue) < 10 || strlen($cleanedValue) > 15) {
            $fail('Le numéro de téléphone doit contenir entre 10 et 15 chiffres.');
            return;
        }

        // Exemple de validation du format pour le Sénégal : +221 XXXXXXXX
        // Vous pouvez adapter cette expression régulière pour d'autres formats de numéros de téléphone
        if (!preg_match('/^\+221\d{8}$/', $value) && !preg_match('/^221\d{8}$/', $value)) {
            $fail('Le numéro de téléphone doit être au format +221 XXXXXXXX ou 221 XXXXXXXX.');
            return;
        }
    }
}
