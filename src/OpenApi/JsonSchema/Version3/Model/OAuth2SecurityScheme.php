<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Version3\Model;

class OAuth2SecurityScheme extends \ArrayObject
{
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var OAuthFlows|null
     */
    protected $flows;
    /**
     * @var string|null
     */
    protected $description;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return OAuthFlows|null
     */
    public function getFlows(): ?OAuthFlows
    {
        return $this->flows;
    }

    /**
     * @param OAuthFlows|null $flows
     *
     * @return self
     */
    public function setFlows(?OAuthFlows $flows): self
    {
        $this->flows = $flows;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
