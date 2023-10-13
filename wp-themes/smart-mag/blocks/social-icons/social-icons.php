<?php

namespace Bunyad\Blocks;

use \Bunyad;
use Bunyad\Blocks\Base\Block;

/**
 * Common Social Icons Block.
 */
class SocialIcons extends Block
{
	public $id = 'social-icons';

	/**
	 * @inheritdoc
	 */
	public static function get_default_props() 
	{
		$props = [
			'style'    => 'a',
			'services' => [
				'facebook',
				'twitter',
			],
			'links' => [],
			'class' => '',
			'brand_colors' => false,
		];

		return $props;
	}

	public function map_global_props($props) 
	{
		return array_replace([

			// Global social profile links.
			'links' => Bunyad::options()->social_profiles,
		], $props);
	}

	/**
	 * Render the social icons.
	 * 
	 * @return void
	 */
	public function render()
	{
		// At least one service has to be enabled.
		if (empty($this->props['services'])) {
			return;
		}

		$services_data = Bunyad::get('social')->get_services();
		$links         = $this->props['links'];

		$classes = [
			'spc-social-block',
			'spc-social spc-social-' . $this->props['style'],
			$this->props['class']
		];

		// Have background colors for this style.
		if ($this->props['style'] === 'c') {
			$this->props['brand_colors'] = 'bg';
		}

		// Add brand colors in bg or as icon color.
		switch($this->props['brand_colors']) {
			case 'color':
				$classes[] = 'spc-social-colors spc-social-colored';
				break;

			case 'bg':
				$classes[] = 'spc-social-colors spc-social-bg';
				break;
		}

		?>

		<div class="<?php echo esc_attr(join(' ', $classes)); ?>">
		
			<?php		
			foreach ($this->props['services'] as $key):
				if (!isset($services_data[$key])) {
					continue;
				}
			
				$service = $services_data[$key];
				$url     = !empty($links[$key]) ? $links[$key] : '#';

				$link_class = [
					// link for backward compatibility.
					'link',
					'service',
					's-' . $key
				];
			?>

				<a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr(join(' ', $link_class)); ?>" target="_blank" rel="nofollow noopener">
					<i class="icon <?php echo esc_attr($service['icon']); ?>"></i>
					<span class="visuallyhidden"><?php echo esc_html($service['label']); ?></span>
				</a>
									
			<?php endforeach; ?>

		</div>

		<?php
	}
}