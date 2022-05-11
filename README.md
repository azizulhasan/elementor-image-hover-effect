# Elementor Image Hover Effect Sample Plugin

This is a sample plugin to demonstrate how you can write extentions (plugins) to add custom functionality to [Elementor](https://github.com/pojome/elementor/)

Plugin Structure: 
```
assets/
      /js   Holds plugin JS Files
      /css  Holds plugin CSS Files
      /img Holds plugin Image Files
      
includes
  /widgets/
    /hello-world.php
    /inline-editing.php
  Plugin.php
index.php
image-hover-effect.php

```


* `assets` directory - holds plugin JavaScript and CSS assets
  * `/js` directory - Holds plugin Javascript Files
  * `/css` directory - Holds plugin CSS Files
* `widgets` directory - Holds Plugin widgets
  * `/hello-world.php` - Image Hover Effect demo Widget class
  * `/inline-editing.php` - Inline Editing demo Widget class
* `index.php`	- Prevent direct access to directories
* `image-hover-effect.php`	- Main plugin file, used as a loader if plugin minimum requirements are met.
* `plugin.php` - The actual Plugin file/Class.

For more documentation please see [Elementor Developers Resource](https://developers.elementor.com/creating-an-extension-for-elementor/).
