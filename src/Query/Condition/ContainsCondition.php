<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Data\Value\BooleanValue;

/**
 * Class ContainsCondition
 * @package DataDefinition\Condition
 */
class ContainsCondition extends BinaryCondition {
  /**
   * {@inheritdoc}
   */
  public function execute() {
    $result = new BooleanValue();
    $left = (string)$this->left->setObject($this->object)->execute()->getValue();
    $right = (string)$this->right->setObject($this->object)->execute()->getValue();
    return $result->setValue(strpos($left, $right) !== FALSE);
  }
}
