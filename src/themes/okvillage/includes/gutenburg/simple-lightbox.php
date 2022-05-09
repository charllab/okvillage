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
$post_objects = get_field('director');
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
            Director Profile
        </div>
    </div>

<?php else: ?>


    <div class="container mb-2 px-0">
        <div class="row">
        <?php $count = 0; ?>
        <?php foreach ($post_objects as $post): ?>
            <div class="col-sm-6 col-lg-4 position-relative">
                <?php if ($post['director_bio']) : ?>
                <a data-toggle="modal"
                   data-target="#modal-<?php echo $count; ?>"
                   class="bio-link"
                >
                <?php endif; ?>
                    <img
                        src="<?php echo $post['director_photo']; ?>"
                        alt="<?php echo $post['director_name']; ?>"
                        class="img-fluid"
                    >
                    <div class="position-relative">
                        <?php if ($post['director_bio']) : ?>
                        <div class="btn text-center read-bio text-white bg-primary p-50">
                            Read Bio
                        </div>
                <?php endif; ?>
                    </div>
                <div class="text-center p-50 mt-50 mb-75">
                    <p class="director-name small mb-250 text-uppercase font-weight-bold text-dark"><?php echo $post['director_name']; ?></p>
                    <?php if ($post['director_title']) : ?>
                    <p class="mb-0 smaller"><?php echo $post['director_title']; ?></p>
                    <?php endif; ?>
                </div><!-- text-lead -->
                <?php if ($post['director_bio']) : ?>
                    </a>
                <?php endif; ?>
            </div><!-- col -->
            <?php $count++; endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->


    <?php $count = 0; ?>
    <?php foreach ($post_objects as $post): ?>
        <?php if ($post['director_bio']) : ?>
        <div class="modal fade"
             id="modal-<?php echo $count; ?>"
             role="dialog"
             aria-labelledby="modal-<?php echo $count; ?>"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="text-uppercase"><?php echo $post['director_name']; ?></h3>
                        <?php echo $post['director_bio']; ?>

                    </div><!-- modal-body -->
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        <?php endif; ?>
    <?php $count++; endforeach; ?>


    <?php wp_reset_postdata(); ?>



<?php endif; ?>