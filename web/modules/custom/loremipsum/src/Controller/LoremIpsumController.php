<?php

namespace Drupal\loremipsum\Controller;

use Drupal\Core\Url;
use Drupal\Component\Utility\Html;

/**
 * Controller routines for Lorem ipsum pages.
 */
class LoremIpsumController {
  /**
   * Constructs Lorem ipsum text with arguments.
   * This callback is mapped to the path
   * 'loremipsum/generate/{paragraphs}/{phrases}'.
   *
   * @param string $paragraphs
   *  The amount of paragraphs that need to be generated.
   * @param string $phrases
   *  The maximum amount of phrases that can be generated inside a paragraph
   */

  public function content($paragraphs, $phrases) {
    // Default settings.
    $config = \Drupal::config('loremipsum.settings');
    $page_title = $config->get('loremipsum.page_title');
    $source_text = $config->get('loremipsum.source_text');

    $repertory = explode(PHP_EOL, $source_text);

    $element['#source_text'] = array();

    $element['#source_text'][] = $source_text;
    $element['#source_text'][] = $paragraphs;
    $element['#source_text'][] = $phrases;

    //$element['#markup'] = $element['#source_text'][0] . $element['#source_text'][1] . $element['#source_text'][2];

    $element['#title'] = Html::escape($page_title);

    $element['#theme'] = 'loremipsum';

    return $element;
  }
}