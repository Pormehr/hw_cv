<?php

function connect_to_db($servername, $username, $password, $database_name)
{
    //create connection
    $conn = new mysqli($servername, $username, $password, $database_name);

    //check connection
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    //echo "connected successfully.";

    return $conn;
}

function select_from_db($conn, $sql):array
{
    $result = $conn->query($sql);

    $ret = $result -> fetch_all(MYSQLI_ASSOC);

    $result -> free_result();

    return $ret;
//    $conn->close();
}

function insert_into_db(object $conn, string $table, array $fields, array $values):void{
    $sql = "INSERT INTO $table (`".implode('`,`', $fields)."`) VALUES ('".implode("','", $values)."')";
//    if ($conn->query($sql) === TRUE) {
//        return $conn->insert_id;
//    }
//    echo "Error: " . $sql . "<br>" . $conn->error;
//    return false;
    $conn->query($sql);
    echo "one record inserted successfully\n";
}

function create_table(object $conn, string $table, array $fields):void{
    $sql = "CREATE TABLE $table (".implode(',', $fields).")";
//    if ($conn->query($sql) === TRUE) {
//        return $conn->insert_id;
//    }
//    echo "Error: " . $sql . "<br>" . $conn->error;
//    return false;
    $conn->query($sql);
    echo "table $table created successfully\n";
}

function drop_table(object $conn, string $table):void{
        $sql = "DROP TABLE IF EXISTS `$table`";
//    if ($conn->query($sql) === TRUE) {
//        return $conn->insert_id;
//    }
//    echo "Error: " . $sql . "<br>" . $conn->error;
//    return false;
    $conn->query($sql);
    echo "table $table dropped successfully\n";

}

function update_db(object $conn, string $table, array $fields, array $values, string $select):bool{
    $data = array_combine($fields, $values);
    $content = [];
    foreach ($data as $key => $val){
        $content[] = "`$key` = '$val'";
    }
    $content = implode(',', $content);

    $sql = "UPDATE `$table` SET $content WHERE $select ";
    $conn->query($sql);
    return true;
}

function env_parser():array {
    $ret = [];
    $env_file = '../.env';
    $env = file_get_contents($env_file);
    $env = explode("\n", $env);
    foreach ($env as $line) {
        $line = array_map('trim', explode("=", $line));
        if(count($line) != 2) continue;
        $ret[$line[0]] = $line[1];
    }
    return $ret;
}

function base_dir(string $path = ''){
    return __DIR__ . '/../' . $path;
}

