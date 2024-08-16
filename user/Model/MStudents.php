<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MStudent
{
    /**
     * (Get Student ID)
     */
    public function getStudentId($email)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT m_students.id
                 FROM m_students
                 WHERE m_students.email = :email"
            );

            $sql->bindValue(":email", $email);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Get Student Enrolled Classes with their respective instructor, institute)
     */
    public function getDetailsEnrolled($id)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            
            // Initialize an array to store the results
            $details = [];
    
            // Step 1: Get all class IDs related to the student
            $sql1 = $pdo->prepare("
                SELECT class_id
                FROM t_student_classes_enroll
                WHERE student_id = :id
            ");
            $sql1->bindValue(':id', $id, PDO::PARAM_INT);
            $sql1->execute();
            
            // Fetch and debug class IDs
            $class_ids = $sql1->fetchAll(PDO::FETCH_COLUMN);
    
            // Check if there are any class IDs
            if (!empty($class_ids)) {
                foreach ($class_ids as $class_id) {
                    // Step 2: Get class details using class_id
                    $sql2 = $pdo->prepare("
                        SELECT c_title, instructor_id, institute_id, start_date, end_date
                        FROM m_classes
                        WHERE id = :class_id
                    ");
                    $sql2->bindValue(':class_id', $class_id, PDO::PARAM_INT);
                    try {
                        $sql2->execute();
                    } catch (PDOException $e) {
                        echo "SQL Error: " . htmlspecialchars($e->getMessage()) . "<br>";
                    }
                    
                    // Fetch and debug class details
                    $class = $sql2->fetch(PDO::FETCH_ASSOC);
    
                    if ($class) {
                        // Step 3: Get instructor details
                        $stmt = $pdo->prepare("
                            SELECT full_name, profile_picture
                            FROM m_instructors
                            WHERE id = :instructor_id
                        ");
                        $stmt->bindValue(':instructor_id', $class['instructor_id'], PDO::PARAM_INT);
                        $stmt->execute();
                        
                        // Fetch and debug instructor details
                        $instructor = $stmt->fetch(PDO::FETCH_ASSOC);
    
                        // Step 4: Get institute details
                        $stmt = $pdo->prepare("
                            SELECT name
                            FROM m_institutes
                            WHERE id = :institute_id
                        ");
                        $stmt->bindValue(':institute_id', $class['institute_id'], PDO::PARAM_INT);
                        $stmt->execute();
                        
                        // Fetch and debug institute details
                        $institute = $stmt->fetch(PDO::FETCH_ASSOC);
    
                        // Add the details to the array
                        $details[] = [
                            'class_name' => $class['c_title'] ?? 'N/A',
                            'start_date' => $class['start_date'] ?? 'N/A',
                            'end_date' => $class['end_date'] ?? 'N/A',
                            'instructor_name' => $instructor['full_name'] ?? 'N/A',
                            'instructor_profile' => $instructor['profile_picture'] ?? 'N/A',
                            'institute_name' => $institute['name'] ?? 'N/A'
                        ];
                    }
                }
            }
            // Return the details array
            return $details;
            
        } catch (\Throwable $th) {
            // Handle errors
            echo "Unexpected Error Occurs! " . htmlspecialchars($th->getMessage());
            return [];
        }
    }
    
    
    
}
