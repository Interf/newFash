$(document).ready(function() {

	let inProgress = false;

	$('.addToCart').on('click', function(event) {
		event.preventDefault();
		if (inProgress == true) return;
		inProgress = true;
		
		let itemId = $(this).attr("item-id");
		let quantity = $(this).parents(".item_info_section").find('.quantity-item').val();

		$.ajax({
			url: '/local/ajax/addToCart.php',
			type: 'POST',
			dataType: 'html',
			data: {itemId: itemId, quantity: quantity, AJAX_ADD_TO_CART: true},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (Array.isArray(data)) {
				data.forEach(function(item, i, arr) {
					alert(item);
				});
			} else {

				$.post('/', {AJAX_BASKET_LINE: 'Y'}, function(data, textStatus, xhr) {
					$('.basket_line_container').html(data);
				});

				console.log(data);
			}

			inProgress = false;
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});


	// Basket actions

	$('.cart_container').on('click', '.close1', function(event) {
		event.preventDefault();
		if (inProgress == true) return;
		inProgress = true;

		let prodId = $(this).attr("product-id");

		$.ajax({
			url: '/local/ajax/handlerBasketAction.php',
			type: 'POST',
			dataType: 'html',
			data: {AJAX_DEL_FROM_CART: true, prodId: prodId},
		})
		.done(function(data) {

			data = $.parseJSON(data);

			if (Array.isArray(data)) {
				data.forEach(function (item, i, arr) {
					alert(item);
				});
			} else if (data !== true) {
				alert(data);
			} else {
				$.post('/personal/cart/', {AJAX_REFRESH_CART: 'Y'}, function(data, textStatus, xhr) {
					$('.cart_container').html(data);
				});

				$.post('/personal/cart/', {AJAX_BASKET_LINE: 'Y'}, function(data, textStatus, xhr) {
					$('.basket_line_container').html(data);
				});
			}

			inProgress = false;
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});


	$('.cart_container').on('change', '.basket_quantity', function(event) {
		event.preventDefault();
		if (inProgress == true) return;
		inProgress = true;

		let quantity = $(this).val();
		let prodId = $(this).attr("prod-id");

		$.ajax({
			url: '/local/ajax/handlerBasketAction.php',
			type: 'POST',
			dataType: 'html',
			data: {AJAX_CHANGE_QUANTITY: 'Y', prodId: prodId, quantity: quantity},
		})
		.done(function(data) {
			data = $.parseJSON(data);
			
			if (Array.isArray(data)) {
				data.forEach(function(item, i, arr) {
					alert(item);
				});
			} 

			$.post('/personal/cart/', {AJAX_REFRESH_CART: 'Y'}, function(data, textStatus, xhr) {
				$('.cart_container').html(data);
			});

			$.post('/personal/cart/', {AJAX_BASKET_LINE: 'Y'}, function(data, textStatus, xhr) {
				$('.basket_line_container').html(data);
			});

			inProgress = false;
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

	});


});