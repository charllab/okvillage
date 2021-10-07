<div class="border">
    <div class="p-75">
        <h3>Contact Information</h3>
        <?php
        $removethese = array("(", " ", ")", "-");
        ?>
        <table>
            <tr>
                <td><strong>Phone: </strong></td>
                <td>
                    <a href="tel:+1<?php echo strip_tel(get_field('phone_number', 'option')); ?>"><?php echo get_field('phone_number', 'option'); ?></a>
                </td>
            </tr>
            <tr>
                <td><strong>E-mail: </strong></td>
                <td>
                    <a href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a>
                </td>
            </tr>
            <tr>
                <td style="padding-right: 10px;"><strong>Address: </strong></td>
                <td><?php echo get_field('physical_address', 'option'); ?></td>
            </tr>
        </table>
    </div><!-- p-75-->


    <?php if (get_field('map_embed_code', 'option')) : ?>
        <div class="px-0 google-map">
            <iframe src="<?php the_field('map_embed_code', 'option'); ?>" width="600" height="300" style="border:0;"
                    allowfullscreen="" loading="lazy"></iframe>
        </div><!-- px -->
    <?php endif; ?>

</div><!-- bg-light -->
