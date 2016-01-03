<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Data\ObjectInterface;
use DataDefinition\Query\ConditionInterface;

/**
 * Class Condition
 * @package DataDefinition\Query\Condition
 */
abstract class Condition implements ConditionInterface {
  /**
   * @var \DataDefinition\Data\ObjectInterface
   */
  protected $object;

  /**
   * {@inheritdoc}
   */
  public function setObject(ObjectInterface $object) {
    $this->object = $object;
    return $this;
  }
}