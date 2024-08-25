<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MClasses
{
    public function getAllCategories()
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT cate.id,cate.cat_name AS cat_name FROM m_categories AS cate"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getAllPopularClasses()
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                    mit.name AS institute_name,
                    mi.full_name AS instructor_name,
                    mc.cat_name AS category_name,
                    cs.status AS class_status,
                    COUNT(e.student_id) AS enrollments_count
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN t_student_classes_enroll AS e ON c.id = e.class_id
                WHERE c.c_status_id = 1 AND c.del_flg = 0
                GROUP BY c.id
                ORDER BY enrollments_count DESC;"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getAllNewClasses()
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                    mit.name AS institute_name,
                    mi.full_name AS instructor_name,
                    mc.cat_name AS category_name,
                    cs.status AS class_status
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                WHERE c.c_status_id = 1 AND c.del_flg = 0
                ORDER BY c.create_date DESC;"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getAllTrendingClasses()
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                    mit.name AS institute_name,
                    mi.full_name AS instructor_name,
                    mc.cat_name AS category_name,
                    cs.status AS class_status,
                    COUNT(e.student_id) AS recent_enrollments
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN t_student_classes_enroll AS e ON c.id = e.class_id
                WHERE c.c_status_id = 1 AND c.del_flg = 0
                AND e.create_date >= DATE_SUB(NOW(), INTERVAL 15 DAY)
                AND c.create_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)  
                GROUP BY c.id
                HAVING COUNT(e.student_id) > 0  
                ORDER BY recent_enrollments DESC;"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function viewDetailsClass($id)
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*, 
                mc.cat_name AS category_name,
                mit.photo AS i_photo,
                mit.name AS institute_name,
                mit.email AS i_email,
                mit.address AS i_address,
                mit.contact AS i_phone,
                cs.status AS class_status,
                mi.profile_picture AS instructor_photo,
                mi.full_name AS instructor_name,
                mi.position AS instructor_position,
                mi.bio AS instructor_bio,
                mi.education AS instructor_edu,
                mi.experience AS instructor_exp,
                mi.address AS instructor_address,
                mi.email AS instructor_email,
                mi.skills AS instructor_skills,
                mi.linkedin AS instructor_linkedin,
                mi.portfolio AS instructor_portfolio
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                WHERE c.id = :id AND c.del_flg = 0;"
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connections
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getClassesByCategory($category)
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                    mc.cat_name AS category_name,
                    mi.full_name AS instructor_name,
                    mit.name AS institute_name,
                    cs.status AS class_status
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                WHERE c.cate_id = :cate_id AND c.del_flg = 0"
            );
            $sql->bindValue(":cate_id", $category);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connections
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getClassesByTitle($title)
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                    mc.cat_name AS category_name,
                    mi.full_name AS instructor_name,
                    mit.name AS institute_name,
                    cs.status AS class_status
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                WHERE c.c_title LIKE :title AND c.del_flg = 0"
            );
            $sql->bindValue(":title", "%" . $title . "%");
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connections
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getStudentsAlsoEnrolled()
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                    mit.name AS institute_name,
                    mi.full_name AS instructor_name,
                    mc.cat_name AS category_name,
                    cs.status AS class_status,
                    COUNT(e.student_id) AS enrollments_count
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN t_student_classes_enroll AS e ON c.id = e.class_id
                WHERE c.c_status_id = 1 AND c.del_flg = 0
                GROUP BY c.id
                ORDER BY enrollments_count DESC LIMIT 10"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }
}
