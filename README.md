
# PHP Log Processing Challenge

## Overview
This PHP command-line application processes the `sample-log.txt` file and generates an `output.txt` file with specific details formatted and sorted as per the requirements.

## Project Structure
The project is structured as follows:
```
tests/
  FunctionsTest.php            # PHPUnit tests for the functions in 'functions.php'
vendor/                         # Vendor directory containing dependencies installed by Composer
composer.json                  # Composer configuration file
composer.lock                  # Composer lock file
functions.php                  # Helper file containing functions for parsing and formatting log data
log-processor.php              # Main PHP script for processing the log file
output.txt                     # Generated output file containing processed data
sample-log.txt                 # Input log file (provided in the challenge)
README.md                      # This file
```

## How to Run the Script
1. **Install Dependencies**:
   - Make sure you have [Composer](https://getcomposer.org/) installed.
   - Run the following command to install the required dependencies:

     composer install
 
2. **Run the Script**:
   - Make sure the `sample-log.txt` file is in the same directory as `log-processor.php`.
   - Execute the script using PHP:

     php log-processor.php

   - The processed data will be saved to `output.txt` in the same directory.

## How to Run PHPUnit Tests
1. **Install PHPUnit**:
   - If you haven’t already installed PHPUnit, run the following command to install it using Composer:
   
     composer install

2. **Run the PHPUnit Tests**:
   - To run the tests for your functions, use the following command:

     ./vendor/bin/phpunit tests/FunctionsTest.php or  ./vendor/bin/phpunit tests
    
   - The test results will be displayed in the terminal.

## Expected Output Format
The generated `output.txt` will contain:
1. **A pipe-delimited version of the log**: <UserID>|<BytesTX>|<BytesRX>|<DateTime>|<ID>
2. **A sorted list of IDs** in ascending order.
3. **A sorted list of unique UserIDs** with each ID indexed (e.g., `[1] <UserID>`).

## Requirements
- **Whitespaces** in the field values should be removed.
- **BytesTX and BytesRX fields** should be formatted with commas as thousand separators.
- **DateTime field** should be formatted as: Tue, 04 March 2025 00:00:00



## Notes
- The program removes whitespaces from field values and formats the Bytes fields with commas.
- The DateTime field is formatted as per the requirements.
- The output file is generated in the same directory as the script.
- The PHPUnit tests for the functions are included in the `tests/` directory.
- The `sample-log.txt` file is provided in the same directory as the script.
- The `output.txt` file is generated after running the script.
- The `README.md` file contains instructions for running the script and PHPUnit tests.
- The `composer.json` and `composer.lock` files are included for dependency management using Composer.
- The `functions.php` file contains helper functions for parsing and formatting log data.
- The `log-processor.php` file is the main script that processes the log file.
- The `tests/FunctionsTest.php` file contains PHPUnit tests for the functions in `functions.php`.
- The `sample-log.txt` file is provided in the same directory as the script.


## Contact
For any questions, you can reach me at **habibonfaizer6@gmail.com** or **09356183463** via phone.

Thank you for considering my application.
