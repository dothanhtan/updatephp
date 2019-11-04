<?php
session_start();
include_once("model/user.php");
if (!isset($_SESSION["user"]))
    header("location:login.php");
include_once("header.php")
?>
<?php include_once("nav.php") ?>
<?php
//Mã php bài số 6
echo "<h1>Bài số 6</h1>";

?>

<div id="contentAjax">
    <button onclick="TestAjax();" type="button">Check</button>
</div>
<?php include_once("footer.php") ?> 
<script>
    function TestAjax()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status==200)
            {
                //var user = JSON.parse(this.responseText);
                /*var str = "<ul>";
                
                str += "<li>";
                str += "Username: " +user.userName;
                str += "</li>";

                str += "<li>";
                str += "Password: " +user.passWord;
                str += "</li>";

                str += "<li>";
                str += "Fullname: " +user.fullName;
                str += "</li>";

                str += "</ul>";

                document.getElementById("contentAjax").innerHTML = str;
                document.getElementById("contentAjax").innerHTML = this.responseText;*/
                var book = JSON.parse(this.responseText);
				console.log(book);
				var str = '<table class="table">' +
							'<thead class="thead-dark">' +
								'<tr>'+
									'<th scope="col">STT</th>'+
									'<th scope="col">Tên</th>'+
									'<th scope="col">Giá</th>'+
									'<th scope="col">Tác giả</th>'+
									'<th scope="col">Năm</th>'+
									'<th scope="col">Thao tác</th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>';
				for(var i in book)
                {
					str+= '<tr>'+ 
					  		    '<th scope="row">' + book[i].id + '</th>' +
								'<td>' + book[i].title + '</td>' + 
								'<td>' + book[i].price + '</td>' + 
								'<td>' + book[i].author + '</td>' + 
								'<td>' + book[i].year + '</td>' + 
								'<td class="d-flex">'+
									'<button class="btn btn-outline-info mr-3" data-toggle="modal" data-target="#editItem'+ i + '"><i class="far fa-edit"></i> Sửa</button>'+
									'<button class="btn btn-outline-danger" name="delete" data-toggle="modal" data-target="#deleteItem'+ i + '"><i class="fas fa-trash-alt"></i> Xóa</button>'+
					       		'</td>'+
						  '</tr>';
                }
                str+= '</tbody></table>';
				console.log(str);
				document.getElementById("contentAjax").innerHTML = str;
			} 
        };
        xhttp.open("GET", "testajax.php?username=thanhtan", true);
        xhttp.send();
    }
</script>