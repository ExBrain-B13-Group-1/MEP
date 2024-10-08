<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstructors
{

    /**
     * this method is used for get all instructors records from database
     */
    public function getAllInstructors($id)
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_instructors 
                WHERE m_instructors.institute_id = :id 
                AND m_instructors.del_flg != 1"
            );
            $sql->bindValue(":id",$id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function searchInstructorByName($id,$name)
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_instructors 
                LEFT JOIN m_classes ON m_classes.id = m_instructors.id
                WHERE m_instructors.institute_id = :id 
                AND m_instructors.del_flg != 1
                AND m_instructors.full_name LIKE :name"
                
            );
            $sql->bindValue(":id",$id);
            $sql->bindValue(":name", '%' . $name . '%');
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * this method is used for get all instructor's name from database to use in 'select option'
     */
    public function getAllInstructorNames($instituteID){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT m.id,m.full_name FROM m_instructors AS m
                WHERE m.institute_id = :id AND m.del_flg != 1"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getRelatedClasses($instructorId){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare("SELECT id,c_title FROM m_classes WHERE instructor_id = :instructorId");
            $sql->bindValue(':instructorId', $instructorId);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getLatestInstructorID($instituteID){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mi.instructor_sr_no FROM m_instructors AS mi
                WHERE mi.institute_id = :id
                ORDER BY mi.instructor_sr_no DESC LIMIT 1"
            );
            $sql->bindValue(":id", $instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                return $results[0]['instructor_sr_no'];
            } else {
                return "I1000";
            }
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function recentCreatedInstructorId($generateInstructorId,$instituteid){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mi.id FROM m_instructors AS mi
                WHERE mi.instructor_sr_no = :id AND mi.institute_id = :instituteid"
            );
            $sql->bindValue(":id",$generateInstructorId);
            $sql->bindValue(":instituteid",$instituteid);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['id'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function viewDetailsInstructor($id){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mi.*, 
                sr.name AS state_region_name,
                ci.name AS city_name
                FROM m_instructors AS mi
                LEFT JOIN state_regions AS sr ON mi.state_region_id = sr.id
                LEFT JOIN citys AS ci ON mi.city_id = ci.id
                WHERE mi.id = :id"
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function addInstructor(array $instructordatas){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            
            $instructorid = $instructordatas['instructorid'];
            $photo = $instructordatas['photo'];
            $fullname = $instructordatas['fullname'];
            $professional = $instructordatas['professional'];
            $email = $instructordatas['email'];
            $phone = $instructordatas['phone'];
            $dob = $instructordatas['dob'];
            $gender = $instructordatas['gender'];
            $address = $instructordatas['address'];
            $stateregion = $instructordatas['stateregion'];
            $city = $instructordatas['city'];
            $bio = $instructordatas['bio'];
            $education = $instructordatas['education'];
            $experience = $instructordatas['experience'];
            $skills = $instructordatas['skills'];
            $linkedin = $instructordatas['linkedin'];
            $portfolio = $instructordatas['portfolio'];
            $instituteid = $instructordatas['instituteid'];

            $sql = $pdo->prepare(
                "INSERT INTO m_instructors (
                    instructor_sr_no,
                    institute_id,
                    full_name,
                    position,
                    email,
                    phone,
                    date_of_birth,
                    gender,
                    address,
                    state_region_id,
                    city_id,
                    profile_picture,
                    bio,
                    education,
                    experience,
                    linkedin,
                    portfolio,
                    skills
                ) VALUES (
                    :instructorid,
                    :instituteid,
                    :fullname,
                    :position,
                    :email,
                    :phone,
                    :dob,
                    :gender,
                    :address,
                    :stateregionid,
                    :cityid,
                    :profilepicture,
                    :bio,
                    :education,
                    :experience,
                    :linkedin,
                    :portfolio,
                    :skills
                )"
            );
            
            // Bind parameters
            $sql->bindValue(':instructorid', $instructorid);
            $sql->bindValue(':instituteid', $instituteid);
            $sql->bindValue(':fullname', $fullname);
            $sql->bindValue(':position', $professional);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':phone', $phone);
            $sql->bindValue(':dob', $dob);
            $sql->bindValue(':gender', $gender);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':stateregionid', $stateregion);
            $sql->bindValue(':cityid', $city);
            $sql->bindValue(':profilepicture', $photo);
            $sql->bindValue(':bio', $bio);
            $sql->bindValue(':education', $education);
            $sql->bindValue(':experience', $experience);
            $sql->bindValue(':linkedin', $linkedin);
            $sql->bindValue(':portfolio', $portfolio);
            $sql->bindValue(':skills', $skills);
            
            // Execute the query
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    public function modifyInstructor(array $instructordatas, $id) {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            
            // Extract instructor data from the array
            $photo = $instructordatas['photo'];
            $fullname = $instructordatas['fullname'];
            $professional = $instructordatas['professional'];
            $email = $instructordatas['email'];
            $phone = $instructordatas['phone'];
            $dob = $instructordatas['dob'];
            $gender = $instructordatas['gender'];
            $address = $instructordatas['address'];
            $stateregion = $instructordatas['stateregion'];
            $city = $instructordatas['city'];
            $bio = $instructordatas['bio'];
            $education = $instructordatas['education'];
            $experience = $instructordatas['experience'];
            $skills = $instructordatas['skills'];
            $linkedin = $instructordatas['linkedin'];
            $portfolio = $instructordatas['portfolio'];
    
            // Update query
            $sql = $pdo->prepare(
                "UPDATE m_instructors SET
                    full_name = :fullname,
                    position = :position,
                    email = :email,
                    phone = :phone,
                    date_of_birth = :dob,
                    gender = :gender,
                    address = :address,
                    state_region_id = :stateregionid,
                    city_id = :cityid,
                    profile_picture = :profilepicture,
                    bio = :bio,
                    education = :education,
                    experience = :experience,
                    linkedin = :linkedin,
                    portfolio = :portfolio,
                    skills = :skills
                WHERE m_instructors.id = :id"
            );
            
            // Bind parameters
            $sql->bindValue(':fullname', $fullname);
            $sql->bindValue(':position', $professional);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':phone', $phone);
            $sql->bindValue(':dob', $dob);
            $sql->bindValue(':gender', $gender);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':stateregionid', $stateregion);
            $sql->bindValue(':cityid', $city);
            $sql->bindValue(':profilepicture', $photo);
            $sql->bindValue(':bio', $bio);
            $sql->bindValue(':education', $education);
            $sql->bindValue(':experience', $experience);
            $sql->bindValue(':linkedin', $linkedin);
            $sql->bindValue(':portfolio', $portfolio);
            $sql->bindValue(':skills', $skills);
            $sql->bindValue(':id', $id);
    
            // Execute the query
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // Handle the error
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    public function instructorQualifiedForDelete($instructorid,$instituteid) {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();

            // Check if the instructor is associated with any classes that are not completed
            $sql = $pdo->prepare(
                "SELECT COUNT(*) AS class_count
                    FROM m_classes AS c
                    INNER JOIN c_status AS cs ON cs.id = c.c_status_id
                    WHERE c.instructor_id = :instructorid
                    AND c.institute_id = :instituteid
                    AND cs.status != 'Completed' 
                    AND c.del_flg != 1"
            );
            $sql->bindValue(':instructorid', $instructorid);
            $sql->bindValue(':instituteid', $instituteid);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            if ($result['class_count'] > 0) {
                // Instructor is associated with classes that are not completed
                return false;
            } else {
                // Instructor is not associated with any classes or all associated classes are completed
                return true;
            }
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function updateDeleteFlagUpdate($instructorid,$instituteid){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "UPDATE m_instructors SET del_flg = 1 
                WHERE id = :instructorid
                AND institute_id = :instituteid
                "
            );
            $sql->bindValue(':instructorid', $instructorid);
            $sql->bindValue(':instituteid', $instituteid);
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function topFiveInstructors($id){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT 
                    mi.id,
                    mi.full_name AS instructor_name, 
                    mi.gender,
                    mi.position, 
                    COUNT(mc.id) AS class_count
                FROM 
                    m_instructors AS mi
                INNER JOIN 
                    m_classes AS mc 
                    ON mi.id = mc.instructor_id
                WHERE 
                    mi.institute_id = :id AND mi.del_flg = 0
                GROUP BY 
                    mi.id, mi.full_name, mi.gender, mi.position
                ORDER BY 
                    class_count DESC 
                LIMIT 5;"
            );
            $sql->bindValue(':id', $id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


}