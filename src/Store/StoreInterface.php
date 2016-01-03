<?php
/**
 * @file
 */
namespace DataDefinition\Store;

use DataDefinition\Data\StructureInterface;
use DataDefinition\Data\FieldInterface;
use DataDefinition\Data\ValueInterface;

/**
 * Interface StoreInterface
 * @package DataDefinition
 */
interface StoreInterface {
  // TODO: This should probably also provide some kind of metadata information about the source.

  /**
   * Check to see if the source can write to a field type.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   * @param \DataDefinition\Data\FieldInterface $field
   *
   * @return bool
   */
  public function canSetField(StructureInterface $structure, FieldInterface $field);

  /**
   * Check to see if the source can read a given field type.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   * @param \DataDefinition\Data\FieldInterface $field
   *
   * @return mixed
   */
  public function canGetField(StructureInterface $structure, FieldInterface $field);

  /**
   * Queue a field to be read from the source.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   * @param \DataDefinition\Data\FieldInterface $field
   *
   * @return \DataDefinition\Data\ValueInterface
   */
  public function getField(StructureInterface $structure, FieldInterface $field);

  /**
   * Queues a field to be written to the source.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   * @param \DataDefinition\Data\FieldInterface $field
   * @param \DataDefinition\Data\ValueInterface $value
   *
   * @return self
   */
  public function setField(StructureInterface $structure, FieldInterface $field, ValueInterface $value);

  /**
   * Loads from the source all fields that were queued.
   *
   * @return self
   */
  public function getFields();

  /**
   * Saves to the source all fields that were queued.
   *
   * @return self
   */
  public function setFields();

  /**
   * Check to see if the source can read from a structure.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   *
   * @return bool
   */
  public function canGetStructure(StructureInterface $structure);

  /**
   * Check to see if the source can write to a structure.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   *
   * @return bool
   */
  public function canPutStructure(StructureInterface $structure);

  /**
   * Get all fields associated with the structure.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   *
   * @return \DataDefinition\Data\FieldInterface[]
   */
  public function getStructure(StructureInterface $structure);

  /**
   * Queue a field structure change.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   * @param \DataDefinition\Data\FieldInterface $field
   * @param \DataDefinition\Data\FieldInterface $original
   *
   * @return self
   */
  public function setStructureField(StructureInterface $structure, FieldInterface $field, FieldInterface $original = NULL);

  /**
   * Save to source all the field changes that were made.
   *
   * @param \DataDefinition\Data\StructureInterface $structure
   *
   * @return self
   */
  public function setStructure(StructureInterface $structure);

  /**
   * Get the full list of defined structures from this source.
   *
   * @return \DataDefinition\Data\StructureInterface[]
   */
  public function getDefinedStructures();
}
