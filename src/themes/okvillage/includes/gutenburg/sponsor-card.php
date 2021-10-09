<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'cgb-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = '';
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
// Load value defaults.
$post_objects = get_field('sponsor');
?>

<?php if (is_admin()): ?>

    <div class="components-placeholder wp-testimonial-carousel">
        <div class="components-placeholder__label">
            <span class="editor-block-icon block-editor-block-icon has-colors">
                <svg width="24" height="24"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img"
                     aria-hidden="true" focusable="false">
                    <path d="M0,0h24v24H0V0z" fill="none"></path>
                    <path d="M19,4H5C3.89,4,3,4.9,3,6v12c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.11,4,19,4z M19,18H5V8h14V18z"></path>
                </svg>
            </span>
            Sponsor Card
        </div>
    </div>

<?php else: ?>

    <div class="container mb-3">
        <div class="row">

            <?php foreach ($post_objects as $post): ?>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex justify-content-center justify-content-xl-start align-items-center px-1 py-250">
                    <a href="<?php echo $post['website_link']; ?>" target="_blank">
                        <img
                            src="<?php echo $post['sponsor_logo']; ?>"
                            alt="<?php echo $post['sponsor_name']; ?>"
                            class="img-fluid my-1 my-sm-50 sponsor-logo" />
                    </a>
                </div><!-- col -->
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- row -->
    </div><!-- container -->

<?php endif; ?>