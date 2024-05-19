<?php
?>
<div class="addGuest">
    <div class="main__form">
        <div class="main__form--title text-center">Please send us your feedback</div>
        <form onSubmit="return validateform()" action="add.php" method="POST">
            <div class="form-row">
                <div class="col col-12">
                    <label class="input2">

                        <textarea rows="15" cols="100" name="message" placeholder="Your feedback..." required></textarea>
                    </label>
                </div>

                <input type="hidden" name="action" value="feedback">

                <div class="col col-12">
                    <input type="submit" value="Send">
                </div>
            </div>
        </form>
    </div>
</div>