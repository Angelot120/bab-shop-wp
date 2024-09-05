<?php 
	$cloudpress_actions = $this->recommended_actions;
	$cloudpress_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="cloudpress-tab-pane panel-close">
	<div class="action-list">
		<?php if($cloudpress_actions): foreach ($cloudpress_actions as $key => $cloudpress_val): ?>
		<div class="action col-md-6" id="<?php echo esc_attr($cloudpress_val['id']); ?>">
			<div class="action-box">
				<div class="action-watch">
				<?php if(!$cloudpress_val['is_done']): ?>
					<?php if(!isset($cloudpress_actions_todo[$cloudpress_val['id']]) || !$cloudpress_actions_todo[$cloudpress_val['id']]): ?>
						<span class="dashicons dashicons-visibility"></span>
					<?php else: ?>
						<span class="dashicons dashicons-hidden"></span>
					<?php endif; ?>
				<?php else: ?>
					<span class="dashicons dashicons-yes"></span>
				<?php endif; ?>
				</div>
				<div class="action-inner">
					<h3 class="action-title"><?php echo esc_html($cloudpress_val['title']); ?></h3>
					<div class="action-desc"><?php echo esc_html($cloudpress_val['desc']); ?></div>
					<?php echo wp_kses_post($cloudpress_val['link']); ?>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>