<?php

require_once 'functions.php';

$inputFile = 'sample-log.txt';
$outputFile = 'output.txt';

// Check if input file exists
if (!file_exists($inputFile)) {
    echo "Error: Input file '$inputFile' not found\n";
    exit(1);
}

// Arrays to store data
$logEntries = [];
$ids = [];
$userIds = [];

// Read and process the file
$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    $parsed = parseLine($line);

    if (in_array('', $parsed)) continue; // skip if any field is missing

    $formattedTx = formatBytes($parsed['bytesTx']);
    $formattedRx = formatBytes($parsed['bytesRx']);
    $formattedDate = formatDateTime($parsed['dateTime']);

    if (!$formattedDate) continue; // skip invalid date

    $logEntries[] = "{$parsed['userId']}|$formattedTx|$formattedRx|$formattedDate|{$parsed['id']}";
    $ids[] = $parsed['id'];
    $userIds[$parsed['userId']] = true;
}

// Sort IDs naturally
usort($ids, 'strnatcmp');

// Sort UserIDs
$userIdsSorted = array_keys($userIds);
sort($userIdsSorted);

// Assign numbers to UserIDs
$userIdsWithIndex = [];
foreach ($userIdsSorted as $index => $userId) {
    $userIdsWithIndex[] = "[" . ($index + 1) . "] $userId";
}

// Write to output
$output = fopen($outputFile, 'w');
if ($output === false) {
    echo "Error: Could not create output file '$outputFile'\n";
    exit(1);
}

// Write processed log
foreach ($logEntries as $entry) {
    fwrite($output, "$entry\n");
}

// Write sorted IDs
fwrite($output, "\n\n");
foreach ($ids as $id) {
    fwrite($output, "$id\n");
}

// Write sorted UserIDs with index
fwrite($output, "\n\n");
foreach ($userIdsWithIndex as $userId) {
    fwrite($output, "$userId\n");
}

fclose($output);
echo "Processing complete. Output written to $outputFile\n";
