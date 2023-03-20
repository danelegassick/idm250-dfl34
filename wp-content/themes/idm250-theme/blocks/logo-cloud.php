<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <h2 class="text-center text-lg font-semibold leading-8 text-gray-900"><?php the_field('logo_cloud_heading'); ?>
    </h2>

    <?php 
$images = get_field('logo_cloud_logos');
if( $images ): ?>
    <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
        <?php foreach( $images as $image ): ?>
                <a href="<?php echo esc_url($image['url']); ?>">
                     <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                <p><?php echo esc_html($image['caption']); ?></p>
        <?php endforeach; ?>
        </div>
<?php endif; ?>

</div>