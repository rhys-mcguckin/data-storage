<?php
/**
 * @file
 */
namespace DataDefinition\Query;
use DataDefinition\Data\StructureInterface;
use DataDefinition\Store\StoreInterface;

/**
 * Interface QueryInterface
 * @package DataDefinition\Query
 */
interface QueryInterface {
  /**
   *
   * @return self
   */
  public function setStructure(StructureInterface $structure);

  /**
   *
   * @return \DataDefinition\Data\StructureInterface
   */
  public function getStructure();

  /**
   * @return self
   */
  public function addCondition(ConditionInterface $condition);

  /**
   * Get the conditions used on the query.
   *
   * @return \DataDefinition\Query\ConditionInterface
   */
  public function getCondition();

  /**
   * Get all objects that match the given set of conditions.
   *
   * @param \DataDefinition\Store\StoreInterface $source
   *
   * @return \DataDefinition\Data\ObjectInterface[]
   */
  public function execute(StoreInterface $source);
}
