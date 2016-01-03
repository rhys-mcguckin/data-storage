<?php
/**
 * @file
 */
namespace DataDefinition\Query;

/**
 * Interface BinaryConditionInterface
 * @package DataDefinition\Query
 */
interface BinaryConditionInterface extends ConditionInterface {
  /**
   * Construct a binary condition.
   *
   * @param \DataDefinition\Query\ConditionInterface $left
   *
   * @param \DataDefinition\Query\ConditionInterface $right
   *
   * @return self
   */
  public function __construct(ConditionInterface $left, ConditionInterface $right);

  /**
   * Get the left side of the condition.
   *
   * @return \DataDefinition\Query\ConditionInterface
   */
  public function getLeft();

  /**
   * Get the right side of the condition.
   *
   * @return \DataDefinition\Query\ConditionInterface
   */
  public function getRight();
}