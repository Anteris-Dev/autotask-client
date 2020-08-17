<?php

namespace Anteris\Autotask\API\ConfigurationItemExts;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ConfigurationItemExt entities.
 */
class ConfigurationItemExtEntity extends DataTransferObject
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
    public ?int $dattoAvailableKilobytes;
    public ?int $dattoDeviceMemoryMegabytes;
    public ?bool $dattoDrivesErrors;
    public ?string $dattoHostname;
    public ?string $dattoInternalIP;
    public ?string $dattoKernelVersionID;
    public ?Carbon $dattoLastCheckInDateTime;
    public ?int $dattoNICSpeedKilobitsPerSecond;
    public ?int $dattoNumberOfAgents;
    public ?int $dattoNumberOfDrives;
    public ?int $dattoNumberOfVolumes;
    public ?int $dattoOffsiteUsedBytes;
    public ?string $dattoOSVersionID;
    public ?float $dattoPercentageUsed;
    public ?int $dattoProtectedKilobytes;
    public ?string $dattoRemoteIP;
    public ?string $dattoSerialNumber;
    public ?int $dattoUptimeSeconds;
    public ?int $dattoUsedKilobytes;
    public ?string $dattoZFSVersionID;
    public ?string $deviceNetworkingID;
    public ?float $hourlyCost;
    public int $id;
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
    public ?string $rmmDeviceAuditAntivirusStatusID;
    public ?string $rmmDeviceAuditArchitectureID;
    public ?string $rmmDeviceAuditBackupStatusID;
    public ?string $rmmDeviceAuditDescription;
    public ?int $rmmDeviceAuditDeviceTypeID;
    public ?string $rmmDeviceAuditDisplayAdaptorID;
    public ?string $rmmDeviceAuditDomainID;
    public ?string $rmmDeviceAuditExternalIPAddress;
    public ?string $rmmDeviceAuditHostname;
    public ?string $rmmDeviceAuditIPAddress;
    public ?string $rmmDeviceAuditLastUser;
    public ?string $rmmDeviceAuditMacAddress;
    public ?string $rmmDeviceAuditManufacturerID;
    public ?int $rmmDeviceAuditMemoryBytes;
    public ?int $rmmDeviceAuditMissingPatchCount;
    public ?string $rmmDeviceAuditMobileNetworkOperatorID;
    public ?string $rmmDeviceAuditMobileNumber;
    public ?string $rmmDeviceAuditModelID;
    public ?string $rmmDeviceAuditMotherboardID;
    public ?string $rmmDeviceAuditOperatingSystemID;
    public ?string $rmmDeviceAuditOperatingSystemNameID;
    public ?string $rmmDeviceAuditOperatingSystemVersionID;
    public ?string $rmmDeviceAuditPatchStatusID;
    public ?string $rmmDeviceAuditProcessorID;
    public ?string $rmmDeviceAuditServicePackID;
    public ?string $rmmDeviceAuditSNMPContact;
    public ?string $rmmDeviceAuditSNMPLocation;
    public ?string $rmmDeviceAuditSNMPName;
    public ?string $rmmDeviceAuditSoftwareStatusID;
    public ?int $rmmDeviceAuditStorageBytes;
    public ?int $rmmDeviceID;
    public ?string $rmmDeviceUID;
    public ?string $serialNumber;
    public ?int $serviceBundleID;
    public ?int $serviceID;
    public ?int $serviceLevelAgreementID;
    public ?float $setupFee;
    public ?int $sourceChargeID;
    public ?int $sourceChargeType;
    public ?int $vendorID;
    public ?Carbon $warrantyExpirationDate;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
        $array['dattoLastCheckInDateTime'] = new Carbon($array['dattoLastCheckInDateTime']);
        $array['installDate'] = new Carbon($array['installDate']);
        $array['lastModifiedTime'] = new Carbon($array['lastModifiedTime']);
        $array['warrantyExpirationDate'] = new Carbon($array['warrantyExpirationDate']);
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
