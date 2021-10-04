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
$post_objects = get_field('accordion');
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
            Simple Accordion
        </div>
    </div>

<?php else: ?>


    <div id="accordion-<?php echo $id; $index = 1; ?>" class="mb-3">
    <?php foreach ($post_objects as $post): ?>

            <div id="heading-<?php echo $id . '-' . $index; ?>">
                <p class="mb-0 lead ff-heading accordion-btn font-weight-bold border-bottom w-100 mb-0 text-left px-0 py-1 position-relative"
                        data-toggle="collapse" data-target="#collapse-<?php echo $id . '-' . $index; ?>"
                        aria-expanded="false"
                        aria-controls="collapse-<?php echo $id . '-' . $index; ?>"
                    >
                        <?php echo $post['accordion_title']; ?>

                </p>
            </div>

            <div id="collapse-<?php echo $id . '-' . $index; ?>"
                 class="collapse"
                 aria-labelledby="heading-<?php echo $id . '-' . $index; ?>"
                 data-parent="#accordion-<?php echo $id;?>"
            >
                <div class="py-1">
                    <p class="mb-0"><?php echo $post['accordion_content']; ?></p>
                </div>

            </div><!-- collapse -->

        <?php $index++; endforeach; ?>
    </div><!-- #accordion -->

    <?php wp_reset_postdata(); ?>


<?php endif; ?>