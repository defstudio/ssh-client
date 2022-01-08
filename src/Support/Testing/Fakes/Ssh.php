<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace DefStudio\Ssh\Support\Testing\Fakes;

use Illuminate\Support\Collection;
use PHPUnit\Framework\Assert;

class Ssh extends \DefStudio\Ssh\Ssh
{
    private Collection $executedCommands;

    /**
     * @param array<string, (callable(string):string)|string> $replies
     */
    public function __construct(
        private array $replies = []
    ) {
        $this->executedCommands = Collection::empty();
    }

    public function connect(): \DefStudio\Ssh\Ssh
    {
        $this->checkRequirements();

        return $this;
    }

    public function execute(array|string $commands): bool|string
    {
        if (is_string($commands)) {
            $commands = explode("\n", $commands);
        }

        return Collection::make($commands)
            ->map(function (string $command) {
                $this->executedCommands->push($command);

                $response = $this->replies[$command] ?? '';

                if (is_callable($response)) {
                    $response = $response($command);
                }

                return $response;
            })->join("\n");
    }

    public function assertExecuted(string $command): void
    {
        Assert::assertTrue($this->executedCommands->contains($command), sprintf("Failed to assert that ssh command [%s] was executed (%d commands executed so far)", $command, $this->executedCommands->count()));
    }

    public function assertNothingExecuted(): void
    {
        Assert::assertEmpty($this->executedCommands->toArray(), sprintf("Failed to assert that no commands where executed (%d commands executed so far)", $this->executedCommands->count()));
    }
}
