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
            <span style='font-size: calc(0.7vw + 0.9em); font-weight: bold;'>Active Now</span>
            
            <hr>

            <div class='row'>
                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Bin Emmanuel</p>
                </div>
                
                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>John Doe</p>
                </div>

                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Jane Doe</p>
                </div>

                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Sammy</p>
                </div>

                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Drake</p>
                </div>

                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Francis Drake</p>
                </div>

                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Boob</p>
                </div>

                <div class=' text-center'>
                    <div class='users active-user'>
                        <i class='fa fa-user'></i>
                    </div>

                    <p>Jack</p>
                </div>
            </div>
        </div>
        <!-- .active-users ends -->
    </div>
    <!-- .col-lg-12 .col-sm-12 .col-12 ends -->

    
    <div class='chats'>
        <div class='row'>
            
        </div>
    </div>

    <div class='chats col-md-12'>
         <div class='row'>
            <div class='meter-user text-center'>
                <div class='users'>
                    <i class='fa fa-user'></i>
                </div>

                <p>Jack</p>
            </div>

            <div class="message">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </p>
            </div>
        </div>

        <hr>

         <div class='row'>
            <div class='meter-user text-center'>
                <div class='users active-user'>
                    <i class='fa fa-user'></i>
                </div>

                <p>Sammy</p>
            </div>

            <div class="message ">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum qsadasd sadga asdgsdgasdgsdg asasgsadasdgfa
                </p>
            </div>
        </div>

        <hr>

    </div>

    <!-- <div class='container'>
        <form>
            <textarea></textarea>
            <button type='submit'> <i class="fa fa-paper-plane"></i></button>
        </form>
    </div> -->


    <div class='friend-list'>

    </div>
</div>
<!-- .container ends -->


<?php
// Include our footer.php file
require 'footer.php';
?>