<?php

/**
 * @file
 * Contains Drupal\search_api_glossary\SearchApiGlossaryAZHelper.
 */

namespace Drupal\search_api_glossary;

/**
 * Search Api GlossaryAZ Helper class.
 *
 * @package Drupal\search_api_glossary
 */
class SearchApiGlossaryAZHelper {

  /**
   * Getter callback for title_az_glossary property.
   */
  public function glossaryGetter($source_value, $glossary_az_grouping) {
    $first_letter = strtoupper(substr(trim($source_value), 0, 1));
    return $this->glossaryGetterHelper($first_letter, array_values($glossary_az_grouping));
  }

  /**
   * Getter Helper for Alpha Numeric Keys.
   */
  public function glossaryGetterHelper($first_letter, $glossary_az_grouping) {
    // Is it Alpha?
    if (ctype_alpha($first_letter)) {
      // Do we have Alpha grouping?
      if (in_array('glossary_az_grouping_az', $glossary_az_grouping, TRUE)) {
        $first_letter = "A-Z";
      }
      return $first_letter;
    }

    // Is it a number?
    elseif (ctype_digit($first_letter)) {
      // Do we have Numeric grouping?
      if (in_array('glossary_az_grouping_09', $glossary_az_grouping, TRUE)) {
        $first_letter = "0-9";
      }
      return $first_letter;
    }

    // Catch non alpha numeric.
    // Do we have Non Alpha Numeric grouping?
    elseif (in_array('glossary_az_grouping_other', $glossary_az_grouping, TRUE)) {
      $first_letter = "#";
      return $first_letter;
    }
  }

}
