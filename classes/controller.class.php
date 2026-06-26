<?php
class Controller
{
    /**
     * Loads phones from a JSON file and returns an array of Phone objects.
     * @param string $filePath Path to the JSON file
     * @return Phone[] Array of Phone instances
     * @throws Exception If the file is missing or JSON is invalid
     */
    public function createPhonesFromJson(string $filePath): array
    {
        // 1. Check if the file exists
        if (!file_exists($filePath)) {
            throw new Exception("JSON file not found at: " . $filePath);
        }

        // 2. Read the file contents
        $jsonData = file_get_contents($filePath);

        // 3. Decode JSON into an associative array
        $phonesArray = json_decode($jsonData, true);

        // 4. Validate JSON parsing
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON format: " . json_last_error_msg());
        }

        $phoneObjects = [];

        // 5. Loop through data and instantiate Phone objects
        foreach ($phonesArray as $data) {
            $phoneObjects[] = new Phone(
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
}