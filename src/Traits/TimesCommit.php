<?php

namespace StoresSuite\Codelog\Traits;

trait TimesCommit {
    public function timeCommits(array $commits): array{
        foreach($commits as $index => &$commit){
            $commit['time_spent'] = $index === count($commits) - 1 ? 
                $commit['time_spent'] = 'N/A' : 
                $commits[$index + 1]['committed_at']->diff($commit['committed_at'])->format('%H:%I:%S');
        }

        return $commits;
    }
}
