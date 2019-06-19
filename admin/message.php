<?php
/**
 * The message template file.
 *
 * Author: Bin Emmanuel
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Page title.
$pageTitle = 'Message';

// Include our header.php file
require 'header.php';

$userId = 2;

$customerId = 63;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['text'])) {
        //Store the message.
        $message = htmlspecialchars(stripslashes(trim($_POST['text'])));


    }
}


$message = new Message(null, 3, null, null, null);

?>

<!-- .messages -->
<div class="messages col-md-12">
    <div class="container">
        <!-- .me .row -->
        <div class='row col-md-12'>
             <!-- .me .row -->
            <div class='row'>
                    <!-- .meter-user -->
                    <div class='meter-user float-right text-center'>
                        <div class='users active-user'>
                            <i class='fa fa-user'></i>
                        </div>

                        <p>Sammy</p>
                    </div>
                    <!-- .meter-user ends -->

                    <!-- .message -->
                    <div class="message col-md-9">
                        <?php  $message->getMessage(); ?>
                    </div>
                    <!-- .message ends -->
            </div>
            <!-- .me .row ends-->
        </div>
        <!-- .me .row ends-->


        <div class="me col-md-12 float-right">
            <!-- .message -->
            <div class="message col-md-9 float-right">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                </p>

                <small class='float-right'>4:65 am</small>

            </div>
            <!-- .message ends -->
        </div>


         <!-- .me .row -->
        <div class='row col-md-12'>
             <!-- .me .row -->
            <div class='row'>
                    <!-- .meter-user -->
                    <div class='meter-user float-right text-center'>
                        <div class='users active-user'>
                            <i class='fa fa-user'></i>
                        </div>

                        <p>Sammy</p>
                    </div>
                    <!-- .meter-user ends -->

                    <!-- .message -->
                    <div class="message col-md-9">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                        </p>

                        <small>4:65 am</small>
                    </div>
                    <!-- .message ends -->
            </div>
            <!-- .me .row ends-->
        </div>
        <!-- .me .row ends-->


        <div class="me col-md-12 float-right">
            <!-- .message -->
            <div class="message col-md-9 float-right">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                </p>

                <small class='float-right'>4:65 am</small>
            </div>
            <!-- .message ends -->
        </div>
    </div>
    <!-- .container -->
</div>
<!-- .messages ends -->

<div class="container">
    <form action="message.php" method="POST">
        <div class="message-box">
            <div class="col-md-12">
                    <textarea name="text" rows="0" class="message-textarea col-md-11" autofocus="autofocus"></textarea>

                    <button><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</div>