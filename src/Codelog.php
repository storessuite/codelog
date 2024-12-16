<?php

namespace StoresSuite\Codelog;

use StoresSuite\Codelog\Traits\SanitizesOutput;
use StoresSuite\Codelog\Traits\TimesCommit;

class Codelog {
    use SanitizesOutput, TimesCommit;
    
    public string $command = 'git log --oneline --decorate --pretty=format:"%ad___%h___%an___%ae" --date=iso-strict --all';

    public function author (string $email) : Codelog {
        $this->command .= " --author=<$email>";
        return $this;
    }

    public function get() {
        exec($this->command, $output); 
        $commits = $this->sanitizeOutput($output);
        return $this->timeCommits($commits);
    }
}
