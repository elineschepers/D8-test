<?php

namespace Drupal\ww_bootstrap4_layouts\Plugin\Layout;



use Drupal\layout_builder\Plugin\Layout\MultiWidthLayoutBase;

/**
 * Configurable bootstrap4 row layout plugin class.
 *
 * @internal
 *   Plugin classes are internal.
 */
class BsRowLayout extends MultiWidthLayoutBase {

  /**
   * {@inheritdoc}
   */
  protected function getWidthOptions() {
    return [
      '1-col' => '1 column',
      '2-col' => '2 column',
      '3-col' => '3 column',
      '4-col' => '4 column',
      '5-col' => '5 column',

    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getDefaultWidth() {
    return '50-50';
  }

}
