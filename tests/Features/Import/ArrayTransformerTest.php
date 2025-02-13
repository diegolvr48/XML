<?php

namespace OliveraD\XML\Tests\Features\Import;

use OliveraD\XML\Tests\TestCase;
use OliveraD\XML\Transformers\ArrayTransformer;
use OliveraD\XML\XML;

class ArrayTransformerTest extends TestCase
{
    public function test_applies_array_transform()
    {
        $path = __DIR__.'/stubs/notes.xml';
        $json = XML::import($path)
            ->transform('note')->with(ArrayTransformer::class)
            ->toJson();

        $this->assertMatchesJsonSnapshot($json);
    }

    public function test_applies_array_correctly()
    {
        $path = __DIR__.'/stubs/notes-2.xml';
        $json = XML::import($path)
            ->transform('note')->with(ArrayTransformer::class)
            ->toJson();

        $this->assertMatchesJsonSnapshot($json);
    }

    public function test_applies_array_transform_using_alias()
    {
        $path = __DIR__.'/stubs/notes.xml';
        $json = XML::import($path)
            ->expect('note')->as('array')
            ->toJson();

        $this->assertMatchesJsonSnapshot($json);
    }

    public function test_applies_array_correctly_using_alias()
    {
        $path = __DIR__.'/stubs/notes-2.xml';
        $json = XML::import($path)
            ->expect('note')->as('array')
            ->toJson();

        $this->assertMatchesJsonSnapshot($json);
    }
}
