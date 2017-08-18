<?php declare(strict_types=1);

namespace JosefGlatz\BeuserFastswitch\Domain\Model\Dto;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Extension Configuration
 *
 * Class EmConfiguration
 * @package JosefGlatz\BeuserFastswitch\Domain\Model\Dto
 */
class EmConfiguration
{

    /**
     * Fill the properties properly
     *
     * @param array $configuration em configuration
     */
    public function __construct(array $configuration)
    {
        foreach ($configuration as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @var boolean;
     */
    protected $showAdminUsers = false;

    /**
     * @var string
     */
    protected $allowedUserNamePattern = '';

    /**
     * @var string
     */
    protected $allowedUserEmailAddressPattern = '';

    /**
     * @var string
     */
    protected $allowedUserGroupUids = '';

    /**
     * @var string
     */
    protected $allowedUserGroupNamePattern = '';

    /**
     * @var bool
     */
    protected $activeSearch = false;

    /**
     * @var string
     */
    protected $defaultListing = 'default';

    /**
     * @return bool
     */
    public function isShowAdminUsers(): bool
    {
        return (bool)$this->showAdminUsers;
    }

    /**
     * @return string
     */
    public function getAllowedUserNamePattern(): string
    {
        return $this->allowedUserNamePattern;
    }

    /**
     * @return array
     */
    public function getAllowedUserGroupUids(): array
    {
        return GeneralUtility::trimExplode(
            ',',
            $this->allowedUserGroupUids,
            true);
    }

    /**
     * @return string
     */
    public function getAllowedUserEmailAddressPattern(): string
    {
        return $this->allowedUserEmailAddressPattern;
    }

    /**
     * @return string
     */
    public function getAllowedUserGroupNamePattern(): string
    {
        return $this->allowedUserGroupNamePattern;
    }

    /**
     * @return bool
     */
    public function isActiveSearch(): bool
    {
        return (bool)$this->activeSearch;
    }

    /**
     * @return string
     */
    public function getDefaultListing(): string
    {
        $value = $this->defaultListing;
        if (in_array($value, array('default', 'none', 'lastUsed'), true)) {
            return $value;
        }

        return 'default';
    }
}
