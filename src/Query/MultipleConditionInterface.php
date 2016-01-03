<?php
/**
 * @file
 */
namespace DataDefinition\Query;

/**
 * Interface MultipleConditionInterface
 * @package DataDefinition\Query
 */
interface MultipleConditionInterface extends ConditionInterface {
  /**
   * Add another condition to the list of conditions applied.
   *
   * @param \DataDefinition\Query\ConditionInterface $condition
   *
   * @return self
   */
  public function addCondition(ConditionInterface $condition);

  /**
   * Get the full list of conditions provided by this interface.
   *
   * @return \DataDefinition\Query\ConditionInterface[]
   */
  public function getConditions();
}