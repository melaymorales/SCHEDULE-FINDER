<?php

class Model extends Database
{
   

    public function __construct()
    {
        if(!property_exists($this,'table')){
            $this->table = strtolower($this::class) . 's';
        }
    }

    public function findAll(){
        // $query = "select * from users";
        $query = "select * from $this->table ORDER BY id DESC";
        $result =$this->query($query);

        if($result){
            return $result;
        }
        return false;
    }

    public function findAll_Page($col,$offset_course){
        // $query = "select * from users";
        // $query = "select * from $this->table ORDER BY $col DESC";
        // $result =$this->query($query);

        // if($result){
        //     return $result;
        // }
        $limit =10;
        $query = "select * from $this->table ORDER BY $col DESC LIMIT $offset_course, $limit";
        $result =$this->query($query);

        if($result){
            return $result;
        }

        // $sql_count_course = "SELECT COUNT(*) AS count FROM `course-shs-tbl`";
        // $result_count_course = $con->query($sql_count_course);
        // $row_count = $result_count_course->fetch_assoc();
        // $total_records_course = $row_count['count'];
        // $total_pages_course = ceil($total_records_course/ $limit);
        return false;
    }


    public function count_page(){
        $query = "select COUNT(*) as count from $this->table";
        $result =$this->query($query);
        if($result){
            return $result;
        }
        return false;
    }

    public function where($data, $data_not = []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query ="select * from $this->table where ";

        foreach ($keys as $key){
            $query .= $key ."= :".$key." && ";
        }

        foreach ($keys_not as $key){
            $query .= $key ."!= :".$key." && ";
        }

        $query = trim($query, ' && ' );
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);

        if($result){
            return $result;
        }

        return false;
    }

    public function course_search($getinput){

        $query = "SELECT * FROM $this->table WHERE CONCAT(`course`, `acronym`) LIKE :searchTerm";
        $data = [':searchTerm' => "%$getinput%"];

        $result = $this->query($query, $data);

        if ($result) {
            return $result;
        }

        return  $result;
    }

    public function search_course_year($getinput,$getyear){
        $query = "SELECT * FROM $this->table WHERE CONCAT(`course`, `acronym`) LIKE :searchTerm AND `year` LIKE :yearTerm";
        $data = [
            ':searchTerm' => "%$getinput%",
            ':yearTerm' => "%$getyear%",
        ];

        $result = $this->query($query, $data);

        if ($result) {
            return $result;
        }

        return false;

    }

    public function course_year($getyear){
        $query = "SELECT * FROM $this->table WHERE `year` = :yearTerm";
        $data = [':yearTerm' => $getyear ];

        $result = $this->query($query, $data);

        if ($result) {
            return $result;
        }

        return false;

    }


    public function insert($data){
        $newValues="";
       // show($data);
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_keys($data));
        $values = explode(",",$values);

        foreach($values as $row){
            $newValues .= ":".trim($row).",";
        }

        $values = trim($newValues,",");
       
        $query = "insert into $this->table ($columns) values ($values)";
       

        $this->query($query,$data);

        
        return false;
    }

    public function update_course($id, $data, $column = 'id'){
        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key){
            $query .= $key . " = :" . $key .", ";
        }
        

        $query = trim($query,", ");
        $query .= " where $column = :$column";

      //  show($query);

        $data[$column] = $id;
        $this->query($query, $data);

        return false;
    }

    public function update($id, $data, $column = 'row'){
        
        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key){
            $query .= $key . " = :" . $key .", ";
        }
        

        $query = trim($query,", ");
        $query .= " where $column = :$column";

      //  show($query);

        $data[$column] = $id;
        $this->query($query, $data);

        return false;
    }

   
    public function delete_course($id, $column= 'id'){
        $data[$column] = $id;
        $query = "delete from $this->table where $column = :$column";

        $this->query($query, $data);

        return false;
    }

    public function delete($id, $column='row'){
        $data[$column] = $id;
        $query = "delete from $this->table where $column = :$column";

        $this->query($query, $data);

        return false;
    }
    
}