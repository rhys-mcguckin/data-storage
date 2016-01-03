<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Data\ObjectInterface;
use DataDefinition\Data\Value\BooleanValue;
use DataDefinition\Query\ConditionInterface;
use DataDefinition\Query\MultipleConditionInterface;

/**
 * Class AndCondition
 * @package DataDefinition\Condition
 */
class AndCondition implements MultipleConditionInterface {
  /**
   * @var \DataDefinition\Query\ConditionInterface
   */
  protected $conditions = array();

  /**
   * @var \DataDefinition\Data\ObjectInterface
   */
  protected $object;

  /**
   * {@inheritdoc}
   */
  public function addCondition(ConditionInterface $condition) {
    $this->conditions[] = $condition;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getConditions() {
    return $this->conditions;
  }

  /**
   * {@inheritdoc}
   */
  public function setObject(ObjectInterface $object) {
    $this->object = $object;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function execute() {
    $return = new BooleanValue();
    foreach ($this->conditions as $condition) {
      if (!(bool)$condition->setObject($this->object)->execute()->getValue()) {
        return $return->setValue(FALSE);
      }
    }
    return $return->setValue(TRUE);
  }
}
