# Progress Helper

A CakePHP helper to handle basic progress calculation and output.
By default it uses unicode chars to work completely text-based.

The main advantage of the progress helper over default round() calculation is that it only fully displays
0 and 100 percent borders (including the char icon representation) if truly fully that min/max value.
So for `0.9999` as well as `0.0001` etc it will not yet display the completely full or empty bar.
If you want that, you need to pre-round before passing it in.


## Setup
Include helper in your AppView class as
```php
$this->addHelper('Tools.Progress', [
    ...
]);
```

You can store default configs also in Configure key `'Progress'`.
Mainly empty/full chars can be configured this way.

## Usage

### progressBar()
Display a text-based progress bar with the progress in percentage as title.
```php
echo $this->Progress->progressBar(
    $percentage // Value 0...1
    $length, // Char length >= 3 
    $attributes
);
```

### draw()
Display a text-based progress bar as raw bar.
```php
echo $this->Progress->draw(
    $percentage // Value 0...1
    $length // Char length >= 3 
);
```
This can be used if you want to customize the usage.

### calculatePercentage()

This method is responsible for the above min/max handling.
It can be also used standalone.
```php
// For $value 0.49 it outputs: 49% 
echo $this->Number->toPercentage($this->calculatePercentage($value), 0, ['multiply' => true]);
```

## Tips

Consider using CSS `white-space: nowrap` for the span tag if wrapping could occur based on smaller display sizes.
Wrapping would render such a text-based progress bar a bit hard to read.