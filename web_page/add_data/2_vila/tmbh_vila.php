<html>	
	 <head>

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	  
	 </head>
	 <body>
	  <br /><br />
	  <div class="container">
	   <br />
	   <h1 align="center">Tambah Data(Vila Dago)</h1>
	   <br />
	   <div class="table-responsive">
	    <table class="table table-bordered" id="crud_table">
	     <tr>
	      <th>Nama Joki</th>
	      <!-- <th>Penerima</th> -->
	      <th>Merchant</th>
	      <th>Barang</th>
	      <th>Jumlah</th>
	      <th>Harga</th>
	      <th>No.Resi</th>
	      <th></th>
	     </tr>
	     <tr>
	      <td contenteditable="true" class="item_name"></td>
	      <!-- <td contenteditable="true" class="item_code"></td> -->
	      <td contenteditable="true" class="item_desc"></td>
	      <td contenteditable="true" class="item_price"></td>
	      <td contenteditable="true" class="item_joki"></td>
	      <td contenteditable="true" class="item_barang"></td>
	      <td contenteditable="true" class="item_harga"></td>
	      <td></td>
	     </tr>
	    </table>
	    <div align="right">
	     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
	    </div>
	    <div align="center">
	     <button type="button" name="save" id="save" class="btn btn-dark">
	      Simpan Data
	    </div>
	    <br />
	    <div id="inserted_item_data"></div>
	   </div>
	   
	  </div>
	 </body>
</html>

<script>
	$(document).ready(function(){
	 var count = 1;
	 $('#add').click(function(){
	  count = count + 1;
	  var html_code = "<tr id='row"+count+"'>";
	   html_code += "<td contenteditable='true' class='item_name'></td>";
	//    html_code += "<td contenteditable='true' class='item_code'></td>";
	   html_code += "<td contenteditable='true' class='item_desc'></td>";
	   html_code += "<td contenteditable='true' class='item_price'></td>";
	   html_code += "<td contenteditable='true' class='item_joki'></td>";
	   html_code += "<td contenteditable='true' class='item_barang'></td>";
	   html_code += "<td contenteditable='true' class='item_harga'></td>";
	   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
	   html_code += "</tr>";  
	   $('#crud_table').append(html_code);
	 });
	 
	 $(document).on('click', '.remove', function(){
	  var delete_row = $(this).data("row");
	  $('#' + delete_row).remove();
	 });
	 
	 $('#save').click(function(){
	  var item_name = [];
	//   var item_code = [];
	  var item_desc = [];
	  var item_price = [];
	  var item_joki = [];
	  var item_barang = [];
	  var item_harga = [];

	  $('.item_name').each(function(){
	   item_name.push($(this).text());
	  });
	//   $('.item_code').each(function(){
	//    item_code.push($(this).text());
	//   });
	  $('.item_desc').each(function(){
	   item_desc.push($(this).text());
	  });
	  $('.item_price').each(function(){
	   item_price.push($(this).text());
	  });
	  $('.item_joki').each(function(){
	   item_joki.push($(this).text());
	  });
	  $('.item_barang').each(function(){
	   item_barang.push($(this).text());
	  });
	  $('.item_harga').each(function(){
	   item_harga.push($(this).text());
	  });

	  $.ajax({
	   url:"add_data/2_vila/konek_tmbh_vila.php",
	   method:"POST",
	   data:{item_name:item_name, item_desc:item_desc, item_price:item_price, item_joki:item_joki, item_barang:item_barang, item_harga:item_harga},
	   success:function(data){
	    alert(data);
	    $("td[contentEditable='true']").text("");
	    for(var i=2; i<= count; i++)
	    {
	     $('tr#'+i+'').remove();
	    }
	   }
	  });
	 });
	});
</script>



