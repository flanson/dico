<!-- groupe definition start --> 

<?php if ( have_rows( 'blocTerme' ) ) : ?>
	<?php while ( have_rows( 'blocTerme' ) ) : the_row(); ?>
		<?php the_sub_field( 'termeNom' ); ?>
		<?php the_sub_field( 'termeNature' ); ?>
		<?php the_sub_field( 'termeGenre' ); ?>
		<?php if ( have_rows( 'termeSens' ) ): ?>
			<?php while ( have_rows( 'termeSens' ) ) : the_row(); ?>
				<?php if ( get_row_layout() == 'sensSimple' ) : ?>
					<?php $ssimple_champ_terms = get_sub_field( 'ssimple_champ' ); ?>
					<?php if ( $ssimple_champ_terms ): ?>
						<?php foreach ( $ssimple_champ_terms as $ssimple_champ_term ): ?>
							<?php echo $ssimple_champ_term->name; ?>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php $ssimple_precision_terms = get_sub_field( 'ssimple_precision' ); ?>
					<?php if ( $ssimple_precision_terms ): ?>
						<?php foreach ( $ssimple_precision_terms as $ssimple_precision_term ): ?>
							<?php echo $ssimple_precision_term->name; ?>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php the_sub_field( 'ssimple_sens' ); ?>
					<?php the_sub_field( 'ssimple_exemple' ); ?>
					<?php the_sub_field( 'ssimple_syno' ); ?>
					<?php the_sub_field( 'ssimple_anto' ); ?>
					<?php the_sub_field( 'ssimple_remarque' ); ?>
				<?php elseif ( get_row_layout() == 'sensComplexe' ) : ?>
					<?php $scomplexe_champ_ids = get_sub_field( 'scomplexe_champ' ); ?>
					<?php // var_dump( $scomplexe_champ_ids ); ?>
					<?php $scomplexe_precision_ids = get_sub_field( 'scomplexe_precision' ); ?>
					<?php // var_dump( $scomplexe_precision_ids ); ?>
					<?php the_sub_field( 'scomplexe_sens' ); ?>
					<?php the_sub_field( 'scomplexe_remarque' ); ?>
					<?php if ( have_rows( 'scomplexe_sousa' ) ) : ?>
						<?php while ( have_rows( 'scomplexe_sousa' ) ) : the_row(); ?>
							<?php $sousa_champ_ids = get_sub_field( 'sousa_champ' ); ?>
							<?php // var_dump( $sousa_champ_ids ); ?>
							<?php $sousa_precision_ids = get_sub_field( 'sousa_precision' ); ?>
							<?php // var_dump( $sousa_precision_ids ); ?>
							<?php the_sub_field( 'sousa_sens' ); ?>
							<?php the_sub_field( 'sousa_exemple' ); ?>
							<?php the_sub_field( 'sousa_syno' ); ?>
							<?php the_sub_field( 'sousa_anto' ); ?>
							<?php the_sub_field( 'sousa_remarque' ); ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php else: ?>
			<?php // no layouts found ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>

<!-- groupe definition end -->
