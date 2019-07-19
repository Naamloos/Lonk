<?php
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "lonk");
    define("DB_HOST", "127.0.0.1");

    function TestDatabase(){
        $status = "";

        if($conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS)){
            if(mysqli_select_db($conn, DB_NAME)){
                $status = "Successfully connected to MySQL and found the database named " . DB_NAME . "!";
            }else{
                $status = "Failed to select database " . DB_NAME;
            }
        }else{
            $status = "Failed to connect to MySQL server.";
        }

        return $status;
    }

    function GetLinks(){
        $res = false;
        $query = "SELECT id, name, description, url, img, color FROM link";

        if($conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS)){
            if(mysqli_select_db($conn, DB_NAME)){
                if($stmt = mysqli_prepare($conn, $query)){
                    if(mysqli_stmt_execute($stmt)){
                        if(mysqli_stmt_store_result($stmt)){
                            if(mysqli_stmt_bind_result($stmt, $id, $name, $desc, $url, $img, $color)){
                                $res = array();
                                if(mysqli_stmt_num_rows($stmt) > 0){
                                    while(mysqli_stmt_fetch($stmt)){
                                        array_push($res, array(
                                            "id" => $id,
                                            "name" => $name,
                                            "desc" => $desc,
                                            "url" => $url,
                                            "img" => $img,
                                            "color" => $color
                                        ));
                                    }
                                }else{
                                    $res = false;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $res;
    }

    function GetStubItems(){
        return array(
            array(  "title" => "Example", 
                    "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis dignissim urna, sit amet venenatis libero molestie sit amet. Sed porttitor enim vel porta maximus. Quisque laoreet eros purus, vel. ", 
                    "url" => "https://example.com/"), 
            array(  "title" => "Example", 
                    "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis dignissim urna, sit amet venenatis libero molestie sit amet. Sed porttitor enim vel porta maximus. Quisque laoreet eros purus, vel. ", 
                    "url" => "https://example.com/"), 
            array(  "title" => "Example", 
                    "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis dignissim urna, sit amet venenatis libero molestie sit amet. Sed porttitor enim vel porta maximus. Quisque laoreet eros purus, vel. ", 
                    "url" => "https://example.com/"), 
            array(  "title" => "Example", 
                    "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis dignissim urna, sit amet venenatis libero molestie sit amet. Sed porttitor enim vel porta maximus. Quisque laoreet eros purus, vel. ", 
                    "url" => "https://example.com/"), 
            array(  "title" => "Example", 
                    "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis dignissim urna, sit amet venenatis libero molestie sit amet. Sed porttitor enim vel porta maximus. Quisque laoreet eros purus, vel. ", 
                    "url" => "https://example.com/"), 
        );
    }
?>