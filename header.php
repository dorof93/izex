<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body>
	<header class="section section_top">
		<div class="section__container">
			<div class="header">
				<div class="info header__info">
					<div class="logo header__logo">
						<a class="logo__main header__logo-main" href="/">
							<?php the_field('site_title', HOME); ?>
						</a><br />
						<a class="logo__capture header__logo-capture" href="/">
							<?php the_field('site_sub_title', HOME); ?>
						</a>
					</div>
					<div class="site-descr header__site-descr">
						<div class="site-descr__text header__site-descr-text">
							<?php the_field('site_short_descr', HOME); ?>
						</div>
					</div>
					<div class="email header__email">
						<span class="email__title header__email-title">
							<?php the_field('email_title', HOME); ?>
						</span>
						<span class="email__addr header__email-addr">
							<a href="mailto:<?php the_field('email', HOME); ?>">
								<?php the_field('email', HOME); ?>
							</a>
						</span>
					</div>
					<div class="soc header__soc">
						<div class="soc__icon-link header__soc-icon-link">
							<?php 
								while ( have_rows('soc', HOME) ) {
									the_row();
									?>
									<a href="<?php the_sub_field('link'); ?>">
										<?php echo get_acf_pic( get_sub_field('img') ); ?>
									</a>
								<?php
								}
							?>
						</div>
					</div>
					<div class="tel header__tel">
						<div class="tel__link header__tel-link">
							<a href="tel:<?php echo get_tel_link('tel', HOME); ?>">
								<?php the_field('tel', HOME); ?>
							</a>
						</div>
						<span class="tel__time header__tel-time">
							<?php the_field('work_time', HOME); ?>
						</span>
						<span class="callback header__callback">
							<?php the_field('tel_btn_text', HOME); ?>
						</span>
					</div>
					<div class="menu-switcher header__menu-switcher" onclick="toggleMenu(this)">
						<img class="menu-switcher__img" src="<?php echo get_template_directory_uri() . '/img/link-gray.75c32e4f5eaf9c9fadef.svg'; ?>" alt="">
					</div>
				</div>
				<?php
					wp_nav_menu([
						'menu' => 'Основное меню',
						'container' => 'nav',
						'menu_class' => 'menu header__menu',
						'container_class' => 'menu__list header__menu-list',
					]);
				?>
			</div>
		</div>
	</header>
