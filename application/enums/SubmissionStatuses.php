<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubmissionStatuses
{
    const DRAFT = 1;
    const SUBMIT = 2;
    const ASSIGN_REVIEWER = 3;
    const REVIEW_PROCESS = 4;
    const REVIEWED = 5;
    const GRANTED = 6;
    const NOT_GRANTED = 7;
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
