<?php

/**
 * The chat template file.
 *
 * Author: Bin Emmanuel
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Page title.
$pageTitle = 'Chat';

// Include our header.php file
require 'header.php';

?>

<!-- .container -->
<div class='container'>
    <!-- .col-lg-12 .col-sm-12 .col-12 -->
    <div class='col-lg-12 col-sm-12 col-12'>
        <!-- .active-users -->
        <div class='active-users col-md-12'>
            <span style='border-bottom: 1px solid gray;'>Active Now</span>

            <div class='row'>
                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>

                <div class='users text-center'>
                    <i class='fa fa-user'></i>
                </div>
            </div>
        </div>
        <!-- .active-users ends -->
    </div>
    <!-- .col-lg-12 .col-sm-12 .col-12 ends -->

    <div class='messages'>

    </div>

    <div class='friend-list'>

    </div>
</div>
<!-- .container ends -->


<?php
// Include our footer.php file
require 'footer.php';
?>