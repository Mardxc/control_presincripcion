<style>

</style>
<nav style='margin:0px;padding:0px;color:black;'>
    <ul class="eflat-menu" style='margin:0px;padding:0px;color:black;background:white;'>

        <?php
        foreach ($items as $item) {
            if (isset($item['visible']) && !$item['visible'])
                continue;

            echo CHtml::tag('li', (isset($item['']) && $item['active']) ? array('class' => 'active') : array());//**
            if (isset($item['icon-class']) && $item['icon-class'])
                echo CHtml::link(CHtml::tag('i', array('class' => 'fa ' . $item['icon-class'])) . CHtml::closeTag('i') . $item['label'], $item['url']);
            else
                echo CHtml::link($item['label'], $item['url'],array('style'=>'color:black;font-weight:normal;'));

            // second level
            if (isset($item['items']) && is_array($item['items'])) {
                echo CHtml::tag('ul', array('class' => 'sub-menu'));
                foreach ($item['items'] as $sub_item) {
                    if (isset($sub_item['visible']) && !$sub_item['visible'])
                        continue;

                    echo CHtml::tag('li');
                    if (isset($sub_item['icon-class']) && $sub_item['icon-class'])
                        echo CHtml::link(CHtml::tag('i', array('class' => 'fa ' . $sub_item['icon-class'])) . CHtml::closeTag('i') . $sub_item['label'], $sub_item['url']);
                    else
                        echo CHtml::link($sub_item['label'], $sub_item['url']);

                    // third level
                    if (isset($sub_item['items']) && is_array($sub_item['items'])) {
                        echo CHtml::tag('ul');

                        foreach ($sub_item['items'] as $third_sub_item) {
                            if (isset($third_sub_item['visible']) && !$third_sub_item['visible'])
                                continue;

                            echo CHtml::tag('li');

                            if (isset($third_sub_item['icon-class']) && $third_sub_item['icon-class'])
                                echo CHtml::link(CHtml::tag('i', array('class' => 'fa ' . $third_sub_item['icon-class'])) . CHtml::closeTag('i') . $third_sub_item['label'], $third_sub_item['url']);
                            else
                                echo CHtml::link($third_sub_item['label'], $third_sub_item['url']);

                            echo CHtml::closeTag('li');
                        }

                        echo CHtml::closeTag('ul');
                    }

                    echo CHtml::closeTag('li');
                }
                echo CHtml::closeTag('ul');
            }

            echo CHtml::closeTag('li');
        }
        ?>
    </ul>
</nav>