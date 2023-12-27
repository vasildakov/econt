<?php

namespace VasilDakov\Econt;

interface EcontInterface
{
    public function getClientProfiles(): string;

    public function getCountries(): string;

    public function getCities(array $data): string;

    public function getOffices(array $data): string;

    public function getStreets(array $data): string;

    public function getQuarters(array $data): string;


    public function createLabel(array $data): string;

    public function createLabels(array $data): string;

    public function deleteLabels(array $data): string;

    public function getShipmentStatuses(array $data): string;
}