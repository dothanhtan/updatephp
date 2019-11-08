<?php 
class Book {
    #properties
    var $id;
    var $title;
    var $price;
    var $author;
    var $year;
    #endProperties
    #Construct function
    function __construct ($id, $title, $price, $author, $year) {
        $this->id = $id; 
        $this->title = $title;
        $this->price = $price;
        $this->author = $author;
        $this->year = $year;
    }
    #Member function
    function display() {    
        echo "Title: " . $this->title . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
    static function getList() {
        $listBook = array();
        array_push($listBook, new Book(1, "Java",5, "nghiaJava", 2019)); //Thêm 1 phần tử vào mảng
        array_push($listBook, new Book(2, "OOP",6, "nghiaOOP", 2018));
        array_push($listBook, new Book(3, "Ruby",7, "nghiaRuby", 2017));
        array_push($listBook, new Book(4, "Rails",8, "nghiaRails", 2016));
        array_push($listBook, new Book(5, "Tomcat",9, "nghiaTomcat", 2015));
        return $listBook;
    }
    
    static function connect(){
        $con = new mysqli("localhost", "root", "", "bookmanager");
        $con->set_charset("utf8");

        if($con->connect_error)
            die("Ket noi that bai. Chi tiet ". $con->connect_error);
        return 
            $con;
    }
    static function getListFromDB(){
        //Buoc 1 Tao ket noi
        $con = Book::connect(); 
        //Buoc 2 Thao tac voi co so du lieu:CRUD
        $sql = "SELECT * FROM book" ;
        $result = $con->query($sql);
        //var_dump($result);
        $listBook = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $book = new Book($row["ID"], $row["Title"], $row["Price"], $row["Author"], $row["Year"]);
                array_push($listBook, $book);
            }
        }
        //Buoc 3 Dong ket noi
        $con->close();
        return $listBook;
    }
    static function getListFromFile($search = null){
  
        $data = file("data/book.txt");
        $arrBook = [];
        foreach($data as $key => $value){
            $row = explode("#",$value); //tách chuỗi ngăn bởi #
            if(
                strlen(strstr($row[0],$search)) || strlen(strstr($row[3],$search)) ||
                strlen(strstr($row[1],$search)) || strlen(strstr($row[4],$search)) ||
                strlen(strstr($row[2],$search)) || $search == null
            )
            $arrBook[] = new Book($row[0],$row[1],$row[2],$row[3],$row[4]);
        }
        return $arrBook;
    }
    static function addToFile($content){
        
        $myfile = fopen("data/book.txt", "a") or die("Unable to open file!");
        if(Book::checkLineFeedLastText())
            fwrite($myfile, "". $content);
        else
            fwrite($myfile, "\n". $content);
        fclose($myfile);
    }
    static function delete($id){
        $data = Book::getListFromFile();
        $data_res = [];
        foreach($data as $key => $value){
            if($value->id != $id){
                $data_res[] = $value;
            }
        }    
        $text_write = "";
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        foreach($data_res as $key => $value){
            $text_write.= $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;            
        }
      
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
    static function edit(Book $content){
        $data = Book::getListFromFile();
        $text_write = "";
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        foreach($data as $key => $value){          
            if( $content->id == $value->id){
                $text_write.= $content->id."#".$content->title."#".$content->price."#".$content->author."#".$content->year."\n";
            }  
            else $text_write.= $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
        }       
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
    static function getSTT(){
        $max = 0;
        $data = Book::getListFromFile();
        foreach($data as $key => $value){
            $max =  max($value->id,$max);
        }  
        return $max+1;
    }
    static function checkLineFeedLastText(){
        $data="data/book.txt";
        $linecount = 0;
        $handle = fopen($data, "r");
        while(!feof($handle)){
            $line = fgets($handle);
            $linecount++;
        }      
        fclose($handle); 
        $count = sizeof(Book::getListFromFile());
        if($linecount > $count) return true;
        return false;
    }
    static function addToDB(Book $content){
        $conn = Book::connect(); 
        $sql = "INSERT INTO book (ID, Title, Price, Author, Year) VALUES (NULL, '$content->title', $content->price, '$content->author', $content->year)";
        $result = $conn->query($sql);
        if($result == true)
            echo 'Tạo thành công';
        else 
            echo 'Tạo thất bại';
        //B3: Giải phóng kết nối
        $conn->close();
       
    }
    static function editDB(Book $content){
        $conn = Book::connect(); 
        $sql = "UPDATE book SET Title = '$content->title' , Price = $content->price , Author = '$content->author' , Year = $content->year  WHERE ID = $content->id";
        $result = $conn->query($sql);
        if($result == true)
            echo 'Sửa thành công';
        else 
            echo 'Sửa thất bại';
        //B3: Giải phóng kết nối
        $conn->close(); 
    }
    static function deleteDB($id){
        $conn = Book::connect(); 
        $sql = "DELETE FROM book WHERE ID = $id";
        $result = $conn->query($sql);
        if($result == true)
            echo 'Xóa thành công';
        else 
            echo 'Xóa thất bại';
        //B3: Giải phóng kết nối
        $conn->close(); 
    }
}