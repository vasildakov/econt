<?php

declare(strict_types=1);

namespace VasilDakov\Econt;

use VasilDakov\Econt\Request;

/**
 * EcontInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface EcontInterface
{
    public function getClientProfiles(): string;

    public function getCountries(): string;

    public function getCities(Request\GetCitiesRequest $object): string;

    public function getOffices(Request\GetOfficesRequest $object): string;

    public function getStreets(Request\GetStreetsRequest $object): string;

    public function getQuarters(Request\GetQuartersRequest $object): string;


    public function createLabel(array $data): string;

    public function createLabels(array $data): string;

    public function deleteLabels(array $data): string;

    public function getShipmentStatuses(array $data): string;
}
