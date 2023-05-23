<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        //when the restaurant is open
        $earliestTime = Carbon::createFromTimeString('14:00');
        //when the restaurant closes
        $latestTime = Carbon::createFromTimeString('22:00');

        if(!($pickupTime->between($earliestTime, $latestTime))){
            $fail('You must choose a time between 14:00 - 22:00');
        }
    }
}
