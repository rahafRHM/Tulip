$(document).ready(function(){
//
// $(".contact-section3").click(function() {
//   $(".google-map,.contact").css("filter","blur(1.3rem)");
//   $("body").css("overflow","hidden");
//   $("nav").css("position","relative");
//   $(".form-popup").css("display" , "block");
// });

// $(".cancel").click(function() {
// $("#myForm").css ("display","none");
// $("body").css("overflow","auto");
// $("nav").css("position","sticky");
//
//   $(".google-map,.contact").css("filter","blur(0)");
//
// });
// $(".MLink").click(function() {
//   $(".messages").css("filter","blur(1.3rem)");
//   $("nav").css("filter","blur(1.3rem)");
//   $("body").css("overflow","hidden");
//   $("nav").css("position","relative");
//
//   $(".adminForm").css("display" , "block");
// });
//
// $(".cancelAdmin").click(function() {
// $(".adminForm").css ("display","none");
// $("body").css("overflow","auto");
// $("nav").css("position","sticky");
//
//   $(".messages").css("filter","blur(0)");
//   $("nav").css("filter","blur(0)");
//
//
// });

// show addintional care when scrolling to it
$(function() {
	var oTop = $('#Caring').offset().top - window.innerHeight;
    $(window).scroll(function(){

 		var pTop = $('body').scrollTop();
 		if( pTop > oTop ){
     		fadecare();
 		}
	});
});
function fadecare(){
$(".care-grid-item1").fadeIn(500);
$(".care-grid-item2").fadeIn(1500);
$(".care-grid-item3").fadeIn(2000);
$(".care-grid-item4").fadeIn(2500);
}
// products navbar dropdownlist
$(".dropdownList").hover(function(){
  $(".dropdownMenu").css("display","block");
},function(){
  $(".dropdownMenu").css("display","none");

});

// $('.minus').click(function () {
// 				var $input = $(this).parent().find('input');
// 				var count = parseInt($input.val()) - 1;
// 				count = count < 1 ? 1 : count;
// 				$input.val(count);
// 				$input.change();
// 				return false;
// 			});
// 			$('.plus').click(function () {
// 				var $input = $(this).parent().find('input');
// 				$input.val(parseInt($input.val()) + 1);
// 				$input.change();
// 				return false;
// 			});
// $("#showOrderNotifi").hover(function(){
//   $("#oDetails").css("display","block");
// },function(){
//   $(".#oDetails").css("display","none");
//
// });
// navbar profile logout
      $("#outProfile").hover(function(){
        $(".dropdownMenuProfile").css("display","block");
      },function(){
        $(".dropdownMenuProfile").css("display","none");

      });
      // navbar profile logout for admin
      $("#outadminProfile").hover(function(){
        $(".dropdownMenuadminProfile").css("display","block");
      },function(){
        $(".dropdownMenuadminProfile").css("display","none");

      });
      $('.SCare').click(function() {
        $('.SCare').css('background-color', '');

     // Set background color to black for the clicked section
     $(this).css('background-color', '#B2B2B2');
          var sectionId = $(this).attr('id'); // Get the ID of the clicked section

          $.ajax({
              url: 'skinScript.php', // URL to your PHP script
              type: 'GET', // or 'POST' if your server script uses POST method
              data: { sectionId: sectionId }, // Pass section ID as a parameter
              success: function(response) {
                  $('#skin_Container').html(response); // Update the div with fetched data
              },
              error: function() {
                  alert('Error fetching data.');
              }
          });
      });
      $('.SCare').click(function() {
        $('.SCare').css('background-color', '');

     // Set background color to black for the clicked section
     $(this).css('background-color', '#B2B2B2');
          var sectionId = $(this).attr('id'); // Get the ID of the clicked section

          $.ajax({
              url: 'hairScript.php', // URL to your PHP script
              type: 'GET', // or 'POST' if your server script uses POST method
              data: { sectionId: sectionId }, // Pass section ID as a parameter
              success: function(response) {
                  $('#hair_Container').html(response); // Update the div with fetched data
              },
              error: function() {
                  alert('Error fetching data.');
              }
          });
      });
      $('.SCare').click(function() {
        $('.SCare').css('background-color', '');

     // Set background color to black for the clicked section
     $(this).css('background-color', '#B2B2B2');
          var sectionId = $(this).attr('id'); // Get the ID of the clicked section

          $.ajax({
              url: 'babyScript.php', // URL to your PHP script
              type: 'GET', // or 'POST' if your server script uses POST method
              data: { sectionId: sectionId }, // Pass section ID as a parameter
              success: function(response) {
                  $('#babyContainer').html(response); // Update the div with fetched data
              },
              error: function() {
                  alert('Error fetching data.');
              }
          });
      });


    // Form submission handler
    $('.addToCart').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Fetch item ID and quantity from form
        let item_id = $(this).find('input[name="item_id"]').val();
        let quantity = $(this).find('input[name="quantity"]').val();

        // AJAX request to add item to cart
        $.ajax({
            type: 'POST',
            url: 'ProductDetails.php',
            data: {
                add_to_cart: true,
                item_id: item_id,
                quantity: quantity
            },
            success: function(response) {
                console.log('Item added to cart:', response); // Debug log

                // Update cart icon and count after adding item
                animateCartCount();
                updateCartIcon();

                // Update button state to reflect changes
                updateButtonState();
            },
            error: function(xhr, status, error) {
                console.error('Error adding to cart:', error);
            }
        });
    });

    // Function to update button state
    function updateButtonState() {
        let productId = $('#item_id').val(); // Get product ID from the form
        let $addToCartBtn = $('#addToCartBtn');
        let $quantityInput = $('#quantity');

        $.ajax({
            url: '../User/check_quantity.php',
            type: 'POST',
            data: {
                item_id: productId
            },
            success: function(response) {
                if (response.trim() === 'match') {
                    $addToCartBtn.val("out of stock")
                                 .prop('disabled', true)
                                 .addClass('disabled');
                } else {
                    $addToCartBtn.val("add to cart")
                                 .prop('disabled', false)
                                 .removeClass('disabled');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error checking quantity:', error);
            }
        });
    }

    // Function to update cart icon or counter
    function updateCartIcon() {
        $.ajax({
            type: 'GET',
            url: 'get_cart_count.php',
            cache: false,
            success: function(count) {
                $('#cart-count').text(count);
								$('#cart-countToggle').text(count);

            },
            error: function(xhr, status, error) {
                console.error('Error fetching cart count:', error);
            }
        });
    }

    // Function to animate the cart count
    function animateCartCount() {
        var icon = $("#addedToCartAnimation");
        icon.stop(true, true) // Stop any current animations and clear the queue
             .css({ opacity: 0, left: '50%', bottom: '200px', display: 'block' })
             .animate({ opacity: '1' }, "fast")
             .animate({ left: '50%', bottom: '310px' }, "slow")
             .animate({ opacity: '0' }, "fast", function() {
                $(this).css('display', 'none'); // Set display to none after animation
             });
    }

    // Initial button state update
    updateButtonState();

    // Check button state on quantity change
    $('#quantity').on('input change', function() {
        updateButtonState();
    });



  // Function to update order notification
  // function updateOrderNotification() {
  //     $.ajax({
  //         url: 'get_order_count.php',
  //         type: 'GET',
  //         success: function(data) {
  //             $('#orderNotification').text(data); // Update the notification count
  //         },
  //         error: function(xhr, status, error) {
  //             console.error('Error fetching order count');
  //         }
  //     });
  //
  // }

  // Update notification on page load
  // updateOrderNotification();
  //
  // // Set interval to update notification every few seconds (optional)
  // setInterval(function() {
  //     updateOrderNotification();
  // }, 5000);


  // function updateNotificationCount() {
  //     $.ajax({
  //         url: 'Admin/update_notification.php',
  //         type: 'GET',
  //         dataType: 'json',
  //         success: function(response) {
  //             $('#orderNotification').text(response.notification_count);
  //         },
  //         error: function(xhr, status, error) {
  //             console.error('Error fetching notification count:', error);
  //         }
  //     });
  // }
  // function updateOrderCount() {
  //        $.ajax({
  //            url: 'orderConfirmation.php', // or the appropriate URL of your PHP script handling order insertion
  //            type: 'POST',
  //            dataType: 'json',
  //            data: { Confirm: true }, // Assuming Confirm is the key for the order insertion action
  //            success: function(response) {
  //                if (response.status === 'success') {
  //                    var newOrderCount = response.order_count;
  //                    // Update order count dynamically
  //                    $('#orderNotification').text(newOrderCount);
  //                } else {
  //                    console.error('Failed to update order count.');
  //                }
  //            },
  //            error: function(xhr, status, error) {
  //                console.error('Error updating order count:', error);
  //            }
  //        });
  //    }
  //
  //    // Call the update function initially
  //    updateOrderCount();

             // change user details
             $('.change-link').click(function(e) {
       e.preventDefault();

       // Toggle readonly attribute and visibility
       $('.changeinputRead').prop('readonly', function(i, readonly) {
         return !readonly;
       });

       $('.submit-btn').toggle(); // Toggle visibility of submit button
       $(this).text(function(i, text) {
				 const newText = text === 'Change Info'? 'Exit':'Change Info';
    $(this).toggleClass('cancel-text', newText === 'Exit');
    return newText;
  });
     });

$("#PInfo").click(function(){
$('.profileInfo').slideToggle("slow");
$('.change-link').slideToggle("slow");

});
$("#OInfo").click(function(){
$('.myOrder').slideToggle("slow");

});


$('.update-form').on('submit', function(event) {
		event.preventDefault(); // Prevent default form submission

		const $form = $(this);
		const item_id = $form.find('input[name="item_id"]').val();
		const current_quantity = parseInt($form.find('input[name="Updatedquantity"]').val());
		const stock_quantity = parseInt($form.find('input[name="stock_quantity"]').val());
		const clickedButtonName = $(event.originalEvent.submitter).attr('name');

		let new_quantity = current_quantity;

		// Determine the new quantity based on the clicked button
		if (clickedButtonName === 'update_QPlus') {
				if (current_quantity < stock_quantity) {
						new_quantity = current_quantity + 1;
				}
		} else if (clickedButtonName === 'update_QMinus') {
				if (current_quantity > 1) {
						new_quantity = current_quantity - 1;
				}
		}

		// AJAX request to update cart
		$.ajax({
				type: 'POST',
				url: '../User/orderDetails.php',
				data: {
						item_id: item_id,
						update_QPlus: clickedButtonName === 'update_QPlus' ? 1 : 0,
						update_QMinus: clickedButtonName === 'update_QMinus' ? 1 : 0
				},
				success: function(response) {
						// Update the quantity displayed on the page
						$form.find('input[name="Updatedquantity"]').val(new_quantity);
						updateCartIcon();
				},
				error: function(xhr, status, error) {
						console.error('Error updating cart:', error);
				}
		});
});

function updateCartIcon() {
		$.ajax({
				type: 'GET',
				url: '../User/get_cart_count.php',
				cache: false,
				success: function(count) {
						$('#cart-count').text(count);
						$('#cart-countToggle').text(count);

				},
				error: function(xhr, status, error) {
						console.error('Error fetching cart count:', error);
				}
		});
}




// $("#PInfoAdmin").click(function(){
// $('.profileInfoA').slideToggle("slow");
//
// });
// $("#OInfoAdmin").click(function(){
// $('.myOrder').slideToggle("slow");
//
// });
//
//

$("#showOrderNotifi").hover(function(){
  $("#oDetails").css("display","inline-block");
},function(){
  $("#oDetails").css("display","none");

});
function fetchNewOrders() {
       $.ajax({
           url: 'update_notification.php',
           type: 'GET',
           dataType: 'json',
           success: function(data) {
             let orderList = $('#oDetails');
             let orderCount = $('.orderNotification');
                orderList.empty();
                if (data.length === 0) {
                          // Display message when there are no orders
                          orderList.append(`<div class="adminOrder adminorderzero"><p>No New Orders</p></div>`);
                        } else {
                          // Display orders
                          data.forEach(function(order) {
                            let htmlContent = `
                              <div class="adminOrder">
                                <div class="statusAdmin">
                                  <p>order NO.: ${order.orderID}</p>
                                  <p class="orderDate"> order Date: ${order.date_added} </p>
                                </div>
                                <div class="showDAdmin">
                                  <p>Total: ${order.totalprice} </p>
                                  <a href="showOrderProducts.php?orderID=${order.orderID}">show order details</a>
                                </div>
                              </div>
                            `;
                            orderList.append(htmlContent);
                          });
                        }

                        orderCount.text(data.length); // Update total order count
                      },
                      error: function(xhr, status, error) {
                        console.error('Error fetching orders:', error);
                      }
                    });
                  }

                  // Fetch new orders every 5 seconds
                  setInterval(fetchNewOrders, 5000);

                  // Initial fetch
                  fetchNewOrders();

// $('#navbarToggler').click(function() {
// 		$('#navbarMenu').toggleClass('active');
// });
// $("#PInfoAdmin").click(function(){
// $('.profileInfoA').slideToggle("slow");
//
// });
// $("#OInfoAdmin").click(function(){
// $('.myOrder').slideToggle("slow");
//
// });

 // ($disable_add_to_cart)
 //         $('#addToCartBtn').prop('disabled', true).text('الكمية غير متوفرة');
 //     <?php endif; ?>
// right and left arrow
// const container = $('#GI');
// const items = $('.grid_item');
// let currentItem = 0;
//
// // Show initial item
// $(items[currentItem]).addClass('active');
//
// // Function to show the next item
// function showNextItem() {
//   $(items[currentItem]).removeClass('active');
//   currentItem = (currentItem + 1) % items.length; // Cycle through items
//   $(items[currentItem]).addClass('active');
//   moveContainer();
// }

// Function to show the previous item
// function showPrevItem() {
//   $(items[currentItem]).removeClass('active');
//   currentItem = (currentItem - 1 + items.length) % items.length; // Cycle through items
//   $(items[currentItem]).addClass('active');
//   moveContainer();
// }

// Function to move container left or right to show active item
// function moveContainer() {
//   const activeItem = $(items[currentItem]);
//   const containerWidth = container.width();
//   const itemWidth = activeItem.outerWidth(true);
//   const offsetLeft = activeItem.position().left;

  // Calculate how much to move container to center active item
  // const moveLeft = -offsetLeft;

  // Animate container movement
//   container.stop().animate({ left: moveLeft }, 300);
// }

// Event listeners for arrow clicks
// $('#nextArrow').click(showNextItem);
// $('#prevArrow').click(showPrevItem);

     //  $('.quantity-input').change(function() {
     //   var newQuantity = $(this).val();
     //   var itemId = $(this).data('item-id');
     //
     //   $.ajax({
     //     url: 'update_cart.php',
     //     method: 'POST',
     //     data: {
     //       item_id: itemId,
     //       quantity: newQuantity
     //     },
     //     success: function(response) {
     //       // Optionally, update UI to reflect successful update
     //       console.log('Quantity updated successfully');
     //     },
     //     error: function(xhr, status, error) {
     //       console.error('Error updating quantity:', error);
     //     }
     //   });
     // });
// $(".profile").click(function(){
// $(".profileInfo").css("visibility","visible");
//   $(".profileInfo").slideToggle();
// });
// $(".insuranceArrow").click(function(){
//
//   $(".itemA").css("display","none");
//   $(".itemG").css("display","block");
//   $(".insuranceArrow").click(function(){
//
//     $(".itemB").css("display","none");
//     $(".itemH").css("display","block");
//     $(".insuranceArrow").click(function(){
//
//       $(".itemC").css("display","none");
//       $(".itemI").css("display","block");
//       $(".insuranceArrow").click(function(){
//
//         $(".itemD").css("display","none");
//         $(".itemJ").css("display","block");
//
//       });
//     });
//   });
// });
// let collection = $(".grid_item");
// $(".insuranceArrow").click(function(){
// for (let i=0 ;i<collection.length;i++){
//     for(let j=0;j<=i;j++){
// var d=$(".grid_item").get(j);
//   if(d.css("display")=="block")
// console.log("it's block");
// else {
//   console.log("it doesn't work");
// }
// }
//
// }
// })};
});
// for(let j=0;j<4;j++){
// console.log($(".grid_item").get(j));
// }
//   $(".insuranceArrow").click(function () {
//     $( ".grid_item" ).each( function( index, element ){
//       for (var i = 0; i < 10; i++) {
// if($( this ).css("display")=="block" && index<=i)
// $(this).css("display","none");
// if ($(this).css("display")=="none" && index==6) {
// $(this).css("display","block");
//
// }}
//   });

// });
