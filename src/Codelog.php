<?php

namespace StoresSuite\Codelog;

use StoresSuite\Codelog\SanitizesOutput;
use StoresSuite\Codelog\TimesCommit;

class Codelog {
    use SanitizesOutput, TimesCommit;
    
    public function $command = "git log --oneline --decorate ---pretty=format:'%h %d %ad %an %ae' -date=format:'%Y-%m-%d %H:%M:%S'";

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
