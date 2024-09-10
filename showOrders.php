<?php
require_once '../config.php';
require_once 'adminNavBar.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- google fonts link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Lateef:wght@200;300;400;500;600;700;800&display=swap&family=Almarai:wght@300;400;700;800&display=swap&family=El+Messiri:wght@400..700&display=swap&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://kit.fontawesome.com/a6445728fe.js" crossorigin="anonymous"></script>

<title>OdersList</title>

</head>
<body >
  <div id="ODetails">

     </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../script.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){

    function fetchNewOrders() {
           $.ajax({
               url: 'update_notification.php',
               type: 'GET',
               dataType: 'json',
               success: function(data) {
                 let orderList = $('#ODetails');
                 // let orderCount = $('.orderNotification');
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
  });
</script>
  </body>
</html>
