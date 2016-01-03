<?php
/**
 * @file
 */
namespace DataDefinition\Query;

use DataDefinition\Data\ObjectInterface;

/**
 * Interface ConditionInterface
 * @package DataDefinition
 */
interface ConditionInterface {
  /**
   * Set the object which is being used for the condition checking.
   *
   * @param \DataDefinition\Data\ObjectInterface $object
   *
   * @return self
   */
  public function setObject(ObjectInterface $object);

  /**
   * @return \DataDefinition\Data\ValueInterface
   */
  public function execute();
}
