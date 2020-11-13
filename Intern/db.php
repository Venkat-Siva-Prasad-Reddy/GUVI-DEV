<?php

session_start();
require('connect.php');


function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;

}

function selectAll($table, $conditons = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditons)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        //return records that match conditions.....
        //$sql="SELECT * FROM $table WHERE username='venkatnani' admin=1";
        $i = 0;
        foreach ($conditons as $key => $value) {
            if ($i==0){
                $sql =$sql ." WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
         
        $stmt = executeQuery($sql, $conditons);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}
function selectOne($table, $conditons)
{
    global $conn;
    $sql = "SELECT * FROM $table";

        //return records that match conditions.....
        //$sql="SELECT * FROM $table WHERE username='venkatnani' admin=1";
    $i = 0;
    foreach ($conditons as $key => $value) {
        if ($i==0){
            $sql =$sql ." WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    //$sql="SELECT * FROM $table WHERE username='venkatnani' admin=1" LIMIT 1;
    $sql = $sql . " LIMIT 1";    
    $stmt = executeQuery($sql, $conditons);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;

}

function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i == 0) {
            $sql =$sql ." $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i == 0) {
            $sql =$sql ." $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}
function del($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE user_id=?";
    $stmt = executeQuery($sql, ['user_id' => $id]);
    return $stmt->affected_rows;
}
?>