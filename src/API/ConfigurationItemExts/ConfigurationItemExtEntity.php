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
    public $dattoAvailableKilobytes;
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
    public $dattoOffsiteUsedBytes;
    public ?string $dattoOSVersionID;
    public ?float $dattoPercentageUsed;
    public $dattoProtectedKilobytes;
    public ?string $dattoRemoteIP;
    public ?string $dattoSerialNumber;
    public ?int $dattoUptimeSeconds;
    public $dattoUsedKilobytes;
    public ?string $dattoZFSVersionID;
    public ?string $deviceNetworkingID;
    public ?string $domain;
    public ?Carbon $domainExpirationDateTime;
    public ?Carbon $domainLastUpdatedDateTime;
    public ?int $domainRegistrarID;
    public ?Carbon $domainRegistrationDateTime;
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
    public $rmmDeviceAuditMemoryBytes;
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
    public $rmmDeviceAuditStorageBytes;
    public $rmmDeviceID;
    public ?string $rmmDeviceUID;
    public ?string $serialNumber;
    public ?int $serviceBundleID;
    public ?int $serviceID;
    public ?int $serviceLevelAgreementID;
    public ?float $setupFee;
    public ?int $sourceChargeID;
    public ?int $sourceChargeType;
    public ?string $sslCommonName;
    public ?string $sslIssuedBy;
    public ?string $sslLocation;
    public ?string $sslOrganization;
    public ?string $sslOrganizationUnit;
    public ?string $sslSerialNumber;
    public ?string $sslSignatureAlgorithm;
    public ?string $sslSource;
    public ?Carbon $sslValidFromDateTime;
    public ?Carbon $sslValidUntilDateTime;
    public ?int $vendorID;
    public ?Carbon $warrantyExpirationDate;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ConfigurationItemExt entity.
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

        if (isset($array['domainExpirationDateTime'])) {
            $array['domainExpirationDateTime'] = new Carbon($array['domainExpirationDateTime']);
        }

        if (isset($array['domainLastUpdatedDateTime'])) {
            $array['domainLastUpdatedDateTime'] = new Carbon($array['domainLastUpdatedDateTime']);
        }

        if (isset($array['domainRegistrationDateTime'])) {
            $array['domainRegistrationDateTime'] = new Carbon($array['domainRegistrationDateTime']);
        }

        if (isset($array['installDate'])) {
            $array['installDate'] = new Carbon($array['installDate']);
        }

        if (isset($array['lastModifiedTime'])) {
            $array['lastModifiedTime'] = new Carbon($array['lastModifiedTime']);
        }

        if (isset($array['sslValidFromDateTime'])) {
            $array['sslValidFromDateTime'] = new Carbon($array['sslValidFromDateTime']);
        }

        if (isset($array['sslValidUntilDateTime'])) {
            $array['sslValidUntilDateTime'] = new Carbon($array['sslValidUntilDateTime']);
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
