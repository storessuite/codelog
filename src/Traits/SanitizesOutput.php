<?php

namespace StoresSuite\Codelog\Traits;

trait SanitizesOutput {
    public function sanitizeOutput(array $output): array{
        $commits = [];

        foreach($output as $line){
            $lineArray = explode('___', $line);
            $commits[] = [
                'committed_at' => date($lineArray[0]),
                'hash' => $lineArray[1],
                'name' => $lineArray[2],
                'email' => $lineArray[3],
            ];
        }

        return $commits;
    }
}
