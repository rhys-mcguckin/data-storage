<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Data\Value\BooleanValue;
use DataDefinition\Data\Value\IntegerValue;
use DataDefinition\Data\Value\FloatValue;
use DataDefinition\Data\Value\StringValue;
use DataDefinition\Data\Value\TextValue;
use DataDefinition\Data\ValueInterface;

/**
 * Class ValueCondition
 * @package DataDefinition\Query\Condition
 */
class ValueCondition extends Condition {
  /**
   * @var \DataDefinition\Data\ValueInterface
   */
  protected $value;

  /**
   * Construct this object.
   *
   * @param mixed $value
   *
   * @return self
   *
   * @throw \InvalidArgumentException
   */
  public function __construct($value) {
    switch (gettype($value)) {
      case 'boolean':
        $value = (new BooleanValue())->setValue($value);
        break;

      case 'integer':
        $value = (new IntegerValue())->setValue($value);
        break;

      case 'double':
        $value = (new FloatValue())->setValue($value);
        break;

      case 'string':
        // TODO: This should probably not be hard-coded, and instead use something from StringValue() to determine the maximum accepted.
        if (strlen($value) < 255) {
          $value = (new StringValue())->setValue($value);
        }
        else {
          $value = (new TextValue())->setValue($value);
        }
        break;
    }

    // This is not a value we can handle
    if (!($value instanceof ValueInterface)) {
      throw new \InvalidArgumentException();
    }

    $this->value = $value;
  }

  /**
   * Get the value this represents.
   *
   * @return \DataDefinition\Data\ValueInterface
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * {@inheritdoc}
   */
  public function execute() {
    return $this->value;
  }
}
