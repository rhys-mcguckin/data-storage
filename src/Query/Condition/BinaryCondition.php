<?php
/**
 * @file
 */
namespace DataDefinition\Query\Condition;

use DataDefinition\Query\BinaryConditionInterface;
use DataDefinition\Query\ConditionInterface;

/**
 * Class BinaryCondition
 * @package DataDefinition\Query\Condition
 */
abstract class BinaryCondition extends Condition implements BinaryConditionInterface {
  /**
   * @var \DataDefinition\Query\ConditionInterface
   */
  protected $left;

  /**
   * @var \DataDefinition\Query\ConditionInterface
   */
  protected $right;

  /**
   * {@inheritdoc}
   */
  public function __construct(ConditionInterface $left, ConditionInterface $right) {
    $this->left = $left;
    $this->right = $right;
  }

  /**
   * {@inheritdoc}
   */
  public function getLeft() {
    return $this->left;
  }

  /**
   * {@inheritdoc}
   */
  public function getRight() {
    return $this->right;
  }
}
