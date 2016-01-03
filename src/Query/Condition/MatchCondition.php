<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;
use DataDefinition\Data\Value\BooleanValue;

/**
 * Class MatchCondition
 * @package DataDefinition\Condition
 */
class MatchCondition extends BinaryCondition {
  /**
   * {@inheritdoc}
   */
  public function execute() {
    $result = new BooleanValue();
    $left = (string)$this->left->setObject($this->object)->execute()->getValue();
    $right = (string)$this->right->setObject($this->object)->execute()->getValue();
    return $result->setValue(preg_match($left, '/' . str_replace('/', '\\/', $right) . '/u') !== FALSE);
  }
}
