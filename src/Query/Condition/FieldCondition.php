<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Data\FieldInterface;
use DataDefinition\Data\Value\NullValue;

/**
 * Class FieldCondition
 * @package DataDefinition\Query\Condition
 */
class FieldCondition extends Condition {
  /**
   * @var \DataDefinition\Data\FieldInterface
   */
  protected $field;

  /**
   * Construct the object.
   *
   * @param \DataDefinition\Data\FieldInterface $field
   */
  public function __construct(FieldInterface $field) {
    $this->field = $field;
  }

  /**
   * @return \DataDefinition\Data\ValueInterface
   */
  public function execute() {
    $key = $this->field->getName();
    if (isset($this->object[$key])) {
      return $this->object->getValue($key);
    }
    return new NullValue();
  }
}
