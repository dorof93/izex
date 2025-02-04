<?php
	get_header();
?>
<main class="main">
	<section class="section section_bg-img" style="<?php echo get_acf_bg_pic( get_field('main_top_bg') ); ?>">
		<div class="section section_cover-top section_gradient_blue">
			<div class="section__container">
				<div class="main-screen">
					<p class="main-screen__title">
						<?php the_field('main_title'); ?>
					</p>
					<p class="main-screen__sub-title">
						<?php the_field('main_sub_title'); ?>
					</p>
					<button class="btn main-screen__btn">
						<?php the_field('main_btn_title'); ?>
					</button>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="section__container">
			<div class="digits">
				<?php 
					while ( have_rows('digits') ) {
						the_row();
					?>
						<div class="digit">
							<p class="digit__title">
								<?php the_sub_field('title'); ?>
							</p>
							<div class="digit__text">
								<?php the_sub_field('text'); ?>
							</div>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="section__container">
			<div class="company">
				<div class="company__review">
					<p class="company__title">
						<?php the_field('about_title'); ?>
					</p>
					<p class="company__sub-title">
						<?php the_field('about_sub_title'); ?>
					</p>
					<div class="company__text">
						<?php echo nl2br(get_field('about_text')); ?>
					</div>
					<button class="btn company__btn">
						<?php the_field('about_btn'); ?>
					</button>
				</div>
				<div class="company__gallery">
					<div class="swiper gallery">
						<div class="swiper-wrapper">
							<?php 
								while ( have_rows('about_gal') ) {
									the_row();
									?>
									<div class="swiper-slide">
										<?php echo get_acf_pic( get_sub_field('img') ); ?>
									</div>
								<?php
								}
							?>
						</div>
						<div class="arrow-nav arrow-nav_prev gallery__arrow-nav gallery__arrow-nav_prev">
							<img src="<?php echo get_template_directory_uri() . '/img/Group.svg'; ?>" alt="">
						</div>
						<div class="arrow-nav arrow-nav_next gallery__arrow-nav gallery__arrow-nav_next">
							<img src="<?php echo get_template_directory_uri() . '/img/Group_1.svg'; ?>" alt="">
						</div>
					</div>
					<div thumbsSlider="" class="swiper thumb-gallery">
						<div class="swiper-wrapper">
							<?php 
								while ( have_rows('about_gal') ) {
									the_row();
									?>
									<div class="swiper-slide">
										<?php echo get_acf_pic( get_sub_field('img') ); ?>
									</div>
								<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="section__container">
			<div class="partners">
				<p class="partners__title">
					<?php the_field('partners_title'); ?>
				</p>
				<div class="swiper partners__list">
					<div class="swiper-wrapper">
						<?php 
							while ( have_rows('partners_list') ) {
								the_row();
								?>
								<div class="swiper-slide">
									<?php echo get_acf_pic( get_sub_field('img') ); ?>
								</div>
							<?php
							}
						?>
					</div>
					<div class="arrow-nav arrow-nav_prev partners__arrow-nav partners__arrow-nav_prev">
						<img src="<?php echo get_template_directory_uri() . '/img/Vector_1.svg'; ?>" alt="">
					</div>
					<div class="arrow-nav arrow-nav_next partners__arrow-nav partners__arrow-nav_next">
						<img src="<?php echo get_template_directory_uri() . '/img/Vector.svg'; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section section_blue">
		<div class="section__container">
			<div class="args">
				<p class="args__title">
					<?php the_field('adv_title'); ?>
					<span class="args__sub-title">
						<?php the_field('adv_sub_title'); ?>
					</span>
				</p>
				<div class="args__list">
					<?php 
						while ( have_rows('adv_list') ) {
							the_row();
						?>
							<div class="arg-item">
								<p class="arg-item__img">
									<?php echo get_acf_pic( get_sub_field('img') ); ?>
								</p>
								<p class="arg-item__title">
									<?php the_sub_field('title'); ?>
								</p>
								<p class="arg-item__text">
									<?php the_sub_field('text'); ?>
								</p>
							</div>
						<?php
						}
					?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
	get_footer();
?>