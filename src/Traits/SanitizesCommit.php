<?php

namespace StoresSuite\Codelog\Traits;

trait SanitizesOutput {
    public function sanitizeOutput(array $output): array{
        $commits = [];

        foreach($output as $line){
            $lineArray = explode('___', $line);
            $commits[] = [
                'committed_at' => new Datetime($lineArray[0]),
                'email' => $lineArray[],
                'name' => $lineArray[],
                'hash' => $lineArray[],
                'branch' => $lineArray[]
            ];
        }

        return $commits;
    }
}
