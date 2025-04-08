<?php

function formatBytes($bytes) {
    return number_format((int)trim($bytes), 0, '', ',');
}

function formatDateTime($datetime) {
    $dateObj = DateTime::createFromFormat('Y-m-d H:i', trim($datetime));
    if ($dateObj === false) return false;
    return $dateObj->format('D, d F Y H:i:s');
}

function parseLine($line) {
    $id = trim(substr($line, 0, 12));
    $userId = trim(substr($line, 12, 6));
    $bytesTx = trim(substr($line, 18, 8));
    $bytesRx = trim(substr($line, 26, 8));
    $dateTime = trim(substr($line, 34, 17));

    return compact('id', 'userId', 'bytesTx', 'bytesRx', 'dateTime');
}
