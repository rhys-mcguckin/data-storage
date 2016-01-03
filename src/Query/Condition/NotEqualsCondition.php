<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Data\Value\BooleanValue;

/**
 * Class NotEqualsCondition
 * @package DataDefinition\Condition
 */
class NotEqualsCondition extends BinaryCondition {
  /**
   * {@inheritdoc}
   */
  public function execute() {
    $result = new BooleanValue();
    return $result->setValue(
      $this->left->setObject($this->object)->execute()
      !=
      $this->right->setObject($this->object)->execute()
    );
  }
}
