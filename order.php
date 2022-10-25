    <?php include 'inc/header.php'; ?>


    <style>
      /* The Modal (background) */
      .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
      }

      /* Modal Content/Box */
      .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
      }

      /* The Close Button */
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
    </style>



    <?php
    $login =  Session::get("cuslogin");
    if ($login == false) {
      header("Location:login.php");
    }
    ?>


    <div class="main">
      <div class="content">

        <div class="section group">
          <div class="notfound">
            <h2> <span>Your Orders</span> </h2>


            <table class="tblone">
              <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Details</th>
              </tr>

              <?php
              $cmrId =  Session::get("cmrId");
              $orders = $ct->getOrders($cmrId);


              foreach ($orders as $o) {

                echo '<tr>';

                echo '<td>' . $o[0] . '</td>';


                echo '<td>' . $o[1] . '</td>';

                echo '<td>';

              ?>

                <button onclick="myToggleModel('orderM<?php echo $o[0]; ?>');"><img src="https://img.icons8.com/ios-filled/50/000000/show-property.png" /></button>

                <div id="orderM<?php echo $o[0]; ?>" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <span onclick="myToggleModel('orderM<?php echo $o[0]; ?>');" class="close">&times;</span>


                    <table class="tblone">
                      <tr>
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>

                      </tr>

                      <?php $counter = 1;

                      $pro = $ct->getOrderProduct($o[0]);

                      if ($pro) {

                        if (is_array($pro[0])) {

                          foreach ($pro as $p) {

                            echo '<tr>';

                            echo '<td>' . $counter . '</td>';
                            echo '<td>' . $p['productName'] . '</td>';
                            echo '<td><img src="images/' . $p['image'] . '" alt=""/></td>';
                            echo '<td>' . $p['quantity'] . '</td>';
                            $total = $p['price'] * $p['quantity'];
                            echo '<td>&#8362;' . $total . '</td>';


                            echo '</tr>';

                            $counter++;
                          }
                        } else {

                          echo '<tr>';

                          echo '<td>' . $counter . '</td>';
                          echo '<td>' . $pro['productName'] . '</td>';
                          echo '<td><img src="images/' . $pro['image'] . '" alt=""/></td>';
                          echo '<td>' . $pro['quantity'] . '</td>';
                          $total = $pro['price'] * $pro['quantity'];
                          echo '<td>&#8362;' . $total . '</td>';


                          echo '</tr>';
                        }
                      }



                      ?>






                    </table>



                  </div>

                </div>


              <?php


                echo '</td>';

                echo '</tr>';
              }


              ?>

            </table>







          </div>

        </div>




        <div class="clear"></div>
      </div>
    </div>
    </div>

    <?php include 'inc/footer.php'; ?>


    <script>
      function myToggleModel(_id) {
        $('#' + _id).toggle();
      }
    </script>