<?php
/**
 * Template Name: Projects
 */
?>

<?php
function echo_projects()
{
    $project_thumbnails = get_field('project_thumbnails');
    write_log('Project thumbnails: ' . $project_thumbnails);
    for ($i = 0; $i < count($project_thumbnails); ++$i) {
        if ($i % 4 == 0 && $i != 0) {
                echo '</div>';
        }
        if ($i % 4 == 0) {
            echo '<div class="row">';
        }
        echo '<div class="col-xs-12 col-sm-6 col-md-3 nopadding"><div class="img-overlay">';
        echo '  <img src="' . $project_thumbnails[$i]['url'] . '" class="img-responsive"/>';
        echo '  <div class="overlay-absolute">';
        echo '      <div class="overlay-table">';
        echo '          <div class="overlay-middle">';
        echo '              <p class="overlay-text">';
        echo '                  david Uphaz 1 2 3 4 a w e r t y u i o';
        echo '              </p>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
    }
    echo '</div>';
    
}
?>

<?php get_header(); ?>
<?php echo_projects(); ?>
<?php get_footer(); ?>