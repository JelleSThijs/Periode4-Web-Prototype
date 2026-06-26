<?php
class Controller
{
    /**
     * Loads phones and returns them as an associative array [id => PhoneObject]
     */
    public function createPhonesFromJson(string $filePath): array {
        if (!file_exists($filePath)) throw new Exception("File not found: " . $filePath);
        $jsonData = file_get_contents($filePath);
        $phonesArray = json_decode($jsonData, true);

        $phoneObjects = [];
        foreach ($phonesArray as $data) {
            // Key the array by the ID
            $phoneObjects[(int)$data['id']] = new Phone(
                (int)    $data['id'],
                (string) $data['brand'],
                (string) $data['model'],
                (string) $data['description'],
                (float)  $data['price'],
                new DateTimeImmutable($data['releaseDate']),
                (string) $data['imagePath'],
                (array)  ($data['colors'] ?? []),
            );
        }
        return $phoneObjects;
    }

    /**
     * Loads plans and returns them as an associative array [id => PhonePlanObject]
     */
    public function createPhonePlansFromJson(string $filePath): array {
        if (!file_exists($filePath)) throw new Exception("File not found: " . $filePath);
        $jsonData = file_get_contents($filePath);
        $plansArray = json_decode($jsonData, true);

        $planObjects = [];
        foreach ($plansArray as $data) {
            // Key the array by the ID
            $planObjects[(int)$data['id']] = new PhonePlan(
                (int)    $data['id'],
                (string) $data['brand'],
                (int)    $data['dataGb'],
                (int)    $data['sms'],
                (int)    $data['callMinutes'],
                (float)  $data['price']
            );
        }
        return $planObjects;
    }
}