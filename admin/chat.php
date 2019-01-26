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
            <span style='border-bottom: 2px solid gray; font-size: calc(0.7vw + 0.9em); font-weight: bold;'>Active Now</span>

            <div class='row'>
                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>
                
                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>

                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>

                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>

                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>

                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>

                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>

                <div class=' text-center'>
                    <div class='users'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>
            </div>
        </div>
        <!-- .active-users ends -->
    </div>
    <!-- .col-lg-12 .col-sm-12 .col-12 ends -->

    <div class='messages'>
        
    </div>

    <div class='container'>
        <form>
            <textarea></textarea>
            <button type='submit'> <i class="fa fa-paper-plane"></i></button>
        </form>
    </div>

    <div class='friend-list'>

    </div>
</div>
<!-- .container ends -->


<?php
// Include our footer.php file
require 'footer.php';
?>