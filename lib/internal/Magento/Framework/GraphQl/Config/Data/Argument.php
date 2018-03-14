<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types = 1);

namespace Magento\Framework\GraphQl\Config\Data;

/**
 * Structured data object for arguments of a GraphQL type.
 *
 * Arguments of a type in GraphQL are used to gather client input to affect how a query will return data.
 */
class Argument implements FieldInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $baseType;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var bool
     */
    private $isList;

    /**
     * @var bool
     */
    private $itemsRequired;

    /**
     * @var string|null
     */
    private $default;

    /**
     * @param string $name
     * @param string $type
     * @param string $baseType
     * @param string $description
     * @param bool $required
     * @param bool $isList
     * @param bool $itemsRequired
     * @param string $default
     */
    public function __construct(
        string $name,
        string $type,
        string $baseType,
        string $description,
        bool $required,
        bool $isList,
        bool $itemsRequired = false,
        string $default = null
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->baseType = $baseType;
        $this->description = $description;
        $this->required = $required;
        $this->isList = $isList;
        $this->itemsRequired = $itemsRequired;
        $this->default = $default;
    }

    /**
     * Get the name of the argument.
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Get the argument type's configured name
     *
     * @return string
     */
    public function getTypeName() : string
    {
        return $this->type;
    }

    /**
     * Get the argument's base type. This can be used to inherit fields for a filter or sort input, etc.
     *
     * @return string
     */
    public function getBaseType() : string
    {
        return $this->baseType;
    }

    /**
     * Return true if argument is a list of input items, otherwise false if it is a single object/scalar.
     *
     * @return bool
     */
    public function isList() : bool
    {
        return $this->isList;
    }

    /**
     * Return true if argument is required when invoking the query where the argument is specified. False otherwise.
     *
     * @return bool
     */
    public function isRequired() : bool
    {
        return $this->required;
    }

    /**
     * Return true if item is a list, and if that list must be populated by at least one item. False otherwise.
     *
     * @return bool
     */
    public function areItemsRequired() : bool
    {
        return $this->itemsRequired;
    }

    /**
     * Return the human-readable description of the argument containing it's documentation.
     *
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Return default if argument is a scalar and has a configured default. Otherwise return an empty string.
     *
     * @return string|null
     */
    public function getDefault() : ?string
    {
        return $this->default;
    }
}
