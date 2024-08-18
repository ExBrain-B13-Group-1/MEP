<?php
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../Model/MInstituteFaqs.php';

$minstituteFaqs = new MInstituteFaq();
$instituteFaqs = $minstituteFaqs->getAll();


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['updateUserFaq'])) {
//         // Update FAQ
//         $id = $_POST['id'];
//         $title = $_POST['title'];
//         $description = $_POST['description'];

//         $success = $muserFaqs->updateFaqs($id, $title, $description);
//         if ($success) {
//             $_SESSION['notification_message'] = "FAQ Contents Updated Successfully.";
//         } else {
//             $_SESSION['notification_message'] = "Failed to update FAQ contents.";
//         }
//         header("Location: ../View/resources/faq.php");
//         exit();
//     }

//     if (isset($_POST['deleteUserFaq'])) {
//         // Delete FAQ
//         $id = $_POST['id'];
//         $success = $muserFaqs->deleteFaq($id);
//         if ($success) {
//             $_SESSION['notification_message'] = "FAQ Contents Deleted Successfully.";
//         } else {
//             $_SESSION['notification_message'] = "Failed to delete FAQ contents.";
//         }
//         header("Location: ../View/resources/faq.php");
//         exit();
//     }
// }
?>
