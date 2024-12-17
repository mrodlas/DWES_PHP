<?php
class RedSocial
{
    private array $interests;
    private array $interestsWithIDs;

    //Constructor
    public function __construct(array $nIntereses = [])
    {
        $this->interests = $nIntereses;
    }

    public function getInterests(): array
    {
        return $this->interests;
    }

    public function getInterestsWithIDs(): array
    {
        return $this->interestsWithIDs;
    }

    public function generateIDs(): void
    {
        $this->interestsWithIDs = [];
        foreach ($this->interests as $int) {
            $newID = mt_rand(1, count($this->interests));
            while (array_key_exists($newID, $this->interestsWithIDs)) {
                $newID = mt_rand(1, count($this->interests));
            }

            $this->interestsWithIDs[$newID] = $int;
        }
    }

    public function getInterestsString(): string
    {
        return implode(" - ", $this->interests);
    }

    public function showInterestsWithIDs(): void
    {
        echo "<ul>";
        foreach ($this->interestsWithIDs as $id => $int) {
            echo "<li>";
            echo "{$int} ({$id})";
            echo "</li>";
        }
        echo "</ul><br>";
    }

    /**
     * Ordena el array de intereses con IDs y lo devuelve
     */
    public function orderByID(): void {
        ksort($this->interestsWithIDs);    
    }

    public function orderByInterestName(): void {
        asort($this->interestsWithIDs);
    }

    public function addInterest(string $nInterest): int {
        return array_push($this->interests, $nInterest);
    }

    public function getNumInterests(): int {
        return count($this->interests);
    }
}

?>