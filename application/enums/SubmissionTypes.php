<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubmissionTypes
{
    const PROCEEDING = 1;
    const INTERNATIONAL_JOURNAL = 2;
    const NATIONAL_JOURNAL = 3;
    const INTELLECTUAL_PROPERTY = 4;
    const BOOK = 5;
}

// Example usage:
//$selectedOption = 'Option 2';

// if ($selectedOption === SubmissionTypes::OPTION_1) {
//     echo 'Option 1 is selected.';
// } elseif ($selectedOption === SubmissionTypes::OPTION_2) {
//     echo 'Option 2 is selected.';
// } elseif ($selectedOption === SubmissionTypes::OPTION_3) {
//     echo 'Option 3 is selected.';
// } else {
//     echo 'Invalid option selected.';
// }
