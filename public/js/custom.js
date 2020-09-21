$(document).ready(function(){
	getData();
	getProduct();

	$('.data-table').DataTable();

	// $('.action').removeClass(['sorting','action', 'sorting_desc', 
	// 	'sorting_asc']);
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


	// Show Modal Sotcks
$('body').on('click','#detailStock', function(){
	var id = $(this).data('id');
	var name = $(this).data('name');
	var barcode = $(this).data('barcode');
	var qty = $(this).data('qty');
	var dname = $(this).data('dname');
	var mname = $(this).data('mname');
	var sprice = $(this).data('sprice');
	var bprice = $(this).data('bprice');
	var profit = $(this).data('profit');
	var exp = $(this).data('exp');
	var updated = $(this).data('updated');
	// $.get('stocks/'+id,function(data){
	// 	return data
	// })
	
	$('#name').html(name);
	$('#barcode').html(barcode);
	$('#qty').html(qty);
	$('#dname').html(dname);
	$('#mname').html(mname);
	$('#sprice').html(sprice);
	$('#bprice').html(bprice);
	$('#profit').html(profit);
	$('#exp').html(exp);
	$('#updated').html(updated);
	
	$('#stockModal').html("Stock Detail");
	
	$('#detailModal').modal('show');
});




// Add Product
$('body').on('click','#addStock',function () {
	var id = $(this).data('id');
	var name = $(this).data('name');

	var products = {
		id:id,
		name:name,
		price:0,
		expired:0,
		qty:1
	};

	var productsString = localStorage.getItem("products");
	var productsArray;
	if (productsString==null) {
		productsArray=Array();				
	} else {
		productsArray=JSON.parse(productsString);
	}

	var status=false;

	$.each(productsArray,function(i,v){
		if(id==v.id){
			status=true;
			v.qty++;
		}
	})



	if (!status) {
		productsArray.push(products);
	}

	var productsData = JSON.stringify(productsArray);
	localStorage.setItem('products', productsData);


	getProduct();

});


function getProduct() {

	var productsString=localStorage.getItem('products');

	if (productsString) {
		var productsArray = JSON.parse(productsString);

		var total=0; var html=''; var j = 1; var tfoot='';

		$.each(productsArray, function(i,v){
			var id = v.id;
			var name = v.name;
			var expired = v.expired;
			var price = v.price;
			var qty = v.qty;
			var subtotal = v.qty*v.price;
			total += parseInt(subtotal);



			html+=`<tr>
			<td>${name}</td>

			<td>
				<input type="date" required="required" value="${expired}" class="form-control expired" data-id="${i}" >
			</td>

			<td>
				<input type="number" value="${qty}" data-id="${i}" class="form-control p-qty">
			</td>

			<td>
				<input type="number" value="${price}" class="form-control subtotal" data-id="${i}" >
			</td>

			<td>${subtotal}</td>

			<td>
				<button class="btn btn-outline-danger btn-sm ml-1 btn-delete" data-id="${i}">x</button>
			</td>

			</tr>`;

			tfoot = `<tr>
						<td colspan="4">Total:</td>
			            <td  class="total" data-total = "${total}">${total}</td>
					</tr>

					<tr>
						<td >Voucher No:
							<input type="text" required="required" class="form-control voucher_no" data-id="${i}">
						</td>
					

				
						<td >Distributor Name:
							<input type="text" required="required" class="form-control distributor" data-id="${i}">
						</td>
					

					
						<td>Manufacturer Name:
							<input type="text" required="required" class="form-control manufacturer" data-id="${i}">
						</td>
					</tr>
					

					<tr>
						<td><button class="btn btn-outline-danger btn-sm cancel">Cancel</button></td>

						<td colspan="4"><button class="btn btn-outline-success btn-sm float-right submit">Submit</button></td>
					</tr>`;


			
		});

		$('#purchase').html(html);
		$('#purchaseFoot').html(tfoot);
		
	}
	
}


// Purchase Expired
$('#purchase').on('change','.expired', function(){
			var id = $(this).data('id');
			var btnObj = JSON.parse(localStorage.getItem('products'));
			btnObj[id].expired = $(this).val();

			var btnString = JSON.stringify(btnObj);
			localStorage.setItem('products',btnString);

			getProduct();

		});

// Purchase Subtotal
$('#purchase').on('change','.subtotal', function(){
			var id = $(this).data('id');
			var btnObj = JSON.parse(localStorage.getItem('products'));
			btnObj[id].price = $(this).val();

			// if (btnObj[id].qty==0) {
			// 	btnObj.splice(id,1);
			// }

			var btnString = JSON.stringify(btnObj);
			localStorage.setItem('products',btnString);

			getProduct();

		});


// Purchase Change Qty
$('#purchase').on('change','.p-qty', function(){
			var id = $(this).data('id');
			var btnObj = JSON.parse(localStorage.getItem('products'));
			btnObj[id].qty = $(this).val();

			if (btnObj[id].qty==0) {
				btnObj.splice(id,1);
			}

			var btnString = JSON.stringify(btnObj);
			localStorage.setItem('products',btnString);

			getProduct();

		});


// Purchase Delete Button
$("#purchase").on('click', '.btn-delete', function(){
			var id = $(this).data('id');

			var ans = confirm("Are You Sure To Delete?");

			if (ans) {
				var productObj = localStorage.getItem('products');
				var productArray = JSON.parse(productObj);
				
				productArray.splice(id,1);
				var productString = JSON.stringify(productArray);
				localStorage.setItem('products',productString);

				getProduct();
			}
		});


// Purchase Cancel Button

$("#purchaseFoot").on('click', '.cancel', function () {
	var ans = confirm("Are You Sure To Cancel?");

	if (ans) {

	localStorage.clear('products');
	location.reload();	
	}
	
});


// Purchase Submit Button

$("#purchaseFoot").on('click', '.submit', function(){
			var ans = confirm("OK?");
			var total = $('.total').data('total');

			var voucher_no = $('.voucher_no').val();
			var distributor = $('.distributor').val();
			var manufacturer = $('.manufacturer').val();

			if(ans){
				var productsObj=localStorage.getItem('products');
				if (productsObj) {
					var productsArray = JSON.parse(productsObj);

					$.post('/admin/purchases',{data:productsArray,total,voucher_no,distributor,manufacturer},function(data){

					});
				}

				localStorage.clear('products');
				location.reload();
			}

			

		});


















// Add Sales
$('.card-body').on('click','#add', function () {
	

	var id = $(this).data('id');
	var name = $(this).data('name');
	var price = $(this).data('price');

	var sales = {
		id:id,
		name:name,
		price:price,
		qty:1
	};

	var salesString = localStorage.getItem("sales");
	var salesArray;
	if (salesString==null) {
		salesArray=Array();				
	} else {
		salesArray=JSON.parse(salesString);
	}

	var status=false;

	$.each(salesArray,function(i,v){
		if(id==v.id){
			status=true;
			v.qty++;
		}
	})



	if (!status) {
		salesArray.push(sales);
	}

	var salesData = JSON.stringify(salesArray);
	localStorage.setItem('sales', salesData);


	getData();
});

function getData() {

	var salesString=localStorage.getItem('sales');

	if (salesString) {
		var salesArray = JSON.parse(salesString);

		var total=0; var html=''; var j = 1; var tfoot='';

		$.each(salesArray, function(i,v){
			var name = v.name;
			var id = v.id;
			var price = v.price;
			var qty = v.qty;
			var subtotal = v.qty*v.price;
			total += parseInt(subtotal);


			html+=`<tr>
			<td class="sn">${j++}</td>
			<td>${name}</td>
			<td>${price}</td>

			<td>
				<input type="text" value="${qty}" data-id="${i}" class="form-control qty">
			</td>

			<td>${subtotal}<button class="btn btn-outline-danger btn-sm ml-1 btn-delete" data-id="${i}">x</button>

			</td>
			</tr>`;

			tfoot = `<tr>
						<th colspan="4">Total:</th>
			            <td class="total" data-price = "${total}">${total} MMK</td>
					</tr>
					<tr>
						<td><button class="btn btn-outline-danger btn-sm cancel">Cancel</button></td>

						<td colspan="4"><button class="btn btn-outline-success btn-sm float-right submit">Submit</button></td>
					</tr>`;

			
		});

		$('#voucher').html(html);
		$('#total').html(tfoot);
	}
	
}

		$('#voucher').on('change','.qty', function(){
			var id = $(this).data('id');
			var btnObj = JSON.parse(localStorage.getItem('sales'));
			btnObj[id].qty = $(this).val();

			if (btnObj[id].qty==0) {
				btnObj.splice(id,1);
			}

			var btnString = JSON.stringify(btnObj);
			localStorage.setItem('sales',btnString);

			getData();

		});

		// Delete Button
		$("#voucher").on('click', '.btn-delete', function(){
			var id = $(this).data('id');
			var ans = confirm("Are You Sure To Delete?");

			if (ans) {
				var salesObj = localStorage.getItem('sales');
				var salesArray = JSON.parse(salesObj);

				salesArray.splice(id,1);
				var salesString = JSON.stringify(salesArray);
				localStorage.setItem('sales',salesString);

				getData();
			}
		});

		$("#total").on('click', '.cancel', function () {
			var ans = confirm("Are You Sure To Cancel?");

			if (ans) {

			localStorage.clear('sales');
			location.reload();	
			}
			
		});

		$("#printModal").on('click', '.clear', function(){
			localStorage.clear('sales');
			location.reload();
		});

		$("#total").on('click', '.submit', function(){

				$('#printModal').modal('show');
				var total = $('.total').data('price');
	
				// 
	
				var salesObj=localStorage.getItem('sales');
				if (salesObj) {
					var salesArray = JSON.parse(salesObj);

					$.post('store',{data:salesArray,total},function(data){

					});

					// var salesString = JSON.stringify(salesArray);
				};

				var total=0; var html=''; var j = 1; var tfoot='';

				$.each(salesArray, function(i,v){
					var name = v.name;
					var price = v.price;
					var qty = v.qty;
					var subtotal = v.qty*v.price;
					total += parseInt(subtotal);


					html += `<tr>
								<td>${j++}</td>
								<td>${name}</td>
								<td>${price}</td>
								<td>${qty}</td>
								<td>${subtotal}</td>
							</tr>`;

					tfoot = `<tr>
								<th colspan="4">Total:</th>
					            <td>${total} MMK</td>
							</tr>`;

				
				});

			$('#modalBody').html(html);
			$('#modalFoot').html(tfoot);

		});

		


});
