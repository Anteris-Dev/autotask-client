<?php

namespace Anteris\Autotask\API\ConfigurationItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ConfigurationItem entities.
 */
class ConfigurationItemEntity extends DataTransferObject
{
    public ?int $apiVendorID;
    public int $companyID;
    public ?int $companyLocationID;
    public ?int $configurationItemCategoryID;
    public ?int $configurationItemType;
    public ?int $contactID;
    public ?int $contractID;
    public ?int $contractServiceBundleID;
    public ?int $contractServiceID;
    public ?Carbon $createDate;
    public ?int $createdByPersonID;
    public ?float $dailyCost;
    public $dattoAvailableKilobytes;
    public ?int $dattoDeviceMemoryMegabytes;
    public ?bool $dattoDrivesErrors;
    public ?string $dattoHostname;
    public ?string $dattoInternalIP;
    public ?int $dattoKernelVersionID;
    public ?Carbon $dattoLastCheckInDateTime;
    public ?int $dattoNICSpeedKilobitsPerSecond;
    public ?int $dattoNumberOfAgents;
    public ?int $dattoNumberOfDrives;
    public ?int $dattoNumberOfVolumes;
    public $dattoOffsiteUsedBytes;
    public ?int $dattoOSVersionID;
    public ?float $dattoPercentageUsed;
    public $dattoProtectedKilobytes;
    public ?string $dattoRemoteIP;
    public ?string $dattoSerialNumber;
    public ?int $dattoUptimeSeconds;
    public $dattoUsedKilobytes;
    public ?int $dattoZFSVersionID;
    public ?string $deviceNetworkingID;
    public ?float $hourlyCost;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public ?Carbon $installDate;
    public ?int $installedByContactID;
    public ?int $installedByID;
    public bool $isActive;
    public ?int $lastActivityPersonID;
    public ?int $lastActivityPersonType;
    public ?Carbon $lastModifiedTime;
    public ?string $location;
    public ?float $monthlyCost;
    public ?string $notes;
    public ?float $numberOfUsers;
    public ?int $parentConfigurationItemID;
    public ?float $perUseCost;
    public int $productID;
    public ?string $referenceNumber;
    public ?string $referenceTitle;
    public ?int $rmmDeviceAuditAntivirusStatusID;
    public ?int $rmmDeviceAuditArchitectureID;
    public ?int $rmmDeviceAuditBackupStatusID;
    public ?string $rmmDeviceAuditDescription;
    public ?int $rmmDeviceAuditDeviceTypeID;
    public ?int $rmmDeviceAuditDisplayAdaptorID;
    public ?int $rmmDeviceAuditDomainID;
    public ?string $rmmDeviceAuditExternalIPAddress;
    public ?string $rmmDeviceAuditHostname;
    public ?string $rmmDeviceAuditIPAddress;
    public ?string $rmmDeviceAuditLastUser;
    public ?string $rmmDeviceAuditMacAddress;
    public ?int $rmmDeviceAuditManufacturerID;
    public $rmmDeviceAuditMemoryBytes;
    public ?int $rmmDeviceAuditMissingPatchCount;
    public ?int $rmmDeviceAuditMobileNetworkOperatorID;
    public ?string $rmmDeviceAuditMobileNumber;
    public ?int $rmmDeviceAuditModelID;
    public ?int $rmmDeviceAuditMotherboardID;
    public ?string $rmmDeviceAuditOperatingSystem;
    public ?int $rmmDeviceAuditPatchStatusID;
    public ?int $rmmDeviceAuditProcessorID;
    public ?int $rmmDeviceAuditServicePackID;
    public ?string $rmmDeviceAuditSNMPContact;
    public ?string $rmmDeviceAuditSNMPLocation;
    public ?string $rmmDeviceAuditSNMPName;
    public ?int $rmmDeviceAuditSoftwareStatusID;
    public $rmmDeviceAuditStorageBytes;
    public $rmmDeviceID;
    public ?string $rmmDeviceUID;
    public ?int $rmmOpenAlertCount;
    public ?string $serialNumber;
    public ?int $serviceBundleID;
    public ?int $serviceID;
    public ?int $serviceLevelAgreementID;
    public ?float $setupFee;
    public ?int $sourceChargeID;
    public ?int $sourceChargeType;
    public ?int $vendorID;
    public ?Carbon $warrantyExpirationDate;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ConfigurationItem entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['dattoLastCheckInDateTime'])) {
            $array['dattoLastCheckInDateTime'] = new Carbon($array['dattoLastCheckInDateTime']);
        }

        if (isset($array['installDate'])) {
            $array['installDate'] = new Carbon($array['installDate']);
        }

        if (isset($array['lastModifiedTime'])) {
            $array['lastModifiedTime'] = new Carbon($array['lastModifiedTime']);
        }

        if (isset($array['warrantyExpirationDate'])) {
            $array['warrantyExpirationDate'] = new Carbon($array['warrantyExpirationDate']);
        }

        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}
