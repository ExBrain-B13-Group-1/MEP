<?php
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../Model/MUserFaqs.php';

$muserFaqs = new MUserFaq();
$userFaqs = $muserFaqs->getAll();


