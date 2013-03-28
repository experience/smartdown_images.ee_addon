## An Important Note About Support

SmartDown Images (in common with all of my ExpressionEngine add-ons) is not officially supported.

The source code is reasonably well-documented, and you are free to fork the repo if you'd like to make some changes or improvements (it's distributed under a liberal open source license).

Hopefully this will be everything you need to use this add-on in your projects, but if not please don't email me asking for support; I don't even have ExpressionEngine installed locally any more.

## Overview

The SmartDown Images extension uses SmartDown's [extension hooks][hooks] to
implement support for the [Matrix][matrix] and [NSM Transplant][nsm_transplant]
[image replacement technique][image_video].

The extension is only required in the following very specific situation:

1. Your content uses the aforementioned image replacement technique;
2. Your content includes ExpressionEngine code samples, requiring you to set
   [the `ee_tags:encode` option][usage] to TRUE.

## Requirements
* PHP 5.
* [SmartDown][smartdown], obviously.

## Installation
1. Extract the ZIP file.
2. Copy the `third_party/smartdown_images` folder to your
   `/system/expressionengine/third_party/` directory.
3. If you're installing SmartDown Images for the first time, open [the
   Extensions Manager][manager], and enable the extension.

[manager]:http://expressionengine.com/user_guide/cp/add-ons/extension_manager.html "The ExpressionEngine extensions manager."
[smartdown]:https://github.com/experience/smartdown.ee_addon "Read more about SmartDown"
[hooks]:https://github.com/experience/smartdown.ee_addon/wiki/Extension-Hooks "Read more about SmartDown's extension hooks"
[image_video]:http://vimeo.com/18661374 "A video guide to the Matrix / NSM Transplant image replacement technique"
[matrix]:http://pixelandtonic.com/matrix/ "Flaming BK"
[nsm_transplant]:http://ee-garage.com/nsm-transplant "Flaming Australians"
[usage]:https://github.com/experience/smartdown.ee_addon/wiki/Usage-Instructions "SmartDown usage instructions"
