	<footer class="section">
		<div class="section__container">
			<div class="footer">
				<div class="info footer__info">
					<div class="logo footer__logo">
						<a class="logo__main footer__logo-main" href="/">
							<?php the_field('site_title', HOME); ?>
						</a><br />
						<a class="logo__capture footer__logo-capture" href="/">
							<?php the_field('site_sub_title', HOME); ?>
						</a>
					</div>
					<?php
						wp_nav_menu([
							'menu' => 'Основное меню',
							'container' => 'nav',
							'menu_class' => 'menu info__menu',
							'container_class' => 'menu__list footer__menu-list',
						]);
					?>
					<div class="soc footer__soc">
						<div class="soc__icon-link footer__soc-icon-link">
							<?php 
								while ( have_rows('soc', HOME) ) {
									the_row();
									?>
									<a href="<?php the_sub_field('link'); ?>">
										<?php echo get_acf_pic( get_sub_field('img2') ); ?>
									</a>
								<?php
								}
							?>
						</div>
					</div>
					<div class="tel footer__tel">
						<div class="tel__link footer__tel-link">
							<a href="tel:<?php echo get_tel_link('tel', HOME); ?>">
								<?php the_field('tel', HOME); ?>
							</a>
						</div>
						<div class="callback footer__callback">
							<?php the_field('tel_btn_text', HOME); ?>
						</div>
						<div class="email footer__email">
							<span class="email__title footer__email-title">
								<?php the_field('email_title', HOME); ?>
							</span>
							<span class="email__addr footer__email-addr">
								<a href="mailto:<?php the_field('email', HOME); ?>">
									<?php the_field('email', HOME); ?>
								</a>
							</span>
						</div>
					</div>
				</div>
				<div class="rights footer__rights">
					<div class="copy">
						<?php the_field('copy', HOME); ?>
					</div>
					<?php
						wp_nav_menu([
							'menu' => 'Меню конфеденциальности',
							'container' => 'nav',
							'menu_class' => 'menu rights__menu',
							'container_class' => 'menu__list',
						]);
					?>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>
