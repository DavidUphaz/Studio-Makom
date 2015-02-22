<?php
/**
 * Template Name: contact-us
 */
?>

<?php
function get_background_url()
{
    $background = get_field('background');
    echo $background['url'];
}
?>

<?php
function echo_contact_us_form_markup()
{
    $markup = <<< _MARKUP
        <form action="<?php echo get_template_directory_uri(); ?>/ContactForm.php?ResultURL=<?php echo home_url(); ?>" method="post" id="form">
            <table class="contact-form">
                <tr>
                    <td>שם:</td>
                    <td><input type="text" id="name" name="name" class="input-box"/></td>
                </tr>
                <tr>
                    <td>דוא"ל:</td>
                    <td><input type="text" id="email" name="email" class="input-box"/></td>
                </tr>
                <tr>
                    <td>טלפון:</td>
                    <td><input type="text" id="tel" name="tel" class="input-box"/></td>
                </tr>		
                <tr>
                    <td>הודעה:</td>
                    <td><textarea id="comments" name="comments" rows="2" class="message">אנא חזרו אלי...</textarea></td>
                </tr>
                <tr>
                        <td>
                            <a style="color:blue;" href="#" onclick="document.getElementById('form').submit()">שליחה</a>
                        </td>
                        <td>
                            <a style="color:blue;" href="#" onclick="document.getElementById('form').reset()">ניקוי טופס</a>
                        </td>
                </tr>
                <tr>
                    <td>סטודיו מקום</td>
                    <td class="digits">studiomakom@gmail.com</td>
                </tr>
                <tr>
                    <td>טובה דגן</td>
                    <td class="digits">052-8552136</td>
                </tr>
                <tr>
                    <td>רקפת עצמון אופז</td>
                    <td class="digits">052-3295324</td>
                </tr>
            </table>
        </form>
_MARKUP;
    echo $markup;
}
?>

<?php get_header(); ?>
<div class="mobile-content" style="background: url( <?php  echo get_field('background')['url']; ?>) no-repeat center; background-size: cover;">
    <div class="content-wrapper-mobile">
        <?php echo_contact_us_form_markup(); ?>
    </div>
</div>
<div class="row non-mobile-content">
    <div class="carousel">
        <div class="carousel-inner">
            <div class="item active" style="background-image: url('<?php get_background_url(); ?>');">
                <div class="contact-form-div mCustomScrollbar" data-mcs-theme="dark">
                    <?php echo_contact_us_form_markup(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>