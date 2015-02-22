<?php
/**
 * Template Name: projects
 */
?>

<?php
function echo_projects()
{
    $projects = get_pages();
    echo '<div class="row">';
    foreach($projects as $project){
        if (!strpos(get_page_template_slug($project->ID), 'single-project'))
                continue;
        echo '<div class="col-xs-6 col-md-4">';
        echo '  <div class="img-overlay">';
        echo '      <img src="' . get_field('thumbnail', $project->ID)['url'] . '" class="img-responsive"/>';
        echo '      <a href="' . get_page_link($project->ID) .'" class="mobile-overlay-absolute overlay-text">' . get_the_title($project->ID) . '</a>';
        echo '      <a href="' . get_page_link($project->ID) .'" class="mobile-overlay-absolute-EX"></a>';
        echo '      <a href="' . get_page_link($project->ID) .'" class="overlay-absolute">';
        echo '          <div class="overlay-table">';
        echo '              <div class="overlay-middle">';
        echo '                  <div class="overlay-text">';
        echo                        get_field('short_description', $project->ID);
        echo '                  </div>';
        echo '              </div>';
        echo '          </div>';
        echo '      </a>';
        echo '  </div>';
        echo '</div>';
    }
    echo '</div>';
}
?>

<?php get_header(); ?>
<?php echo_projects(); ?>
<?php get_footer(); ?>