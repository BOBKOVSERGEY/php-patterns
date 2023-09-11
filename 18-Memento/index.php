<?php
namespace Mediator;

class EditorMemento
{
    public function __construct(
        protected string $content
    )
    {}

    public function getContent(): string
    {
        return $this->content;
    }
}

class Editor
{
    protected string $content = '';

    public function type(string $words): void
    {
        $this->content = $this->content . ' ' . $words;
    }

    public function getContent(): string
    {
        return $this->content . PHP_EOL;
    }

    public function save(): EditorMemento
    {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento): void
    {
        $this->content = $memento->getContent();
    }
}

$editor = new Editor();

// Type some stuff
$editor->type('This is first sentence');
$editor->type('This is second');

// Save the state to restore to : This is the first sentence. This is second.
$saved = $editor->save();

// Type some more
$editor->type('And this is third');

// Output: Content before Saving
echo $editor->getContent();

// Restoring to last saved state
$editor->restore($saved);
echo $editor->getContent();



