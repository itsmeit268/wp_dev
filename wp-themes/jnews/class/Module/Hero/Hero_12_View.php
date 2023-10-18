<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Hero;

Class Hero_12_View extends HeroViewAbstract
{
    public function render_block_type($post, $index, $type = 1){
       $index = $type === 1 ? $index : $index + 1;
       
        if($post) {
            $post_id            = $post->ID;
            $permalink          = get_the_permalink($post);
            $primary_category   = $this->get_primary_category($post_id);
            $image              = $this->get_thumbnail($post_id, 'jnews-featured-750');

            return  "<article " . jnews_post_class("jeg_post jeg_hero_item_{$index}", $post_id) . " style=\"padding: 0 0 {$this->margin}px {$this->margin}px;\">
                        <div class=\"jeg_block_container\">
                            " . jnews_edit_post($post_id ) . "
                            <span class=\"jeg_postformat_icon\"></span>
                            <div class=\"jeg_thumb\">
                                <a href=\"{$permalink}\" >{$image}</a>
                            </div>
                            <div class=\"jeg_postblock_content\">
                                <div class=\"jeg_post_category\">{$primary_category}</div>
                                <div class=\"jeg_post_info\">
                                    <h2 class=\"jeg_post_title\">
                                        <a href=\"{$permalink}\" >" . get_the_title($post) . "</a>
                                    </h2>
                                    {$this->post_meta_2($post)}
                                </div>
                            </div>
                        </div>
                    </article>";
        }
        return "<article class=\"jeg_post jeg_hero_item_{$index} jeg_hero_empty\" style=\"padding: 0 0 {$this->margin}px {$this->margin}px;\">
                    <div class=\"jeg_block_container\"></div>
                </article>";
    }

    public function render_element($result)
    {
        $first_block    = $this->render_block_type($result[0], 1, 1);
        $number_post    = $this->get_number_post() - 1;
        $second_block   = '';

        for($i = 1; $i <= $number_post; $i++){
            $item = isset($result[$i]) ? $result[$i] : '';
            $second_block .=$this->render_block_type($item, $i, 2);
        }

        return  "{$first_block}
                <div class=\"jeg_heroblock_scroller\">
                    {$second_block}
                </div>";
    }
}